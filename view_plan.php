<?php
require "includes/common.php";
if(!isset($_SESSION['email'])){
    header('location:index.php');
}

//Fetching Add Expense Data on the same page if user clicks submit: After form filling Refresh not allowed
if(isset($_POST['add_expense'])){
    $e_name = $_POST['e_name'];
    $e_name = mysqli_real_escape_string($con, $e_name);
    $e_date = $_POST['e_date'];
    $amt_spent = $_POST['amt_spent'];
    $plan_id = $_POST['plan_id'];
    $spent_by = $_POST['spent_by'];

    //To get the image extension of the image type entered by user only bmp,gif,jpg.png allowed
    function GetImageExtension($imagetype){
            if(empty($imagetype)) return false;
            switch($imagetype){
                case 'image/bmp':return '.bmp';
                case 'image/gif':return '.gif';
                case 'image/jpeg':return '.jpg';
                case 'image/png':return '.png';
                default: return false;
        }}
    
            //If user enters image
            if(!empty($_FILES["img"]["name"])){
            $file_name=$_FILES["img"]["name"];
            #$temp_name=$_FILES["img"]["temp_name"];
            $imgtype=$_FILES["img"]["type"];
            $ext=GetImageExtension($imgtype);
            $imagename=date("d-m-Y")."-".time().$ext;
            $target_path="img/".$imagename;

                //Moving image in img folder and storing it's path in database
                if(move_uploaded_file($_FILES["img"]["tmp_name"],$target_path)){
                $sql="INSERT INTO expenses(plan_id, e_name, date, amt_spent, spent_by, image) VALUES('" . $plan_id . "','" . $e_name . "','" . $e_date . "','" . $amt_spent . "','" . $spent_by . "','" . $imagename . "')";
                mysqli_query($con, $sql) or die(mysqli_error($con));
                
                    }
                }
                //If user doesn't enter image then insert rest of data in database
                else{
                $sql="INSERT INTO expenses(plan_id, e_name, date, amt_spent, spent_by) VALUES('" . $plan_id . "','" . $e_name . "','" . $e_date . "','" . $amt_spent . "','" . $spent_by . "')";
                mysqli_query($con, $sql) or die(mysqli_error($con));
                }
}
//require common querris to select details to view on the page
require "includes/common_query.php";


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View Plan | Expense Manager</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
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
    /* for image modal in clicking the show bill*/    
    img{
    width:564px;
    height:450px;
    align:center;}
    
    @media(max-width:425px) {
        .modal.fade.in{
        margin:auto;
        width:320px;
        height:450px;
    }
    img{
        width:270px;
        height:280px;
    }
    }
    
</style>

</head>

