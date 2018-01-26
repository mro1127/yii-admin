<?php
namespace common\widgets;

use Yii;
use yii\helpers\Url;

// <li class="treeview">
//     <a href="#">
//         <i class="fa fa-share"></i> <span>Multilevel</span>
//         <span class="pull-right-container">
//             <i class="fa fa-angle-left pull-right"></i>
//         </span>
//     </a>
//     <ul class="treeview-menu">
//         <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
//         <li class="treeview">
//             <a href="#"><i class="fa fa-circle-o"></i> Level One
//                 <span class="pull-right-container">
//                     <i class="fa fa-angle-left pull-right"></i>
//                 </span>
//             </a>
//             <ul class="treeview-menu">
//                 <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
//                 <li class="treeview">
//                     <a href="#"><i class="fa fa-circle-o"></i> Level Two
//                         <span class="pull-right-container">
//                             <i class="fa fa-angle-left pull-right"></i>
//                         </span>
//                     </a>
//                     <ul class="treeview-menu">
//                         <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
//                         <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
//                     </ul>
//                 </li>
//             </ul>
//         </li>
//         <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
//     </ul>
// </li>
class Menu extends \yii\bootstrap\Widget 
{
    public $menu;
    protected $shortcuts = array();

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $html = '<ul class="sidebar-menu" data-widget="tree">';
        $html .= '<li class="header">菜单</li>';
        $menu_tree_html = $this->getMenuTreeHtml($this->menu);
        $html .= $menu_tree_html;
        if (!empty($this->shortcuts)) {
            $html .= '<li class="header">快捷操作</li>';
            foreach ($this->shortcuts as $k => $v) {
                $html .= '<li><a href="'.Url::to([$v['menu_url']]).'"><i class="'.$v['menu_icon'].'"></i> <span>'.$v['menu_name'].'</span></a></li>';
            }
        }
        $html .= '</ul>';
        return $html;
    }

    protected function getMenuTreeHtml($menu)
    {
        Yii::trace($menu);
        $html = '';
        foreach ($menu as $k => $v) {
            if (empty($v['_child'])) {
                $html .= '<li><a href="'.Url::to([$v['menu_url']]).'"><i class="'.$v['menu_icon'].'"></i> <span>'.$v['menu_name'].'</span></a></li>';
                if ($v['menu_shortcuts'] == 1) {
                    $this->shortcuts[] = $v;
                }
            }else{
                $html.= '<li class="treeview">
                            <a href="#">
                                <i class="'.$v['menu_icon'].'"></i> <span>'.$v['menu_name'].'</span>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">'.$this->getMenuTreeHtml($v['_child']).'</ul>
                        </li>';
            }
        }
        return $html;
    } 
}