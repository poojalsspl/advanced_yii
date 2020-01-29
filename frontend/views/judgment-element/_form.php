<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentElement;
use frontend\models\JudgmentMast;
use frontend\models\ElementMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>
<!--add tabs---->
<?= $this->render("/judgment-mast/view_tabs") ?>
<hr>
<!--end of tab --->
<?php
    $jcode  = '';
    $doc_id = '';
  
if($_GET)
{
    $jcode = $_GET['jcode'];
    $doc_id = $_GET['doc_id'];
}

 $judgmentElement = JudgmentElement::find()->where(['judgment_code'=>$jcode])->all();
?>
    <table class="table table-bordered table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Element Name </th>
      <th>Weitage % </th>
      <th>Element Text </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($judgmentElement as $judgmentElementSingle) { ?>
    <tr>
      <th scope="row"><?= $judgmentElementSingle->id ?></th>
      <td><?= $judgmentElementSingle->element_name ?></td>
      <td><?= $judgmentElementSingle->weight_perc ?></td>
      <td><?= $judgmentElementSingle->element_text ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
 <div class="judgment-element-form">
    <div class="container">
        <div class="row">

           <div class="col-md-6">
            <?php $form = ActiveForm::begin();

              $element    = ArrayHelper::map(ElementMast::find()->all(), 'element_code', 'element_name'); 

              ?>
              <?= $form->field($model, 'judgment_code')->hiddenInput(['value'=>$jcode])->label(false); ?>
              <?= $form->field($model, 'element_code')->widget(Select2::classname(), [
                  'data' => $element,
                  'options' => ['placeholder' => 'Select Judgment Element'],
                  'pluginEvents'=>[
                    "select2:select" => "function() { var val = $(this).val();  
              //console.log('val',val);              
              $('#judgmentelement-element_code').val(val);
              var jcode = $('#judgmentelement-judgment_code').val();
                    $.ajax({
                      url      : '/advanced_yii/judgment-element/element?id='+val,
                     success  : function(data) {
                      let jdata = JSON.parse(data);
                     jdata.forEach(function(e){
                      element_desc = e.element_desc;
                      });
                      $('#act_row').html(element_desc);
                      
                     }    
                  });
             }"
                    ]
                  ])->label('Element Name'); ?>
              <label>Copy  from the judgment text below and paste it in the box below : <br><span style="color: #ff0000">DO NOT CHANGE ANY TEXT</span></label>
             <?= $form->field($model, 'element_text')->textarea(['rows' => 6])->label(false); ?> 
             <?= $form->field($model, 'weight_perc')->textInput()->label(); ?>
          <div class="form-group">
         <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
           </div> 

             <?php ActiveForm::end(); ?>
           </div>
            
            <div class="col-md-6">

<div id="act_row"></div>
    

</div>
</div>
</div>
</div>

<?php 
    //$this->registerJs("CKEDITOR.replace('judgmentelement-element_text',{toolbar : 'Basic'})");
?>
<!------add judgment text------>
    <?= $this->render("/judgment-mast/judgment_text_add") ?>
    
<!------judgment text------>

<?php /*$customScript = <<< SCRIPT


$('#judgmentelement-weight_perc').on('keyup', function(){
    var weight_perc = $(this).val();
    console.log(weight_perc);
    });
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);*/?>