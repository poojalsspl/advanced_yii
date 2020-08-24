<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CityMast;

/**
 * CityMastSearch represents the model behind the search form of `app\models\CityMast`.
 */
class CityMastSearch extends CityMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_code', 'state_code', 'country_code'], 'integer'],
            [['city_name', 'shrt_name', 'state_name', 'state_shrt_name', 'country_name', 'country_shrt_name', 'court_stat'], 'safe'],
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
        $query = CityMast::find();

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
            'city_code' => $this->city_code,
            'state_code' => $this->state_code,
            'country_code' => $this->country_code,
        ]);

        $query->andFilterWhere(['like', 'city_name', $this->city_name])
            ->andFilterWhere(['like', 'shrt_name', $this->shrt_name]);
            //->andFilterWhere(['like', 'state_name', $this->state_name])
            //->andFilterWhere(['like', 'state_shrt_name', $this->state_shrt_name])
            //->andFilterWhere(['like', 'country_name', $this->country_name])
            //->andFilterWhere(['like', 'country_shrt_name', $this->country_shrt_name])
            //->andFilterWhere(['like', 'court_stat', $this->court_stat]);

        return $dataProvider;
    }
}
