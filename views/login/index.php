<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::$app->name;

use app\assets\LoginAsset;

LoginAsset::register($this);
?>

<section class="main-section">

    <div class="main-form">
        <label class="tab authorisation active">Авторизация</label>
        <label class="tab registration">Регистрация</label>

        <?php $formAuth = ActiveForm::begin([
            'id' => 'form-authorization',
            'options' => ['class' => 'tab-form active'],
        ]) ?>

        <div class="box-input">
            <?= $formAuth->field($modelLogin, 'phone') ?>
        </div>

        <div class="box-input">
            <?= $formAuth->field($modelLogin, 'password')->passwordInput() ?>
        </div>

        <?= Html::submitButton('Войти', ['class' => 'button']) ?>

        <?php ActiveForm::end() ?>


        <?php $formReg = ActiveForm::begin([
            'id' => 'form-registration',
            'options' => ['class' => 'tab-form'],
        ]) ?>

        <div class="box-input">
            <?= $formReg->field($modelSignup, 'name') ?>
        </div>

        <div class="box-input">
            <?= $formReg->field($modelSignup, 'email') ?>
        </div>

        <div class="box-input">
            <?= $formReg->field($modelSignup, 'phone') ?>
        </div>

        <div class="box-input">
            <?= $formReg->field($modelSignup, 'password')->passwordInput() ?>
        </div>

        <div class="box-input">
            <?= $formReg->field($modelSignup, 'repeatPassword')->passwordInput() ?>
        </div>

        <?= Html::submitButton('Зарегистрироваться', ['class' => 'button']) ?>

        <?php ActiveForm::end() ?>
    </div>

</section>