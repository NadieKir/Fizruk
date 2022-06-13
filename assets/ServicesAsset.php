<?php

namespace app\assets;

use yii\web\AssetBundle;

class ServicesAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/services.css',
    ];
    public $js = [
        'js/services.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
