<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $member_id
 * @property string $member_name
 * @property string $member_surname
 * @property string $member_patronymic
 * @property integer $member_status
 * @property string $member_description
 * @property string $e-mail
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Project[] $projects
 * @property WorkOnProject[] $workOnProjects
 */
class user extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'e-mail', 'password'], 'required'],
            [['member_id', 'member_status'], 'integer'],
            [['member_name', 'member_surname', 'member_patronymic', 'member_description', 'e-mail', 'password'], 'string'],
            [['auth_key', 'access_token'], 'string', 'max' => 255],
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
            'e-mail' => 'E Mail',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
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
