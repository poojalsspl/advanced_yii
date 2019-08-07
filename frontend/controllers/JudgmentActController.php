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
    public function actionCreate($jcount="",$jyear="",$jcode="",$doc_id="")
    {
        $model = new JudgmentAct();
        $cache = Yii::$app->cache;
        $cache->set('judgment_code', $jcode);
        $check = JudgmentMast::find()->select('jcount,jyear,judgment_code,doc_id')->where(['!=','jcount','completed'])->andWhere(['jyear'=>$jyear])->one();
         if(!empty($check))
            {
                $count = $check->jcount;
                $year = $check->jyear;
            }   

        if ($model->load(Yii::$app->request->post()) ) {
            $model->judgment_code = $jcode;
            $model->save(false);
            if($jyear!="" && $jcount!=""){ 
                Yii::$app->db->createCommand("UPDATE judgment_mast SET jcount=2 WHERE judgment_code=".$jcode."")->execute();
                Yii::$app->session->setFlash('Created successfully!!'); 
                return $this->redirect(['judgment-advocate/create', 'jcount' => 2,'jyear'=>$year,'jcode'=>$jcode ]);
            }
            else{
                return $this->redirect(['judgment-mast/judgmentupdate', 'code'=>$jcode ]);                    
                } 

            //return $this->redirect(['view', 'id' => $model->id]);
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
