<?php
require 'includes/common.php';

//Only logged in user can access 
if(!isset($_SESSION['email'])){
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Plan | Expense Manager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>

                <!--To remove arrows from number input type-->
        <style>
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
</style>
    </head>

    <body>
            <!--Header starts-->
        <?php include 'includes/header.php';?>
            <!--Header ends-->

        <div id="content">
            <div class="container-fluid decor_bg">
                <div class="row">

                <!--Create plan Panel starts here-->
                    <div class="col-md-4 col-sm-8 col-sm-offset-2 col-md-offset-4">
                        <div class="panel panel-default" >
                            <div class="panel-heading pnl-head">
                                <h4 style="text-align:center">Create New Plan</h4>
                            </div>
                            <div class="panel-body">
                                <!--Form starts here-->
                                <form role="form" action="create_pg2.php" method="POST">
                                    <div class="form-group"><label for="budget"style="font-weight:normal;padding-bottom:8px">Initial Budget</label>
                                    
                                        <input type='number' class='form-control' id="budget" placeholder='Initial Budget (Ex. 4000)' min="50"name='budget' required>
                                        
                                    </div>
                                    <div class="form-group"><label for="people" style="font-weight:normal;padding-bottom:8px">How many people you want to add in your group?</label>
                                        <input type="number" class="form-control" id="people" placeholder="No. of people" min="1" name="people" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-change">Next</button>
                                </form>
                                <!--Form ends-->
                            </div>
                            
                        </div>
                    </div>
                <!--Panel Ends-->
                </div>
            </div>
        </div>
        <!--Footer Starts-->
        <?php include 'includes/footer.php';?>
        <!--Footer Ends-->
    </body>
</html>