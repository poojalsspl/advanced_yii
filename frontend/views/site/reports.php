<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\CourseMast;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentAdvocate;
use frontend\models\JudgmentJudge;
use frontend\models\JudgmentParties;
use frontend\models\JudgmentRef;
use frontend\models\JudgmentElement;

$username = Yii::$app->user->identity->username;
/*    judgment   */
$tot_judgment = JudgmentMast::find()->where(['username'=>$username])->count();
$tot_judgment_worked = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['completion_date' => null]])->count();
$tot_judgment_pending = JudgmentMast::find()->where(['username'=>$username])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();

/*   Supreme Court judgment   */
$sc_judgment = JudgmentMast::find()->where(['username'=>$username])->andWhere(['court_code' => '1'])->count();
$sc_judgment_worked = JudgmentMast::find()->where(['username'=>$username])->andWhere(['court_code' => '1'])->andWhere(['not', ['completion_date' => null]])->count();
$sc_judgment_pending = JudgmentMast::find()->where(['username'=>$username])->andWhere(['court_code' => '1'])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();

/*   High Court judgment   */
$hc_judgment = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['court_code' => '1']])->count();
$hc_judgment_worked = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['court_code' => '1']])->andWhere(['not', ['completion_date' => null]])->count();
$hc_judgment_pending = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['court_code' => '1']])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();

$tot_advocate = JudgmentAdvocate::find()->where(['username'=>$username])->count();
$tot_judge = JudgmentJudge::find()->where(['username'=>$username])->count();
$tot_parties = JudgmentParties::find()->where(['username'=>$username])->count();
$tot_ref = JudgmentRef::find()->where(['username'=>$username])->count();
$tot_element = JudgmentElement::find()->where(['username'=>$username])->count();


echo "Total judgment alloted : ".$tot_judgment;echo "<br>";
echo "No. of Judgment Completed : ".$tot_judgment_worked;echo "<br>";
echo "No. of Judgment Pending : ".$tot_judgment_pending;echo "<hr>";

echo "Supreme Court Judgments : ".$sc_judgment;echo "<br>";
echo "No. of SC Judgment Completed : ".$sc_judgment_worked;echo "<br>";
echo "No. of SC Judgment Pending : ".$sc_judgment_pending;echo "<hr>";

echo "High Court Judgments : ".$hc_judgment;echo "<br>";
echo "No. of HC Judgment Completed : ".$hc_judgment_worked;echo "<br>";
echo "No. of HC Judgment Pending : ".$hc_judgment_pending;echo "<hr>";

echo "Total no. of Advocates : ".$tot_advocate;echo "<br>";
echo "Total no. of Judges : ".$tot_judge;echo "<br>";
echo "Appellant & Respondant Count : ".$tot_parties;echo "<br>";
echo "Judgment Referred : ".$tot_ref;echo "<br>";
echo "Judgment Element : ".$tot_element;echo "<br>";


?>
