<?php

use yii\helpers\Url;
use app\models\Card;

$this->title = Yii::$app->name;

use app\assets\MainAsset;
use app\controllers\MainController;

MainAsset::register($this);
?>

<section class="services-preview">
    <div class="container">
        <h3 class="section-heading">Услуги</h3>
        <div class="services-preview-wrapper">

            <div class="services-preview-wrapper-row">

                <a href="<?= Url::to(['services/index', 'id' => 'gym']) ?>">
                    <div class="service-preview">
                        <img src="/img/services-preview/zal.png" alt="">
                        <div class="service-name-btn-wrapper">
                            <span class="service-name">Тренажёрный зал</span>
                            <span class="arrow-btn"><span class="arrow-btn-action">Подробнее</span></span>
                        </div>
                    </div>
                </a>

                <a href="<?= Url::to(['services/index', 'id' => 'pool']) ?>">
                    <div class="service-preview">
                        <img src="/img/services-preview/pool.png" alt="">
                        <div class="service-name-btn-wrapper">
                            <span class="service-name">Бассейн</span>
                            <span class="arrow-btn"><span class="arrow-btn-action">Подробнее</span></span>
                        </div>
                    </div>
                </a>

            </div>

            <div class="services-preview-wrapper-row">
                <a href="<?= Url::to(['services/index', 'id' => 'sauna']) ?>">
                    <div class="service-preview">
                        <img src="/img/services-preview/sauna.png" alt="">
                        <div class="service-name-btn-wrapper">
                            <span class="service-name">Сауна</span>
                            <span class="arrow-btn"><span class="arrow-btn-action">Подробнее</span></span>
                        </div>
                    </div>
                </a>

                <a href="<?= Url::to(['services/index', 'id' => 'group']) ?>">
                    <div class="service-preview">
                        <img src="/img/services-preview/group.png" alt="">
                        <div class="service-name-btn-wrapper">
                            <span class="service-name">Групповые занятия</span>
                            <span class="arrow-btn"><span class="arrow-btn-action">Подробнее</span></span>
                        </div>
                    </div>
                </a>

                <a href="<?= Url::to(['services/index', 'id' => 'kids']) ?>">
                    <div class="service-preview">
                        <img src="/img/services-preview/kids.png" alt="">
                        <div class="service-name-btn-wrapper">
                            <span class="service-name">Детский фитнес</span>
                            <span class="arrow-btn"><span class="arrow-btn-action">Подробнее</span></span>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

<section class="club-benefits">
    <div class="marquee">
        <p class="club-benefit" id="club-benefit-1">Система скидок для постоянных клиентов</p>
        <p class="club-benefit" id="club-benefit-2">Бесплатная парковка рядом с фитнес-клубом</p>
        <p class="club-benefit" id="club-benefit-3">Бар с фито- и протеиновыми напитками прямо в клубе</p>
        <p class="club-benefit" id="club-benefit-4">Скидки у партнёров для всех держателей клубных карт</p>
    </div>
</section>

<!-- // -->

<?php

$monthCase = '';
if (in_array($marathonParticipants % 10, [1, 5, 6, 7, 8, 9, 0])) $monthCase = 'человек';
else $monthCase = 'человекa';

?>

