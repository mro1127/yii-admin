<?php 
use yii\helpers\Url;

$this->registerAssetBundle('iCheck');
$this->registerAssetBundle('BootstrapDatepicker');
$this->registerAssetBundle('InputMask');
$this->registerAssetBundle('FileUploadCustom');

$this->title = Yii::$app->controller->action->id == 'add'? '添加用户':'编辑用户';
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-xs-6">
            <h4 class="content-header-title"><b><?= $this->title ?></b></h4>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?= Url::to(); ?>">
        <div class="form-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">头像</label>
                <div class="col-sm-6">
                    <div class="face"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i> 账号</label>
                <div class="col-sm-6">
                    <?php if (Yii::$app->controller->action->id == 'add') { ?>
                        <input type="text" name="username" value="<?= $info->username ?>" class="form-control" placeholder="请输入用户账号">
                    <?php }else { ?>
                        <span class="control-span"><?= $info->username ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i>姓名</label>
                <div class="col-sm-6">
                    <input type="text" name="name" value="<?= $info->name ?>" class="form-control" placeholder="请输入用户姓名">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i>邮箱</label>
                <div class="col-sm-6">
                    <input type="text" name="email" value="<?= $info->email?>" class="form-control" placeholder="请输入用户邮箱">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-6">
                    <input type="password" name="password" class="form-control password" placeholder="请输入用户密码">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-6">
                    <input type="password" name="confirm_password" class="form-control" placeholder="请确认用户密码">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-6">
                    <input type="text" name="tel" value="<?= $info->tel?>" class="form-control" placeholder="请输入用户联系电话">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i>性别</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('sex',isset($info->sex)? $info->sex:NULL,['男'=>'男','女'=>'女'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">生日</label>
                <div class="col-sm-6">
                    <input type="text" name="birthday" value="<?= $info->birthday?>" class="form-control" id="birthday">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('user_status',isset($info->user_status)? $info->user_status:1,['1'=>'正常','0'=>'禁用'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">角色</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::checkboxList('role',$user_role,$all_role,['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-flat common-ajax-submit">提交</button>
        </div>
    </form>
</section>
<!-- /.content -->

<?php \Yii::$app->view->on($this::EVENT_END_PAGE, function ($event) { ?>
<script type="text/javascript">
$(function() {

    $('#birthday').datepicker({
        language: 'zh-CN',
        format: 'yyyy-mm-dd',
        autoclose: true
    })
    $('#birthday').inputmask('yyyy-mm-dd')

    var uploadOptions = {
        maxNumberOfFiles: 1,
        paramName: 'face',
        url: "<?= Url::to(['user/face-upload', 'fileparam'=>'face']); ?>",
    };

    <?php if(!empty($event->data['username'])){ ?>
        uploadOptions.originalFile = [{
            path: '<?= $event->data['face'] ?>',
            base_url: '<?= $event->data['face_base_url'] ?>',    
        }]


    <?php } ?>

    // <?php ?>

    $('.face').fileupload(uploadOptions);
    var validate = {
        rules: {
            name: {
                required: true,
                maxlength: 20,
            },
            email: {
                required: true,
                email: true
            },
            sex: "required",

            
            confirm_password: {
                equalTo: ".password"
            },

        },
        messages: {
            name: {
                required: "请输入用户名称",
                maxlength: "用户名称不能超过20个字符",
            },
            email: {
                required: "请输入邮箱",
                email: "邮箱格式不正确",
            },
            sex: "请选择性别",

            confirm_password: {
                equalTo: "两次密码不一致"
            },
        },
    };

    <?php if (Yii::$app->controller->action->id == 'add') { ?>
    validate.rules.username = {
        required: true,
        remote: '<?= Url::to(['user/check-username']); ?>'
    };
    validate.messages.username = {
        required: "请输入用户账号",
        remote: "该账号已经存在",
    };


    validate.rules.password = {
        required: true,
        minlength: 6
    };
    validate.messages.password = {
        required: "请输入用户密码",
        minlength: "用户密码最少6位",
    };
    validate.rules.confirm_password.required = true;
    validate.messages.confirm_password.required = "请确认用户密码";
    <?php } ?>
    initValidate(validate);

})


</script>
<?php }, $info); ?>