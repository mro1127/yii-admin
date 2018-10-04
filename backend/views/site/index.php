<?php 
use yii\helpers\Url;
use common\widgets\Menu;
$this->registerAssetBundle('JQuerySlimscroll');
$this->registerAssetBundle('Sly');
// $this->registerAssetBundle('Vue');

$this->title = '后台管理';

 ?>
<style>.yii-debug-toolbar{left: 0 !important} </style>
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= Yii::$app->user->identity->face_base_url .'/'. Yii::$app->user->identity->face ?>" class="user-image" alt="image">
                            <span class="hidden-xs"><?= Yii::$app->user->identity->name ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- image -->
                            <li class="user-header">
                                <img src="<?= Yii::$app->user->identity->face_base_url .'/'. Yii::$app->user->identity->face ?>" class="img-circle" alt="image">
                                <p><?= Yii::$app->user->identity->name ?> </p>
                                <p><?= Yii::$app->user->identity->username ?> </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">资料</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= Url::to(['site/logout']) ?>" class="btn btn-default btn-flat">退出</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?= Menu::widget(['menu' => $menu]) ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="main-content">
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
        <!-- /.content -->
    </div>

</div>
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
