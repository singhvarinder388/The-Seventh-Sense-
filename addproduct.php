<?php
session_start();
include('connection.php');

ob_start();

//errors
$missingpname = '<p><strong>Please enter a product name!</strong></p>';
$missingpprice = '<p><strong>Please enter a product price!</strong></p>';
$missingpinfo = '<p><strong>Please enter a product description!</strong></p>';

//product details
$pname=$_GET['name'];
$pprice=$_GET['price'];
$partist=$_SESSION['username'];
$pinfo=$_GET['info'];
$ptype=$_GET['type'];
$sold='pending'; 

//check for errors
if(empty($pname)){
    $errors .= $missingpname;
}else{
    $pname = filter_var($pname, FILTER_SANITIZE_STRING);   
}

if(empty($pprice)){
    $errors .= $missingpprice;
}else{
    $pprice = filter_var($pprice, FILTER_SANITIZE_STRING);   
}

if(empty($pinfo)){
    $errors .= $missingpinfo;
}else{
    $pinfo = filter_var($pinfo, FILTER_SANITIZE_STRING);   
}

//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

//file details
$name = $_FILES["picture"]["name"];
$extension = pathinfo($name, PATHINFO_EXTENSION);
$type = $_FILES["picture"]["type"];
$size = $_FILES["picture"]["size"];
$tmp_name = $_FILES["picture"]["tmp_name"];


$permanentdestination = "products/" . md5(time()) . ".$extension";

//preparing varriables for query
$pname = mysqli_real_escape_string($link, $pname);
$pprice = mysqli_real_escape_string($link, $pprice);
$pinfo = mysqli_real_escape_string($link, $pinfo);

if(move_uploaded_file($tmp_name, $permanentdestination)){
        $sql = "INSERT INTO products (`pname`, `pprice`, `partist`, `pinfo`, `ptype`, `sold`,`location`) VALUES ('$pname', '$pprice', '$partist', '$pinfo', '$ptype', '$sold', '$permanentdestination')"; 
    
        $result = mysqli_query($link, $sql);

        if(!$result){
            $resultMessage = '<div class="alert alert-danger">Unable to update profile picture. Please try again later.</div>';
            echo $resultMessage;
        }else{
            $resultMessage = '<div class="alert alert-success">Product successfully added to the database.</div>';
            echo $resultMessage;
        }
        
}
else{
    $resultMessage = '<div class="alert alert-warning">Unable to upload file. Please try again later.</div>'; 
     echo $resultMessage;
} 
ob_flush();
?>