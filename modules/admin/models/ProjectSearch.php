<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\project;

/**
 * ProjectSearch represents the model behind the search form about `app\modules\admin\models\project`.
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

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'project_area', $this->project_area])
            ->andFilterWhere(['like', 'project_advantages', $this->project_advantages])
            ->andFilterWhere(['like', 'project_specifications', $this->project_specifications])
            ->andFilterWhere(['like', 'project_consumers', $this->project_consumers])
            ->andFilterWhere(['like', 'project_protection', $this->project_protection]);

        return $dataProvider;
    }
}
