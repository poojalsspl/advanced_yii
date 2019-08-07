<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentDispositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Dispositions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-disposition-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Disposition', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'disposition_id',
            'disposition_text',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
