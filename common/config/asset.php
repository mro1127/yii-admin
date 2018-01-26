<?php

return [
    'bundles' => [
        'Adminlte' => [
            'class' => 'common\assets\AdminlteAsset',
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
    ],
];