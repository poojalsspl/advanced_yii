<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BareactDetl;

/**
 * BareactDetlSearch represents the model behind the search form of `frontend\models\BareactDetl`.
 */
class BareactDetlSearch extends BareactDetl
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'doc_id', 'act_group_code', 'act_catg_code', 'act_sub_catg_code', 'chapt_no'], 'integer'],
            [['level', 'sno', 'bareact_code', 'bareact_desc', 'act_group_desc', 'act_catg_desc', 'act_sub_catg_desc', 'act_title', 'enact_date', 'act_status_mast', 'act_status_detl', 'pdoc_id', 'pdoc_txt', 'sdoc_id', 'sdoc_txt', 'cdoc_id', 'act_state', 'sec_id', 'chapt_title', 'sec_title', 'ref_doc_id', 'body', 'docid_ind'], 'safe'],
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
        $query = BareactDetl::find();

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
            'act_sub_catg_code' => $this->act_sub_catg_code,
            'enact_date' => $this->enact_date,
            'chapt_no' => $this->chapt_no,
        ]);

        $query->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'sno', $this->sno])
            ->andFilterWhere(['like', 'bareact_code', $this->bareact_code])
            ->andFilterWhere(['like', 'bareact_desc', $this->bareact_desc])
            ->andFilterWhere(['like', 'act_group_desc', $this->act_group_desc])
            ->andFilterWhere(['like', 'act_catg_desc', $this->act_catg_desc])
            ->andFilterWhere(['like', 'act_sub_catg_desc', $this->act_sub_catg_desc])
            ->andFilterWhere(['like', 'act_title', $this->act_title])
            ->andFilterWhere(['like', 'act_status_mast', $this->act_status_mast])
            ->andFilterWhere(['like', 'act_status_detl', $this->act_status_detl])
            ->andFilterWhere(['like', 'pdoc_id', $this->pdoc_id])
            ->andFilterWhere(['like', 'pdoc_txt', $this->pdoc_txt])
            ->andFilterWhere(['like', 'sdoc_id', $this->sdoc_id])
            ->andFilterWhere(['like', 'sdoc_txt', $this->sdoc_txt])
            ->andFilterWhere(['like', 'cdoc_id', $this->cdoc_id])
            ->andFilterWhere(['like', 'act_state', $this->act_state])
            ->andFilterWhere(['like', 'sec_id', $this->sec_id])
            ->andFilterWhere(['like', 'chapt_title', $this->chapt_title])
            ->andFilterWhere(['like', 'sec_title', $this->sec_title])
            ->andFilterWhere(['like', 'ref_doc_id', $this->ref_doc_id])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'docid_ind', $this->docid_ind]);

        return $dataProvider;
    }
}
