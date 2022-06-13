<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->name;

use app\assets\AboutUsAsset;
use yii\widgets\ActiveForm;
use yii\web\View;

AboutUsAsset::register($this);
?>

<section class="intro-section">
    <div class="intro-section-wrapper">
        <h1 class="about-us-intro-heading">Выбирая <span class="green">Fizruk</span>, вы получаете максимум для себя и своего здоровья</h1>
        <p class="intro-moto">Наша миссия — заботится о здоровье людей, вдохновляя их на изменение своего образа жизни и создавая тем самым гармоничное общество. Наша команда делает всё, чтобы человек приобретал
            новое жизненное видение и полностью раскрывал свой физический, эмоциональный, социальный и духовный потенциал.</p>
    </div>
</section>

<section class="club-photos-section">
    <div class="container">
        <h3 class="section-heading">Наши залы</h3>
    </div>
    <div class="owl-carousel owl-theme club-photos-slider">
        <img class="item" src="/img/gallery/1.gif" alt="club photo">
        <img class="item" src="/img/gallery/2.gif" alt="club photo">
        <img class="item" src="/img/gallery/3.gif" alt="club photo">
        <img class="item" src="/img/gallery/4.gif" alt="club photo">
        <img class="item" src="/img/gallery/5.gif" alt="club photo">
        <img class="item" src="/img/gallery/6.gif" alt="club photo">
        <img class="item" src="/img/gallery/7.gif" alt="club photo">
        <img class="item" src="/img/gallery/8.gif" alt="club photo">
        <img class="item" src="/img/gallery/9.gif" alt="club photo">
        <img class="item" src="/img/gallery/10.gif" alt="club photo">
        <img class="item" src="/img/gallery/11.gif" alt="club photo">
        <img class="item" src="/img/gallery/12.gif" alt="club photo">
        <img class="item" src="/img/gallery/13.gif" alt="club photo">
    </div>
</section>

<section class="trainers-section" id="trainers-section">
    <div class="container">
        <h3 class="section-heading">Наши тренера</h3>
    </div>
    <div class="owl-carousel owl-theme trainers-slider">

        <?php foreach ($allTrainers as $trainer) : ?>

            <div class="item trainer" style="background: url(/img/staff/<?= $trainer->photo ?>); background-size: cover;">
                <div class="trainer-desc">
                    <div class="trainer-main-info">
                        <p class="trainer-name"><?= $trainer->name ?></p>
                        <p class="trainer-service"><?= $trainer->trainerServices->service->service ?></p>
                    </div>
                    <div class="trainer-facts-wrapper">
                        <div class="trainer-fact">
                            <p>Опыт работы</p>
                            <p class="green"><?= $trainer->experience ?></p>
                        </div>
                        <div class="trainer-fact">
                            <p>Образование</p>
                            <p class="green"><?= $trainer->education ?></p>
                        </div>
                        <div class="trainer-fact">
                            <p>Достижения</p>
                            <p class="green"><?= $trainer->achievements ?></p>
                        </div>
                    </div>
                </div>

                <div class="trainer-like-comment">

                    <div class="trainer-like">

                        <?php $likeForm = ActiveForm::begin(['options' => ['class' => 'like-form']]) ?>

                        <?php if (in_array($trainer->trainer_id, $allUserLikes)) { ?>
                            <?= Html::submitButton(
                                Html::img('@web/img/liked.svg', ['alt' => 'liked']),
                                ['class' => 'like-img unlike-btn', 'data-likeAction' => 'unsetLike', 'data-trainer' => $trainer->trainer_id, 'width' => '23px', 'height' => '21px']
                            ) ?>
                        <?php } else { ?>
                            <?= Html::submitButton(
                                Html::img('@web/img/like.svg', ['alt' => 'like']),
                                ['class' => 'like-img like-btn', 'data-likeAction' => 'setLike', 'data-trainer' => $trainer->trainer_id, 'width' => '23px', 'height' => '21px']
                            ) ?>
                        <?php }; ?>

                        <?php ActiveForm::end() ?>

                        <span class="like-amount"><?= count($trainer->trainerLikes) ?></span>
                    </div>

                    <!-- <div class="trainer-comment">
                        <img class="comment-img" src="/img/comment.svg" alt="comment" width="23px" height="21px">
                        <span class="comment-amount">11</span>
                    </div> -->

                </div>
            </div>

        <?php endforeach; ?>

    </div>



    <div class="trainer-comment-modal">

    </div>
</section>

<section class="contacts">
    <div class="container">
        <h3 class="section-heading">Контакты</h3>
        <div class="contacts-info-map-wrapper">
            <div class="contacts-map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d37582.202430061916!2d27.613264!3d53.9337398!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcf93313c473f%3A0x5945a55c98973a5e!2z0L_RgC3Rgi4g0J_QvtCx0LXQtNC40YLQtdC70LXQuSA30LAsINCc0LjQvdGB0Lo!5e0!3m2!1sru!2sby!4v1651157938820!5m2!1sru!2sby" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contacts-info-wrapper">
                <div class="contacts-info">
                    <div class="contacts-info-row">
                        <h4 class="contacts-info-row-heading">Телефон</h4>
                        <p class="contacts-info-row-desc">+375 (44) 123-45-67</p>
                    </div>
                    <div class="contacts-info-row">
                        <h4 class="contacts-info-row-heading">Адрес</h4>
                        <p class="contacts-info-row-desc">г. Минск, пр-т Победителей, 7а (ст. м. Немига)</p>
                    </div>
                    <div class="contacts-info-row">
                        <h4 class="contacts-info-row-heading">Время работы</h4>
                        <p class="contacts-info-row-desc">Ежедневно 06:00 - 22:00</p>
                    </div>
                    <div class="contacts-info-row">
                        <h4 class="contacts-info-row-heading">Социальные сети</h4>
                        <div class="contacts-info-row-desc socials">
                            <div class="social">
                                <img src="/img/instagram.svg" alt="instagram">
                            </div>
                            <div class="social">
                                <img src="/img/telegram.svg" alt="telegram">
                            </div>
                            <div class="social">
                                <img src="/img/vk.svg" alt="vk">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>