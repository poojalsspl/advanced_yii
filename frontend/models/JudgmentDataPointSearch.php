<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentDataPoint;

/**
 * JudgmentDataPointSearch represents the model behind the search form of `frontend\models\JudgmentDataPoint`.
 */
class JudgmentDataPointSearch extends JudgmentDataPoint
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'judgment_code', 'element_code'], 'integer'],
            [['element_name', 'data_point'], 'safe'],
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
        $query = JudgmentDataPoint::find();

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
            'element_code' => $this->element_code,
        ]);

        $query->andFilterWhere(['like', 'element_name', $this->element_name])
            ->andFilterWhere(['like', 'data_point', $this->data_point]);

        return $dataProvider;
    }
}
