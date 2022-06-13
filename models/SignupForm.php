<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $password;
    public $repeatPassword;
    // captcha
    // birth

    public function rules()
    {
        return [
            [['name', 'password', 'email', 'phone', 'repeatPassword'], 'required', 'message' => 'Заполните поле'],
            [['name', 'password', 'email', 'phone', 'repeatPassword'], 'trim'],

            ['name', 'string', 'min' => 2, 'max' => 30, 'message' => 'Введите от 2 до 30 символов'],
            ['name', 'match', 'pattern' => '/^[a-zа-я\-\s]+$/iu', 'message' => 'Имя может содержать только буквы'],

            [['email'], 'email', 'message' => 'Данный адрес не является верным'],
            ['email', 'validateEmail'],

            ['phone', 'validatePhone'],
            [['phone'], 'match', 'pattern' => '/^(\+?375|80)\s?\(?(29|44|33|25)\)?\s?\d{3}\-?\d{2}\-?\d{2}$/', 'message' => 'Телефон не принадлежит белорусскому оператору'],

            ['repeatPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
            [['password'], 'string', 'min' => 8, 'max' => 40, 'message' => 'Пароль должен содержать от 8 до 40 символов'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Эл. почта',
            'phone' => 'Телефон',
            'password' => 'Придумайте пароль',
            'repeatPassword' => 'Повторите пароль',
        ];
    }

    public function signup()
    {
        $modelSignup = new SignupForm();

        if ($modelSignup->load(\Yii::$app->request->post()) && $modelSignup->validate()) {
            $user = new User();
            $salt = mt_rand(100, 999);

            $user->name = $modelSignup->name;
            $user->email = $modelSignup->email;
            $user->phone = $modelSignup->phone;
            $user->salt = $salt;
            $user->password = md5(md5($modelSignup->password) . $salt);

            return $user->save() ? $user : null;
        }
    }

    public function validatePhone($attribute, $params)
    {
        if ($this->phone) {
            $existModel = User::find()->where(['phone' => $this->phone])->one();
            if ($existModel) {
                $this->addError($attribute, 'Пользователь с таким телефоном уже существует');
            }
        }
    }

    public function validateEmail($attribute, $params)
    {
        if ($this->email) {
            $existModel = User::find()->where(['email' => $this->email])->one();
            if ($existModel) {
                $this->addError($attribute, 'Пользователь с такой почтой уже существует');
            }
        }
    }
}
