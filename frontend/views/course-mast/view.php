<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Case Law';
//$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <h2 class=""><b><?php echo $model->course_name;?></b></h2>
                 <hr class="m-0">
        </div>
        <div class="col-sm-12 col-lg-12 col-xs-12">
            <div class="row">
              <!-- <div class="col-md-8 border-right ">  -->
                <!-- <div class="row"> -->
                  <!-- <div class="col-md-12"> -->
                    <ul>
                    <p><li><strong>COURSE NAME &nbsp;:</strong> &nbsp;<?php echo $model->course_name;?></li></p> 
                    <p><li><strong>ELIGIBILITY &nbsp;:</strong> &nbsp;<?php echo $model->course_eligibility ;?></li></p> 
                    <p><li><strong>DURATION OF COURSE &nbsp;:</strong> &nbsp;<?php echo $model->course_duration." ".$model->course_duration_unit;?></li></p> 
                    </ul>
                    <br>
                    <h4><strong>INTRODUCTION</strong></h4>
                    <hr>
                    <p><?php echo $model->course_intro;?></p>
                    <p><h4><strong>OBJECTIVE OF THE COURSE:</strong></h4>   
                    <hr>     
                    <?php echo $model->course_objective;?></p>
                    <p>
                    <h4><strong>SYLLABUS:</strong></h4>
                    <hr>
                    <?php echo $model->course_syllabus;?>
                    </p>
                    <p><h4><strong>COURSE CONTENT:</strong></h4>
                    <hr>
                    <?php echo $model->course_content;?>
                    </p>
                    <p><h4><strong>COURSE SUMMARY:</strong></h4>
                    <hr>
                    <?php echo $model->course_summary;?>
                    </p>
                    <p><h4><strong>COURSE MARKING:</strong></h4>
                    <hr>
                    <?php echo $model->course_marking;?>
                    </p>
                 <!--  </div> -->
                <!-- </div> -->
              <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
<br><br>
<style type="text/css">
    .zoom:hover {
  transform: scale(1.2); 
}
.zoom {
  transition: transform .1s; /* Animation */
}
#btn{
   background: #111;
   z-index: 904;
    opacity: 1;
    width: 22px;
    top: -14px;
    right: -9px;
}
body{
    font-family: Verdana,sans-serif;
    font-size: 15px;
    line-height: 1.5;
}
p{
    text-align: justify;
}
h4{
  color: #3383ff;
}
</style>



