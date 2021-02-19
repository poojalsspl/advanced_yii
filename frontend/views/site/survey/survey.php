<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\SurveyQuestions;



$form = ActiveForm::begin(); 

$form->field($model, 'question_id')->hiddenInput(['value'=>$surveyques->question_id]); 

echo "<h3><center>".$surveyques->question_id.') '.$surveyques->question_name."</center></h3><br>";


echo "<table align='center'>";

foreach ($surveyans as $answer){
	if($answer->type_id == '1')
	{
	echo "<tr><td><input type='radio' name='UserSurvey[answer]' value='".$answer->answer."'></td><td>&nbsp;</td><td> ".$answer->answer."</td></tr>";
	}
	
	if($answer->type_id == '3')
	{
	echo "<tr><td><input type='textbox' name='UserSurvey[answer]' value='".$answer->answer."'></td><td>&nbsp;</td><td> ".$answer->answer."</td></tr>";
	}

}

if($answer->type_id == '2'){
echo "<select name='UserSurvey[answer][]' multiple='multiple'>";
foreach ($surveyans as $answer){
	echo "<option value='".$answer->answer."'>".$answer->answer."</option>";
}
echo "</select>";
}
echo "</table>";
?>

<br>
               <div class="form-group">
                    <center><?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?></center>
                </div>
<?php
ActiveForm::end(); 

?>