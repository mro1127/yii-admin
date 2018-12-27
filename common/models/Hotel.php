<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel".
 *
 * @property int $id
 * @property string $name 酒店名
 * @property string $meituan_code 美团链接
 * @property string $ctrip_code 携程链接
 * @property int $type 抓取，1美团，2携程
 * @property int $sort 排序
 * @property int $day 多少天内
 * @property string $week 星期几
 * @property string $rules 规则
 * @property string $running 运行机器
 * @property int $hotel_status 抓取状态，0不抓取，1抓取
 * @property int $status 状态
 * @property int $created_at 添加时间
 * @property int $created_by 添加操作人
 * @property int $updated_at 更新时间
 * @property int $updated_by 更新操作人
 */
class Hotel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'sort', 'day', 'hotel_status', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['rules'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['meituan_code', 'ctrip_code'], 'string', 'max' => 500],
            [['week'], 'string', 'max' => 20],
            [['running'], 'string', 'max' => 50],
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
            'id' => 'ID',
            'name' => 'Name',
            'flag' => 'Flag',
            'meituan_code' => 'Meituan Code',
            'ctrip_code' => 'Ctrip Code',
            'type' => 'Type',
            'sort' => 'Sort',
            'day' => 'Day',
            'week' => 'Week',
            'rules' => 'Rules',
            'running' => 'Running',
            'hotel_status' => 'Hotel Status',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public static function getList($param=[], $field=NULL)
    {
        $offset = empty($param['offset'])? 0:$param['offset'];
        $limit = empty($param['limit'])? 20:$param['limit'];
        empty($field) && $field = 'id,name,flag,meituan_code,ctrip_code,type,sort,day,week,rules,running,hotel_status';

        $query = static::find()->select($field)->orderBy('created_at DESC')->offset($offset)->limit($limit);
        $query->andFilterWhere([
            'status'       => 1,
            'type'         => $param['type'],
            'meituan_code' => $param['meituan_code'],
            'ctrip_code'   => $param['ctrip_code'],
        ]);
        $query->andFilterWhere(['like', 'flag', $param['flag']]);

        $ret['total'] = $query->count();
        if ($ret['total'] > 0) {
            $ret['rows'] = $query->asArray()->all();
        }
        return $ret;
    }
}
