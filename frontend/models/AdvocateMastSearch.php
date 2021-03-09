<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AdvocateMast;
use frontend\models\MktStudent;

/**
 * AdvocateMastSearch represents the model behind the search form of `frontend\models\AdvocateMast`.
 */
class AdvocateMastSearch extends AdvocateMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adv_id', 'court_code', 'country_code', 'state_code', 'city_code', 'regs_year', 'qual_type', 'std_id', 'surv_status'], 'integer'],
             [['referral_code', 'advocate_name', 'email_id', 'password', 'dob', 'gender', 'mobile', 'image', 'court_name', 'regs_numb', 'mkt_username', 'surv_date', 'surv_compstatus', 'crdt'], 'safe'],
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
        $username = $_SESSION['username'];
        $student = MktStudent::find()->select('std_id')->where(['username'=>$username])->one();
        $query = AdvocateMast::find()->where(['std_id'=>$student->std_id]);

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
            'adv_id' => $this->adv_id,
            'dob' => $this->dob,
            'mobile' => $this->mobile,
            'court_code' => $this->court_code,
            'country_code' => $this->country_code,
            'state_code' => $this->state_code,
            'city_code' => $this->city_code,
            'regs_year' => $this->regs_year,
            'qual_type' => $this->qual_type,
            'surv_compstatus' => $this->surv_compstatus,
            'crdt' => $this->crdt,
        ]);

         
        $query->andFilterWhere(['like', 'advocate_name', $this->advocate_name])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'court_name', $this->court_name])
            ->andFilterWhere(['like', 'regs_numb', $this->regs_numb])
            ->andFilterWhere(['like', 'mkt_username', $this->mkt_username])
            ->andFilterWhere(['like', 'surv_compstatus', $this->surv_compstatus]);

        return $dataProvider;
    }

    public function search1($params)
    {
        $username = $_SESSION['username'];
        $student = MktStudent::find()->select('std_id')->where(['username'=>$username])->one();
        $query = AdvocateMast::find()->where(['std_id'=>$student->std_id])->andWhere(['surv_status'=>'2']);

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
            'adv_id' => $this->adv_id,
            'dob' => $this->dob,
            'mobile' => $this->mobile,
            'court_code' => $this->court_code,
            'country_code' => $this->country_code,
            'state_code' => $this->state_code,
            'city_code' => $this->city_code,
            'regs_year' => $this->regs_year,
            'qual_type' => $this->qual_type,
            'surv_compstatus' => $this->surv_compstatus,
            'crdt' => $this->crdt,
        ]);

        $query->andFilterWhere(['like', 'advocate_name', $this->advocate_name])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'court_name', $this->court_name])
            ->andFilterWhere(['like', 'regs_numb', $this->regs_numb])
            ->andFilterWhere(['like', 'mkt_username', $this->mkt_username])
            ->andFilterWhere(['like', 'surv_compstatus', $this->surv_compstatus]);

        return $dataProvider;
    }
}