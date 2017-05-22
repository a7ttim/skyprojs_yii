<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\grnti;

/**
 * GrntiSearch represents the model behind the search form about `app\models\grnti`.
 */
class GrntiSearch extends grnti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grnti_id'], 'integer'],
            [['grnti_code', 'grnti_name'], 'safe'],
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
        $query = grnti::find();

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
            'grnti_id' => $this->grnti_id,
            'grnti_parent_id' => $this->grnti_parent_id,
        ]);

        $query->andFilterWhere(['like', 'grnti_code', $this->grnti_code])
            ->andFilterWhere(['like', 'grnti_name', $this->grnti_name]);

        return $dataProvider;
    }
}
