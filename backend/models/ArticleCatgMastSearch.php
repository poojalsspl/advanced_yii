<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ArticleCatgMast;

/**
 * ArticleCatgMastSearch represents the model behind the search form of `backend\models\ArticleCatgMast`.
 */
class ArticleCatgMastSearch extends ArticleCatgMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_catg_id', 'role', 'parent_catg_id'], 'integer'],
            [['art_catg_name', 'menu_flag'], 'safe'],
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
        $query = ArticleCatgMast::find();

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
            'art_catg_id' => $this->art_catg_id,
            'role' => $this->role,
            'parent_catg_id' => $this->parent_catg_id,
        ]);

        $query->andFilterWhere(['like', 'art_catg_name', $this->art_catg_name])
            ->andFilterWhere(['like', 'menu_flag', $this->menu_flag]);

        return $dataProvider;
    }
}
