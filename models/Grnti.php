<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grnti".
 *
 * @property integer $grnti_id
 * @property integer $grnti_parent_id
 * @property string $grnti_code
 * @property string $grnti_name
 *
 * @property GrntiClassificate[] $grntiClassificates
 * @property Project[] $projects
 */
class Grnti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grnti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grnti_id', 'grnti_name'], 'required'],
            [['grnti_id', 'grnti_parent_id'], 'integer'],
            [['grnti_code', 'grnti_name'], 'string'],
            [['grnti_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grnti_id' => 'Grnti ID',
            'grnti_parent_id' => 'Grnti Parent ID',
            'grnti_code' => 'Grnti Code',
            'grnti_name' => 'Grnti Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrntiClassificates()
    {
        return $this->hasMany(GrntiClassificate::className(), ['grnti_id' => 'grnti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_id' => 'project_id'])->viaTable('grnti_classificate', ['grnti_id' => 'grnti_id']);
    }
}
