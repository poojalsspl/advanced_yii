<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JsubCatgMast;

/**
 * JsubCatgMastSearch represents the model behind the search form of `frontend\models\JsubCatgMast`.
 */
class JsubCatgMastSearch extends JsubCatgMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jsub_catg_id', 'jcatg_id'], 'integer'],
            [['jsub_catg_description'], 'safe'],
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
        $query = JsubCatgMast::find();

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
            'jsub_catg_id' => $this->jsub_catg_id,
            'jcatg_id' => $this->jcatg_id,
        ]);

        $query->andFilterWhere(['like', 'jsub_catg_description', $this->jsub_catg_description]);

        return $dataProvider;
    }
}
