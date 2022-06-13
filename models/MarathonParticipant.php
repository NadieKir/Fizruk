<?php

namespace app\models;

use yii\db\ActiveRecord;

class MarathonParticipant extends ActiveRecord
{
    public static function tableName()
    {
        return 'marathon_participants';
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }
}
