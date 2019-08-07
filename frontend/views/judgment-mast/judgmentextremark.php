<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JudgmentMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentExtRemark */
/* @var $form yii\widgets\ActiveForm */

$judgment = ArrayHelper::map(JudgmentMast::find()->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });


?>

<div class="judgment-ext-remark-form">

    <?php $form = ActiveForm::begin(['action' =>['judgment-mast/judgmentextremark']]); ?>

<?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code'],

]); ?>


    <?= $form->field($model, 'judgment_remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
    $this->registerJs("CKEDITOR.replace('judgmentextremark-judgment_remark')");

?>
