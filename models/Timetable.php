<?php

namespace app\models;

use yii\db\ActiveRecord;

class Timetable extends ActiveRecord
{
    public static function tableName()
    {
        return 'timetable';
    }

    public function getPlace()
    {
        return $this->hasOne(TimetablePlace::class, ['place_id' => 'place_id']);
    }

    public function getTime()
    {
        return $this->hasOne(TimetableTime::class, ['time_id' => 'time_id']);
    }

    public function getWeekday()
    {
        return $this->hasOne(TimetableWeekday::class, ['weekday_id' => 'weekday_id']);
    }

    public function getService()
    {
        return $this->hasOne(Service::class, ['service_id' => 'service_id']);
    }

    public function getTrainerService()
    {
        return $this->hasOne(TrainerService::class, ['service_id' => 'service_id']);
    }


    public static function getLeftPlaces($chosenWeekdayTimetable)
    {
        $capacity = $chosenWeekdayTimetable->service->capacity;
        $registred = TrainingRegistered::find()->where(['timetable_id' => $chosenWeekdayTimetable->timetable_id])->count();
        $placesLeft = $capacity -  $registred;

        return $placesLeft === 0 ? 'Мест нет' : "Ещё <span class='green'>$placesLeft</span> мест";
    }
}
