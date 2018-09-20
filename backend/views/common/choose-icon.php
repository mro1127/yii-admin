<?php 
use yii\helpers\Url;

$this->registerAssetBundle('Select2');
$this->registerAssetBundle('iCheck');

$this->title = '选择 Font-Awesome 图标';
 ?>

<section class="content-header">
    <h1><?= $this->title ?></h1>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">网页</a></li>
            <li><a href="#tab_2" data-toggle="tab">辅助功能</a></li>
            <li><a href="#tab_3" data-toggle="tab">手势</a></li>
            <li><a href="#tab_4" data-toggle="tab">运输</a></li>
            <li><a href="#tab_5" data-toggle="tab">性别</a></li>
            <li><a href="#tab_6" data-toggle="tab">文件类型</a></li>
            <li><a href="#tab_7" data-toggle="tab">可旋转</a></li>
            <li><a href="#tab_8" data-toggle="tab">表单</a></li>
            <li><a href="#tab_9" data-toggle="tab">支付</a></li>
            <li><a href="#tab_10" data-toggle="tab">图表</a></li>
            <li><a href="#tab_11" data-toggle="tab">货币</a></li>
            <li><a href="#tab_12" data-toggle="tab">文本编辑</a></li>
            <li><a href="#tab_13" data-toggle="tab">指示方向</a></li>
            <li><a href="#tab_14" data-toggle="tab">视频播放</a></li>
            <li><a href="#tab_15" data-toggle="tab">标志</a></li>
            <li><a href="#tab_16" data-toggle="tab">医疗</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-address-book"></i>address-book</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-address-book-o"></i>address-book-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-address-card"></i>address-card</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-address-card-o"></i>address-card-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-adjust"></i>adjust</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-american-sign-language-interpreting"></i>american-sign-language-interpreting</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-anchor"></i>anchor</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-archive"></i>archive</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-area-chart"></i>area-chart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrows"></i>arrows</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrows-h"></i>arrows-h</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrows-v"></i>arrows-v</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-asl-interpreting"></i>asl-interpreting</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-assistive-listening-systems"></i>assistive-listening-systems</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-asterisk"></i>asterisk</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-at"></i>at</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-audio-description"></i>audio-description</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-automobile"></i>automobile</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-balance-scale"></i>balance-scale</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ban"></i>ban</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bank"></i>bank</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bar-chart"></i>bar-chart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bar-chart-o"></i>bar-chart-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-barcode"></i>barcode</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bars"></i>bars</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bath"></i>bath</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bathtub"></i>bathtub</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery"></i>battery</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-0"></i>battery-0</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-1"></i>battery-1</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-2"></i>battery-2</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-3"></i>battery-3</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-4"></i>battery-4</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-empty"></i>battery-empty</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-full"></i>battery-full</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-half"></i>battery-half</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-quarter"></i>battery-quarter</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-battery-three-quarters"></i>battery-three-quarters</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bed"></i>bed</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-beer"></i>beer</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bell"></i>bell</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bell-o"></i>bell-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bell-slash"></i>bell-slash</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bell-slash-o"></i>bell-slash-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bicycle"></i>bicycle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-binoculars"></i>binoculars</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-birthday-cake"></i>birthday-cake</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-blind"></i>blind</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bluetooth"></i>bluetooth</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bluetooth-b"></i>bluetooth-b</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bolt"></i>bolt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bomb"></i>bomb</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-book"></i>book</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bookmark"></i>bookmark</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bookmark-o"></i>bookmark-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-braille"></i>braille</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-briefcase"></i>briefcase</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bug"></i>bug</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-building"></i>building</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-building-o"></i>building-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bullhorn"></i>bullhorn</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bullseye"></i>bullseye</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bus"></i>bus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cab"></i>cab</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-calculator"></i>calculator</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-calendar"></i>calendar</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-calendar-check-o"></i>calendar-check-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-calendar-minus-o"></i>calendar-minus-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-calendar-o"></i>calendar-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-calendar-plus-o"></i>calendar-plus-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-calendar-times-o"></i>calendar-times-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-camera"></i>camera</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-camera-retro"></i>camera-retro</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-car"></i>car</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-square-o-down"></i>caret-square-o-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-square-o-left"></i>caret-square-o-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-square-o-right"></i>caret-square-o-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-square-o-up"></i>caret-square-o-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cart-arrow-down"></i>cart-arrow-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cart-plus"></i>cart-plus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc"></i>cc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-certificate"></i>certificate</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-check"></i>check</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-check-circle"></i>check-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-check-circle-o"></i>check-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-check-square"></i>check-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-check-square-o"></i>check-square-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-child"></i>child</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-circle"></i>circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-circle-o"></i>circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-circle-o-notch"></i>circle-o-notch</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-circle-thin"></i>circle-thin</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-clock-o"></i>clock-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-clone"></i>clone</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-close"></i>close</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cloud"></i>cloud</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cloud-download"></i>cloud-download</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cloud-upload"></i>cloud-upload</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-code"></i>code</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-code-fork"></i>code-fork</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-coffee"></i>coffee</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cog"></i>cog</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cogs"></i>cogs</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-comment"></i>comment</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-comment-o"></i>comment-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-commenting"></i>commenting</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-commenting-o"></i>commenting-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-comments"></i>comments</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-comments-o"></i>comments-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-compass"></i>compass</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-copyright"></i>copyright</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-creative-commons"></i>creative-commons</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-credit-card"></i>credit-card</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-credit-card-alt"></i>credit-card-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-crop"></i>crop</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-crosshairs"></i>crosshairs</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cube"></i>cube</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cubes"></i>cubes</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cutlery"></i>cutlery</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-dashboard"></i>dashboard</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-database"></i>database</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-deaf"></i>deaf</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-deafness"></i>deafness</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-desktop"></i>desktop</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-diamond"></i>diamond</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-dot-circle-o"></i>dot-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-download"></i>download</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-drivers-license"></i>drivers-license</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-drivers-license-o"></i>drivers-license-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-edit"></i>edit</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ellipsis-h"></i>ellipsis-h</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ellipsis-v"></i>ellipsis-v</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-envelope"></i>envelope</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-envelope-o"></i>envelope-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-envelope-open"></i>envelope-open</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-envelope-open-o"></i>envelope-open-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-envelope-square"></i>envelope-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-eraser"></i>eraser</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-exchange"></i>exchange</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-exclamation"></i>exclamation</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-exclamation-circle"></i>exclamation-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-exclamation-triangle"></i>exclamation-triangle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-external-link"></i>external-link</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-external-link-square"></i>external-link-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-eye"></i>eye</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-eye-slash"></i>eye-slash</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-eyedropper"></i>eyedropper</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fax"></i>fax</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-feed"></i>feed</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-female"></i>female</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fighter-jet"></i>fighter-jet</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-archive-o"></i>file-archive-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-audio-o"></i>file-audio-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-code-o"></i>file-code-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-excel-o"></i>file-excel-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-image-o"></i>file-image-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-movie-o"></i>file-movie-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-pdf-o"></i>file-pdf-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-photo-o"></i>file-photo-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-picture-o"></i>file-picture-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-powerpoint-o"></i>file-powerpoint-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-sound-o"></i>file-sound-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-video-o"></i>file-video-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-word-o"></i>file-word-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-zip-o"></i>file-zip-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-film"></i>film</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-filter"></i>filter</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fire"></i>fire</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fire-extinguisher"></i>fire-extinguisher</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-flag"></i>flag</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-flag-checkered"></i>flag-checkered</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-flag-o"></i>flag-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-flash"></i>flash</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-flask"></i>flask</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-folder"></i>folder</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-folder-o"></i>folder-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-folder-open"></i>folder-open</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-folder-open-o"></i>folder-open-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-frown-o"></i>frown-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-futbol-o"></i>futbol-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gamepad"></i>gamepad</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gavel"></i>gavel</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gear"></i>gear</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gears"></i>gears</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gift"></i>gift</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-glass"></i>glass</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-globe"></i>globe</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-graduation-cap"></i>graduation-cap</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-group"></i>group</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-grab-o"></i>hand-grab-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-lizard-o"></i>hand-lizard-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-paper-o"></i>hand-paper-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-peace-o"></i>hand-peace-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-pointer-o"></i>hand-pointer-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-rock-o"></i>hand-rock-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-scissors-o"></i>hand-scissors-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-spock-o"></i>hand-spock-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-stop-o"></i>hand-stop-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-handshake-o"></i>handshake-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hard-of-hearing"></i>hard-of-hearing</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hashtag"></i>hashtag</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hdd-o"></i>hdd-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-headphones"></i>headphones</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-heart"></i>heart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-heart-o"></i>heart-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-heartbeat"></i>heartbeat</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-history"></i>history</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-home"></i>home</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hotel"></i>hotel</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hourglass"></i>hourglass</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hourglass-1"></i>hourglass-1</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hourglass-2"></i>hourglass-2</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hourglass-3"></i>hourglass-3</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hourglass-end"></i>hourglass-end</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hourglass-half"></i>hourglass-half</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hourglass-o"></i>hourglass-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hourglass-start"></i>hourglass-start</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-i-cursor"></i>i-cursor</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-id-badge"></i>id-badge</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-id-card"></i>id-card</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-id-card-o"></i>id-card-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-image"></i>image</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-inbox"></i>inbox</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-industry"></i>industry</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-info"></i>info</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-info-circle"></i>info-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-institution"></i>institution</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-key"></i>key</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-keyboard-o"></i>keyboard-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-language"></i>language</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-laptop"></i>laptop</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-leaf"></i>leaf</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-legal"></i>legal</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-lemon-o"></i>lemon-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-level-down"></i>level-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-level-up"></i>level-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-life-bouy"></i>life-bouy</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-life-buoy"></i>life-buoy</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-life-ring"></i>life-ring</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-life-saver"></i>life-saver</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-lightbulb-o"></i>lightbulb-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-line-chart"></i>line-chart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-location-arrow"></i>location-arrow</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-lock"></i>lock</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-low-vision"></i>low-vision</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-magic"></i>magic</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-magnet"></i>magnet</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mail-forward"></i>mail-forward</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mail-reply"></i>mail-reply</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mail-reply-all"></i>mail-reply-all</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-male"></i>male</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-map"></i>map</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-map-marker"></i>map-marker</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-map-o"></i>map-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-map-pin"></i>map-pin</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-map-signs"></i>map-signs</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-meh-o"></i>meh-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-microchip"></i>microchip</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-microphone"></i>microphone</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-microphone-slash"></i>microphone-slash</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-minus"></i>minus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-minus-circle"></i>minus-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-minus-square"></i>minus-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-minus-square-o"></i>minus-square-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mobile"></i>mobile</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mobile-phone"></i>mobile-phone</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-money"></i>money</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-moon-o"></i>moon-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mortar-board"></i>mortar-board</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-motorcycle"></i>motorcycle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mouse-pointer"></i>mouse-pointer</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-music"></i>music</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-navicon"></i>navicon</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-newspaper-o"></i>newspaper-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-object-group"></i>object-group</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-object-ungroup"></i>object-ungroup</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-paint-brush"></i>paint-brush</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-paper-plane"></i>paper-plane</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-paper-plane-o"></i>paper-plane-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-paw"></i>paw</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pencil"></i>pencil</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pencil-square"></i>pencil-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pencil-square-o"></i>pencil-square-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-percent"></i>percent</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-phone"></i>phone</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-phone-square"></i>phone-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-photo"></i>photo</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-picture-o"></i>picture-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pie-chart"></i>pie-chart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plane"></i>plane</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plug"></i>plug</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plus"></i>plus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plus-circle"></i>plus-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plus-square"></i>plus-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plus-square-o"></i>plus-square-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-podcast"></i>podcast</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-power-off"></i>power-off</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-print"></i>print</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-puzzle-piece"></i>puzzle-piece</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-qrcode"></i>qrcode</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-question"></i>question</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-question-circle"></i>question-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-question-circle-o"></i>question-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-quote-left"></i>quote-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-quote-right"></i>quote-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-random"></i>random</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-recycle"></i>recycle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-refresh"></i>refresh</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-registered"></i>registered</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-remove"></i>remove</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-reorder"></i>reorder</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-reply"></i>reply</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-reply-all"></i>reply-all</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-retweet"></i>retweet</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-road"></i>road</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rocket"></i>rocket</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rss"></i>rss</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rss-square"></i>rss-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-s15"></i>s15</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-search"></i>search</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-search-minus"></i>search-minus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-search-plus"></i>search-plus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-send"></i>send</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-send-o"></i>send-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-server"></i>server</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-share"></i>share</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-share-alt"></i>share-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-share-alt-square"></i>share-alt-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-share-square"></i>share-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-share-square-o"></i>share-square-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-shield"></i>shield</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ship"></i>ship</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-shopping-bag"></i>shopping-bag</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-shopping-basket"></i>shopping-basket</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-shopping-cart"></i>shopping-cart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-shower"></i>shower</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sign-in"></i>sign-in</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sign-language"></i>sign-language</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sign-out"></i>sign-out</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-signal"></i>signal</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-signing"></i>signing</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sitemap"></i>sitemap</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sliders"></i>sliders</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-smile-o"></i>smile-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-snowflake-o"></i>snowflake-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-soccer-ball-o"></i>soccer-ball-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort"></i>sort</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-alpha-asc"></i>sort-alpha-asc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-alpha-desc"></i>sort-alpha-desc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-amount-asc"></i>sort-amount-asc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-amount-desc"></i>sort-amount-desc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-asc"></i>sort-asc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-desc"></i>sort-desc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-down"></i>sort-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-numeric-asc"></i>sort-numeric-asc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-numeric-desc"></i>sort-numeric-desc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sort-up"></i>sort-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-space-shuttle"></i>space-shuttle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-spinner"></i>spinner</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-spoon"></i>spoon</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-square"></i>square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-square-o"></i>square-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-star"></i>star</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-star-half"></i>star-half</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-star-half-empty"></i>star-half-empty</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-star-half-full"></i>star-half-full</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-star-half-o"></i>star-half-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-star-o"></i>star-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sticky-note"></i>sticky-note</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sticky-note-o"></i>sticky-note-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-street-view"></i>street-view</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-suitcase"></i>suitcase</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sun-o"></i>sun-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-support"></i>support</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tablet"></i>tablet</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tachometer"></i>tachometer</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tag"></i>tag</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tags"></i>tags</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tasks"></i>tasks</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-taxi"></i>taxi</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-television"></i>television</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-terminal"></i>terminal</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer"></i>thermometer</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-0"></i>thermometer-0</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-1"></i>thermometer-1</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-2"></i>thermometer-2</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-3"></i>thermometer-3</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-4"></i>thermometer-4</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-empty"></i>thermometer-empty</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-full"></i>thermometer-full</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-half"></i>thermometer-half</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-quarter"></i>thermometer-quarter</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thermometer-three-quarters"></i>thermometer-three-quarters</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thumb-tack"></i>thumb-tack</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thumbs-down"></i>thumbs-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thumbs-o-down"></i>thumbs-o-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thumbs-o-up"></i>thumbs-o-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thumbs-up"></i>thumbs-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ticket"></i>ticket</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-times"></i>times</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-times-circle"></i>times-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-times-circle-o"></i>times-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-times-rectangle"></i>times-rectangle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-times-rectangle-o"></i>times-rectangle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tint"></i>tint</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-down"></i>toggle-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-left"></i>toggle-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-off"></i>toggle-off</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-on"></i>toggle-on</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-right"></i>toggle-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-up"></i>toggle-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-trademark"></i>trademark</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-trash"></i>trash</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-trash-o"></i>trash-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tree"></i>tree</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-trophy"></i>trophy</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-truck"></i>truck</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tty"></i>tty</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tv"></i>tv</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-umbrella"></i>umbrella</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-universal-access"></i>universal-access</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-university"></i>university</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-unlock"></i>unlock</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-unlock-alt"></i>unlock-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-unsorted"></i>unsorted</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-upload"></i>upload</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-user"></i>user</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-user-circle"></i>user-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-user-circle-o"></i>user-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-user-o"></i>user-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-user-plus"></i>user-plus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-user-secret"></i>user-secret</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-user-times"></i>user-times</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-users"></i>users</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-vcard"></i>vcard</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-vcard-o"></i>vcard-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-video-camera"></i>video-camera</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-volume-control-phone"></i>volume-control-phone</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-volume-down"></i>volume-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-volume-off"></i>volume-off</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-volume-up"></i>volume-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-warning"></i>warning</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wheelchair"></i>wheelchair</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wheelchair-alt"></i>wheelchair-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wifi"></i>wifi</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-window-close"></i>window-close</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-window-close-o"></i>window-close-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-window-maximize"></i>window-maximize</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-window-minimize"></i>window-minimize</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-window-restore"></i>window-restore</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wrench"></i>wrench</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-american-sign-language-interpreting"></i>american-sign-language-interpreting</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-asl-interpreting"></i>asl-interpreting</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-assistive-listening-systems"></i>assistive-listening-systems</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-audio-description"></i>audio-description</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-blind"></i>blind</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-braille"></i>braille</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc"></i>cc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-deaf"></i>deaf</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-deafness"></i>deafness</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hard-of-hearing"></i>hard-of-hearing</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-low-vision"></i>low-vision</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-question-circle-o"></i>question-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sign-language"></i>sign-language</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-signing"></i>signing</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tty"></i>tty</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-universal-access"></i>universal-access</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-volume-control-phone"></i>volume-control-phone</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wheelchair"></i>wheelchair</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wheelchair-alt"></i>wheelchair-alt</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-grab-o"></i>hand-grab-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-lizard-o"></i>hand-lizard-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-o-down"></i>hand-o-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-o-left"></i>hand-o-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-o-right"></i>hand-o-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-o-up"></i>hand-o-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-paper-o"></i>hand-paper-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-peace-o"></i>hand-peace-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-pointer-o"></i>hand-pointer-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-rock-o"></i>hand-rock-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-scissors-o"></i>hand-scissors-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-spock-o"></i>hand-spock-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-stop-o"></i>hand-stop-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thumbs-down"></i>thumbs-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thumbs-o-down"></i>thumbs-o-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thumbs-o-up"></i>thumbs-o-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-thumbs-up"></i>thumbs-up</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_4">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ambulance"></i>ambulance</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-automobile"></i>automobile</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bicycle"></i>bicycle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bus"></i>bus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cab"></i>cab</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-car"></i>car</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fighter-jet"></i>fighter-jet</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-motorcycle"></i>motorcycle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plane"></i>plane</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rocket"></i>rocket</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ship"></i>ship</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-space-shuttle"></i>space-shuttle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-subway"></i>subway</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-taxi"></i>taxi</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-train"></i>train</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-truck"></i>truck</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wheelchair"></i>wheelchair</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wheelchair-alt"></i>wheelchair-alt</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_5">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-genderless"></i>genderless</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-intersex"></i>intersex</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mars"></i>mars</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mars-double"></i>mars-double</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mars-stroke"></i>mars-stroke</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mars-stroke-h"></i>mars-stroke-h</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mars-stroke-v"></i>mars-stroke-v</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mercury"></i>mercury</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-neuter"></i>neuter</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-transgender"></i>transgender</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-transgender-alt"></i>transgender-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-venus"></i>venus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-venus-double"></i>venus-double</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-venus-mars"></i>venus-mars</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_6">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file"></i>file</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-archive-o"></i>file-archive-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-audio-o"></i>file-audio-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-code-o"></i>file-code-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-excel-o"></i>file-excel-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-image-o"></i>file-image-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-movie-o"></i>file-movie-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-o"></i>file-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-pdf-o"></i>file-pdf-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-photo-o"></i>file-photo-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-picture-o"></i>file-picture-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-powerpoint-o"></i>file-powerpoint-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-sound-o"></i>file-sound-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-text"></i>file-text</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-text-o"></i>file-text-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-video-o"></i>file-video-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-word-o"></i>file-word-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-zip-o"></i>file-zip-o</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_7">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-circle-o-notch"></i>circle-o-notch</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cog"></i>cog</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gear"></i>gear</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-refresh"></i>refresh</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-spinner"></i>spinner</a></div>
                </div>
                <hr>
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-circle-o-notch fa-spin"></i>circle-o-notch</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cog fa-spin"></i>cog</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gear fa-spin"></i>gear</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-refresh fa-spin"></i>refresh</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-spinner fa-spin"></i>spinner</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_8">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-check-square"></i>check-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-check-square-o"></i>check-square-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-circle"></i>circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-circle-o"></i>circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-dot-circle-o"></i>dot-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-minus-square"></i>minus-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-minus-square-o"></i>minus-square-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plus-square"></i>plus-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plus-square-o"></i>plus-square-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-square"></i>square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-square-o"></i>square-o</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_9">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-amex"></i>cc-amex</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-diners-club"></i>cc-diners-club</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-discover"></i>cc-discover</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-jcb"></i>cc-jcb</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-mastercard"></i>cc-mastercard</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-paypal"></i>cc-paypal</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-stripe"></i>cc-stripe</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-visa"></i>cc-visa</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-credit-card"></i>credit-card</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-credit-card-alt"></i>credit-card-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-google-wallet"></i>google-wallet</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-paypal"></i>paypal</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_10">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-area-chart"></i>area-chart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bar-chart"></i>bar-chart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bar-chart-o"></i>bar-chart-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-line-chart"></i>line-chart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pie-chart"></i>pie-chart</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_11">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bitcoin"></i>bitcoin</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-btc"></i>btc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cny"></i>cny</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-dollar"></i>dollar</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-eur"></i>eur</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-euro"></i>euro</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gbp"></i>gbp</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gg"></i>gg</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gg-circle"></i>gg-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ils"></i>ils</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-inr"></i>inr</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-jpy"></i>jpy</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-krw"></i>krw</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-money"></i>money</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rmb"></i>rmb</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rouble"></i>rouble</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rub"></i>rub</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ruble"></i>ruble</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rupee"></i>rupee</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-shekel"></i>shekel</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sheqel"></i>sheqel</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-try"></i>try</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-turkish-lira"></i>turkish-lira</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-usd"></i>usd</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-won"></i>won</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-yen"></i>yen</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_12">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-align-center"></i>align-center</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-align-justify"></i>align-justify</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-align-left"></i>align-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-align-right"></i>align-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bold"></i>bold</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chain"></i>chain</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chain-broken"></i>chain-broken</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-clipboard"></i>clipboard</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-columns"></i>columns</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-copy"></i>copy</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cut"></i>cut</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-dedent"></i>dedent</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-eraser"></i>eraser</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file"></i>file</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-o"></i>file-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-text"></i>file-text</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-file-text-o"></i>file-text-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-files-o"></i>files-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-floppy-o"></i>floppy-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-font"></i>font</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-header"></i>header</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-indent"></i>indent</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-italic"></i>italic</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-link"></i>link</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-list"></i>list</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-list-alt"></i>list-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-list-ol"></i>list-ol</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-list-ul"></i>list-ul</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-outdent"></i>outdent</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-paperclip"></i>paperclip</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-paragraph"></i>paragraph</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-paste"></i>paste</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-repeat"></i>repeat</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rotate-left"></i>rotate-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rotate-right"></i>rotate-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-save"></i>save</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-scissors"></i>scissors</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-strikethrough"></i>strikethrough</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-subscript"></i>subscript</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-superscript"></i>superscript</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-table"></i>table</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-text-height"></i>text-height</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-text-width"></i>text-width</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-th"></i>th</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-th-large"></i>th-large</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-th-list"></i>th-list</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-underline"></i>underline</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-undo"></i>undo</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-unlink"></i>unlink</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_13">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-angle-double-down"></i>angle-double-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-angle-double-left"></i>angle-double-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-angle-double-right"></i>angle-double-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-angle-double-up"></i>angle-double-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-angle-down"></i>angle-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-angle-left"></i>angle-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-angle-right"></i>angle-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-angle-up"></i>angle-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-circle-down"></i>arrow-circle-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-circle-left"></i>arrow-circle-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-circle-o-down"></i>arrow-circle-o-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-circle-o-left"></i>arrow-circle-o-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-circle-o-right"></i>arrow-circle-o-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-circle-o-up"></i>arrow-circle-o-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-circle-right"></i>arrow-circle-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-circle-up"></i>arrow-circle-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-down"></i>arrow-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-left"></i>arrow-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-right"></i>arrow-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrow-up"></i>arrow-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrows"></i>arrows</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrows-alt"></i>arrows-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrows-h"></i>arrows-h</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrows-v"></i>arrows-v</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-down"></i>caret-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-left"></i>caret-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-right"></i>caret-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-square-o-down"></i>caret-square-o-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-square-o-left"></i>caret-square-o-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-square-o-right"></i>caret-square-o-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-square-o-up"></i>caret-square-o-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-caret-up"></i>caret-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chevron-circle-down"></i>chevron-circle-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chevron-circle-left"></i>chevron-circle-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chevron-circle-right"></i>chevron-circle-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chevron-circle-up"></i>chevron-circle-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chevron-down"></i>chevron-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chevron-left"></i>chevron-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chevron-right"></i>chevron-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chevron-up"></i>chevron-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-exchange"></i>exchange</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-o-down"></i>hand-o-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-o-left"></i>hand-o-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-o-right"></i>hand-o-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hand-o-up"></i>hand-o-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-long-arrow-down"></i>long-arrow-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-long-arrow-left"></i>long-arrow-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-long-arrow-right"></i>long-arrow-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-long-arrow-up"></i>long-arrow-up</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-down"></i>toggle-down</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-left"></i>toggle-left</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-right"></i>toggle-right</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-toggle-up"></i>toggle-up</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_14">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-arrows-alt"></i>arrows-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-backward"></i>backward</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-compress"></i>compress</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-eject"></i>eject</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-expand"></i>expand</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fast-backward"></i>fast-backward</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fast-forward"></i>fast-forward</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-forward"></i>forward</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pause"></i>pause</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pause-circle"></i>pause-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pause-circle-o"></i>pause-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-play"></i>play</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-play-circle"></i>play-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-play-circle-o"></i>play-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-random"></i>random</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-step-backward"></i>step-backward</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-step-forward"></i>step-forward</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-stop"></i>stop</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-stop-circle"></i>stop-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-stop-circle-o"></i>stop-circle-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-youtube-play"></i>youtube-play</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_15">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-500px"></i>500px</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-adn"></i>adn</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-amazon"></i>amazon</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-android"></i>android</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-angellist"></i>angellist</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-apple"></i>apple</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bandcamp"></i>bandcamp</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-behance"></i>behance</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-behance-square"></i>behance-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bitbucket"></i>bitbucket</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bitbucket-square"></i>bitbucket-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bitcoin"></i>bitcoin</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-black-tie"></i>black-tie</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bluetooth"></i>bluetooth</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-bluetooth-b"></i>bluetooth-b</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-btc"></i>btc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-buysellads"></i>buysellads</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-amex"></i>cc-amex</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-diners-club"></i>cc-diners-club</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-discover"></i>cc-discover</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-jcb"></i>cc-jcb</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-mastercard"></i>cc-mastercard</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-paypal"></i>cc-paypal</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-stripe"></i>cc-stripe</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-cc-visa"></i>cc-visa</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-chrome"></i>chrome</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-codepen"></i>codepen</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-codiepie"></i>codiepie</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-connectdevelop"></i>connectdevelop</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-contao"></i>contao</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-css3"></i>css3</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-dashcube"></i>dashcube</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-delicious"></i>delicious</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-deviantart"></i>deviantart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-digg"></i>digg</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-dribbble"></i>dribbble</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-dropbox"></i>dropbox</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-drupal"></i>drupal</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-edge"></i>edge</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-eercast"></i>eercast</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-empire"></i>empire</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-envira"></i>envira</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-etsy"></i>etsy</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-expeditedssl"></i>expeditedssl</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fa"></i>fa</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-facebook"></i>facebook</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-facebook-f"></i>facebook-f</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-facebook-official"></i>facebook-official</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-facebook-square"></i>facebook-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-firefox"></i>firefox</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-first-order"></i>first-order</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-flickr"></i>flickr</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-font-awesome"></i>font-awesome</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fonticons"></i>fonticons</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-fort-awesome"></i>fort-awesome</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-forumbee"></i>forumbee</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-foursquare"></i>foursquare</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-free-code-camp"></i>free-code-camp</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ge"></i>ge</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-get-pocket"></i>get-pocket</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gg"></i>gg</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gg-circle"></i>gg-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-git"></i>git</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-git-square"></i>git-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-github"></i>github</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-github-alt"></i>github-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-github-square"></i>github-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gitlab"></i>gitlab</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gittip"></i>gittip</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-glide"></i>glide</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-glide-g"></i>glide-g</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-google"></i>google</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-google-plus"></i>google-plus</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-google-plus-circle"></i>google-plus-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-google-plus-official"></i>google-plus-official</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-google-plus-square"></i>google-plus-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-google-wallet"></i>google-wallet</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-gratipay"></i>gratipay</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-grav"></i>grav</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hacker-news"></i>hacker-news</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-houzz"></i>houzz</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-html5"></i>html5</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-imdb"></i>imdb</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-instagram"></i>instagram</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-internet-explorer"></i>internet-explorer</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ioxhost"></i>ioxhost</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-joomla"></i>joomla</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-jsfiddle"></i>jsfiddle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-lastfm"></i>lastfm</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-lastfm-square"></i>lastfm-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-leanpub"></i>leanpub</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-linkedin"></i>linkedin</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-linkedin-square"></i>linkedin-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-linode"></i>linode</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-linux"></i>linux</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-maxcdn"></i>maxcdn</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-meanpath"></i>meanpath</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-medium"></i>medium</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-meetup"></i>meetup</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-mixcloud"></i>mixcloud</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-modx"></i>modx</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-odnoklassniki"></i>odnoklassniki</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-odnoklassniki-square"></i>odnoklassniki-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-opencart"></i>opencart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-openid"></i>openid</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-opera"></i>opera</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-optin-monster"></i>optin-monster</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pagelines"></i>pagelines</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-paypal"></i>paypal</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pied-piper"></i>pied-piper</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pied-piper-alt"></i>pied-piper-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pied-piper-pp"></i>pied-piper-pp</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pinterest"></i>pinterest</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pinterest-p"></i>pinterest-p</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-pinterest-square"></i>pinterest-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-product-hunt"></i>product-hunt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-qq"></i>qq</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-quora"></i>quora</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ra"></i>ra</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ravelry"></i>ravelry</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-rebel"></i>rebel</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-reddit"></i>reddit</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-reddit-alien"></i>reddit-alien</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-reddit-square"></i>reddit-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-renren"></i>renren</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-resistance"></i>resistance</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-safari"></i>safari</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-scribd"></i>scribd</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-sellsy"></i>sellsy</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-share-alt"></i>share-alt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-share-alt-square"></i>share-alt-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-shirtsinbulk"></i>shirtsinbulk</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-simplybuilt"></i>simplybuilt</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-skyatlas"></i>skyatlas</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-skype"></i>skype</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-slack"></i>slack</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-slideshare"></i>slideshare</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-snapchat"></i>snapchat</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-snapchat-ghost"></i>snapchat-ghost</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-snapchat-square"></i>snapchat-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-soundcloud"></i>soundcloud</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-spotify"></i>spotify</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-stack-exchange"></i>stack-exchange</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-stack-overflow"></i>stack-overflow</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-steam"></i>steam</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-steam-square"></i>steam-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-stumbleupon"></i>stumbleupon</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-stumbleupon-circle"></i>stumbleupon-circle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-superpowers"></i>superpowers</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-telegram"></i>telegram</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tencent-weibo"></i>tencent-weibo</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-themeisle"></i>themeisle</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-trello"></i>trello</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tripadvisor"></i>tripadvisor</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tumblr"></i>tumblr</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-tumblr-square"></i>tumblr-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-twitch"></i>twitch</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-twitter"></i>twitter</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-twitter-square"></i>twitter-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-usb"></i>usb</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-viacoin"></i>viacoin</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-viadeo"></i>viadeo</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-viadeo-square"></i>viadeo-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-vimeo"></i>vimeo</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-vimeo-square"></i>vimeo-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-vine"></i>vine</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-vk"></i>vk</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wechat"></i>wechat</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-weibo"></i>weibo</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-weixin"></i>weixin</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-whatsapp"></i>whatsapp</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wikipedia-w"></i>wikipedia-w</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-windows"></i>windows</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wordpress"></i>wordpress</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wpbeginner"></i>wpbeginner</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wpexplorer"></i>wpexplorer</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wpforms"></i>wpforms</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-xing"></i>xing</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-xing-square"></i>xing-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-y-combinator"></i>y-combinator</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-y-combinator-square"></i>y-combinator-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-yahoo"></i>yahoo</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-yc"></i>yc</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-yc-square"></i>yc-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-yelp"></i>yelp</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-yoast"></i>yoast</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-youtube"></i>youtube</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-youtube-play"></i>youtube-play</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-youtube-square"></i>youtube-square</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_16">
                <div class="row">
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-ambulance"></i>ambulance</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-h-square"></i>h-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-heart"></i>heart</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-heart-o"></i>heart-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-heartbeat"></i>heartbeat</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-hospital-o"></i>hospital-o</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-medkit"></i>medkit</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-plus-square"></i>plus-square</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-stethoscope"></i>stethoscope</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-user-md"></i>user-md</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wheelchair"></i>wheelchair</a></div>
                    <div class="fa-choose col-md-3 col-sm-4"><a><i class="fa fa-wheelchair-alt"></i>wheelchair-alt</a></div>
                </div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->

</section>


<?php \Yii::$app->view->on($this::EVENT_END_PAGE, function () { ?>
<script type="text/javascript">
$(function() {
    $(".fa-choose").click(function() {
        var icon = $(this).find('i').attr('class');
        if (typeof(parent.setIcon) == 'function') {
            parent.setIcon(icon);
            closeWin();
        }else{
            console.log(icon)
        }
    });
})
</script>
<?php }); ?>