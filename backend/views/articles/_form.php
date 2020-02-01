<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use frontend\models\ArticleCatgMast;

/* @var $this yii\web\View */
/* @var $model frontend\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php 
    $article_catg = ArrayHelper::map(ArticleCatgMast::find()->all(), 'art_catg_id', 'art_catg_name'); 
    ?>

    <?= $form->field($model, 'art_catg_name')->widget(Select2::classname(), [
        'data' => $article_catg,
        'options' => ['placeholder' => 'Select Article Category'],
         'pluginEvents'=>[
          ]
          ]); ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
    $this->registerJs("CKEDITOR.replace('articles-body',{toolbar : 'Basic'})");

?>
