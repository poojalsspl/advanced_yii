<?php

namespace frontend\controllers;

use Yii;
use frontend\models\WebArticles;
use frontend\models\WebArticlesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Student;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * WebArticlesController implements the CRUD actions for WebArticles model.
 */
class WebArticlesController extends Controller
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
     * Lists all WebArticles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WebArticlesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WebArticles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = WebArticles::find()->where(['id' => $id])->andWhere(['status'=>1])->one();
        $sef_desc = $model->sef_description;
        $sef_title = $model->sef_title;
        \Yii::$app->view->registerMetaTag([
        'name' => $sef_title,
        'content' => $sef_desc
        ]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new WebArticles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WebArticles();
        $username = Yii::$app->user->identity->username;
        $model->art_date = date('Y-m-d');
        $model->username = $username;
        $author  =  Student::find()->where(['email'=>$username])->one();

        if (Yii::$app->request->post()) {
            $model->load(\Yii::$app->request->post());
            /*code for img*/
            $url = 'images/article_images/';

            if (!file_exists($url)) 
            {
               FileHelper::createDirectory($url);
            }
            if(isset($_POST['WebArticles']['abstract_image'])){
            $abstract_image = mt_rand(10000, 99999);
            $model->abstract_image = UploadedFile::getInstance($model, 'abstract_image');
            $model->abstract_image->saveAs('images/article_images/'.$abstract_image.'.'.$model->abstract_image->extension);
            $model->abstract_image = $abstract_image.'.'.$model->abstract_image->extension;
            }

             if(isset($_POST['WebArticles']['slider_image'])){
             $slider_image = mt_rand(10000, 99999);
            $model->slider_image = UploadedFile::getInstance($model, 'slider_image');
            $model->slider_image->saveAs('images/article_images/'.$slider_image.'.'.$model->slider_image->extension);
            $model->slider_image = $slider_image.'.'.$model->slider_image->extension;
            } 

             $model->author = $author->student_name;
             if ($model->save()) {
                Yii::$app->session->setFlash('success', "Article Created."); 
                  return $this->redirect(['view', 'id' => $model->id]);

              } else {
                  Yii::$app->session->setFlash('error', "Article not saved.");
              }

           
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WebArticles model.
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
     * Deletes an existing WebArticles model.
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
     * Finds the WebArticles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WebArticles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WebArticles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
