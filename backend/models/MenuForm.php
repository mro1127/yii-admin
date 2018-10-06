<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Menu;
use common\models\Node;
/**
 * MenuForm model
 *
 */
class MenuForm extends Model
{
    public $name;
    public $url;
    public $pid;
    public $status;
    public $sort;
    public $icon;
    public $shortcuts;
    public $system;
    public $operate;

    private $model;

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['pid', 'sort'], 'integer'],
            [['status', 'shortcuts'], 'in', 'range' => [0, 1]],
            [['operate'], 'in', 'range' => [1,2,3]],
            [['name', 'system'], 'string', 'max' => 20],
            ['url', 'string', 'max' => 255],
            ['icon', 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name'      => '菜单名称',
            'url'       => '菜单路径',
            'pid'       => '父菜单',
            'status'    => '菜单状态',
            'sort'      => '菜单排序',
            'icon'      => '菜单图标',
            'shortcuts' => '是否快捷操作',
            'operate'   => '打开方式'
        ];
    }
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new Menu();
        }
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }
    /**
     * 添加菜单
     */
    public function add()
    {
        if (!$this->validate()) 
            return ['status'=>0, 'info'=>errorsToStr($this->getErrors())];

        $model = $this->getModel();

        $model->menu_pid       = $this->pid;
        $model->menu_name      = $this->name;
        $model->menu_url       = $this->url;
        $model->menu_sort      = $this->sort;
        $model->menu_status    = $this->status;
        $model->menu_icon      = $this->icon;
        $model->menu_shortcuts = $this->shortcuts;
        $model->menu_system    = $this->system;
        $model->menu_operate   = $this->operate;


        if ($model->menu_pid == 0) {
            //根菜单
            if (empty($this->system)) 
                return ['status'=>0, 'info'=>'系统级菜单必须输入系统名称！'];
            
            $model->menu_level  = 1;
            $model->menu_system = $this->system;
        }else{
            $parent = $model->find()->where(['menu_id' => $model->menu_pid])->asArray()->one();
            if (empty($parent))
                return ['status'=>0, 'info'=>'父菜单不存在，请刷新页面重试！'];

            $model->menu_level = $parent['menu_level'] + 1;
            $model->menu_system= $parent['menu_system'];
        }

        // 菜单关联节点
        if (!empty($model->menu_url) && $model->menu_pid != 0 ) {
            $url = $model->menu_system .'/'. $model->menu_url;
            $model->node_id = (new Node())->url2node($url);
        }

        // 默认排序
        if (empty($model->menu_sort) && $model->menu_pid!=0) {
            $last_sort = $model->find()->where(['menu_pid' => $model->menu_pid])->max('menu_sort');
            $model->menu_sort = $last_sort? $last_sort+1:1;
        }

        if(!$model->save())
            return ['status'=>0, 'info'=>errorsToStr($model->getErrors())];
        return ['status'=>1, 'info'=>'添加成功！'];
    }

    public function edit()
    {
        if (!$this->validate()) 
            return ['status'=>0, 'info'=>errorsToStr($this->getErrors())];

        $model = $this->getModel();

        $model->menu_pid       = $this->pid;
        $model->menu_name      = $this->name;
        $model->menu_url       = $this->url;
        $model->menu_sort      = $this->sort;
        $model->menu_status    = $this->status;
        $model->menu_icon      = $this->icon;
        $model->menu_shortcuts = $this->shortcuts;
        $model->menu_system    = $this->system;
        $model->menu_operate   = $this->operate;
        
        if ($model->menu_pid == 0) {
            //根菜单
            if (empty($this->system)) 
                return ['status'=>0, 'info'=>'系统级菜单必须输入系统名称！'];
            
            $model->menu_level  = 1;
            $model->menu_system = $this->system;
        }else{
            $parent = $model->find()->where(['menu_id' => $model->menu_pid])->asArray()->one();
            if (empty($parent))
                return ['status'=>0, 'info'=>'父菜单不存在，请刷新页面重试！'];

            $level_count = ($parent['menu_level'] + 1) - $model->menu_level;
            $model->menu_level = $parent['menu_level'] + 1;
            $model->menu_system= $parent['menu_system'];
        }

        // 菜单关联节点
        if (!empty($model->menu_url) && $model->menu_pid != 0 ) {
            $url = $model->menu_system .'/'. $model->menu_url;
            $model->node_id = (new Node())->url2node($url);
        }

        // 默认排序
        if (empty($model->menu_sort) && $model->menu_pid!=0) {
            $last_sort = $model->find()->where(['menu_pid' => $model->menu_pid])->max('menu_sort');
            $model->menu_sort = $last_sort? $last_sort+1:1;
        }

        if(!$model->save())
            return ['status'=>0, 'info'=>errorsToStr($model->getErrors())];

        // 后台菜单的level都递增或递减
        if ($level_count != 0) {
            $child = $model->getAllChild($model->menu_id);
            if (!empty($child)) 
                Menu::updateAllCounters( ['menu_level' => $level_count], ['menu_id' => $child] );
        }

        return ['status'=>1, 'info'=>'编辑成功！'];
    }

    public function delete($menu_id)
    {
        // $model = $this->getModel();
        // 递归查找子菜单
        if (!is_array($menu_id)) $menu_id = [$menu_id];
        while (1) {
            $child = Menu::find()->distinct()->select('menu_id')
                    ->where(['menu_pid'=>$menu_id])->andWhere(['not in', 'menu_id', $menu_id])
                    ->asArray()->all();
            if (empty($child)) break;
            $child = array_column($child,'menu_id');
            $menu_id = array_merge($menu_id, $child);
        }
        // 删除菜单
        $data = [
            'updated_at' => time(),
            'updated_by' => Yii::$app->user->id,
            'status' => 0,
        ];
        if(! $num = Menu::updateAll($data, ['menu_id'=>$menu_id]))
            return ['status'=>0, 'info'=>'删除失败，请刷新页面重试！'];
        return ['status'=>1, 'info'=>'删除成功！共删除'.$num.'个菜单。'];
    }

    public static function test()
    {
        
        // 后台菜单的level都加一
    }
}
