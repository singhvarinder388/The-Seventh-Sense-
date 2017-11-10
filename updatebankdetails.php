<?php

//start session and connect
session_start();
include ('connection.php');

//get user_id
$id = $_SESSION['user_id'];

//Get username sent through Ajax
$bankdetails = $_POST['bankdetails'];

if(empty($bankdetails)){
    echo '<div class="alert alert-danger">Please enter the bank details!</div>';
}else{
    $bankdetails = filter_var($bankdetails, FILTER_SANITIZE_STRING);   
}

$bankdetails = mysqli_real_escape_string($link, $bankdetails);

//Run query and update username
$sql = "UPDATE users SET bank_details='$bankdetails' WHERE user_id='$id'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
}

?>