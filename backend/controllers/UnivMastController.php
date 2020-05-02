<?php

namespace backend\controllers;

use Yii;
use backend\models\UnivMast;
use backend\models\UnivMastSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\StateMast;
use frontend\models\CityMast;
/**
 * UnivMastController implements the CRUD actions for UnivMast model.
 */
class UnivMastController extends Controller
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
     * Lists all UnivMast models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UnivMastSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UnivMast model.
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
    * for retrieving state list
    */
    public function actionSubcat() {
        $out = [];
        $statemodel = new StateMast();
        if (isset($_POST['depdrop_parents'])) {
            
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out =  $statemodel->getSubCatList($cat_id); 
                   return \yii\helpers\Json::encode(['output'=>$out, 'selected'=>'']);
        }
        }

         echo \yii\helpers\Json::encode(['output'=>'', 'selected'=>'']);

        }

     /**
     * for restrieving city list 
     */ 
       public function actionSubcity() {
          $out = [];
          $model = new CityMast();
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
          $cat_id = $parents[0];
          $out =  $model->getCityList($cat_id); 
           return \yii\helpers\Json::encode(['output'=>$out, 'selected'=>'']);
          }

         }

       echo \yii\helpers\Json::encode(['output'=>'', 'selected'=>'']);
       }


    /**
     * Creates a new UnivMast model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UnivMast();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->univ_code]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UnivMast model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->univ_code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UnivMast model.
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
     * Finds the UnivMast model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UnivMast the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UnivMast::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
