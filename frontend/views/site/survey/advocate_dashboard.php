<div class="content">
<section class="content-header">
<h3 style="color: #0f3652"></h3><br>
</section>
<div class="col-md-4">


</div>

<div class="col-md-4">
            
            <div class="form-group">
            	<label>Name</label>
                <input type="text" class="form-control"  value="<?= $model->advocate_name ?>" readonly="readonly">
            </div>
            <div class="form-group">
            	<label>Date of Birth</label>
                <input type="text" class="form-control" value="<?= $model->dob ?>" readonly="readonly">
            </div>
        
       
            <div class="form-group">
            	<label>Mobile Number</label>
                <input type="text" class="form-control"  value="<?= $model->mobile ?>" readonly="readonly">
            </div>
            <?php $gender = $model->gender ; ?>
            <?php if ($gender=='F'){ $gender = "Female";}else{$gender = "Male";} ?>
            <div class="form-group">
            	<label>Gender </label>
                <input type="text" class="form-control"  value="<?= $gender ?>" readonly="readonly">
            </div>
           <?php $adv_id = $model->adv_id ; ?>
            <a href="<?php echo Yii::$app->params['domainName'].'site/survey?adv_id='.$adv_id; ?>" class="btn btn-success">Survey Status</a>

</div>

<div class="col-md-4">


</div>
</div>

