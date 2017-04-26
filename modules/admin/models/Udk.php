<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "udk".
 *
 * @property integer $udk_id
 * @property string $udk_code
 * @property string $udk_name
 * @property integer $udk_parent_id
 *
 * @property Classificate2[] $classificate2s
 * @property Project[] $projects
 */
class Udk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'udk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['udk_id', 'udk_code', 'udk_name'], 'required'],
            [['udk_id', 'udk_parent_id'], 'integer'],
            [['udk_name'], 'string'],
            [['udk_code'], 'string', 'max' => 254],
            [['udk_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'udk_id' => 'Udk ID',
            'udk_code' => 'Udk Code',
            'udk_name' => 'Udk Name',
            'udk_parent_id' => 'Udk Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassificate2s()
    {
        return $this->hasMany(Classificate2::className(), ['udk_id' => 'udk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_id' => 'project_id'])->viaTable('classificate_2', ['udk_id' => 'udk_id']);
    }
}
