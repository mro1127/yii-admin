<?php

return [
    'linkAssets' => env('LINK_ASSETS'),
    'bundles' => [

        'Adminlte' => [
            'class' => 'common\assets\AdminlteAsset',
        ],
        // JQuery 及 JQuery插件
        'JQuery' => [
            'class' => 'common\assets\JQueryAsset',
        ],

        'iCheck'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/admin-lte/plugins/iCheck',
            'js' => [YII_DEBUG ? 'icheck.js':'icheck.min.js'],
            'css' => ['all.css'],
            'depends' => ['JQuery']
        ],
        'JQueryForm'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/jquery-form/dist',
            'js' => ['jquery.form.min.js'],
            'depends' => ['JQuery']
        ],
        'JQueryValidation'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/jquery-validation/dist',
            'js' => [
                YII_DEBUG ? 'jquery.validate.js' : 'jquery.validate.min.js',
                YII_DEBUG ? 'localization/messages_zh.js' : 'localization/messages_zh.min.js'

            ],
            'depends' => ['JQuery']
        ],
        'JQuerySlimscroll'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/jquery-slimscroll',
            'js' => [YII_DEBUG ? 'jquery.slimscroll.js' : 'jquery.slimscroll.min.js'],
            'depends' => ['JQuery']
        ],
        'Sly'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/sly/dist',
            'js' => [YII_DEBUG ? 'sly.js' : 'sly.min.js'],
            'depends' => ['JQuery']
        ],
        
        'Layer'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/layer/dist',
            'js' => ['layer.js'],
            'depends' => ['JQuery']
        ],
        'Select2'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/select2/dist',
            'js' => ['js/select2.min.js'],
            'css' => ['css/select2.min.css'],
            'depends' => ['JQuery']
        ],
        'InputMask'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/inputmask/dist',
            'js' => [
                YII_DEBUG ? 'jquery.inputmask.bundle.js' : 'min/jquery.inputmask.bundle.min.js',
                'inputmask/inputmask.date.extensions.js'
            ],
            'depends' => ['JQuery']
        ],
        'BlueimpCanvasToBlob'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/blueimp-canvas-to-blob/js',
            'js' => ['canvas-to-blob.min.js'],
            'depends' => ['JQuery']
        ],
        'BlueimpLoadImage'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/blueimp-load-image/js',
            'js' => ['load-image.all.min.js'],
            'depends' => ['JQuery']
        ],
        
        'Moment'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/moment/min',
            'js' => [YII_DEBUG ? 'moment-with-locales.js':'moment-with-locales.min.js'],
        ],


        // Bootstrap 及 Bootstrap插件
        'Bootstrap' => [
            'class' => 'common\assets\BootstrapAsset',
        ],
        'BootstrapTable'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/bootstrap-table/dist',
            'css' => [YII_DEBUG ? 'bootstrap-table.css' : 'bootstrap-table.min.css'],
            'js' => [YII_DEBUG ? 'bootstrap-table.js' : 'bootstrap-table.min.js'],
            'depends' => ['Bootstrap']
        ],
        'BootstrapDatepicker'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/bootstrap-datepicker/dist',
            'css' => [YII_DEBUG ? 'css/bootstrap-datepicker.css' : 'css/bootstrap-datepicker.min.css'],
            'js' => [YII_DEBUG ? 'js/bootstrap-datepicker.js' : 'js/bootstrap-datepicker.min.js', 'locales/bootstrap-datepicker.zh-CN.min.js'],
            'depends' => ['Bootstrap']
        ],

        'DateRangePicker'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/bootstrap-daterangepicker',
            'css' => ['daterangepicker.css'],
            'js' => ['daterangepicker.js'],
            'depends' => ['Bootstrap','JQuery', 'Moment']
        ],

        'FontAwesome'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/font-awesome',
            'css' => [YII_DEBUG ? 'css/font-awesome.css' : 'css/font-awesome.min.css'],
        ],

        'Vue'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/vue/dist',
            'js' => [YII_DEBUG ? 'vue.js' : 'vue.min.js'],
        ],


        // 文件上传
        'FileUpload'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/blueimp-file-upload',
            'js' => [
                'js/vendor/jquery.ui.widget.js',
                'js/jquery.iframe-transport.js',
                'js/jquery.fileupload.js',
                'js/jquery.fileupload-process.js',
                'js/jquery.fileupload-image.js',
                'js/jquery.fileupload-audio.js',
                'js/jquery.fileupload-video.js',
                'js/jquery.fileupload-validate.js',
            ],
            'depends' => ['JQuery', 'BlueimpCanvasToBlob', 'BlueimpLoadImage']
        ],
        // 文件上传 - 定制
        'FileUploadCustom'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@commonStatic/lib/fileupload-custom',
            'js' => [
                'jquery.fileupload-custom-ui.js',
            ],
            'css' => [
                'jquery.fileupload-custom-ui.css',
            ],
            'depends' => ['FileUpload', 'Adminlte', 'Bootstrap']
        ],

        '3DLine' =>[
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@commonStatic/lib/3d-lines',
            'js' => [
                'three.min.js',
                'projector.js',
                'canvas-renderer.js',
                '3d-lines-animation.js',
                'color.js',
            ],
            'css' => ['style.css'],
        ],
        'BgBubbles' =>[
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@commonStatic/lib/bg-bubbles',
            'js' => ['main.js'],
            'css' => ['style.css'],
            'depends' => ['JQuery']
        ],
        'LoadingOverlay' =>[
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/gasparesganga-jquery-loading-overlay/dist',
            'js' => [YII_DEBUG ? 'loadingoverlay.min.js':'loadingoverlay.js'],
            'depends' => ['JQuery']
        ],

    ],
];