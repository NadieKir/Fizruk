<?php

use yii\helpers\Url;

?>

<section class="club-cards-filter-section">
    <div class="container">
        <h1 class="club-cards-filter-heading">Подберите подходящую вам клубную карту по <span class="green"> самой выгодной</span> цене в городе</h1>
        <div class="all-club-cards-filters-wrapper">
            <div class="all-club-cards-filters">
                <div class="all-filter-names">
                    <h3 class="filter-name">Тип карты</h3>
                    <h3 class="filter-name">Время посещения</h3>
                    <h3 class="filter-name">Длительность</h3>
                    <!-- <h3 class="filter-name">Что включено <br><span class="small"> (можно несколько)</span></h3> -->
                </div>
                <div class="all-filter-options">
                    <div class="filter-options">
                        <span class="filter-option filter-option-type <?php if (Yii::$app->request->get('type') == 'all') echo 'active' ?>" data-type='all'>Все</span>

                        <?php foreach ($allCardTypes as $cardType) : ?>

                            <span class="filter-option filter-option-type <?php if (Yii::$app->request->get('type') == $cardType->type_id) echo 'active' ?>" data-type='<?= $cardType->type_id ?>'><?= $cardType->type ?></span>

                        <?php endforeach; ?>

                    </div>
                    <div class="filter-options">
                        <span class="filter-option filter-option-hours <?php if (Yii::$app->request->get('hours') == 'all') echo 'active' ?>" data-hours='all'>Все</span>

                        <?php foreach ($allCardHours as $cardHours) : ?>

                            <span class="filter-option filter-option-hours <?php if (Yii::$app->request->get('hours') == $cardHours->visiting_hours_id) echo 'active' ?>" data-hours='<?= $cardHours->visiting_hours_id ?>'><?= $cardHours->visiting_hours ?></span>

                        <?php endforeach; ?>

                    </div>
                    <div class="filter-options">
                        <span class="filter-option filter-option-duration <?php if (Yii::$app->request->get('duration') == 'all') echo 'active' ?>" data-duration='all'>Все</span>

                        <?php foreach ($allCardDurations as $cardDuration) : ?>

                            <span class="filter-option filter-option-duration <?php if (Yii::$app->request->get('duration') == $cardDuration->duration_id) echo 'active' ?>" data-duration='<?= $cardDuration->duration_id ?>'><?= $cardDuration->duration ?></span>

                        <?php endforeach; ?>

                    </div>
                    <!-- <div class="filter-options">
                        <span class="filter-option">Тренажёрный зал</span>
                        <span class="filter-option">Групповые занятия</span>
                        <span class="filter-option">Индивидуальные занятия</span>
                        <span class="filter-option">Сауна</span>
                        <span class="filter-option">Весь бассейн</span>
                        <span class="filter-option">Только плавание</span>
                        <span class="filter-option">Напитки из фитобара</span>
                    </div> -->
                </div>
            </div>
            <a href="<?= Url::to(['club-cards/index']) ?>" class="find-card-btn">
                <div class="green-btn"><span>Подобрать карту</span></div>
            </a>
        </div>
    </div>
</section>