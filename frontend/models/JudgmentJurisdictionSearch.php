<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentJurisdiction;

/**
 * JudgmentJurisdictionSearch represents the model behind the search form of `frontend\models\JudgmentJurisdiction`.
 */
class JudgmentJurisdictionSearch extends JudgmentJurisdiction
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_jurisdiction_id'], 'integer'],
            [['judgment_jurisdiction_text'], 'safe'],
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
        $query = JudgmentJurisdiction::find();

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
            'judgment_jurisdiction_id' => $this->judgment_jurisdiction_id,
        ]);

        $query->andFilterWhere(['like', 'judgment_jurisdiction_text', $this->judgment_jurisdiction_text]);

        return $dataProvider;
    }
}
