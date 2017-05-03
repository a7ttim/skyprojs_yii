<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classificate_1".
 *
 * @property int $project_id
 * @property int $grnti_id
 *
 * @property Grnti $grnti
 * @property Project $project
 */
class Classificate1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classificate_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'grnti_id'], 'required'],
            [['project_id', 'grnti_id'], 'default', 'value' => null],
            [['project_id', 'grnti_id'], 'integer'],
            [['project_id', 'grnti_id'], 'unique', 'targetAttribute' => ['project_id', 'grnti_id']],
            [['grnti_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grnti::className(), 'targetAttribute' => ['grnti_id' => 'grnti_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'grnti_id' => 'Grnti ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrnti()
    {
        return $this->hasOne(Grnti::className(), ['grnti_id' => 'grnti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }
}
