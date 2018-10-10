<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $tel
 * @property string $sex
 * @property string $birthday
 * @property string $name
 * @property string $face
 * @property integer $user_status
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $status
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
 
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            ['class'=>\yii\behaviors\TimestampBehavior::className()],
            ['class'=>\yii\behaviors\BlameableBehavior::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['user_status', 'default', 'value' => self::STATUS_ACTIVE],
            ['user_status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DISABLED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'user_status' => self::STATUS_ACTIVE, 'status' => 1]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'user_status' => self::STATUS_ACTIVE, 'status' => 1]);
    }

    /**
     * 检查账号唯一性
     * @Author   Armo
     * @DateTime 2018-09-24
     * @param    string     $username 账号
     * @return   boolean              true/false
     */
    public static function checkUsernameUnique($username)
    {
        return empty(static::findOne(['username' => $username, 'status' =>1]));
    }
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'user_status' => self::STATUS_ACTIVE,
            'status' => 1
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getList($param=[], $field=NULL)
    {
        $offset = empty($param['offset'])? 0:$param['offset'];
        $limit = empty($param['limit'])? 20:$param['limit'];
        empty($field) && $field = 'id, username, email, tel, sex, birthday, name, face, user_status';

        $query = static::find()->select($field)->orderBy('id DESC')->offset($offset)->limit($limit);
        $query->andFilterWhere([
            'status' => 1,
            'user_status' => $param['status'],
            'sex' => $param['sex'],
        ]);
        $query->andFilterWhere(['like', 'name', $param['name']]);
        $query->andFilterWhere(['like', 'username', $param['username']]);
        $query->andFilterWhere(['like', 'tel', $param['tel']]);

        $ret['total'] = $query->count();
        if ($ret['total'] > 0) 
            $ret['rows'] = $query->asArray()->all();
        return $ret;
    }

    /**
     * 获取用户的全部角色ID
     */
    public static function getUserRoles($user_id)
    {
        $role = RoleUser::find()->select('role_id')->where(['user_id'=>$user_id])->asArray()->all();
        $role = array_column($role,'role_id');
        return $role;
    }

    /**
     * 设置用户的全部角色ID
     */
    public static function setUserRoles($user_id, $role_id)
    {
        // 删除旧授权角色
        RoleUser::deleteAll(['user_id'=>$user_id]);
        // 添加新授权角色
        if (!empty($role_id)) {
            $data = [];
            foreach ($role_id as $k => $v) 
                $data[] = [$user_id, $v];
            Yii::$app->db->createCommand()->batchInsert(RoleUser::tableName(), ['user_id', 'role_id'], $data)->execute();
        }
        return true;
    }
}
