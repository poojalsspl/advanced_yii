<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BareactMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bare-act Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bareact-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'doc_id',
           // 'bareact_code',
            //'bareact_desc',
            [
             'attribute'=>'bareact_desc',
             'value'=>'truncatedBareact',  
            ],
            //'act_group_code',
            //'act_group_desc',
            //'act_catg_code',
            'act_catg_desc',
            
            //'act_status',
            //'enact_date',
            //'ref_doc_id',
            //'act_sub_catg_code',
            'act_sub_catg_desc',
            //'tot_section',
            //'tot_chap',
            //'country_code',
            //'country_name',
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
            'template' => '{Edit}', 
            'buttons' => [
                
               'Edit' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id'=>$model->bareact_code]);
           },
               'format' => 'raw',

              ],
                 'contentOptions' => [ "class"=>'action-btns', 'width'=>''],
        ],
        ],
    ]); ?>


</div>
