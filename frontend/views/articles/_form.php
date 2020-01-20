<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use frontend\models\ArticleCatgMast;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

     <?php
    $article = ArrayHelper::map(ArticleCatgMast::find()->where(['role'=>'2'])->all(), 'art_catg_id', 'art_catg_name'); 
    ?>

     <?= $form->field($model, 'art_catg_id')->widget(Select2::classname(), [
          
          'data' => $article,
          'options' => ['placeholder' => 'Select Article Category'],
          'pluginEvents'=>[
            ]
          ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

  <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
    $this->registerJs("CKEDITOR.replace('articles-body',{toolbar : 'Basic'})");

?>
