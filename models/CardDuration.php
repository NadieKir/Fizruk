<?php

namespace app\models;

use yii\db\ActiveRecord;

class CardDuration extends ActiveRecord
{
    public static function tableName()
    {
        return 'card_durations';
    }
}
