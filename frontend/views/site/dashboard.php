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
                                        <div class="col-md-6 profile-detail-text"><?=$model->first_name.' '.$model->last_name?></div>
                                    </div>
                                    
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Course</div>
                                        <div class="col-md-6 profile-detail-text"><?= 'Judgment Analysis';?></div>
                                    </div>
                                    


                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Cetificate</div>
                                        <div class="col-md-6"><button>View</button></div>
                                    </div>

                                   

                                      <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Drafting</div>
                                        <div class="col-md-6 profile-detail-text"><?= '15'; ?></div>
                                    </div>

                                       <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Days left</div>
                                        <div class="col-md-6 profile-detail-text"><?= '2'; ?></div>
                                    </div>

                                      <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Unique DataPoints</div>
                                        <div class="col-md-6 profile-detail-text"><?= '222'; ?></div>
                                    </div>

                                     
                                </div>
                                <div class="col-md-2 col-xs-12">

                                </div>

                                 <div class="col-md-5 col-xs-12 profile-detail">
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">College Name</div>
                                        <div class="col-md-6 profile-detail-text"><?= 'IPS Academy';?></div>
                                    </div>
                                    
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Duration</div>
                                        <div class="col-md-6 profile-detail-text"><?= '1 Month' ;?></div>
                                    </div>
                                    
                                   
                                    
                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Status</div>
                                        <div class="col-md-6 profile-detail-text"><?= 'Pending'; ?></div>
                                    </div>

                                     <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Redrafting</div>
                                        <div class="col-md-6 profile-detail-text"><?= '5'; ?></div>
                                    </div>

                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Acts worked on</div>
                                        <div class="col-md-6 profile-detail-text"><?= '222'; ?></div>
                                    </div>

                                    <div class="row profile-detail-section">
                                        <div class="col-md-6 profile-detail-label">Judgment Elements</div>
                                        <div class="col-md-6 profile-detail-text"><?= '15'; ?></div>
                                    </div>
                               
                                </div>
                               
                                
                            </div>

                            <!----table------->
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Total</th>
                                    <th>Pending</th>
                                    <th>Completed</th>
                                </tr>
                                <tr>
                                    <th>Judgment Alloted</th>
                                    <td>1000</td>
                                    <td>400</td>
                                    <td>600</td>
                                </tr> 
                                <tr>
                                    <th>Alloted High Court</th>
                                    <td>600</td>
                                    <td>200</td>
                                    <td>400</td>
                                </tr>  
                                <tr>
                                    <th>Alloted Supreme Court</th>
                                    <td>400</td>
                                    <td>100</td>
                                    <td>300</td>
                                </tr> 
                                <tr>
                                    <th>Articel Writing</th>
                                    <td>15</td>
                                    <td>5</td>
                                    <td>10</td>
                                </tr>     
                             </table>

                            <!-----end of table----->
                        </div>
                    
                </div>
                </div>
            </div>
             </div>
        
    </div>
</div>
                

