<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JudgmentCitation;

/**
 * JudgmentCitationSearch represents the model behind the search form of `backend\models\JudgmentCitation`.
 */
class JudgmentCitationSearch extends JudgmentCitation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'judgment_code', 'journal_code', 'journal_pno'], 'integer'],
            [['username', 'doc_id', 'journal_name', 'shrt_name', 'judgment_date', 'citation', 'journal_year', 'journal_volume', 'exam_status'], 'safe'],
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
        $query = JudgmentCitation::find();

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
            'journal_code' => $this->journal_code,
            'judgment_date' => $this->judgment_date,
            'journal_pno' => $this->journal_pno,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'doc_id', $this->doc_id])
            ->andFilterWhere(['like', 'journal_name', $this->journal_name])
            ->andFilterWhere(['like', 'shrt_name', $this->shrt_name])
            ->andFilterWhere(['like', 'citation', $this->citation])
            ->andFilterWhere(['like', 'journal_year', $this->journal_year])
            ->andFilterWhere(['like', 'journal_volume', $this->journal_volume])
            ->andFilterWhere(['like', 'exam_status', $this->exam_status]);

        return $dataProvider;
    }
}
