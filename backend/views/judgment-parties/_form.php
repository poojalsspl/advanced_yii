<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JudgmentMast;
use backend\models\JudgmentParties;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentParties */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

  $jcode  = '';
   $doc_id = ''; 
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

<div class="judgment-parties-form">
    <div class="box box-danger col-md-12">
        <?php if($model->isNewRecord) { ?>
            <?php $form = ActiveForm::begin(); ?>
            <div class="box-header with-border">
                
            </div>
            <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
            'data' => $judgment,
            'initValueText' => $jcode,
            'disabled'=>true,
            'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],

            ])->label('Judgment Title'); ?> 
            <div class="dynamic-rows rows col-xs-12">
                <div class="dynamic-rows-field row">
                    <div class="col-xs-4">
                        <?= $form->field($model, (!$model->isNewRecord) ? 'party_flag' : 'party_flag[]')->dropDownList(["1"=>"Petitioner","2"=>"Appellant","3"=>"Applicant","4"=>"Defendant","5"=>"Respondent","6"=>"Intervener"])->label('Party Type') ?>
                    </div> 
                    <div class="col-xs-6">
                        <?= $form->field($model, (!$model->isNewRecord) ? 'party_name' : 'party_name[]' )->textInput(['maxlength' => true,
                        'class'=>'judgmentparties-party_name form-control'])->label('Party Name(One Name in Each Row)') ?> 
                    </div> 
                    <div class="col-xs-2">
                        
                    </div>
                </div>
            </div> 
            <div class="row form-group">
                <div class="col-xs-4">
                    <?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>
                </div>
            </div>
            <?php if($model->isNewRecord) { ?>
                <div class="col-xs-8">
                    <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
                </div>
            <?php } ?>
            <?php ActiveForm::end(); ?>
        <?php } ?>
        <?php if(!$model->isNewRecord) { ?>
        <?php $judgment = ArrayHelper::map(JudgmentMast::find()
        ->all(),
        'judgment_code',
        function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
        });

        ?>
        <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->field($model, 'exam_status')->dropDownList(["A"=>'Right', "B"=>"Wrong","C"=>"Missing"],['prompt'=>'Select Status']);?>
        <div class="box-header with-border"><h3 class="box-title"></h3></div>
                    <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
            'data' => $judgment,
            'initValueText' => $jcode,
            'disabled'=>true,
            'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],

            ])->label('Judgment Title'); ?>
            <?php $parties = JudgmentParties::find()->where(['judgment_code'=>$model->judgment_code])->all(); ?>
            <div class="dynamic-rows rows col-xs-12">

         <?php foreach ($parties as $adv) {

            $flag = ($adv->party_flag == '1' ? 'selected' : $adv->party_flag == '2'  ? 'selected' : '' );  ?>

            <div class="dynamic-rows-field row" data-id="<?= $adv->judgment_party_id ?>">
              <div class="col-xs-4">
                <div class="form-group field-judgmentparties-party_flag has-success">
                  <select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false">
                    <option value="1" <?= ($adv->party_flag == '1' ? 'selected' : '') ?>>Petitioner</option>
                    <option value="2" <?= ($adv->party_flag == '2' ? 'selected' : '') ?>>Appellant</option>
                    <option value="3" <?= ($adv->party_flag == '3' ? 'selected' : '') ?>>Applicant</option>
                    <option value="4" <?= ($adv->party_flag == '4' ? 'selected' : '') ?>>Defendant</option>
                    <option value="5" <?= ($adv->party_flag == '5' ? 'selected' : '') ?>>Respondent</option>
                    <option value="6" <?= ($adv->party_flag == '6' ? 'selected' : '') ?>>Intervener</option>
                  </select>
                  <div class="help-block"></div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group field-judgmentparties-party_name has-success">
                  
                  <input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false" value="<?= $adv->party_name ?>">
                  <div class="help-block"></div>
                </div>
            <input type="hidden" name="JudgmentParties[judgment_party_id][]" value="<?= $adv->judgment_party_id ?>">
          </div>
        </div>   
     <?php } ?>
      </div>
      <div class="row form-group">
          <div class="col-xs-4">
              <?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>
          </div>
          <div class="col-xs-8">
              <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
          </div>
      </div>
        <?php ActiveForm::end(); ?>   
        <?php } ?>
        
    </div>
</div>
<?php
if($model->isNewRecord){
        $customScript = <<< SCRIPT
        $('.addr-row').on('click',function(){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag"></label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name"></label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
        });
        $('.deleted-row').on('click',function(){
        //console.log('test');
        $('.dynamic-rows-field').last().remove();
        });
        $('#submit-button').on("click",function(){
        //console.log('test');
        $('.judgmentparties-party_name').each(function(){   
        if($(this).val()=='')
        {
        alert('Party Name Can not be Empty');
        $(this).focus();
        $(this).parent().class('required has-error');


        return false;   
        }

        });     
        $('#submit-button').attr('type','submit');
        });


SCRIPT;
}
else{
        $customScript = <<< SCRIPT
        $('.addr-row').on('click',function(){
        $('.judgmentparties-party_name').attr('name','JudgmentParties[party_name][]')
        $('.dynamic-rows').append('<div class="dynamic-rows-field row" data-id=""><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag"></label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name"></label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div><input type="hidden" name="JudgmentParties[judgment_party_id][]" value=""></div></div></div>');    
        });
        $('.deleted-row').on('click',function(){
        var data_id = $('.dynamic-rows-field').last().attr('data-id');        
        $('.dynamic-rows-field').last().remove();


        });
        $('#submit-button').on("click",function(){
        console.log('test');
        $('.judgmentparties-party_name').each(function(){
        if($(this).val()=='')
        {
        alert('Party Name Can not be Empty');
        $(this).focus();
        return false;   
        }

        });     
        $('#submit-button').attr('type','submit');
        });


SCRIPT;


}
    $this->registerJs($customScript, \yii\web\View::POS_READY);
 ?>
