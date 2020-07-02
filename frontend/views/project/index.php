<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <a href="/advanced_yii/site/dashboard" class="btn btn-primary"><i class="fa fa-arrow-left"> &nbsp;Back to Dashboard</i></a>

    <h1><?= Html::encode($this->title) ?></h1>

   <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'username',
            'project_title',
            //'pabstract',
             [
             'attribute'=>'pabstract',
             'value'=>'truncatedAbstract',//show limited characters
            ],
            //'judges',
            //'advocates',
            //'acts',
            //'citation',
            //'refrence',
            //'preceeding',
            //'disposition',
            //'bench',
            //'jurisdiction',
            //'searchtag',
            //'jcategory',
            //'jsubcategory',
            //'jlength',
            //'bibliography',
            //'overruled',
            //'completion_date',
            'start_date',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
            'template' => '{Edit}', 
            'buttons' => [
               'Edit' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id'=>$model->id]);
            },
             'format' => 'raw',
            ],
                 'contentOptions' => [ "class"=>'action-btns', 'width'=>''],
        ],
        ],
    ]); ?>


</div>
