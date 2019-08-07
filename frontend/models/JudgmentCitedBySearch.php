<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentCitedBy;

/**
 * JudgmentCitedBySearch represents the model behind the search form of `frontend\models\JudgmentCitedBy`.
 */
class JudgmentCitedBySearch extends JudgmentCitedBy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'judgment_code', 'judgment_code_ref'], 'integer'],
            [['judgment_source_code', 'judgment_source_code_ref', 'judgment_title_ref'], 'safe'],
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
        $query = JudgmentCitedBy::find();

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
            'judgment_code' => $this->judgment_code,
            'judgment_code_ref' => $this->judgment_code_ref,
        ]);

        $query->andFilterWhere(['like', 'judgment_source_code', $this->judgment_source_code])
            ->andFilterWhere(['like', 'judgment_source_code_ref', $this->judgment_source_code_ref])
            ->andFilterWhere(['like', 'judgment_title_ref', $this->judgment_title_ref]);

        return $dataProvider;
    }
}
