<?php
if(isset($_SESSION['user_id']) && $_GET['logout'] == 1){
    session_destroy();
    
    if (isset($_COOKIE["rememberme"])) {
        unset($_COOKIE["rememberme"]);
        setcookie("rememberme","", time()-3600); // empty value and old timestamp
    }
    
    header("location: index.php");
}
?>