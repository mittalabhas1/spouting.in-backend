<?php
require_once('../partials/header.php');

if (isset($_POST['update']) or isset($_POST['add'])){
$target_dir = "../static/images/categories/";
$filename = basename($_FILES["image"]["name"]);
$target_file = $target_dir . $filename;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["update"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 10240000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        ;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

if (isset($_POST['update'])) {
    $query = mysql_query("UPDATE category SET name='$_POST[name]', code='$_POST[code]', description='$_POST[description]', image='$filename' WHERE id='$_POST[id]'") or die(mysql_error());
}

if (isset($_POST['add'])) {
    $query = mysql_query("INSERT INTO category SET name='$_POST[name]', keyword='$_POST[keyword]', code='$_POST[code]', description='$_POST[description]', image='$filename'") or die(mysql_error());
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
            echo '<form class="form-horizontal" action="edit.php?id='.$category['id'].'" method="POST" enctype="multipart/form-data">';
        } else{
            echo '<form class="form-horizontal" action="edit.php" method="POST" enctype="multipart/form-data">';
        }
        ?>
            <form class="form-horizontal" action="edit.php?id=<?php echo $category['id']; ?>" method="POST" enctype="multipart/form-data">
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
                    	<input type="text" placeholder="Keyword" name="keyword" value="<?php echo $category['keyword']; ?>" class="form-control" <?php if($category){echo 'disabled';} ?>>
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
                	<label class="col-lg-3 control-label">Image</label>

                    <div class="col-lg-9">
                    	<img alt="image" class="img-circle img-circle-product img-responsive" src="../static/images/categories/<?php echo $category['image'];?>">
                    <?php
                    if ($category) {
                        echo '<input type="file" name="image" value="Change Image" class="btn btn-sm btn-primary pull-right" />';
                    } else{
                        echo '<input type="file" name="image" value="Add Image" class="btn btn-sm btn-primary pull-right" />';
                    }
                    ?>
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