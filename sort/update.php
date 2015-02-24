<?php
require_once('../partials/db.php');

foreach ($_POST['category'] as $key => $value) {
	mysql_query("UPDATE category SET `ord_no` = '$key' WHERE `id` = '$value'") or die(mysql_error());
}

?>