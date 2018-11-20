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
        $this->layout='@app/views/layouts/main';
        return $this->render('choose-icon');
    }


}