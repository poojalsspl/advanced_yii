<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentRef;
use frontend\models\CourtMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentRef */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>

<!--add tabs---->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!--end of tab --->


<!------start of form------>
<?php
    //$jcode  = '';
    $doc_id = '';
    
if($_GET)
{
    //$jcode  = $_GET['jcode'];
    $doc_id  = $_GET['doc_id'];
   
}

$judgment = ArrayHelper::map(JudgmentMast::find()->where(['doc_id'=>$doc_id])->all(),
    'doc_id',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
$judgment_title = implode($judgment,'');
?>

<div class="judgment-ref-form">
    <div class="box box-blue">
  <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div id="test_div"></div>
    <br>
    <label>Judgment Title</label>
    <input type="text" value="<?php echo $judgment_title; ?>" readonly="readonly" class="form-control">
    <br><br>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Information</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $models[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'court_code_ref',
                    'citation_ref',
                    'judgment_date_ref',
                    'judgment_title_ref',
                    'ref_type',
                    
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($models as $i => $modelAddress): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"></h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs">Add More </button>
                            <button type="button" class="remove-item btn btn-danger btn-xs">Delete Raw</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$i}]id");
                            }
                           
                          $court  =  ArrayHelper::map(CourtMast::find()->all(),'court_code','court_name');
                            ?>
                             
                         <div class="row">
                           
                            <div class="col-sm-2">

        <?= $form->field($modelAddress, "[{$i}]court_code_ref")->dropDownList($court,['prompt'=>'']); ?>


                     
                             </div>
                             

                              <div class="col-sm-2">
                                <?= $form->field($modelAddress, "[{$i}]citation_ref")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelAddress, "[{$i}]judgment_date_ref")->textInput(['placeholder'=>'Y-mm-dd']) ?>
                                 
                             </div>
                             <div class="col-sm-4">
                                
                                 <?= $form->field($modelAddress, "[{$i}]judgment_title_ref")->textInput() ?>
                                 
                             </div>
                             <div class="col-sm-2">
                                
                                 <?= $form->field($modelAddress, "[{$i}]ref_type")->dropDownList(['Preceding'=>'Preceding','Refered'=>'Refered'],['prompt'=>'']) ?>
                                 
                             </div>
                            
                        </div><!-- .row -->
      
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($modelAddress->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>

<!------end of form------>

    <!------add judgment text------>
    <?= $this->render("/judgment-mast/judgment_text_add") ?>
    <!------judgment text------>
