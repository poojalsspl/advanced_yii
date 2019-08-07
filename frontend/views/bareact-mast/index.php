<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BareactMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bareact Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bareact-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bareact Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'doc_id',
            'bareact_code',
            'bareact_desc',
            'act_group_code',
            //'act_group_desc',
            //'act_catg_code',
            //'act_catg_desc',
            //'act_status',
            //'enact_date',
            //'ref_doc_id',
            //'act_sub_catg_code',
            //'act_sub_catg_desc',
            //'tot_section',
            //'tot_chap',
            //'country_code',
            //'country_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
