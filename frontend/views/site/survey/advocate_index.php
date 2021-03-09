<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\MktStudent;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AdvocateMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advocate Masts';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="advocate-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'options' => [
           'class' => 'table-responsive',
          ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'adv_id',
            'advocate_name',
            'email_id:email',
            //'dob',
            //'gender',
            'mobile',
            //'surv_compstatus',
            [
              'attribute'=>'surv_compstatus',
              'format'=>'raw',
              'value' => function ($model) {
                if ($model->surv_compstatus == 'C'){
                  return '<p style="color:green">Completed</p>';
                  } 
                  if ($model->surv_compstatus == 'PC'){
                  return '<b>Partially Complete</b>';
                  } 
                  if ($model->surv_compstatus == 'P') {
                  return '<p style="color:red">Pending</p>';
                  }
               },
            ],
            //'image',
            //'court_code',
           // 'court_name',
            //'country_code',
            //'state_code',
            //'city_code',
            //'regs_numb',
            //'regs_year',
            //'qual_type',
            //'mkt_username',
           // 'crdt:date',
            // [
            //     'attribute' => 'crdt',
            //     'label' => 'Create Date',
            // ],

       
        ],
    ]); ?>


</div>
