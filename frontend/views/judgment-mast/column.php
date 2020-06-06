<?php
use sjaakp\gcharts\ColumnChart;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\bootstrap\Modal;
use kartik\select2\Select2;
use frontend\models\StateMast;
use yii\widgets\ActiveForm;
?>
<?= ColumnChart::widget([
'height' => '400px',
'dataProvider' => $dataProvider,
'columns' => [
    'shrt_name:string',  // first column: domain
    'total',          // second column: data
    [               // third column: tooltip
        'value' => function($model, $a, $i, $w) {
            return "$model->state_name: $model->total";
        },
        'type' => 'string',
        'role' => 'tooltip',
    ],
],
'options' => [
    'title' => 'Statewise College List',
],
]) ?>

<?php 
 $form = ActiveForm::begin(); 
 $state = ArrayHelper::map(StateMast::find()->where(['not in', 'state_code', [1,6,8,9,19,37]])->all(), 'state_code', 'state_name');

?>
<?= $form->field($model, 'state_code')->widget(Select2::classname(), [
          'data' => $state,
          'options' => ['placeholder' => 'Select State'],
          'pluginEvents'=>[
            ]
          ]); ?>

 <?php ActiveForm::end(); ?>  

 <?php $customScript = <<< SCRIPT


$('#statemast-state_code').on('change', function(){
    var state_code = $(this).val();
    console.log(state_code);

 if(state_code=='')
 {
    alert('Please Select State');
 }
 else
$.ajax({
//type     :'GET',
url        : '/advanced_yii/judgment-mast/stategraph?id='+state_code,
dataType   : 'json',
success    : function(data){

console.log(data);
 
      var data1 = google.visualization.arrayToDataTable([
        ['Year', 'Visitations', { role: 'style' } ],
        ['2010', 10, 'color: gray'],
        ['2020', 14, 'color: #76A7FA'],
        ['2030', 16, 'opacity: 0.2'],
        ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
        ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
      ]);

$('#dictionary-synonym').val(synonym);
$('#dictionary-defination').val(defination);

},
});

}); 

SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);?> 