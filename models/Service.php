<?php

namespace app\models;

use yii\db\ActiveRecord;

class Service extends ActiveRecord
{
    public static function tableName()
    {
        return 'services';
    }

    public function getServiceType()
    {
        return $this->hasOne(ServiceType::class, ['service_type_id' => 'service_type_id']);
    }
}