<section class="marathon">
    <div class="marathon-info-wrapper">
        <div class="marathon-container-1">
            <div class="marathon-info">
                <p class="already-in-participants">К нам уже присоединилось<br> <span class="green num-of-participants"><?= $marathonParticipants ?></span> <?= $monthCase ?></p>
                <h4 class="marathon-heading">Начни лето <span class="green">правильно</span></h4>
                <p class="marathon-place-time">1 июня в 10:00 в парке Челюскинцев</p>
                <p class="marathon-desc">Прими участие в ежегодном <span class="green">бесплатном</span> марафоне на 5, 10 и 15 километров от фитнес-клуба FIZRUK
                    и получи возможность побороться за <span class="green">клубные карты</span> на 1, 6 и даже 12 месяцев!
                </p>
                <button class="enroll-marathon-btn green-btn" <?= $this->context->addEnrollMarathonBtnAttrs($isUserMarathonPart) ?>><span>Записаться</span></button>
            </div>
        </div>
    </div>
    <div class="marathon-countdown-wrapper">
        <div class="marathon-container-2">
            <h4 class="countdown-heading">До марафона осталось</h4>

            <div class="marathon-countdown">
                <div class="count-part-wrapper">
                    <div class="number" id="countdown-days">38</div>
                    <div class="desc">дней</div>
                </div>
                <div class="colon">:</div>
                <div class="count-part-wrapper">
                    <div class="number" id="countdown-hours">19</div>
                    <div class="desc">часов</div>
                </div>
                <div class="colon">:</div>
                <div class="count-part-wrapper">
                    <div class="number" id="countdown-minutes">8</div>
                    <div class="desc">минут</div>
                </div>
                <div class="colon">:</div>
                <div class="count-part-wrapper">
                    <div class="number" id="countdown-seconds">22</div>
                    <div class="desc">секунд</div>
                </div>
            </div>

        </div>
    </div>

    <!-- MARATHON MODAL -->

    <div class="hystmodal" id="marathonModal" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">

                <div id="marathonModalEnroll">
                    <div class="enroll-wrapper">
                        <h3 class="enroll-modal-heading">Запись на <span class="green service-name">марафон</span></h3>
                        <span class="enroll-date-time">01.06.2022 в 10:00</span>
                    </div>

                    <div class="enroll-wrapper">
                        <span class="name-heading">Имя &nbsp;&nbsp;<span class="user-name green"><?= $currUser->name ?></span></span>
                        <span class="phone-heading">Телефон &nbsp;&nbsp;<span class="user-phone green"><?= $currUser->phone ?></span></span>
                    </div>

                    <button class="green-btn" data-userId='<?= $currUser->user_id ?>'><span>Подтвердить</span></button>
                </div>

                <div id="marathonModalSuccess">
                    <div class="enroll-wrapper">
                        <h3 class="enroll-modal-heading">Вы участник марафона!</h3>
                        <span class="marathon-modal-desc">Отменить запись можно в <span class="green"> личном кабинете</span></span>
                    </div>

                    <div class="enroll-wrapper">
                        <span class="registration-number"></span>
                        <span class="marathon-modal-desc">Ваш регистрационный номер</span>
                    </div>

                    <div class="enroll-warning">
                        <img src="/img/exclamation.svg" alt="exclamation" height="45px">
                        <p>Сбор участников происходит в <span class="green"> 9:30</span> для подтверждения регистрации и выдачи спортивных маек</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- END MARATHON MODAL -->

</section>


<section class="club-cards">
    <div class="container">
        <h3 class="section-heading">Клубные карты</h3>

        <div class="club-cards-wrapper">

            <?php foreach ($top3Cards as $topCard) : ?>

                <div class="club-card">
                    <span class="club-card-short-name">[ <?= $topCard->short_name ?> ]</span>
                    <div class="club-card-headings">
                        <h5 class="club-card-heading"><?= $topCard->cardType->type ?></h5>
                        <h5 class="club-card-heading"><?= $topCard->cardVisitingHours->visiting_hours ?></h5>
                        <h5 class="club-card-heading"><?= $topCard->cardDuration->duration ?></h5>
                    </div>

                    <div class="club-card-included">

                        <?php foreach (Card::getArrOfIncludes($topCard) as $oneIncluded) : ?>
                            <p><?= $oneIncluded ?></p>
                        <?php endforeach; ?>

                    </div>
                    <span class="club-card-price"><?= $topCard->price ?> р.</span>
                </div>

            <?php endforeach; ?>

        </div>

        <a class="arrow-btn" href="<?= Url::to(['club-cards/index', 'type' => 'all', 'hours' => 'all', 'duration' => 'all']) ?>"><span class="arrow-btn-action">Смотреть все</span></a>

    </div>
</section>

<!-- <section class="service-test">
    <div class="container">
        <div class="service-test-info">
            <h3 class="service-test-heading">Не знаете, <span class="green"> какое направление</span> выбрать?</h3>
            <p class="service-test-desc">Пройдите этот <span class="bold"> быстрый тест</span> и узнайте, какие занятия в&nbsp;фитнес-клубе FIZRUK вам <span class="bold">точно понравятся</span></p>
            <img src="/img/long-arrow.svg" alt="long-arrow">
        </div>
        <div class="service-test-test-wrapper">
            <span class="question-amount-info">Вопрос
                <span id="number-of-question">1</span>
                из
                <span id="number-of-all-questions">5</span>
            </span>
            <div id="question">Ваш возраст</div>
            <div class="options">
                <div data-id="0" class="option option1">До 14 лет</div>
                <div data-id="1" class="option option2">14-39 лет</div>
                <div data-id="2" class="option option3">40-55 лет</div>
                <div data-id="3" class="option option4">55 лет</div>
            </div>
            <a class="arrow-btn" id="btn-next" href=""><span class="arrow-btn-action">Далее</span></a>
        </div>
    </div>
</section> -->

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
                            <a class="social" href="#">
                                <img src="/img/instagram.svg" alt="instagram">
                            </a>
                            <a class="social" href="#">
                                <img src="/img/telegram.svg" alt="telegram">
                            </a>
                            <a class="social" href="#">
                                <img src="/img/vk.svg" alt="vk">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>