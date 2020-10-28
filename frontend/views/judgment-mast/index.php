<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Student;

//use yii\grid\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudgmentMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$username = \Yii::$app->user->identity->username;
   
/*$student_name = ArrayHelper::map(Student::find()->where(['email'=>$username])->all(),'student_name','student_name');
foreach ($student_name as $student) {
  
   // echo $student;
}*/
//$this->title = 'List of judgments allocated to : '.$student;

?>
<?php //echo \Yii::$app->user->username ?>
<div class="judgment-mast-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <h1><?php echo 'List of judgments allocated for <b>Fixed Data Points</b>' ?></h1>


   
 <?php //print_r($searchModel);?>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'judgment_title',
            'court_name',
            'judgment_date',
            'start_date',
            'completion_date',
            [
            'label'=>'Custom Link',
            'format'=>'raw',
            'value' => function($data){
                $url = "http://www.bsourcecode.com";
                return Html::a('Complete', $url, ['title' => 'Go']); 
            }
           ],
            

           ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
            'template' => '{Edit}', 
            'buttons' => [
                
               'Edit' => function ($url, $model, $key) {
                 
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'doc_id'=>$model->doc_id]);
           
            },
             
                'format' => 'raw',

              ],
                 'contentOptions' => [ "class"=>'action-btns', 'width'=>''],
        ],


        ],
    ]); ?>
<?php Pjax::end(); ?></div>

