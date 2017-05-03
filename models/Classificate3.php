<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classificate_3".
 *
 * @property int $direction_id
 * @property int $project_id
 *
 * @property Directions $direction
 * @property Project $project
 */
class Classificate3 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classificate_3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['direction_id', 'project_id'], 'required'],
            [['direction_id', 'project_id'], 'default', 'value' => null],
            [['direction_id', 'project_id'], 'integer'],
            [['direction_id', 'project_id'], 'unique', 'targetAttribute' => ['direction_id', 'project_id']],
            [['direction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Directions::className(), 'targetAttribute' => ['direction_id' => 'direction_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'direction_id' => 'Direction ID',
            'project_id' => 'Project ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirection()
    {
        return $this->hasOne(Directions::className(), ['direction_id' => 'direction_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }
}
