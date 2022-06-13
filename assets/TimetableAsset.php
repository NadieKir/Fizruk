<?php

namespace app\assets;

use yii\web\AssetBundle;

class TimetableAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/timetable.css',
        'vendors/hystModal-0.4/dist/hystmodal.min.css',
    ];
    public $js = [
        'js/timetable.js',
        'vendors/hystModal-0.4/dist/hystmodal.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
