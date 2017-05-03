<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "collaborator".
 *
 * @property int $member_id
 * @property int $project_id
 *
 * @property Member $member
 * @property Project $project
 */
class Collaborator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collaborator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'project_id'], 'required'],
            [['member_id', 'project_id'], 'default', 'value' => null],
            [['member_id', 'project_id'], 'integer'],
            [['member_id', 'project_id'], 'unique', 'targetAttribute' => ['member_id', 'project_id']],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'member_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Member ID',
            'project_id' => 'Project ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['member_id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }
}
