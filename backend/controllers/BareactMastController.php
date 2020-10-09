<?php

namespace backend\controllers;

use Yii;
use backend\models\BareactMast;
use backend\models\BareactMastSearch;
use frontend\models\BareactDetl;
use frontend\models\BareactSubcatgMast;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BareactMastController implements the CRUD actions for BareactMast model.
 */
class BareactMastController extends Controller
{
    /**
     * @inheritdoc
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
     * @param integer $id
     * @return mixed
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
        $qry = Yii::$app->db->createCommand("SELECT max(CAST(bareact_code AS SIGNED)) + 1 FROM bareact_mast");
        $maxbareact = $qry->queryScalar();

        $modeldetl = new BareactDetl();
        $maxdetl = BareactDetl::find()->max('id');
        
        if($model->load(Yii::$app->request->post())) {
            if(isset($_POST['BareactMast'], $_POST['BareactDetl'])){
            $model->bareact_code = $maxbareact;
            $model->act_group_desc = $model->bareactGrp->act_group_desc;
            $model->act_catg_desc = $model->bareactCatg->act_catg_desc;
            $model->act_sub_catg_code =  $model->act_sub_catg_desc;
            $model->act_sub_catg_desc = $model->bareactSubCatg->act_sub_catg_desc;
            $model->save(false);
            if($model->save()){ 
            $modeldetl->body = $_POST['BareactDetl']['body'];
            $modeldetl->id = $maxdetl+1;
            $modeldetl->bareact_code = $model->bareact_code;
            $modeldetl->bareact_desc = $model->bareact_desc;
            $modeldetl->act_group_code = $model->act_group_code;
            $modeldetl->act_group_desc = $model->bareactGrp->act_group_desc;
            $modeldetl->act_catg_code = $model->act_catg_code;
            $modeldetl->act_catg_desc = $model->bareactCatg->act_catg_desc;
            $modeldetl->act_sub_catg_code = $model->act_sub_catg_code;
            $modeldetl->act_sub_catg_desc = $model->bareactSubCatg->act_sub_catg_desc;
            $modeldetl->save(false);
           }
            //print_r($model);die;
            return $this->redirect(['view', 'id' => $model->bareact_code]);
        } 
        } 
            
            return $this->render('create', [
                'model' => $model,
                'modeldetl' => $modeldetl,
            ]);
        
    }

    

    /**
     * Updates an existing BareactMast model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modeldetl = BareactDetl::find()->where(['bareact_code'=>$id])->andWhere(['level'=>0])->one();
        
        if ($model->load(Yii::$app->request->post())) {
            if ($modeldetl->load(Yii::$app->request->post())) {
            $model->act_group_desc = $model->bareactGrp->act_group_desc;
            $model->act_catg_desc = $model->bareactCatg->act_catg_desc;
            $model->act_sub_catg_code =  $model->act_sub_catg_desc;
            $model->act_sub_catg_desc = $model->bareactSubCatg->act_sub_catg_desc;
            $model->save(false);
            if($model->save()){
            $modeldetl->body = $_POST['BareactDetl']['body'];
            $modeldetl->bareact_code = $model->bareact_code;
            $modeldetl->bareact_desc = $model->bareact_desc;
            $modeldetl->act_group_code = $model->act_group_code;
            $modeldetl->act_group_desc = $model->bareactGrp->act_group_desc;
            $modeldetl->act_catg_code = $model->act_catg_code;
            $modeldetl->act_catg_desc = $model->bareactCatg->act_catg_desc;
            $modeldetl->act_sub_catg_code = $model->act_sub_catg_code;
            $modeldetl->act_sub_catg_desc = $model->bareactSubCatg->act_sub_catg_desc;
            $modeldetl->save(false);
            }
            return $this->redirect(['view', 'id' => $model->bareact_code]);
         }  
        } 
            return $this->render('update', [
                'model' => $model,
                'modeldetl' => $modeldetl,
            ]);
       
    }

    /**
     * Deletes an existing BareactMast model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BareactMast model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BareactMast the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BareactMast::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
