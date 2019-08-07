<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentMast;

/**
 * JudgmentMastSearch represents the model behind the search form about `\backend\models\JudgmentMast`.
 */
class JudgmentMastSearch extends JudgmentMast
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judgment_code', 'court_code', 'appellant_adv_count', 'respondant_adv_count', 'citation_count', 'judges_count', 'jcatg_id', 'jsub_catg_id'], 'integer'],
            [['court_name', 'appeal_numb', 'judgment_date', 'judgment_title', 'appellant_name', 'appellant_adv', 'respondant_name', 'respondant_adv', 'appeal_status', 'citation', 'judges_name', 'hearing_date', 'hearing_place', 'judgment_abstract', 'judgment_text', 'judgment_source_code', 'judgment_type', 'judgment_source_name', 'jcatg_description', 'jsub_catg_description', 'overrule_judgment', 'overruled_by_judgment', 'judgment_ext_remark_flag','jyear'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
            'appellant_adv_count' => $this->appellant_adv_count,
            'respondant_adv_count' => $this->respondant_adv_count,
            'citation_count' => $this->citation_count,
            'judges_count' => $this->judges_count,
            'hearing_date' => $this->hearing_date,
            'jcatg_id' => $this->jcatg_id,
            'jsub_catg_id' => $this->jsub_catg_id,
            'jyear' => $this->jyear,            
        ]);

        $query->andFilterWhere(['like', 'court_name', $this->court_name])
            ->andFilterWhere(['like', 'appeal_numb', $this->appeal_numb])
            ->andFilterWhere(['like', 'judgment_title', $this->judgment_title])
            ->andFilterWhere(['like', 'appellant_name', $this->appellant_name])
            ->andFilterWhere(['like', 'appellant_adv', $this->appellant_adv])
            ->andFilterWhere(['like', 'respondant_name', $this->respondant_name])
            ->andFilterWhere(['like', 'respondant_adv', $this->respondant_adv])
            ->andFilterWhere(['like', 'appeal_status', $this->appeal_status])
            ->andFilterWhere(['like', 'citation', $this->citation])
            ->andFilterWhere(['like', 'judges_name', $this->judges_name])
            ->andFilterWhere(['like', 'hearing_place', $this->hearing_place])
            ->andFilterWhere(['like', 'judgment_abstract', $this->judgment_abstract])
            ->andFilterWhere(['like', 'judgment_text', $this->judgment_text])
           
            ->andFilterWhere(['like', 'judgment_type', $this->judgment_type])
            ->andFilterWhere(['like', 'judgment_source_name', $this->judgment_source_name])
            ->andFilterWhere(['like', 'jcatg_description', $this->jcatg_description])
            ->andFilterWhere(['like', 'jsub_catg_description', $this->jsub_catg_description])
            ->andFilterWhere(['like', 'overrule_judgment', $this->overrule_judgment])
            ->andFilterWhere(['like', 'overruled_by_judgment', $this->overruled_by_judgment])
            ->andFilterWhere(['like', 'judgment_ext_remark_flag', $this->judgment_ext_remark_flag])
            ->andFilterWhere(['like', 'jyear', $this->jyear]);

        return $dataProvider;
    }
}
