<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
/**
 * LoginForm model
 *
 * @property integer $username
 * @property string $password
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user;



    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '账号',
            'password' => '密码',
        ];
    }

    /**
     * 登录
     * @Author   Armo
     * @DateTime 2017-12-22
     * @param    string     $username 用户名
     * @param    string     $password 密码，明文
     * @return   array                结果、提示
     */
    public function login()
    {
        if (!$this->validate()) return false;

        $this->_user = User::findByUsername($this->username);
        if (empty($this->_user)) {
            $this->addError('username', '找不到该账号！');
            return false;
        }
            
        
        if(false === $this->_user->validatePassword($password)){
            $this->addError('password', '密码错误！');
            return false;
        }

        if(false === Yii::$app->user->login($this->_user)){
            $this->addError('error', '登录失败，请重试！');
            return false;
        }
        return true;
    }

}
