<?php
// 引入helpers，里面放一些方法
require_once(__DIR__ . '/../helpers.php');

// 别名
Yii::setAlias('@base', realpath(__DIR__ . '/../../'));
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@static', './static');
Yii::setAlias('@commonStatic', dirname(dirname(__DIR__)) . '/common/static');
Yii::setAlias('@storage', realpath(__DIR__ . '/../../storage'));


Yii::setAlias('@frontendUrl', env('FRONTEND_HOST_INFO') . env('FRONTEND_BASE_URL'));
Yii::setAlias('@backendUrl', env('BACKEND_HOST_INFO') . env('BACKEND_BASE_URL'));
Yii::setAlias('@storageUrl', env('STORAGE_HOST_INFO') . env('STORAGE_BASE_URL'));


