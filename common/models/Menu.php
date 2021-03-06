<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $menu_id
 * @property integer $menu_pid
 * @property string $menu_name
 * @property string $menu_icon
 * @property integer $menu_sort
 * @property string $menu_url
 * @property integer $menu_level
 * @property integer $menu_status
 * @property string $menu_system
 * @property integer $node_id
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $status
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            ['class'=>\yii\behaviors\TimestampBehavior::className()],
            ['class'=>\yii\behaviors\BlameableBehavior::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_name'], 'required'],
            [['menu_pid', 'menu_sort', 'menu_level', 'menu_status', 'node_id', 'menu_operate'], 'integer'],
            [['menu_name', 'menu_system'], 'string', 'max' => 20],
            [['menu_icon'], 'string', 'max' => 50],
            [['menu_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => '菜单ID',
            'menu_pid' => '父菜单',
            'menu_name' => '菜单名称',
            'menu_icon' => '菜单图标',
            'menu_sort' => '菜单排序',
            'menu_url' => '菜单路径',
            'menu_level' => '菜单等级',
            'menu_status' => '菜单状态',
            'menu_system' => '所属系统',
            'node_id' => '关联节点ID',
            'created_at' => 'Created At',
            'created_by' => 'Created BY',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated BY',
            'status' => 'Status',
            'menu_operate' => '打开方式'
        ];
    }

    public static function getMenu($node = [], $system=[], $filter=TRUE, $status=[])
    {
        $where = [];
        $where['status'] = 1;
        
        if (!empty($node)) {
            $node[] = 0;
            $where['node_id'] = $node;
        }
        if (!empty($system)) $where['menu_system'] = $system;
        if (!empty($status)) $where['menu_status'] = $status;

        $menu = static::find()
                ->asArray()
                ->orderBy('menu_level desc, menu_sort asc, menu_system asc')
                ->where($where)
                // ->createCommand()->getRawSql();
                ->all();
        // p($menu);
        $tree = static::menu2tree($menu);
        if ($filter) $tree = static::menuFilter($tree);

        if (is_array($system)) {
            foreach ($tree as $k => $v) {
                $tree[$v['menu_system']] = $v;
                unset($tree[$k]);
            }
        }else{
            $tree = array_pop($tree);
            $tree = $tree['_child'];
        }
        return $tree;
    }

    protected static function menu2tree($menu)
    {
        $tree = [];
        foreach ($menu as $k => $v) {
            $temp =  $v;
            if (!empty($tree[$v['menu_id']])) {
                $temp['_child'] = $tree[$v['menu_id']]['_child'];
            }
            if ($v['menu_pid'] == 0) {
                $tree[$v['menu_pid']][$v['menu_id']] = $temp;
            }else{
                $tree[$v['menu_pid']]['_child'][$v['menu_id']] = $temp;
            }
            unset($tree[$v['menu_id']]);
        }
        return $tree[0];  
    }

    /**
     * 过滤树形菜单
     * 没有子菜单&&没有url 的菜单删除
     * @param [array] $menu 树形菜单
     */
    protected static function menuFilter($menu)
    {
        foreach ($menu as $k => $v) {
            if (!empty($v['_child'])) 
                $menu[$k]['_child'] = static::menuFilter($v['_child']);
            if (empty($menu[$k]['_child']) && empty($v['menu_url'])) 
                unset($menu[$k]);
        }
        return $menu;
    }

 /**
     * 获取平行带层级的菜单列表，可用于select框
     * @param  array  $node   节点
     * @param  array  $system 系统
     */
    public function getMenuList($node=[], $system=[], $status=[])
    {
        $menu = $this->getMenu($node, $system, 0, $status);
        $menu = $this->tree2list($menu);
        return $menu;
    }
    /**
     * 
     * 将树形结构的菜单转为有层级的list
     * @param  array $menu 树状菜单
     * @param  string $tab 缩进
     * @return array       平行有层级的数组
     */
    protected function tree2list($menu, $tab = '')
    {
        $arr = [];
        $key = array_keys($menu);
        $end_key = array_pop($key);
        foreach ($menu as $k => $v) {
            $is_end = $end_key==$k? TRUE : FALSE;
            $row = array(
                    'id'     => $v['menu_id'],
                    'pid'    => $v['menu_pid'],
                    'name'   => $v['menu_name'],
                    'icon'   => $v['menu_icon'],
                    'sort'   => $v['menu_sort'],
                    'url'    => $v['menu_url'],
                    'level'  => $v['menu_level'],
                    'status' => $v['menu_status'],
                    'system' => $v['menu_system'],
                    'node_id'=> $v['node_id'],
                    'title'  => $v['menu_name'],
                );

            if ($row['level'] != 1) {     // 一级菜单不缩进
                $code = $is_end? '└' : '├';        // 最后条数据用└ ， 其他用├
                $code = str_repeat('&nbsp;',5) . $code;
                $code = $tab . $code;
                $row['title'] = $code .str_repeat('&nbsp;',2). $row['title'];
            }

            $arr[] = $row;              //处理完成放进列表

            if (!empty($v['_child'])) {
                $c_tab = $tab;
                if ($row['level'] != 1 ) {
                    if ($is_end) {
                        $c_tab .= str_repeat('&nbsp;',7);
                    }else{
                        $c_tab .= str_repeat('&nbsp;',5) . '│';
                    }
                }
                $child = $this->tree2list($v['_child'], $c_tab);
                foreach ($child as $val) 
                    $arr[] = $val;
            }
        }
        return $arr;
    }

    public static function getAllChild($menu_id)
    {
        $child = [];
        $parent_t = $menu_id;
        while (1) {
            $child_t = static::find()->select('menu_id')->where(['menu_pid' => $parent_t])->asArray()->all();
            if (empty($child_t)) break;
            $parent_t = array_column($child_t, 'menu_id');
            $child = \yii\helpers\ArrayHelper::merge($child, $parent_t);
        }
        return $child;
    }

    public static function updateNode()
    {
        $menu = static::find()->where(['status' => 1])->all();
        foreach ($menu as $k => $v) {
            if (empty($v->menu_url)) {
                $node_id = 0;
            }else{
                $node_id = Node::url2node($v->menu_system .'/'. $v->menu_url);
            }
            if ($v->node_id !== $node_id) {
                $v->node_id = $node_id;
                $v->save();
            }
        }
    }
}
