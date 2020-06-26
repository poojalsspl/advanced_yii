<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentAct;

/**
 * JudgmentActSearch represents the model behind the search form of `frontend\models\JudgmentAct`.
 */
class JudgmentActSearch extends JudgmentAct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['j_doc_id', 'judgment_title', 'doc_id', 'act_group_desc', 'act_catg_desc', 'act_sub_catg_desc', 'sec_title', 'country_shrt_name', 'bareact_code', 'bareact_desc', 'court_name', 'court_shrt_name', 'bench_name', 'level'], 'safe'],
            [['judgment_code', 'id', 'act_group_code', 'act_catg_code', 'act_sub_catg_code', 'country_code', 'court_code', 'bench_code'], 'integer'],
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
        $query = JudgmentAct::find();

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
            'id' => $this->id,
            'act_group_code' => $this->act_group_code,
            'act_catg_code' => $this->act_catg_code,
            'act_sub_catg_code' => $this->act_sub_catg_code,
            'country_code' => $this->country_code,
            'court_code' => $this->court_code,
            'bench_code' => $this->bench_code,
        ]);

        $query->andFilterWhere(['like', 'j_doc_id', $this->j_doc_id])
            ->andFilterWhere(['like', 'judgment_title', $this->judgment_title])
            ->andFilterWhere(['like', 'doc_id', $this->doc_id])
            ->andFilterWhere(['like', 'act_group_desc', $this->act_group_desc])
            ->andFilterWhere(['like', 'act_catg_desc', $this->act_catg_desc])
            ->andFilterWhere(['like', 'act_sub_catg_desc', $this->act_sub_catg_desc])
            ->andFilterWhere(['like', 'sec_title', $this->sec_title])
            ->andFilterWhere(['like', 'country_shrt_name', $this->country_shrt_name])
            ->andFilterWhere(['like', 'bareact_code', $this->bareact_code])
            ->andFilterWhere(['like', 'bareact_desc', $this->bareact_desc])
            ->andFilterWhere(['like', 'court_name', $this->court_name])
            ->andFilterWhere(['like', 'court_shrt_name', $this->court_shrt_name])
            ->andFilterWhere(['like', 'bench_name', $this->bench_name])
            ->andFilterWhere(['like', 'level', $this->level]);

        return $dataProvider;
    }
}
