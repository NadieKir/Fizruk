<?php

use yii\helpers\Url;
use app\models\Card;

$this->title = Yii::$app->name;

use app\assets\ClubCardsAsset;
use yii\widgets\LinkPager;


ClubCardsAsset::register($this);
?>

<section class="selected-cards-section" id='selected-cards'>
    <div class="container">
        <h3 class="section-heading">Подобранные карты</h3>

        <!-- <div class="sort-block">
            <h5>Сортировать:</h5>
            <div class="sort-options">
                <span data-sort="default" class="active">по умолчанию</span>
                <span data-sort="price">по возрастанию цены</span>
                <span data-sort="popularity">по популярности</span>
            </div>
        </div> -->

        <?= $this->context->renderPartial('cards', compact('allClubCards', 'pages', 'type', 'hours', 'duration'))  ?>
    </div>
</section>