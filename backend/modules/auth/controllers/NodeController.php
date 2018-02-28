<?php

namespace backend\modules\auth\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;    
use common\models\Node;
use backend\models\NodeForm;
use yii\web\HttpException;

class NodeController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetList()
    {
        $node = (new Node())->getNodeList();
        return $this->asJson($node);
    }

    public function actionAdd($pid=NULL)
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $model = new NodeForm();
            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);
    
            $ret = $model->add();
            if ($ret['status'])
                $ret['url'] = Url::to(['node/index']);
            return $this->asJson($ret);
        }else{
            $node = (new Node())->getNodeList();
            return $this->render('add',['node'=>$node, 'pid'=>$pid]);
        }
    }

    public function actionEdit($id)
    {
        $request = Yii::$app->request;

        $info = (new Node())->findOne($id);
        if (empty($info) || $info['status']!=1) 
            throw new HttpException(400, '找不到该节点！');

        if ($request->isPost) {
            $model = new NodeForm();
            $model->setModel($info);

            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);
            
            $ret = $model->edit();
            if ($ret['status'])
                $ret['url'] = Url::to(['node/index']);
            return $this->asJson($ret);
        }else{
            $node = $info->getNodeList();
            return $this->render('add',['node'=>$node,'info'=>$info]);
        }
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        $get = $request->get();
        $ret = (new NodeForm())->delete($get['id']);
        return $this->asJson($ret);
    }
}
