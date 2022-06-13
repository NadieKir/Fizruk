<?php

namespace app\models;

use yii\db\ActiveRecord;

class UserCard extends ActiveRecord
{
    public static function tableName()
    {
        return 'users_cards';
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }

    public function getCard()
    {
        return $this->hasOne(Card::class, ['card_id' => 'card_id']);
    }
}
