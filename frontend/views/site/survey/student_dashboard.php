<?php
use yii\helpers\Url;
use frontend\models\AdvocateMast;

$sid = $student->std_id;
$courseName = $student->course_name;
$countsurvey = AdvocateMast::find()->where(['std_id'=>$sid])->andWhere(['surv_status'=>'2'])->count();
?>
<style type="text/css">
  .products-list .product-info{
    margin-left: 0px;
  }
</style>
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Yii::$app->params['domainName'].'images/user.jpg'?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $student->student_name; ?></p>
            </div>
        </div>

       <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => ' ', 'options' => ['class' => 'header']],
                    ['label' => 'Our Sponsors', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Modified Password', 'icon' => 'dashboard', 'url' => ['/debug']],
                    

                ],
            ]
        ) ?>

    </section>
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Certificate  & Intership Programme for <span style="color: Grey">"<?= $courseName;?>"</span> 
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $count; ?></h3>

              <p>Total Advocates</p>
            </div>
            <div class="icon">
              <i class="fa fa-black-tie"></i>
            </div>
            <a href="/advanced_yii/site/advocate-index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $countsurvey; ?></h3>

              <p>Total Survey Completed</p>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
            <a href="/advanced_yii/site/advocate-main" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>1</h3>

              <p>Approved Adlaw Subscription</p>
            </div>
            <div class="icon">
              <i class="fa fa-star"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>2</h3>

              <p>Advocate Registered on Adlaw</p>
            </div>
            <div class="icon">
              <i class="fa fa-sticky-note-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        
        <!-- left col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Referral Links</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  
                  <div class="product-info">
                    <span class="product-title">Advocate Registration for Survey
                      </span>
                    <span class="product-description">
                         <?php if(!empty($student->referral_code)){ ?>
                          <a href="<?php echo Yii::$app->params['domainName'].'site/advocate-registration?sid='.$sid; ?>" id="advreg">         <?php echo Yii::$app->params['domainName'].'site/advocate-registration?sid='.$sid; ?></a><br><br>
                             <button class="label label-info pull-left form-control" onclick="copyToClipboard('#advreg')">Click Here to Copy URL</button>
                             
                           <? } ?>
                           
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-info">
                    <span class="product-title">Subscription on ADLAW.in</span>
                    <span class="product-description">
                          <?php if(!empty($student->referral_code)){ 
                               $ref_code = $student->referral_code;
                          ?>
                          <a href="<?php echo "https://adlaw.in/register?referral_code=".$ref_code; ?>" id= "adlawreg"><?php echo "https://adlaw.in/register?referral_code=".$ref_code; ?></a><br><br>
                          <button class="label label-info pull-left form-control" onclick="copyToClipboard('#adlawreg')">Click Here to Copy URL</button>
                          <input type="hidden" placeholder="Paste here for test" />
                          
                          <? }else{ ?>
                             <span>links will generate after targeted survey completion</span>
                          <?php } ?>
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                             
              </ul>
            </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
        </section>
        <!-- left col -->
        <!-- right col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              
              <li class="pull-left header"><i class="fa fa-bar-chart"></i> Registration Status Charts Against Targets</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

        </section>
        <!-- /.right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
  function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
