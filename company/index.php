<?php
require_once('../partials/header.php');
?>

<div class="col-lg-8 col-lg-offset-2">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Company Description</h5>
        </div>
        <div class="ibox-content">
            <form class="form-horizontal">
                <div class="form-group">
                	<label class="col-lg-3 control-label">Name</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Name of the Company" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Tagline</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Tagline" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Web Address</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Web Address" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">About MMC</label>

                    <div class="col-lg-9">
                    	<textarea placeholder="About MMC" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">About Spouting</label>

                    <div class="col-lg-9">
                    	<textarea placeholder="About Spouting" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                	<label class="col-lg-3 control-label">Address</label>

                    <div class="col-lg-9">
                    	<textarea placeholder="Address" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Phone No.</label>

                    <div class="col-lg-9">
                    	<input type="text" placeholder="Phone No." class="form-control">
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-lg-3 control-label">Email Address</label>

                    <div class="col-lg-9">
                    	<input type="email" placeholder="Email Address" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-primary pull-right" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once('../partials/footer.php');
?>