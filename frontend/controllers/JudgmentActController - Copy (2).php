<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentAct;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentActSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionAdvocate($id)
    {
     $state = JudgmentMast::find()->select(['respondant_adv','respondant_adv_count','appellant_adv','appellant_adv_count'])->where(['judgment_code'=>$id])->asArray()->one();
     $result = Json::encode($state);
     return $result;       
        //return $this->redirect(['index']);
    }

       public function actionBareactDetl($id){
        echo "hello";
      $sql="Select judgment_ref.court_code,judgment_ref.court_name,judgment_ref.judgment_title_ref,judgment_ref.judgment_title,judgment_ref.judgment_code 
            FROM judgment_ref
            where judgment_ref.doc_id = $docid";
        $command = Yii::$app->getDb()->createCommand($sql);
        return $records = $command->queryAll();
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
