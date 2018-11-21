<?php 
use yii\helpers\Url;
$this->registerAssetBundle('Sly');

$this->title = '后台管理';
$this->context->layout = '@app/views/layouts/menu';
 ?>
<?php $this->on($this::EVENT_BEGIN_BODY, function () {   ?>
    <style>.yii-debug-toolbar{left: 0 !important} </style>
<?php }); ?>

<!-- Content Header (Page header) -->
<section class="content-header sly-tab">
    <div class="btn-group pull-left">
        <button class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-toggle-down"></i>
        </button>
        <ul class="dropdown-menu">
            <li><a class="tab-info"><i class="fa fa-file-text-o"></i>页面信息</a></li>
            <li><a class="tab-new"><i class="fa fa-plus"></i>打开页面</a></li>
            <li role="separator" class="divider"></li>
            <li><a class="tab-refresh"><i class="fa fa-refresh"></i>刷新</a></li>
            <li><a class="tab-back"><i class="fa fa-arrow-left"></i>后退</a></li>
            <li><a class="tab-forward"><i class="fa fa-arrow-right"></i>前进</a></li>
            <li><a class="tab-back-all"><i class="fa fa-reply-all"></i>返回原始页</a></li>
            <li role="separator" class="divider"></li>
            <li><a class="open-with-window"><i class="fa fa-window-maximize"></i>以窗口模式打开</a></li>
            <li><a class="open-with-window-infinite"><i class="fa fa-window-restore"></i>以无限窗口模式打开</a></li>
            <li role="separator" class="divider"></li>
            <li><a class="close-all-tab"><i class="fa fa-close"></i>全部关闭</a></li>
            <li><a class="close-other-tab"><i class="fa fa-window-close-o"></i>关闭其他页面</a></li>
        </ul>
    </div>
    <!-- <button class="btn tab-back pull-left"><i class="fa fa-arrow-left"></i></button> -->
    <button class="btn backward pull-left"><i class="fa fa-backward"></i></button>
    <div class="nav-tabs-custom sly-frame">
        <ul class="nav nav-tabs"></ul>
    </div>
    <button class="btn forward"><i class="fa fa-forward"></i></button>
</section>
<!-- Main content -->
<section class="content-iframe"></section>

<!-- ./wrapper -->
<?php $this->on($this::EVENT_END_PAGE, function () {   ?>

<script>
    $(function() {
        function setIframeH() {
            $('.content-iframe').height($(window).height() - $('.main-header').height() - $('.content-header').height())
        }
        setIframeH();

        $(window).resize(function() {
            setIframeH();
        });

        initTab()
        $.TAB.add("<?= Url::to(['site/home']) ?>", '首页', 'fa fa-home', 1);


    })

</script>

<?php }); ?>
