<?php

namespace app\assets;

use yii\web\AssetBundle;

class ClubCardsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/club-cards.css',
    ];
    public $js = [
        'js/club-cards.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
