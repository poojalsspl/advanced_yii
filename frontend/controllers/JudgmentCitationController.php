<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentCitation;
use frontend\models\JudgmentCitationSearch;
use frontend\models\JudgmentMast;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
//use frontend\models\JournalMast;

/**
 * JudgmentCitationController implements the CRUD actions for JudgmentCitation model.
 */
class JudgmentCitationController extends Controller
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
     * Lists all JudgmentCitation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentCitationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentCitation model.
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
     * Creates a new Multiple JudgmentCitation.
     * @return mixed
     */
    public function actionCreate($doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        
        $model = new JudgmentCitation();
        $modeljmast = JudgmentMast::find()->where(['doc_id'=>$doc_id])->andWhere(['username'=>$username])->one();

        if ($model->load(Yii::$app->request->post())) {
            if(isset($_POST['JudgmentCitation'], $_POST['JudgmentMast'])){ 
        	$count =  count($_POST['JudgmentCitation']['citation']);
        	for($i=0;$i<$count;$i++)
            {
                $model = new JudgmentCitation();
                $model->doc_id = $doc_id;
                $model->username = $username;
                $model->citation = $_POST['JudgmentCitation']['citation'][$i];
                $model->save(false); 
                if($model->save()){
                $modeljmast->remark = $_POST['JudgmentMast']['remark'];
                $modeljmast->save();
                } 
            } 
        }

            $check = JudgmentCitation::find()->select('work_status')->where(['doc_id'=>$doc_id])->one();
             $count = $check->work_status;
           if($count==''){  
                \Yii::$app->db->createCommand("UPDATE judgment_citation SET work_status ='C' WHERE doc_id=".$doc_id." ")->execute();                
              Yii::$app->session->setFlash('success', "Created successfully!!"); 
              $model->save(false);
            return $this->redirect(['judgment-parties/create', 'doc_id'=>$doc_id]);
                }
                
          }
            
           return $this->render('create', [
                'model' => $model,
                'modeljmast' => $modeljmast,
            ]);
     }



    /**
     * Updates an existing Multiple JudgmentCitation.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($doc_id="")
    {
         /*Yii::$app->session->setFlash('error', 'After succssfully submission of form once, you are not authorize to access this form again!');
         return $this->render('message');*/
        $username = \Yii::$app->user->identity->username;
        
        $model =  JudgmentCitation::find()->where(['doc_id'=>$doc_id])->one();    
        if($model->load(Yii::$app->request->post())) {
            $count = count($_POST['JudgmentCitation']['citation']);
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_citation', ['doc_id' => $doc_id])
            ->execute();
            for($i=0;$i<$count;$i++)
            {        
                $judgment                = new JudgmentCitation();
                $judgment->doc_id = $doc_id;
                $judgment->username = $username;
                $judgment->work_status = 'C';
                $judgment->citation    = $_POST['JudgmentCitation']['citation'][$i];                        
                $judgment->save(); 
            }
                 Yii::$app->session->setFlash('Updated successfully!!');
                 $this->redirect(['update', 'doc_id'=>$doc_id ]);

            } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }     

     }

    /**
     * Deletes an existing JudgmentCitation model.
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

    public function actionJournal($id)
    {
       $journal = JournalMast::find()->select('shrt_name')->where(['journal_code'=>$id])->asArray()->one();
       $result = Json::encode($journal);
       return $result;       
        //return $this->redirect(['index']);
    }

     public function actionCitation($id)
    {
     $state = JudgmentMast::find()->select(['citation','citation_count'])->where(['judgment_code'=>$id])->asArray()->one();
     $result = Json::encode($state);
     return $result;       
        //return $this->redirect(['index']);
    }

    /**
     * Finds the JudgmentCitation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentCitation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentCitation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
