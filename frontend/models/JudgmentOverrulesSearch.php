<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentOverrules;

/**
 * JudgmentOverrulesSearch represents the model behind the search form of `frontend\models\JudgmentOverrules`.
 */
class JudgmentOverrulesSearch extends JudgmentOverrules
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'judgment_code', 'over_rules_code'], 'integer'],
            [['over_rules_title'], 'safe'],
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
        $query = JudgmentOverrules::find();

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
            'over_rules_code' => $this->over_rules_code,
        ]);

        $query->andFilterWhere(['like', 'over_rules_title', $this->over_rules_title]);

        return $dataProvider;
    }
}
