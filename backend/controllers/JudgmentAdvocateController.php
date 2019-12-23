<?php

namespace backend\controllers;

use Yii;
use backend\models\JudgmentAdvocate;
use backend\models\JudgmentAdvocateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JudgmentAdvocateController implements the CRUD actions for JudgmentAdvocate model.
 */
class JudgmentAdvocateController extends Controller
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
     * Lists all JudgmentAdvocate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentAdvocateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentAdvocate model.
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
     * Creates a new JudgmentAdvocate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JudgmentAdvocate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JudgmentAdvocate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($jcode="",$doc_id="")
    {
        $model =  JudgmentAdvocate::find()->where(['judgment_code'=>$jcode])->one();
         $judgmentAdvocate = $model->judgment_code;
         $judgmentUsername = $model->username;
         $adv = new JudgmentAdvocate();
         if($adv->load(Yii::$app->request->post())) {
          
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_advocate', ['judgment_code' => $jcode])
            ->execute();

            $count =  count($_POST['JudgmentAdvocate']['advocate_flag']);                
            for($i=0;$i<$count;$i++)
            {
            $advocate = new JudgmentAdvocate();
            $advocate->judgment_code  = $judgmentAdvocate;
            $advocate->doc_id = $doc_id;
            $advocate->username = $judgmentUsername;
            $advocate->exam_status = $_POST['JudgmentAdvocate']['exam_status'];
            $advocate->advocate_flag = $_POST['JudgmentAdvocate']['advocate_flag'][$i];
            $advocate->advocate_name = $_POST['JudgmentAdvocate']['advocate_name'][$i];
            $advocate->save(); 
            }
            return $this->redirect(['judgment-judge/update', 'jcode' => $jcode,'doc_id'=>$doc_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JudgmentAdvocate model.
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
     * Finds the JudgmentAdvocate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentAdvocate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentAdvocate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
