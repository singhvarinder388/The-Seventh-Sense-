<?php
session_start();
include('connection.php');

//logout
include('logout.php');

//rememberme
include('remember.php');


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!--Icon-->
    <link rel="icon" href="images/small-logo.png">
      
    <!--Title-->  
    <title>The Seventh Sense</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS -->
    <link href="style.css" rel="stylesheet"> 
    <link href="header.css" rel="stylesheet"> 
      
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Sniglet" rel="stylesheet">
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      
  </head>
  <body>
      
    <!--Navigation Bar-->  
    <?php
    if(isset($_SESSION["user_id"])){
        include("navigationbarconnected.php");
    }else{
        include("navigationbarnotconnected.php");
    }  
    ?>
      
    <!--Spinner-->
    <div id="spinner" >
        <?php
            include('spinner.php');
        ?>
    </div>
      
    <!--Catergories-->
      <div class="container">
          <h1 id="categories-heading">
              <?php 
                    echo $_GET['category']
               ?>
          </h1>
          <div class="row">
                
                <?php
                //show spinner
                echo "<script  type='text/javascript'>
                            $('#spinner').css('display', 'block');
                      </script>";
              
                $category=$_GET['category'];
                $sql = "SELECT * FROM products WHERE ptype = '$category'";
              
                $result = mysqli_query($link, $sql);
                if(!$result){
                    echo '<div class="alert alert-danger">Error running the query!</div>';
                    exit;
                }
               
                $results = mysqli_num_rows($result);
                if($results>0){
                    while($row = mysqli_fetch_array($result)){
                        $pid=$row['pid'];
                        $name=$row['pname'];
                        $artist=$row['partist'];
                        $price=$row['pprice'];
                        $info=$row['pinfo'];
                        $sold=$row['sold'];
                        $location=$row['location'];
                        echo "<div class='col-md-3 col-sm-6' >
                                <div align=center class='category-margin'>
                                    <div class='picture-box' id='$pid' align='center'>
                                        <a href='product.php?id=$pid'> <img src='$location' class='image-box' alt='Image' >
                                        <p class='image-title'>$name</p></a>
                                    </div> 
                                </div> 
                              </div>";    
                    }    
                }
                else{
                    echo '<div class="division"><h1>Out of Stock</h1></div>';  
                }
                //hide spinner
                echo "<script  type='text/javascript'>
                            $('#spinner').css('display', 'none');
                      </script>";
                ?>
          </div>
      </div>
    
    <br><br><br><br>
    <!--Footer-->
    <div id="footer">
          <div class="container">
              <p>TheSeventhSense.com Copyright &copy; 2016-<?php echo date("y")?>.</p>
          </div>
    </div>  
      
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- include javascript-->
    <script src="main.js"></script>
  </body>
</html>