<body>
    <!-- Header -->
    <?php include 'includes/header.php';?>
    <!--Header end-->
    <div id="content"  >
    <div class='container-fluid'>
                    <!-- Panel Starts -->
        <div class="col-md-5 col-sm-10  col-sm-offset-1">
            <div class='panel panel-default' >
                <div class='panel-heading pnl-head'>
                    <div class='row'>
                        <div class='col-xs-10' >
                            <h4 style='text-align:center'><?php echo $row['plan_name']?></h4>
                        </div>
                        <div class='col-xs-2'style="padding-right:0px">
                            <h4><span class='glyphicon glyphicon-user' ></span> <?php echo $row['no_of_people']?></h4>
                        </div> 
                    </div>
                </div>
                <div class='panel-body'style='padding-top:20px;padding-bottom:0px'>
                    <table class='table'>
                        <tbody>
                            <tr class='noborder'>
                                <td class='left'><strong>Budget</strong></td>
                                <td class='right'>&#8377; <?php echo $row['budget']?></td>
                            </tr>
                            <tr class='noborder'>
                                <td class='left'style="padding-bottom:0px"><strong>Remaining amount</strong></td>
                                <td class='right'style="padding-bottom:0px"><?php $remaining_amount=$total_budget-$total_expenses; 
                                                                                            if($remaining_amount<0){
                                                                                                
                                                                                                echo "<div id='red'>&#8377; <strong>$remaining_amount</strong></div>";
                                                                                            } 
                                                                                            elseif($remaining_amount>0)  {
                                                                                                
                                                                                                echo "<div id='green'>&#8377; <strong>$remaining_amount</strong></div>";
                                                                                            }       
                                                                                            else{
                                                                                                echo "&#8377; <strong>$remaining_amount</strong>";
                                                                                            }                          ?>
                                </td>
                            </tr>
                            <tr>
                                <td class='left'><strong>Date</strong></td>
                                    <!--Here 3 represents date_from from the databse plan and 4 represents date_to;they are the index numbers-->
                                    <td class='right'><?php echo $row['3'] ." - ".$row['4']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                            <!--Panel ends here-->
                            
            <!--Expenses viewing starts here-->            
                                                                                     
            <?php
            for($i=0;$i<$no_of_rows;$i++){
                $expense_name=$expenses_fetched[$i]['1'];
                $date=$expenses_fetched[$i]['2'];
                $amt_spent=$expenses_fetched[$i]['3'];
                $spent_by=$expenses_fetched[$i]['4'];
                $image=$expenses_fetched[$i]['5'];
                
                ?>


<div class='col-sm-6' > 
                <div class='panel panel-default' >
                    <div class='panel-heading pnl-head'>
                        <h4 style='text-align:center'><?php echo $expense_name; ?></h4>
                    </div>
                    <div class='panel-body'style='padding-top:20px'>
                        <table class='table'>
                            <tbody>
                                <tr class='noborder'>
                                    <td class='left'><strong>Amount</strong></td>
                                    <td class='right'>&#8377; <?php echo $amt_spent?></td>
                                </tr>
                                <tr class='noborder'>
                                    <td class='left'><strong>Paid by</strong></td>
                                    <td class='right'><?php echo $spent_by?></td>
                                </tr>
                                <tr>
                                    <td class='left'><strong>Paid on</strong></td>
                                    <td class='right'><?php echo $date?></td>
                                </tr>
                            </tbody>
                        </table>
                            <!--Image link inserted here-->  
                            <?php  include('includes/image_model.php');?>
                            <!--Image link Ends here-->
                    </div>
                </div>
                </div>
           <?php } ?>

        </div>

             <!--Expense viewing ends here-->  
            
             <!-- Expense distribution button -->
            <div class="col-md-5 col-sm-12 right" >
                <div style="text-align:center;padding-top:80px;">
                    <form method='Post' action='expense_distribution.php'>
                        <input type='hidden' name='plan_id'value='<?php echo $plan_id;?>' default>
                        <button type='submit' name='submit' class='btn btn-primary btn-lg btn-change'>Expense Distribution</button>
                    </form>
                </div>
                 <!--Expense Distribution button ends here -->
            
    <!--Add New Expense Form Starts here-->
                <div class="col-md-offset-3">
                    <div class="panel panel-default"style="margin-left:10px;margin-top:100px;" >
                        <div class="panel-heading pnl-head">
                            <h4 style="text-align:center">Add New Expense</h4>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="view_plan.php" method="POST" enctype='multipart/form-data'>
                            
                                <div class="form-group"><label for="e_name">Title</label>
                                    <input type='text' class='form-control' id="e_name"  placeholder='Expense Name' name='e_name' required>
                                </div>
                                
                                <div class='form-group'><label for='e_date'>Date</label>
                                <?php 
                                //select dates for minimum and maximum value as common_querry containes in different format
                                $date_query="SELECT date_from,date_to FROM plans WHERE plan_id='$plan_id'";
                                $date_result=mysqli_query($con,$date_query) or die(mysqli_error($con));
                                $dates=mysqli_fetch_array($date_result);
                                
                                echo" <input type='date' class='form-control' id='e_date' placeholder='dd/mm/yy'name='e_date' min='$dates[0]' max='$dates[1]' required>";?>
                                </div>
                                <div class="form-group"><label for="amt_spent">Amount Spent</label>
                                    <input type="number" class="form-control" id="amt_spent" placeholder="Amount Spent" min="1" name="amt_spent" required>
                                </div>
                                <?php echo"<input type='hidden' name='plan_id' value='$plan_id' default>";?> 
                                <div class="form-group">
                                    <select class="form-control" name="spent_by" required>
                                    <option value="">Choose</option>
                                    <?php 
                                    for($i = 0; $i < sizeof($person_names); $i++){
                                    echo"<option value='$person_names[$i]'>$person_names[$i]</option>
                                    ";}?></select>
                               
                                </div>
                                <div class="form-group"><label for="img">Upload Bill</label>
                                    <input type="file" id="img" class="form-control" name="img">
                                </div>
                                
                                <button type="submit" name="add_expense" value='add_expense' class="btn btn-primary btn-block btn-change">Add</button>
                            </form>
                            

                        </div>
                    </div>
                </div>
                 <!--Add expense ends here -->
            </div>
        </div>

 
        </body>



<!--Footer-->
<br><br>
<?php include 'includes/footer.php';?>
        <!--Footer end-->
<html>
    
       







    