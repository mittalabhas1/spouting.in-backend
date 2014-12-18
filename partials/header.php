<?php
	require_once('db.php');
	if (!isset($_SESSION['user'])) {
		header('location: ../');
	}
	$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SPOUTING+</title>

    <link href="../static/bootstrap.min.css" rel="stylesheet">
    <link href="../static/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../static/style.min.css" rel="stylesheet">
    <link href="../static/main.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <?php include ('nav.php'); ?>
        </nav>

        <div id="page-wrapper" class="gray-bg">
	        <div class="row border-bottom">
		        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
		            <ul class="nav navbar-top-links navbar-right">
		                <li>
		                    <span class="m-r-sm text-muted welcome-message">Welcome to SPOUTING+</span>
		                </li>
		                <li>
		                    <a href="../?logout=1">
		                        <i class="fa fa-sign-out"></i> Log out
		                    </a>
		                </li>
		            </ul>
		        </nav>
	        </div>
	        <div class="wrapper wrapper-content">