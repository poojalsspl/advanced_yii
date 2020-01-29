<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentElement;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>
<?php
    $jcode  = '';
   
if($_GET)
{
    $jcode = $_GET['jcode'];
   
   
}
?>
<table>
<?php
$j_elements = JudgmentElement::find('element_name,element_text')->where(['judgment_code'=>$jcode])->all();
foreach($j_elements as $jud_element){

?>

    <tr>
        <td><?php echo $jud_element->element_name; ?><span> &nbsp;&nbsp;: &nbsp;&nbsp;</span></td> 
        <td><?php echo $jud_element->element_text; ?></td>
    </tr>
<?php } ?>
</table>
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
                            <div class="col-sm-4">
                               
                                
                            </div>
                            <div class="col-sm-2">
                                 <?php
 /* echo $form->field($modelAddress, "[{$i}]element_code")->dropDownList($element, ['prompt' => '','class'=>'form-control-dp'],['onchange' => '$.post("'.Yii::$app->urlManager->createUrl(["judgment-data-point/dp"]).'", function( data ) {

      
     })'])*/;?>
        <?= $form->field($modelAddress, "[{$i}]element_code")->dropDownList($element,['prompt'=>'','class'=>'form-control-dp'/*,'ajax'=>[
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
                             

                              <div class="col-sm-2">
                                <?= $form->field($modelAddress, "[{$i}]data_point")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelAddress, "[{$i}]weight_perc")->textInput() ?>
                                 
                             </div>
                             <div class="col-sm-1">
                                <label>Total %</label>
                                <input type="text" name="" value="">
                                 
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
