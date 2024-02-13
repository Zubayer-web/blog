<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location: index.php");
}
require_once "../vendor/autoload.php";

    $login = new \App\classes\login();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Login - Zubayer Blog Website</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-body">

    <div class="container">
        <?php
           if(isset($_POST['signin'])){
            $login_error = $login->user_check_login($_POST);
            }
        ?>

        <form class="form-signin" action="" method="POST">
            <h2 class="form-signin-heading">sign in now</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" placeholder="User Name" autofocus name="username">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit" name="signin">Sign in</button>
              
                <div class="registration">
                    Don't have an account yet?
                    <a class="" href="registration.html">
                        Create an account
                    </a>
                    <p><?php if(isset($login_error)){
                        echo $login_error;
                    } ?></p>
                </div>

            </div>
        </form>
        
    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


</body>

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2019 15:06:10 GMT -->

</html>