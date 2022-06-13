<?php

namespace app\assets;

use yii\web\AssetBundle;

class Page404Asset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/page-404.css',
    ];
    public $js = [
        'js/page-404.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
