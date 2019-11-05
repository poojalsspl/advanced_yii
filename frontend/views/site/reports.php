<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\CourseMast;
use frontend\models\JudgmentMast;

$username = Yii::$app->user->identity->username;
$tot_judgment = JudgmentMast::find()->where(['username'=>$username])->count();
//$tot_advocate = JudgmentMast::find()->where(['username'=>$username])->count();

echo "Total judgment alloted : ".$tot_judgment;echo "<br>";
foreach($models as $key => $model){
	echo "j_code = ";
$j_code = 	print_r($model['judgment_code']);echo "<br>";
	/*foreach ($model as $valuee) {
		echo $valuee->judgment_code;
		# code...
	}*/

}

//$j_code = 	echo $model['judgment_code']);echo "<br>";
?>
