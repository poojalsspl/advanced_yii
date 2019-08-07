<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CouponCode */

$this->title = 'Update Coupon Code: ' . $model->coupon_id;
$this->params['breadcrumbs'][] = ['label' => 'Coupon Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->coupon_id, 'url' => ['view', 'id' => $model->coupon_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coupon-code-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
