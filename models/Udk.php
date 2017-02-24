<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "udk".
 *
 * @property string $udk_id
 * @property integer $udk_parent_id
 * @property string $udk_name
 *
 * @property UdkClassificate[] $udkClassificates
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
            [['udk_id', 'udk_name'], 'required'],
            [['udk_id', 'udk_name'], 'string'],
            [['udk_parent_id'], 'integer'],
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
            'udk_parent_id' => 'Udk Parent ID',
            'udk_name' => 'Udk Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUdkClassificates()
    {
        return $this->hasMany(UdkClassificate::className(), ['udk_id' => 'udk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_id' => 'project_id'])->viaTable('udk_classificate', ['udk_id' => 'udk_id']);
    }
}
