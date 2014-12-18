<?php
require_once('../partials/header.php');

$query = mysql_query("SELECT * FROM product WHERE 1");
?>

<div class="row">

	<div class="col-lg-4">
	    <div class="contact-box label-success" style="background: #1c84c6;">
	        <a href="edit.php">
	        <div class="col-sm-5">
	            <div class="text-center">
	                <img alt="image" class="img-circle m-t-xs img-responsive" src="../static/new.jpg">
	                <div class="m-t-xs font-bold">
	                	Code
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-7">
	            <h3><strong>Product Name</strong></h3>
	            <address class="m-b-xs">
	                <strong>
	                	<i class="fa fa-key"></i> Keyword
	                </strong>
	            </address>
	            <p><i class="fa fa-pencil"></i> Description</p>
	        </div>
	        <div class="clearfix"></div>
	        </a>
	    </div>
	</div>

	<?php
	while ($product = mysql_fetch_assoc($query)) { 
		?>
			<div class="col-lg-4">
			    <div class="contact-box">
			        <a href="edit.php?id=<?php echo $product['id']; ?>">
			        <div class="col-sm-5">
			            <div class="text-center">
			                <img alt="image" class="img-circle m-t-xs img-responsive" src="../static/a3.jpg">
			                <div class="m-t-xs font-bold">
			                	<?php echo $product['code']; ?>
			                </div>
			            </div>
			        </div>
			        <div class="col-sm-7">
			            <h3><strong><?php echo $product['name']; ?></strong></h3>
			            <address class="m-b-xs">
			                <strong>
			                	<i class="fa fa-key"></i> <?php echo $product['keyword']; ?>
			                </strong>
			            </address>
			            <p><i class="fa fa-pencil"></i> <?php echo $product['description']; ?></p>
			        </div>
			        <div class="clearfix"></div>
			        </a>
			    </div>
			</div>
		<?php
	}
	?>
</div>

<?php
require_once('../partials/footer.php');
?>