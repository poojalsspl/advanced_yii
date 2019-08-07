<?php
use yii\bootstrap\Tabs;
use yii\bootstrap\ActiveForm;

use frontend\models\JudgmentMast;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;


?>


<?php 
    $judgmentmast      = new JudgmentMast();
    $judgmentAct       = new JudgmentAct();
    $judgmentAdvocate  = new JudgmentAdvocate();
    $judgmentCitation  = new JudgmentCitation();
    $judgmentExtRemark = new JudgmentExtRemark();
    $judgmentJudge     = new JudgmentJudge();
    $judgmentParties   = new JudgmentParties();

    if(($_GET)){
        $status = $_GET['status'];
    }
    else{
     $status = '';   
    }
 ?>
<div class="body">
<ul class="nav nav-pills">
      <li><a data-toggle="pill" href="#Judgment">Judgment</a></li>
       <li><a data-toggle="pill" href="#Acts">Acts</a></li>
      <li><a data-toggle="pill" href="#Advocates">Advocates</a></li>
      <li><a data-toggle="pill" href="#Citations">Citations</a></li>
      <li><a data-toggle="pill" href="#Ext-Ref">Ext-Ref</a></li> 
      <li><a data-toggle="pill" href="#Coram">Coram</a></li> 
      <li><a data-toggle="pill" href="#Parties">Parties</a></li> 
</ul>
<div class="tab-content">
<div id="Judgment" class="tab-pane">
 <?php $form = ActiveForm::begin(['id'=>'judge-master','action'=>'/cjadmin/judgment-mast/judgmenmast']); ?>

<div class="tab-content box box-info col-md-12">

