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
    
    <!--Sell-->
    <div class="container" id="sell-info">
        <h1>So you are an artist!</h1>
        <br>
        <p>Do you want the world to know you by your extraordinary artwork?</p>
        <h3>We can help to achieve your dream!</h3>
        <br>
        <p>You can post a product/artwork to sell on our website, it will be seen by thousands of art lovers on our website and you will get the appreciation you deserves! </p>
        <br>
        <h1><a class="btn btn-default btn-lg" href="#updatepicture" data-toggle="modal">Post a product to sell</a></h1>
    </div>
      
    
    <!--Add a new product-->
    <form method="post" enctype="multipart/form-data" id="updatepictureform">
        <div class="modal" id="updatepicture" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Add Product:
                  </h4>
              </div>
              <div class="modal-body">
                  
                  
                  <div class="form-group">
                      <label for="pname" class="sr-only">Name:</label>
                      <input class="form-control" type="text" name="pname" id="pname" placeholder="Name" maxlength="20" required>
                  </div>
                  
                  <div class="form-group">
                      <label for="pprice" class="sr-only">Price:</label>
                      <input class="form-control" type="text" name="pprice" id="pprice" placeholder="Price" maxlength="10" required>
                  </div>
                   
                  <div class="form-group">
                      <label for="ptype" class="">Choose your product type:</label>
                      <select class="form-control" name="ptype" id="ptype">
                            <option value="Artwork">Artwork</option>
                            <option value="Handicraft">Handicraft</option>
                            <option value="Apperal">Apperal</option>
                            <option value="Home and furnishing">Home and furnishing</option>
                            <option value="Collectables">Collectables</option>
                            <option value="Accessories">Accessories</option>
                            <option value="Gifts">Gifts</option>
                      </select>
                  </div>
                  
                  <div class="form-group">
                      <label for="pinfo" class="sr-only">Description:</label>
                      <textarea name="pinfo" class="form-control" rows="3" name="pinfo" id="pinfo" placeholder="Description" maxlength="300" required></textarea>
                  </div>
                  
                  <div class="form-group">
                      <label for="bankdetails">Bank Information: </label>
                      <textarea name="moreinformation" class="form-control" name="bankdetails"  id="bankdetails" placeholder="For payment for your product" rows="3" maxlength="300" required><?php echo $_SESSION['bank_details']; ?></textarea>
                  </div>
                  
                 
                  <?php
                    if(empty($picture)){
                        echo "<div class='image_preview'><img id='previewing' width='100%' src='products/noimage.png' /></div>";
                    }else{
                        echo "<div class='image_preview'><img id='previewing' src='$picture' /></div>";
                    }
    
                  ?>
                  
                  <div class="form-inline">
                      <div class="form-group">
                        <label for="picture">Select a picture:</label>
                        <input type="file" name="picture" id="picture">
                      </div>
                  </div> 
                  
                  <!--Update picture message from PHP file-->
                  <br><br>
                  <div id="updatepicturemessage"></div>
                  
              </div>
              <div class="modal-footer">
                <input class="btn green" name="updatepicture" type="submit" value="Submit">
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