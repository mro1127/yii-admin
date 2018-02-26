<?php 
use yii\helpers\Url;

$this->registerAssetBundle('Select2');
$this->registerAssetBundle('iCheck');

$this->title = Yii::$app->controller->action->id == 'add'? '添加节点':'编辑节点';
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?= $this->title ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?= Url::to(); ?>">
        <div class="form-body">
            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i> 名称 </label>
                <div class="col-md-6">
                    <input type="text" name="name" value="<?= $info->node_name ?>" class="form-control" placeholder="请输入节点名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i> 路径</label>
                <div class="col-md-6">
                    <input type="text" name="path" value="<?= $info->node_path ?>" class="form-control" placeholder="请输入节点路径，小写">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">父节点</label>
                <div class="col-md-6">
                    <select name="pid" value="<?= $info->node_pid?>" class="form-control select2">
                        <option value="0">根节点</option>
                        <?php 
                            foreach ($node as $k => $v) { 
                                if ($v['id'] == $info->node_pid || $v['id'] == $pid) {
                        ?>
                            <option value="<?= $v['id'] ?>" selected><?= $v['title'] ?></option>
                        <?php }else{ ?>
                            <option value="<?= $v['id'] ?>" ><?= $v['title'] ?></option>
                        <?php } } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-md-6">
                    <input type="number" name="sort" value="<?= $info->node_sort?>" class="form-control" placeholder="请输入节点排序，越小越靠前">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-md-6">
                     <?=yii\helpers\Html::radioList('status',isset($info->node_status)? $info->node_status:1,['1'=>'正常','0'=>'禁用'],['class'=>'icheck-minimal-c mr-t-6']);?>
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
                required: true,
                maxlength: 20,
            },
        },
        messages: {
            name: {
                required: "请输入节点名称",
                maxlength: "节点名称不能超过20个字符",
            },
            path: {
                required: "请输入节点路径",
                maxlength: "节点路径不能超过20个字符",
            },
        },
    });
})
</script>
<?php }); ?>