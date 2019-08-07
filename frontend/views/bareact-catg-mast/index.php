<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BareactCatgMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bareact Catg Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bareact-catg-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bareact Catg Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'act_catg_code',
            'act_catg_desc',
            'short_desc',
            'act_group_code',
            'country_code',
            //'country_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
