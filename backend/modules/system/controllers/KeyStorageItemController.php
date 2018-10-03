<?php
namespace backend\modules\system\controllers;

use Yii;
use backend\models\KeyStorageItemForm;
use common\models\KeyStorageItem;
use yii\helpers\Url;

class KeyStorageItemController extends \yii\web\Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetList()
    {
        $get = Yii::$app->request->queryParams;
        $user = (new KeyStorageItem())->getList($get);
        return $this->asJson($user);
    }

    public function actionAdd()
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $model = new KeyStorageItemForm();
            $model->scenario = Yii::$app->controller->action->id;   // 设置场景
            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);
    
            $ret = $model->save();
            if ($ret['status'])
                $ret['url'] = Url::to(['index']);
            return $this->asJson($ret);
        }else{
            return $this->render('add');
        }
    }

    public function actionEdit($id)
    {
        $request = Yii::$app->request;

        $info = (new KeyStorageItem())->findOne($id);
        if (empty($info) || $info['status']!=1) 
            throw new \yii\web\HttpException(400, '找不到该用户！');

        if ($request->isPost) {
            $model = new KeyStorageItemForm();
            $model->setModel($info);

            $model->scenario = Yii::$app->controller->action->id;   // 设置场景
            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);

            $ret = $model->save();
            if ($ret['status'])
                $ret['url'] = Url::to(['index']);
            return $this->asJson($ret);
        }else{
            $info['option'] = json_decode($info['option'], true);
            return $this->render('add',['info'=>$info]);
        }
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        if ($request->isGet) $id = $request->get('id');
        if ($request->isPost) $id = $request->post('id');
        $ret = (new KeyStorageItemForm())->delete($id);
        return $this->asJson($ret);
    }

    public function actionCheckKey($key)
    {
        $request = Yii::$app->request;
        if(KeyStorageItem::checkKeyUnique($key))
            return 'true';
        return 'false';
    }
}
