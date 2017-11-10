
    <!--Navigation bar Mobile-->
              <nav role="navigation"  class="navbar navbar-custom navbar-fixed-top header-mobile">
                  <div class="container-fluid">
                      <div class="navbar-header">
                          <a href="index.php" class="navbar-brand">The Seventh Sense</a>

                          <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                              <span class="sr-only">Toggle Navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>
                      </div>
                      <div class="navbar-collapse collapse" id="navbarCollapse">
                          <ul class="nav navbar-nav">
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="index.php?logout=1">Logout</a></li>
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
                                    <ul class="dropdown-menu" >
                                        <li><a href = "category.php?category=Artwork">Artwork</a></li>
                                        <li><a href = "category.php?category=Handicraft">Handicraft</a></li>
                                        <li><a href = "category.php?category=Apperal">Appreral</a></li>
                                        <li><a href = "category.php?category=Home and furnishing">Home and Furnishing</a></li>
                                        <li><a href = "category.php?category=Collectables">Collectables</a></li>
                                        <li><a href = "category.php?category=Accessories">Accessories</a></li>
                                        <li><a href = "category.php?category=Gifts">Gifts</a></li>
                                    </ul>
                                </li>
                          </ul>
                      </div>
                  </div>
              </nav>

            <!--Navigation Bar For Desktop-->
            <div class="container-fluid" id="header">
                <div class="row">
                    <div class="col-sm-2">
                        <a href="index.php"><img id="logo" src="images/logo.png"></a>
                    </div>
                    <div class="col-sm-8">
                        <a href="index.php" id="slogan">Art For Every Home</a>
                        <ul class="menu">
                            <li><a href = "category.php?category=Artwork">Artwork</a></li>
                            <li><a href = "category.php?category=Handicraft">Handicraft</a></li>
                            <li><a href = "category.php?category=Apperal">Appreral</a></li>
                            <li><a href = "category.php?category=Home and furnishing">Home and Furnishing</a></li>
                            <li><a href = "category.php?category=Collectables">Collectables</a></li>
                            <li><a href = "category.php?category=Accessories">Accessories</a></li>
                            <li><a href = "category.php?category=Gifts">Gifts</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2 pull-right" style="line-height:100px;text-align:right;">
                        <a href="profile.php" class="login" style="color:white;text-decoration:none;"><span class="glyphicon glyphicon-user login" style="color:white;">&nbsp;</span><?php echo $_SESSION['username']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="index.php?logout=1" class="signup" style="color:white;text-decoration:none;"><span class="glyphicon glyphicon-log-in signup" style="color:white;">&nbsp;</span>Logout&nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>  