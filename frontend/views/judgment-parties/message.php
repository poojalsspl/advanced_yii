<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
//use frontend\models\JudgmentAdvocate;
use frontend\models\JudgmentMast;

/* @var $this yii\web\View */
/* @var $model app\models\UserMast */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>
  <?php $form = ActiveForm::begin(); 
    $baseUrl =   \Yii::$app->request->BaseUrl;
    //exit;
  ?>
  <style type="text/css">
  	.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body{
  		background-color:#dd4b39 !important;
  		margin-top: 28px;
  	}
  </style>
 <h1><?= Html::encode($this->title) ?></h1>
   <div class="row" >
      <div class="col-lg-8">
        
 
      </div>

    <?php ActiveForm::end(); ?>
</div>