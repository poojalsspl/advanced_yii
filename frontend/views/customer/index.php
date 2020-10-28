<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            [
              'header'=>'Status',
              'value'=> function($data)
              { 
                   return  Html::a(Yii::t('app', ' {modelClass}', [
                          'modelClass' => 'details',
                          ]), ['view-data','id'=>$data->id], ['class' => 'btn btn-success', 'id' => 'popupModal']);      
              },
              'format' => 'raw'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
      

    ?>
     <?php yii\bootstrap\Modal::begin(['id' =>'modal']);?>

<?php
yii\bootstrap\Modal::end();
    $this->registerJs("$(function() {
   $('#popupModal').click(function(e) {
     e.preventDefault();
     $('#modal').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });
});");

?>
</div>
