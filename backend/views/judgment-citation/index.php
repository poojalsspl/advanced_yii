<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudgmentCitationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Citations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-citation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Citation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'judgment_code',
            'doc_id',
            'journal_code',
            //'journal_name',
            //'shrt_name',
            //'judgment_date',
            //'citation',
            //'journal_year',
            //'journal_volume',
            //'journal_pno',
            //'exam_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
