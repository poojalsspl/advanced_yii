<?php

namespace backend\controllers;

use Yii;
use backend\models\SyllabusCatgMast;
use backend\models\SyllabusCatgMastSearch;
use yii\web\Controller;


class SyllabusCatgMastController extends Controller
{
    /**
     * {@inheritdoc}
     */

       /**
     * Lists all SyllabusCatgMast models.
     * @return mixed
     */
    public function actionIndex()
    {
        $syllabus = SyllabusCatgMast::find()->all();
        

        return $this->render('index', [
            'syllabus' => $syllabus,
            
        ]);
    }

    /**
     * Creates a new ArticleCatgMast model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SyllabusCatgMast();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing SyllabusCatgMast model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = SyllabusCatgMast::find()->where(['syllabus_catg_code' => $id])->one();

        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
         
        // update record
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SyllabusCatgMast model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       $model = SyllabusCatgMast::findOne($id);
         
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
             
        // delete record
        $model->delete();
         
        return $this->redirect(['index']);
    }

   
    protected function findModel($id)
    {
        if (($model = SyllabusCatgMast::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
