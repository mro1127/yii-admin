<?php

namespace common\assets;

use yii\web\AssetBundle;

class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap/dist';
    public $css = [
        'css/bootstrap.css',
    ];

    public $js = [
        'js/bootstrap.min.js',
    ];
}
