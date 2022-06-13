<?php

namespace app\assets;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',

        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css',
        'vendors/hystModal-0.4/dist/hystmodal.min.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
        'https://cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js',

        'js/main.js',
        'vendors/hystModal-0.4/dist/hystmodal.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
