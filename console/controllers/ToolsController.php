<?php 
namespace console\controllers;

use yii\console\Controller;
use common\models\Menu;

class ToolsController extends Controller
{
    public function actionSetMenuNode()
    {
        Menu::updateNode();
    }
}