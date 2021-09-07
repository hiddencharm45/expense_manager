<?php
require 'includes/common.php';
if(!isset($_SESSION['email'])){
    header('location:index.php');
}
$user_id=$_SESSION['user_id'];

//Select data from Plan table
$query="SELECT plan_id,plan_name,no_of_people,budget,DATE_FORMAT(date_from,'%D %b'),DATE_FORMAT(date_to,'%D %b %Y') from plans where plans.user_id='$user_id' ORDER BY created_at DESC";
$query_result=mysqli_query($con,$query) or die(mysqli_error($con));
$no_of_rows=mysqli_num_rows($query_result);
$row_plan=mysqli_fetch_all($query_result);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard | Expense Manager</title>
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

         <!--Home page when user has no plan-->
        <?php if($no_of_rows==0){?>
            <div class="container" id="content">
                <p><h3>You don't have any active plans</h3></p><br>
                <div class="row">
                 <!-- Panel starts Here -->
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="panel panel-default" style="text-align:center">
                            <div class="panel-body" style="padding:80px 0px;"><a href="create_pg1.php">
                                <span class="glyphicon glyphicon-plus-sign" style="color:rgb(57, 137, 125)"></span> Create a new plan</a>
                            </div>
                        </div>
                    </div>
                 <!-- Panel Ends Here -->
                </div>
            </div> <?php }

        //If user have plans it's displayed
        
        else{ ?>
            <div id="content">
                <div class="container decor_bg" >
                <h2>Your Plans</h2><br>
                    <div class="row">
                        <?php
                            for($i=0;$i<$no_of_rows;$i++){
                                $plan_name=$row_plan[$i]['1'];//fetching through index numbers and not names;based on the position in query starting with index=0
                                $no_of_people=$row_plan[$i]['2'];
                                $budget=$row_plan[$i]['3'];
                                $date_to=$row_plan[$i]['5'];
                                $date_from=$row_plan[$i]['4'];
                                $planid=$row_plan[$i]['0'];
                                
                                ?>
                                 <!--View Panel Starts -->
                                    <div class='col-md-3 col-sm-6 home-feature'>
                                            <div class='panel panel-default' >
                                                <div class='panel-heading pnl-head'>
                                                    <div class='row'style="padding-right:10px;" >
                                                        <div class='col-xs-10'>
                                                            <h4 style='text-align:center'><?php echo $plan_name;?></h4>
                                                        </div>
                                                        <h4><span class='glyphicon glyphicon-user' style='padding-left:0px;'></span> <?php echo $no_of_people;?></h4>
                                                    </div>
                                                </div>
                                                 <!-- Panel Body Starts Here-->
                                                <div class='panel-body'style='padding-top:20px'>
                                                    <table class='table'>
                                                        <tbody>
                                                            <tr class='noborder'>
                                                                <td class='left'><strong>Budget</strong></td>
                                                                <td class='right'>&#8377; <?php echo $budget;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class='left'><strong>Date</strong></td>
                                                                <td class='right' style="padding-left:15px;"><?php echo "$date_from". "-"."$date_to";?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                     <!-- Sending Plan id to View_plan.php to display particular plan with the click of button -->
                                                    <form method='Post' action='view_plan.php'>
                                                        <input type='hidden' name='plan_id' value='<?php echo $planid;?>' default>
                                                        <button class='btn btn-primary btn-block btn-change'>View Plan</button>
                                                    </form>
                                                </div>
                                                 <!-- Panel Body Ends Here -->
                                            </div>
                                    </div> <?php }?> 
                                 <!-- Panel Ends -->
                
                    </div>
               </div>
            </div>
            <!--Add Plan button-->
            
            <a href="create_pg1.php"><button class=" btn btn-primary btn-lg AddBtn" ><span class="glyphicon glyphicon-plus"></span></button></a>
            <!--Button ends-->
             <?php } ?>
            
            <!--Footer-->
            <br><br><br><br>  <!-- Break used to provide gap between panels and footer -->
            <?php include 'includes/footer.php';?>
            <!--Footer end-->

 </body>
 
</html>