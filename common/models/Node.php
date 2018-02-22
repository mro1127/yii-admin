<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "node".
 *
 * @property integer $node_id
 * @property string $node_name
 * @property string $node_path
 * @property integer $node_pid
 * @property integer $node_level
 * @property integer $node_status
 * @property string $node_system
 * @property integer $node_sort
 * @property integer $created_at
 * @property integer $created_id
 * @property integer $updated_at
 * @property integer $updated_id
 * @property integer $status
 */
class Node extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_name', 'node_system'], 'required'],
            [['node_pid', 'node_level', 'node_status', 'node_sort', 'created_id', 'updated_id'], 'integer'],
            [['node_name', 'node_system'], 'string', 'max' => 50],
            [['node_path'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'node_id' => '节点ID',
            'node_name' => '节点名称',
            'node_path' => '节点路径',
            'node_pid' => '父节点',
            'node_level' => '节点层级',
            'node_status' => '节点状态',
            'node_system' => '节点系统',
            'node_sort' => '节点排序',
            'created_at' => 'Created At',
            'created_id' => 'Created ID',
            'updated_at' => 'Updated At',
            'updated_id' => 'Updated ID',
        ];
    }

    /**
     * 获取树状节点，可筛选
     * @param  array  $role   角色
     * @param  array  $system 系统
     */
    public function getNode($role=[], $system=[], $status=[])
    {
        $where = [];
        if (!empty($role)) {
            $node_id = $this->getNodeId($role);
            if (empty($node_id)) return NULL;
            $where['node_id'] = $node_id;
        }
      
        if (!empty($system)) $where['node_system'] = $system;
        if (!empty($status)) $where['node_status'] = $status;
        $node = $query = $this->find()
                    ->asArray()
                    ->orderBy('node_level desc, node_sort asc,node_system asc')
                    ->select('node_id,node_name,node_path,node_pid,node_level,node_status,node_system,node_sort')
                    ->where($where)
                    ->all();
                    // ->createCommand()->getRawSql();
        if (empty($node)) return [];

        $tree = $this->node2tree($node);
        if (empty($tree)) return [];
        foreach ($tree as $k => $v) {
            $tree[$v['node_system']] = $v;
            unset($tree[$k]);
        }
        return $tree;
    }

    /**
     * 将从数据库查出来的节点数据转为树状
     * @param  array $node 数据库查询出来的数组
     * @return array       树状节点
     */
    protected function node2tree($node)
    {
        $tree = [];
        foreach ($node as $k => $v) {
            $temp =  $v;
            if (!empty($tree[$v['node_id']])) {
                $temp['_child'] = $tree[$v['node_id']]['_child'];
            }
            if ($v['node_pid'] == 0) {
                $tree[$v['node_pid']][$v['node_id']] = $temp;
            }else{
                $tree[$v['node_pid']]['_child'][$v['node_id']] = $temp;
            }
            unset($tree[$v['node_id']]);
        }
        return $tree[0];  
    }

    /**
     * 获取平行带层级的节点列表，可用于select框
     * @param  array  $role   角色
     * @param  array  $system 系统
     */
    public function getNodeList($role=[], $system=[])
    {
        $node = $this->getNode($role, $system);
        $node = $this->tree2list($node);
        return $node;
    }
    /**
     * 将树形结构的节点转为有层级的list
     * @param  array $node 树状节点
     * @param  string $tab 缩进
     * @return array       平行有层级的数组
     */
    protected function tree2list($node, $tab = '')
    {
        $arr = [];
        $key = array_keys($node);
        $end_key = array_pop($key);
        foreach ($node as $k => $v) {
            $is_end = $end_key==$k? TRUE : FALSE;
            $row = array(
                    'id'     => $v['node_id'],
                    'name'   => $v['node_name'],
                    'path'   => $v['node_path'],
                    'pid'    => $v['node_pid'],
                    'level'  => $v['node_level'],
                    'status' => $v['node_status'],
                    'system' => $v['node_system'],
                    'sort'   => $v['node_sort'],
                    'title'  => $v['node_name'],
                );

            if ($row['level'] != 1) {     // 一级节点不缩进
                $code = $is_end? '└' : '├';        // 最后条数据用└ ， 其他用├
                $code = str_repeat('&nbsp;',5) . $code;
                $code = $tab . $code;
                $row['title'] = $code .str_repeat('&nbsp;',2). $row['title'];
                $row['path'] = $code .str_repeat('&nbsp;',2). $row['path'];
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
    /**
     * 获取节点ID
     * @param  array/string $role 角色ID
     * @return array       节点ID
     */
    public function getNodeId($role=[])
    {
        !empty($role) && $where['role_id'] = $role;
        $node_id = RoleNode::find()->distinct()->select('node_id')->where($where)->asArray()->all();
        $node_id = array_column($node_id,'node_id');
        return $node_id;
    }

    /**
     * 获取key-value 为 id=>url的节点数组，可筛选
     * @param  array  $role   角色
     * @param  array  $system 系统
     * @param  array  $status 节点状态
     */
    public function getNodeUrl($role=[], $system=[], $status=[])
    {
        $node = $this->getNode($role, $system, $status);
        $node = $this->tree2url($node);
        return $node;
    }

    /**
     * 将树形结构的节点转为 key-value 为 id=>url的节点数组
     * @param  array $node 树状节点
     * @return array       key-value 为 id=>url的节点数组
     */
    protected function tree2url($node, $p='')
    {
        $arr = [];
        if (empty($node)) return [];
        foreach ($node as $k => $v) {
            $path = $p . $v['node_path'];
            $path = strtoupper($path);
            $arr[$v['node_id']] = $path;              //处理完成放进列表

            if (!empty($v['_child'])) {
                $child = $this->tree2url($v['_child'], $path.'/');
                foreach ($child as $key => $val) 
                    $arr[$key] = $val;
            }
        }
        return $arr;
    }

    /**
     * 根据url获取节点，无则添加
     * @param  string $url  url
     * @return int          节点ID
     */
    public function url2node($url)
    {
        $paths  = explode("/", $url);
        $tree   = $this->getNode([], $paths[0]);
        $id     = 0;
        $pid    = 0;
        $level  = 0;
        $system = $paths[0];
        while ($path = array_shift($paths)) {
            $level ++;
            $find = 0;
            foreach ($tree as $k => $v) {
                if ($v['node_path'] == $path) {
                    $pid  = $v['node_id'];
                    $id   = $v['node_id'];
                    $tree = empty($v['_child'])? []:$v['_child'];
                    $find = 1;
                    break;
                }
            }

            if ($find) continue;
            // 找不到则添加
            $node = new self();
            $node->node_name   = $path;
            $node->node_path   = $path;
            $node->node_pid    = $pid;
            $node->node_level  = $level;
            $node->node_status = 1;
            $node->node_sort   = 100;
            $node->node_system = $system;
            $node->created_at  = time();
            if (defined('USER_ID')) $node->created_id = USER_ID;
            $node->insert();
            $pid = $node->node_id;
            $id  = $node->node_id;
            $tree = [];
        }
        return $id;
    }

}
