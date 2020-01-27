<?php
use sjaakp\gcharts\PieChart;
//print_r($dataProvider);
?>

<?= PieChart::widget([
    'height' => '450px',
    'dataProvider' => $dataProvider,
    'columns' => [
        'jcatg_description:string',
        'tot'
          ],
    'options' => [
        'title' => 'Categories'
    ],
]) ?>
<?= PieChart::widget([
    'height' => '600px',
    'dataProvider' => $subdataProvider,
    'columns' => [
        'jsub_catg_description:string',
        'tot'
          ],
    'options' => [
        'title' => 'Sub Categories'
    ],
]) ?>