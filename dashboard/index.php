<?php
require_once('../partials/header.php');

$category_query = mysql_query("SELECT * FROM category");
$category_count = mysql_num_rows($category_query);

$product_query = mysql_query("SELECT * FROM product");
$product_count = mysql_num_rows($product_query);
?>

<div class="row">
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Categories</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $category_count; ?></h1>
                <small>Total Categories</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Products</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $product_count; ?></h1>
                <small>Total Products</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-primary pull-right">Today</span>
                <h5>Visits</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">106,120</h1>
                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                <small>New visits</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-danger pull-right">Low value</span>
                <h5>User activity</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">80,600</h1>
                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                <small>In first month</small>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../partials/footer.php');
?>