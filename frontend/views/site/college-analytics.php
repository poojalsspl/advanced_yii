<?php
use sjaakp\gcharts\ColumnChart;
use sjaakp\gcharts\PieChart;

?>

 
  <div class="container">
    <!---- All States ---->
    <div class="row">
        <div class="col-md-12">
  <span><h1 align="center" style="color: #185886;">Law College Analytics Statewise</h1></span>
<?= ColumnChart::widget([
'height' => '400px',
'dataProvider' => $dataProvider,
'columns' => [
    'state_name:string',  
    'total',          
    [               
        'value' => function($model, $a, $i, $w) {
            return "$model->state_name: $model->total";
        },
        'type' => 'string',
        'role' => 'tooltip',
    ],
],

]) ?>
</div>
</div>
<!---- End All States ---->

<!----==============---->
    <!---- MP ---->
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
  <span><h3>Law Colleges in Madhya Pradesh</h3></span>
<?= ColumnChart::widget([
'height' => '400px',
'dataProvider' => $dataProvidermp,
'columns' => [
    'city_name:string',  
    'total',          
    [               
        'value' => function($model, $a, $i, $w) {
            return "$model->city_name: $model->total";
        },
        'type' => 'string',
        'role' => 'tooltip',
    ],
],

]) ?>

</div>
<!---- End MP ---->
<!---- End MH ---->
<div class="col-md-6">
    <span><h3>Law Colleges in Maharashtra</h3></span>  
  <?= ColumnChart::widget([
'height' => '400px',
'dataProvider' => $dataProvidermh,
'columns' => [
    'city_name:string',  
    'total',          
    [               
        'value' => function($model, $a, $i, $w) {
            return "$model->city_name: $model->total";
        },
        'type' => 'string',
        'role' => 'tooltip',
    ],
],

]) ?>
</div>
<!----  MH ---->
</div>
</div>

</div>
<!-- ===== end columnchart===== --->

