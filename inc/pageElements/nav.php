      <!-- Static navbar -->
      <a name="top"></a>
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">My Coin Organizer</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="features.php" title="Coin Software Features">Features</a></li>
              <li><a href="signup.php" rel="nofollow">Register</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="forgotPass.php" rel="nofollow">Forgot Password? </a></li>
                  <li><a href="activateSend.php" rel="nofollow">Re-Send Activation Code</a></li>
                  <li><a href="contact.php" rel="nofollow">Contact</a></li>  
                </ul>
              </li>              
            </ul>
            
 <form action="login.php" class="navbar-form form-inline navbar-right" role="form" method="post" id="loginForm">
  <div class="form-group">
    <label class="sr-only" for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required" autocomplete="on">
  </div>
  <div class="form-group">
    <label class="sr-only" for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required" autocomplete="on">
  </div>
  <button name="loginFormBtn" type="submit" class="btn btn-primary">Login</button>
</form>           
<!--            <form method="post" action="login.php" class="navbar-form navbar-right form-inline" id="loginForm" name="loginForm" role="form">
<div class="input-group">
      <input type="text" id="email" name="email" class="form-control" placeholder="Username" required>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <span class="input-group-btn">
        <button class="btn btn-primary" id="loginFormBtn" type="submit">Login</button>
      </span>
    </div>
	</form>-->

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>      