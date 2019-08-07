<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BareactMast;

/**
 * BareactMastSearch represents the model behind the search form of `app\models\BareactMast`.
 */
class BareactMastSearch extends BareactMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'doc_id', 'act_group_code', 'act_catg_code', 'act_sub_catg_code', 'tot_section', 'tot_chap', 'country_code'], 'integer'],
            [['bareact_code', 'bareact_desc', 'act_group_desc', 'act_catg_desc', 'act_status', 'enact_date', 'ref_doc_id', 'act_sub_catg_desc', 'country_name'], 'safe'],
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
        $query = BareactMast::find();

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
            'doc_id' => $this->doc_id,
            'act_group_code' => $this->act_group_code,
            'act_catg_code' => $this->act_catg_code,
            'enact_date' => $this->enact_date,
            'act_sub_catg_code' => $this->act_sub_catg_code,
            'tot_section' => $this->tot_section,
            'tot_chap' => $this->tot_chap,
            'country_code' => $this->country_code,
        ]);

        $query->andFilterWhere(['like', 'bareact_code', $this->bareact_code])
            ->andFilterWhere(['like', 'bareact_desc', $this->bareact_desc])
            ->andFilterWhere(['like', 'act_group_desc', $this->act_group_desc])
            ->andFilterWhere(['like', 'act_catg_desc', $this->act_catg_desc])
            ->andFilterWhere(['like', 'act_status', $this->act_status])
            ->andFilterWhere(['like', 'ref_doc_id', $this->ref_doc_id])
            ->andFilterWhere(['like', 'act_sub_catg_desc', $this->act_sub_catg_desc])
            ->andFilterWhere(['like', 'country_name', $this->country_name]);

        return $dataProvider;
    }
}
