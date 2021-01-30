<?php
use yii\helpers\Url;
use frontend\models\AdvocateMast;

//$url = Url::base(true);
$countsurvey = AdvocateMast::find()->where(['mkt_username'=>$_SESSION["username"]])->andWhere(['surv_status'=>'1'])->count();
//$countsurvey = '7';
?>
<h3><center><?= $student->student_name; ?></center></h3><br>

                <div class="col-md-4">
                  
                	<a href="/advanced_yii/site/advocate-registration" class="btn btn-primary">Advocate Registration</a><br><br>
                 
                  
                  <a href="/advanced_yii/site/advocate-index" class="btn btn-primary">Advocate  List</a><br><br>


                  <a href="/advanced_yii/site/survey" class="btn btn-primary">Survey</a><br><br>
                  

                </div>
                <div class="col-md-8">
                  <!-- Info boxes -->
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-black-tie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Advocate Registration</span>
              <span class="info-box-number"><b><?= $count; ?></b>/<?= $student->allocated_qty; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Survey Completion</span>
              <span class="info-box-number"><b><?= $countsurvey; ?></b>/<?= $student->allocated_qty; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        
        
      </div>
      <!-- /.row -->
                 

                  

                  
                </div>
                <!-- /.col -->
               