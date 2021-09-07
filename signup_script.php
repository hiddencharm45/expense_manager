<?php

require("includes/common.php");

 
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['email'];
  $email = mysqli_real_escape_string($con, $email);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);

  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);

  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";//Email validation expression
  $regex_num = "/^[7896][0-9]{9}$/";//Mobile number validation expression

  //Select email from database if entered email already exists
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die(mysqli_error($con));
  $num = mysqli_num_rows($result);
  
  //Check Validations
  if ($num != 0) {
    echo "<script>alert('Email already exist, please login')
    location.href='login.php'</script>";
   
  } else if (!preg_match($regex_email, $email)) {
    echo "<script>alert('Not a valid Email')
    location.href='signup.php'</script>";
  } else if (strlen($_POST["password"]) <=5){
    echo "<script>alert('Minimum 6 digits required:Password')
    location.href='signup.php'</script>";
}
  else if (!preg_match($regex_num, $contact)) {
    echo "<script>alert('Not a valid phone number')
    location.href='signup.php'</script>";
  } 
  

  else {
    //Insert the user into the database
    $query = "INSERT INTO users(name, email, password, contact)VALUES('" . $name . "','" . $email . "','" . $password . "','" . $contact . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    echo "<script>alert('User Successfully Registered')
      location.href='home.php'</script>";
  }
?>