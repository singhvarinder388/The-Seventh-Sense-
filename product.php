<?php
session_start();
include('connection.php');

//logout
include('logout.php');

//rememberme
include('remember.php');

$address=$_SESSION['address'];
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
    <link href="product.css" rel="stylesheet">
      
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Sniglet" rel="stylesheet">
      
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
    
      
    <?php
      $pid=$_GET['id'];
      $sql = "SELECT * FROM products WHERE pid = '$pid'";
              
      $result = mysqli_query($link, $sql);
      if(!$result){
          echo '<div class="alert alert-danger">Error running the query!</div>';
          exit;
      }
               
      $results = mysqli_num_rows($result);
      if($results>0){
          while($row = mysqli_fetch_array($result)){
              $name=$row['pname'];
              $artist=$row['partist'];
              $price=$row['pprice'];
              $info=$row['pinfo'];
              $sold=$row['sold'];
              $location=$row['location']; 
          }    
      }
      else{
          echo '<div class="alert alert-danger">Out of Stock</div>';  
          exit;
      }
    ?>  
      
    <div class="container">
      <div class="row product-frame">
        <div class="col-sm-7" >
          <div align="center">
              <?php
                echo "<img src=$location   class='img-responsive product-picture'  alt='Product'  width='100%' height='100%' >";
              ?>
          </div>
        </div>
        <div class="col-sm-5 detail-frame " align="center">
            <?php
                echo "<p class='pname'>$name</p>
                      <p class='pprice'>By:    $artist</p>
                      <p class='pprice'>Price: ₹$price</p>
                      <p class='pdescription'>Description:<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$info</p>";
                
                echo "<br><br><br><br>";
                if($sold=="pending"){
                    if(empty($_SESSION['user_id'])){
                        echo "<a class='btn green btn-lg' style='color:black;' data-target='#loginModal' data-toggle='modal'>Buy Now</a>";
                    }else{
                        echo "<a class='btn green btn-lg' style='color:black;' data-target='#buyModal' data-toggle='modal'>Buy Now</a>";   
                    }
                }else{
                    echo "<a class='btn btn-danger btn-lg' style='color:black;'>Sold</a>";
                }      
            ?>
            
        </div>
      </div>
    </div >
      
      
    <!--Buy form-->    
      <form method="post" id="buyform">
        <div class="modal" id="buyModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Buy:
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Buy message from PHP file-->
                  <div id="buymessage"></div>
                  
                  <div class="form-group">
                       <?php echo "<input class='sr-only' id='pid' value=$pid>"; ?>
                  </div>
                  <div class="form-group">
                      <label for="address">Enter Address: </label>
                      <textarea name="address" id="address" class="form-control" rows="5" maxlength="300"><?php echo $_SESSION['address']; ?></textarea>
                  </div>
                  
              </div>
              <div class="modal-footer">
                <input class="btn green" name="login" type="submit" value="Ship">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>
      
    <br><br><br><br>
    <!--Footer-->
    <div id="footer">
          <div class="container">
              <p>TheSeventhSense.com Copyright &copy; 2016-<?php echo date("y")?>.</p>
          </div>
    </div>  
      
    <!--Spinner-->
    <div id="spinner" >
        <?php
            include('spinner.php');
        ?>
    </div>
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- include javascript-->
    <script src="main.js"></script>
  </body>
</html>