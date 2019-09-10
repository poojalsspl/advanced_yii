<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentElement;

/**
 * JudgmentElementSearch represents the model behind the search form of `frontend\models\JudgmentElement`.
 */
class JudgmentElementSearch extends JudgmentElement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'judgment_code', 'weight_perc', 'element_word_length'], 'integer'],
            [['element_code', 'element_name', 'element_text'], 'safe'],
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
        $query = JudgmentElement::find();

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
            'weight_perc' => $this->weight_perc,
            'element_word_length' => $this->element_word_length,
        ]);

        $query->andFilterWhere(['like', 'element_code', $this->element_code])
            ->andFilterWhere(['like', 'element_name', $this->element_name])
            ->andFilterWhere(['like', 'element_text', $this->element_text]);

        return $dataProvider;
    }
}
