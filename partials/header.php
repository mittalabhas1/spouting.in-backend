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

    <link href="../static/favicon.ico" rel="icon" type="image/x-icon">

    <!-- External CSS -->
    <link href="../static/bootstrap.min.css" rel="stylesheet">
    <link href="../static/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../static/style.min.css" rel="stylesheet">
    <link href="../static/jquery-ui.css" rel="stylesheet">
    <!-- <link href="../static/jquery-ui.structure.css" rel="stylesheet"> -->
    <!-- <link href="../static/jquery-ui.theme.css" rel="stylesheet"> -->

    <!-- External Scripts -->
    <script type="text/javascript" src="../static/jquery.js"></script>
    <script type="text/javascript" src="../static/jquery-ui.js"></script>
    <script src="https://cdn.firebase.com/js/client/2.2.1/firebase.js"></script>

    <!-- Custom CSS, Scripts -->
    <link href="../static/main.css" rel="stylesheet">
    <script type="text/javascript">
    	function pushToWebsite(){
    		$.ajax('../partials/getPushData.php')
    		.done(function(data){
				console.log(data);
				$('#data-upload-alert').removeClass('hidden alert-danger');
				$('#data-upload-alert').addClass('alert-success');
				$('#data-upload-alert').html('<i class="fa fa-check"></i> Data successfully uploaded to spouting.in');
				var myFirebaseRef = new Firebase("https://spouting-in.firebaseio.com/");
				console.log(myFirebaseRef);
				myFirebaseRef.set({data: data});
			})
			.fail(function(error){
				console.log(error);
				$('#data-upload-alert').removeClass('hidden alert-success');
				$('#data-upload-alert').addClass('alert-danger');
				$('#data-upload-alert').html('<i class="fa fa-times"></i> Data uploaded failed !');
			});
    	};
    </script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <?php include ('nav.php'); ?>
        </nav>

        <div id="page-wrapper" class="gray-bg">
	        <div class="row border-bottom">
		        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
		        	<a class="minimalize-styl-2 btn btn-success" onclick="pushToWebsite();">
	    	          <i class="fa fa-upload"></i> PUSH TO WEBSITE
	    	        </a>
	    	        <a class="minimalize-styl-2 alert hidden" id="data-upload-alert"></a>
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