<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $project_id
 * @property integer $member_id
 * @property string $project_name
 * @property integer $project_status
 * @property string $project_definition
 * @property string $Дата подачи
 *
 * @property DepartmentContains[] $departmentContains
 * @property Department[] $departments
 * @property GrntiClassificate[] $grntiClassificates
 * @property Grnti[] $grntis
 * @property User $member
 * @property UdkClassificate[] $udkClassificates
 * @property Udk[] $udks
 * @property WorkOnProject[] $workOnProjects
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
            [['project_id', 'project_name', 'project_definition', 'Дата подачи'], 'required'],
            [['project_id', 'member_id', 'project_status'], 'integer'],
            [['project_name', 'project_definition'], 'string'],
            [['Дата подачи'], 'safe'],
            [['project_id'], 'unique'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['member_id' => 'member_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'member_id' => 'Member ID',
            'project_name' => 'Project Name',
            'project_status' => 'Project Status',
            'project_definition' => 'Project Definition',
            'Дата подачи' => 'Дата подачи',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentContains()
    {
        return $this->hasMany(DepartmentContains::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['department_id' => 'department_id'])->viaTable('department_contains', ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrntiClassificates()
    {
        return $this->hasMany(GrntiClassificate::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrntis()
    {
        return $this->hasMany(Grnti::className(), ['grnti_id' => 'grnti_id'])->viaTable('grnti_classificate', ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(User::className(), ['member_id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUdkClassificates()
    {
        return $this->hasMany(UdkClassificate::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUdks()
    {
        return $this->hasMany(Udk::className(), ['udk_id' => 'udk_id'])->viaTable('udk_classificate', ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkOnProjects()
    {
        return $this->hasMany(WorkOnProject::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers(){
        return $this->hasMany(User::className(), ['member_id' => 'member_id'])
            ->via('workOnProjects');
    }
}
