<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InvcMast;

/**
 * InvcMastSearch represents the model behind the search form of `app\models\InvcMast`.
 */
class InvcMastSearch extends InvcMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invc_numb', 'userid', 'custid', 'invc_disc'], 'integer'],
            [['invc_date', 'invoice_status'], 'safe'],
            [['invc_amt', 'GST', 'paid_amount'], 'number'],
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
        $query = InvcMast::find();

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
            'invc_numb' => $this->invc_numb,
            'invc_date' => $this->invc_date,
            'userid' => $this->userid,
            'custid' => $this->custid,
            'invc_amt' => $this->invc_amt,
            'GST' => $this->GST,
            'invc_disc' => $this->invc_disc,
            'paid_amount' => $this->paid_amount,
        ]);

        $query->andFilterWhere(['like', 'invoice_status', $this->invoice_status]);

        return $dataProvider;
    }
}
