<?php

namespace app\assets;

use yii\web\AssetBundle;

class PromosAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/promos.css',
    ];
    public $js = [
        'js/promos.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
