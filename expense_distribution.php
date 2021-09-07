
<?php
require("includes/common.php");
if(!isset($_SESSION['email'])){
    header('location:index.php');
}

//Including the common_querry page containing fetched data from plan and Expense table respectively
require("includes/common_query.php");

?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Expense Distribution | Expense Manager</title>
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
        <div id="content"  >
            <div class="container-fluid">

            <!-- Expense Distribution Panel Starts Here-->
                <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
                    <div class='panel panel-default' >
                        <div class='panel-heading pnl-head'>
                            <div class='row'>
                                <div class='col-xs-9 col-sm-10' >
                                        <h4 style='text-align:center'><?php echo $row['plan_name'];?> </h3>
                                </div>
                                <div class='col-xs-3 col-sm-2'style='padding-right:8px'>
                                    <h4><span class='glyphicon glyphicon-user'></span> <?php echo $row[1];//Getting no_of_people from database from the coomon_querry page;1 is the index number?></h4>
                                </div> 
                            </div>
                        </div>
                        <!--Panel body Starts from here-->
                       <div class='panel-body'style='padding-top:20px;'>
                            <table class='table'>
                                <tbody>
                                    <tr class='noborder'>
                                        <td class='left'><strong>Initial Budget</strong>
                                        <td class='right'>&#8377; <?php echo "<strong>$row[budget]</strong>";?></td>
                                    </tr>
                       <!--Inserting individual expenses-->
                                    <?php 
                                    //Fetching no_of_people by index number
                                    $no_of_people=$row[1];
                                    for($i=0;$i<=$no_of_people-1;$i++){
                                        //For every person

                                        $name=$person_names[$i];//Fetching names

                                        //Select Individual total amount they spent
                                        $individual_sum_query="SELECT SUM(amt_spent) FROM expenses WHERE spent_by='$name'";
                                        $sum_query_result=mysqli_query($con,$individual_sum_query) or die(mysqli_error($con));
                                        $row1=mysqli_fetch_array($sum_query_result);
                                        $individual_sum= $row1[0];?>

                                <tr>
                                    <td class='left'><strong><?php echo"$name";?></strong>
                                    <td class='right'>&#8377; <?php if($individual_sum==NULL){
                                        $individual_sum=0;//Checking if the person not paid anything yet
                                        }
                                                                    
                                        echo "$individual_sum";
                                                                        
                       
                                    ?>
                                    </td>
                                </tr><?php }?> 
                                <tr>
                                    <td class='left'><strong>Total Amount Spent</strong>
                                    <td class='right'>&#8377; <?php if($total_expenses==NULL){
                                        $total_expenses=0;
                                            }
                                            //Sum of all the expenses under a single plan 
                                        echo "<strong>$total_expenses</strong>";?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class='left'><strong>Remaining amount</strong>
                                    <td class='right'> <?php $remaining_amount=$total_budget-$total_expenses; 
                                                                                                if($remaining_amount<0){
                                                                                                    
                                                                                                    echo "<div id='red'>&#8377; <strong>$remaining_amount</strong></div>";
                                                                                                } 
                                                                                                elseif($remaining_amount>0)  {
                                                                                                    
                                                                                                    echo "<div id='green'>&#8377; <strong>$remaining_amount</strong></div>";
                                                                                                }       
                                                                                                else{
                                                                                                    echo "<strong>&#8377; $remaining_amount</strong>";
                                                                                                }                          ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class='left'><strong>Individual Shares</strong>
                                    <td class='right'>&#8377; <?php $individual_shares=$total_expenses/$row['no_of_people'];
                                            if($total_expenses==NULL){
                                                $total_expenses=0;
                                            }
                                            //Individual share is the equal division of total expense per person
                                            echo number_format($individual_shares,2);
                                            
                                            ?>
                                    </td>
                                </tr>
                                <?php //To check whether a person owes or will get some amount, in case both invalid:Will show all settled up
                                $no_of_people=$row['no_of_people'];
                                for($i=0;$i<=$no_of_people-1;$i++){
                            
                                $name=$person_names[$i];
                                $individual_sum_query="SELECT SUM(amt_spent) FROM expenses WHERE spent_by='$name'";
                                $sum_query_result=mysqli_query($con,$individual_sum_query) or die(mysqli_error($con));
                                $row1=mysqli_fetch_array($sum_query_result);
                                $individual_sum= $row1[0];
                                if($individual_sum==NULL){
                                    $individual_sum=0;
                                }
                                
                                $individual_shares=$total_expenses/$row['no_of_people'];
                                $difference=$individual_sum-$individual_shares;
                                ?>

                                <tr>
                                    <td class='left'><strong><?php echo"$name";?></strong>
                                    <td class='right'> <?php if($difference<0){
                                    $num= -1*$difference;//To make the number positive while displaying
                                    $num=number_format($num,2);
                                    echo "<div id='red'>Owes &#8377; $num</div>";
                                    }
                                    elseif($difference>0){
                                    $difference=number_format($difference,2);
                                    echo "<div id='green'>Gets back &#8377; $difference </div>";
                                    }
                                    else{
                                    echo "All Settled Up";
                                    }
                       
                                    ?>
                                    </td>
                                </tr><?php }?> 
                                </tbody>
                            </table>
                            <div style="text-align:center;">
                            <?php
                    
                            echo "<form method='Post' action='view_plan.php'>
                            <input type='hidden' name='plan_id'value='$plan_id' default>
                        
                            <button type='submit' name='submit' class='btn btn-primary btn-change'><span class='glyphicon glyphicon-arrow-left'></span> Go Back</button>

                            </form>"
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            <!--Expense Distribution Panel ends here-->
            </div>
        </div>
                       
                      
                       </body>
                        <!--Footer-->
<?php include 'includes/footer.php';?>
            <!--Footer end-->
                       </html>