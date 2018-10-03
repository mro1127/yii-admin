<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Role;
use yii\helpers\ArrayHelper;
/**
 * UserForm model
 *
 * @property string $username
 * @property string $name
 * @property string $email
 * @property string $tel
 * @property string $sex
 * @property string $birthday
 * @property string $face
 * @property string $user_status
 */

class UserForm extends Model
{

    public $username;
    public $name;
    public $email;
    public $password;
    public $tel;
    public $sex;
    public $birthday;
    public $face;
    public $face_base_url;
    public $user_status;
    public $role;

    private $model;

    public function rules()
    {
        return [
            [['name', 'email', 'sex', 'user_status'], 'required'],
            ['name', 'string', 'max' => 20],
            ['user_status', 'in', 'range' => [0, 1]],
            ['sex', 'in', 'range' => ['男', '女']],
            ['password', 'string', 'min' => 6],

            [['username','password'], 'required', 'on' => 'add']

        ];
      
    }

    public function scenarios()
    {
        $base = ['name','email','password','tel','sex','birthday','face','face_base_url','user_status','role'];
        return [
            'add' => \yii\helpers\ArrayHelper::merge($base, ['username']),
            'edit' => $base,
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '账号',
            'name' => '姓名',
            'email' => '邮箱',
            'password' => '密码',
            'tel' => '联系电话',
            'sex' => '性别',
            'birthday' => '生日',
            'face' => '头像',
            'face_base_url' => '头像基础路劲',
            'user_status' => '状态',   
        ];
    }
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }
    /**
     * 添加角色
     * @param  array $data 前端表单
     */
    public function save()
    {
        if (!$this->validate()) 
            return ['status'=>0, 'info'=>errorsToStr($this->getErrors())];
        $model = $this->getModel();

        $model->name = $this->name;
        $model->email = $this->email;
        $model->tel = $this->tel;
        $model->sex = $this->sex;
        $model->birthday = $this->birthday;
        $model->face = $this->face;
        $model->face_base_url = $this->face_base_url;
        $model->user_status = $this->user_status;   

        if ($model->getIsNewRecord()) {
            $model->generateAuthKey();
            $model->username = $this->username;
        }
        if ($this->password) {
            $model->setPassword($this->password);
        }

        if(!$model->save())
            return ['status'=>0, 'info'=>errorsToStr($model->getErrors())];
        
        Role::setUserRoles($model->id, $this->role);

        return ['status'=>1, 'info'=>'提交成功！'];
    }


    public function delete($id)
    {
        // 删除
        $data = [
            'updated_at' => time(),
            'updated_by' => Yii::$app->user->id,
            'status' => 0,
        ];
        if(! $num = User::updateAll($data, ['id'=>$id]))
            return ['status'=>0, 'info'=>'删除失败，请刷新页面重试！'];
        return ['status'=>1, 'info'=>'删除成功！共删除'.$num.'个用户。'];
    }

}
