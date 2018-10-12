<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use backend\models\LoginForm;
use common\models\Menu;
use common\models\User;
/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        // 获取自己的node
        $nodes = User::getMyNodes();
        $menu = (new Menu())->getMenu($nodes, Yii::$app->id);
        return $this->render('index', ['menu'=>$menu]);
    }

    public function actionHome()
    {
        return $this->render('home');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) 
            return $this->goHome();

        $request = Yii::$app->request;
        if (!$request->isPost) 
            return $this->render('login');

        $model = new LoginForm();
        $post = $request->post();
        if ($model->load($request->post(), '') && $model->login()) {
            $ret = ['status' => 1, 'info' => '登录成功！','url' => Yii::$app->getHomeUrl()];
        }else{
            $ret = ['status' => 0, 'info' => errorsToStr($model->getErrors())];
        }
        return $this->asJson($ret);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        if (Yii::$app->request->isAjax) 
            return $this->asJson(['status'=>1, 'info'=>'退出成功！', 'url'=>Url::to(['site/login'])]);
        return $this->redirect(['site/login']);
    }

}