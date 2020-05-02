<?php

namespace backend\controllers;
use Yii;
use backend\models\SyllabusDetail; 
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;


class SyllabusDetailController extends Controller
{
    public function actionCreate()
    {
        $model = new SyllabusDetail();
        

        if ($model->load(Yii::$app->request->post())) {
            $model->syllabus_catg_name = $model->syllabusName->syllabus_catg_name;
            $model->course_name = $model->courseName->course_name;
            $model->save(); 
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
    	$model = SyllabusDetail::find()->all();
        
        return $this->render('index',
    ['model'=>$model]
    );
    }

}
