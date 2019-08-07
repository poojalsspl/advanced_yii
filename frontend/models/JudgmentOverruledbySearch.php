<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentOverruledby;

/**
 * JudgmentOverruledbySearch represents the model behind the search form of `frontend\models\JudgmentOverruledby`.
 */
class JudgmentOverruledbySearch extends JudgmentOverruledby
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'judgment_code', 'over_ruledby_code'], 'integer'],
            [['over_ruledby_title'], 'safe'],
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
        $query = JudgmentOverruledby::find();

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
            'over_ruledby_code' => $this->over_ruledby_code,
        ]);

        $query->andFilterWhere(['like', 'over_ruledby_title', $this->over_ruledby_title]);

        return $dataProvider;
    }
}
