<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentParties;
use frontend\models\JudgmentPartiesSearch;
use frontend\models\JudgmentMast;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * JudgmentPartiesController implements the CRUD actions for JudgmentParties model.
 */
class JudgmentPartiesController extends Controller
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
     * Lists all JudgmentParties models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentPartiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentParties model.
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
     * Creates a new JudgmentParties model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentParties();

        if ($model->load(Yii::$app->request->post())) {

            $count =  count($_POST['JudgmentParties']['party_flag']);
            //$judgmentParties = $jcode;
            //$judgment_code = $jcode;
            for($i=0;$i<$count;$i++)
            {
            $model = new JudgmentParties();
            if($_POST['JudgmentParties']['party_name'][$i] !='')
            {
            //$model->judgment_code  = $judgmentParties;
            $model->doc_id  = $doc_id;
            $model->username  = $username;
            $model->party_flag = $_POST['JudgmentParties']['party_flag'][$i];
            $model->party_name = $_POST['JudgmentParties']['party_name'][$i]; 
            $model->appeal_numb = $_POST['JudgmentParties']['appeal_numb'][$i];           
            $model->save(); 
            }
            } 

            $check = JudgmentParties::find()->select('work_status')->where(['doc_id'=>$doc_id])->one();
             $count = $check->work_status;
             if($count==''){ 
                \Yii::$app->db->createCommand("UPDATE judgment_parties SET work_status = 'C' WHERE doc_id=".$doc_id." ")->execute();                
                 Yii::$app->session->setFlash('success', "Created successfully!!");
                 $model->save();
            return $this->redirect(['judgment-ref/create', 'doc_id'=>$doc_id]);
                }
           }
        
            return $this->render('create', [
                'model' => $model,
            ]);
       
      }

    /**
     * Updates an existing JudgmentParties model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($doc_id="")
    {
        /*Yii::$app->session->setFlash('error', 'After succssfully submission of form once, you are not authorize to access this form again!');
         return $this->render('message');*/
        $username = \Yii::$app->user->identity->username;
        $model =  JudgmentParties::find()->where(['doc_id'=>$doc_id])->one();
       // $judgmentParties =$model->judgment_code;  
        $adv = new JudgmentParties();
         if ($model->load(Yii::$app->request->post())) {
            $count =  count($_POST['JudgmentParties']['party_flag']);
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_parties', ['doc_id' => $doc_id])
            ->execute(); 
            for($i=0;$i<$count;$i++)
            {
            if($_POST['JudgmentParties']['party_name'][$i] !='')
            {  
            $parties = new JudgmentParties();
            $parties->doc_id = $doc_id;
            $parties->username = $username;
            $parties->party_flag = $_POST['JudgmentParties']['party_flag'][$i];
            $parties->party_name = $_POST['JudgmentParties']['party_name'][$i];
            $parties->appeal_numb = $_POST['JudgmentParties']['appeal_numb'][$i];
           // print_r($parties);die;
            $parties->save();
             }
            }
             if($doc_id!=""){ 

             Yii::$app->getSession()->setFlash('success',' Updated Successfully'); 
             $this->redirect(['update', 'doc_id'=>$doc_id ]);
        }
       }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JudgmentParties model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionParty($id)
    {
     $state = JudgmentMast::find()->select(['respondant_name','appellant_name'])->where(['judgment_code'=>$id])->asArray()->one();
     $result = Json::encode($state);
     return $result;       
        //return $this->redirect(['index']);
    }

    /**
     * Finds the JudgmentParties model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentParties the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentParties::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
