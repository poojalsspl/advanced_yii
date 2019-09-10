<?php
namespace frontend\controllers;
 
use Yii;
use app\models\CourseMast;
use yii\web\Controller;
 
/**
 * manual CRUD
 **/
class CourseMastController extends Controller
{  
    /**
     * Create
     */
    public function actionCreate()
    {
        $model = new CourseMast();
 
        // new record
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }
                 
        return $this->render('create', ['model' => $model]);
    }

     public function actionIndex()
    {
        $coursemast = CourseMast::find()->all();
         
        return $this->render('index', ['model' => $coursemast]);
    }

    public function actionEdit($course_code)
    {
        $model = CourseMast::find()->where(['course_code' => $course_code])->one();
 
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
         
        // update record
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }
         
        return $this->render('edit', ['model' => $model]);
    } 

    public function actionDelete($course_code)
     {
         $model = CourseMast::findOne($course_code);
         
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
             
        // delete record
        $model->delete();
         
        return $this->redirect(['index']);
     }  
}