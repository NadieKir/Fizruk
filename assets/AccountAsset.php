<?php

namespace app\assets;

use yii\web\AssetBundle;

class AccountAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/account.css',
        'vendors/hystModal-0.4/dist/hystmodal.min.css',
    ];
    public $js = [
        'js/account.js',
        'vendors/hystModal-0.4/dist/hystmodal.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
