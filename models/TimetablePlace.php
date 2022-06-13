<?php

namespace app\models;

use yii\db\ActiveRecord;

class TimetablePlace extends ActiveRecord
{
    public static function tableName()
    {
        return 'timetable_place';
    }

    // public function getCardType()
    // {
    //     return $this->hasOne(CardType::class, ['type_id' => 'type_id']);
    // }

}
