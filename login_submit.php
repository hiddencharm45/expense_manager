<?php

require("includes/common.php");

//Submit the login Values and Check
$email = $_POST['email'];
$email = mysqli_real_escape_string($con, $email);

$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$password = MD5($password);

//Fetch identical user-id from the given data
$query = "SELECT user_id, email FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die(mysqli_error($con));
$num = mysqli_num_rows($result);

//Check whether email and password correct or not and matches with the same user

//If doesn't match direct to login again showing error
if ($num == 0) {
    echo "<script>alert('Please enter a correct Email id and Password')
    location.href='login.php'</script>";
}

//If matches then set the session Email and User_id
else {  
  $row = mysqli_fetch_array($result);
  $_SESSION['email'] = $row['email'];
  $_SESSION['user_id'] = $row['user_id'];
  header('location: home.php');
}

