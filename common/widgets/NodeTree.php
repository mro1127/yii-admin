<?php
namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class NodeTree extends Widget
{
    public $node;
    public $checked;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $html = $this->_html($this->node);
        
        return $html;
        return Html::encode($html);
    }

    protected function _html($node)
    {
        $html = '<ul>';
        if (empty(array_column($node, '_child'))) {
            $html .= '<li>';
            foreach ($node as $k => $v) {
                if (in_array($v['node_id'], $this->checked)) {
                    $html .= '<label><input type="checkbox" class="minimal node" name="node[]" value="'.$v['node_id'].'" checked> '.$v['node_name'].'</label>';
                }else{
                    $html .= '<label><input type="checkbox" class="minimal node" name="node[]" value="'.$v['node_id'].'"> '.$v['node_name'].'</label>';
                }
            }
            $html .= '</li>';
        }else{
            foreach ($node as $k => $v) {
                $html .= '<li>';
                if (in_array($v['node_id'], $this->checked)) {
                    $html .= '<label><input type="checkbox" class="minimal node" name="node[]" value="'.$v['node_id'].'" checked> '.$v['node_name'].'</label>';
                }else{
                    $html .= '<label><input type="checkbox" class="minimal node" name="node[]" value="'.$v['node_id'].'"> '.$v['node_name'].'</label>';
                }
                if (!empty($v['_child'])) {
                    $html .= '<span class="switch"><i class="fa fa-minus-square"></i></span>';
                    $html .= $this->_html($v['_child']);
                }
                $html .= '</li>';
            }
        }
        $html .= '</ul>';
        return $html;
    } 
}