<?php
require_once('../partials/db.php');

foreach ($_POST['product'] as $key => $value) {
	mysql_query("UPDATE product SET `ord_no` = '$key' WHERE `id` = '$value'") or die(mysql_error());
}

?>