<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $project_id
 * @property string $project_name
 * @property string $project_date
 * @property string $project_area
 * @property string $project_advantages
 * @property string $project_specifications
 * @property string $project_consumers
 * @property string $project_protection
 *
 * @property Classificate1[] $classificate1s
 * @property Grnti[] $grntis
 * @property Classificate2[] $classificate2s
 * @property Udk[] $udks
 * @property Classificate3[] $classificate3s
 * @property Directions[] $directions
 * @property Collaborator[] $collaborators
 * @property Member[] $members
 * @property Working[] $workings
 * @property Department[] $departments
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_name', 'project_date', 'project_area', 'project_advantages', 'project_specifications', 'project_consumers', 'project_protection'], 'required'],
            [['project_date'], 'safe'],
            [['project_name', 'project_area', 'project_advantages', 'project_specifications', 'project_consumers', 'project_protection'], 'string', 'max' => 254],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Проект',
            'project_name' => 'Название',
            'project_date' => 'Дата',
            'project_area' => 'Область',
            'project_advantages' => 'Преимущества',
            'project_specifications' => 'Спецификации',
            'project_consumers' => 'Потребители',
            'project_protection' => 'Защита',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificate1s()
    {
        return $this->hasMany(Classificate1::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrntis()
    {
        return $this->hasMany(Grnti::className(), ['grnti_id' => 'grnti_id'])->viaTable('classificate_1', ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificate2s()
    {
        return $this->hasMany(Classificate2::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUdks()
    {
        return $this->hasMany(Udk::className(), ['udk_id' => 'udk_id'])->viaTable('classificate_2', ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificate3s()
    {
        return $this->hasMany(Classificate3::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirections()
    {
        return $this->hasMany(Directions::className(), ['direction_id' => 'direction_id'])->viaTable('classificate_3', ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollaborators()
    {
        return $this->hasMany(Collaborator::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Member::className(), ['member_id' => 'member_id'])->viaTable('collaborator', ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkings()
    {
        return $this->hasMany(Working::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['department_id' => 'department_id'])->viaTable('working', ['project_id' => 'project_id']);
    }
}
