<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use frontend\models\AdvocateMast;

$advocate = ArrayHelper::map(AdvocateMast::find()->where(['surv_status'=>'0'])->all(), 'adv_id', 'advocate_name');

 ?>
 <div class="col-lg-2"></div>
 <div class="col-lg-8">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'adv_id')->widget(Select2::classname(), [
        'data' => $advocate,
        'options' => ['placeholder' => 'Select..'],
        'pluginEvents'=>[]
         ])->label('Advocate'); ?>

  <?= $form->field($model, 'mkt_username')->hiddenInput(['value'=> $_SESSION['username']])->label(false); ?>

  <?php foreach ($survey as $srvy){ 

   echo "<h4>".$srvy->surv_que."</h4>";
   
  ?>

  	<div id=<?= "demo".$srvy->surv_code?>></div>
  	 <?= $form->field($model, 'surv_code[]')->hiddenInput(['value'=> $srvy->surv_code])->label(false); ?>
  	<a class="btn btn-success survey" value="<?php echo $srvy->surv_code ?>" id=<?= "svry".$srvy->surv_code?>>Show Options</a><br>

  <?php } ?>

   <div class="form-group" style="text-align: center">
        <div class="col-md-4 col-md-offset-4">
           <?= Html::submitButton('Submit', ['class' => 'btn-block btn theme-blue-button ']) ?>
        </div>
   </div>

  <?php ActiveForm::end(); ?>
</div>

<div class="col-lg-2"></div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.survey').click(function() {
            var val = $(this).attr('value');
            $("#svry"+val).attr('disabled', true);
            //console.log(val);
            $.ajax({
            	url: "/advanced_yii/site/surveyans?id="+val, 
            	dataType   : 'json',
            	success: function(result){
            	$.each( result, function(index, data) {
               	console.log(typeof data);
                $("#demo"+val).append('<input type="checkbox" name="AdvocateSurvey[surv_id][]" value="'+data.id+'"> '+ data.surv_ans +'<br>');
                 });


                }});
        });
    });
</script>


