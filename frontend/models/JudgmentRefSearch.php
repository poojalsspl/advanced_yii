<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentRef;

/**
 * JudgmentRefSearch represents the model behind the search form of `frontend\models\JudgmentRef`.
 */
class JudgmentRefSearch extends JudgmentRef
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'judgment_code', 'judgment_code_ref', 'court_code', 'court_code_ref'], 'integer'],
            [['doc_id', 'judgment_title', 'court_name', 'doc_id_ref', 'judgment_title_ref', 'court_name_ref', 'flag'], 'safe'],
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
        $query = JudgmentRef::find();

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
            'court_code' => $this->court_code,
            'court_code_ref' => $this->court_code_ref,
        ]);

        $query->andFilterWhere(['like', 'doc_id', $this->doc_id])
            ->andFilterWhere(['like', 'judgment_title', $this->judgment_title])
            ->andFilterWhere(['like', 'court_name', $this->court_name])
            ->andFilterWhere(['like', 'doc_id_ref', $this->doc_id_ref])
            ->andFilterWhere(['like', 'judgment_title_ref', $this->judgment_title_ref])
            ->andFilterWhere(['like', 'court_name_ref', $this->court_name_ref])
            ->andFilterWhere(['like', 'flag', $this->flag]);

        return $dataProvider;
    }
}
