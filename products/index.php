<?php
require_once('../partials/header.php');
?>

<div class="row">

	<div class="col-lg-4">
	    <div class="contact-box label-success" style="background: #1c84c6;">
<!-- 	        <a href="profile.html"> -->
	        <div class="col-sm-5">
	            <div class="text-center">
	                <img alt="image" class="img-circle m-t-xs img-responsive" src="../static/new.jpg">
	                <div class="m-t-xs font-bold">&nbsp;</div>
	            </div>
	        </div>
	        <div class="col-sm-7">
	            <h3><strong>New Category</strong></h3>
	            <p><i class="fa fa-flask"></i> ? Products</p>
	            <address>
	                <strong>
	                	<i class="fa fa-key"></i> new-category
	                </strong>
	                <br>
	                <i class="fa fa-code"></i> CG-?
	            </address>
	        </div>
	        <div class="clearfix"></div>
<!-- 	            </a> -->
	    </div>
	</div>

	<?php
	for ($i=0; $i < 8; $i++) { 
		?>
			<div class="col-lg-4">
			    <div class="contact-box">
		<!-- 	        <a href="profile.html"> -->
			        <div class="col-sm-5">
			            <div class="text-center">
			                <img alt="image" class="img-circle m-t-xs img-responsive" src="../static/a3.jpg">
			                <div class="m-t-xs font-bold">&nbsp;</div>
			            </div>
			        </div>
			        <div class="col-sm-7">
			            <h3><strong>Driving Elements</strong></h3>
			            <p><i class="fa fa-flask"></i> 12 Products</p>
			            <address>
			                <strong>
			                	<i class="fa fa-key"></i> driving-elements
			                </strong>
			                <br>
			                <i class="fa fa-code"></i> CG-01
			            </address>
			        </div>
			        <div class="clearfix"></div>
		<!-- 	            </a> -->
			    </div>
			</div>
		<?php
	}
	?>
</div>

<?php
require_once('../partials/footer.php');
?>