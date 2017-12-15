<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@static';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'common\assets\BootstrapAsset',
        'common\assets\AdminlteAsset',
    ];

}
