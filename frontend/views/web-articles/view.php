<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $model->sef_title;


//$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <h2 class=""><b><?php //echo $model->title;?></b></h2>
                 <span>By <b><?php echo $model->author;?></b>&nbsp;<sub><?php echo $model->pub_date;?></sub></span>
                 <hr class="m-0">
        </div>
        <div class="col-sm-12 col-lg-12 col-xs-12">
            <div class="row">
              <!-- <div class="col-md-8 border-right ">  -->
                <!-- <div class="row"> -->
                  <!-- <div class="col-md-12"> -->
                     <h2 class=""><b><?php echo $model->title;?></b></h2>
                    <?php
                    $path = Yii::$app->homeUrl . 'frontend/web/images/article_images';
                                $image = $model->abstract_image;
                                if ($image==""){$image = "No-image-available.jpg";}
                    ?>
                    
               <img class="img-responsive" src="<?php echo $img = $path.'/'.$image ; ?>"   align="left" style="margin: 0px 10px 0px 0px;">
                    
                    
                   
                 <p><?php echo $model->body;?></p>
                 <strong>Keyword : </strong><?php echo $model->sef_keyword;?>
                
                    
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



