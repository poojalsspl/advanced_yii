<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnivMast */

$this->title = 'Syllabus';

?>
<div class="syllabus-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>