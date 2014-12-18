<?php
require_once('../partials/header.php');

$query = mysql_query("SELECT * FROM external_links WHERE 1");
?>

<div class="col-lg-6 col-lg-offset-3">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>External Links</h5>
        </div>
        <div class="ibox-content">

            <table class="table">
                <thead>
	                <tr>
	                    <th>#</th>
	                    <th>Name</th>
	                    <th>Link</th>
	                </tr>
                </thead>
                <tbody>
                <?php
                while ($link = mysql_fetch_assoc($query)) {
                	echo "<tr>
                	    <td>".$link['id']."</td>
                	    <td>".$link['name']."</td>
                	    <td>".$link['link']."</td>
                	</tr>";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
require_once('../partials/footer.php');
?>