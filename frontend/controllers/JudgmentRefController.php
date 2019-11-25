<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentRef;
use frontend\models\JudgmentRefSearch;
use frontend\models\JudgmentMast;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * JudgmentRefController implements the CRUD actions for JudgmentRef model.
 */
class JudgmentRefController extends Controller
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
     * Lists all JudgmentRef models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentRefSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentRef model.
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
     * Creates a new JudgmentRef model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($jcode="",$doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentRef;
        if ($model->load(Yii::$app->request->post())) {
            $count =  count($_POST['JudgmentRef']['judgment_title_ref']);
            $judgmentMastRef  =  JudgmentMast::find()->where(['judgment_code'=>$jcode])->one();
            for($i=0;$i<$count;$i++)
            {
                $model = new JudgmentRef();
                $model->judgment_code = $jcode;
                $model->doc_id = $doc_id;
                $model->username = $username;
                $model->judgment_title           =  $judgmentMastRef->judgment_title;
                $model->judgment_title_ref = $_POST['JudgmentRef']['judgment_title_ref'][$i];
                $model->save(false); 
            } 
            if($jcode!=""){ 
                \Yii::$app->db->createCommand("UPDATE judgment_mast SET status_1 = 6 WHERE judgment_code=".$jcode." and status_1 = 5")->execute();                
                
                 Yii::$app->session->setFlash('success', "Created successfully!!");
            return $this->redirect(['judgment-act/create', 'jcode' => $jcode,'doc_id'=>$doc_id]);
                }
                else{
                return $this->redirect(['create', 'jcode'=>$jcode, 'doc_id'=>$doc_id ]);                    
                }   
        }
        return $this->render('create', [
                'model' => $model,
            ]);
     
    }

        public function actionCreatebkup()
    {
        $model = new JudgmentRef();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

     public function actionUpdate($jcode="",$doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
      $model =  JudgmentRef::find()->where(['judgment_code'=>$jcode])->one();    
        if($model->load(Yii::$app->request->post())) {
            $count = count($_POST['JudgmentRef']['judgment_title_ref']);
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_title_ref', ['judgment_code' => $jcode])
            ->execute();
            for($i=0;$i<$count;$i++)
            {        
                $judgment                = new JudgmentRef();
                $judgment->judgment_code = $jcode;
                $judgment->doc_id = $doc_id;
                $judgment->username = $username;
                $model->judgment_title           =  $judgmentMastRef->judgment_title;
                $judgment->judgment_title_ref    = $_POST['JudgmentRef']['judgment_title_ref'][$i];                        
                $judgment->save(); 
            }
                 Yii::$app->session->setFlash('Updated successfully!!');
                 $this->redirect(['update', 'jcode'=>$jcode,'doc_id'=>$doc_id ]);

            } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }     
    }

    /**
     * Updates an existing JudgmentRef model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatebkup($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionAdddata($id,$jcode)
    {
      $username = \Yii::$app->user->identity->username;  
      $JudgmentRef      = new JudgmentRef();
      $JudgmentRefCheck = JudgmentRef::find()->where(['judgment_code'=>$jcode,'judgment_code_ref'=>$id])->count();
      //print_r($id);die;
      $judgmentMast     =  JudgmentMast::find()->where(['judgment_code'=>$id])->one();
      $judgmentMastRef  =  JudgmentMast::find()->where(['judgment_code'=>$jcode])->one();

      $action = Yii::$app->controller->action->id;
      if($JudgmentRefCheck>0){
        Yii::$app->getSession()->setFlash('danger','Already Exist'); 
        if($action=='create'){
                return $this->redirect(['judgment-ref/create','jcode'=>$jcode]);
         }
         else{
          return $this->redirect(['judgment-ref/update','jcode'=>$jcode]);  
         }
      }
     $judgment_code                         =  $judgmentMast->judgment_code;
     $JudgmentRef->judgment_code            =  $jcode;
     $JudgmentRef->judgment_title           =  $judgmentMastRef->judgment_title;
     $JudgmentRef->doc_id                   =  $judgmentMastRef->doc_id;
     $JudgmentRef->judgment_code_ref        =  $judgmentMast->judgment_code;
     $JudgmentRef->doc_id_ref               =  $judgmentMast->doc_id;
     $JudgmentRef->judgment_title_ref       =  $judgmentMast->judgment_title;
     $JudgmentRef->username                 =  $username;
     $JudgmentRef->save(false);
     Yii::$app->getSession()->setFlash('success','Created sucessfully');
             if($action=='create'){
                return $this->redirect(['judgment-ref/create','jcode'=>$jcode]);
         }
         else{
          return $this->redirect(['judgment-ref/update','jcode'=>$jcode]);  
         }
    }

    /**
     * Deletes an existing JudgmentRef model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    /* public function actionRef($id)
    {
     $state = JudgmentMast::find()->select(['citation','citation_count'])->where(['judgment_code'=>$id])->asArray()->one();
     $result = Json::encode($state);
     return $result;       
        //return $this->redirect(['index']);
    }*/

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JudgmentRef model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentRef the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentRef::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
