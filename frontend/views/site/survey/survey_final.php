<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\UserSurvey;

$form = ActiveForm::begin(); 

?>
<table>
	
<?php
foreach($surveyall as $survey){
  $adv_id = $survey->adv_id;
	?>
	    <div class="row">
	    	<div class="col-md-3"></div>
		<div class="col-md-6">
			<tr><td>
		<p><?= $survey->question_id.')&nbsp;'.$survey->question_name; ?></p></td><td><b><?= $survey->answer; ?></b></td>
		</tr>
		</div>
		<div class="col-md-3"></div>
	    </div>	
	
	<?php } ?>
</table>
	 <div class="form-group">
                    <center><a href="<?php echo Yii::$app->params['domainName'].'site/survey?adv_id='.$adv_id; ?>" class="btn btn-primary">Confirm</a></center>
     </div>
<?php
ActiveForm::end(); 

?>
    



