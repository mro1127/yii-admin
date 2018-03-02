<?php 
use yii\helpers\Url;

$this->registerAssetBundle('iCheck');

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
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i> 名称 </label>
                <div class="col-sm-6">
                    <input type="text" name="name" value="<?= $info->menu_name ?>" class="form-control" placeholder="请输入菜单名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">链接</label>
                <div class="col-sm-6">
                    <input type="text" name="url" value="<?= $info->menu_url ?>" class="form-control" placeholder="请输入菜单路径，小写">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-6">
                    <input type="number" name="sort" value="<?= $info->menu_sort?>" class="form-control" placeholder="请输入菜单排序，越小越靠前">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('status',isset($info->menu_status)? $info->menu_status:1,['1'=>'正常','0'=>'禁用'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">快捷操作</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('shortcuts',isset($info->menu_shortcuts)? $info->menu_shortcuts:0,['1'=>'是','0'=>'否'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-flat common-ajax-submit">提交</button>
        </div>
    </form>
</section>
<!-- /.content -->

<?php \Yii::$app->view->on($this::EVENT_END_PAGE, function () { ?>
<script type="text/javascript">
$(function() {
    initValidate({
        rules: {
            name: {
                required: true,
                maxlength: 20,
            },
            path: {
                maxlength: 255,
            },
        },
        messages: {
            name: {
                required: "请输入菜单名称",
                maxlength: "菜单名称不能超过20个字符",
            },
            path: {
                maxlength: "菜单路径不能超过255个字符",
            },
        },
    });


})


</script>
<?php }); ?>