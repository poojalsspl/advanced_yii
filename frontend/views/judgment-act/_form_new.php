<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\BareactMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
    if($_GET)
{
    //$jcode = $_GET['jcode'];
   
    $doc_id = $_GET['doc_id'];
}
?>


<!---code for tabs------->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!---end of code for tabs------->

<!------start of form------>

<div class="judgment-act-form">
      <div class="box box-blue">
    <?php

$judgment = ArrayHelper::map(JudgmentMast::find()->where(['doc_id'=>$doc_id])->all(),
    'doc_id',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
foreach ($judgment as $key => $judgment_value) {
    $judgment_value;
}

?>

    <?php $form = ActiveForm::begin(); ?>
    <div class="box-header with-border">
              <h3 class="box-title"></h3>
    </div>
    

 <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true ,'readonly'=>true,'value' => $judgment_value])->label() ?>


 <div class="row">  
<div class="col-md-3 col-xs-12">


             <?= $form->field($model, 'bareact_desc')->textInput()->label('Bareact Category'); ?>
    </div>


 <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'j_doc_id')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => $doc_id])->label(false) ?>
    
    
    

</div>

</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
<!------end of form------>
<!------add judgment text------>
<?= $this->render("/judgment-mast/judgment_text_add") ?>
<!------judgment text------>


