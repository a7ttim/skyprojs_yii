<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_on_project".
 *
 * @property integer $code
 * @property integer $member_id
 * @property integer $department_id
 * @property integer $project_id
 * @property string $name
 *
 * @property Department $department
 * @property Project $project
 * @property User $member
 */
class WorkOnProject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_on_project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code', 'member_id', 'department_id', 'project_id'], 'integer'],
            [['name'], 'string'],
            [['code'], 'unique'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['member_id' => 'member_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'member_id' => 'Member ID',
            'department_id' => 'Department ID',
            'project_id' => 'Project ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(User::className(), ['member_id' => 'member_id']);
    }
}
