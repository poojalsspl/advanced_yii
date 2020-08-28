<?php

namespace frontend\controllers;

use Yii;
use frontend\models\BareactMast;
use frontend\models\BareactMastSearch;
use frontend\models\BareactSubcatgMast;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * BareactMastController implements the CRUD actions for BareactMast model.
 */
class BareactMastController extends Controller
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
     * Lists all BareactMast models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BareactMastSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BareactMast model.
     * @param string $id
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
     * Creates a new BareactMast model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BareactMast();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bareact_code]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BareactMast model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->act_catg_code = $model->act_catg_desc;
            $model->act_catg_desc = $model->bareactCatg->act_catg_desc;
            if($model->act_sub_catg_desc){
              $model->act_sub_catg_code = $model->act_sub_catg_desc; 
              $model->act_sub_catg_desc = $model->bareactSubCatg->act_sub_catg_desc; 
            }
            $model->save(false);
            //return $this->redirect(['view', 'id' => $model->bareact_code]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BareactMast model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BareactMast model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return BareactMast the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionBsubcatg($id)
    {
       $jsubCatg = BareactSubcatgMast::find()->select("act_sub_catg_code,act_sub_catg_desc")->where(['act_catg_code'=>$id])->asArray()->all();     
       $result = Json::encode($jsubCatg);
       return $result;          
    }

    protected function findModel($id)
    {
        if (($model = BareactMast::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
