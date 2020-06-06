<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Disposition';
?>
                   <?= PieChart::widget([
                    'height' => '600px',
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'disposition_text:string',
                        'total'
                          ],
                    'options' => [
                        'title' => 'Disposition',
                        'is3D' => true,
                    ],
                      ]) ?>