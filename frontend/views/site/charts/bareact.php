<?php
use sjaakp\gcharts\PieChart;
$this->title = 'Bareact';
?>
<a href="/advanced_yii/site/dashboard" class="btn btn-primary"><i class="fa fa-arrow-left"> &nbsp;Back to Dashboard</i></a>
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