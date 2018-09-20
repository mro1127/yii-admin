<?php

return [
    'bundles' => [
        'Adminlte' => [
            'class' => 'common\assets\AdminlteAsset',
        ],

        'iCheck'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/admin-lte/plugins/iCheck',
            'js' => [YII_DEBUG ? 'icheck.js':'icheck.min.js'],
            'css' => ['all.css'],
            'depends' => ['JQuery']
        ],
        // JQuery 及 JQuery插件
        'JQuery' => [
            'class' => 'common\assets\JQueryAsset',
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
            'js' => [YII_DEBUG ? 'jquery.validate.js' : 'jquery.validate.min.js'],
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
        ],
    ],
];