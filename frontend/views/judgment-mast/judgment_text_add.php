 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>

    <?php

    if($_GET)
{
    $jcode = $_GET['jcode'];
    $doc_id = $_GET['doc_id'];

    
}
    $judgment = ArrayHelper::map(JudgmentMast::find()
	//->andWhere(['not in','judgment_code',$j_code])
	->where(['judgment_code'=>$jcode])
	->all(),
    'judgment_code',
    function($result) {
        return $result['judgment_text'];
    });
    

    ?>
  
    <div class="col-md-12 magintop box-footer box-footer-custom">
        <span><?php //print_r($judgment); 
          echo implode(" ",$judgment);
    ?></span>
    </div>