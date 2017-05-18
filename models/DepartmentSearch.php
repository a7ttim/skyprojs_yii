<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\department;

/**
 * DepartmentSearch represents the model behind the search form about `app\models\department`.
 */
class DepartmentSearch extends department
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id', 'department_parent_id'], 'integer'],
            [['department_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = department::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'department_id' => $this->department_id,
            'department_parent_id' => $this->department_parent_id,
        ]);

        $query->andFilterWhere(['like', 'department_name', $this->department_name]);

        return $dataProvider;
    }
}
