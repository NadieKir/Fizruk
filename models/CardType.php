<?php

namespace app\models;

use yii\db\ActiveRecord;

class CardType extends ActiveRecord
{
    public static function tableName()
    {
        return 'card_types';
    }
}
