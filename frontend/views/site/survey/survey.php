<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\SurveyQuestions;
use frontend\models\QuestionCatgMast;
use yii\helpers\ArrayHelper;



$form = ActiveForm::begin(); 

$categoryName = QuestionCatgMast::find()->select('catg_desc')->where(['catg_code'=>$surveyques->catg_code])->one();
$catgName = $categoryName['catg_desc'];

echo "<h2><center>".$catgName."</center></h2><br>";

$form->field($model, 'question_id')->hiddenInput(['value'=>$surveyques->question_id]); 

echo "<h3><center>".$surveyques->question_name."</center></h3><br>";


echo "<table align='center'>";

foreach ($surveyans as $answer){
	if($answer->type_id == '1')
	{
	echo "<tr><td><input type='radio' name='UserSurvey[answer]' value='".$answer->answer."'></td><td>&nbsp;</td><td><span style='font-size:20px'> ".$answer->answer."</span></td></tr>";
	}
	
	if($answer->type_id == '3')
	{
	echo "<tr><td><input type='textbox' name='UserSurvey[answer]' value='".$answer->answer."' required='required'></td><td>&nbsp;</td><td> ".$answer->answer."</td></tr>";
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
<br><br><br><br>
<center><img src="<?php echo Yii::$app->params['domainName']."images/adlaw-logo.jpg"?>" alt="survey image" style="height: 120px"></center>
