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

//$username = Yii::$app->user->identity->username;
/*    judgment   */
/*$tot_judgment = JudgmentMast::find()->where(['username'=>$username])->count();
$tot_judgment_worked = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['completion_date' => null]])->count();
$tot_judgment_pending = JudgmentMast::find()->where(['username'=>$username])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();*/

/*   Supreme Court judgment   */
/*$sc_judgment = JudgmentMast::find()->where(['username'=>$username])->andWhere(['court_code' => '1'])->count();
$sc_judgment_worked = JudgmentMast::find()->where(['username'=>$username])->andWhere(['court_code' => '1'])->andWhere(['not', ['completion_date' => null]])->count();
$sc_judgment_pending = JudgmentMast::find()->where(['username'=>$username])->andWhere(['court_code' => '1'])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();*/

/*   High Court judgment   */
/*$hc_judgment = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['court_code' => '1']])->count();
$hc_judgment_worked = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['court_code' => '1']])->andWhere(['not', ['completion_date' => null]])->count();
$hc_judgment_pending = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['court_code' => '1']])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();*/

/*$tot_advocate = JudgmentAdvocate::find()->where(['username'=>$username])->count();
$tot_judge = JudgmentJudge::find()->where(['username'=>$username])->count();
$tot_parties = JudgmentParties::find()->where(['username'=>$username])->count();
$tot_ref = JudgmentRef::find()->where(['username'=>$username])->count();
$tot_element = JudgmentElement::find()->where(['username'=>$username])->count();*/


/*echo "Total judgment alloted : ".$tot_judgment;echo "<br>";
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
echo "Judgment Element : ".$tot_element;echo "<br>";*/


?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>
<a href="http://localhost/advanced_yii/site/dashboard" data-toggle="modal" data-target="#myModal">demo</a>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>


