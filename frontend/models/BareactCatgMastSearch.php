<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BareactCatgMast;

/**
 * BareactCatgMastSearch represents the model behind the search form of `frontend\models\BareactCatgMast`.
 */
class BareactCatgMastSearch extends BareactCatgMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['act_catg_code', 'act_group_code', 'country_code'], 'integer'],
            [['act_catg_desc', 'short_desc', 'country_name'], 'safe'],
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
        $query = BareactCatgMast::find();

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
            'act_catg_code' => $this->act_catg_code,
            'act_group_code' => $this->act_group_code,
            'country_code' => $this->country_code,
        ]);

        $query->andFilterWhere(['like', 'act_catg_desc', $this->act_catg_desc])
            ->andFilterWhere(['like', 'short_desc', $this->short_desc])
            ->andFilterWhere(['like', 'country_name', $this->country_name]);

        return $dataProvider;
    }
}
