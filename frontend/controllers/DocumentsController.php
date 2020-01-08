<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Documents;
use frontend\models\DocumentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * DocumentsController implements the CRUD actions for Documents model.
 */
class DocumentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::classname(),
                'only'=>['create', 'update', 'delete'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ],
                ]
             ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'delete' => ['POST'],
            //     ],
            // ],
        ];
    }

    /**
     * Lists all Documents models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new DocumentsSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        $id = Yii::$app->user->id;

        $query = Documents::find()->where(['user_id'=>$id]);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $documents = $query->orderBy('id DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'documents' => $documents,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Documents model.
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
     * Creates a new Documents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Documents();

        if ($model->load(Yii::$app->request->post())) 
        {
            $model->user_id = Yii::$app->user->id;

            $url = 'uploads/';
            $start_date = date('Y');
            $end_date = date('Y')+1;
            $path = $start_date.'-'.$end_date;
            $tot = $url.$path;
            if (!file_exists($tot)) 
            {
               FileHelper::createDirectory($tot);
            }
            
            $xth = mt_rand(10000, 99999);
            $xiith = mt_rand(100000, 999999);
            $id_proof = mt_rand(1000000, 9999999);
            $model->x_th = UploadedFile::getInstance($model, 'x_th');
            $model->xii_th = UploadedFile::getInstance($model, 'xii_th');
            $model->id_proof = UploadedFile::getInstance($model, 'id_proof');

            $model->x_th->saveAs('uploads/'.$path.'/'.$xth.'.'.$model->x_th->extension );
            $model->xii_th->saveAs('uploads/'.$path.'/'.$xiith.'.'.$model->xii_th->extension );
            $model->id_proof->saveAs('uploads/'.$path.'/'.$id_proof.'.'.$model->id_proof->extension );

            $model->x_th = $path.'/'.$xth.'.'.$model->x_th->extension;
            $model->xii_th = $path.'/'.$xiith.'.'.$model->xii_th->extension;
            $model->id_proof = $path.'/'.$id_proof.'.'.$model->id_proof->extension;

            //$model->date_time = new Expression('NOW()');
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Documents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {   
        $model = Documents::find()->where(['id' => $id])->one();
        // or we can use => $model = Documents::findOne($id);

        if ($model->load(Yii::$app->request->post())) 
        {
            $url = 'uploads/';
            $start_date = date('Y');
            $end_date = date('Y')+1;
            $path = $start_date.'-'.$end_date;
            $tot = $url.$path;
            if (!file_exists($tot)) 
            {
               FileHelper::createDirectory($tot);
            }

            $xth = mt_rand(10000, 99999);
            $xiith = mt_rand(100000, 999999);
            $id_proof = mt_rand(1000000, 9999999);
            $model->x_th = UploadedFile::getInstance($model, 'x_th');
            $model->xii_th = UploadedFile::getInstance($model, 'xii_th');
            $model->id_proof = UploadedFile::getInstance($model, 'id_proof');

            $model->x_th->saveAs('uploads/'.$path.'/'.$xth.'.'.$model->x_th->extension );
            $model->xii_th->saveAs('uploads/'.$path.'/'.$xiith.'.'.$model->xii_th->extension );
            $model->id_proof->saveAs('uploads/'.$path.'/'.$id_proof.'.'.$model->id_proof->extension );

            $model->x_th = $path.'/'.$xth.'.'.$model->x_th->extension;
            $model->xii_th = $path.'/'.$xiith.'.'.$model->xii_th->extension;
            $model->id_proof = $path.'/'.$id_proof.'.'.$model->id_proof->extension;

            //$model->date_time = new Expression('NOW()');
            $data = Documents::findOne($id);
            unlink(Yii::$app->basePath . '/web/uploads/' . $data->x_th);
            unlink(Yii::$app->basePath . '/web/uploads/' . $data->xii_th);
            unlink(Yii::$app->basePath . '/web/uploads/' . $data->id_proof);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing Documents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $data = Documents::findOne($id);
        unlink(Yii::$app->basePath . '/web/uploads/' . $data->x_th);
        unlink(Yii::$app->basePath . '/web/uploads/' . $data->xii_th);
        unlink(Yii::$app->basePath . '/web/uploads/' . $data->id_proof);
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionPdf_xth($id) 
    {
        $model = Documents::findOne($id);
        $completePath = Yii::getAlias('@app').'/web/uploads/'.$model->x_th;
        if(!empty($completePath))
        {
            return Yii::$app->response->sendFile($completePath, $model->x_th, ['inline'=>true]);
        }else
        {
            ?> 
            <script>
                alert("Record not found");
            </script>
            <?php
        }
        
    }

    public function actionPdf_xiith($id) 
    {
        $model = Documents::findOne($id);

        $completePath = Yii::getAlias('@web').'uploads/'.$model->xii_th;
        if(!empty($completePath))
        {
            return Yii::$app->response->sendFile($completePath, $model->xii_th, ['inline'=>true]);
        }else
        {
            ?> 
            <script>
                alert("Record not found");
            </script>
            <?php
        }
        
    }

    public function actionPdf_idproof($id) 
    {
        $model = Documents::findOne($id);

        $completePath = Yii::getAlias('@web').'uploads/'.$model->id_proof;
        if(!empty($completePath))
        {
            return Yii::$app->response->sendFile($completePath, $model->id_proof, ['inline'=>true]);
         }else
        {
           ?> 
            <script>
                alert("Record not found");
            </script>
            <?php 
        }
        
    }
    /**
     * Finds the Documents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Documents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
