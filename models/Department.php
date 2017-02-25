<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $department_id
 * @property string $department_name
 * @property integer $department_parent_id
 *
 * @property DepartmentContains[] $departmentContains
 * @property Project[] $projects
 * @property WorkOnProject[] $workOnProjects
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id', 'department_name'], 'required'],
            [['department_id', 'department_parent_id'], 'integer'],
            [['department_name'], 'string'],
            [['department_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'department_name' => 'Department Name',
            'department_parent_id' => 'Department Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentContains()
    {
        return $this->hasMany(DepartmentContains::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_id' => 'project_id'])->viaTable('department_contains', ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkOnProjects()
    {
        return $this->hasMany(WorkOnProject::className(), ['department_id' => 'department_id']);
    }
}
