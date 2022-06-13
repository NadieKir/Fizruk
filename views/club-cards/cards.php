<?php

use yii\helpers\Url;
use app\models\Card;

$this->title = Yii::$app->name;

use app\assets\ClubCardsAsset;
use yii\widgets\LinkPager;


ClubCardsAsset::register($this);
?>


<div class="selected-cards">

<?php foreach ($allClubCards as $clubCard) : ?>

    <div class="club-card">
        <div class="club-card-front-side card-<?= Card::getCardDurationNumber($clubCard) ?>-month">
            <div class="card-desc">
                <img src="/img/<?= in_array(Card::getCardDurationNumber($clubCard), ['1', '3']) ? 'black-logo.svg' : 'white-logo.svg' ?>" alt="logo" height="20px">
                <p class="card-type"><?= $clubCard->cardType->type ?></p>
                <p class="card-name"><?= $clubCard->name ?></p>
                <p class="card-time"><?= $clubCard->cardVisitingHours->visiting_hours ?></p>
            </div>
        </div>
        <div class="club-card-back-side card-<?= Card::getCardDurationNumber($clubCard) ?>-month">
            <div class="short-name-logo-wrapper">
                <span class="short-name">[ <?= $clubCard->short_name ?> ]</span>
                <img src="/img/<?= in_array(Card::getCardDurationNumber($clubCard), ['1', '3']) ? 'black-logo.svg' : 'white-logo.svg' ?>" alt="logo" height="20px">
            </div>
            <div class="card-desc-price-wrapper">
                <div class="card-desc">

                    <?php foreach (Card::getArrOfIncludes($clubCard) as $cardIncluded) : ?>

                        <p><?= $cardIncluded ?></p>

                    <?php endforeach; ?>

                </div>
                <div class="card-desc-line"></div>
                <div class="card-price"><?= $clubCard->price ?> р.</div>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<?php if (count($allClubCards) == 0) { ?>
    <div>Таких карт пока нет</div>
<?php } ?>

<div class="pagination-wrapper">
    <?= LinkPager::widget([
    'pagination' => $pages,
    'view' => $cards,
    'hideOnSinglePage' => true,
    'nextPageLabel' => '<img src="/img/arrow.svg" height="20px"></img>',
    'prevPageLabel' => '<img src="/img/arrow.svg" height="20px"></img>',
    ]); ?> 
</div>



</div>
