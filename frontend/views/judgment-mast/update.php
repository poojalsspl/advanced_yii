<?php

use yii\helpers\Html;
// use frontend\models\JsubCatgMast;
// use frontend\models\JcatgMast;
// use frontend\models\JudgmentMast;
// use frontend\models\CityMast;
// use frontend\models\CourtMast;
// use yii\helpers\ArrayHelper;

// use kartik\form\ActiveForm;
// use kartik\form\ActiveField;

// use frontend\models\JudgmentBenchType;
// use frontend\models\JudgmentDisposition;
// use frontend\models\JudgmentJurisdiction;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMast */

$this->title = 'Fixed Data Points';
/*$this->params['breadcrumbs'][] = ['label' => 'Judgment Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judgment_code, 'url' => ['view', 'id' => $model->judgment_code]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="judgment-mast-update">

   

<!---end of code for tabs------->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
