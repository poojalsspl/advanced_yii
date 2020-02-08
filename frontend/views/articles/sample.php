<?php 
use frontend\models\Articles;
use yii\helpers\ArrayHelper;
$username = Yii::$app->user->identity->username;
?>

 <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Article Writing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php $tot_article = Articles::find()->where(['username'=>$username])->count();
                 $complete_article = Articles::find()->where(['username'=>$username])->andWhere(['not', ['completion_date' => null]])->count();
                  $pending_article = Articles::find()->where(['username'=>$username])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count(); ?>
              <blockquote>
                <dl class="dl-horizontal">
                <dt>Total Allocated</dt>
                <dd><?= $tot_article;?></dd>
                <dt>Total Completed</dt>
                <dd><?= $complete_article;?></dd>
                <dt>Total Pending</dt>
                <dd><?= $pending_article;?></dd>
                
              </dl>
             <a href="index"><button type="button" class="btn btn-block btn-primary">Start</button></a>
                
              </blockquote>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        </div>

        <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-folder"></i>

              <h3 class="box-title">Project Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <blockquote>
                <p>Upload a complete project report. Maximum marks are 200</p>
                <!-- <p>Here is a format for Project Report</p> -->
                 <a href="#"><button type="button" class="btn btn-block btn-primary">Project</button></a>
              </blockquote>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        </div>
 </section>