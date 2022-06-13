<?php

namespace app\models;

use app\models\TrainerService;
use yii\db\ActiveRecord;

class Trainer extends ActiveRecord
{
    public static function tableName()
    {
        return 'trainers';
    }

    public function getTrainerServices()
    {
        return $this->hasOne(TrainerService::class, ['trainer_id' => 'trainer_id']);
    }

    public function getTrainerLikes()
    {
        return $this->hasMany(TrainerLikes::class, ['trainer_id' => 'trainer_id']);
    }
}
