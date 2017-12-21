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
            'css' => ['bootstrap-table.min.css'],
            'js' => ['bootstrap-table.min.js'],
            'depends' => ['Bootstrap']
        ],
    ],
];