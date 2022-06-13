<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->name;

use app\assets\AccountAsset;
use app\models\Card;
use yii\widgets\ActiveForm;

AccountAsset::register($this);

?>

<section class="user-info-section">
    <div class="container">
        <div class="user-info-wrapper">
            <img src="/img/user.svg" alt="user photo" width="175px" height="175px">
            <div class="user-info">
                <span class="user-name"><?= $currUser->name ?></span>
                <!-- <span class="green">Возраст &nbsp;&nbsp; <span class="user-data">19 лет</span></span> -->
                <span class="green">Телефон &nbsp;&nbsp;<span class="user-data"><?= $currUser->phone ?></span></span>
                <span class="green">Текущая карта &nbsp;&nbsp;<span class="user-data">
                        <?php if ($userCard) echo "[ " . $userCard->card->short_name . " ]";
                        else echo 'У вас нет клубной карты' ?>
                    </span></span>
            </div>
        </div>
        <div class="manage-profile-wrapper">
            <h3 class="manage-profile-heading">Управление данными</h3>
            <div class="btns-wrapper">
                <button class="green-btn" data-hystmodal-phone='#changePhoneModal'>Изменить телефон</button>
                <button class="green-btn" data-hystmodal-password='#changePasswordModal'>Изменить пароль</button>
            </div>
        </div>
    </div>
</section>

<!-- MODALS -->

<div class="hystmodal" id="changePhoneModal" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window" role="dialog" aria-modal="true">

            <h3 class="modal-heading">Изменить номер телефона</h3>

            <?php $formChangePhone = ActiveForm::begin([
                'id' => 'form-change-phone',
            ]) ?>

            <?= $formChangePhone->field($modelChangePhone, 'newPhone') ?>

            <?= Html::submitButton('Изменить', ['class' => 'green-modal-btn']) ?>

            <?php ActiveForm::end() ?>

        </div>
    </div>
</div>

<div class="hystmodal" id="changePasswordModal" aria-hidden="true">
    <div class="hystmodal__wrap">
        <div class="hystmodal__window" role="dialog" aria-modal="true">

            <h3 class="modal-heading">Изменить пароль</h3>

            <?php $formChangePassword = ActiveForm::begin([
                'id' => 'form-change-password',
            ]) ?>

            <?= $formChangePassword->field($modelChangePassword, 'oldPassword')->passwordInput() ?>
            <?= $formChangePassword->field($modelChangePassword, 'newPassword')->passwordInput() ?>
            <?= $formChangePassword->field($modelChangePassword, 'repeatNewPassword')->passwordInput() ?>

            <?= Html::submitButton('Изменить', ['class' => 'green-modal-btn']) ?>

            <?php ActiveForm::end() ?>

        </div>
    </div>
</div>

<!-- END MODALS -->

<section class="account-tabs-section">
    <div class="container" id="tabs">
        <span class="tab active" data-btn="1">Мои записи</span>
        <span <?php if ($userCard) echo 'class="tab" data-btn="2"';
                else echo "class='disabled-tab' title='Вы пока не приобрели карту'"; ?>>Моя карта</span>
    </div>
</section>

