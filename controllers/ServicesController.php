<?php

namespace app\controllers;

use app\models\Service;
use app\models\ServiceType;
use yii\helpers\Html;
use yii\helpers\Url;

use yii\web\Controller;

class ServicesController extends Controller
{
    public function actionIndex($id)
    {
        $currServiceType = $id;
        $currServiceId = ServiceType::findOne(['alias' => $currServiceType])->service_type_id;
        $allSubServices = Service::findAll(['service_type_id' => $currServiceId]);

        return $this->render('index', compact('currServiceType', 'allSubServices'));
    }
}
