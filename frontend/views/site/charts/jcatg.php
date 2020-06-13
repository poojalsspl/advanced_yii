<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Judgment Category';
?>
<a href="/advanced_yii/site/dashboard" class="btn btn-primary"><i class="fa fa-arrow-left"> &nbsp;Back to Dashboard</i></a>

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