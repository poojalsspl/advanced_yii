<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">

    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'readonly'=>true]) ?>
        </div>
        <div class="col-md-4">
    <?= $form->field($model, 'art_catg_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>
        </div>
    </div>
    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
    $this->registerJs("CKEDITOR.replace('articles-body',{toolbar : 'Basic'})");

?>
