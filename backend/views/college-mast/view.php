<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CollegeMast */

$this->title = $model->college_code;
$this->params['breadcrumbs'][] = ['label' => 'College Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="college-mast-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->college_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->college_code], [
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
            'college_code',
            'college_name',
            'univ_code',
            'univ_name',
            'estd_yr',
            'college_desc:ntext',
            'college_logo',
            'sponsor',
            'startdate',
            'enddate',
            'address',
            'zipcode',
            'email:email',
            'website',
            'fax',
            'tele',
            'mobile',
            'country_name',
            'country_code',
            'state_name',
            'state_code',
            'city_name',
            'city_code',
            'prospectus',
            'total_students',
        ],
    ]) ?>

</div>
