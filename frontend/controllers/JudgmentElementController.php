<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentElement;
use frontend\models\JudgmentElementSearch;
use frontend\models\ElementMast;
use frontend\models\JudgmentMast;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\db\Query;

/**
 * JudgmentElementController implements the CRUD actions for JudgmentElement model.
 */
class JudgmentElementController extends Controller
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
     * Lists all JudgmentElement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentElementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentElement model.
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
     * Creates a new JudgmentElement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentElement();
        $modeljmast = JudgmentMast::find()->where(['doc_id'=>$doc_id])->andWhere(['username'=>$username])->one();
        $model->doc_id = $doc_id;
        $model->username = $username;
        
        if ($model->load(Yii::$app->request->post()) || $modeljmast->load(Yii::$app->request->post())) {
        	 $element_text = $_POST['JudgmentElement']['element_text'];
            $element = new ElementMast();
            $element_name =  $element->getElementName($model->element_code);
            $model->element_name = $element_name ;
            $model->work_status = 'C'; 
            $element_word = str_word_count($element_text);
            $model->element_word_length = $element_word;
            $model->save();
            if($model->save()){
                 if(!empty($_POST['JudgmentMast']['clestatus'])){
                $modeljmast->clestatus = 'C';
                $date = date('Y-m-d');
                $modeljmast->cledate = $date;
                $modeljmast->save();
                }else{
                $modeljmast->clestatus = NULL;
                $modeljmast->cledate = NULL;
                $modeljmast->save();
                }
          
             }
            return $this->redirect(['create',
                'doc_id' => $doc_id,
                'modeljmast' => $modeljmast,
            ]);
            
        }

        return $this->render('create', [
            'model' => $model,
            'modeljmast' => $modeljmast,
        ]);
    }

    public function actionCreatebkupworking($jcode="",$value="")
    {
        $username = \Yii::$app->user->identity->username;
        $model = new JudgmentElement();
        $model->judgment_code = $jcode;
        
        if ($model->load(Yii::$app->request->post())) {
            $element_text = $_POST['JudgmentElement']['element_text'];

            $element = new ElementMast();
            $element_code = $element->getElementCode($model->element_name);
            $model->element_code = $element_code ;

            $element_word = str_word_count($element_text);
            $model->element_word_length = $element_word;
            $model->username = $username;
            //return $this->redirect(['view', 'id' => $model->id]);

            $model->save();
            return $this->redirect(['create','jcode'=>$jcode, 'value' => $model->element_name]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }




    /**
     * Updates an existing JudgmentElement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$doc_id)
    {
        $username = \Yii::$app->user->identity->username;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $element_text = $_POST['JudgmentElement']['element_text'];

            $element = new ElementMast();
            $element_name =  $element->getElementName($model->element_code);
            $model->element_name = $element_name ;   

            $element_word = str_word_count($element_text);
            $model->element_word_length = $element_word;
            $model->username = $username;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JudgmentElement model.
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

    public function actionElement($id)
    {
        $element = ElementMast::find()->select(['element_desc'])->where(['element_code'=>$id])->asArray()->all();
     $result = Json::encode($element);

     return $result;   
    }


    /**
     * Finds the JudgmentElement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentElement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentElement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
