<?php

use yii\helpers\Url;

$this->title = Yii::$app->name;

use app\assets\PromosAsset;

PromosAsset::register($this);
?>

<!-- <section class="sort-promos-section">
    <div class="container">
        <span class="sort-btn active">Все</span>
        <span class="sort-btn">Акции</span>
        <span class="sort-btn">Скидки</span>
    </div>
</section> -->

<section class="all-promos-section">
    <div class="container">

        <?php foreach ($allPromos as $promo) : ?>

            <div class="promo">
                <img src="/img/promos/<?= $promo->image ?>" alt="promo photo">
                <div class="promo-desc">
                    <div class="type-time-wrapper">
                        <span class="promo-type green"><?= $promo->type ?></span>
                        <span class="promo-time">До <?= $promo->ending_date ?></span>
                    </div>
                    <h4 class="promo-heading"><?= $promo->name ?></h4>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</section>