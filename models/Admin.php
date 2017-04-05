<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property string $admin_login
 * @property string $admin_password
 * @property string $admin_token
 * @property string $admin_access_key
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_login', 'admin_password'], 'required'],
            [['admin_login', 'admin_password', 'admin_token', 'admin_access_key'], 'string', 'max' => 254],
            [['admin_password', 'admin_login'], 'unique', 'targetAttribute' => ['admin_password', 'admin_login'], 'message' => 'The combination of Admin Login and Admin Password has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_login' => 'Admin Login',
            'admin_password' => 'Admin Password',
            'admin_token' => 'Admin Token',
            'admin_access_key' => 'Admin Access Key',
        ];
    }
}
