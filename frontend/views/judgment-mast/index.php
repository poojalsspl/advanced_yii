<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


//use yii\grid\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudgmentMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Judgments';
//$this->params['breadcrumbs'][] = $this->title;


?>

<div class="judgment-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

