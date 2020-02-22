<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentElement;
use frontend\models\JudgmentMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/j-element-list']];

?>
<?php
    $jcode  = '';
     $doc_id = '';
   
if($_GET)
{
    $jcode = $_GET['jcode'];
   $doc_id = $_GET['doc_id'];
   
}
?>
<style type="text/css">
  .tabs a{
    display: inline-block;
    width: 10%;
  }
</style>
<!--add tabs---->
<?php


$judgment = ArrayHelper::map(JudgmentMast::find()
  //->andWhere(['not in','judgment_code',$j_code])
  ->where(['judgment_code'=>$jcode])
  ->all(),
    'judgment_code',
    function($result) {

        return $result['court_name'].'::'.$result['judgment_title'];
    });

$master = JudgmentMast::find()->where(['judgment_code'=>$jcode])->one();
    
    $JudgmentElement     = $master->judgmentElement;
    $JudgmentDatapoints  = $master->judgmentDatapoints;
    
    $mastcls = "btn-primary";


    if(!empty($JudgmentElement)){ $element           =  '/judgment-element/index'; $elementcls = "btn-primary"; } else { $element =  '/judgment-element/create'; $elementcls = "btn-primary"; }
     if(!empty($JudgmentDatapoints)){ $datapoints   =  '/judgment-data-point/update'; $datapointscls = "btn-primary";} else { $datapoints =  '/judgment-data-point/create1'; $datapointscls = "btn-primary"; }

?>
<div class="tabs">


<?php echo Html::a('Judgment Elements',[$element,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"width:12%;margin:2px","class"=>"btn btn-block  ".$elementcls ]) ?>
<?php echo Html::a('Judgment DataPoints',[$datapoints,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"width:12%;margin:2px","class"=>"btn btn-block  ".$datapointscls ]) ?>


</div>

<hr>
<!--end of tab --->

<div>
<?php
$j_elements = JudgmentElement::find('element_name,element_text,weight_perc')->where(['judgment_code'=>$jcode])->all();
foreach($j_elements as $jud_element){

?>
<div class="row">
   
        <div class="col-sm-3"><?php echo $jud_element->element_name; ?></div>
        <div class="col-sm-6"><?php echo $jud_element->element_text; ?></div>
        <div class="col-sm-3"><?php echo $jud_element->weight_perc; ?></div>
  
</div>
<?php } ?>
</div>
<div class="judgment-data-point-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div id="test_div"></div>


    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Information</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $models[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'element_code',
                    'data_point',
                    'weight_perc',
                    'specify',
                    
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($models as $i => $modelAddress): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"></h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelAddress->isNewRecord) {
                                echo Html::activeHiddenInput($modelAddress, "[{$i}]id");
                            }
                           /* $element  = ArrayHelper::map(JudgmentElement::find()->all(), 'element_code', 'element_name'); */
                          $element  =  ArrayHelper::map(JudgmentElement::find()->where('judgment_code = :judgment_code', [':judgment_code' => $jcode])->all(),'element_code','element_name');
                            ?>
                             
                         <div class="row">
                           
                            <div class="col-sm-3">
                                 <?php
 /* echo $form->field($modelAddress, "[{$i}]element_code")->dropDownList($element, ['prompt' => '','class'=>'form-control-dp'],['onchange' => '$.post("'.Yii::$app->urlManager->createUrl(["judgment-data-point/dp"]).'", function( data ) {

      
     })'])*/;?>
        <?= $form->field($modelAddress, "[{$i}]element_code")->dropDownList($element,['prompt'=>''/*,'ajax'=>[
                                     'type'=>'GET',
                                     'id'=>'$(this).val()',
                                     'url'=>'/advanced_yii/judgment-data-point/dp?id=+id',

                                    ]*/
])->label('Element Name'); ?>



<?php
     /* echo   $form->field($modelAddress, '[{$i}]element_code')->dropDownList(
          $element,
        ['onchange' => '$.post("'.Yii::$app->urlManager->createUrl(["judgment-data-point/dp"]).'", function( data ) {

      $("#test_div").append( data );
     })']);*/
        ?>

                     
                             </div>
                             

                              <div class="col-sm-3">
                                <?= $form->field($modelAddress, "[{$i}]data_point")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelAddress, "[{$i}]weight_perc")->textInput() ?>
                                 
                             </div>
                             <div class="col-sm-3">
                                
                                 <?= $form->field($modelAddress, "[{$i}]specify")->textInput() ?>
                                 
                             </div>
                            
                        </div><!-- .row -->
      
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($modelAddress->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
 $customScript = <<< SCRIPT
 $(document).ready(function() {
  $(document).on('change', '.form-control-dp', function(){
    var ids = $(this).attr("id");
    var id = $(this).val();
    console.log('IDS',id);
    });
  });
 SCRIPT;
  $this->registerJs($customScript, \yii\web\View::POS_READY);
 ?>
