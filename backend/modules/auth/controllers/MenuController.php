<?php
namespace backend\modules\auth\controllers;

use Yii;
use yii\web\Controller;
use common\models\Menu;
use backend\models\MenuForm;
use yii\helpers\Url;
use yii\web\HttpException;

class MenuController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetList()
    {
        $menu = (new Menu())->getMenuList([],[],[0,1]);
        return $this->asJson($menu);
    }

    public function actionAdd($pid=NULL)
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $model = new MenuForm();
            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);
    
            $ret = $model->add();
            if ($ret['status'])
                $ret['url'] = Url::to(['menu/index']);
            return $this->asJson($ret);
        }else{
            $menu = (new Menu())->getMenuList();
            Yii::trace($menu, 'menu');
            return $this->render('add',['menu'=>$menu, 'pid'=>$pid]);
        }
    }

    public function actionEdit($id)
    {
        $request = Yii::$app->request;

        $info = (new Menu())->findOne($id);
        if (empty($info) || $info['status']!=1) 
            throw new HttpException(400, '找不到该菜单！');

        if ($request->isPost) {
            $model = new MenuForm();
            $model->setModel($info);

            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);

            $ret = $model->edit();
            if ($ret['status'])
                $ret['url'] = Url::to(['menu/index']);
            return $this->asJson($ret);
        }else{
            $menu = (new Menu())->getMenuList();
            return $this->render('add',['menu'=>$menu, 'info'=>$info]);
        }
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        $get = $request->get();
        $ret = (new MenuForm())->delete($get['id']);
        return $this->asJson($ret);
    }

}
