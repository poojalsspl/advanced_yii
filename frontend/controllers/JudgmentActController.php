<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentAct;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentActSearch;
use frontend\models\BareactDetl;
use frontend\models\BareactMast;
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
     * Creates a new JudgmentAct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($jcode="",$doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentAct();

        if ($model->load(Yii::$app->request->post()) ) {
            $count =  count($_POST['JudgmentAct']['act_title']);
            for($i=0;$i<$count;$i++)
            {
            $model = new JudgmentAct();
            
             $model->judgment_code = $jcode;
             $model->j_doc_id = $doc_id;
             $model->username = $username;
             $model->bareact_code = $model->bareact_desc ;
             $model->act_title = $_POST['JudgmentAct']['act_title'][$i] ;
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


 
             /*\Yii::$app->db->createCommand()->batchInsert('judgment_act', ['judgment_code','j_doc_id','act_group_desc', 'act_catg_desc','act_title'], [
    [$jcode,$doc_id,'CENTRAL ACT','Defence law','Section 80(b) In The Army Act, 1950'],
    [$jcode,$doc_id,'CENTRAL ACT','Defence law','Section 20(1) In The Army Act, 1950']])->execute();*/
    
            $model->save(false);
       // }
   // }
            $check = JudgmentAct::find()->select('work_status')->where(['judgment_code'=>$jcode])->one();
             $count = $check->work_status;
              if($count==''){ 
                $date = date('Y-m-d');
                \Yii::$app->db->createCommand("UPDATE judgment_act SET work_status = 'C' WHERE judgment_code=".$jcode)->execute();  
                \Yii::$app->db->createCommand("UPDATE judgment_mast SET completion_date = '".$date."' WHERE judgment_code=".$jcode)->execute();                 
                
                 Yii::$app->session->setFlash('success', "Created successfully!!");
                  $model->save(false);
                
            return $this->redirect(['judgment-mast/success', 'jcode' => $jcode,'doc_id'=>$doc_id]);
                }
                
        }
         
        return $this->render('create', [
            'model' => $model,
        ]);
           
    }

    public function actionAct($jcode="",$doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentAct();

        if ($model->load(Yii::$app->request->post()) ) {
            $count =  count($_POST['JudgmentAct']['act_title']);
            for($i=0;$i<$count;$i++)
            {
            $model = new JudgmentAct();
            
             $model->judgment_code = $jcode;
             $model->j_doc_id = $doc_id;
             $model->username = $username;
             $model->act_title = $_POST['JudgmentAct']['act_title'][$i] ;
             $model->bareact_desc = $_POST['JudgmentAct']['bareact_desc'] ;
             $model->save(); 
            }
             $model->save(false);
    
            $check = JudgmentAct::find()->select('work_status')->where(['judgment_code'=>$jcode])->one();
             $count = $check->work_status;
              if($count==''){ 
                $date = date('Y-m-d');
                \Yii::$app->db->createCommand("UPDATE judgment_act SET work_status = 'C' WHERE judgment_code=".$jcode)->execute();  
                \Yii::$app->db->createCommand("UPDATE judgment_mast SET completion_date = '".$date."' WHERE judgment_code=".$jcode)->execute();                 
                
                 Yii::$app->session->setFlash('success', "Created successfully!!");
                  $model->save(false);
                
            return $this->redirect(['judgment-mast/success', 'jcode' => $jcode,'doc_id'=>$doc_id]);
                }
                
        }
         
        return $this->render('_form_new', [
            'model' => $model,
        ]);
           
    }

     public function actionCreate1($jcode="",$doc_id="")
    {
         //$user_id = Yii::$app->user->identity->id;
        $model = new JudgmentAct();
        $model->judgment_code = $jcode;
            $modelsBareact = [new BareactDetl];
            if ($model->load(Yii::$app->request->post())) {
            $modelsBareact = JudgmentAct::createMultiple(BareactDetl::classname());
            //print_r($modelsBareact);die;
            JudgmentAct::loadMultiple($modelsBareact, Yii::$app->request->post());

            /*if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsBareact),
                    ActiveForm::validate($model)
                );
            }
*/
             $valid = $model->validate();
                         if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsBareact as $modelBareact) {
                        //$modelBareact->invc_numb = $model->invc_numb;
                        $act_group_desc = $modelBareact->act_group_desc;
                        $act_catg_desc = $modelBareact->act_catg_desc;
                        $act_title = $modelBareact->act_title;
                        $doc_id = $modelBareact->doc_id;
                        
                       
                        

                        if (! ($flag = $modelBareact->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                   
 
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }

                  
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }



           // $model->save(false);
           // return $this->redirect(['view', 'id' => $model->id]);
        }else{

            return $this->render('create1', [
            'model' => $model,
            'modelsBareact' => (empty($modelsBareact)) ? [new BareactDetl] : $modelsBareact,
        ]);
            }
    }


     public function actionCreate2($jcode="",$doc_id="")
    {
        $model = new JudgmentAct();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->judgment_code = $jcode;
 
             \Yii::$app->db->createCommand()->batchInsert('judgment_act', ['judgment_code','j_doc_id','act_group_desc', 'act_catg_desc'], [
    [$jcode,$doc_id,'Public Utilities', 30],
    [$jcode,$doc_id,'Legal Ethics & justice( stamp  Act) ', 20],
    [$jcode,$doc_id,'Religion', 25]])->execute();
           // $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }else{

        return $this->render('create2', [
            'model' => $model,
        ]);
            }
    }


    public function actionCreateBkup($jcode="",$doc_id="")//19/08/2019 pooja
    {
        $model = new JudgmentAct();
        if ($model->load(Yii::$app->request->post()) ) {
            $model->judgment_code = $jcode;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }else{

        return $this->render('create', [
            'model' => $model,
        ]);
            }
    }



    /**
     * Updates an existing JudgmentAct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($jcode="",$doc_id="")
    {
        //$model = $this->findModel();
        //$model = new JudgmentAct();
        $username = \Yii::$app->user->identity->username;
        $model =  JudgmentAct::find()->where(['judgment_code'=>$jcode])->one();
        $judgmentAct =$model->judgment_code;
        $adv = new JudgmentAct();
        if ($adv->load(Yii::$app->request->post())) {

            $count =  count($_POST['JudgmentAct']['act_title']);
            for($i=0;$i<$count;$i++)
            {
            $model = new JudgmentAct();
            
             $model->judgment_code = $jcode;
             $model->j_doc_id = $doc_id;
             $model->username = $username;
             $model->bareact_code = $model->bareact_desc ;
             $model->act_title = $_POST['JudgmentAct']['act_title'][$i] ;
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
            return $this->redirect(['update', 'jcode'=>$jcode, 'doc_id'=>$doc_id ]);
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

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
        $jcode = $model->judgment_code;
        $doc_id = $model->j_doc_id;
        $model->delete();
        return $this->redirect(['update', 'jcode'=>$jcode, 'doc_id'=>$doc_id ]);
       
    }


    public function actionAdvocate($id)
    {

     $state = JudgmentMast::find()->select(['respondant_adv','respondant_adv_count','appellant_adv','appellant_adv_count'])->where(['judgment_code'=>$id])->asArray()->one();
     
     $result = Json::encode($state);
     return $result;       
        //return $this->redirect(['index']);
    }

    public function actionBareact($id)
    {
        
         $bareact = BareactDetl::find()->select(['act_group_code','act_group_desc','act_catg_code','act_catg_desc','act_sub_catg_code','act_sub_catg_desc','act_title'])->where(['bareact_code'=>$id])->orderBy('sno,level')->asArray()->all();
     $result = Json::encode($bareact);

     // return 'test';
     
     /* return $this->render('view1', [
            'model' => $bareact,
        ]);*/
     return $result;   
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
