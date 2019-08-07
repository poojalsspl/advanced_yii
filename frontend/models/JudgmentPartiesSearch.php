<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentParties;

/**
 * JudgmentPartiesSearch represents the model behind the search form of `frontend\models\JudgmentParties`.
 */
class JudgmentPartiesSearch extends JudgmentParties
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_party_id', 'judgment_code'], 'integer'],
            [['party_name', 'party_flag'], 'safe'],
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
        $query = JudgmentParties::find();

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
            'judgment_party_id' => $this->judgment_party_id,
            'judgment_code' => $this->judgment_code,
        ]);

        $query->andFilterWhere(['like', 'party_name', $this->party_name])
            ->andFilterWhere(['like', 'party_flag', $this->party_flag]);

        return $dataProvider;
    }
}
