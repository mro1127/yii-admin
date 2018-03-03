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
 * @property int $created_id
 * @property string $updated_at
 * @property int $updated_id
 * @property int $status
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_sort', 'role_status', 'created_id', 'updated_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['role_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'role_sort' => 'Role Sort',
            'role_status' => 'Role Status',
            'created_at' => 'Created At',
            'created_id' => 'Created ID',
            'updated_at' => 'Updated At',
            'updated_id' => 'Updated ID',
            'status' => 'Status',
        ];
    }

    /**
     * 获取角色信息，包括节点ID
     * @param  int $role_id 角色ID
     */
    public function getRole($role_id)
    {
        $role = $this->find()
            ->where(['role_id' => $role_id])
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
}
