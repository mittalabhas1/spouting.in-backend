<?php

// Starting the session
session_start();

// Credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "spouting";

//Connect to the host
$con = mysql_connect($host, $username, $password) or die(mysql_error("Couldn't connect!"));

// Connect to Database
mysql_select_db($database, $con) or die(mysql_error("Database unavailable!"));

?>