<?php

namespace backend\modules\auth\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url; 
use common\models\Role;
use common\models\Node;
use backend\models\RoleForm;
use yii\web\HttpException;

class RoleController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetList()
    {
        $query_params = Yii::$app->request->queryParams;

        $offset = empty($query_params['offset'])? 0:$query_params['offset'];
        $limit = empty($query_params['limit'])? 20:$query_params['limit'];

        $query = Role::find()->select('role_id AS id, role_name AS name, role_sort AS sort, role_status AS status')
                            ->orderBy('role_id DESC')->offset($offset)->limit($limit);

        $query->andFilterWhere([
            'status' => 1,
            'role_status' => $query_params['status'],
        ]);
        $query->andFilterWhere(['like', 'role_name', $query_params['name']]);

        $ret['total'] = $query->count();
        if ($ret['total'] > 0) 
            $ret['rows'] = $query->asArray()->all();
                // print_r($query->createCommand()->getRawSql());die;
        return $this->asJson($ret);
    }

    public function actionAdd($pid=NULL)
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $model = new RoleForm();
            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);
    
            $ret = $model->add();
            if ($ret['status'])
                $ret['url'] = Url::to(['role/index']);
            return $this->asJson($ret);
        }else{
            return $this->render('add');
        }
    }

    public function actionEdit($id)
    {
        $request = Yii::$app->request;

        $info = (new Role())->findOne($id);
        if (empty($info) || $info['status']!=1) 
            throw new HttpException(400, '找不到该角色！');

        if ($request->isPost) {
            $model = new RoleForm();
            $model->setModel($info);

            if (!$model->load($request->post(), '')) 
                return $this->asJson(['status' => 0, 'info' => errorsToStr($model->getErrors())]);

            $ret = $model->edit();
            if ($ret['status'])
                $ret['url'] = Url::to(['role/index']);
            return $this->asJson($ret);
        }else{
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
            throw new HttpException(400, '找不到该角色！');

        if ($request->isPost) {
            $model = new RoleForm();
            $post = $request->post();
            $ret = $model->allot($id, $post['node']);
            if ($ret['status'])
                $ret['url'] = Url::to(['role/index']);
            return $this->asJson($ret);
        }else{
            $role = (new Role())->getRole($id);
            $node = (new Node())->getNode();
            return $this->render('allot',['role'=>$role, 'node'=>$node]);
        }
    }
}
