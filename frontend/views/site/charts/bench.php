<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Judgment Bench';
?>
    <?= PieChart::widget([
    'height' => '600px',
    'dataProvider' => $dataProvider,
    'columns' => [
        'bench_type_text:string',
        'total'
          ],
    'options' => [
        'title' => 'Judgment Bench',
        'is3D' => true,
    ],
      ]) ?>