<?php

//start session and connect
session_start();
include ('connection.php');

//get user_id
$id = $_SESSION['user_id'];

//Get username sent through Ajax
$address = $_POST['address'];

if(empty($address)){
    echo '<div class="alert alert-danger">Please enter the address!</div>';
    exit;
}else{
    $address = filter_var($address, FILTER_SANITIZE_STRING);   
}

$address = mysqli_real_escape_string($link, $address);

//Run query and update username
$sql = "UPDATE users SET address='$address' WHERE user_id='$id'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
}

?>