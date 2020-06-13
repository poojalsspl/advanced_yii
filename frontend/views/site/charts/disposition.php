<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Disposition';
?>
<a href="/advanced_yii/site/dashboard" class="btn btn-primary"><i class="fa fa-arrow-left"> &nbsp;Back to Dashboard</i></a>
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