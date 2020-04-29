<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CollegeMast;

/**
 * CollegeMastSearch represents the model behind the search form of `backend\models\CollegeMast`.
 */
class CollegeMastSearch extends CollegeMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['college_code', 'univ_code', 'estd_yr', 'zipcode', 'country_code', 'state_code', 'city_code', 'total_students'], 'integer'],
            [['college_name', 'univ_name', 'college_desc', 'college_logo', 'sponsor', 'startdate', 'enddate', 'address', 'email', 'website', 'fax', 'tele', 'mobile', 'country_name', 'state_name', 'city_name', 'prospectus'], 'safe'],
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
        $query = CollegeMast::find();

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
            'college_code' => $this->college_code,
            'univ_code' => $this->univ_code,
            'estd_yr' => $this->estd_yr,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'zipcode' => $this->zipcode,
            'country_code' => $this->country_code,
            'state_code' => $this->state_code,
            'city_code' => $this->city_code,
            'total_students' => $this->total_students,
        ]);

        $query->andFilterWhere(['like', 'college_name', $this->college_name])
            ->andFilterWhere(['like', 'univ_name', $this->univ_name])
            ->andFilterWhere(['like', 'college_desc', $this->college_desc])
            ->andFilterWhere(['like', 'college_logo', $this->college_logo])
            ->andFilterWhere(['like', 'sponsor', $this->sponsor])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'tele', $this->tele])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'state_name', $this->state_name])
            ->andFilterWhere(['like', 'city_name', $this->city_name])
            ->andFilterWhere(['like', 'prospectus', $this->prospectus]);

        return $dataProvider;
    }
}
