<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role_user".
 *
 * @property int $role_id
 * @property int $user_id
 */
class RoleUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id'], 'required'],
            [['role_id', 'user_id'], 'integer'],
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
            'user_id' => '用户ID',
        ];
    }
}
