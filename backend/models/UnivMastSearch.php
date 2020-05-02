<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UnivMast;

/**
 * UnivMastSearch represents the model behind the search form of `backend\models\UnivMast`.
 */
class UnivMastSearch extends UnivMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['univ_code', 'city_code', 'state_code', 'country_code'], 'integer'],
            [['univ_name', 'univ_desc', 'univ_type', 'univ_status'], 'safe'],
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
        $query = UnivMast::find();

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
            'univ_code' => $this->univ_code,
            'city_code' => $this->city_code,
            'state_code' => $this->state_code,
            'country_code' => $this->country_code,
        ]);

        $query->andFilterWhere(['like', 'univ_name', $this->univ_name])
            ->andFilterWhere(['like', 'univ_desc', $this->univ_desc])
            ->andFilterWhere(['like', 'univ_type', $this->univ_type])
            ->andFilterWhere(['like', 'univ_status', $this->univ_status]);

        return $dataProvider;
    }
}
