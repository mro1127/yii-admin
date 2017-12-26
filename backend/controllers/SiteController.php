<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\User;
use yii\helpers\Url;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * Displays homepage.   
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) 
            return $this->redirect(['site/login']);

        return $this->render('index');
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) 
            return $this->goHome();
        
        $request = Yii::$app->request;
        if ($request->isPost) {
            $post = $request->post();
            $user = new User();
            $ret = $user->loginByUsername($post['username'], $post['password']);
            if ($ret['status']) {
                $ret['url'] = Yii::$app->getHomeUrl();
            }
            return $this->asJson($ret);
        }else{
            return $this->render('login');
        }
    }

    public function actionLogout()
    {
        if (Yii::$app->user->isGuest) 
            return $this->redirect(['site/login']);
        
        Yii::$app->user->logout();
        if (Yii::$app->request->isAjax) 
            return $this->asJson(['status'=>1, 'info'=>'退出成功！', 'url'=>Url::to(['site/login'])]);
        return $this->redirect(['site/login']);
    }

}
