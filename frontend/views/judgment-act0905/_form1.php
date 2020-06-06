<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\BareactDetl;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-act-form">
    <?php

    if($_GET)
{
    $jcode = $_GET['jcode'];
   
    $doc_id = $_GET['doc_id'];
}
$judgment = ArrayHelper::map(JudgmentMast::find()->where(['judgment_code'=>$jcode])->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
?>

       <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
 <div class="row">    
    <div class="col-md-12">
    <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    'disabled'=>true,
    'initValueText' => $jcode,     
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],


]); ?>
</div>
 <div class="panel panel-default">
        <div class="panel-body">
          <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsBareact[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'act_group_desc',
                    'act_catg_desc',
                    'act_title',
                    'doc_id',
                   
                ],
            ]); ?>
            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsBareact as $i => $modelBareact): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Items</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelBareact->isNewRecord) {
                                echo Html::activeHiddenInput($modelBareact, "[{$i}]id");
                            }
                        ?>
                      <div class="row">
                          
                            <div class="col-sm-2">
                                <?= $form->field($modelBareact, "[{$i}]act_group_desc")->textInput(['style'=>'width:150px']) ?>
                            </div>
                       
                      
                        <div class="col-sm-2">
                            <?= $form->field($modelBareact, "[{$i}]act_catg_desc")->textInput(['style'=>'width:150px']) ?>
                        </div>
                        <div class="col-sm-2">
                            <?= $form->field($modelBareact, "[{$i}]act_title")->textInput(['style'=>'width:150px']) ?>
                        </div>
                        <div class="col-sm-2">
                             <?= $form->field($modelBareact, "[{$i}]doc_id")->textInput(['style'=>'width:150px']) ?>
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
        <?= Html::submitButton($modelBareact->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>











 