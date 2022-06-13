<?php

namespace app\controllers;

use app\models\Card;
use app\models\ChangePhoneForm;
use app\models\ChangePasswordForm;
use app\models\CancelTrainingForm;
use app\models\CancelMarathonForm;
use app\models\MarathonParticipant;
use app\models\TrainingRegistered;
use app\models\UserCard;
use yii\web\Controller;
use Yii;
use DateTime;
use app\models\User;

class AccountController extends Controller
{
    public function actionIndex()
    {
        $currUser = User::find()->where(['user_id' => \Yii::$app->user->identity->user_id])->one();
        $userCard = UserCard::find()->where(['user_id' => $currUser->user_id])->one();
        $card = $userCard->card;

        // enrollments

        $allUserBusyDays = TrainingRegistered::find()->where(['user_id' => $currUser->user_id])->select(['date'])->asArray()->all();

        $allPresentBusyDays = array_filter($allUserBusyDays, function ($date) {
            $currDate = new DateTime(date("Y-m-d H:i:s"));
            $timetableDate = new DateTime($date["date"]);

            return $currDate < $timetableDate ? true : false;
        });

        $allPresentBusyDays = array_map(function ($date) {
            return explode(' ', $date["date"])[0];
        }, $allPresentBusyDays);

        usort($allPresentBusyDays, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });

        $allPresentBusyDays = array_unique($allPresentBusyDays);

        $allUserTrainings = TrainingRegistered::find()->where(['user_id' => $currUser->user_id])->all();

        // marathon

        $marathonParticipant = MarathonParticipant::find()->where(['user_id' => $currUser->user_id])->one();

        // forms

        $modelCancelTraining = new CancelTrainingForm();

        if ($modelCancelTraining->load(Yii::$app->request->post()) && $modelCancelTraining->validate()) {
            $userid = Yii::$app->request->post()['CancelTrainingForm']["user"];
            $timetableid = Yii::$app->request->post()['CancelTrainingForm']["training"];
            //$date = Yii::$app->request->post()['CancelTrainingForm']["date"];

            $training = TrainingRegistered::findOne(['user_id' => $userid, 'timetable_id' => $timetableid]);
            $training->delete();

            $this->redirect(array('account/index'));
        }

        $modelCancelMarathon = new CancelMarathonForm();

        if ($modelCancelMarathon->load(Yii::$app->request->post()) && $modelCancelMarathon->validate()) {
            $userid = Yii::$app->request->post()['CancelMarathonForm']["user"];

            $marathonParticipant = MarathonParticipant::findOne(['user_id' => $userid]);
            $marathonParticipant->delete();

            $this->redirect(array("account/index"));
        }

        $modelChangePhone = new ChangePhoneForm();

        if ($modelChangePhone->load(Yii::$app->request->post()) && $modelChangePhone->validate()) {
            $currUser->phone = $modelChangePhone->newPhone;
            $currUser->save();

            $this->redirect(array('account/index'));
        }

        $modelChangePassword = new ChangePasswordForm();

        if ($modelChangePassword->load(Yii::$app->request->post()) && $modelChangePassword->validate()) {
            $salt = mt_rand(100, 999);

            $currUser->salt = $salt;
            $currUser->password = md5(md5($modelChangePassword->newPassword) . $salt);
            $currUser->save();

            $this->redirect(array('account/index'));
        }

        return $this->render('index', compact(
            'currUser',
            'userCard',
            'card',
            'modelChangePhone',
            'modelChangePassword',
            'modelCancelTraining',
            'modelCancelMarathon',
            'allPresentBusyDays',
            'allUserTrainings',
            'marathonParticipant'
        ));
    }

    public static function getRussianDate($date)
    {
        $rusDate = new DateTime($date);
        $rusDate = date_format($rusDate, "d.m.Y");
        return $rusDate;
    }
}
