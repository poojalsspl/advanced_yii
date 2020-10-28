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
    //$jcode = $_GET['jcode'];
    $doc_id = $_GET['doc_id'];

    
}
   $username = Yii::$app->user->identity->username;
    $judgment = ArrayHelper::map(JudgmentMast::find()
	->where(['doc_id'=>$doc_id])
    ->andWhere(['username'=>$username])
	->all(),
    'doc_id',
    function($result) {
        return $result['judgment_text'];
    });
    

    ?>
  
    <div class="col-md-12 magintop box-footer box-footer-custom" style="overflow-y: auto; height: 250px;text-align: left;">
        <span><?php //print_r($judgment); 
          echo implode(" ",$judgment);
    ?></span>
    </div>
    