<?php

namespace common\assets;

use yii\web\AssetBundle;

class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap/dist';
    public $css = [
        YII_DEBUG ? 'css/bootstrap.css':'css/bootstrap.min.css',
    ];

    public $js = [
        YII_DEBUG ? 'js/bootstrap.js':'js/bootstrap.min.js',
    ];
    public $depends = ['JQuery'];
}
