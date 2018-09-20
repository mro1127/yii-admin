<?php 
use yii\helpers\Url;
$this->registerAssetBundle('3DLine');
 ?>
<div class="hold-transition login-page ">
    <div class="canvas-wrap">
        
        <div class="canvas-content">
            <div class="login-box "> 
                <!-- /.login-logo -->
                <div class="login-box-body">

                    <form action="<?= Url::to(['site/login']); ?>" method="post" id="form">
                        <div class="login-logo">
                            <img src="<?=yii\helpers\Url::to('@static/images/logo.png')?>"/>
                        </div>
                        <div class="form-group has-feedback">
                            <input name="username" type="text" class="form-control" placeholder="账号">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input name="password" type="password" class="form-control" placeholder="密码">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <!-- <img src="" alt=""> -->
                            </div>
                            <div class="col-xs-5">
                                <button class="btn btn-primary btn-block btn-flat common-ajax-submit">登录</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.login-box-body -->
            </div>
        </div>
        <div id="canvas" class="gradient"></div>
    </div>
        
</div>

<?php \Yii::$app->view->on($this::EVENT_END_PAGE, function () { ?>
<script type="text/javascript">
    $('body').layout({resetHeight:false})   


    initValidate({
        rules: {
            username: "required",
            password: "required",
        },
        messages: {
            username: "请输入账号",
            password: "请输入密码",
        },
    });

</script>
<?php }); ?>
