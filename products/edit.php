<?php
require_once('../partials/header.php');

if (isset($_POST['update'])) {
    $query = mysql_query("UPDATE product SET name='$_POST[name]', code='$_POST[code]', description='$_POST[description]', category='$_POST[category]' WHERE id='$_POST[id]'") or die(mysql_error());
}

if (isset($_POST['add'])) {
    $query = mysql_query("INSERT INTO product SET name='$_POST[name]', keyword='$_POST[keyword]', code='$_POST[code]', description='$_POST[description]', category='$_POST[category]'") or die(mysql_error());
    header('location: ../products');
}

$product = false;
if(isset($_GET['id'])){
    $query = mysql_query("SELECT * FROM product WHERE id='$_GET[id]'");
    $product = mysql_fetch_assoc($query);
}
?>

<div class="col-lg-8 col-lg-offset-2 m-b">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <?php
            if ($product) {
                echo "<h5>Product - ".$product['name']."</h5>";
            } else{
                echo "<h5>Create New Product</h5>";
            }
            ?>
        </div>
        <div class="ibox-content">
        <?php
        if ($product) {
            echo '<form class="form-horizontal" action="edit.php?id='.$product['id'].'" method="POST">';
        } else{
            echo '<form class="form-horizontal" action="edit.php" method="POST">';
        }
        ?>
            <form class="form-horizontal" action="edit.php?id=<?php echo $product['id']; ?>" method="POST">
                <div class="form-group">
                	<label class="col-lg-3 control-label">Name</label>

                    <div class="col-lg-9">
                    <?php
                    if ($product) {
                        echo '<input type="hidden" name="id" value="'.$product['id'].'" class="form-control">';
                    }
                    ?>
                    	<input type="text" placeholder="Product Name" name="name" value="<?php echo $product['name']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Keyword</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Keyword" name="keyword" value="<?php echo $product['keyword']; ?>" class="form-control" <?php if($product){echo 'disabled';} ?>>
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Code</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Code" name="code" value="<?php echo $product['code']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Category</label>

                    <div class="col-lg-9">
                        <select name="category" class="form-control">
                        <?php
                        $categoryQuery = mysql_query("SELECT * FROM category");
                        while ($category = mysql_fetch_assoc($categoryQuery)) {
                            ?>
                            <option value="<?php echo $category['id']; ?>" <?php if($product['category'] == $category['id']){echo 'selected';} ?>><?php echo $category['name']; ?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Description</label>

                    <div class="col-lg-9">
                    	<textarea placeholder="Description" name="description" class="form-control"><?php echo $product['description']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                    <?php
                    if ($product) {
                        echo '<input type="submit" name="update" value="Update" class="btn btn-sm btn-primary pull-right" />';
                    } else{
                        echo '<input type="submit" name="add" value="Add" class="btn btn-sm btn-primary pull-right" />';
                    }
                    ?>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once('../partials/footer.php');
?>