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
$username;    
$student_name = ArrayHelper::map(Student::find()->where(['email'=>$username])->all(),'student_name','student_name');
foreach ($student_name as $student) {
  
   // echo $student;
}
//$this->title = 'List of judgments allocated to : '.$student;

?>
<?php //echo \Yii::$app->user->username ?>
<div class="judgment-mast-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <h1><?php echo 'List of judgments allocated to : ' ?><span style="color: #185886 ;"><?php echo $student;?></span></h1>
   <!--  <p>
        <?php// Html::a('Create Judgment Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Judgment Title</th>
                <th>Court Name</th>
                <th>Judgment Date</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($searchModel as $searchdata){?>
            <tr>
                <td><?php echo $searchdata['judgment_title'];?></td>
                <td><?php echo $searchdata['court_name'];?></td>
                <td><?php echo $searchdata['judgment_date'];?></td>
               
                <td><?php echo '<a href = "update?id='.$searchdata['judgment_code'].'"><span class="glyphicon glyphicon-pencil"></span></a>'; ?></td>
            </tr>
           <?php } ?>
           
        </tbody>
    </table>
 <?php //print_r($searchModel);?>
<?php /*Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'judgment_title',
            'court_name',
            'judgment_date',
            //'jyear',
            

           ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
            'template' => '{View}{Edit}', 
            'buttons' => [
                'View' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id'=>$model->judgment_code]);
                },
               'Edit' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id'=>$model->judgment_code]);
            },
             
                'format' => 'raw',

              ],
                 'contentOptions' => [ "class"=>'action-btns', 'width'=>''],
        ],


        ],
    ]);*/ ?>
<?php /*Pjax::end();*/ ?></div>

