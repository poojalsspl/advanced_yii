<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\JudgmentMast;
use frontend\models\CourtMast;
use frontend\models\CityMast;
use frontend\models\JudgmentMastSearch;
use frontend\models\JudgmentAdvocate;
use frontend\models\JudgmentJudge;
use frontend\models\JudgmentCitation;
use frontend\models\JcatgMast ;
use frontend\models\JsubCatgMast;
use frontend\models\JudgmentElement;
use frontend\models\JudgmentDataPoint;
use frontend\models\JudgmentRef;
use frontend\models\JudgmentAct;
use frontend\models\BareactDetl;
use frontend\models\JudgmentSearchTag;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\db\Query;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use frontend\models\JudgmentCatgView;
use frontend\models\JudgmentSubCatgView;





/**
 * JudgmentMastController implements the CRUD actions for JudgmentMast model.
 */
class JudgmentMastController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all JudgmentMast models.
     * @return mixed
     */
    

    public function actionIndex()
    {
        $searchModel = new JudgmentMastSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPie() {
    $username = \Yii::$app->user->identity->username;
    $dataProvider = new ActiveDataProvider([
        'query' => JudgmentCatgView::find()->where(['username'=>$username]),
        'pagination' => false
    ]);
    
    $subdataProvider = new ActiveDataProvider([
        'query' => JudgmentSubCatgView::find()->where(['username'=>$username]),
        'pagination' => false
    ]);
    
    return $this->render('pie', [
        'dataProvider' => $dataProvider,
        'subdataProvider' => $subdataProvider
    ]);
  }
          
        public function actionIndexbkup()
    {
        $searchModel = new JudgmentMastSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    

    /**
     * Displays a single JudgmentMast model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionJudgmentview($jcode="")

    {
        $model = JudgmentMast::findOne($jcode);
        return $this->render('judgmentview', [
            'model' => $model,
        ]);
    }



     //<!-----------Reports------>

    //Section - 1
    //<!-----------Judgments------>
    public function actionTotalList()
    {
         $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('court_name,judgment_date,judgment_title,judgment_code')
        ->where(['username'=>$username]);
        $models = $query->all();
        return $this->render('lists/total_list', [
            'models' => $models,
         ]);
    }

        public function actionTotalPending()
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('court_name,judgment_date,judgment_title,judgment_code')
        ->where(['username'=>$username])
        ->andWhere(['is', 'completion_date', new \yii\db\Expression('null')]);
        $models = $query->all();
        return $this->render('lists/total_pending', [
            'models' => $models,
         ]);
    }

      public function actionTotalCompleted()
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('court_name,judgment_date,judgment_title,judgment_code')
        ->where(['username'=>$username])
        ->andWhere(['not', ['completion_date' => null]]);
        $models = $query->all();
        return $this->render('lists/total_completed', [
            'models' => $models,
         ]);
    }
    //<!----------End of Judgments------>
    //End Section - 1

    //Section - 2
    //<!----------SC Judgments------>
    public function actionTotalScList()
    {
         $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('court_name,judgment_date,judgment_title,judgment_code')
        ->where(['username'=>$username])
        ->andWhere(['court_code' => '1']);
        $models = $query->all();
        return $this->render('lists/total_sc_list', [
            'models' => $models,
         ]);
    }

        public function actionTotalScPending()
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('court_name,judgment_date,judgment_title,judgment_code')
        ->where(['username'=>$username])
        ->andWhere(['court_code' => '1'])
        ->andWhere(['is', 'completion_date', new \yii\db\Expression('null')]);
        $models = $query->all();
        return $this->render('lists/total_sc_pending', [
            'models' => $models,
         ]);
    }

    public function actionTotalScCompleted()
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('court_name,judgment_date,judgment_title,judgment_code')
        ->where(['username'=>$username])
        ->andWhere(['court_code' => '1'])
        ->andWhere(['not', ['completion_date' => null]]);
        $models = $query->all();
        return $this->render('lists/total_sc_completed', [
            'models' => $models,
         ]);
    }

    // //End Section - 2

    // //Section - 3
    //<!----------HC Judgments------>
    public function actionTotalHcList()
    {
         $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('court_name,judgment_date,judgment_title,judgment_code')
        ->where(['username'=>$username])
        ->andWhere(['not', ['court_code' => '1']])
        ->andWhere(['court_type' => '2']);
        $models = $query->all();
        return $this->render('lists/total_hc_list', [
            'models' => $models,
         ]);
    }

       public function actionTotalHcPending()
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('court_name,judgment_date,judgment_title,judgment_code')
        ->where(['username'=>$username])
        ->andWhere(['not', ['court_code' => '1']])
        ->andWhere(['court_type' => '2'])
        ->andWhere(['is', 'completion_date', new \yii\db\Expression('null')]);
        $models = $query->all();
        return $this->render('lists/total_hc_pending', [
            'models' => $models,
         ]);
    }

    public function actionTotalHcCompleted()
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('court_name,judgment_date,judgment_title,judgment_code')
        ->where(['username'=>$username])
        ->andWhere(['not', ['court_code' => '1']])
        ->andWhere(['court_type' => '2'])
        ->andWhere(['not', ['completion_date' => null]]);
        $models = $query->all();
        return $this->render('lists/total_hc_completed', [
            'models' => $models,
         ]);
    }
    // //End Section - 3

    public function actionJudgmentAdvocates()
    {
        $username = \Yii::$app->user->identity->username;
        $models = (new \yii\db\Query())
            ->select('count(*) as advocate_count,judgment_code')
            ->from('judgment_advocate')
            ->where(['username'=>$username])
            ->groupBy(['judgment_code'])
            ->having('advocate_count' > 0)->all();
       // $models = $query->createCommand();
        return $this->render('reports/judgment_advocates', [
            'models' => $models,
         ]);
    }

    public function actionJudgmentJudges()
    {
        $username = \Yii::$app->user->identity->username;
        $models = (new \yii\db\Query())
            ->select('count(*) as judge_count,judgment_code')
            ->from('judgment_judge')
            ->where(['username'=>$username])
            ->groupBy(['judgment_code'])
            ->having('judge_count' > 0)->all();
        return $this->render('reports/judgment_judges', [
            'models' => $models,
         ]);
    }

    public function actionJudgmentCitations()
    {
        $username = \Yii::$app->user->identity->username;
        $models = (new \yii\db\Query())
            ->select('count(*) as citation_count,judgment_code')
            ->from('judgment_citation')
            ->where(['username'=>$username])
            ->andwhere(['not', ['citation' => null]])
            ->groupBy(['judgment_code'])
            ->having('citation_count' > 0)->all();
        return $this->render('reports/judgment_citations', [
            'models' => $models,
         ]);
    }

    public function actionJudgmentUncited()
    {
        $username = \Yii::$app->user->identity->username;
        $models = (new \yii\db\Query())
            ->select('count(*) as citation_count,judgment_code')
            ->from('judgment_citation')
            ->where(['username'=>$username])
            ->andwhere(['is', 'citation', new \yii\db\Expression('null')])
            ->groupBy(['judgment_code'])
            ->having('citation_count' > 0)->all();
        return $this->render('reports/judgment_uncited', [
            'models' => $models,
         ]);
    }

    public function actionJudgmentReferred()
    {
        $username = \Yii::$app->user->identity->username;
        $models = (new \yii\db\Query())
            ->select('count(*) as referred_count,judgment_code')
            ->from('judgment_ref')
            ->where(['username'=>$username])
            ->groupBy(['judgment_code'])
            ->having('referred_count' > 0)->all();
        return $this->render('reports/judgment_referred', [
            'models' => $models,
         ]);
    }

    public function actionJudgmentActs()
    {
        $username = \Yii::$app->user->identity->username;
        $models = (new \yii\db\Query())
            ->select('count(*) as acts_count,judgment_code')
            ->from('judgment_act')
            ->where(['username'=>$username])
            ->groupBy(['judgment_code'])
            ->having('acts_count' > 0)->all();
        return $this->render('reports/judgment_acts', [
            'models' => $models,
         ]);
    }

    public function actionJudgmentElements()
    {
        $username = \Yii::$app->user->identity->username;
        $models = (new \yii\db\Query())
            ->select('count(*) as element_count,judgment_code')
            ->from('judgment_element')
            ->where(['username'=>$username])
            ->groupBy(['judgment_code'])
            ->having('element_count' > 0)->all();
        return $this->render('reports/judgment_elements', [
            'models' => $models,
         ]);
    }

    public function actionJudgmentDatapoints()
    {
        $username = \Yii::$app->user->identity->username;
        $models = (new \yii\db\Query())
            ->select('count(*) as datapoint_count,judgment_code')
            ->from('judgment_data_point')
            ->where(['username'=>$username])
            ->groupBy(['judgment_code'])
            ->having('datapoint_count' > 0)->all();
        return $this->render('reports/judgment_datapoints', [
            'models' => $models,
         ]);
    }

    
    public function actionAdvocateList($jcode="")
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentAdvocate::find()
        ->select('advocate_name,advocate_flag')
        ->where(['username'=>$username])
        ->andWhere(['judgment_code'=>$jcode])
        ->orderBy(['advocate_flag' => SORT_ASC]);
        $models = $query->all();
        return $this->render('lists/advocate_list', [
            'models' => $models,
         ]);
    }

    public function actionJudgeList($jcode="")
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentJudge::find()
        ->select('judge_name')
        ->where(['username'=>$username])
        ->andWhere(['judgment_code'=>$jcode]);
        $models = $query->all();
        return $this->render('lists/judge_list', [
            'models' => $models,
         ]);
    }

   

    public function actionCitationList($jcode="")
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentCitation::find()
        ->select('citation')
        ->where(['username'=>$username])
        ->andWhere(['judgment_code'=>$jcode]);
        $models = $query->all();
        return $this->render('lists/citation_list', [
            'models' => $models,
         ]);
    }

     public function actionReferredList($jcode="")
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentRef::find()
        ->select('distinct(judgment_title_ref)')
        ->where(['username'=>$username])
        ->andWhere(['judgment_code'=>$jcode]);
        $models = $query->all();
        //print_r($models);die;
        return $this->render('lists/referred-list', [
            'models' => $models,
         ]);
    } 

     public function actionActsList($jcode="")
    {
         $username = \Yii::$app->user->identity->username;
        $query = JudgmentAct::find()
        ->select('act_group_desc,act_catg_desc,act_sub_catg_desc,act_title,bareact_desc,bareact_code')
        ->where(['username'=>$username])
        ->andWhere(['judgment_code'=>$jcode]);
        $models = $query->all();
        return $this->render('lists/acts_list', [
            'models' => $models,
         ]);
    } 

     public function actionElementList($jcode="")
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentElement::find()
        ->select('element_name,element_text')
        ->where(['username'=>$username])
        ->andWhere(['judgment_code'=>$jcode])
        ->orderBy(['element_name' => SORT_ASC]);
        $models = $query->all();
        return $this->render('lists/element_list', [
            'models' => $models,
         ]);
    } 

    public function actionDatapointsList($jcode="")
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentDataPoint::find()
        ->select('element_name,data_point')
        ->where(['username'=>$username])
        ->andWhere(['judgment_code'=>$jcode])
        ->orderBy(['element_name' => SORT_ASC]);
        $models = $query->all();
        return $this->render('lists/datapoints_list', [
            'models' => $models,
         ]);
    } 

   

    
    //<!-----------End Of Reports------>

   


    /**
     * Creates a new JudgmentMast model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($jcount="",$jyear="")
    {
     $model = new JudgmentMast();
    $cache                 = Yii::$app->cache;
    $courtMast             = ArrayHelper::map(CourtMast::find()->all(), 'court_code', 'court_name');
    //$jcatg_description     = ArrayHelper::map(JcatgMast::find()->all(), 'jcatg_id', 'jcatg_description');
    //$jsub_catg_description = ArrayHelper::map(JsubCatgMast::find()->all(), 'jsub_catg_id', 'jsub_catg_description');
    $cache->set('courtMast', $courtMast);
    //$cache->set('jcatg_description', $jsub_catg_description);
    //$cache->set('jsub_catg_description', $jsub_catg_description);
           
        if ($model->load(Yii::$app->request->post()) ) {
            //$model->court_name                 =  $model->courtCode->court_name;
            //$model->jcatg_description          =  $model->jcatg->jcatg_description;
            //$model->jsub_catg_description      =  $model->jsubCatg->jsub_catg_description;
            $model->bench_type_text            =  $model->judgmentBenchType->bench_type_text;
            $model->disposition_text           =  $model->judgmentDisposition->disposition_text;
            $model->judgmnent_jurisdiction_text =  $model->judgmentJurisdiction->judgment_jurisdiction_text;
            $model->appeal_numb           = $_POST['JudgmentMast']['appeal_numb'];
           // $model->appellant_name        = $_POST['JudgmentMast']['appellant_name'];
           // $model->respondant_name       = $_POST['JudgmentMast']['respondant_name'];
            //$model->appellant_adv         = $_POST['JudgmentMast']['appellant_adv'];
            //$model->respondant_adv        = $_POST['JudgmentMast']['respondant_adv'];                    
            //$model->citation              = $_POST['JudgmentMast']['citation'];
            //$model->judges_name           = $_POST['JudgmentMast']['judges_name'];
            //$year                         = $_POST['JudgmentMast']['jyear'];
           // $model->jcount = 1;
           // $query = Demo::find()->where(['category'=>2]);
            //echo $query->createCommand()->getRawSql();
            //$query = JudgmentMast::find()->select('jcount')->where(['!=','jcount','completed'])->one();
            
            
            $model->save();
            $judgment_code = $model->judgment_code;  
            $doc_id = $model->doc_id='653063'; 
            Yii::$app->session->setFlash('Created successfully!!');

            return $this->redirect(['judgment-advocate/create', 'jcode' => $judgment_code,'doc_id'=>$doc_id]);
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
      
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $username = \Yii::$app->user->identity->username;
        if ($model->load(Yii::$app->request->post())) {
          $jcode = $model->judgment_code;
          $doc_id = $model->doc_id;
          $model->disposition_text = $model->judgmentDisposition->disposition_text;
          $model->judgmnent_jurisdiction_text = $model->judgmentJurisdiction->judgment_jurisdiction_text;
          $model->bench_type_text = $model->judgmentBenchType->bench_type_text;
         
            
          if($model->jcatg_id!=''){
            $jcatg = new JcatgMast();
            $jcatg_desc = $jcatg->getCatgName($model->jcatg_id);
            $model->jcatg_description = $jcatg_desc;
           }
           /*if($model->jsub_catg_description!=''){
            $model->jsub_catg_id = $model->jsub_catg_description;
          $model->jsub_catg_description = $model->jsubCatg->jsub_catg_description;
          }
          else{
            $model->jsub_catg_id = NULL;
            $model->jsub_catg_description = NULL;
          }*/

          if($model->search_tag!=''){

            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_search_tag', ['judgment_code' => $jcode])
            ->execute();
          $search_tag = $model->search_tag;
          $search_ex = explode(";",$search_tag);
          
          
          foreach ($search_ex as $k => $v) {
             $model_search = new JudgmentSearchTag();  
             $model_search->search_tag = $v;
             $model_search->username = $username;
             $model_search->judgment_code = $jcode;
             $model_search->doc_id = $doc_id;
              $model_search->save(false);
           }
          $result = \Yii::$app->db->createCommand("CALL search_tag(:jcode , :usrname, :doid)") 
                      ->bindValue(':jcode' , $jcode )
                      ->bindValue(':usrname', $username)
                      ->bindValue(':doid', $doc_id)
                      ->execute();
         
          }

          $check = JudgmentMast::find()->select('work_status')->where(['judgment_code'=>$jcode])->one();
          
              $count = $check->work_status;
              if($count==''){
               \Yii::$app->db->createCommand("UPDATE judgment_mast SET work_status = 'C' WHERE judgment_code=".$jcode."")->execute();                
               Yii::$app->session->setFlash('success', "Updated successfully!!");

               $model->save();
            return $this->redirect(['judgment-advocate/create', 'jcode' => $jcode,'doc_id'=>$doc_id]);
                }
                Yii::$app->session->setFlash('success', "Updated successfully!!");
                $model->save();
                /*else{
                return $this->redirect(['update', 'id' => $model->judgment_code]);
               }*/
            }
       return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionSuccess($jcode="",$doc_id="")
    {
     return $this->render('j_sucess',[
          'jcode' => $jcode,
          'doc_id' => $doc_id,
     ]);
    }
   /*
   Reason : Display list of judgment for Abstracts
   Url : http://localhost/advanced_yii/judgment-mast/abstract-list
   function used : actionAbstractList, actionJudgmentAbstract

   */
    public function actionAbstractList()
    {
        /*$username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('judgment_code,judgment_title,judgment_abstract')
        ->where(['username'=>$username])
        ->limit(10);
        $models = $query->all();
        return $this->render('abstracts_list', [
            'models' => $models,
         ]);*/
        $searchModel = new JudgmentMastSearch();
        $dataProvider = $searchModel->searchabstract(Yii::$app->request->queryParams);

        return $this->render('abstracts_list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }

    public function actionJudgmentAbstract($jcode,$doc_id)
    {
         $model = $this->findModel($jcode);
         $username = \Yii::$app->user->identity->username;
         if ($model->load(Yii::$app->request->post())) {
          $jcode = $model->judgment_code;
          $doc_id = $model->doc_id;
          $model->save();
           return $this->redirect('abstract-list');
            }
       return $this->render('abstract_form', [
            'model' => $model,
        ]);
    }

       /*
   Reason : Display list of judgment for Elements & Data-points
   Url : http://localhost/advanced_yii/judgment-mast/j-elements-list
   function used : actionJElementList

   */

   public function actionJElementList()
    {
        $username = \Yii::$app->user->identity->username;
        $query = JudgmentMast::find()
        ->select('judgment_code,court_code,court_name,judgment_date,judgment_title,doc_id')
        ->where(['username'=>$username])
        ->limit(200);
        $models = $query->all();
          
        return $this->render('stage2/elements_list', [
            'models' => $models,
           
         ]);

      }

    public function actionActsTitle($brcode,$title)
    {
       
        $query = BareactDetl::find()
        ->select('body')
        ->where(['bareact_code'=>$brcode])
        ->andWhere(['act_title'=> $title]);
        $models = $query->all();
        return $this->render('acts_title', [
            'models' => $models,
         ]);

    }




    public function actionJudgment()
    {
    
            return $this->render('judgment');
    }
    public function actionJudgmenmast()
    {
      $judgmentmast = new JudgmentMast();
         $cache                 = Yii::$app->cache;
         $courtMast             = ArrayHelper::map(CourtMast::find()->all(), 'court_code', 'court_name');
         $jcatg_description     = ArrayHelper::map(JcatgMast::find()->all(), 'jcatg_id', 'jcatg_description');
         $jsub_catg_description = ArrayHelper::map(JsubCatgMast::find()->all(), 'jsub_catg_id', 'jsub_catg_description');
         $cache->set('courtMast', $courtMast);
         $cache->set('jcatg_description', $jsub_catg_description);
         $cache->set('jsub_catg_description', $jsub_catg_description);
         
        if($judgmentmast->load(Yii::$app->request->post()) ) {
            $model->court_name                 =  $model->courtCode->court_name;
            $model->jcatg_description          =  $model->jcatg->jcatg_description;
            $model->jsub_catg_description      =  $model->jsubCatg->jsub_catg_description;
            $model->bench_type_text            =  $model->judgmentBenchType->details;
            $model->disposition_text           =  $model->judgmentDisposition->details;
            $model->judgment_jurisdiction_text =  $model->judgmentJurisdiction->details;
            $model->appeal_numb                = $_POST['JudgmentMast']['appeal_numb'];
            $model->appellant_name             = $_POST['JudgmentMast']['appellant_name'];
            $model->respondant_name            = $_POST['JudgmentMast']['respondant_name'];
            $model->appellant_adv              = $_POST['JudgmentMast']['appellant_adv'];
            $model->respondant_adv             = $_POST['JudgmentMast']['respondant_adv'];                    
            $model->citation                   = $_POST['JudgmentMast']['citation'];
            $model->judges_name                = $_POST['JudgmentMast']['judges_name'];
            $year                              = $_POST['JudgmentMast']['jyear'];
            Yii::$app->session->setFlash('Created successfully!!');
            $judgmentmast->save(false);

            return $this->redirect(['/judgment-mast/judgment', 'status' => 'acts']);
        } else {
            return $this->render('/judgment-mast/judgment');
        }
    }
/*    public function actionJudgmentact()
    {

    }
    public function actionJudgmentadvocate()
    {
    
  
    }*/
        public function actionJudgmentcitation()
    {
    return $this->render('judgment');
    }
/*        public function actionJudgmentextremark()
    {

    }
*/
        public function actionJudgmentparties()
    {
    $judgmentAct       = new JudgmentAct();
    $judgmentAdvocate  = new JudgmentAdvocate();
    $judgmentCitation  = new JudgmentCitation();
    $judgmentExtRemark = new JudgmentExtRemark();
    $judgmentJudge     = new JudgmentJudge();
    $judgmentParties   = new JudgmentParties();
    return $this->render('judgment');
    }



    public function actionJudgmentjudge()
    {

        $model = new JudgmentJudge();

        if ($model->load(Yii::$app->request->post())) {
             echo "test";
        exit();
        
            return $this->redirect(['judgment', 'status' => 7]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    
    


    /**
     * Updates an existing JudgmentMast model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    
     public function actionMemcacheOverruled()
    {
      $cache = Yii::$app->cache;
     $courtMast = ArrayHelper::map(CourtMast::find()->all(), 'court_code', 'court_name');
     $jcatg_description = ArrayHelper::map(JcatgMast::find()->all(), 'jcatg_id', 'jcatg_description');
     $jsub_catg_description = ArrayHelper::map(JsubCatgMast::find()->all(), 'jsub_catg_id', 'jsub_catg_description');
         $cache->set('courtMast', $courtMast);
         $cache->set('jcatg_description', $jsub_catg_description);
         $cache->set('jsub_catg_description', $jsub_catg_description);

      //$judgmentOverruled = ArrayHelper::map(JudgmentMast::find()->select('judgment_code,judgment_title')->all(), 'judgment_code', 'judgment_title');
/*    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });*/
 
     // $data = $cache->set('judgerule', $courtMast);
      /*if($data){
        print_r($cache->get('judgmentOverruled'));
          }*/
 /*if($data)
 {
    print_r($cache->get('judgerule'));
 }*/
/*    if(\Yii::$app->cache->set('judgmentOverruled',  $judgmentOverruled)){
        echo "memcached created successfully";
    } 
    else{
        echo "Error";
    }*/
    }


    public function actionJudgmentupdate($code='',$doc_id='')
    {
        
            return $this->render('judgmentupdate');
    }
    public function actionMemcacheRetrive()
    {
      $cache = Yii::$app->cache;
       echo $cache->get('test'); 
/*    $return  = \Yii::$app->cache->get('judgmentOverruled'); 
    print_r($return);
    exit();*/
    }

    /**
     * Deletes an existing JudgmentMast model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($code)
    {
    $master = $this->findModel($code);
    //      $user = $this->findModel($id);        
    $JudgmentAct         = $master->judgmentActs;
    $JudgmentAdvocate    = $master->judgmentAdvocates;
    $JudgmentCitation    = $master->judgmentCitations;
    $JudgmentExtRemark   = $master->judgmentExtRemark;
    $JudgmentJudge       = $master->judgmentJudges;
    $JudgmentParties     = $master->judgmentParties;
    $judgmentOverrules   = $master->judgmentOverrules;
    $judgmentOverruledby = $master->judgmentOverruledby;
    $judgmentRef         = $master->judgmentRefs;
    $judgmentCitedby     = $master->judgmentCitedby;


    if(!empty($JudgmentAct)){ foreach($JudgmentAct as $act) { $act->delete(); } }
    if(!empty($JudgmentAdvocate)){ foreach($JudgmentAdvocate as $Advocate) { $Advocate->delete(); } }
    if(!empty($JudgmentCitation)){ foreach($JudgmentCitation as $Citation) { $Citation->delete(); }   } 
    if(!empty($JudgmentExtRemark)){ $JudgmentExtRemark->delete();  }
    if(!empty($JudgmentJudge)){  foreach($JudgmentJudge as $Judge) { $Judge->delete(); } }
    if(!empty($JudgmentParties)){ foreach($JudgmentParties as $Parties) { $Parties->delete(); }  }
    if(!empty($judgmentOverrules)){ foreach($judgmentOverrules as $Overrules) { $Overrules->delete(); }  }
    if(!empty($judgmentOverruledby)){ foreach($judgmentOverruledby as $Overruledby) { $Overruledby->delete(); }  }
    if(!empty($judgmentRef)){ foreach($judgmentRef as $jRef) { $jRef->delete(); }  }
    if(!empty($judgmentCitedby)){ foreach($judgmentCitedby as $Citedby) { $Citedby->delete(); }  }
    $master->delete();  
       Yii::$app->session->setFlash('Deleted successfully!!');     
        return $this->redirect(['index']);
    }
  
    public function actionCourt($id)
    {
    
     $court = CourtMast::find()->where(['court_code'=>$id])->one();
     $country_code = $court->country_code;
     $state        =  $court->state_code;

     $state = CityMast::find()->select("city_name,city_code")->where(['country_code'=>$country_code])
     ->andwhere(['state_code'=>$state])
     ->asArray()->all();     
    $result = Json::encode($state);
     return $result;          
    }
    public function actionJsubcateg($id)
    {
    
     $jsubCatg = JsubCatgMast::find()->select("jsub_catg_id,jsub_catg_description")->where(['jcatg_id'=>$id])->asArray()->all();     
    $result = Json::encode($jsubCatg);
     return $result;          
    }

    /*public function actionIndex()
    {*/
       /* $username = \Yii::$app->user->identity->username;
        $date = date('Y-m-d');*/
        /*SELECT * FROM `judgment_mast` WHERE username = 'pooja@laxyosolutionsoft.com' and research_date = (SELECT MIN(research_date) from judgment_mast where research_date <= CURRENT_DATE AND completion_date is null AND username = 'pooja@laxyosolutionsoft.com')*/
       /* $subQuery = JudgmentMast::find()->select('MIN(research_date)')->where(['<=','research_date' , $date])->andWhere(['completion_date'=>NULL])->andWhere(['username'=>$username]);
        $query = JudgmentMast::find()
        ->select('judgment_date,judgment_title,court_name,judgment_code,completion_date')
        ->where(['=', 'research_date', $subQuery])
        ->andWhere(['username'=>$username]);*/
        //->orderBy('completion_date');
        //$searchModel = $query->all();

       /* $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        $searchModel = $query->orderBy('completion_date')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'pagination' => $pagination,
           ]);*/
   /* }*/


    /**
     * Finds the JudgmentMast model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentMast the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentMast::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}



