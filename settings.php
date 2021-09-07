<?php
require_once("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Change Password | Expense Manager</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
     <!-- Header -->
        <?php include 'includes/header.php'; ?>
         <!-- Header Ends -->
        <div id="content">
            <div class="container-fluid decor_bg">
                <div class="row">
                 <!-- Change Password Panel-->
                    <div class="col-md-4 col-sm-8 col-sm-offset-2 col-md-offset-4">
                        <div class="panel panel-default" >
                            <div class="panel-heading" style="background-color:white">
                                <h4 style="text-align:center">Change Password</h4>
                            </div>
                            <div class="panel-body">
                                 <!-- Form Starts -->
                                <form role="form" action="settings_script.php" method="POST">
                                        <div class="form-group"><label for="psw">Old Password</label>
                                            <input type="password" class="form-control" id="psw" placeholder="Old Password" name="psw" required>
                                        </div>
                                        <div class="form-group"><label for="new_pass">New Password</label>
                                            <input type="password" class="form-control" id="new_pass" placeholder="New Password(Min 6 characters)" name="new_pass" required>
                                        </div>
                                        <div class="form-group"><label for="pass_cnf">Confirm New Password</label>
                                            <input type="password" class="form-control" id="pass_cnf" placeholder="Re-Type New Password" name="pass_cnf" max-length="10" size="10" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Change</button>
                                </form>
                                 <!-- Form Ends -->
                            </div>
                        </div>
                    </div>
                     <!-- Panel Ends -->
                </div>
            </div>
        </div>
         <!-- Footer -->
        <?php include("includes/footer.php"); ?>
         <!-- Footer Ends -->
    </body>
</html>