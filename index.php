
<?php
//Required database connection files and session
require "includes/common.php";
//Check Session set or not if set then directed to home page
if (isset($_SESSION['email'])) 
{ 
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Expense Manager</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>

</style>

<body style="padding-top:50px;border:0px">
    <!-- Header -->
    <?php include 'includes/header.php';?>
    <!--Header end-->
    <div id="banner_image">
        <div class="container">	
            <!--Banner content-->
            <div id="banner_content">
                <h1>We help you control your budget</h1><br/>
                <a  href="login.php" class="btn btn-success btn-lg active">Start Today</a>
            </div>
        </div>
    </div>
 <!--Footer-->
 <?php include 'includes/footer.php';?>
<!--Footer end-->


</body>
</html>
