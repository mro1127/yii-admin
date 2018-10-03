<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_storage_item".
 *
 * @property int $id
 * @property string $key
 * @property string $value 值
 * @property string $option 可选值,json
 * @property string $type 类型: config,dict
 * @property string $application 所属应用（backend，frontend...）
 * @property int $is_system 是否系统使用，是则无法删除
 * @property int $status 数据状态
 * @property int $created_at 添加时间
 * @property int $created_by 添加操作人
 * @property int $updated_at 更新时间
 * @property int $updated_by 更新操作人
 */
class KeyStorageItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'key_storage_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['option'], 'string'],
            [['is_system', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['key'], 'string', 'max' => 128],
            [['value'], 'string', 'max' => 100],
            [['type', 'application'], 'string', 'max' => 20]
        ];
    }

    public function behaviors()
    {
        return [
            ['class'=>\yii\behaviors\TimestampBehavior::className()],
            ['class'=>\yii\behaviors\BlameableBehavior::className()],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'key' => 'Key',
            'value' => '值',
            'option' => '可选值',
            'type' => '类型',
            'application' => '所属应用',
            'is_system' => '是否系统使用',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * 检查key唯一性
     * @Author   Armo
     * @DateTime 2018-10-01
     * @param    string     $key 
     * @return   boolean
     */
    public static function checkKeyUnique($key)
    {
        return empty(static::findOne(['key' => $key, 'status' =>1]));
    }

    public function getList($param=[], $field=NULL)
    {
        $offset = empty($param['offset'])? 0:$param['offset'];
        $limit = empty($param['limit'])? 20:$param['limit'];
        empty($field) && $field = 'id,key,value,option,type,application,is_system';

        $query = static::find()->select($field)->orderBy('created_at DESC')->offset($offset)->limit($limit);
        $query->andFilterWhere([
            'status' => 1,
            'type' => $param['type'],
            'application' => $param['application'],
            'is_system' => $param['is_system'],
        ]);
        $query->andFilterWhere(['like', 'key', $param['key']]);

        $ret['total'] = $query->count();
        if ($ret['total'] > 0) {
            $ret['rows'] = $query->asArray()->all();
        }
        return $ret;
    }
}
