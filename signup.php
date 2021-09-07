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
        <title>Sign Up | Expense Manager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    </head>

    <body>
    <!--Header start-->
        <?php include 'includes/header.php';?>
    <!--Header End-->
        <div id="content">
            <div class="container-fluid decor_bg">
                <div class="row">
                    <div class="col-md-4 col-sm-8 col-sm-offset-2 col-md-offset-4">
                                        <!--Signup Panel-->
                        <div class="panel panel-default" >
                            <div class="panel-heading" style="background-color:white">
                                <h4 style="text-align:center">Sign up</h4>
                            </div>
                            <div class="panel-body">
                                <!--Form start-->
                                <form role="form" action="signup_script.php" method="POST">
                                        <div class="form-group"><label for="name">Name:</label>
                                            <input type="name" class="form-control" id="name" placeholder="Name" name="name" required>
                                        </div>
                                        <div class="form-group"><label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter Valid Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                        </div>
                                        <div class="form-group"><label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password(Min 6 characters)" name="password" required>
                                        </div>
                                        <div class="form-group"><label for="contact">Phone Number:</label>
                                            <input type="text" class="form-control" id="contact" placeholder="Enter Valid Phone Number (Ex-8543727234)" name="contact" max-length="10" size="10" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button><br><br>
                                    </form>
                                <!--Form End-->
                            </div>
                            
                        </div>
                <!--Panel End-->
                    </div>
                </div>
            </div>
        </div>
        <!--Footer start-->
        <?php include 'includes/footer.php';?>
        <!--Footer End-->
    </body>
</html>