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
                                <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                                <li><a href="#signupModal" data-toggle="modal">SignUp</a></li>
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
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
                        <a href="#loginModal" class="login" data-toggle="modal" style="color:white;text-decoration:none;"><span class="glyphicon glyphicon-user login" style="color:white;">&nbsp;</span>Login</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#signupModal" class="signup" data-toggle="modal" style="color:white;text-decoration:none;"><span class="glyphicon glyphicon-log-in signup" style="color:white;">&nbsp;</span>SignUp&nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>  



      <!--Login form-->    
      <form method="post" id="loginform">
        <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Login: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Login message from PHP file-->
                  <div id="loginmessage"></div>
                  

                  <div class="form-group">
                      <label for="loginemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="loginpassword" class="sr-only">Password</label>
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                  </div>
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="rememberme" id="rememberme">
                        Remember me
                      </label>
                          <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                      <p style="color:#0000EE;">Forgot Password?</p>
                      </a>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="login" type="submit" value="Login">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>

    <!--Sign up form--> 
      <form method="post" id="signupform">
        <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Sign up today and Start using our Services! 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Sign up message from PHP file-->
                  <div id="signupmessage"></div>
                  
                  <div class="form-group">
                      <label for="username" class="sr-only">Username:</label>
                      <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="email" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="password" class="sr-only">Choose a password:</label>
                      <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="password2" class="sr-only">Confirm password</label>
                      <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="30">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="signup" type="submit" value="Sign up">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
      </div>
      </form>

      <!--Forgot password form-->
      <form method="post" id="forgotpasswordform">
        <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Forgot Password? Enter your email address: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--forgot password message from PHP file-->
                  <div id="forgotpasswordmessage"></div>
                  

                  <div class="form-group">
                      <label for="forgotemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="forgotpassword" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>