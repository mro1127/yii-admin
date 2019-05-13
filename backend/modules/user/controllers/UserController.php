<?php
namespace backend\modules\user\controllers;

use Yii;
use common\models\User;
use common\models\Role;
use backend\models\UserForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use trntv\filekit\actions\UploadAction;
use Intervention\Image\ImageManagerStatic;

class UserController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'face-upload' => [
                'class' => UploadAction::class,
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ]
        ];
    }

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

    public function actionAdd()
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $model = new UserForm();
            $model->scenario = Yii::$app->controller->action->id;   // 设置场景
            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);
    
            $ret = $model->save();
            if ($ret['status'])
                $ret['url'] = Url::to(['user/index']);
            return $this->asJson($ret);
        }else{
            $all_role = Role::getAllRoles();
            $all_role = ArrayHelper::map($all_role, 'role_id', 'role_name');
            return $this->render('add',['info'=>$info, 'all_role'=>$all_role]);
        }
    }
// findByUsername
    public function actionEdit($id)
    {
        $request = Yii::$app->request;

        $info = User::findOne($id);
        if (empty($info) || $info['status']!=1) 
            throw new \yii\web\HttpException(400, '找不到该用户！');

        if ($request->isPost) {
            $model = new UserForm();
            $model->setModel($info);

            $model->scenario = Yii::$app->controller->action->id;   // 设置场景
            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);

            $ret = $model->save();
            if ($ret['status'])
                $ret['url'] = Url::to(['user/index']);
            return $this->asJson($ret);
        }else{
            $all_role = Role::getAllRoles();
            $all_role = ArrayHelper::map($all_role, 'role_id', 'role_name');
            $user_role = User::getUserRoles($id);
            return $this->render('add',['info'=>$info, 'all_role'=>$all_role, 'user_role'=>$user_role]);
        }
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        if ($request->isGet) $id = $request->get('id');
        if ($request->isPost) $id = $request->post('id');
        $ret = (new UserForm())->delete($id);
        return $this->asJson($ret);
    }

    public function actionCheckUsername($username)
    {
        $request = Yii::$app->request;
        if(User::checkUsernameUnique($username))
            return 'true';
        return 'false';
    }
}
