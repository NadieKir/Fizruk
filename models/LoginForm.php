<?php

namespace app\models;

use yii\base\Model;
use Yii;

class LoginForm extends Model
{
    public $phone;
    public $password;

    public function rules()
    {
        return [
            [['password', 'phone'], 'required', 'message' => 'Заполните поле'],
            ['phone', 'exist', 'targetClass' => User::class, 'targetAttribute' => ['phone' => 'phone'], 'message' => 'Пользователь с таким телефоном не существует'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone' => 'Номер телефона',
            'password' => 'Пароль',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = User::findOne(['phone' => $this->phone]);

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный пароль');
            }
        }
    }
}
