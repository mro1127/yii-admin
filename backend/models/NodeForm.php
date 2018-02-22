<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Node;
/**
 * NodeForm model
 *
 */
class NodeForm extends Model
{
    public $name;
    public $path;
    public $pid;
    public $status;
    public $sort;

    private $model;

    public function rules()
    {
        return [
            [['name', 'path'], 'required'],
            [['pid', 'sort'], 'integer'],
            ['status', 'in', 'range' => [0, 1]],
            [['name', 'path'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '节点名称',
            'path' => '节点路径',
            'pid' => '父节点',
            'status' => '节点状态',
            'sort' => '节点排序',
        ];
    }
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new Node();
        }
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }
    /**
     * 添加节点
     * @param  array $data 前端表单
     */
    public function add()
    {
        if (!$this->validate()) 
            return false;

        $model = $this->getModel();

        $model->node_pid    = $this->pid;
        $model->node_name   = $this->name;
        $model->node_path   = $this->path;
        $model->node_sort   = $this->sort;
        $model->node_status = $this->status;

        $model->created_at  = date('Y-m-d H:i:s');
        $model->created_id  = Yii::$app->user->id;
        
        if ($model->node_pid == 0) {
            //根节点
            $model->node_level = 1;
            $model->node_system = $model->node_path;
        }else{
            $parent = $model->find()->where(['node_id' => $model->node_pid])->asArray()->one();
            if (empty($parent)){
                $this->addError('error', '父节点不存在，请刷新页面重试！');
                return false;
            }
            $model->node_level = $parent['node_level'] + 1;
            $model->node_system= $parent['node_system'];
        }

        // 默认排序
        if (empty($model->node_sort)) {
            $last_sort = $model->find()->where(['node_pid' => $model->node_pid])->max('node_sort');
            $model->node_sort = $last_sort? $last_sort+1:1;
        }

        if(!$model->save()){
            $this->addError('error', '添加失败！请重试。');
            return false;
        }
        return true;
    }

    public function edit()
    {
        if (!$this->validate()) 
            return false;

        $model = $this->getModel();

        $model->node_pid    = $this->pid;
        $model->node_name   = $this->name;
        $model->node_path   = $this->path;
        $model->node_sort   = $this->sort;
        $model->node_status = $this->status;

        $model->created_at  = date('Y-m-d H:i:s');
        $model->created_id  = Yii::$app->user->id;

        if ($model->node_pid == 0) {
            //根节点
            $model->node_level = 1;
            $model->node_system = $model->node_path;
        }else{
            $parent = $model->find()->where(['node_id' => $model->node_pid])->asArray()->one();
            if (empty($parent)){
                $this->addError('error', '父节点不存在，请刷新页面重试！');
                return false;
            }
            $model->node_level = $parent['node_level'] + 1;
            $model->node_system= $parent['node_system'];
        }

        if(!$model->save()){
            $this->addError('error', '添加失败！请重试。');
            return false;
        }
        return true;
    }

    public function delete($node_id)
    {
        $model = $this->getModel();
        // 递归查找子节点
        if (!is_array($node_id)) $node_id = [$node_id];
        while (1) {
            $child = $model->find()->distinct()->select('node_id')
                    ->where(['node_pid'=>$node_id])->andWhere(['not in', 'node_id', $node_id])
                    ->asArray()->all();
            if (empty($child)) break;
            $child = array_column($child,'node_id');
            $node_id = array_merge($node_id, $child);
        }

        // 删除节点
        if(! $num = $model->deleteAll(['node_id'=>$node_id]))
            return ['status'=>0, 'info'=>'删除失败，请刷新页面重试！'];
        return ['status'=>1, 'info'=>'删除成功！共删除'.$num.'个节点。'];
    }

}
