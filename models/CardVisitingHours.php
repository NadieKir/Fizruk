<?php

namespace app\models;

use yii\db\ActiveRecord;

class CardVisitingHours extends ActiveRecord
{
    public static function tableName()
    {
        return 'card_visiting_hours';
    }
}
