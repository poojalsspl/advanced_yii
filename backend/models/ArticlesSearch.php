<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Articles;

/**
 * ArticlesSearch represents the model behind the search form of `backend\models\Articles`.
 */
class ArticlesSearch extends Articles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'art_catg_id', 'u_id'], 'integer'],
            [['title', 'body', 'status', 'art_catg_name', 'username', 'allocation_date', 'target_date', 'completion_date'], 'safe'],
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
        $query = Articles::find();

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
            'id' => $this->id,
            'art_catg_id' => $this->art_catg_id,
            'u_id' => $this->u_id,
            'allocation_date' => $this->allocation_date,
            'target_date' => $this->target_date,
            'completion_date' => $this->completion_date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'art_catg_name', $this->art_catg_name])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
