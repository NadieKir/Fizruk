<?php

namespace app\models;

use yii\db\ActiveRecord;

class TimetableWeekday extends ActiveRecord
{
    public static function tableName()
    {
        return 'timetable_weekday';
    }

    public static function getCurrWeekday()
    {
        $todayDate = date("D");

        switch ($todayDate) {
            case 'Mon':
                return 1;
            case 'Tue':
                return 2;
            case 'Wed':
                return 3;
            case 'Thu':
                return 4;
            case 'Fri':
                return 5;
            case 'Sat':
                return 6;
            case 'Sun':
                return 7;
        }
    }
}
