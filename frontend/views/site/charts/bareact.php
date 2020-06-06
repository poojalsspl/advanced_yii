<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Bareact';
?>
                       <?= PieChart::widget([
                    'height' => '600px',
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'bareact_desc:string',
                        'total'
                          ],
                    'options' => [
                        'title' => 'Bareact',
                        'is3D' => true,
                    ],
                      ]) ?>