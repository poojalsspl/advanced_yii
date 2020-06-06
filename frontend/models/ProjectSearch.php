<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `frontend\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'project_title', 'pabstract', 'judges', 'advocates', 'acts', 'citation', 'refrence', 'preceeding', 'disposition', 'bench', 'jurisdiction', 'searchtag', 'jcategory', 'jsubcategory', 'jlength', 'bibliography', 'overruled', 'completion_date', 'start_date'], 'safe'],
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
        $username = \Yii::$app->user->identity->username;
        $query = Project::find()->where(['username'=>$username]);


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
            'completion_date' => $this->completion_date,
            'start_date' => $this->start_date,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'project_title', $this->project_title])
            ->andFilterWhere(['like', 'pabstract', $this->pabstract])
            ->andFilterWhere(['like', 'judges', $this->judges])
            ->andFilterWhere(['like', 'advocates', $this->advocates])
            ->andFilterWhere(['like', 'acts', $this->acts])
            ->andFilterWhere(['like', 'citation', $this->citation])
            ->andFilterWhere(['like', 'refrence', $this->refrence])
            ->andFilterWhere(['like', 'preceeding', $this->preceeding])
            ->andFilterWhere(['like', 'disposition', $this->disposition])
            ->andFilterWhere(['like', 'bench', $this->bench])
            ->andFilterWhere(['like', 'jurisdiction', $this->jurisdiction])
            ->andFilterWhere(['like', 'searchtag', $this->searchtag])
            ->andFilterWhere(['like', 'jcategory', $this->jcategory])
            ->andFilterWhere(['like', 'jsubcategory', $this->jsubcategory])
            ->andFilterWhere(['like', 'jlength', $this->jlength])
            ->andFilterWhere(['like', 'bibliography', $this->bibliography])
            ->andFilterWhere(['like', 'overruled', $this->overruled]);

        return $dataProvider;
    }
}
