<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pooja;

/**
 * PoojaSearch represents the model behind the search form of `app\models\Pooja`.
 */
class PoojaSearch extends Pooja
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code', 'court_code'], 'integer'],
            [['judgment_date', 'jyear'], 'safe'],
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
        $query = Pooja::find();

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
            'jyear' => $this->jyear,
        ]);

        return $dataProvider;
    }
}
