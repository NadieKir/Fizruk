<?php

namespace app\models;

use DateInterval;
use DateTime;

use yii\db\ActiveRecord;

class Card extends ActiveRecord
{
    public static function tableName()
    {
        return 'cards';
    }

    public function getCardType()
    {
        return $this->hasOne(CardType::class, ['type_id' => 'type_id']);
    }

    public function getCardVisitingHours()
    {
        return $this->hasOne(CardVisitingHours::class, ['visiting_hours_id' => 'visiting_hours_id']);
    }

    public function getCardDuration()
    {
        return $this->hasOne(CardDuration::class, ['duration_id' => 'duration_id']);
    }

    static function getArrOfIncludes($card)
    {
        $allIncludedsStr = $card->description;
        $allIncludedsArr = preg_split('/\r\n/', $allIncludedsStr);
        return $allIncludedsArr;
    }

    static function getCardDurationNumber($card)
    {
        return explode(' ', $card->cardDuration->duration)[0];
    }

    static function getCardExpirationDate($purchaseDate, $lasts)
    {
        $purchaseDate = new DateTime($purchaseDate);
        $purchaseDate->add(new DateInterval("P{$lasts}M"));
        return $purchaseDate->format("d.m.Y");
    }
}
