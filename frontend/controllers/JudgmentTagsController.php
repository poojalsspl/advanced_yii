<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentTags;
use frontend\models\JudgmentTagsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\JudgmentMast;

/**
 * JudgmentTagsController implements the CRUD actions for JudgmentTags model.
 */
class JudgmentTagsController extends Controller
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
     * Lists all JudgmentTags models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentTagsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentTags model.
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
     * Creates a new JudgmentTags model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * created for multiple values.
     * @return mixed
     */
    public function actionCreate($doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentTags();
        $modeljmast = JudgmentMast::find()->where(['doc_id'=>$doc_id])->andWhere(['username'=>$username])->one();
        
        if ($model->load(Yii::$app->request->post())) {
             $count =  count($_POST['JudgmentTags']['tag_name']);
             for($i=0;$i<$count;$i++)
                {
                    $model = new JudgmentTags();
                    $model->doc_id = $doc_id;
                    $model->judgment_title = $modeljmast->judgment_title;
                    $model->tag_name = $_POST['JudgmentTags']['tag_name'][$i];
                    $model->tag_value = $_POST['JudgmentTags']['tag_value'][$i];
                    $model->save();
                }    
            //
            $date = date('Y-m-d');
            \Yii::$app->db->createCommand("UPDATE judgment_mast SET completion_date = '".$date."' WHERE doc_id=".$doc_id)->execute();
            Yii::$app->session->setFlash('success', "Created successfully!!");
            return $this->redirect(['judgment-mast/success', 'doc_id'=>$doc_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
     
     /**
     * Creates a new JudgmentTags model.
     * Original function.
     * It was created for single values.
     * @return mixed
     */
     public function actionCreatebkup()
    {
        $model = new JudgmentTags();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JudgmentTags model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * Multiple values updation.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($doc_id="")
    {
       $username = \Yii::$app->user->identity->username;
       $model =  JudgmentTags::find()->where(['doc_id'=>$doc_id])->one();
       $modeljmast = JudgmentMast::find()->where(['doc_id'=>$doc_id])->andWhere(['username'=>$username])->one();
       $judgmentTag =$model->doc_id;
       $tag = new JudgmentTags();
       if($tag->load(Yii::$app->request->post())) {
        \Yii::$app
        ->db
        ->createCommand()
        ->delete('judgment_tags', ['doc_id' => $doc_id])
        ->execute();
        $count =  count($_POST['JudgmentTags']['tag_name']);
        for($i=0;$i<$count;$i++)
         { 
         $jtags = new JudgmentTags();  
         $jtags->doc_id = $doc_id;
         $jtags->judgment_title = $modeljmast->judgment_title;
         $jtags->tag_name = $_POST['JudgmentTags']['tag_name'][$i];
         $jtags->tag_value = $_POST['JudgmentTags']['tag_value'][$i];
         $jtags->save();
         }
         if($doc_id!=""){ 
                Yii::$app->session->setFlash('success', "Updated successfully!!");
            return $this->redirect(['update', 'doc_id'=>$doc_id ]);
        }
        }
        else {

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    }

    /**
     * Updates an JudgmentTags model for single values only.
     * Original update function.
     * It will not work from browser as update file is also changed w.r.t multiple  values  
     */
    public function actionUpdatebkup($id)
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
     * Deletes an existing JudgmentTags model.
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
     * Finds the JudgmentTags model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentTags the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentTags::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
