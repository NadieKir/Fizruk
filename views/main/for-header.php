<?php

use yii\helpers\Url;

?>

<section class="slider">
    <div class="owl-carousel owl-theme loop">
        <div class="item" id="item-1">
            <img src="/img/slider/slider1.jpg" alt="slider1">
            <div class="offer-construction">
                <h2>Попробуй безлимитный фитнес</h2>
                <div>
                    <p class="offer-secondary-text">Заряжен на <span class="green"> максимум</span></p>
                </div>
                <a href="<?= Url::to(['club-cards/index', 'type' => 'all', 'hours' => 'all', 'duration' => 'all']) ?>">
                    <div class="slider-offer-btn green-btn"><span>Выбрать карту</span></div>
                </a>
            </div>
        </div>

        <div class="item" id="item-2">
            <img src="/img/slider/slider3.png" alt="slider2">
            <div class="offer-construction">
                <h2>Первый визит — бесплатно</h2>
                <p class="offer-secondary-text">Выбирай любое из 20 групповых направлений, бассейн или тренажёрный зал</p>
                <a href="<?= Url::to(['timetable/index', 'weekday' => '1']) ?>">
                    <div class="slider-offer-btn green-btn"><span>Выбрать занятие</span></div>
                </a>
            </div>
        </div>

        <div class="item" id="item-3">
            <img src="/img/slider/slider2.jpg" alt="slider3">
            <div class="offer-construction">
                <h2>Лучший способ предугадать будущее — создать его</h2>
                <p class="offer-secondary-text">Мы предлагаем самые эффективные персональные тренировки с&nbsp;профессиональными спортсменами</p>
                <a href="<?= Url::to(['about-us/index#trainers-section']) ?>">
                    <div class="slider-offer-btn green-btn"><span>Выбрать тренера</span></div>
                </a>
            </div>
        </div>

    </div>
</section>

<section class="club-features">
    <div class="container">
        <div class="feature" id="feature-1">
            <h3>10 лет</h3>
            <p>ответственно работаем для вас и ещё <span class="green">нескольких тысяч</span> постоянных клиентов</p>
        </div>
        <div class="feature" id="feature-2">
            <h3>8 КМС</h3>
            <p>среди наших тренеров по <span class="green">различным</span> видам спорта от ММА до прыжков на батуте</p>
        </div>
        <div class="feature" id="feature-3">
            <h3>5 залов</h3>
            <p>с современным <span class="green">премиум-оборудованием</span> для достижения любых целей</p>
        </div>
    </div>
</section>