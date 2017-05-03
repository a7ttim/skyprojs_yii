<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\project;

/**
 * ProjectSearch represents the model behind the search form of `app\models\project`.
 */
class ProjectSearch extends project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'integer'],
            [['project_name', 'project_date', 'project_area', 'project_advantages', 'project_specifications', 'project_consumers', 'project_protection'], 'safe'],
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
        $query = project::find();

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
            'project_id' => $this->project_id,
            'project_date' => $this->project_date,
        ]);

        $query->andFilterWhere(['ilike', 'project_name', $this->project_name])
            ->andFilterWhere(['ilike', 'project_area', $this->project_area])
            ->andFilterWhere(['ilike', 'project_advantages', $this->project_advantages])
            ->andFilterWhere(['ilike', 'project_specifications', $this->project_specifications])
            ->andFilterWhere(['ilike', 'project_consumers', $this->project_consumers])
            ->andFilterWhere(['ilike', 'project_protection', $this->project_protection]);

        return $dataProvider;
    }
}
