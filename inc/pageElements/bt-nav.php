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
              <li class="active"><a href="addCoin.php">Add Item</a></li>
              <li><a href="report.php" title="Coin Reports">Reports</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Coin Types <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="Cent.php">Cents</a></li>
                  <li><a href="Half_Dime.php">Half Dimes</a></li>
                  <li><a href="Nickel.php">Nickels</a></li>
                  <li><a href="Dime.php">Dimes</a></li>
                  <li><a href="Twenty_Cent.php">Twenty Cent</a></li>
                  <li><a href="Quarter.php">Quarters</a></li>
                  <li><a href="Half_Dollar.php">Halves</a></li>
                  <li><a href="AllDollars.php">Dollars</a></li>   
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bullion <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="reportGold.php">Gold Coins </a></li>
                    <li><a href="Platinum_American_Eagle.php">Platinum Eagles</a></li>
                    <li><a href="Gold_American_Eagle.php">Gold Eagles</a></li>
                    <li><a href="Gold_American_Buffalo.php">Buffalo</a></li>
                    <li><a href="Silver_Dollar.php">Silver Eagles</a></li>
                    <li><a href="Commemorative.php">Commemoratives</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bulk Items <b class="caret"></b></a>
                <ul class="dropdown-menu">
       <li><a href="mintset.php">Mint Sets</a></li>
    <li><a href="myRolls.php">Rolls</a></li>
    <li><a href="myBags.php">Bags</a></li>
    <li><a href="FirstDay.php">First Day</a></li>
    <li><a href="myFolders.php">Folders</a></li>
    <li><a href="coinContainer.php">Containers</a></li>    
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools <b class="caret"></b></a>
                <ul class="dropdown-menu">
       <li>    <?php 
   switch($User->getUserLevel()){
	  case 'user':
	  echo '<a href="userTools.php">User Tools</a>';
	  break;	  
	  case 'dealer':
	  echo '<a href="dealerHome.php">Dealer Tools</a>';
	  break;	  
	  case 'club':	
	  echo '<a href="clubView.php?ID='.$Encryption->encode($User->getCoinClubID()).'">Club Tools</a>';
	  break;
	
	}
    ?></li>
    <li><a href="forumMain.php">Forum</a></li>
    <li><a href="help.php">Help</a></li>
    <li><a href="viewUserProfile.php">My Profile</a></li>
    <li><a href="../logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
            <form method="post" action="search.php" class="navbar-form navbar-right" id="searchForm" role="form">
<div class="input-group">
      <input type="text" id="search" name="search" class="form-control" placeholder="Search...." required>
      <span class="input-group-btn">
        <button class="btn btn-primary" id="searchBtn" type="submit">Go!</button>
      </span>
    </div><!-- /input-group -->
	</form>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>      