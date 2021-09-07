<?php

//Changing user password
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

$old_pass = $_POST['psw'];
$old_pass = mysqli_real_escape_string($con, $old_pass);
$old_pass = MD5($old_pass);

$new_pass = $_POST['new_pass'];
$new_pass = mysqli_real_escape_string($con, $new_pass);
$new_pass = MD5($new_pass);

$new_pass1 = $_POST['pass_cnf'];
$new_pass1 = mysqli_real_escape_string($con, $new_pass1);
$new_pass1 = MD5($new_pass1);

//Select Original Password From the Database
$query = "SELECT email, password FROM users WHERE email ='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);
$orig_pass = $row['password'];

//If form's old password doesn't match with original password
if($old_pass != $orig_pass){
    echo "<script>alert('Wrong Old Password')
    location.href='settings.php'</script>"; }

//If Original password matches with old password but New password length is less than 6
elseif(strlen($_POST["new_pass"]) <=5){
    echo "<script>alert('Minimum 6 digits required')
        location.href='settings.php'</script>";
}
//To check New Password matches with the re-typed password
elseif($new_pass != $new_pass1){
    echo "<script>alert('Passwords don\'t match')
        location.href='settings.php'</script>";
}

//If fulfills every criteria then Update the password and log-out
else{
    $query = "UPDATE  users SET password = '" . $new_pass . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        echo "<script>alert('Password updated successfully')
        location.href='logout.php'</script>";
}


?>