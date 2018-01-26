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
        'js/common.js',
    ];
    public $depends = ['JQuery', 'Bootstrap', 'Adminlte', 'JQueryForm','JQueryValidation', 'Layer', 'FontAwesome'];

}
