<?php

namespace frontend\controllers;

use Yii;
use app\models\JudgmentMast;
use frontend\models\JudgmentMastSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

use yii\helpers\ArrayHelper;





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

    public function actionJudgmentview($code="")
    {
        return $this->render('judgmentview');
    }


    /**
     * Creates a new JudgmentMast model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($jcount="",$jyear="")
    {
     $model = new JudgmentMast();
    
           
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

           return $this->redirect(['view', 'id' => $model->judgment_code]);
          	
        } 
            return $this->render('create', [
                'model' => $model,
            ]);
      
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->judgment_code]);
        }

        return $this->render('update', [
            'model' => $model,
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
    public function actionJudgmentact()
    {

    }
    public function actionJudgmentadvocate()
    {
    
  
    }
        public function actionJudgmentcitation()
    {
    return $this->render('judgment');
    }
        public function actionJudgmentextremark()
    {

    }

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


    public function actionJudgmentupdate($code='')
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
    //    	$user = $this->findModel($id);        
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
     //$court['countr'] = $country;
     $country_code = $court->country_code;
     $state        =  $court->state_code;

     $state = CityMast::find()->select("city_name,city_code")->where(['country_code'=>$country_code])
//     ->andWhere('!=','country_code','1')
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
