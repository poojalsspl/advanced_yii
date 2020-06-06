<?php
use sjaakp\gcharts\PieChart;
//print_r($dataProvider);
?>

<?= PieChart::widget([
    'height' => '450px',
    'dataProvider' => $dataProvider,
    'columns' => [

        'bareact_desc:string',
        'total'
          ],
    'options' => [
        'title' => 'Categories',
        'is3D' => true,
    ],
]) ?>




