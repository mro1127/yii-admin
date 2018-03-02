<?php
namespace backend\modules\user\controllers;

use Yii;
use common\models\User;
use backend\models\UserForm;
use yii\helpers\Url;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetList()
    {
        $get = Yii::$app->request->queryParams;
        $user = (new User())->getList($get);
        return $this->asJson($user);
    }

    public function actionAdd($pid=NULL)
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $model = new UserForm();
            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);
    
            $ret = $model->add();
            if ($ret['status'])
                $ret['url'] = Url::to(['menu/index']);
            return $this->asJson($ret);
        }else{
            $menu = (new User())->getUserList();
            Yii::trace($menu, 'menu');
            return $this->render('add',['menu'=>$menu, 'pid'=>$pid]);
        }
    }

    public function actionEdit($id)
    {
        $request = Yii::$app->request;

        $info = (new User())->findOne($id);
        if (empty($info) || $info['status']!=1) 
            throw new \yii\web\HttpException(400, '找不到该菜单！');

        if ($request->isPost) {
            $model = new UserForm();
            $model->setModel($info);

            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);

            $ret = $model->edit();
            if ($ret['status'])
                $ret['url'] = Url::to(['menu/index']);
            return $this->asJson($ret);
        }else{
            $menu = (new User())->getUserList();
            return $this->render('add',['menu'=>$menu, 'info'=>$info]);
        }
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        $get = $request->get();
        $ret = (new UserForm())->delete($get['id']);
        return $this->asJson($ret);
    }

}
