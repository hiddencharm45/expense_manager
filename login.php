<?php
require 'includes/common.php';
if (isset($_SESSION['email'])) 
{ 
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Expense Manager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
     <!-- Header -->
        <?php include 'includes/header.php';?>
    <!-- Header Ends -->
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                 <!-- Login Panel Starts here -->
                    <div class="col-md-4 col-sm-8 col-sm-offset-2 col-md-offset-4">
                        <div class="panel panel-default" >
                         <!-- Panel heading -->
                            <div class="panel-heading" style="background-color:white">
                                <h4 style="text-align:center">Login</h4>
                            </div>
                             <!-- Panel Body -->
                            <div class="panel-body">
                                
                                <form role="form" action="login_submit.php" method="POST">
                                    <div class="form-group"><label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="form-group"><label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                                </form>
                            </div>
                             <!-- Panel Footer -->
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Click here to Sign-up</a></p></div>
                        </div>
                    </div>
                     <!-- Login Panel Ends -->
                </div>
            </div>
        </div>
         <!-- Footer-->
        <?php include 'includes/footer.php';?>
         <!-- Footer Ends -->
    </body>
</html>