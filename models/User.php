<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $member_id
 * @property string $member_name
 * @property string $member_surname
 * @property string $member_patronymic
 * @property integer $member_status
 * @property string $member_description
 * @property string $email
 * @property string $password
 * @property string $user_token
 * @property string $auth_key
 *
 * @property Project[] $projects
 * @property WorkOnProject[] $workOnProjects
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'member_name', 'member_surname', 'member_description', 'email', 'password'], 'required'],
            [['member_id', 'member_status'], 'integer'],
            [['member_name', 'member_surname', 'member_patronymic', 'member_description', 'email', 'password', 'user_token', 'auth_key'], 'string'],
            [['member_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Member ID',
            'member_name' => 'Member Name',
            'member_surname' => 'Member Surname',
            'member_patronymic' => 'Member Patronymic',
            'member_status' => 'Member Status',
            'member_description' => 'Member Description',
            'email' => 'Email',
            'password' => 'Password',
            'user_token' => 'User Token',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['member_id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkOnProjects()
    {
        return $this->hasMany(WorkOnProject::className(), ['member_id' => 'member_id']);
    }
}
