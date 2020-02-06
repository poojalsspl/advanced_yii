<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Student;
use frontend\models\JudgmentMast;

?>

<div class="judgment-mast-index">

    <h1></h1>
   
    <h1><?php echo 'Abstract Writing for the judgments ' ?></h1>

<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'judgment_title',
            'court_name',
            [
             'attribute'=>'judgment_abstract',
             'value'=>'truncatedAbstract',//show limited characters
            ],
            
            

           ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
            'template' => '{Edit}', 
            'buttons' => [
                
               'Edit' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['judgment-abstract', 'id'=>$model->judgment_code]);
            },
             
                'format' => 'raw',

              ],
                 'contentOptions' => [ "class"=>'action-btns', 'width'=>''],
        ],


        ],
    ]); ?>
<?php Pjax::end(); ?></div>

