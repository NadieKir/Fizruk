<?php

namespace app\models;

use yii\base\Model;

class CancelTrainingForm extends Model
{
    public $user;
    public $training;
    public $date;

    public function rules()
    {
        return [];
    }

    public function attributeLabels()
    {
        return [];
    }
}
