<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PoojaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Poojas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pooja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pooja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'judgment_code',
            'court_code',
            'judgment_date',
            'jyear',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
