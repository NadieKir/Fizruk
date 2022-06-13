<?php

namespace app\models;

use yii\db\ActiveRecord;

class TrainerService extends ActiveRecord
{
    public static function tableName()
    {
        return 'trainers_services';
    }

    public function getTrainer()
    {
        return $this->hasOne(Trainer::class, ['trainer_id' => 'trainer_id']);
    }

    public function getService()
    {
        return $this->hasOne(Service::class, ['service_id' => 'service_id']);
    }
}
