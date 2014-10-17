<?php

$con = mysql_connect("localhost", "root", "") or die(mysql_error("Couldn't connect!"));
mysql_select_db("spouting", $con) or die(mysql_error("Database unavailable!"));

?>