<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JudgmentMast;

/**
 * JudgmentMastSearch represents the model behind the search form of `backend\models\JudgmentMast`.
 */
class JudgmentMastSearch extends JudgmentMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'college_code', 'court_name', 'court_type', 'appeal_numb', 'appeal_numb1', 'judgment_date', 'judgment_date1', 'judgment_title', 'appeal_status', 'disposition_text', 'bench_type_text', 'judgmnent_jurisdiction_text', 'judgment_abstract', 'judgment_text', 'judgment_text1', 'search_tag', 'doc_id', 'judgment_type', 'judgment_type1', 'jcatg_description', 'jsub_catg_description', 'overruled_by_judgment', 'remark', 'time', 'approved_date', 'completion_status', 'completion_date', 'start_date'], 'safe'],
            [['judgment_code', 'court_code', 'disposition_id', 'disposition_id1', 'bench_type_id', 'bench_type_id1', 'judgment_jurisdiction_id', 'judgment_jurisdiction_id1', 'jcatg_id', 'jcatg_id1', 'jsub_catg_id', 'jsub_catg_id1', 'approved', 'work_status', 'status_2'], 'integer'],
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
        $query = JudgmentMast::find();

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
            'judgment_code' => $this->judgment_code,
            'court_code' => $this->court_code,
            'judgment_date' => $this->judgment_date,
            'judgment_date1' => $this->judgment_date1,
            'disposition_id' => $this->disposition_id,
            'disposition_id1' => $this->disposition_id1,
            'bench_type_id' => $this->bench_type_id,
            'bench_type_id1' => $this->bench_type_id1,
            'judgment_jurisdiction_id' => $this->judgment_jurisdiction_id,
            'judgment_jurisdiction_id1' => $this->judgment_jurisdiction_id1,
            'jcatg_id' => $this->jcatg_id,
            'jcatg_id1' => $this->jcatg_id1,
            'jsub_catg_id' => $this->jsub_catg_id,
            'jsub_catg_id1' => $this->jsub_catg_id1,
            'time' => $this->time,
            'approved' => $this->approved,
            'approved_date' => $this->approved_date,
            'work_status' => $this->work_status,
            'status_2' => $this->status_2,
            'completion_date' => $this->completion_date,
            'start_date' => $this->start_date,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'college_code', $this->college_code])
            ->andFilterWhere(['like', 'court_name', $this->court_name])
            ->andFilterWhere(['like', 'court_type', $this->court_type])
            ->andFilterWhere(['like', 'appeal_numb', $this->appeal_numb])
            ->andFilterWhere(['like', 'appeal_numb1', $this->appeal_numb1])
            ->andFilterWhere(['like', 'judgment_title', $this->judgment_title])
            ->andFilterWhere(['like', 'appeal_status', $this->appeal_status])
            ->andFilterWhere(['like', 'disposition_text', $this->disposition_text])
            ->andFilterWhere(['like', 'bench_type_text', $this->bench_type_text])
            ->andFilterWhere(['like', 'judgmnent_jurisdiction_text', $this->judgmnent_jurisdiction_text])
            ->andFilterWhere(['like', 'judgment_abstract', $this->judgment_abstract])
            ->andFilterWhere(['like', 'judgment_text', $this->judgment_text])
            ->andFilterWhere(['like', 'judgment_text1', $this->judgment_text1])
            ->andFilterWhere(['like', 'search_tag', $this->search_tag])
            ->andFilterWhere(['like', 'doc_id', $this->doc_id])
            ->andFilterWhere(['like', 'judgment_type', $this->judgment_type])
            ->andFilterWhere(['like', 'judgment_type1', $this->judgment_type1])
            ->andFilterWhere(['like', 'jcatg_description', $this->jcatg_description])
            ->andFilterWhere(['like', 'jsub_catg_description', $this->jsub_catg_description])
            ->andFilterWhere(['like', 'overruled_by_judgment', $this->overruled_by_judgment])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'completion_status', $this->completion_status]);

        return $dataProvider;
    }
}
