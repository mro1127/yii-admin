<?php

namespace common\assets;

use yii\web\AssetBundle;

class JQueryAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery/dist';
    public $js = [
        YII_DEBUG ? 'jquery.js':'jquery.min.js',
    ];
}
