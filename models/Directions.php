<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "directions".
 *
 * @property int $direction_id
 * @property string $direction_name
 *
 * @property Classificate3[] $classificate3s
 * @property Project[] $projects
 */
class Directions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'directions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['direction_id', 'direction_name'], 'required'],
            [['direction_id'], 'default', 'value' => null],
            [['direction_id'], 'integer'],
            [['direction_name'], 'string', 'max' => 254],
            [['direction_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'direction_id' => 'Direction ID',
            'direction_name' => 'Direction Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificate3s()
    {
        return $this->hasMany(Classificate3::className(), ['direction_id' => 'direction_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_id' => 'project_id'])->viaTable('classificate_3', ['direction_id' => 'direction_id']);
    }
}
