<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
/**
 * Common controller
 */
class CommonController extends Controller
{
    public function actionChooseIcon()
    {
        return $this->render('choose-icon');
    }


}