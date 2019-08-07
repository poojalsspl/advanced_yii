<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JcatgMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jcatg Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jcatg-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jcatg Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jcatg_id',
            'jcatg_description',
            'jcatg_id1',
            'jcatg_description1',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
