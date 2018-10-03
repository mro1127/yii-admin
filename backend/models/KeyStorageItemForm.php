<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\KeyStorageItem;
use yii\helpers\ArrayHelper;
/**
 * UserForm model
 *
 * @property string $key
 * @property string $value 值
 * @property string $option 可选值,json
 * @property string $type 类型: config,dict
 * @property string $application 所属应用（backend，frontend...）
 * @property int $is_system 是否系统使用，是则无法删除
 */

class KeyStorageItemForm extends Model
{

    public $key;
    public $value;
    public $option;
    public $type;
    public $application;
    public $is_system;

    private $model;

    public function rules()
    {
        return [
            [['name', 'option', 'type'], 'required'],
            [['key'], 'string', 'max' => 128],
            ['is_system', 'in', 'range' => [0, 1]],

            [['key'], 'required', 'on' => 'add']
        ];
      
    }

    public function scenarios()
    {
        $base = ['value','option','type','application','is_system'];
        return [
            'add' => \yii\helpers\ArrayHelper::merge($base, ['key']),
            'edit' => $base,
        ];
    }

    public function attributeLabels()
    {
        return [
            'key' => 'KEY',
            'value' => '值',
            'option' => '可选值',
            'type' => '类型',
            'application' => '所属应用',
            'is_system' => '是否系统使用',
        ];
    }
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new KeyStorageItem();
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

        if ($this->type == 'dict') {
            $option = [];
            foreach ($this->option as $k => $v) {
                $option[$k+1] = $v;
            }
            $model->option = json_encode($option);
        }else{
            $model->option  = json_encode($this->option);
        }

        $model->value   = $this->value;
        $model->type    = $this->type;
        $model->application = $this->application;
        $model->is_system   = 0;

        if ($model->getIsNewRecord()) {
            $model->key = $this->key;
        }

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
