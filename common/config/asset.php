<?php

return [
    'bundles' => [
        'Adminlte' => [
            'class' => 'common\assets\AdminlteAsset',
        ],
        'JQuery' => [
            'class' => 'common\assets\JQueryAsset',
        ],
        'Bootstrap' => [
            'class' => 'common\assets\BootstrapAsset',
        ],
        'JQueryForm'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/jquery-form/dist',
            'js' => ['jquery.form.min.js'],
            'depends' => ['JQuery']
        ],
        'BootstrapTable'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/bootstrap-table/dist',
            'css' => [YII_DEBUG ? 'bootstrap-table.css' : 'bootstrap-table.min.css'],
            'js' => [YII_DEBUG ? 'bootstrap-table.js' : 'bootstrap-table.min.js'],
            'depends' => ['Bootstrap']
        ],
        'Layer'=> [
            'class' => 'yii\web\AssetBundle',
            'sourcePath' => '@bower/layer/dist',
            'js' => ['layer.js'],
            'depends' => ['JQuery']
        ],
    ],
];