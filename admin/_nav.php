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
              <li class="active"><a href="calendarJSON.php">Calendar</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notebook <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="notebook.php">All Pages</a></li>
				  <li><a href="newNote.php">New Note</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Site <b class="caret"></b></a>
                <ul class="dropdown-menu">
				<li><a href="timeline.php">Timeline</a></li>
                  <li><a href="joins.php">Join History</a></li>
				  <li><a href="logins.php">Logins</a></li>
				  <li><a href="users.php">Users</a></li> 
				  <li><a href="versions.php">Versions</a></li>
                  <li><a href="blacklist.php">Blacklists</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usage <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="reportGold.php">By Type </a></li>
    <li><a href="Platinum_American_Eagle.php">By Date</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Coins <b class="caret"></b></a>
                <ul class="dropdown-menu">
       <li><a href="addCoin.php">Add Coin</a></li>
    <li><a href="myRolls.php">Rolls</a></li>
    <li><a href="myBags.php">Bags</a></li>
    <li><a href="FirstDay.php">First Day</a></li>  
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools <b class="caret"></b></a>
                <ul class="dropdown-menu">
       <li>    <a href="userHome.php">User Tools</a></li>
    <li><a href="forumMain.php">Forum</a></li>
    <li><a href="help.php">Help</a></li>
    <li><a href="viewUserProfile.php">My Profile</a></li>
    <li><a href="../logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
			
            <form method="post" action="search.php" class="navbar-form navbar-right form-inline" id="searchForm" role="form">
<div class="form-group">
      <input type="text" id="search" name="search" class="form-control" placeholder="Search...." required>

        <button class="btn btn-primary" id="searchBtn" type="submit">Go!</button>

    </div>
	</form>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>