<?php
    $valid = true;
    require_once('partials/db.php');
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        session_unset($_SESSION['user']);
    }
    if(isset($_SESSION['user'])){
        header('location: dashboard');
    }
    if (isset($_POST['login'])) {
        $query = mysql_query("SELECT * FROM users WHERE username='$_POST[username]' AND password='$_POST[password]'");
        if(mysql_num_rows($query) > 0) {
            $_SESSION['user'] = mysql_fetch_assoc($query);
            // var_dump($_SESSION['user']);
            header('location: dashboard');
        } else{
            $valid = false;
        }
    }
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TMMS+ | Login</title>

    <link href="static/bootstrap.min.css" rel="stylesheet">
    <link href="static/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="static/style.min.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen" style="margin-top: -100px">
        <div>
            <div>

                <!-- <h1 class="logo-name">TMMS+</h1> -->

            </div>
            <h3>Welcome to TMMS+</h3>
            <form class="m-t" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <input type="submit" name="login" value="Login" class="btn btn-primary block full-width m-b" />

                <?php
                    if(!$valid){
                        echo '<div class="label-danger">Invalid Credentials!</div>';
                    }
                ?>
                <!-- <a href="#"><small>Forgot password?</small></a> -->
            </form>
        </div>
    </div>

</body>

</html>
