<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * User model
 *
 * @property integer $u_id
 * @property string $u_username
 * @property string $u_auth_key
 * @property string $u_password_hash
 * @property string $u_password_reset_token
 * @property string $u_email
 * @property string $u_tel
 * @property string $u_sex
 * @property string $u_birthday
 * @property string $u_name
 * @property string $u_face
 * @property integer $u_status
 * @property string $created_at
 * @property int $created_id
 * @property string $updated_at
 * @property int $updated_id
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
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['u_status', 'default', 'value' => self::STATUS_ACTIVE],
            ['u_status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DISABLED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['u_id' => $id, 'u_status' => self::STATUS_ACTIVE]);
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
        return static::findOne(['u_username' => $username, 'u_status' => self::STATUS_ACTIVE]);
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
            'u_password_reset_token' => $token,
            'u_status' => self::STATUS_ACTIVE,
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
        return $this->u_auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $u_auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->u_password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->u_password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->u_auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->u_password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->u_password_reset_token = null;
    }

    public function getList($get=[], $field=NULL)
    {
        $offset = empty($get['offset'])? 0:$get['offset'];
        $limit = empty($get['limit'])? 20:$get['limit'];
        empty($field) && $field = 'u_id AS id, u_username AS username, u_email AS email, u_tel AS tel, u_sex AS sex, u_birthday AS birthday, u_name AS name, u_face AS face, u_status AS status';

        $query = static::find()->select($field)->orderBy('u_id DESC')->offset($offset)->limit($limit);
        $query->andFilterWhere([
            'status' => 1,
            'u_status' => $get['status'],
        ]);
        $query->andFilterWhere(['like', 'u_name', $get['name']]);
        $query->andFilterWhere(['like', 'u_username', $get['username']]);

        $ret['total'] = $query->count();
        if ($ret['total'] > 0) 
            $ret['rows'] = $query->asArray()->all();
        return $ret;
    }
}