<div class="col-md-3 split-box">
        <?php $courtMast = ArrayHelper::map(CourtMast::find()->all(), 'court_code', 'court_name'); ?>

        <?= $form->field($judgmentmast, 'court_name')->widget(Select2::classname(), [            
            'data' => $courtMast,
            'options' => ['placeholder' => 'Select Court'],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#judgmentmast-court_code').val(val);
                    $.ajax({
                      url      : '/cjadmin/judgment-mast/court?id='+val,
                      dataType : 'json',
                      success  : function(data) {                                 
                        $('#judgmentmast-hearing_place option').remove();
                        //$('#judgmentmast-hearing_place').append('<option>Select State</option>');
                        $.each(data, function(i, item){
                      $('#judgmentmast-hearing_place').append('<option value='+item.city_code+'>'+item.city_name+'</option>');
                      });
                          },
                      error: function(xhr, textStatus, errorThrown){
                           alert('No states for this contry');
                        }                                                         
                      });
             }"
            ]
            ]); ?>        
    <?= $form->field($judgmentmast, 'court_code')->textInput(['readonly'=>true]) ?>

     <?php 

        if(!$judgmentmast->isNewRecord)
        {
            $judgmentmast->appeal_numb = explode(';', $judgmentmast->appeal_numb); 
            $data = '';
            foreach ($judgmentmast->appeal_numb as $key => $value) {
                $appeal_numb[$value] = $value;
            }
        }
        else
        {
            $appeal_numb = [];
        }
    ?>    

        <?=  $form->field($judgmentmast, 'appeal_numb')->widget(Select2::classname(), [
              'data' => $appeal_numb,
              'options' => ['placeholder' => 'Select Appellant Number ...', 'multiple' => true, "class"=>"form-data"],
              'pluginOptions' => [
                  'tags' => true,
                  'tokenSeparators' => [';'],
                  'maximumInputLength' => 1000,
                  'maintainOrder'=>true 
              ],          
          ]);    ?>




  <?= $form->field($judgmentmast, 'judgment_date')->widget(DateRangePicker::classname(), [
    'pluginOptions'=>[
        'singleDatePicker'=>true,
        'showDropdowns'=>true,
    ],
]);
  ?>

    <?= $form->field($judgmentmast, 'appeal_status')->dropDownList(["0"=>'Appeal Dismissed', "1"=>"Appeal Allowed","2"=>"Petition Allowed","3"=>"Petition Dismissed"],['prompt'=>'Select Appeal Status']) ?>
  <?= $form->field($judgmentmast, 'hearing_date')->widget(DateRangePicker::classname(), [
    'pluginOptions'=>[
        'singleDatePicker'=>true,
        'showDropdowns'=>true,
    ],
]);
  ?>

      <?php if(!$judgmentmast->isNewRecord){
          if($judgmentmast->hearing_place == '')
          {
            $hearing_place[] = '';
          }
          else
          {
               $citystate = CityMast::find()->select("state_code")->where(['city_code'=>$judgmentmast->hearing_place])->one();
               $hearing_place = ArrayHelper::map(CityMast::find()->where(['state_code'=>$citystate->state_code])->all(), 'city_code', 'city_name'); 
          }
       }
        else{ $hearing_place[] = ''; }
       ?>

        <?= $form->field($judgmentmast, 'hearing_place')->widget(Select2::classname(), [
          
          'data' => $hearing_place,
          //'language' => '',
          'options' => ['placeholder' => 'Select Judgment Category'],
          'pluginEvents'=>[
          "select2:select" => "function() { var val = $(this).val();                
           }"
            ]
          ]); ?>

      <?= $form->field($judgmentmast, 'judgment_source_code')->textInput(['maxlength' => true]) ?>
      
      <?= $form->field($judgmentmast, 'judgment_source_name')->textInput(['maxlength' => true]) ?>

      <?= $form->field($judgmentmast, 'judgment_type')->dropDownList(["0"=>'Order', "1"=>"Oral Order","2"=>"Judgment"],['prompt'=>'Select Appeal Status']) ?>


     <?php  $jcatg_description = ArrayHelper::map(JcatgMast::find()->all(), 'jcatg_id', 'jcatg_description'); ?>
    
    <?= $form->field($judgmentmast, 'jcatg_description')->widget(Select2::classname(), [
            
            'data' => $jcatg_description,
            //'language' => '',
            'options' => ['placeholder' => 'Select Judgment Category'],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();
        $('#judgmentmast-jcatg_id').val(val);                
             }"
              ]
            ]); ?>

      <?= $form->field($judgmentmast, 'jcatg_id')->textInput(['readonly'=>true]) ?>

      <?php  $jsub_catg_description = ArrayHelper::map(JsubCatgMast::find()->all(), 'jsub_catg_id', 'jsub_catg_description'); ?>
    
      <?= $form->field($judgmentmast, 'jsub_catg_description')->widget(Select2::classname(), [
            
            'data' => $jcatg_description,
            //'language' => '',
            'options' => ['placeholder' => 'Select Judgment Category'],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();
        $('#judgmentmast-jsub_catg_id').val(val);                
             }"
              ]
            ]); ?>

      <?= $form->field($judgmentmast, 'jsub_catg_id')->textInput(['readonly'=>true]) ?>

      <?= $form->field($judgmentmast, 'judgment_ext_remark_flag')->dropDownList(["0"=>'Yes', "1"=>"No"],['prompt'=>'Select Remark Flag']) ?>
   </div>

   <div class="col-md-9 split-box">

    <?= $form->field($judgmentmast,'judgment_title')->textInput(['maxlength' => true]) ?>

  <?php 

     if(!$judgmentmast->isNewRecord)
    {
        $judgmentmast->appellant_name = explode(';', $judgmentmast->appellant_name); 
        $appellant_name = '';
        foreach ($judgmentmast->appellant_name as $key => $value) {
            $appellant_name[$value] = $value;
        }
    }
    else{
        $appellant_name[] ='';
    }
    ?>    
    <?=  $form->field($judgmentmast, 'appellant_name')->widget(Select2::classname(), [
              'data' => $appellant_name,
              'options' => ['placeholder' => 'Select Appellant Name ...', 'multiple' => true, "class"=>"form-data"],
              'pluginOptions' => [
                  'tags' => true,
                  'tokenSeparators' => [';'],
                  'maximumInputLength' => 1000,
                  'maintainOrder'=>true 
              ],
          ]);   

       ?>
          <?php 
         if(!$judgmentmast->isNewRecord)
        {
            $judgmentmast->respondant_name = explode(';', $judgmentmast->respondant_name); 
            $respondant_name = '';
            foreach ($judgmentmast->respondant_name as $key => $value) {
                $respondant_name[$value] = $value;
            }


        }
        else{
            $respondant_name[] = '';
        }
    ?>    

        <?=  $form->field($judgmentmast, 'respondant_name')->widget(Select2::classname(), [
              'data' => $respondant_name,
              'options' => ['placeholder' => 'Select Name ...', 'multiple' => true, "class"=>"form-data"],
              'pluginOptions' => [
                  'tags' => true,
                  'tokenSeparators' => [';'],
                  'maximumInputLength' => 1000,
                  'maintainOrder'=>true 
              ],
 
          ]);    ?>
            

      <?php 

         if(!$judgmentmast->isNewRecord)
          {
              $judgmentmast->appellant_adv = explode(';', $judgmentmast->appellant_adv); 
              $appellant_adv = '';
              foreach($judgmentmast->appellant_adv as $key => $value) {
                  $appellant_adv[$value] = $value;
              }
          }
        else{
            $appellant_adv = [];
        }
    ?>    

        <?=  $form->field($judgmentmast, 'appellant_adv')->widget(Select2::classname(), [
              'data' => $appellant_adv,
              'options' => ['placeholder' => 'Select Type ...', 'multiple' => true, "class"=>"form-data"],
              'pluginOptions' => [
                  'tags' => true,
                  'tokenSeparators' => [';'],
                  'maximumInputLength' => 1000,
                  'maintainOrder'=>true 
              ],
              'pluginEvents' => [   
              "select2:select" => "function() {  var count = $(this).find('option').length;
               $('#judgmentmast-appellant_adv_count').val(count); }",
             
          ]
        ]);    ?>    
      <?= $form->field($judgmentmast, 'appellant_adv_count')->textInput(['readonly'=>true]) ?>
      <?php 
         if(!$judgmentmast->isNewRecord)
        {
            $judgmentmast->respondant_adv = explode(';', $judgmentmast->respondant_adv); 
            $respondant_adv = '';
            foreach ($judgmentmast->respondant_adv as $key => $value) {
                $respondant_adv[$value] = $value;
            }


        }
        else{
            $respondant_adv[] = '';
        }
    ?>    
        <?=  $form->field($judgmentmast, 'respondant_adv')->widget(Select2::classname(), [
              'data' => $respondant_adv,
              'options' => ['placeholder' => 'Select Type ...', 'multiple' => true, "class"=>"form-data"],
              'pluginOptions' => [
                  'tags' => true,
                  'tokenSeparators' => [','],
                  'maximumInputLength' => 1000,
                  'maintainOrder'=>true 
              ],
              'pluginEvents' => [   
              "select2:select" => "function() {  var count = $(this).find('option').length;   $('#judgmentmast-respondant_adv_count').val(count); }",
          ]
          ]);    ?>

        <?= $form->field($judgmentmast, 'respondant_adv_count')->textInput(['readonly'=>true]) ?>

          <?php 

         if(!$judgmentmast->isNewRecord)
        {
            $judgmentmast->citation = explode(';', $judgmentmast->citation); 
            $citation = '';
            foreach ($judgmentmast->citation as $key => $value) {
                $citation[$value] = $value;
            }


        }
        else{
            $citation[] = '';
        }
    ?>    

        <?=  $form->field($judgmentmast, 'citation')->widget(Select2::classname(), [
              'data' => $citation,
              'options' => ['placeholder' => 'Select Type ...', 'multiple' => true, "class"=>"form-data"],
              'pluginOptions' => [
                  'tags' => true,
                  'tokenSeparators' => [','],
                  'maximumInputLength' => 1000,
                  'maintainOrder'=>true 
              ],
              'pluginEvents' => [
               
                "select2:select" => "function() {  var count = $(this).find('option').length;   $('#judgmentmast-citation_count').val(count); }",               
          ]
          ]);    ?>
    <?= $form->field($judgmentmast, 'citation_count')->textInput(['readonly'=>true]) ?>

   <?php 
         if(!$judgmentmast->isNewRecord)
        {
            $judgmentmast->judges_name = explode(';', $judgmentmast->judges_name); 
            $judges_name = '';
            foreach ($judgmentmast->judges_name as $key => $value) {
                $judges_name[$value] = $value;
            }
        }
        else{
            $judges_name[] = '';
        }
    ?>    

        <?=  $form->field($judgmentmast, 'judges_name')->widget(Select2::classname(), [
              'data' => $judges_name,
              'options' => ['placeholder' => 'Select Type ...', 'multiple' => true, "class"=>"form-data"],
              'pluginOptions' => [
                  'tags' => true,
                  'tokenSeparators' => [','],
                  'maximumInputLength' => 1000,
                  'maintainOrder'=>true 
              ],
              'pluginEvents' => [   
              "select2:select" => "function() {  var count = $(this).find('option').length;   
              $('#judgmentmast-judges_count').val(count); }",
             
          ]
          ]);    ?>

      <?= $form->field($judgmentmast, 'judges_count')->textInput(['readonly'=>true]) ?>

            <?= $form->field($judgmentmast, 'judgment_abstract')->textarea(['rows' => 6]) ?>
            
            <?= $form->field($judgmentmast, 'judgment_text')->textarea(['rows' => 6]) ?>


    <?php  $judgmentMast = ArrayHelper::map(JudgmentMast::find()->all(), 'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    }); ?>
    
    <?= $form->field($judgmentmast, 'overrule_judgment')->widget(Select2::classname(), [
            
            'data' => $judgmentMast,
            //'language' => '',
            'options' => ['placeholder' => 'Select Judgment Category'],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
             }"
              ]
            ]); ?>

        <?= $form->field($judgmentmast, 'overruled_by_judgment')->widget(Select2::classname(), [            
            'data' => $judgmentMast,
            'options' => ['placeholder' => 'Select Judgment Category'],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
             }"
              ]
            ]); ?>
