<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentAdvocate;
use yii\helpers\ArrayHelper;
//use yii\web\Html;


$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];

$doc_id = $_GET['doc_id'];

$judgment = ArrayHelper::map(JudgmentMast::find()
	->where(['doc_id'=>$doc_id])
	->all(),
    'doc_id',
    function($result) {

        return $result['court_name'].'::'.$result['judgment_title'];
    });
print_r($model);

?>
<div class="row">

	<?= Html::beginForm('advocatedata') ?>
	<div class="col-md-6">
		<input type="text" name="advocate_flag" value="<?php echo !empty($model) ? $model->advocate_flag:'' ; ?>">
		<!-- <select>
			<option value="1">Petitioner</option>
			<option value="2">Appellant</option>
			<option value="3">Applicant</option>
			<option value="4">Defendant</option>
			<option value="5">Respondent</option>
			<option value="6">Intervener</option>
		</select> -->
	</div>
	<div class="col-md-6">
		<input type="text" name="advocate_name" value="<?php echo !empty($model) ? $model->advocate_name:'' ; ?>">
		<input type="hidden" name="doc_id" value="<?php echo $doc_id; ?>">
	</div>
	<div class="col-md-6 mt-2 ">
		<input type="submit" class="btn btn-primary" value="Save">
	</div>
	<div class="col-md-6 mt-2 ">
		<input type="button" class="btn btn-warning" value="Add More">
		<input type="button" class="btn btn-danger" value="Delete">
		<input type="button" class="btn btn-success" value="Skip">
	</div>
<?= Html::endForm() ?>

</div>