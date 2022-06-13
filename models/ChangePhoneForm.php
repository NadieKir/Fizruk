<?php

namespace app\models;

use yii\base\Model;
use Yii;

class ChangePhoneForm extends Model
{
    public $newPhone;

    public function rules()
    {
        return [
            [['newPhone'], 'required', 'message' => 'Заполните поле'],
            ['newPhone', 'validatePhone'],
            [['newPhone'], 'match', 'pattern' => '/^(\+?375|80)\s?\(?(29|44|33|25)\)?\s?\d{3}\-?\d{2}\-?\d{2}$/', 'message' => 'Телефон не принадлежит белорусскому оператору'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'newPhone' => 'Новый номер телефона',
        ];
    }

    public function validatePhone($attribute, $params)
    {
        if ($this->newPhone) {
            $existModel = User::find()->where(['phone' => $this->newPhone])->one();
            if ($existModel) {
                $this->addError($attribute, 'Пользователь с таким телефоном уже существует');
            }
        }
    }
}
