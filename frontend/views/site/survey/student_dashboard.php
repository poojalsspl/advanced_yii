<?php
use yii\helpers\Url;

$url = Url::base(true);
?>
<h3><center><?= $student->student_name; ?></center></h3><br>

                <div class="col-md-4">
                  
                	<a href="/advanced_yii/site/advocate-registration" class="btn btn-primary">Advocate Registration</a><br><br>
                 
                  
                  <a href="/advanced_yii/site/advocate-index" class="btn btn-primary">Advocate  List</a><br><br>


                  <a href="/advanced_yii/site/survey" class="btn btn-primary">Survey</a><br><br>
                  

                </div>
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Advocate Registration</span>
                    <span class="progress-number"><b>0</b>/<?= $student->allocated_qty; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 0%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->

                  <div class="progress-group">
                    <span class="progress-text">Survey Completion</span>
                    <span class="progress-number"><b>0</b>/<?= $student->allocated_qty; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 0%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
               