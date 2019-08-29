<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


//$this->params['breadcrumbs'][] = $this->title;

?>


<div class="template">
    <div class ="body-content">
        <div class="col-md-12">
            <div class="row">

                <!--SideBar Menu-->
                <div class="col-md-3 border-green side-menu">
                    <div class="row side-menu-content">
                        <div class="box box-v2">   
                            <div class="box-body">
                                
                              
                                  <a href="/judgment-mast/index" class="btn theme-blue-button btn-block">Judgment Mast</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Advocate</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Parties</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Referred</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Coram</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Overrules</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Citation</a>
                              
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Overruled by</a>
                              
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Ext Remark</a>
                              
                             
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-md-9 border-green">
                    <div class="row">
                        <div class="box-v2 box-info">
                            <div class="box-header with-border box-header-custom">
                                <div class="row">
                                    <div class="col-md-12 align-center">
                                        <span class="profile-title">Dashboard</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-5 col-xs-12">
                                   <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Name</div>
                                        <div class="col-md-6 profile-detail-text"><?=$model->first_name?></div>
                                    </div>
                                    
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Course</div>
                                        <div class="col-md-6 profile-detail-text"><?=$model->last_name?></div>
                                    </div>
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Judgment Alloted</div>
                                        <div class="col-md-6 profile-detail-text"><?= 'Law'; ?></div>
                                    </div>


                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Total Judgments</div>
                                        <div class="col-md-6 profile-detail-text"><?= '4568'; ?></div>
                                    </div>

                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Total HC </div>
                                        <div class="col-md-6 profile-detail-text"><?= 'Law'; ?></div>
                                    </div>


                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Total Judgments</div>
                                        <div class="col-md-6 profile-detail-text"><?= '4568'; ?></div>
                                    </div>

                                   

                                      <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Drafting</div>
                                        <div class="col-md-6 profile-detail-text"><?= '222'; ?></div>
                                    </div>

                                      <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Days left</div>
                                        <div class="col-md-6 profile-detail-text"><?= '222'; ?></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-12">

                                </div>

                                 <div class="col-md-5 col-xs-12 profile-detail">
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">College Name</div>
                                        <div class="col-md-6 profile-detail-text"><?=$model->first_name?></div>
                                    </div>
                                    
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Duration</div>
                                        <div class="col-md-6 profile-detail-text"><?=$model->last_name?></div>
                                    </div>
                                    
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Article Writing</div>
                                        <div class="col-md-6 profile-detail-text"><?= 'Law'; ?></div>
                                    </div>


                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Total Judgments</div>
                                        <div class="col-md-6 profile-detail-text"><?= '4568'; ?></div>
                                    </div>
                                    
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Total SC</div>
                                        <div class="col-md-6 profile-detail-text"><?=!empty($model->landline_1) ? $model->landline_1 : '-NA-' ?></div>
                                    </div>
                                    
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Status</div>
                                        <div class="col-md-6 profile-detail-text"><?= '222'; ?></div>
                                    </div>

                                   <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Status</div>
                                        <div class="col-md-6 profile-detail-text"><?= '222'; ?></div>
                                    </div>
                                    
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Redrafting</div>
                                        <div class="col-md-6 profile-detail-text"><?= '5'; ?></div>
                                    </div>
                                    <div class="col-md-4 col-md-offset-4" >
                                        <?= \yii\helpers\Html::a('<span><i class="fa fa-pencil"></i></span>  Update Profile', '#', [
                                            'class' => 'btn theme-blue-button btn-block'
                                        ])?>
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>
                    
                </div>
                </div>
            </div>
             </div>
        
    </div>
</div>
                

