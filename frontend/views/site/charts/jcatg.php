<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Judgment Category';
?>


<?= PieChart::widget([
'height' => '600px',
'dataProvider' => $dataProvider,
'columns' => [
    'jcatg_description:string',
    'total'
      ],
'options' => [
    'title' => 'Judgment Category',
    'is3D' => true,
],
  ]) ?>