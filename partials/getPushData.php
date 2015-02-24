<?php
include 'db.php';
$query = mysql_query("SELECT * FROM category WHERE 1");
$query = mysql_fetch_assoc($query);
var_dump($query);
?>