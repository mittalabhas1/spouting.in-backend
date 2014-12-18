<?php
require_once('../partials/header.php');

if (isset($_POST['update'])) {
    $query = mysql_query("UPDATE category SET name='$_POST[name]', keyword='$_POST[keyword]', code='$_POST[code]', description='$_POST[description]' WHERE id='$_POST[id]'") or die(mysql_error());
}

if (isset($_POST['add'])) {
    $query = mysql_query("INSERT INTO category SET name='$_POST[name]', keyword='$_POST[keyword]', code='$_POST[code]', description='$_POST[description]'") or die(mysql_error());
    header('location: ../categories');
}

$category = false;
if(isset($_GET['id'])){
    $query = mysql_query("SELECT * FROM category WHERE id='$_GET[id]'");
    $category = mysql_fetch_assoc($query);
}
?>

<div class="col-lg-8 col-lg-offset-2 m-b">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <?php
            if ($category) {
                echo "<h5>Category - ".$category['name']."</h5>";
            } else{
                echo "<h5>Create New Category</h5>";
            }
            ?>
        </div>
        <div class="ibox-content">
        <?php
        if ($category) {
            echo '<form class="form-horizontal" action="edit.php?id='.$category['id'].'" method="POST">';
        } else{
            echo '<form class="form-horizontal" action="edit.php" method="POST">';
        }
        ?>
            <form class="form-horizontal" action="edit.php?id=<?php echo $category['id']; ?>" method="POST">
                <div class="form-group">
                	<label class="col-lg-3 control-label">Name</label>

                    <div class="col-lg-9">
                    <?php
                    if ($category) {
                        echo '<input type="hidden" name="id" value="'.$category['id'].'" class="form-control">';
                    }
                    ?>
                    	<input type="text" placeholder="Category Name" name="name" value="<?php echo $category['name']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Keyword</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Keyword" name="keyword" value="<?php echo $category['keyword']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Code</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Code" name="code" value="<?php echo $category['code']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Description</label>

                    <div class="col-lg-9">
                    	<textarea placeholder="Description" name="description" class="form-control"><?php echo $category['description']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                    <?php
                    if ($category) {
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