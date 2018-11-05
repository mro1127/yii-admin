<?php 
namespace backend\components;

use Yii;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use common\models\Node;
use common\models\User;

class GlobalAccessFilter extends ActionFilter
{
    public $openAction;
    public $loginAction;

    public function beforeAction($action)
    {
        $openAction = ArrayHelper::merge(
                                        $this->openAction, 
                                        [Yii::$app->errorHandler->errorAction, Yii::$app->user->loginUrl[0]]
                                    );    // 错误处理必须公开，不然错误会文字显示
        if (in_array($action->controller->module->id, ['debug','gii']) || in_array($action->uniqueId, $openAction)) {
            // 绕过调试工具及开发的操作
            return parent::beforeAction($action);       
        }
        if (Yii::$app->requestedRoute != Yii::$app->user->loginUrl[0]
                && Yii::$app->user->isGuest) {
            Yii::$app->user->loginRequired();       // 判断登录
            return false;

        }else{
            // 判断权限
            $node_id = Node::url2node(Yii::$app->id .'/'. $action->uniqueId);
            if (!$node_id) 
                throw new NotFoundHttpException('找不到该操作！');
            $user_id = Yii::$app->user->id;
            if ($user_id != 1) {

                $nodes = User::getMyNodes();
                if (!in_array($node_id, $nodes)) {
                    throw new ForbiddenHttpException('没有权限');
                    return false;
                }
            }
        }

        // Yii::trace($this->loginAction);
        return parent::beforeAction($action);
    }
}