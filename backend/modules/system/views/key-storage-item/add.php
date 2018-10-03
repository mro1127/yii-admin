<?php 
use yii\helpers\Url;

$this->registerAssetBundle('Select2');
$this->registerAssetBundle('iCheck');
$this->title = Yii::$app->controller->action->id == 'add'? '添加数据字典':'编辑数据字典';
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
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i> KEY</label>
                <div class="col-sm-6">
                    <?php if (Yii::$app->controller->action->id == 'add') { ?>
                        <input type="text" name="key" value="<?= $info->key ?>" class="form-control" placeholder="请输入KEY">
                    <?php }else { ?>
                        <span class="control-span"><?= $info->key ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i>可选值</label>
                <div class="col-sm-6">
                    <select class="form-control" name="option[]" multiple="multiple">
                        <?php if(!empty($info->option)){ foreach ($info->option as $k => $v) { ?>
                            <option value="<?= $v ?>" selected><?= $v ?></option>
                        <?php }} ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i>类型<?= $info->type ?></label>
                <div class="col-sm-6">
                    <select class="form-control" name="type">
                        <option value="config" <?php if ($info->type=='config') echo "selected"; ?>>config</option>
                        <option value="dict" <?php if ($info->type=='dict') echo "selected"; ?>>dict</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">所属应用</label>
                <div class="col-sm-6">
                    <input type="text" name="application" value="<?= $info->application?>" class="form-control" placeholder="请输入所属应用">
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
    $("select[name='option[]']").select2({
        tags: true,
        tokenSeparators: ['/',',',';'," "] 
    })
    $("select[name='type']").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })

    var validate = {
        rules: {
            option: "required",
            type: "required",

        },
        messages: {
            option: "请输入可选值",
            type: "请选择或输入类型",
        },
    };

    <?php if (Yii::$app->controller->action->id == 'add') { ?>
    validate.rules.key = {
        required: true,
        maxlength: 128,
        remote: '<?= Url::to(['check-key']); ?>'
    };
    validate.messages.key = {
        required: "请输入KEY",
        maxlength: "KEY不能超过128个字符",
        remote: "该KEY已经存在",
    };

    <?php } ?>
    initValidate(validate);

})


</script>
<?php }, $info); ?>