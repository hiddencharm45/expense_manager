<?php 
//-------------COMMON QUERRIES TO FETCH VALUES FROM PLAN AND EXPENSE TABLE------------------------

//To fetch plan-id from previous page
$plan_id=$_POST['plan_id'];


//Fetch data from Plan table from database used in view as well as exp distribution
$plan_query="SELECT plan_name,no_of_people,budget,DATE_FORMAT(date_from,'%D %b'),DATE_FORMAT(date_to,'%D %b %Y'),person_names from plans where plan_id='$plan_id'";
$plan_query_result=mysqli_query($con,$plan_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($plan_query_result);

//obtaining names in the from of array
$serialized_names=$row['person_names'];
$person_names=unserialize($serialized_names);

//Total Budget 
$total_budget=$row['budget']; 




//Retrive data from expense table
$select_expense_table_data="SELECT exp_id,e_name,DATE_FORMAT(date,'%D %M-%Y'),amt_spent,spent_by,image FROM expenses where plan_id='$plan_id'";
$select_result=mysqli_query($con,$select_expense_table_data) or die(mysqli_error($con));
$expenses_fetched=mysqli_fetch_all($select_result);
$no_of_rows=mysqli_num_rows($select_result); //To fetch all expenses in view tab

//SUM OF ALL THE EXPENSES 
$select_total_expense="SELECT SUM(amt_spent) FROM expenses WHERE plan_id='$plan_id'";
$total_result=mysqli_query($con,$select_total_expense) or die(mysqli_error($con));
$fetched_sum=mysqli_fetch_array($total_result);

//Total amount spent on a plan
$total_expenses=$fetched_sum[0];
?>