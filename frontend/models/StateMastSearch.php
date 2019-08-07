<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\StateMast;

/**
 * StateMastSearch represents the model behind the search form of `app\models\StateMast`.
 */
class StateMastSearch extends StateMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state_code', 'country_code', 'status'], 'integer'],
            [['state_name', 'shrt_name', 'zone', 'country_name', 'country_shrt_name', 'cr_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = StateMast::find();

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
            'state_code' => $this->state_code,
            'country_code' => $this->country_code,
            'cr_date' => $this->cr_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'state_name', $this->state_name])
            ->andFilterWhere(['like', 'shrt_name', $this->shrt_name])
            ->andFilterWhere(['like', 'zone', $this->zone])
            ->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'country_shrt_name', $this->country_shrt_name]);

        return $dataProvider;
    }
}
