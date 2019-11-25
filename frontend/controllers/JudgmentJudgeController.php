<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentJudge;
use frontend\models\JudgmentJudgeSearch;
use frontend\models\JudgmentMast;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * JudgmentJudgeController implements the CRUD actions for JudgmentJudge model.
 */
class JudgmentJudgeController extends Controller
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
     * Lists all JudgmentJudge models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentJudgeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentJudge model.
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
     * Creates a new JudgmentJudge model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($jcode="",$doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentJudge();

        if ($model->load(Yii::$app->request->post())) {
            $count =  count($_POST['JudgmentJudge']['judge_name']);
            for($i=0;$i<$count;$i++)
            {
                $model = new JudgmentJudge();
                $model->judgment_code = $jcode;
                $model->doc_id = $doc_id;
                $model->username = $username;
                $model->judge_name = $_POST['JudgmentJudge']['judge_name'][$i];
                $model->save(false); 
            } 
            if($jcode!=""){ 
                \Yii::$app->db->createCommand("UPDATE judgment_mast SET status_1 = 3 WHERE judgment_code=".$jcode." and status_1 = 2")->execute();                
               Yii::$app->session->setFlash('success', "Created successfully!!");
            return $this->redirect(['judgment-citation/create', 'jcode' => $jcode,'doc_id'=>$doc_id]);
                }
                else{
                return $this->redirect(['create', 'jcode'=>$jcode, 'doc_id'=>$doc_id ]);                    
                } 
            
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JudgmentJudge model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($jcode="",$doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model =  JudgmentJudge::find()->where(['judgment_code'=>$jcode])->andWhere(['doc_id'=>$doc_id])->one();
        if($model->load(Yii::$app->request->post())) {
            $count = count($_POST['JudgmentJudge']['judge_name']);
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_judge', ['judgment_code' => $jcode])
            ->execute();
            for($i=0;$i<$count;$i++)
            {        
                $judgment                = new JudgmentJudge();
                $judgment->judgment_code = $jcode;
                $judgment->doc_id = $doc_id;
                $judgment->username = $username;
                $judgment->judge_name    = $_POST['JudgmentJudge']['judge_name'][$i];                        
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
     * Deletes an existing JudgmentJudge model.
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

       public function actionJudge($id)
    {
     $state = JudgmentMast::find()->select(['judges_name','judges_count'])->where(['judgment_code'=>$id])->asArray()->one();
     $result = Json::encode($state);
     return $result;       
        //return $this->redirect(['index']);
    }

    /**
     * Finds the JudgmentJudge model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentJudge the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentJudge::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
