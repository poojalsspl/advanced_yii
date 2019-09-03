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
                     <!--        <div class="box-body">
                                
                              
                                  <a href="/judgment-mast/index" class="btn theme-blue-button btn-block">Judgment Mast</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Advocate</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Parties</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Referred</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Coram</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Overrules</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Citation</a>
                              
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Overruled by</a>
                              
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Ext Remark</a>
                              
                             
                            </div> -->
                              <div class="box-body">
                                
                                  <table>
                               <tr>
                                    <td>Name</td>
                                    <td><?=$model->first_name.' '.$model->last_name?></td>
                                </tr> 
                                <tr>
                                    <td>College Name</td>
                                    <td><?= 'IPS Academy';?></td>
                                </tr>  
                                <tr>
                                    <td>Course</td>
                                    <td><?= 'Judgment Analysis';?></td>
                                </tr> 
                                <tr>
                                    <td>Duration</td>
                                    <td><?= '1 Month' ;?></td>
                                </tr>
                                <tr>
                                    <td>Drafting</td>
                                    <td><?= '15'; ?></td>
                                </tr>
                                <tr>
                                    <td>Redrafting</td>
                                    <td><?= '5'; ?></td>
                                </tr>
                                <tr>
                                    <td>Days left</td>
                                    <td><?= '2'; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?= 'Pending'; ?></td>
                                </tr>   
                                     <tr>
                                    <td>Acts worked on</td>
                                    <td><?= '222'; ?></td>
                                </tr>
                                <tr>
                                    <td>Judgment Elements</td>
                                    <td><?= '15'; ?></td>
                                </tr>   
                                <tr>
                                    <td>Unique DataPoints</td>
                                    <td><?= '222'; ?></td>
                                </tr>      
                             </table>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-md-9 border-green">
                    <div class="row">
                        <div class="box-v2 box-info">
                            <div class="box-header with-border box-header-custom">
                                <div class="row">
                                    <div class="col-md-12 align-left">
                                        <span class="profile-title">Research Job Summary</span>
                                    </div>
                                       
                                    
                                </div>
                            </div>
                            <!-- /.box-header -->
                            
                               
                            <!----table------->
                            <table class="table table-striped">
                                <tr>
                                    <th>Job Name</th>
                                    <th>Total</th>
                                    <th>Pending</th>
                                    <th>Completed</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Judgment Alloted</th>
                                    <td>1000</td>
                                    <td>400</td>
                                    <td>600</td>
                                    <td><a href="/advanced_yii/judgment-mast/index" class="btn theme-blue-button btn-block">Begin</a></td>
                                </tr> 
                                <tr>
                                    <th>High Court Judgments Alloted</th>
                                    <td>600</td>
                                    <td>200</td>
                                    <td>400</td>
                                    <td></td>
                                </tr>  
                                <tr>
                                    <th>Supreme Court Judgments Alloted</th>
                                    <td>400</td>
                                    <td>100</td>
                                    <td>300</td>
                                    <td></td>
                                </tr> 
                                <tr>
                                    <th>Article Writing</th>
                                    <td>15</td>
                                    <td>5</td>
                                    <td>10</td>
                                    <td><a href="/advanced_yii/judgment-mast/index" class="btn theme-blue-button btn-block">Begin</a></td>
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
                

