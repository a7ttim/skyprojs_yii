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
 * @property Working[] $workings
 * @property Project[] $projects
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
            [['department_name'], 'string', 'max' => 254],
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
    public function getWorkings()
    {
        return $this->hasMany(Working::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_id' => 'project_id'])->viaTable('working', ['department_id' => 'department_id']);
    }
}
