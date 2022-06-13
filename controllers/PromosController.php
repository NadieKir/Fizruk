<?php

namespace app\controllers;

use app\models\Promo;

use yii\web\Controller;

class PromosController extends Controller
{
    public function actionIndex()
    {
        $allPromos = Promo::find()->all();
        return $this->render('index', compact('allPromos'));
    }
}
