<?php

//start session and connect
session_start();
include ('connection.php');

//Get username sent through Ajax
$pid = $_POST['pid'];

$pid = filter_var($pid, FILTER_SANITIZE_STRING);   

$pid = mysqli_real_escape_string($link, $pid);

//Run query and update username
$sql = "UPDATE products SET sold='sold' WHERE pid='$pid'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo '<div class="alert alert-danger">There was an error updating the database!</div>';
}

?>