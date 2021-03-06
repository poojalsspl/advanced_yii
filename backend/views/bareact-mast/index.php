<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BareactMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bareact Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bareact-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bareact Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
             'attribute'=>'bareact_desc',
             'value'=>'truncatedBareact',  
            ],
            'act_catg_desc',
            'act_sub_catg_desc',
           

           ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
            'template' => '{View}{Edit}', 
            'buttons' => [
                
               'View' => function ($url, $model, $key) {
                
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id'=>$model->bareact_code]);
            
            },
            'Edit' => function ($url, $model, $key) {
                
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id'=>$model->bareact_code]);
            
            },
             
                'format' => 'raw',

              ],
                 'contentOptions' => [ "class"=>'action-btns', 'width'=>''],
        ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
