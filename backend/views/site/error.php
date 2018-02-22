<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use Yii;
$this->title = $name;
preg_match("/\(#(.*?)\)/is",$name, $match);
$status = $match[1];
$text_class = $status>=500? 'text-red':'text-yellow';
?>

<section class="content">
    <div class="error-page">
        <h2 class="headline <?= $text_class ?>"><?= $status ?></h2>

        <div class="error-content">
            <h3><i class="fa fa-warning <?= $text_class ?>"></i><?= Html::encode($this->title) ?></h3>
            <h4><?= nl2br(Html::encode($message)) ?></h4>
            <p>请刷新页面重试或联系管理员处理。</p>
            <p><i class="fa fa-link"></i> <span><?= urldecode(Yii::$app->request->getUrl()) ?></span></p>
        </div>
    </div>
</section>
