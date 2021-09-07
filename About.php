<?php
require 'includes/common.php';?>

<!DOCTYPE html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About Us | Expense Manager</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Header -->
        <?php include 'includes/header.php';?>
        <!--Header end-->

        <!--Content starts here-->
    <div id="content"  >
        <div class="container-fluid" style="padding-bottom:50px">
        <!--Display the div element on left(default)-->
            <div class="col-md-5 col-xs-10 col-xs-offset-1">
                <h3>Who are we?</h3>
                <p>We Are a group of young technocrats who came up with an idea of solving budget and time issues which 
                we usually face in our daily lives. We are here to provide a budget controller according to your aspect.</p>
                <p>Budget Control is the biggest financial issue in the present world. One should look after their budget 
                control to get rid off from their financial crisis. We would also help in keeping the bill records and indivdual shares of a team expense.</p><br>
                <h3>Contact Us</h3>
                    <p><strong>Email:</strong> expensehelp@internshala.com<br>
                    <strong>Mobile:</strong> +91-8448444853</p>
                
            </div>
            <!--Display the div element on right-->
            <div class="col-md-5 col-md-offset-0 col-xs-offset-1 col-xs-10 right" >
                <h3>Why choose us?</h3>
                <p>We provide with a predominant ways to control and manage your budget estimations with ease of accessing for multiple users.</p>
                
            </div>

        </div>
    </div>
    <!--content ends here-->
 <!--Footer-->
 <?php include 'includes/footer.php';?>
        <!--Footer end-->
</body>
</html>
