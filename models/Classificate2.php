<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classificate_2".
 *
 * @property int $project_id
 * @property int $udk_id
 *
 * @property Project $project
 * @property Udk $udk
 */
class Classificate2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classificate_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'udk_id'], 'required'],
            [['project_id', 'udk_id'], 'default', 'value' => null],
            [['project_id', 'udk_id'], 'integer'],
            [['project_id', 'udk_id'], 'unique', 'targetAttribute' => ['project_id', 'udk_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
            [['udk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Udk::className(), 'targetAttribute' => ['udk_id' => 'udk_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'udk_id' => 'Udk ID',
        ];
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
    public function getUdk()
    {
        return $this->hasOne(Udk::className(), ['udk_id' => 'udk_id']);
    }
}
