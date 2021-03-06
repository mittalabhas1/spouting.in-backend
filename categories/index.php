<?php
require_once('../partials/header.php');

$query = mysql_query("SELECT * FROM category WHERE 1");
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
	            <h3><strong>Category Name</strong></h3>
	            <p><i class="fa fa-flask"></i> No. of Products</p>
	            <address>
	                <strong>
	                	<i class="fa fa-key"></i> Keyword
	                </strong>
	            </address>
	        </div>
	        <div class="clearfix"></div>
	        </a>
	    </div>
	</div>

	<?php
	while ($category = mysql_fetch_assoc($query)) { 
		?>
			<div class="col-lg-4">
			    <div class="contact-box">
			        <a href="edit.php?id=<?php echo $category['id']; ?>">
			        <div class="col-sm-5">
			            <div class="text-center">
			                <img alt="image" class="img-circle m-t-xs img-responsive" src="../static/images/categories/<?php echo $category['image'];?>">
			                <div class="m-t-xs font-bold">
			                	<?php echo $category['code']; ?>
			                </div>
			            </div>
			        </div>
			        <div class="col-sm-7">
			            <h3><strong><?php echo $category['name']; ?></strong></h3>
			            <p><i class="fa fa-flask"></i> <?php echo $category['products']; ?> Products</p>
			            <address>
			                <strong>
			                	<i class="fa fa-key"></i> <?php echo $category['keyword']; ?>
			                </strong>
			            </address>
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