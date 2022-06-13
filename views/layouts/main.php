<?php

use app\models\CardDuration;
use app\models\CardType;
use app\models\CardVisitingHours;
use app\models\Service;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\ServiceType;
use app\models\TimetableWeekday;

$needBigHeader = ['main', 'services', 'club-cards'];
$currPage = Yii::$app->controller->id;

$currWeekday = TimetableWeekday::getCurrWeekday();

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/icon.svg">
    <?php $this->registerCsrfMetaTags() ?>
    <title> <?= Html::encode($this->title) ?> </title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <?php if (in_array($currPage, $needBigHeader))
        echo '<section class="first-screen-wrapper">';
    ?>

    <header class="header">
        <div class="container">
            <a href="<?= Url::to(['main/index']) ?>"><?= Html::img('@web/img/logo.svg', ['alt' => 'logo']) ?></a>
            <nav class="main-nav">
                <a href="<?= Url::to(['services/index', 'id' => 'gym']) ?>" <?php if ($currPage == 'services') echo 'class="active"' ?>><span data-hover="Услуги">Услуги</span></a>
                <a href="<?= Url::to(['club-cards/index', 'type' => 'all', 'hours' => 'all', 'duration' => 'all']) ?>" <?php if ($currPage == 'club-cards') echo 'class="active"' ?>><span data-hover="Клубные карты">Клубные карты</span></a>
                <a href="<?= Url::to(['timetable/index', 'weekday' => $currWeekday]) ?>" <?php if ($currPage == 'timetable') echo 'class="active"' ?>><span data-hover="Расписание">Расписание</span></a>
                <a href="<?= Url::to(['promos/index']) ?>" <?php if ($currPage == 'promos') echo 'class="active"' ?>><span data-hover="Акции">Акции</span></a>
                <a href="<?= Url::to(['about-us/index']) ?>" <?php if ($currPage == 'about-us') echo 'class="active"' ?>><span data-hover="О нас">О нас</span></a>
            </nav>
            <div class="account">
                <?php
                if (Yii::$app->user->isGuest) {
                    echo '<span class="user-name">Гость</span>';
                } else echo "<a href='" .  Url::to(['account/index']) . "'><span class='user-name'>" . \Yii::$app->user->identity->name . "</span></a>";
                ?>

                <?php if (Yii::$app->user->isGuest) {
                    echo "<a href='" . Url::to(['login/index']) . "'>" . Html::img('@web/img/enter.svg', ['alt' => 'enter']) . "</a>";
                } else {
                    echo Html::beginForm(['/login/logout'], 'post')
                        . Html::submitButton(
                            Html::img('@web/img/exit.svg', ['alt' => 'exit']),
                            ['class' => 'logout-btn']
                        )
                        . Html::endForm();
                }  ?>



            </div>
        </div>
    </header>

    <?php if (in_array($currPage, $needBigHeader)) {
        // services

        $allServiceTypes = ServiceType::find()->all();

        $currServiceType = Yii::$app->request->get('id');
        $currServiceId = ServiceType::findOne(['alias' => $currServiceType])->service_type_id;
        $allSubServices = Service::findAll(['service_type_id' => $currServiceId]);

        // cards

        $allCardTypes = CardType::find()->all();
        $allCardDurations = CardDuration::find()->all();
        $allCardHours = CardVisitingHours::find()->all();

        echo $this->render('/' . $currPage . '/for-header', compact('allServiceTypes', 'allSubServices', 'allCardTypes', 'allCardDurations', 'allCardHours'));
    }
    ?>


    <?php if (in_array($currPage, $needBigHeader))
        echo '</section>';
    ?>

    <?= $content ?>


    <footer class="footer">
        <div class="container main-footer">
            <a href="<?= Url::to(['main/index']) ?>"><?= Html::img('@web/img/logo.svg', ['alt' => 'logo']) ?></a>
            <div class="nav-social-wrapper">
                <div class="footer-nav-contacts-wrapper">
                    <div class="footer-nav">
                        <h6>Навигация</h6>
                        <div class="footer-info-links">
                            <a href="<?= Url::to(['services/index', 'id' => 'gym']) ?>">Услуги</a>
                            <a href="<?= Url::to(['club-cards/index', 'type' => 'all', 'hours' => 'all', 'duration' => 'all']) ?>">Клубные карты</a>
                            <a href="<?= Url::to(['timetable/index', 'weekday' => $currWeekday]) ?>">Расписание</a>
                            <a href="<?= Url::to(['promos/index']) ?>">Акции</a>
                            <a href="<?= Url::to(['about-us/index']) ?>">О нас</a>
                        </div>
                    </div>
                    <div class="footer-contacts">
                        <h6>Контакты</h6>
                        <div class="footer-info-links">
                            <div class="contact">
                                <span>Телефон</span>
                                <p>+375 (44) 123-45-67</p>
                            </div>
                            <div class="contact">
                                <span>Адрес</span>
                                <p>г. Минск, пр-т Победителей, 7а (ст. м. Немига)</p>
                            </div>
                            <div class="contact">
                                <span>Время работы</span>
                                <p>Ежедневно 06:00 - 22:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="socials">
                    <a class="social" href="<?= Url::to(['page-404/index']) ?>">
                        <?= Html::img('@web/img/instagram.svg', ['alt' => 'instagram']) ?>
                    </a>
                    <a class="social">
                        <?= Html::img('@web/img/telegram.svg', ['alt' => 'telegram']) ?>
                    </a>
                    <a class="social">
                        <?= Html::img('@web/img/vk.svg', ['alt' => 'vk']) ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <div class="container copyright-info">
            <span>ООО “ФИЗРУК СПОРТ” © 2022 &nbsp;&nbsp; | &nbsp;&nbsp; All rights reserved</span>
            <span>Разработано студией "Kireyenko Agency"</span>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>