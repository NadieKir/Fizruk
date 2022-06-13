<?php

use yii\helpers\Url;
use yii\helpers\Html;

use app\models\Timetable;
use yii\widgets\ActiveForm;

$this->title = Yii::$app->name;

use app\assets\TimetableAsset;
use app\models\TrainingRegistered;

TimetableAsset::register($this);
?>

<section class="days-nav">
    <div class="container">

        <?php foreach ($timetableWeekdays as $timetableWeekday) : ?>

            <a href="<?= Url::to(['timetable/index', 'weekday' => $timetableWeekday->weekday_id]) ?>"><span class="day <?php if ($chosenWeekday == $timetableWeekday->weekday_id) echo 'active' ?>" data-weekday='<?= $timetableWeekday->weekday_id ?>'><?= $timetableWeekday->weekday ?></span></a>

        <?php endforeach; ?>

    </div>
</section>

<section class="timetable-section">
    <div class="container">

        <?php foreach ($allWeekdayTimes as $weekdayTime) : ?>

            <div class="timetable-row">

                <?php foreach ($chosenWeekdayTimetables as $chosenWeekdayTimetable) : ?>

                    <?php if ($chosenWeekdayTimetable->time_id == $weekdayTime->time_id) {  ?>

                        <div class="one-timetable">
                            <div class="time-place-wrapper">
                                <span class="time"><?= $chosenWeekdayTimetable->time->time ?></span>
                                <span class="place"><?= $chosenWeekdayTimetable->place->place ?></span>
                            </div>
                            <div class="name-trainer-wrapper">
                                <span class="service-name"><?= $chosenWeekdayTimetable->service->service ?></span>
                                <span class="service-trainer"><?php if ($chosenWeekdayTimetable->trainerService->trainer) echo $chosenWeekdayTimetable->trainerService->trainer->name;
                                                                else echo "Самостоятельно" ?></span>
                            </div>
                            <div class="button-capacity-wrapper">
                                <button class="arrow-btn enroll-btn" <?php if (!Yii::$app->user->isGuest && TrainingRegistered::isUserRegistered($chosenWeekdayTimetable) == 0) echo "data-hystmodal-enroll='#enrollTrainingModal'" ?> data-alreadyin="<?= TrainingRegistered::isUserRegistered($chosenWeekdayTimetable) ?>" data-trainingname="<?= $chosenWeekdayTimetable->service->service ?>" data-trainingid="<?= $chosenWeekdayTimetable->timetable_id ?>" data-trainingdate="<?= $this->context->getTrainingDate($chosenWeekdayTimetable) ?>" data-trainingtime="<?= $chosenWeekdayTimetable->time->time ?>">
                                    Записаться
                                </button>
                                <!-- <span class="capacity">Timetable::getLeftPlaces($chosenWeekdayTimetable)</span> -->
                            </div>
                        </div>

                    <?php } ?>

                <?php endforeach; ?>

            </div>

        <?php endforeach; ?>

    </div>
</section>

<!-- MODAL ENROLL TRAINING -->

<div class="hystmodal" id="enrollTrainingModal" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window" role="dialog" aria-modal="true">

            <h3 class="modal-heading">Запись на тренировку</h3>

            <div class="modal-info">
                <p>Что &nbsp;&nbsp;<span class="training-name"></span></p>
                <p>Когда &nbsp;&nbsp;<span class="training-date"></span></p>
                <p>Кто &nbsp;&nbsp;<span><?= \Yii::$app->user->identity->name ?></span></p>
                <p>Телефон &nbsp;&nbsp;<span><?= \Yii::$app->user->identity->phone ?></span></p>
            </div>

            <?php $enrollTrainingForm = ActiveForm::begin() ?>

            <?= $enrollTrainingForm->field($modelEnrollTraining, 'user')->hiddenInput(['value' => \Yii::$app->user->identity->user_id])->label(false); ?>
            <?= $enrollTrainingForm->field($modelEnrollTraining, 'training')->hiddenInput(['value' => ''])->label(false); ?>
            <?= $enrollTrainingForm->field($modelEnrollTraining, 'date')->hiddenInput(['value' => ''])->label(false); ?>

            <?= Html::submitButton(
                'Записаться',
                ['class' => 'green-modal-btn', 'data-hystclose' => true]
            ) ?>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>