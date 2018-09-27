<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $role_id
 * @property string $role_name
 * @property int $role_sort
 * @property int $role_status
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $status
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * 表名
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * 验证规则
     */
    public function rules()
    {
        return [
            [['role_sort', 'role_status', 'status'], 'integer'],
            [['role_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * 行为，自动补充 created_by , created_at, updated_by , updated_at
     */
    public function behaviors()
    {
        return [
            ['class'=>\yii\behaviors\TimestampBehavior::className()],
            ['class'=>\yii\behaviors\BlameableBehavior::className()],
        ];
    }
    /**
     * 属性别名
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'role_sort' => 'Role Sort',
            'role_status' => 'Role Status',
            'created_at' => 'Created At',
            'created_by' => 'Created BY',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated BY',
            'status' => 'Status',
        ];
    }


    /**
     * 获取角色信息，包括节点ID
     * @param  int $role_id 角色ID
     */
    public function getRoleInfo($role_id)
    {
        $role = $this->find()
            ->where(['role_id' => $role_id, 'status' => 1])
            ->asArray()
            ->one();

        // 获取已经有的节点
        $role['node'] = (new Node())->getNodeId($role_id);
        return $role;
    }

    public function getList($param=[], $field=NULL)
    {
        $offset = empty($param['offset'])? 0:$param['offset'];
        $limit = empty($param['limit'])? 20:$param['limit'];
        empty($field) && $field = 'role_id AS id, role_name AS name, role_sort AS sort, role_status AS status';

        $query = static::find()->select($field)->orderBy('role_id DESC')->offset($offset)->limit($limit);
        $query->andFilterWhere([
            'status' => 1,
            'role_status' => $param['status'],
        ]);
        $query->andFilterWhere(['like', 'role_name', $param['name']]);

        $ret['total'] = $query->count();
        if ($ret['total'] > 0) 
            $ret['rows'] = $query->asArray()->all();
        return $ret;
    }


    /**
     * 获取全部角色
     */
    public static function getAllRoles($field="role_id,role_name")
    {
        $role = static::find()
            ->select($field)
            ->orderBy('role_id ASC')
            ->where(['status' => 1])
            ->asArray()
            ->all();

        return $role;
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
