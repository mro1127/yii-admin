<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role_node".
 *
 * @property int $role_id
 * @property int $node_id
 */
class RoleNode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role_node}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id'], 'required'],
            [['role_id', 'node_id'], 'integer'],
            [['role_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => '角色ID',
            'node_id' => '节点ID',
        ];
    }
}
