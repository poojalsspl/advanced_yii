<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InvcMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invc Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invc-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Invc Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'invc_numb',
            'invc_date',
            'userid',
            'custid',
            'invc_amt',
            //'GST',
            //'invc_disc',
            //'invoice_status',
            //'paid_amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
