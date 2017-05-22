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
            [['department_name'], 'required'],
            [['department_parent_id'], 'integer'],
            [['department_name'], 'string', 'max' => 254],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Подразделение',
            'department_name' => 'Название',
            'department_parent_id' => 'Код родителя',
            'department_parent.department_name' => 'Родитель',
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

    public function getDepartment_parent()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_parent_id']);
    }

    public function beforeDelete()
    {
        $classif = $this->workings;
        foreach($classif as $class){
            $class->delete();
        }

        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}
