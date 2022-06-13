<?php

namespace app\models;

use yii\db\ActiveRecord;

class TimetableTime extends ActiveRecord
{
    public static function tableName()
    {
        return 'timetable_time';
    }

    // public function getCardType()
    // {
    //     return $this->hasOne(CardType::class, ['type_id' => 'type_id']);
    // }

}
