<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentAdvocate;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentAdvocateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * JudgmentAdvocateController implements the CRUD actions for JudgmentAdvocate model.
 */
class JudgmentAdvocateController extends Controller
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
                      'view' => ['POST'],
                      'view' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all JudgmentAdvocate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentAdvocateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentAdvocate model.
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
     * Creates a new JudgmentAdvocate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($jcode="")
    {
        $model = new JudgmentAdvocate();


        if ($model->load(Yii::$app->request->post())) {
             $count =  count($_POST['JudgmentAdvocate']['advocate_flag']);
              for($i=0;$i<$count;$i++)
            {
            $model = new JudgmentAdvocate();
            $model->judgment_code = $jcode;
            $model->advocate_flag = $_POST['JudgmentAdvocate']['advocate_flag'][$i];
            $model->advocate_name = $_POST['JudgmentAdvocate']['advocate_name'][$i];
            // $judgment_code = $_POST['JudgmentAdvocate']['judgment_code']; 
            $model->save(); 
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatebkup()
    {
        $model = new JudgmentAdvocate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JudgmentAdvocate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($jcode)
    {
         $model =  JudgmentAdvocate::find()->where(['judgment_code'=>$jcode])->one();
         $judgmentAdvocate =$model->judgment_code;
         $adv = new JudgmentAdvocate();
         if($adv->load(Yii::$app->request->post())) {
          
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_advocate', ['judgment_code' => $jcode])
            ->execute();

            $count =  count($_POST['JudgmentAdvocate']['advocate_flag']);                
            for($i=0;$i<$count;$i++)
            {
          
            $advocate = new JudgmentAdvocate();
            $advocate->judgment_code  = $judgmentAdvocate;
            $advocate->advocate_flag = $_POST['JudgmentAdvocate']['advocate_flag'][$i];
            $advocate->advocate_name = $_POST['JudgmentAdvocate']['advocate_name'][$i];                        
            $advocate->save(); 
     
            }
          
        }
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
             }
    }         


    /**
     * Deletes an existing JudgmentAdvocate model.
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

    /**
     * Finds the JudgmentAdvocate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentAdvocate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentAdvocate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