</div>            

    <div class="form-group">
        <?= Html::submitButton($judgmentmast->isNewRecord ? 'Create' : 'Update', ['class' => $judgmentmast->isNewRecord ? 'btn btn-success pull-left' : 'btn btn-primary pull-left ']) ?>
    </div>
 <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
function master1()
{
    var court_code = $('#judgmentmast-court_code').val();
    var court_name = $('#judgmentmast-court_name').val();
    var appeal_numb = $('#judgmentmast-appeal_numb').val();
    var judgment_date = $('#judgmentmast-judgment_date').val();
    var judgment_title = $('#judgmentmast-judgment_title').val();
    var appellant_adv_count = $('#judgmentmast-appellant_adv_count').val();
    var respondant_adv_count = $('#judgmentmast-respondant_adv_count').val();
    var appeal_status = $('#judgmentmast-appeal_status').val();
    var citation = $('#judgmentmast-citation').val();
    var citation_count = $('#judgmentmast-citation_count').val();
    var judges_name = $('#judgmentmast-judges_name').val();
    var judges_count = $('#judgmentmast-judges_count').val();
    if(code == '')
    {
        $('.field-judgmentmast-court_code').addClass('has-error');
        $('#judgmentmast-court_code').focus();      
    }
    else if{        
        $('.field-judgmentmast-court_name').addClass('has-error');
        $('#judgmentmast-court_code').focus();
        
    }

}
/*  if($('.master1-validation').find('class','has-error'))
{
    
    $('.has-error').closest('input').focus();

}
else{
    $('.nav-pills li').removeClass('active');
    $('.master2').addClass('active');   
    $(this).attr('href','#master-2');
}*/

