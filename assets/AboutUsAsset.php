<?php

namespace app\assets;

use yii\web\AssetBundle;

class AboutUsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/about-us.css',

        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
        'https://cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js',

        'js/about-us.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
