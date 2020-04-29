<?php

namespace backend\controllers;

use Yii;
use backend\models\CollegeMast;
use backend\models\CollegeMastSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * CollegeMastController implements the CRUD actions for CollegeMast model.
 */
class CollegeMastController extends Controller
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
     * Lists all CollegeMast models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CollegeMastSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CollegeMast model.
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
     * Creates a new CollegeMast model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CollegeMast();
         if (Yii::$app->request->post()) {
            $model->load(\Yii::$app->request->post());
        /*code for img*/
            $url = 'images/college_logo/';
            if (!file_exists($url)) 
            {
               FileHelper::createDirectory($url);
            }
            if(isset($_POST['CollegeMast']['college_logo'])){
            $college_logo = mt_rand(10000, 99999);
            $model->college_logo = UploadedFile::getInstance($model, 'college_logo');
            $model->college_logo->saveAs('images/college_logo/'.$college_logo.'.'.$model->college_logo->extension);//college_logo will save in images/college_logo/
            $model->college_logo = $college_logo.'.'.$model->college_logo->extension;// save in database with  file name.extension
             /*code for img*/
         }
          $model->univ_name = $model->univName->univ_name; 
          $model->country_name = $model->countryName->country_name;
          $model->state_name = $model->stateName->state_name;
          $model->city_name = $model->cityName->city_name;
             if ($model->save()) {
        
            return $this->redirect(['view', 'id' => $model->college_code]);
        }
      }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CollegeMast model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->college_code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CollegeMast model.
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
     * Finds the CollegeMast model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CollegeMast the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CollegeMast::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
