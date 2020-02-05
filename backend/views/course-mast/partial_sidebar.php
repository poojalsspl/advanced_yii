	<?php
/* @var $this yii\web\View*/

use yii\helpers\Html;
use yii\helpers\Url;


\yii\web\YiiAsset::register($this);

?>	

		<div class="col-md-4 col-sm-4">
			


		
		<div class="widget Label" data-version="1" id="Label1">
			<h4>Our Courses</h4>
			<hr class="border">
			<div class="widget-content list-label-widget-content">
				<ul class="list-unstyled">
					<?php foreach($models as $model){?>
					<li>
						<i class="fa fa-book" aria-hidden="true"></i>
						<a dir="ltr" href="?id=<?=  $model['course_code']; ?>"><?=  $model['course_name']; ?></a>
						
					</li>
					 <?php } ?>
			
					
					
					
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		

		
		<h4 class="text-center">Social Media</h4>
		<hr class="border">
		<div class="text-center">
			<a href=""><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
			<a href=""><i class="fa fa-facebook-square fa-2x ml-3" aria-hidden="true"></i></a>
			<a href=""><i class="fa fa-twitter fa-2x ml-3" aria-hidden="true"></i></a>
			<a href=""><i class="fa fa-linkedin fa-2x ml-3" aria-hidden="true"></i></a>
		</div>
		
	</div>
	<!-- End Searchy blog-->