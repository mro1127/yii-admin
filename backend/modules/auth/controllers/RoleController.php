<?php

namespace backend\modules\auth\controllers;

use Yii;
use yii\helpers\Url; 
use common\models\Role;
use common\models\Node;
use backend\models\RoleForm;

class RoleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetList()
    {
        $get = Yii::$app->request->queryParams;
        $ret = (new Role())->getList($get);
        return $this->asJson($ret);
    }

    public function actionAdd()
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $model = new RoleForm();
            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);

            $model->scenario = Yii::$app->controller->action->id;   // 设置场景
            $ret = $model->save();
            if ($ret['status'])
                $ret['url'] = Url::to(['role/index']);
            return $this->asJson($ret);
        }else{
            $this->layout='@app/views/layouts/main';
            return $this->render('add');
        }
    }

    public function actionEdit($id)
    {
        $request = Yii::$app->request;

        $info = (new Role())->findOne($id);
        if (empty($info) || $info['status']!=1) 
            throw new \yii\web\HttpException(400, '找不到该角色！');

        if ($request->isPost) {
            $model = new RoleForm();
            $model->setModel($info);

            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);

            $model->scenario = Yii::$app->controller->action->id;   // 设置场景
            $ret = $model->save();
            if ($ret['status'])
                $ret['url'] = Url::to(['role/index']);
            return $this->asJson($ret);
        }else{
            $this->layout='@app/views/layouts/main';
            return $this->render('add',['info'=>$info]);
        }
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        if ($request->isGet) $id = $request->get('id');
        if ($request->isPost) $id = $request->post('id');
        
        $ret = (new RoleForm())->delete($id);
        return $this->asJson($ret);
    }

    public function actionAllot($id)
    {
        $request = Yii::$app->request;

        $info = (new Role())->findOne($id);
        if (empty($info) || $info['status']!=1) 
            throw new \yii\web\HttpException(400, '找不到该角色！');

        if ($request->isPost) {
            $model = new RoleForm();
            $post = $request->post();
            $ret = $model->allot($id, $post['node']);
            if ($ret['status'])
                $ret['url'] = Url::to(['role/index']);
            return $this->asJson($ret);
        }else{
            $role = (new Role())->getRoleInfo($id);
            $node = (new Node())->getNode();
            return $this->render('allot',['role'=>$role, 'node'=>$node]);
        }
    }
}
