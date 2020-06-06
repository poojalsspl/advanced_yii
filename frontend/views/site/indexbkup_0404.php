<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

use kartik\widgets\ActiveForm;
use sjaakp\gcharts\ColumnChart;
$this->title = 'My Yii Application';
?>
<style type="text/css">
  /*.features-icons {
    padding-top: 112px;
    padding-bottom: 112px;
}*/
.text-center {
    text-align: center!important;
}
.bg-light {
    background-color: #f8f9fa!important;
    padding-top: 50px;
    padding-bottom: 50px;
}
.features-icons .features-icons-item .features-icons-icon i {
    font-size: 50px;
}
span h1{
    color: #185886;
    } 
    h3{
        color: #185886;
    }
    a.btn.btn_new{
        background-color:#185886; 
        color: #ffffff;
    }

</style>
<!-- ====slider=== -->
  <div class="slider">
    <div id="about-slider">
      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators visible-xs">
          <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-slider" data-slide-to="1"></li>
          <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active">
           <!--  <img src="img/7.jpg" class="img-responsive" alt=""> -->
             <?=Html::img('@web/images/landing/data_warehouse.jpg', ['class' => 'img-responsive'])?>
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                <h2><span></span></h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                <p></p>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
              
              </div>
            </div>
          </div>

          <div class="item">
          <!--   <img src="img/6.jpg" class="img-responsive" alt=""> -->
             <?=Html::img('@web/images/landing/data_mining.jpg', ['class' => 'img-responsive'])?>
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">
                <h2></h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.3s">
                <p></p>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">
               
              </div>
            </div>
          </div>
          <div class="item">
           <!--  <img src="img/1.jpg" class="img-responsive" alt=""> -->
             <?=Html::img('@web/images/landing/Legal_Fraternity.jpg', ['class' => 'img-responsive'])?>
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                <h2></h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                <p></p>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
            
              </div>
            </div>
          </div>
        </div>

        <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>

        <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
      <!--/#carousel-slider-->
    </div>
    <!--/#about-slider-->
  </div>
  <!--/end slider-->
  <!-- ====columnchart==== -->
  <span><h1 align="center">Law College Analytics Statewise</h1></span>
<?= ColumnChart::widget([
'height' => '400px',
'dataProvider' => $dataProvider,
'columns' => [
    'state_name:string',  // first column: domain
    'total',          // second column: data
    [               // third column: tooltip
        'value' => function($model, $a, $i, $w) {
            return "$model->state_name: $model->total";
        },
        'type' => 'string',
        'role' => 'tooltip',
    ],
],
// 'options' => [
//     'title' => 'Law College Analytics Statewise',
//     'titleTextStyle'=> [
//       'bold'=> 'true',
//       'italic'=> 'true',
//       'fontSize'=> '18',
//       'color'=>'#185886',
//   ],
// ],
]) ?>

<!-- ===== end columnchart===== --->

<!-- ==== feature ====-->
<section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fa fa-desktop m-auto text-primary"></i>
            </div>
            <h3>Workshop</h3>
            <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fa fa-certificate m-auto text-primary"></i>
            </div>
            <h3>Certificate</h3>
            <p class="lead mb-0">Donec a quam et orci porta hendrerit ac nec libero!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fa fa-book m-auto text-primary"></i>
            </div>
            <h3>Courses</h3>
            <p class="lead mb-0">Nunc dolor dui, mollis quis ex quis, cursus tempus felis!</p>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- ==== end feature ====-->


<!-- ==== courses ====-->
<div class="container">
     
<span><h1 align="center">Research Courses Offered</h1></span>
        <div class="row">
            <div class="col-lg-6">
                
                <h3>Workshop Case Law Research</h3>
                <hr>
                <p>Case Law Research is a 2 days workshop related with the various case laws delivered by india court of law.This 2 days online case law research workshop is custom designed for law students. An online platform is provided to the law student to analysis and research in depth the various case law and generate the data points that are available in the case law and each data point has it own important in research a case law with a relevant objective</p>
             <p><a class="btn btn_new" href="course-mast/view/?id=CLRW">Read More &raquo;</a>
               
                </p>
            </div>
            <div class="col-lg-6">
                <h3>Diploma in Case Law Research & Analytics</h3>
                <hr>
                <p>This course includes in depth study of Judgments delivered by various High Courts, Tribunals and Supreme Court of India. The diploma in case law analytic and research provides a strong foundation and a launching pad......... </p>

                <p> <?= Html::a('Read More ' . "&raquo;",'course-mast/view/?id=ADCLR002', ['class' => 'btn btn_new'])?></p>
            </div>
            
        </div>
  
</div>

<!-- ==== end courses ====-->




 <!--=== FAQ =====-->
<section id="faq" class="faq section bg-light">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Non consectetur a erat nam at lectus urna duis?</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Non consectetur a erat nam at lectus urna duis?</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Non consectetur a erat nam at lectus urna duis?</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div><!----col-md-6----->

        <div class="col-md-6">
            <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Non consectetur a erat nam at lectus urna duis?</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Non consectetur a erat nam at lectus urna duis?</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Non consectetur a erat nam at lectus urna duis?</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div><!----col-md-6----->


        </div>

      </div>
    </section>

    <!--====end FAQ=====-->

    <!-- ====slider=== -->
<div class="slider">
    <div id="about-slider">
      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators visible-xs">
          <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-slider" data-slide-to="1"></li>
          <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
           <div class="carousel-item active">
           
             <div class="col-md-4">
             <div class="card">
             <?=Html::img('@web/images/landing/logo_pioneer.png', ['class' => 'img-responsive'])?>
      
           </div>
          </div>
          </div>

           <div class="carousel-item">
          <div class="col-md-4">
            <div class="card">
             <?=Html::img('@web/images/landing/logo_pioneer.png', ['class' => 'img-responsive'])?>
            </div>
          </div>
        </div>
          <div class="carousel-item active">
           <div class="col-md-4">
             <div class="card">
             <?=Html::img('@web/images/landing/logo_pioneer.png', ['class' => 'img-responsive'])?>
             </div>
          </div>
        </div>

        <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>

        <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
      <!--/#carousel-slider-->
    </div>
    <!--/#about-slider-->
  </div>
  <!--/end slider-->
<!--feature-->
<!--   <div id="feature">
    <div class="container">
      <div class="row">
        <div class="text-center">
          <h3>Features</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit<br>amet consectetur adipisicing elit</p>
        </div>
        <div class="col-md-4 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
          <div class="text-center">
            <div class="hi-icon-wrap hi-icon-effect">
              <i class="fa fa-bookmark"></i>
              <h2>Certification</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
          <div class="text-center">
            <div class="hi-icon-wrap hi-icon-effect">
              <i class="fa fa-laptop"></i>
              <h2>Courses</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
          <div class="text-center">
            <div class="hi-icon-wrap hi-icon-effect">
              <i class="fa fa-cloud"></i>
              <h2>Easily Customize</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div> -->





