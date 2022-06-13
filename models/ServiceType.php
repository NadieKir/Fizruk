<?php

namespace app\models;

use yii\db\ActiveRecord;

class ServiceType extends ActiveRecord
{
    public static function tableName()
    {
        return 'services_types';
    }
}
