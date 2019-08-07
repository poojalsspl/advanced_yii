<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserMast */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-mast-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'first_name',
            'last_name',
            'pan_no',
            'gst_no',
            'activation_date',
            'exp_date',
            'user_type',
            'company_name',
            'profession',
            'no_of_laywers',
            'practise_area:ntext',
            'user_ip',
            'gender',
            'user_pic',
            'sign_date',
            'bar_reg_no',
            'dob',
            'mobile_1',
            'mobile_2',
            'landline_1',
            'landline_2',
            'fax',
            'email:email',
            'alt_email:email',
            'grad_yr',
            'practice_since',
            'city_code',
            'city_name',
            'state_code',
            'state_name',
            'country_code',
            'country_name',
            'user_address',
            'pin_code',
            'status',
        ],
    ]) ?>

</div>
