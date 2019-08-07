<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentJurisdictionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Jurisdictions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-jurisdiction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Jurisdiction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'judgment_jurisdiction_id',
            'judgment_jurisdiction_text',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
