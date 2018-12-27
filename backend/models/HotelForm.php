<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Hotel;
use yii\helpers\ArrayHelper;
/**
 * hotel form model
 */

class HotelForm extends Model
{

    public $name;
    public $flag;
    public $meituan_code;
    public $ctrip_code;
    public $type;
    public $sort;
    public $day;
    public $week;
    public $rules;
    public $parents;
    public $hotel_status;

    private $model;

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            ['hotel_status', 'in', 'range' => [0, 1]],
            ['type', 'in', 'range' => [1, 2]],
        ];
      
    }

    public function scenarios()
    {
        $base = ['name','flag','meituan_code','ctrip_code','type','sort','day','week','rules','hotel_status','parents'];
        return [
            'add' => $base,
            'edit' => $base,
        ];
    }

    public function attributeLabels()
    {
        return [

        ];
    }
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new Hotel();
        }
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }
    /**
     * 添加角色
     * @param  array $data 前端表单
     */
    public function save()
    {
        if (!$this->validate()) 
            return ['status'=>0, 'info'=>errorsToStr($this->getErrors())];
        $model = $this->getModel();

        $model->name         = $this->name;
        $model->flag         = $this->flag;
        $model->type         = $this->type;
        $model->meituan_code = $this->meituan_code;
        $model->ctrip_code   = $this->ctrip_code;
        $model->sort         = $this->sort;
        $model->day          = $this->day;
        $model->week         = implode(',', $this->week);
        $model->hotel_status = $this->hotel_status;

        $rules = [];
        // p($this->parents);
        foreach ($this->parents as $k => $v) {
            $rules[$v['id']] = [
                'purchase'  => $v['purchase'],
                'breakfast' => $v['breakfast'],
                'agent'     => $v['agent'],
                'decision'  => 'min'
            ];
            !empty($v['type'])    && $rules[$v['id']]['type']    = "[{$v['type']}]";
            !empty($v['up_type']) && $rules[$v['id']]['up_type'] = "[{$v['up_type']}]";
        }
        $model->rules = json_encode($rules);

        if(!$model->save())
            return ['status'=>0, 'info'=>errorsToStr($model->getErrors())];
        return ['status'=>1, 'info'=>'提交成功！'];
    }


    public function delete($id)
    {
        // 删除
        $data = [
            'updated_at' => time(),
            'updated_by' => Yii::$app->user->id,
            'status' => 0,
        ];
        if(! $num = KeyStorageItem::updateAll($data, ['id'=>$id, 'is_system'=>0]))
            return ['status'=>0, 'info'=>'删除失败，请刷新页面重试！'];
        return ['status'=>1, 'info'=>'删除成功！共删除'.$num.'个数据字典。'];
    }

}
