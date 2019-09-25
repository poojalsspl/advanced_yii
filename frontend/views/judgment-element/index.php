<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentElementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Elements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-element-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Element', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judgment_code',
            'element_code',
            'element_name',
            'element_text:ntext',
            //'weight_perc',
            //'element_word_length',

            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
            'template' => '{View}{Edit}', 
            'buttons' => [
                'View' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id'=>$model->id]);
                },
               'Edit' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id'=>$model->id,'value'=>$model->element_name]);
            },
             
                'format' => 'raw',

              ],
                 'contentOptions' => [ "class"=>'action-btns', 'width'=>''],
        ],
        ],
    ]); ?>


</div>