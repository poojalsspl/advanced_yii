<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\WebArticles;

/**
 * WebArticlesSearch represents the model behind the search form of `frontend\models\WebArticles`.
 */
class WebArticlesSearch extends WebArticles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'art_catg_id'], 'integer'],
            [['art_date', 'pub_date', 'username', 'title', 'abstract_image', 'slider_image', 'body', 'sef_title', 'sef_description', 'sef_keyword', 'sef_alt', 'status', 'author', 'abstract_image_title'], 'safe'],
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
        $query = WebArticles::find();

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
            'art_date' => $this->art_date,
            'pub_date' => $this->pub_date,
            'art_catg_id' => $this->art_catg_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'abstract_image', $this->abstract_image])
            ->andFilterWhere(['like', 'slider_image', $this->slider_image])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'sef_title', $this->sef_title])
            ->andFilterWhere(['like', 'sef_description', $this->sef_description])
            ->andFilterWhere(['like', 'sef_keyword', $this->sef_keyword])
            ->andFilterWhere(['like', 'sef_alt', $this->sef_alt])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'abstract_image_title', $this->abstract_image_title]);

        return $dataProvider;
    }
}
