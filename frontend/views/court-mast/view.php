<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CourtMast */

$this->title = $model->bench_code;
$this->params['breadcrumbs'][] = ['label' => 'Court Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="court-mast-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bench_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bench_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'court_code',
            'court_name',
            'court_shrt_name',
            'court_type',
            'bench_status',
            'court_status',
            'city_code',
            'city_name',
            'state_code',
            'state_name',
            'country_code',
            'country_name',
            'court_remark',
            'court_address',
            'bench_code',
            'court_type_shrt_name',
            'court_group_code',
            'court_group_name',
            'court_type_name',
            'bench_name',
            'court_flag',
        ],
    ]) ?>

</div>
