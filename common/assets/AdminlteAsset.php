<?php

namespace common\assets;

use yii\web\AssetBundle;

class AdminlteAsset extends AssetBundle
{
    public $sourcePath = '@bower/admin-lte/dist';
    public $css = [
        YII_DEBUG ? 'css/AdminLTE.css':'css/AdminLTE.min.css',
        YII_DEBUG ? 'css/skins/_all-skins.css':'css/skins/_all-skins.min.css',
    ];
    public $js = [
        YII_DEBUG ? 'js/adminlte.js':'js/adminlte.min.js',
    ];
}
