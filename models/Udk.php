<?php

namespace app\models;

use Yii;
use app\models\Classificate2;

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
            [['udk_code', 'udk_name'], 'required'],
            [['udk_name'], 'string'],
            [['udk_parent_id'], 'integer'],
            [['udk_code'], 'string', 'max' => 254],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'udk_id' => 'УДК',
            'udk_code' => 'Код УДК',
            'udk_name' => 'Имя',
            'udk_parent_id' => 'Код родителя',
            'udk.udk_code' => 'Родитель',
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

    public function getUdk_parent()
    {
        return $this->hasOne(Udk::className(), ['udk_id' => 'udk_parent_id']);
    }

    public function beforeDelete()
    {
        $classif = $this->classificate2s;
        foreach($classif as $class){
            $class->delete();
        }

        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}
