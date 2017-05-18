<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grnti".
 *
 * @property integer $grnti_id
 * @property string $grnti_code
 * @property string $grnti_name
 * @property integer $grnti_parent_id
 *
 * @property Classificate1[] $classificate1s
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
            [['grnti_code', 'grnti_name'], 'required'],
            [['grnti_name'], 'string'],
            [['grnti_parent_id'], 'integer'],
            [['grnti_code'], 'string', 'max' => 254],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grnti_id' => 'Grnti ID',
            'grnti_code' => 'Grnti Code',
            'grnti_name' => 'Grnti Name',
            'grnti_parent_id' => 'Grnti Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificate1s()
    {
        return $this->hasMany(Classificate1::className(), ['grnti_id' => 'grnti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_id' => 'project_id'])->viaTable('classificate_1', ['grnti_id' => 'grnti_id']);
    }
}
