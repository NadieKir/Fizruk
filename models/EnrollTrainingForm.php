<?php

namespace app\models;

use yii\base\Model;

class EnrollTrainingForm extends Model
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
