<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Judgment Analysis';
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
            <div class="col-md-8 border-right "> 
                <div class="row">
             <div class="col-md-12">
<!--  <div class="col-lg-3 col-md-4 col-xs-6 thumb pull-right mb-4">
                      <?php /*
                             $path = Yii::$app->homeUrl . 'frontend/web/images/';
                             $image = 'JudgmentAnalysis.jpg';*/
                            
                          ?>
                <a href="<?php //echo $img = $path.'/'.$image ; ?>" target="_blank" data-toggle="modal" data-target="#legal" data-title="Integrated Legal Research">
                    
                    <img src="<?php //echo $img = $path.'/'.$image ; ?>" class="zoom img-fluid">
                </a>
            </div> -->
           
           <!--  <div class="modal modal fade mt-5" id="legal" tabindex="-1">
    <div class="modal-dialog modal-lg bg-white">
          <button type="button"  id="btn" class="close position-absolute text-white rounded-circle" data-dismiss="modal">&times;</button>  -->
        <!-- Modal body -->
       <!--  <div class="modal-body">
         <img src="<?php //echo $img = $path.'/'.$image ; ?>"  class=" img-fluid "> 
        </div>

    </div>
  </div> -->

<ul>
                    <p><li><strong>COURSE NAME &nbsp;:</strong> &nbsp;<?php echo $model->course_name;?></li></p> 
                <p><li><strong>ELIGIBILITY &nbsp;:</strong> &nbsp;<?php echo $model->course_eligibility ;?></li></p> 
                <p><li><strong>DURATION OF COURSE &nbsp;:</strong> &nbsp;<?php echo $model->course_duration." Months";?></li></p> 
                </ul>
                <br>
<h4><strong>INTRODUCTION</strong></h4>
<hr>
<p>
    <?php echo $model->course_intro;?>
</p>

<p>
<h4><strong>OBJECTIVE OF THE COURSE:</strong></h4>   
<hr>     
<?php echo $model->course_objective;?></p>
<p>
    <h4><strong>SYLLABUS:</strong></h4>
    <?php echo $model->course_syllabus;?>
</p>
<p>
    <h4><strong>COURSE CONTENT:</strong></h4><hr>

   <?php echo $model->course_content;?>
</p>
<p>
    <h4><strong>COURSE SUMMARY:</strong></h4>
    <hr>
    <?php echo $model->course_summary;?>
</p>



</div>
</div>
</div>

<?=$this->render('partial_sidebar.php');?>

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
</style>