</script>    

<?php 

 ?>
<?php 
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_abstract',{toolbar : 'Basic'})");

?>
<?php 
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text',{toolbar : 'Basic'})");

?>
<style type="text/css">
  .split-box{
    padding:45px;
  }
  .split-box{
    border-style: outset;
  }
</style>



 </div>

                <!-- ***********************ACT**************************-->
<?php if($status == 'acts'){ ?>
<div id="Acts" class="tab-pane">
   <?php    $judgment = ArrayHelper::map(JudgmentMast::find()->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
$bareactCatg = ArrayHelper::map(BareactCatg::find()->all(), 'bareact_catgid', 'bareact_catg_name');
$bareactMast = ArrayHelper::map(BareactMast::find()->all(), 'bareact_id', 'act_name');
$bareactDetail = ArrayHelper::map(BareactDetail::find()->all(), 'catg_id', 'catg_title');
$countryMast = ArrayHelper::map(CountryMast::find()->all(), 'country_code', 'country_name');

?>

<div class="judgment-act-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($judgmentAct, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code'],

]); ?>


    <?= $form->field($judgmentAct, 'bareact_catg_name')->dropDownList($bareactCatg, ['prompt' => 'Select Category',"onchange"=>"
                                                    var code = $(this).val();
                                                    $('#judgmentact-bareact_catgid').val(code);"]) ?>


    <?= $form->field($judgmentAct, 'bareact_catgid')->textInput(['readonly'=>true]) ?>

    <?= $form->field($judgmentAct, 'act_name')->dropDownList($bareactMast, ['prompt' => 'Select Act Name',"onchange"=>"
                                                    var code = $(this).val();
                                                    $('#judgmentact-bareact_id').val(code);"]) ?>



    <?= $form->field($judgmentAct, 'bareact_id')->textInput(['readonly'=>true]) ?>

    <?= $form->field($judgmentAct, 'catg_title')->dropDownList($bareactDetail, ['prompt' => 'Select Act Name',"onchange"=>"
                                                    var code = $(this).val();
                                                    $('#judgmentact-catg_id').val(code);"]) ?>

   
   

    <?= $form->field($judgmentAct, 'catg_id')->textInput(['readonly'=>true]) ?>

    <?= $form->field($judgmentAct, 'country_name')->dropDownList($countryMast, ['prompt' => 'Select Act Name',"onchange"=>"
                                                    var code = $(this).val();
                                                    $('#judgmentact-country_code').val(code);"]) ?>

  

      <?= $form->field($judgmentAct, 'country_code')->textInput(['readonly'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton($judgmentAct->isNewRecord ? 'Create' : 'Update', ['class' => $judgmentAct->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
<?php } ?>
<?php if($status == 'advocates'){ ?>
<div id="Advocates" class="tab-pane">
    <?php
    $judgmentAdvocates = JudgmentAdvocate::find()->select('judgment_code')->groupBy('judgment_code')->all();
$j_code[] ='';
foreach ($judgmentAdvocates as $code) {
    $j_code[]= $code->judgment_code; 
}
//$jcode = rtrim($j_code,',');
/*print_r($judgmentAdvocate);
exit();*/

$judgment = ArrayHelper::map(JudgmentMast::find()
    ->where(['not in','judgment_code',$j_code])
    ->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });

?>
<div class="judgment-advocate-form">
     <div class="box box-danger col-md-12">
   
        <?php $form = ActiveForm::begin(); ?>
            <div class="box-header with-border">
              <h3 class="box-title">Advocate</h3>
            </div>
<?= $form->field($judgmentAdvocate, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code'],

]); ?>
    <div class="dynamic-rows rows col-xs-12">   
      <div class="dynamic-rows-field row">
    
        <div class="col-xs-4">  
            <?= $form->field($judgmentAdvocate, 'advocate_flag[]')->dropDownList(["1"=>"Appellant","2"=>"Respondent","3"=>"intervener"]) ?>
        </div>
        <div class="col-xs-6">
                <?= $form->field($judgmentAdvocate, 'advocate_name[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentadvocate-advocate_name form-control']) ?> 
        </div>
        <div class="col-xs-2">
            
        </div>
       
     </div>
    </div>
    <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($judgmentAdvocate->isNewRecord ? 'Create' : 'Update', ['class' => $judgmentAdvocate->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>

    </div>
   
    <div class="col-xs-8">
        <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
    
    <?= Html::button('Delete row', ['name' => 'Delete', 'value' => 'true', 'class' => 'btn btn-danger deleted-row']) ?>

    <?= Html::button('Generate Data', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info generate-row']) ?>
    </div>
   
    </div>
    <?php ActiveForm::end(); ?>
   

    </div>

</div>
<?php
if($judgmentAdvocate->isNewRecord){
    $customScript = <<< SCRIPT
    $('.addr-row').on('click',function(){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
    $('.judgmentadvocate-advocate_name').each(function(){
        if($(this).val()=='')
        {
            alert('Advocate Name Can not be Empty');
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
        $('.judgmentadvocate-advocate_name').attr('name','JudgmentAdvocate[advocate_name][]')
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"  data-id=""><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div><input type="hidden" name="JudgmentAdvocate[id][]"></div></div></div>'); 
    });
    $('.deleted-row').on('click',function(){
        //console.log('test');
        var data_id = $('.dynamic-rows-field').last().attr('data-id');
        if(data_id == "")
            { 
                $('.dynamic-rows-field').last().remove();
            }
            else{
                alert('Sorry! Can not delete existing record')
            }
        
    });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentadvocate-advocate_name').each(function(){
        if($(this).val()=='')
        {
            alert('Advocate Name Can not be Empty');
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
<?php 
$customScript = <<< SCRIPT
$('.generate-row').on('click', function(){
 var advocate =  $('#judgmentadvocate-judgment_code').val();
 if(advocate=='')
 {
    alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/cjadmin/judgment-advocate/advocate?id='+advocate,
dataType   : 'json',
success    : function(data){

console.log(data);
        $('.dynamic-rows div').html('');    

         var res = (data.appellant_adv).split(";");
         var res1 = (data.respondant_adv).split(";");
         console.log(res.length);
         for(i=0;i<res.length;i++){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
            }
        for(i=0;i<res1.length;i++){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2" selected="selected">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="'+res1[i]+'"><div class="help-block"></div></div></div></div></div>');
            }


        //$('#citymast-state_name').append('<option value='+item.state_code+'>'+item.state_name+'</option>');
    },
        error: function(xhr, textStatus, errorThrown){
        //alert('No states for this contry');
    }                                                         
    });
console.log(advocate);
}); 
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);

?>

</div>
<?php } ?>
<?php if($status == 'citations'){ ?>
<div id="Citations" class="tab-pane">
<?php 
$judgment = ArrayHelper::map(JudgmentMast::find()->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });

 $journal = ArrayHelper::map(JournalMast::find()->all(), 'journal_code', 'journal_name');

?>

<div class="judgment-citation-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($judgmentCitation, 'judgment_code')->widget(Select2::classname(), [
            'data' => $judgment,
            //'language' => '',
            'options' => ['placeholder' => 'Select Judgment Code'],
            ]); ?>

    
        <?= $form->field($judgmentCitation, 'journal_name')->widget(Select2::classname(), [
                'data' => $journal,
                //'language' => '',
                'options' => ['placeholder' => 'Select Judgment Code'],
                'pluginEvents'=>[
                "select2:select" => "function() { var val = $(this).val();
                    //console.log('/cjadmin/judgment-citation/journal?id='+val);
                    $.ajax({

                                                              //type     :'GET',
                                                                url      : '/cjadmin/judgment-citation/journal?id='+val,
                                                                dataType: 'json',
                                                                success  : function(data) {
                                                                    console.log(data);
                                                                    $('#judgmentcitation-shrt_name').val(data.shrt_name);
                                                                    $('#judgmentcitation-journal_code').val(val);
                                                              },
                                                              error: function(xhr, textStatus, errorThrown){
                                                                   alert('No states for this contry');
                                                                }                                                         
                                                              });


                 }"
                ]
                ]); ?>

    <?= $form->field($judgmentCitation, 'journal_code')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    <?= $form->field($judgmentCitation, 'shrt_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>
  
    <?= $form->field($judgmentCitation, 'judgment_date')->widget(DateRangePicker::classname(), [
    'pluginOptions'=>[
        'singleDatePicker'=>true,
        'showDropdowns'=>true,
    ],
]);
  ?>

    <?= $form->field($judgmentCitation, 'citation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($judgmentCitation, 'journal_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($judgmentCitation, 'journal_volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($judgmentCitation, 'journal_pno')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($judgmentCitation->isNewRecord ? 'Create' : 'Update', ['class' => $judgmentCitation->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
$this->registerJs("$('#judgmentcitation-judgment_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});");
$this->registerJs("$('#judgmentcitation-journal_year').datepicker({
   format: 'yyyy', // Notice the Extra space at the beginning
    viewMode: 'years', 
    minViewMode: 'years'
});");


?>

</div>
<?php } ?>
<?php if($status == 'ext-ref'){ ?>

<div id="Ext-Ref" class="tab-pane">
<?php 

$judgment = ArrayHelper::map(JudgmentMast::find()->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });


?>

<div class="judgment-ext-remark-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($judgmentExtRemark, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code'],

]); ?>


    <?= $form->field($judgmentExtRemark, 'judgment_remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($judgmentExtRemark->isNewRecord ? 'Create' : 'Update', ['class' => $judgmentExtRemark->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
    $this->registerJs("CKEDITOR.replace('judgmentextremark-judgment_remark')");

?>


</div>
<?php } ?>
<?php if($status == 'coram'){ ?>
<div id="Coram" class="tab-pane">
<?php 
$judgment = ArrayHelper::map(JudgmentMast::find()->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });



?>


<div class="judgment-judge-form">


<div class="box box-danger col-md-12">
        <?php $form = ActiveForm::begin(); ?>

   
            <div class="box-header with-border">
              <h3 class="box-title">Advocate</h3>
            </div>

  <?= $form->field($judgmentJudge, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code'],

]); ?>
    <div class="dynamic-rows rows col-xs-12">   
      <div class="dynamic-rows-field row">
    
        <div class="col-xs-6">
                <?= $form->field($judgmentJudge, 'judge_name[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentjudge-judge_name form-control']) ?> 
        </div>
        <div class="col-xs-2">
            
        </div>
       
     </div>
    </div>
    <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($judgmentJudge->isNewRecord ? 'Create' : 'Update', ['class' => $judgmentJudge->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>

    </div>
   
    <div class="col-xs-8">
    <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
    <?= Html::button('Delete row', ['name' => 'Delete', 'value' => 'true', 'class' => 'btn btn-danger deleted-row']) ?>
    <?= Html::button('Generate Data', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info generate-row']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
    </div>

</div>
<?php 
if($judgmentJudge->isNewRecord){
    $customScript = <<< SCRIPT
    $('.addr-row').on('click',function(){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="col-xs-6"><div class="form-group field-judgmentjudge-judge_name has-success"><label class="control-label" for="judgmentjudge-judge_name">Judge Name</label><input type="text" id="judgmentjudge-judge_name" class="form-control judgmentjudge-judge_name" name="judgmentjudge[judge_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentjudge-judge_name').each(function(){   
        if($(this).val()=='')
        {
            alert('Judge Name Can not be Empty');
            $(this).focus();
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
        $('.judgmentjudge-judge_name').attr('name','judgmentjudge[judge_name][]')
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="col-xs-6"><div class="form-group field-judgmentjudge-judge_name has-success"><label class="control-label" for="judgmentjudge-judge_name">Judge Name</label><input type="text" id="judgmentjudge-judge_name" class="form-control judgmentjudge-judge_name" name="judgmentjudge[judge_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentjudge-judge_name').each(function(){
        if($(this).val()=='')
        {
            alert('Judge Name Can not be Empty');
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
<?php 
$customScript = <<< SCRIPT
$('.generate-row').on('click', function(){
 var judge =  $('#judgmentjudge-judgment_code').val();
 console.log(judge);
 if(judge=='')
 {
    alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/cjadmin/judgment-judge/judge?id='+judge,
dataType   : 'json',
success    : function(data){
        console.log(data);
        $('.dynamic-rows div').html('');    

         var res = (data.judges_name).split(";");
         console.log(res.length);
         for(i=0;i<res.length;i++){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="form-group field-judgmentjudge-judge_name has-success"><label class="control-label" for="judgmentjudge-judge_name">Judge Name</label><input type="text" id="judgmentjudge-judge_name" class="form-control judgmentjudge-judge_name" name="judgmentjudge[judge_name][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
            }
    },
        error: function(xhr, textStatus, errorThrown){
        //alert('No states for this contry');
    }                                                         
    });
//console.log(advocate);
}); 
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);

?>

</div>
<?php } ?>
<?php if($status == 'parties'){ ?>
<div id="Parties" class="tab-pane">
   <?php  $judgmentAdvocate = JudgmentParties::find()->select('judgment_code')->groupBy('judgment_code')->all();
$j_code[] = "";
foreach ($judgmentAdvocate as $code) {
    $j_code[]= $code->judgment_code; 
}


/*$judgment = ArrayHelper::map(JudgmentMast::find()->where(['not in','judgment_code',$j_code])
    ->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });*/
?>

<div class="judgment-parties-form">


<div class="box box-danger col-md-12">

        <?php $form = ActiveForm::begin(); ?>

   
            <div class="box-header with-border">
              <h3 class="box-title">Advocate</h3>
            </div>

<?= $form->field($judgmentParties, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code'],

]); ?>
    <div class="dynamic-rows rows col-xs-12">   
      <div class="dynamic-rows-field row">
    
        <div class="col-xs-4">  
            <?= $form->field($judgmentParties, (!$judgmentParties->isNewRecord) ? 'party_flag' : 'party_flag[]')->dropDownList(["1"=>"Appellant","2"=>"Respondent","3"=>"intervener"]) ?>
        </div>
        <div class="col-xs-6">
                <?= $form->field($judgmentParties, (!$judgmentParties->isNewRecord) ? 'party_name' : 'party_name[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentparties-party_name form-control']) ?> 
        </div>
        <div class="col-xs-2">
            
        </div>
       
     </div>
    </div>
    <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($judgmentParties->isNewRecord ? 'Create' : 'Update', ['class' => $judgmentParties->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>

    </div>
  
    <div class="col-xs-8">
        <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
    <?= Html::button('Delete row', ['name' => 'Delete', 'value' => 'true', 'class' => 'btn btn-danger deleted-row']) ?>
    <?= Html::button('Generate Data', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info generate-row']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
   

      
    </div>

</div>
<?php

    $customScript = <<< SCRIPT
    $('.addr-row').on('click',function(){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag">Party Flag</label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name">Party Name</label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
        console.log('test');
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

    $this->registerJs($customScript, \yii\web\View::POS_READY);
 ?>
<?php 
$customScript = <<< SCRIPT
$('.generate-row').on('click', function(){
 var parties =  $('#judgmentparties-judgment_code').val();
 if(parties=='')
 {
    alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/cjadmin/judgment-parties/party?id='+parties,
dataType   : 'json',
success    : function(data){
        console.log(data);
        $('.dynamic-rows div').html('');    

         var res = (data.respondant_name).split(";");
         var res1 = (data.appellant_name).split(";");
          for(i=0;i<res1.length;i++){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag">Party Flag</label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name">Party Name</label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false" value="'+res1[i]+'"><div class="help-block"></div></div></div></div></div>');
            }

         //console.log(res.length);
         for(i=0;i<res.length;i++){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag">Party Flag</label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2" selected="selected">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name">Party Name</label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
            }
    },
        error: function(xhr, textStatus, errorThrown){
        //alert('No states for this contry');
    }                                                         
    });
//console.log(advocate);
}); 
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);

?>



</div>
<?php } ?>
 
</div>




</div>



   </div>