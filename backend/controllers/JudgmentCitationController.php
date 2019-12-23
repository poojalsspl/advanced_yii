<?php

namespace backend\controllers;

use Yii;
use backend\models\JudgmentCitation;
use backend\models\JudgmentCitationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * Creates a new JudgmentCitation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JudgmentCitation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JudgmentCitation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($jcode="",$doc_id="")
    {
        $model =  JudgmentCitation::find()->where(['judgment_code'=>$jcode])->one(); 
        $modelUsername = $model->username;   
        if($model->load(Yii::$app->request->post())) {
            $count = count($_POST['JudgmentCitation']['citation']);
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_citation', ['judgment_code' => $jcode])
            ->execute();
            for($i=0;$i<$count;$i++)
            {        
                $judgment  = new JudgmentCitation();
                $judgment->judgment_code = $jcode;
                $judgment->doc_id = $doc_id;
                $judgment->username = $modelUsername;
                $judgment->exam_status = $_POST['JudgmentCitation']['exam_status'];
                $judgment->citation = $_POST['JudgmentCitation']['citation'][$i];                        
                $judgment->save(); 
            }
                 Yii::$app->session->setFlash('Updated successfully!!');
                  return $this->redirect(['judgment-parties/update', 'jcode' => $jcode,'doc_id'=>$doc_id]);

            }

        return $this->render('update', [
            'model' => $model,
        ]);
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
