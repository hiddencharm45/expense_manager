<?php

require("includes/common.php");

if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

//Fetching data from create_pg2 page
$title = $_POST['plan_name'];
$title = mysqli_real_escape_string($con, $title);

$date_from = $_POST['date_from'];
$date_to = $_POST['date_to'];
$budget=$_POST['budget'];
$no_of_people=$_POST['people'];

//Storing person names entered by the user in Array
$person_names = array();
$person_names = $_POST['person'];
for($i = 0; $i < sizeof($person_names); $i++)
	{
        $result= $person_names[$i];
    }
//Converting Array of names into String to store in a single column in database
$string_names=serialize($person_names);

$user_id=$_SESSION['user_id'];//Getting current session's user_id

//Inserting values in the plan databse
$insert_query="INSERT INTO plans(user_id,budget, no_of_people,person_names, plan_name, date_from, date_to)VALUES('" . $user_id . "','" . $budget . "','" . $no_of_people . "','" . $string_names . "','" . $title . "','" . $date_from . "','" . $date_to . "')";
mysqli_query($con, $insert_query) or die(mysqli_error($con));
echo "<script>alert('Your New Budget Planner Added Successfully')
    location.href='home.php'</script>";
?>