<section class="main-account-section">
    <div class="container" id="contents">

        <div class="user-appointments-section tab-content active" data-content="1">


            <?php foreach ($allPresentBusyDays as $presentBusyDay) : ?>

                <div class="user-appointments-row">
                    <h4 class="appointment-date"><?= $this->context->getRussianDate($presentBusyDay) ?></h4>
                    <div class="appointments-wrapper">
                        <?php foreach ($allUserTrainings as $userTraining) : ?>

                            <?php if (explode(' ', $userTraining->date)[0] == $presentBusyDay) {  ?>

                                <div class="one-timetable">
                                    <div class="time-place-wrapper">
                                        <span class="time"><?= $userTraining->timetable->time->time ?></span>
                                        <span class="place"><?= $userTraining->timetable->place->place ?></span>
                                    </div>
                                    <div class="name-trainer-wrapper">
                                        <span class="service-name"><?= $userTraining->timetable->service->service ?></span>
                                        <span class="service-trainer"><?php if ($userTraining->timetable->trainerService->trainer) echo $userTraining->timetable->trainerService->trainer->name;
                                                                        else echo "Самостоятельно" ?></span>
                                    </div>
                                    <div class="button-capacity-wrapper">
                                        <button class="arrow-btn cancel-btn" data-hystmodal-cancel="#cancelTrainingModal" data-trainingname="<?= $userTraining->timetable->service->service ?>" data-trainingdate="<?= $presentBusyDay ?>" data-trainingtime="<?= $userTraining->timetable->time->time ?>" data-trainingid="<?= $userTraining->timetable_id ?>">
                                            Отменить запись
                                        </button>
                                        <!-- <span class="capacity">Timetable::getLeftPlaces($chosenWeekdayTimetable)</span> -->
                                    </div>
                                </div>

                            <?php } ?>

                        <?php endforeach; ?>

                    </div>
                </div>

            <?php endforeach; ?>

            <?php if ($marathonParticipant) { ?>

                <div class="user-appointments-row">
                    <h4 class="appointment-date">01.06.2022</h4>
                    <div class="appointments-wrapper">

                        <div class="one-timetable">
                            <div class="time-place-wrapper">
                                <span class="time">10:00</span>
                                <span class="place">Парк Челюскинцев</span>
                            </div>
                            <div class="name-trainer-wrapper">
                                <span class="service-name">Марафон</span>
                            </div>
                            <div class="button-capacity-wrapper">
                                <button class="arrow-btn cancel-btn" data-hystmodal-cancel-marathon="#cancelMarathonModal">
                                    Отменить запись
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            <?php } ?>

            <?php if (count($allPresentBusyDays) == 0 && !$marathonParticipant) echo "<div>Вы не записаны на тренировки</div>" ?>

        </div>

        <!-- MODAL CANCEL TRAINING -->

        <div class="hystmodal" id="cancelTrainingModal" aria-hidden="true">
            <div class="hystmodal__wrap">
                <div class="hystmodal__window" role="dialog" aria-modal="true">

                    <h3 class="modal-heading">Отмена записи</h3>

                    <div class="modal-info">
                        <p>Что &nbsp;&nbsp;<span class="training-cancel-name"></span></p>
                        <p>Когда &nbsp;&nbsp;<span class="training-cancel-date"></span></p>
                    </div>

                    <?php $cancelTrainingForm = ActiveForm::begin() ?>

                    <?= $cancelTrainingForm->field($modelCancelTraining, 'user')->hiddenInput(['value' => \Yii::$app->user->identity->user_id])->label(false); ?>
                    <?= $cancelTrainingForm->field($modelCancelTraining, 'training')->hiddenInput(['value' => ''])->label(false); ?>
                    <?= $cancelTrainingForm->field($modelCancelTraining, 'date')->hiddenInput(['value' => ''])->label(false); ?>

                    <?= Html::submitButton(
                        'Отменить',
                        ['class' => 'green-modal-btn', 'data-hystclose' => true]
                    ) ?>

                    <?php ActiveForm::end() ?>

                </div>
            </div>
        </div>

        <!-- MODAL CANCEL MARATHON -->

        <div class="hystmodal" id="cancelMarathonModal" aria-hidden="true">
            <div class="hystmodal__wrap">
                <div class="hystmodal__window" role="dialog" aria-modal="true">

                    <h3 class="modal-heading">Отмена записи </h3>

                    <div class="modal-info">
                        <p>Что &nbsp;&nbsp; <span>Марафон</span></p>
                        <p>Когда &nbsp;&nbsp; <span>1 июня 2022</span></p>
                    </div>

                    <?php $cancelMarathonForm = ActiveForm::begin() ?>
                    <?= $cancelMarathonForm->field($modelCancelMarathon, 'user')->hiddenInput(['value' => $currUser->user_id])->label(false); ?>
                    <?= Html::submitButton(
                        'Отменить',
                        ['class' => 'green-modal-btn', 'data-hystclose' => true]
                    ) ?>
                    <?php ActiveForm::end() ?>

                </div>
            </div>
        </div>

        <!-- END MODALS -->

        <?php if ($userCard) : ?>
            <div class="user-card-section tab-content" data-content="2">
                <div class="card-qr-wrapper">
                    <div class="club-card">
                        <div class="club-card-front-side card-<?= Card::getCardDurationNumber($card) ?>-month">
                            <div class="card-desc">
                                <img src="/img/<?= in_array(Card::getCardDurationNumber($card), ['1', '3']) ? 'black-logo.svg' : 'white-logo.svg' ?>" alt="logo" height="20px">
                                <p class="card-type"><?= $card->cardType->type ?></p>
                                <p class="card-name"><?= $card->name ?></p>
                                <p class="card-time"><?= $card->cardVisitingHours->visiting_hours ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="user-qr">
                        <img src="/img/qr.png" alt="qr" class="qr">
                        <p class="qr-warning">Всегда показывайте этот QR-код администратору при входе в клуб</p>
                    </div>

                </div>
                <div class="card-info-wrapper">
                    <div class="card-info">
                        <h5 class="card-info-heading">Дата покупки</h5>
                        <p class="card-info-desc"><?= Yii::$app->formatter->asDate($userCard->purchase_date, 'dd.MM.yyyy') ?></p>
                    </div>
                    <div class="card-info">
                        <h5 class="card-info-heading">Дата завершения</h5>
                        <p class="card-info-desc"><?= Card::getCardExpirationDate($userCard->purchase_date, Card::getCardDurationNumber($card)) ?></p>
                    </div>
                    <div class="card-info">
                        <h5 class="card-info-heading">Что включено</h5>
                        <div class="card-info-desc">
                            <?php foreach (Card::getArrOfIncludes($card) as $cardIncluded) : ?>

                                <p><?= $cardIncluded ?></p>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>