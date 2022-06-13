<?php

namespace app\models;

use yii\base\Model;
use Yii;

class ChangePasswordForm extends Model
{
    public $oldPassword;
    public $newPassword;
    public $repeatNewPassword;

    public function rules()
    {
        return [
            [['oldPassword', 'newPassword', 'repeatNewPassword'], 'required', 'message' => 'Заполните поле'],
            ['repeatNewPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Пароли не совпадают'],
            [['newPassword'], 'string', 'min' => 8, 'max' => 40, 'message' => 'Пароль должен содержать от 8 до 40 символов'],
            ['oldPassword', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'oldPassword' => 'Старый пароль',
            'newPassword' => 'Новый пароль',
            'repeatNewPassword' => 'Повторите новый пароль',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = User::find()->where(['user_id' => \Yii::$app->user->identity->user_id])->one();

            if (!$user || !$user->validatePassword($this->oldPassword)) {
                $this->addError($attribute, 'Неверный пароль');
            }
        }
    }
}
