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
    <meta name="viewport" content="width=device-width, initial-scale=1,target-densitydpi=device-dpi">
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
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
    
    <!--create a carousel-->
    <div id="slideshow" class="container-fluid">
        <div class="carousel slide" id="myCarousel" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/Slideshow1.jpg">
                </div>
                <div class="item">
                    <img src="http://www.conceptart.org/forums/attachment.php?attachmentid=2099736&d=1426296406">
                </div>
                <div class="item">
                    <img src="https://resi.ze-robot.com/dl/cl/classical-paintings-9-2560%C3%971080.jpg">
                </div>
                <div class="item">
                    <img src="http://i.imgur.com/rlxQR59.jpg">
                </div>
                <div class="item">
                    <img src="http://i.imgur.com/uZtnvIZ.jpg">
                </div>
                <div class="item">
                    <img src="https://www.gamewallpapers.com/img_script/wallpaper_dir/img.php?src=wallpaper_runescape_02_2560x1080.jpg&height=506">
                </div>

            </div>
           <a class="left carousel-control" style="background:transparent;"  href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span> 
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" style="background:transparent;" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span> 
                <span class="sr-only">Next </span>
            </a>
        </div> 
    </div>
      
      
    <!--Introduction-->
      <div class="container" id="intro">
            <h1>The Seventh Sense</h1>
            <br>
            <p>
                An online market place for unknown talented artists and their mind blowing artwork.
                <br>
                A worldwide online web portal where every kind of hand made & hand painted artefact is available for art lovers.
                <br>
                We make artefact on order too as per customers taste & demand.
                <br>
                All your orders will be delivered at your doorstep through our world class shipping partners.
            </p>
      </div>
    

    <!--Catergories-->
      <div class="container">
          <h1 id="categories-heading">Categories</h1>
          <div class="row">
                <div class="col-md-3 col-sm-6" >
                    <div align=center class="category-margin">
                        <div class="picture-box" align="center" id="artwork">
                            <a href="category.php?category=Artwork"> <img src="images/artwork.jpg" class="image-box" alt="Artwork" >
                            <p class="image-title">Artwork</p></a>
                        </div> 
                    </div> 
                </div>
                <div class="col-md-3 col-sm-6" >
                    <div align=center class="category-margin">
                        <div class="picture-box">
                            <a href="category.php?category=Handicraft"> <img src="images/handicraft.jpg" class="image-box" alt="Handicraft" >
                            <p class="image-title">Handicraft</p></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6" >
                    <div align=center class="category-margin">
                        <div class="picture-box">
                            <a href="category.php?category=Apperal"> <img src="images/apperal.jpg" class="image-box" alt="Apperal" >
                            <p class="image-title">Apperal</p></a>
                        </div>   
                    </div>
                </div>
                <div class="col-md-3 col-sm-6" >
                    <div align=center class="category-margin">
                        <div class="picture-box">
                            <a href="category.php?category=Home and furnishing"> <img src="images/home.jpg" class="image-box" alt="Home and furnishing" >
                            <p class="image-title">Home and furnishing</p></a>
                        </div>
                    </div>
                </div>
          </div>
          <div class="row">
                <div class="col-md-3 col-sm-6" >
                    <div align=center class="category-margin">
                        <div class="picture-box">
                            <a href="category.php?category=Collectables"> <img src="images/collectables.jpg" class="image-box" alt="Collectables" >
                                <p class="image-title">Collectables</p></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6" >
                    <div align=center class="category-margin">
                        <div class="picture-box">
                            <a href="category.php?category=Accessories"> <img src="images/accessories.jpg" class="image-box" alt="Accessories" >
                            <p class="image-title">Accessories</p></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6" >
                    <div align=center class="category-margin">
                        <div class="picture-box">
                            <a href="category.php?category=Gifts"> <img src="images/gifts.jpg" class="image-box" alt="Gifts" >
                            <p class="image-title">Gifts</p></a>
                        </div>   
                    </div>
                </div>
                <div class="col-md-3 col-sm-6" >
                    <div align=center class="category-margin">
                        <div class="picture-box">
                            <a href="maintaincepage.html"> <img src="images/customize.jpg" class="image-box" alt="Customize" >
                            <p class="image-title">Customize</p></a>
                        </div>
                    </div>
                </div>
          </div>
      </div>     
    
    <!--Quotes-->  
    <div class="container division">
        <h1>The Seventh Sense Blog</h1>
        <p>
            Art speaks where words are unable to explain!!
        </p>
    </div>
      
    <!--Sell-->
    <div class="container division">
        <h1>ARE YOU AN ARTIST ?</h1>
        <h1>
            <?php
                if(empty($_SESSION['user_id'])){
                    echo "<a href='#loginModal' data-toggle='modal' id='sell' class='btn btn-default btn-lg'>Want to Sell</a>";
                }else{
                    echo "<a href='sell.php' id='sell' class='btn btn-default btn-lg'>Want to Sell</a>";
                }  
            ?>
        </h1>
    </div>
    
    <br><br><br><br>
      
    <!--Footer-->
    <div id="footer">
        <div class="container-fluid">
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