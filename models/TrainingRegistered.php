<?php

namespace app\models;

use yii\db\ActiveRecord;

class TrainingRegistered extends ActiveRecord
{
    public static function tableName()
    {
        return 'training_registereds';
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }

    public function getTimetable()
    {
        return $this->hasOne(Timetable::class, ['timetable_id' => 'timetable_id']);
    }

    public static function isUserRegistered($chosenWeekdayTimetable)
    {
        $currUserId = \Yii::$app->user->identity->user_id;
        $timetableId = $chosenWeekdayTimetable->timetable_id;
        // $timetableTime = $chosenWeekdayTimetable->time->time;

        // $timetableStartTime = explode('-', $timetableTime)[0];
        // $full = "$trainingDate {$timetableStartTime}:00";

        $userRegistartion = TrainingRegistered::find()->where(['user_id' => $currUserId, 'timetable_id' => $timetableId])->one();
        return $userRegistartion ? 1 : 0;
    }
}
