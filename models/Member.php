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
 *
 * @property Collaborator[] $collaborators
 * @property Project[] $projects
 */
class Member extends \yii\db\ActiveRecord
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
            [['member_id', 'member_name', 'member_surname', 'member_patronymic'], 'required'],
            [['member_id'], 'integer'],
            [['member_name', 'member_surname', 'member_patronymic'], 'string', 'max' => 254],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollaborators()
    {
        return $this->hasMany(Collaborator::className(), ['member_id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_id' => 'project_id'])->viaTable('collaborator', ['member_id' => 'member_id']);
    }
}
