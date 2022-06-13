<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->name;

use app\assets\Page404Asset;
use app\controllers\Page404Controller;

Page404Asset::register($this);

?>

<section class="main-404-section">
    <div class="container">
        <div class="info-block">
            <h2>Страница не найдена</h2>
            <p>Возможно был введён неверный адрес или страница была удалена</p>
            <a href="<?= Url::to(['main/index']) ?>" class="green-btn"><span>На главную</span></a>
        </div>
        <?= Html::img('@web/img/404.svg', ['alt' => '404']) ?>
    </div>
</section>