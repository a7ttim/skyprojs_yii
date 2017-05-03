<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "working".
 *
 * @property int $department_id
 * @property int $project_id
 *
 * @property Department $department
 * @property Project $project
 */
class Working extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'working';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id', 'project_id'], 'required'],
            [['department_id', 'project_id'], 'default', 'value' => null],
            [['department_id', 'project_id'], 'integer'],
            [['department_id', 'project_id'], 'unique', 'targetAttribute' => ['department_id', 'project_id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'project_id' => 'Project ID',
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
}
