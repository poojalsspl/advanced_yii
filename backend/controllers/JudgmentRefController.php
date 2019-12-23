<?php

namespace backend\controllers;

use Yii;
use backend\models\JudgmentRef;
use backend\models\JudgmentRefSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionCreate()
    {
        $model = new JudgmentRef();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JudgmentRef model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($jcode="",$doc_id="")
    {
        $model =  JudgmentRef::find()->where(['judgment_code'=>$jcode])->one(); 
        $modelUsername = $model->username;   
        if($model->load(Yii::$app->request->post())) {
            $count = count($_POST['JudgmentRef']['judgment_title_ref']);
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_ref', ['judgment_code' => $jcode])
            ->execute();
            for($i=0;$i<$count;$i++)
            {        
                $judgment  = new JudgmentRef();
                $judgment->judgment_code = $jcode;
                $judgment->doc_id = $doc_id;
                $judgment->username = $modelUsername;
                $judgment->judgment_title  =  $model->judgment_title;
                $judgment->exam_status  = $_POST['JudgmentRef']['exam_status'];
                $judgment->judgment_title_ref  = $_POST['JudgmentRef']['judgment_title_ref'][$i];                        
                $judgment->save(); 
            }
                 Yii::$app->session->setFlash('Updated successfully!!');
                 return $this->redirect(['judgment-act/create', 'jcode' => $jcode,'doc_id'=>$doc_id]);

            } 
            return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JudgmentRef model.
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
