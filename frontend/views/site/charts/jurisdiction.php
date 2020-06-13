<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Judgment Jurisdiction';
?>
<a href="/advanced_yii/site/dashboard" class="btn btn-primary"><i class="fa fa-arrow-left"> &nbsp;Back to Dashboard</i></a>
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
                      