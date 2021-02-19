<?php
use yii\helpers\Url;
use frontend\models\AdvocateMast;

//$url = Url::base(true);
$sid = $student->std_id;
$countsurvey = AdvocateMast::find()->where(['std_id'=>$sid])->andWhere(['surv_status'=>'1'])->count();

?>



<section class="content-header">
<h3 style="color: #0f3652"><?= $student->student_name; ?></h3><br>
</section>
<div class="col-md-4">
<h4>PHASE I-Advocate Survey</h4> 
<p style="text-align: justify;">Following URL is the reference URL that can be copied and sent over email/Whatsapp to Advocates to sign up for Research & Marketing Survey Workshop.</p>
<a href="<?php echo Yii::$app->params['domainName'].'site/advocate-registration?sid='.$sid; ?>">         <?php echo Yii::$app->params['domainName'].'site/advocate-registration?sid='.$sid; ?></a> <br><br>

<hr>
<h4>PHASE II-Advocate Subscription on ADLAW.in</h4>
<p style="text-align: justify;">Following URL is the reference URL that can be copied and sent over email/Whatsapp to Advocates to Free Detail Profile Registration on ADLAW.in as Phase II Of Research & Marketing Survey Workshop For Marketing Students.</p>
<a href="#"><?php echo "https://adlaw.in/register?referral_code=0000343003"; ?></a> <br><br>

</div>

<div class="col-md-4">

<div class="row">

 <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-black-tie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Advocate Registration</span>
              <span class="info-box-number"><?= $count; ?>/<?= $student->allocated_qty; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                   <a href="/advanced_yii/site/advocate-index" style="color: white">Click here to view Advocate List</a>
                  </span>
            </div>
            
          </div>

           <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Survey Completion</span>
              <span class="info-box-number"><?= $countsurvey; ?>/<?= $student->allocated_qty; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                   <a href="/advanced_yii/site/advocate-main" style="color: white">Click here to view list whose survey is completed</a>
                  </span>
            </div>
            
          </div>

</div>
<br>

<!-- <a href="/advanced_yii/site/advocate-index" class="btn btn-primary">Advocate  List</a><br><br> -->
</div>

<div class="col-md-4">
<?php foreach($help as $help_file){?>
<h4 id="hlpName"><?= $help_file['help_name'] ?></h4>
<div class="hlpRemrk" style="display: none;"><?= $help_file['help_remark'] ?></div>

<a href="<?php echo Yii::$app->params['domainName'].'help_files/'.$help_file['help_url']; ?>" target="_blank"> <?php echo Yii::$app->params['domainName'].'help_files/'.$help_file['help_url']; ?></a>
<?php } ?>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hlpName").hover(function(){
    $(".hlpRemrk").toggle();
  });
});

</script> -->


 
               