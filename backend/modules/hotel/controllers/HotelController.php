<?php

namespace backend\modules\hotel\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use common\models\Hotel;
use backend\models\HotelForm;

/**
 * 酒店管理
 */
class HotelController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionGetList()
    {
        $get = Yii::$app->request->queryParams;
        $ret = Hotel::getList($get);
        return $this->asJson($ret);
    }

    public function actionAdd()
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $model = new HotelForm();
            $model->scenario = Yii::$app->controller->action->id;   // 设置场景

            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0,'status' => 0, 'info' => errorsToStr($model->getErrors())]);
            $ret = $model->save();
            if ($ret['status'])
                $ret['url'] = Url::to(['hotel/index']);
            return $this->asJson($ret);
        }else{
            return $this->render('add');
        }
    }

    public function actionEdit($id)
    {
        $request = Yii::$app->request;

        $info = Hotel::findOne($id);
        if (empty($info) || $info['status']!=1) 
            throw new \yii\web\HttpException(400, '找不到该酒店！');

        if ($request->isPost) {
            $model = new HotelForm();
            $model->setModel($info);
            $model->scenario = Yii::$app->controller->action->id;   // 设置场景

            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);

            $ret = $model->save();
            if ($ret['status'])
                $ret['url'] = Url::to(['hotel/index']);
            return $this->asJson($ret);
        }else{
        	$parents = [];
        	$rules = json_decode($info['rules'], true);
        	foreach ($rules as $k => $v) {
        		$v['type'] = trim($v['type'], '[]');
        		$v['up_type'] = trim($v['up_type'], '[]');
        		$v['id'] = $k;
        		$parents[] = $v;
        	}
        	$parents = json_encode($parents);

            return $this->render('add',['info'=>$info, 'parents'=>$parents]);
        }
    }

}
