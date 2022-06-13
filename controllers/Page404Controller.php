<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;

class Page404Controller extends Controller
{
    public $layout = 'page-404';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
