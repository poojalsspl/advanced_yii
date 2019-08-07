<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserMast;

/**
 * UserMastSearch represents the model behind the search form of `app\models\UserMast`.
 */
class UserMastSearch extends UserMast
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'city_code', 'state_code', 'country_code', 'pin_code', 'status'], 'integer'],
            [['first_name', 'last_name', 'pan_no', 'gst_no', 'activation_date', 'exp_date', 'user_type', 'company_name', 'profession', 'no_of_laywers', 'practise_area', 'user_ip', 'gender', 'user_pic', 'sign_date', 'bar_reg_no', 'dob', 'mobile_1', 'mobile_2', 'landline_1', 'landline_2', 'fax', 'email', 'alt_email', 'grad_yr', 'practice_since', 'city_name', 'state_name', 'country_name', 'user_address'], 'safe'],
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
        $query = UserMast::find();

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
            'activation_date' => $this->activation_date,
            'exp_date' => $this->exp_date,
            'sign_date' => $this->sign_date,
            'dob' => $this->dob,
            'grad_yr' => $this->grad_yr,
            'practice_since' => $this->practice_since,
            'city_code' => $this->city_code,
            'state_code' => $this->state_code,
            'country_code' => $this->country_code,
            'pin_code' => $this->pin_code,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'pan_no', $this->pan_no])
            ->andFilterWhere(['like', 'gst_no', $this->gst_no])
            ->andFilterWhere(['like', 'user_type', $this->user_type])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'no_of_laywers', $this->no_of_laywers])
            ->andFilterWhere(['like', 'practise_area', $this->practise_area])
            ->andFilterWhere(['like', 'user_ip', $this->user_ip])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'user_pic', $this->user_pic])
            ->andFilterWhere(['like', 'bar_reg_no', $this->bar_reg_no])
            ->andFilterWhere(['like', 'mobile_1', $this->mobile_1])
            ->andFilterWhere(['like', 'mobile_2', $this->mobile_2])
            ->andFilterWhere(['like', 'landline_1', $this->landline_1])
            ->andFilterWhere(['like', 'landline_2', $this->landline_2])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alt_email', $this->alt_email])
            ->andFilterWhere(['like', 'city_name', $this->city_name])
            ->andFilterWhere(['like', 'state_name', $this->state_name])
            ->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'user_address', $this->user_address]);

        return $dataProvider;
    }
}
