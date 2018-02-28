<?php 
use yii\helpers\Url;

$this->registerAssetBundle('iCheck');

$this->title = '角色授权 - '.$role['role_name'];
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

        <div class="switch-tree icheck-minimal-c">
            <?= common\widgets\NodeTree::widget(['node' => $node, 'checked' => $role['node']]) ?>
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
   
    $('.switch').click(function() {
        var ul = $(this).closest('li').children('ul');
        if (ul.is(':visible')) {
            $(this).html('<i class="fa fa-plus-square"></i>');
            ul.hide();
        }else{
            $(this).html('<i class="fa fa-minus-square"></i>');
            ul.show();
        }
    });

    $("input[name^=node]").on("ifClicked",function() {
        // ifClicked的选中为false，取消为true
        if (!$(this).is(":checked")) {
            // 选中
            $(this).closest('li').children("ul").find("input[name^=node]").iCheck('check');
            $(this).closest('li').parents('li').children("label").find("input[name^=node]").iCheck('check');
        }else{
            // 取消
            $(this).closest('li').find("ul input[name^=node]").iCheck('uncheck');
        }
    })
})
</script>
<?php }); ?>