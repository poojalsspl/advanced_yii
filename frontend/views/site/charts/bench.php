<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Judgment Bench';
?>
<a href="/advanced_yii/site/dashboard" class="btn btn-primary"><i class="fa fa-arrow-left"> &nbsp;Back to Dashboard</i></a>
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