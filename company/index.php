<?php
require_once('../partials/header.php');

if (isset($_POST['update'])) {
    // var_dump($_POST);
    $query = mysql_query("UPDATE company_details SET name='$_POST[name]', tagline='$_POST[tagline]', web_address='$_POST[web_address]', about_mmc='$_POST[about_mmc]', about_spouting='$_POST[about_spouting]', address='$_POST[address]', phone='$_POST[phone]', email='$_POST[email]' WHERE 1");
    // var_dump($query);
    // var_dump("UPDATE company_details SET name='$_POST[name]', tagline='$_POST[tagline]', web_address='$_POST[web_address]', about_mmc='$_POST[about_mmc]', about_spouting='$_POST[about_spouting]', address='$_POST[address]', phone='$_POST[phone]', email='$_POST[email]' WHERE 1");
    // exit();
}

$query = mysql_query("SELECT * FROM company_details");
$company = mysql_fetch_assoc($query);
// var_dump($company);
?>

<div class="col-lg-8 col-lg-offset-2 m-b">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Company Description</h5>
        </div>
        <div class="ibox-content">
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                	<label class="col-lg-3 control-label">Name</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Name of the Company" name="name" value="<?php echo $company['name']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Tagline</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Tagline" name="tagline" value="<?php echo $company['tagline']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Web Address</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Web Address" name="web_address" value="<?php echo $company['web_address']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">About MMC</label>

                    <div class="col-lg-9">
                    	<textarea placeholder="About MMC" name="about_mmc" class="form-control"><?php echo $company['about_mmc']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">About Spouting</label>

                    <div class="col-lg-9">
                    	<textarea placeholder="About Spouting" name="about_spouting" class="form-control"><?php echo $company['about_spouting']; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                	<label class="col-lg-3 control-label">Address</label>

                    <div class="col-lg-9">
                    	<textarea placeholder="Address" name="address" class="form-control"><?php echo $company['address']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Phone No.</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Phone No." name="phone" value="<?php echo $company['phone']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Email Address</label>

                    <div class="col-lg-9">
                    	<input type="email" placeholder="Email Address" name="email" value="<?php echo $company['email']; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" name="update" value="Update" class="btn btn-sm btn-primary pull-right" type="submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once('../partials/footer.php');
?>