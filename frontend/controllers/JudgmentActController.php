<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentAct;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentActSearch;
use frontend\models\BareactDetl;
use frontend\models\BareactMast;
use frontend\models\BareactGroupMast;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;

/**
 * JudgmentActController implements the CRUD actions for JudgmentAct model.
 */
class JudgmentActController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all JudgmentAct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentActSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentAct model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Multiple JudgmentAct.
     * create with checkbox selection .
     * @return mixed
     */
    public function actionCreate($doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentAct();

        if ($model->load(Yii::$app->request->post()) ) {
            $count =  count($_POST['JudgmentAct']['sec_title']);
            $judgmentMast = JudgmentMast::find()->where(['doc_id'=>$doc_id])->one();
            for($i=0;$i<$count;$i++)
            {

            $model = new JudgmentAct();
            
             //$model->judgment_code = $jcode;
             $model->j_doc_id = $doc_id;
             $model->username = $username;
             $model->judgment_title =  $judgmentMast->judgment_title;
             $model->bareact_code = $model->bareact_desc ;
             $model->sec_title = $_POST['JudgmentAct']['sec_title'][$i] ;
             $model->act_catg_desc = $_POST['JudgmentAct']['act_catg_desc'] ;
             $model->act_catg_code = $_POST['JudgmentAct']['act_catg_code'] ;
             $model->act_sub_catg_code = $_POST['JudgmentAct']['act_sub_catg_code'] ;
             $model->act_sub_catg_desc = $_POST['JudgmentAct']['act_sub_catg_desc'] ;
             $model->act_group_code = $_POST['JudgmentAct']['act_group_code'] ;
             $model->bareact_code = $_POST['JudgmentAct']['bareact_desc'] ;
             $model->bareact_desc = $model->bareactDesc->bareact_desc;
             $model->save(); 
            }
            $model->save(false);
            $check = JudgmentAct::find()->select('work_status')->where(['j_doc_id'=>$doc_id])->one();
             $count = $check->work_status;
              if($count==''){ 
                $date = date('Y-m-d');
                \Yii::$app->db->createCommand("UPDATE judgment_act SET work_status = 'C' WHERE j_doc_id=".$doc_id)->execute();  
                \Yii::$app->db->createCommand("UPDATE judgment_mast SET completion_date = '".$date."' WHERE doc_id=".$doc_id)->execute();                 
                
                 Yii::$app->session->setFlash('success', "Created successfully!!");
                  $model->save(false);
                
            return $this->redirect(['judgment-mast/success', 'doc_id'=>$doc_id]);
                }
                
        }
         
        return $this->render('create', [
            'model' => $model,
        ]);
           
    }

    /**
    * for dependent bareact description in judgment act form
    */
    public function actionBmst($id)
    {
     //$username = \Yii::$app->user->identity->username;
     $bareact = BareactMast::find()->where(['act_group_code'=>$id])->all();
     $result = Json::encode($bareact);
     return $result;

    }

    
    /**
     *Used for fetching other details based on bareact_code passed from bareact_mast table
     * ajax request 
     */
    public function actionBareactSection($id)
    {
        
         $bareact = BareactDetl::find()->select(['act_group_code','act_group_desc','act_catg_code','act_catg_desc','act_sub_catg_code','act_sub_catg_desc','sec_title'])->where(['bareact_code'=>$id])->andWhere(['!=', 'level', '0'])->orderBy('sno,level')->asArray()->all();
          $result = Json::encode($bareact);
          // return 'test';
          /* return $this->render('view1', [
            'model' => $bareact,
         ]);*/
     return $result;   
    }

    /**
    * create form with datalist option
    */
     public function actionCreateNew($doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentAct();
        $this->view->registerJsFile("/advanced_yii/frontend/web/flexdatalist/jquery.js",['depends' => 'yii\web\JqueryAsset']);
        $this->view->registerJsFile("/advanced_yii/frontend/web/flexdatalist/jquery.flexdatalist.js",['depends' => 'yii\web\JqueryAsset']);
        $this->view->registerJsFile("/advanced_yii/frontend/web/flexdatalist/jquery.flexdatalist.min.js",['depends' => 'yii\web\JqueryAsset']);
        $this->view->registerCssFile("/advanced_yii/frontend/web/flexdatalist/jquery.flexdatalist.min.css");
        if ($model->load(Yii::$app->request->post()) ) {
            $sec_title =  $_POST['JudgmentAct']['sec_title'];
            $explode_title = explode(",", $sec_title);
            
        $judgmentMast = JudgmentMast::find()->where(['doc_id'=>$doc_id])->one();
        foreach ($explode_title as  $value) {
            $model = new JudgmentAct();
            $model->j_doc_id = $doc_id;
            $model->username = $username;
            $model->judgment_title = $judgmentMast->judgment_title;
            $model->act_group_code = $_POST['JudgmentAct']['act_group_desc'];
            $model->act_group_desc = $model->bareactGroupMast->act_group_desc;
            $model->bareact_code = $_POST['JudgmentAct']['bareact_desc'];
            $model->bareact_desc = $model->bareactDesc->bareact_desc;
            $model->act_catg_desc = $_POST['JudgmentAct']['act_catg_desc'];
            $model->act_catg_code = $_POST['JudgmentAct']['act_catg_code'];
            $model->act_sub_catg_desc = $_POST['JudgmentAct']['act_sub_catg_desc'];
            $model->act_sub_catg_code = $_POST['JudgmentAct']['act_sub_catg_code'];
            $model->sec_title = $value; 
            $model->work_status = 'C';
            $model->save();
            }
            $model->save(false);
                
            Yii::$app->session->setFlash('success', "Created successfully!!");
                  $model->save(false);
            
         }             
         
        return $this->render('dependent_act', [
            'model' => $model,
        ]);

           
    }

    

    public function actionCreateNewbkup($doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentAct();
        $this->view->registerJsFile("/advanced_yii/frontend/web/flexdatalist/jquery.js",['depends' => 'yii\web\JqueryAsset']);
        $this->view->registerJsFile("/advanced_yii/frontend/web/flexdatalist/jquery.flexdatalist.js",['depends' => 'yii\web\JqueryAsset']);
        $this->view->registerJsFile("/advanced_yii/frontend/web/flexdatalist/jquery.flexdatalist.min.js",['depends' => 'yii\web\JqueryAsset']);
        $this->view->registerCssFile("/advanced_yii/frontend/web/flexdatalist/jquery.flexdatalist.min.css");
        //die;
         
        return $this->render('dependent_act', [
            'model' => $model,
        ]);

           
    }

    /**
    *Code for not availabale bareact_desc and sections
    * manual entry of barect_desc and section
    */
    public function actionAct($doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentAct();
        $modeljmast = JudgmentMast::find()->select('judgment_title')->where(['doc_id'=>$doc_id])->andWhere(['username'=>$username])->one();
        $j_title = $modeljmast->judgment_title;

        if ($model->load(Yii::$app->request->post()) ) {
            $count =  count($_POST['JudgmentAct']['sec_title']);
              for($i=0;$i<$count;$i++)
              {
                $model = new JudgmentAct();
                $model->j_doc_id = $doc_id;
                $model->username = $username;
                $model->judgment_title = $j_title;
                $model->bareact_desc = $_POST['JudgmentAct']['bareact_desc'][$i];
                $model->sec_title = $_POST['JudgmentAct']['sec_title'][$i];
                $model->save();
              }
             Yii::$app->session->setFlash('success', "Created successfully!!");
             return $this->redirect(['judgment-mast/success', 'doc_id'=>$doc_id]);
           }
                
        return $this->render('_form_new', [
            'model' => $model,
        ]);
           
    }



    /**
     * Updates an existing JudgmentAct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($doc_id="")
    {
        //$model = $this->findModel();
        //$model = new JudgmentAct();
        $username = \Yii::$app->user->identity->username;
        $model =  JudgmentAct::find()->where(['j_doc_id'=>$doc_id])->one();
        //$judgmentAct =$model->judgment_code;
        $adv = new JudgmentAct();
        if ($adv->load(Yii::$app->request->post())) {

            $count =  count($_POST['JudgmentAct']['sec_title']);
            for($i=0;$i<$count;$i++)
            {
            $model = new JudgmentAct();
            
             //$model->judgment_code = $jcode;
             $model->j_doc_id = $doc_id;
             $model->work_status = 'C';
             $model->username = $username;
             $model->bareact_code = $model->bareact_desc ;
             $model->sec_title = $_POST['JudgmentAct']['sec_title'][$i] ;
             $model->act_catg_desc = $_POST['JudgmentAct']['act_catg_desc'] ;
             $model->act_catg_code = $_POST['JudgmentAct']['act_catg_code'] ;
             $model->act_sub_catg_code = $_POST['JudgmentAct']['act_sub_catg_code'] ;
             $model->act_sub_catg_desc = $_POST['JudgmentAct']['act_sub_catg_desc'] ;
             $model->act_group_code = $_POST['JudgmentAct']['act_group_code'] ;
             $model->act_group_desc = $_POST['JudgmentAct']['act_group_desc'] ;
             $model->bareact_code = $_POST['JudgmentAct']['bareact_desc'] ;
             $model->bareact_desc = $model->bareactDesc->bareact_desc;
             
            $model->save(); 
            }
            return $this->redirect(['update', 'doc_id'=>$doc_id ]);
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     *No need
     */
    public function actionUpdateBKUP($jcode="",$doc_id="")
    {
        //$model = $this->findModel();
        $model = new JudgmentAct();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'jcode'=>$jcode, 'doc_id'=>$doc_id ]);
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JudgmentAct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
         
        $model = JudgmentAct::findOne($id);
        $doc_id = $model->j_doc_id;
        $model->delete();
        return $this->redirect(['update', 'doc_id'=>$doc_id ]);
       
    }


    public function actionAdvocate($id)
    {

     $state = JudgmentMast::find()->select(['respondant_adv','respondant_adv_count','appellant_adv','appellant_adv_count'])->where(['judgment_code'=>$id])->asArray()->one();
     
     $result = Json::encode($state);
     return $result;       
        //return $this->redirect(['index']);
    }

    



    /**
     * Finds the JudgmentAct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentAct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentAct::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
