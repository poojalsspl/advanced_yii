<?php

namespace backend\controllers;

use Yii;
use backend\models\JudgmentParties;
use backend\models\JudgmentPartiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionCreate()
    {
        $model = new JudgmentParties();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->judgment_party_id]);
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
    public function actionUpdate($jcode="",$doc_id="")
    {
        $model =  JudgmentParties::find()->where(['judgment_code'=>$jcode])->one();
        $judgmentAdvocate =$model->judgment_code;  
        $judgmentUsername =$model->username;  
        $adv = new JudgmentParties();
         if ($model->load(Yii::$app->request->post())) {
            $count =  count($_POST['JudgmentParties']['party_flag']);
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_parties', ['judgment_code' => $jcode])
            ->execute(); 
            for($i=0;$i<$count;$i++)
            {
            if($_POST['JudgmentParties']['party_name'][$i] !='')
            {  
            $parties = new JudgmentParties();
            $parties->judgment_code  = $judgmentAdvocate;
            $parties->doc_id = $doc_id;
            $parties->username = $judgmentUsername;
            $parties->exam_status = $_POST['JudgmentParties']['exam_status'];
            $parties->party_flag = $_POST['JudgmentParties']['party_flag'][$i];
            $parties->party_name = $_POST['JudgmentParties']['party_name'][$i];                        
            $parties->save();
             }
            }
            //Yii::$app->getSession()->setFlash('success',' Updated Successfully'); 
             $this->redirect(['judgment-ref/update', 'jcode'=>$jcode,'doc_id'=>$doc_id ]);

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
