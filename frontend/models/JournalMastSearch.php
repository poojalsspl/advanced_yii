<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JournalMast;

/**
 * JournalMastSearch represents the model behind the search form of `frontend\models\JournalMast`.
 */
class JournalMastSearch extends JournalMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['journal_code', 'court_code', 'city_code', 'state_code', 'country_code'], 'integer'],
            [['journal_name', 'shrt_name', 'pub_freq', 'remark', 'court_name'], 'safe'],
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
        $query = JournalMast::find();

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
            'journal_code' => $this->journal_code,
            'court_code' => $this->court_code,
            'city_code' => $this->city_code,
            'state_code' => $this->state_code,
            'country_code' => $this->country_code,
        ]);

        $query->andFilterWhere(['like', 'journal_name', $this->journal_name])
            ->andFilterWhere(['like', 'shrt_name', $this->shrt_name])
            ->andFilterWhere(['like', 'pub_freq', $this->pub_freq])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'court_name', $this->court_name]);

        return $dataProvider;
    }
}
