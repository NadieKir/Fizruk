<?php

namespace app\models;

use yii\db\ActiveRecord;

class TrainerLikes extends ActiveRecord
{
    public static function tableName()
    {
        return 'trainers_likes';
    }

    public function getTrainer()
    {
        return $this->hasOne(Trainers::class, ['trainer_id' => 'trainer_id']);
    }

    public function getUser()
    {
        return $this->hasOne(Users::class, ['user_id' => 'user_id']);
    }
}
