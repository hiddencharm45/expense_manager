<?php
//Connect database
    $con = mysqli_connect("localhost", "root", "", "expense_manager")
    or die(mysqli_error($con));
    //starting the new session
    
    if(!isset($_SESSION)){
      session_start();
    }
?>
