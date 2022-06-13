<?php

namespace app\controllers;

use Yii;

use app\models\Card;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;

use yii\web\Response;
use yii\widgets\ActiveForm;

use yii\web\Controller;

class LoginController extends Controller
{
    public $layout = 'login';

    public function actionIndex()
    {
        $modelSignup = new SignupForm();
        $modelLogin = new LoginForm();

        if ($modelSignup->load(Yii::$app->request->post()) && $modelSignup->validate()) {
            if ($user = $modelSignup->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        if ($modelLogin->load(Yii::$app->request->post()) && $modelLogin->validate()) {

            if ($user = User::findOne(['phone' => $modelLogin->phone])) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goBack();
                }
            }
        }

        return $this->render('index', compact('modelSignup', 'modelLogin'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
