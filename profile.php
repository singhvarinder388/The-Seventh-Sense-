<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');
include('logout.php');
$user_id = $_SESSION['user_id'];

//get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
    
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['bank_details'] = $row['bank_details']; 
    
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $address = $_SESSION['address'];
    $bankdetails = $_SESSION['bank_details'];
    
}else{
    echo "There was an error retrieving the username and email from the database";   
}
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
    
    <?php
      //show spinner
      echo "<script  type='text/javascript'>
                $('#spinner').css('display', 'block');
            </script>";
      
      $user_id = $_SESSION['user_id'];

      //get username and email
      $sql = "SELECT * FROM users WHERE user_id='$user_id'";
      $result = mysqli_query($link, $sql);

      $count = mysqli_num_rows($result);

      if($count == 1){
          $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
    
          $_SESSION['username'] = $row['username'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['address'] = $row['address'];
          $_SESSION['bank_details'] = $row['bank_details']; 
    
          $username = $_SESSION['username'];
          $email = $_SESSION['email'];
          $address = $_SESSION['address'];
          $bankdetails = $_SESSION['bank_details'];
    
      }else{
          echo "There was an error retrieving the username and email from the database";   
      }
      
      //hide spinner
      echo "<script  type='text/javascript'>
                $('#spinner').css('display', 'none');
            </script>";
      ?>
    <!--Container-->
      <div class="container" id="container">
          <div class="row">
              <div class="col-md-offset-3 col-md-6">
                  
                  <h2 id="categories-heading">General Account Settings:</h2>

                  <div class="table-responsive">
                      <table class="table table-hover table-condensed table-bordered">
                          <tr data-target="#updateusername" data-toggle="modal">
                              <th>Username</th>
                              <td><?php echo $username; ?></td>
                          </tr>
                          <tr data-toggle="modal">
                              <th>Email</th>
                              <td><?php echo $email ?></td>
                          </tr>
                          <tr data-target="#updatepassword" data-toggle="modal">
                              <th>Password</th>
                              <td>********</td>
                          </tr>
                          <tr data-target="#updateaddress" data-toggle="modal">
                              <th>Address</th>
                              <td><?php echo $address ?></td>
                          </tr>
                          <?php
                            if(!empty($bankdetails)){
                                echo "<tr data-target='#updatebankdetails' data-toggle='modal'>
                                        <th>Bank Details</th  >
                                        <td>$bankdetails</td>
                                    </tr>";
                            }
                          ?>
                      </table>
                  
                  </div>
              
              </div>
          </div>
      </div>

    <!--Update username-->    
      <form method="post" id="updateusernameform">
        <div class="modal" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Edit Username: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--update username message from PHP file-->
                  <div id="updateusernamemessage"></div>
                  

                  <div class="form-group">
                      <label for="username" >Username:</label>
                      <input class="form-control" type="text" name="username" id="username" maxlength="30" value="<?php echo $username; ?>">
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="updateusername" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button> 
              </div>
          </div>
      </div>
      </div>
      </form>
      
    <!--Update password-->    
      <form method="post" id="updatepasswordform">
        <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Enter Current and New password:
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Update password message from PHP file-->
                  <div id="updatepasswordmessage"></div>
                  

                  <div class="form-group">
                      <label for="currentpassword" class="sr-only" >Your Current Password:</label>
                      <input class="form-control" type="password" name="currentpassword" id="currentpassword" maxlength="30" placeholder="Your Current Password">
                  </div>
                  <div class="form-group">
                      <label for="password" class="sr-only" >Choose a password:</label>
                      <input class="form-control" type="password" name="password" id="password" maxlength="30" placeholder="Choose a password">
                  </div>
                  <div class="form-group">
                      <label for="password2" class="sr-only" >Confirm password:</label>
                      <input class="form-control" type="password" name="password2" id="password2" maxlength="30" placeholder="Confirm password">
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="updateusername" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button> 
              </div>
          </div>
      </div>
      </div>
      </form>
      
      <!--Update address-->    
      <form method="post" id="updateaddressform">
        <div class="modal" id="updateaddress" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Enter Current and New password:
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Update password message from PHP file-->
                  <div id="updateaddressmessage"></div>
                  

                  <div class="form-group">
                      <label for="address">Address: </label>
                      <textarea name="address" class="form-control" rows="5" maxlength="60" placeholder="Required for home delivery"><?php echo $address ?></textarea>
                  </div>
                  
              </div>
              <div class="modal-footer">
                <input class="btn green" name="updateaddress" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button> 
              </div>
          </div>
      </div>
      </div>
      </form>
      
      <!--Update bankdetails-->    
      <form method="post" id="updatebankdetailsform">
        <div class="modal" id="updatebankdetails" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Enter Current and New password:
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Update password message from PHP file-->
                  <div id="updatebankdetailsmessage"></div>
                  

                  <div class="form-group">
                      <label for="bankdetails">Bank Details: </label>
                      <textarea name="bankdetails" class="form-control" rows="5" maxlength="100" placeholder="Required for payment for artwork!"><?php echo $bankdetails ?>
                      </textarea>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="updatebankdetails" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button> 
              </div>
          </div>
      </div>
      </div>
      </form>
      
    <br><br>
    <!--Footer-->
    <div id="footer">
          <div class="container">
              <p>TheSeventhSense.com Copyright &copy; 2016-<?php echo date("y")?>.</p>
          </div>
    </div>  
      
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script src="profile.js"></script>
  </body>
</html>