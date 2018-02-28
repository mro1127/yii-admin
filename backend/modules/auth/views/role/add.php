<?php 
use yii\helpers\Url;

$this->registerAssetBundle('iCheck');

$this->title = Yii::$app->controller->action->id == 'add'? '添加角色':'编辑角色';
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
                    <input type="text" name="name" value="<?= $info->role_name ?>" class="form-control" placeholder="请输入角色名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-6">
                    <input type="number" name="sort" value="<?= $info->role_sort?>" class="form-control" placeholder="请输入角色排序，越小越靠前">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('status',isset($info->role_status)? $info->role_status:1,['1'=>'正常','0'=>'禁用'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-flat ajax-submit">提交</button>
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
        },
        messages: {
            name: {
                required: "请输入角色名称",
                maxlength: "角色名称不能超过20个字符",
            },  
        },
    });
    initSubmitWinTable();
})
</script>
<?php }); ?>