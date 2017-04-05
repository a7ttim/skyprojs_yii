<?php

namespace app\models;

class UserIdentity extends Admin implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['admin_login' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['admin_login' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->admin_login;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->admin_access_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->admin_access_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->admin_password === md5($password);
    }
}
