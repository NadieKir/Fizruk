<?php

namespace app\models;

use \yii\web\IdentityInterface;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'users';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findByUsername($name)
    {
        return static::findOne(['name' => $name]);
    }

    public function validatePassword($password)
    {
        return md5(md5($password) . $this->salt) == $this->password;
    }

    //

    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    public function getId()
    {
        return $this->user_id;
    }


    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }
}
