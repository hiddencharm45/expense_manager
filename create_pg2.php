<?php
require 'includes/common.php';
if(!isset($_SESSION['email'])){
    header('location:index.php');
}

//If no data from the create plan 1st page entered then directed there to fill it
elseif(!isset($_POST['budget']) && !isset($_POST['people'])){
    
        header('location:create_pg1.php?');}

//Fetching data from create_pg1.php to be used in form fields as default values
else{
$budget=$_POST['budget'];
$no_of_people=$_POST['people'];}


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Page detailed | Expense Manager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
    <!--Header Starts-->
        <?php include 'includes/header.php';?>
        <!--Header Ends-->
        <div id="content">
            <div class="container-fluid decor_bg">
                <div class="row">

                <!-- Create Plan_2 Panel Starts-->
                    <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
                        <div class="panel panel-default" >
                            <div class="panel-body">

                            <!--Form Starts-->
                                <form role="form" action="create_submit.php" method="POST">
                                    <div class="form-group"><label for="plan_name">Title</label>
                                        <input type="text" class="form-control" id="plan_name" placeholder="Enter Title (Ex. Trip to Maldives)" name="plan_name"  required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"><label for="date_from" >From</label>
                                                <input type="date" class="form-control" id="date_from" placeholder="mm/dd/yy" name="date_from" min="2020-08-01" max="2021-01-07" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group "><label for="date_to" >To</label>
                                                <input type="date" class="form-control" id="date_to" placeholder="mm/dd/yy" name="date_to"min="2020-08-01" max="2021-01-07" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                        <!--Fetching Initial budget from previous create plan page-->
                                            <div class="form-group"><label for="budget" >Initial budget</label>
                                                <input type="text" class="form-control" id="budget" placeholder="No. of people" name="budget" value="<?php echo $budget?>" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <!--Fetching No. of people from previous create plan page-->
                                            <div class="form-group "><label for="no_of_people" >No. of people</label>
                                                <input type="text" class="form-control" id="no_of_people" placeholder="No. of people" name="people" value="<?php echo $no_of_people?>" readonly required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                     <?php
                                    
                                    //Create form fields depending on the no. of people selected by the user
                                     for($i=1;$i<=$no_of_people;$i++){
                                         echo "<div class='form-group'><label for='person_name$i' >Person $i</label>
                                         <input type='text' class='form-control' id='person_name$i' placeholder='Person name $i' name='person[]' required>
                                     </div>";}
                                    ?>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-change">Submit</button>
                                </form>
                                <!--Form Ends here-->
                            </div>
                        </div>
                    </div>
                <!--Panle ends here-->    
                </div>
            </div>
        </div>
        <!--Footer starts-->
        <?php include 'includes/footer.php';?>
        <!--Footer ends-->
    </body>
</html>