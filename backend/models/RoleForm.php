<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Role;
use common\models\RoleNode;
/**
 * RoleForm model
 *
 */
class RoleForm extends Model
{
    public $name;
    public $status;
    public $sort;

    private $model;

    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            ['sort', 'integer'],
            ['status', 'in', 'range' => [0, 1]],
            ['name', 'string', 'max' => 20],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '角色名称',
            'status' => '角色状态',
            'sort' => '角色排序',   
        ];
    }
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new Role();
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
    public function add()
    {
        if (!$this->validate()) 
            return ['status'=>0, 'info'=>errorsToStr($this->getErrors())];

        $model = $this->getModel();

        $model->role_name   = $this->name;
        $model->role_sort   = $this->sort;
        $model->role_status = $this->status;

        $model->created_at  = date('Y-m-d H:i:s');
        $model->created_id  = Yii::$app->user->id;
        
        if(!$model->save())
            return ['status'=>0, 'info'=>errorsToStr($model->getErrors())];
        
        return ['status'=>1, 'info'=>'添加成功！'];
    }

    public function edit()
    {
        if (!$this->validate()) 
            return ['status'=>0, 'info'=>errorsToStr($this->getErrors())];

        $model = $this->getModel();

        $model->role_name   = $this->name;
        $model->role_sort   = $this->sort;
        $model->role_status = $this->status;

        $model->updated_at  = date('Y-m-d H:i:s');
        $model->updated_id  = Yii::$app->user->id;

        if(!$model->save())
            return ['status'=>0, 'info'=>errorsToStr($model->getErrors())];
        
        return ['status'=>1, 'info'=>'编辑成功！'];
    }

    public function delete($role_id)
    {
        $model = $this->getModel();

        // 删除角色
        $data = [
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_id' => Yii::$app->user->id,
            'status' => 0,
        ];
        if(! $num = Role::updateAll($data, ['role_id'=>$role_id]))
            return ['status'=>0, 'info'=>'删除失败，请刷新页面重试！'];
        return ['status'=>1, 'info'=>'删除成功！共删除'.$num.'个角色。'];
    }

    public function allot($role_id, $node)
    {
        if (empty($role_id)) 
            return ['status'=>0, 'info'=>'role_id不能为空！'];
        
        // 删除旧授权节点
        RoleNode::deleteAll('role_id = '.$role_id);
        // 添加新授权节点
        if (!empty($node)) {
            $data = [];
            foreach ($node as $k => $v) 
                $data[] = [$role_id, $v];
            Yii::$app->db->createCommand()->batchInsert(RoleNode::tableName(), ['role_id', 'node_id'], $data)->execute();
        }
        return ['status'=>1, 'info'=>'授权成功！'];
    }
}
