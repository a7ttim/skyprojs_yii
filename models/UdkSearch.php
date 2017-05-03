<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Udk;

/**
 * UdkSearch represents the model behind the search form of `app\models\Udk`.
 */
class UdkSearch extends Udk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['udk_id', 'udk_parent_id'], 'integer'],
            [['udk_code', 'udk_name'], 'safe'],
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
        $query = Udk::find();

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
            'udk_id' => $this->udk_id,
            'udk_parent_id' => $this->udk_parent_id,
        ]);

        $query->andFilterWhere(['ilike', 'udk_code', $this->udk_code])
            ->andFilterWhere(['ilike', 'udk_name', $this->udk_name]);

        return $dataProvider;
    }
}
