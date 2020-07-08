<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentMast;

/**
 * JudgmentMastSearch represents the model behind the search form about `\backend\models\JudgmentMast`.
 */
class JudgmentMastSearch extends JudgmentMast
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judgment_code', 'court_code', 'jcatg_id', 'jsub_catg_id'], 'integer'],
            [['court_name', 'appeal_numb', 'judgment_date', 'judgment_title', 'appeal_status','judgment_abstract', 'judgment_text', 'judgment_type', 'jcatg_description', 'jsub_catg_description','overruled_by_judgment','completion_date','start_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()->where(['username'=>$username]);

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
            'judgment_abstract' => $this->judgment_abstract,
            'jcatg_id' => $this->jcatg_id,
            'jsub_catg_id' => $this->jsub_catg_id,
            'start_date' => $this->start_date,
            'completion_date' => $this->completion_date,
         ]);

        $query->andFilterWhere(['like', 'court_name', $this->court_name])
            ->andFilterWhere(['like', 'appeal_numb', $this->appeal_numb])
            ->andFilterWhere(['like', 'judgment_title', $this->judgment_title])
            ->andFilterWhere(['like', 'judgment_abstract', $this->judgment_abstract])
            ->andFilterWhere(['like', 'judgment_text', $this->judgment_text])
            ->andFilterWhere(['like', 'judgment_type', $this->judgment_type])
            ->andFilterWhere(['like', 'jcatg_description', $this->jcatg_description])
            ->andFilterWhere(['like', 'jsub_catg_description', $this->jsub_catg_description])
            ->andFilterWhere(['like', 'overruled_by_judgment', $this->overruled_by_judgment])
            ->andFilterWhere(['like', 'completion_date', $this->completion_date]);
           
            

        return $dataProvider;
    }

    /* Reason : For display list of judgments for judgment abstract 
       Url : http://localhost/advanced_yii/judgment-mast/abstract-list 
    */

    public function searchabstract($params)
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()->where(['username'=>$username]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
             }
         $query->andFilterWhere([
            'judgment_code' => $this->judgment_code,
            'court_code' => $this->court_code,
          ]);
          $query->andFilterWhere(['like', 'court_name', $this->court_name])
            
            ->andFilterWhere(['like', 'judgment_title', $this->judgment_title])
            ->andFilterWhere(['like', 'judgment_abstract', $this->judgment_abstract]);
            return $dataProvider;     
    }

    

}
