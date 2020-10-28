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
            [['username', 'college_code', 'doc_id', 'court_name', 'court_type', 'appeal_numb', 'appeal_numb1', 'appeal_count', 'judgment_date', 'judgment_date1', 'judgment_title', 'appeal_status', 'disposition_text', 'bench_type_text', 'judgmnent_jurisdiction_text', 'judgment_abstract', 'judgment_text_data_remove', 'judgment_text', 'judgment_text1', 'search_tag', 'judgment_type', 'judgment_type1', 'jcatg_description', 'jsub_catg_description', 'overruled_by_judgment', 'remark', 'time', 'approved_date', 'work_status', 'start_date', 'completion_status', 'completion_date', 'judgment_status', 'prstatus', 'prdate', 'fdpstatus', 'fdpdate', 'hnstatus', 'hndate', 'clestatus', 'cledate'], 'safe'],
            [['u_id', 'judgment_code', 'court_code', 'disposition_id', 'disposition_id1', 'bench_type_id', 'bench_type_id1', 'judgment_jurisdiction_id', 'judgment_jurisdiction_id1', 'search_tag_count', 'jcatg_id', 'jcatg_id1', 'jsub_catg_id', 'jsub_catg_id1', 'judgment_length', 'approved', 'status_2', 'edit_status', 'bench_code'], 'integer'],
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
        $current_date = date('Y-m-d');
        $query = JudgmentMast::find()->where(['username'=>$username])->andWhere(['<=', 'start_date', $current_date]);

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
            ->andFilterWhere(['like', 'completion_date', $this->completion_date])
            ->andFilterWhere(['like', 'prstatus', $this->prstatus]);
           
            

        return $dataProvider;
    }

    /* Reason : For display list of judgments for judgment abstract 
       Url : http://localhost/advanced_yii/judgment-mast/abstract-list 
    */

    public function searchabstract($params)
    {
        $username = \Yii::$app->user->identity->username;
        $current_date = date('Y-m-d');
        $query = JudgmentMast::find()->where(['username'=>$username])->andWhere(['<=', 'start_date', $current_date]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
             }
         $query->andFilterWhere([
            'doc_id' => $this->doc_id,
            'court_code' => $this->court_code,
          ]);
          $query->andFilterWhere(['like', 'court_name', $this->court_name])
            
            ->andFilterWhere(['like', 'judgment_title', $this->judgment_title])
            ->andFilterWhere(['like', 'judgment_abstract', $this->judgment_abstract]);
            return $dataProvider;     
    }

    

}
