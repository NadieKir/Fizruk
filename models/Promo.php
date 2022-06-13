<?php

namespace app\models;

use yii\db\ActiveRecord;

class Promo extends ActiveRecord
{
    public static function tableName()
    {
        return 'promos';
    }
}
