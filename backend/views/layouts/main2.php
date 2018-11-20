<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Menu AS MenuWidgets;
use common\models\User;

AppAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="<?= env('ADMINLTE_SKIN') ?> sidebar-mini fixed">
<?php $this->beginBody() ?>

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
	                            <img src="<?= Yii::$app->user->identity->face_base_url .'/'. Yii::$app->user->identity->face ?>" class="user-image" onerror="this.src='/static/images/default_face.png'">
	                            <span class="hidden-xs"><?= Yii::$app->user->identity->name ?></span>
	                        </a>
	                        <ul class="dropdown-menu">
	                            <!-- image -->
	                            <li class="user-header">
	                                <img src="<?= Yii::$app->user->identity->face_base_url .'/'. Yii::$app->user->identity->face ?>" class="img-circle" onerror="this.src='/static/images/default_face.png'">
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
	            <?= MenuWidgets::widget(['menu' => User::getMyMenu(Yii::$app->id)]) ?>
	        </section>
	        <!-- /.sidebar -->
	    </aside>

	    <!-- Content Wrapper. Contains page content -->
	    <div class="content-wrapper" id="main-content">
	        <!-- Main content -->
        	<?= $content ?>
	        <!-- /.content -->
	    </div>

	</div>


<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
