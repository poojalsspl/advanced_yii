<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Judgment Jurisdiction';
?>
                       <?= PieChart::widget([
                    'height' => '600px',
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'judgmnent_jurisdiction_text:string',
                        'total'
                          ],
                    'options' => [
                        'title' => 'Judgment Jurisdiction',
                        'is3D' => true,

                    ],
                      ]) ?>
                      