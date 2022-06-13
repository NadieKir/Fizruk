<?php

namespace app\controllers;

use Yii;
use app\models\TimetableWeekday;
use app\models\Timetable;
use app\models\Trainer;
use yii\web\Controller;
use app\models\EnrollTrainingForm;
use app\models\TrainingRegistered;
use DateInterval;
use DateTime;
use yii\helpers\Url;


class TimetableController extends Controller
{
    public function actionIndex()
    {
        $timetableWeekdays = TimetableWeekday::find()->all();

        $chosenWeekday = Yii::$app->request->get('weekday');

        $allWeekdayTimes = Timetable::find()->where(['weekday_id' => $chosenWeekday])->select(['time_id'])->distinct()->all();
        $chosenWeekdayTimetables = Timetable::find()->where(['weekday_id' => $chosenWeekday])->all();

        // --- ENROLL TRAINING FORM

        $modelEnrollTraining = new EnrollTrainingForm();

        if ($modelEnrollTraining->load(Yii::$app->request->post()) && $modelEnrollTraining->validate()) {
            $newTrainingRegistered = new TrainingRegistered();

            $newTrainingRegistered->user_id = Yii::$app->request->post()['EnrollTrainingForm']["user"];
            $newTrainingRegistered->timetable_id = Yii::$app->request->post()['EnrollTrainingForm']["training"];

            $postDate = explode(' ', Yii::$app->request->post()['EnrollTrainingForm']["date"]);
            $date = date($postDate[0]);
            $time = $postDate[1];
            $dateStr = $date . " " . $time . ":00";

            $dateTime = new DateTime($dateStr);
            $dateTime = $dateTime->format('Y-m-d H:i:s');

            $newTrainingRegistered->date = $dateTime;

            $newTrainingRegistered->save();
        }

        return $this->render('index', compact(
            'timetableWeekdays',
            'allWeekdayTimes',
            'chosenWeekdayTimetables',
            'chosenWeekday',
            'modelEnrollTraining'
        ));
    }

    public static function getTrainingDate($timetable)
    {
        $timetableWeekday = $timetable->weekday->weekday_id;
        $todayWeekday = TimetableWeekday::getCurrWeekday();

        $todayDate = new DateTime(date("Y-m-d"));
        $currTime = date("H:i:s");

        // Будет на неделе
        if ($timetableWeekday > $todayWeekday) {
            $difference = $timetableWeekday - $todayWeekday;
            return $todayDate->add(new DateInterval("P{$difference}D"))->format("Y-m-d");
        }

        // Было на неделе
        if ($timetableWeekday < $todayWeekday) {
            $difference = 7 - $todayWeekday + $timetableWeekday;
            return $todayDate->add(new DateInterval("P{$difference}D"))->format("Y-m-d");
        }

        // Сегодня
        if ($timetableWeekday == $todayWeekday) {
            $trainingStartHour = explode(':', $timetable->time->time)[0];
            $currHour = explode(':', $currTime)[0];

            if ($trainingStartHour > $currHour + 1) {
                return $todayDate->format("Y-m-d");
            } else {
                return $todayDate->add(new DateInterval("P7D"))->format("Y-m-d");
            }
        }
    }
}
