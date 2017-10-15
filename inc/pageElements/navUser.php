<a name="top"></a>
<div id="topDiv"><div id="headerContent"><table width="100%" border="0" class="headerTbl">
  <tr>
    <td align="left"><a href="index.php"><img src="http://mycoinorganizer.com/img/logo4.jpg" alt="My Coin Organizer" name="headerLogo" align="left" id="headerLogo2" /></a>
 <ul id="headerList">
 <li><a class="brownLink" href="index.php">Home</a> | <a class="brownLink" href="help.php">Help</a> | <a class="brownLink" href="../logout.php">Logout</a></li> 
 <li><span>Logged in as: <a class="brownLink" href="viewUserProfile.php"><?php echo $User->getUserName() ?></a> <?php echo $User->getCollectionAvatar($userID); ?><?php echo $User->getAnswerAvatar($userID); ?><?php echo $User->getInvestmentAvatar($userID); ?></span></li>
 </ul>   
    </td>
    <td align="right" valign="top">
    <form id="searchForm" name="searchForm" method="post" action="search.php" class="compactForm">
        <input name="search" id="search" type="text" />
        <input name="searchCalendarBtn" id="searchCalendarBtn" type="submit" value="Search" />
      </form>
    </td>
  </tr>
</table>
<table width="100%" id="navLinks" border="0" class="headerTbl">
  <tr align="center">
  <td width="14%"><a href="viewCollection.php" title="My Collection">My Collection</a></td>
  <td width="12%"><a href="report.php" title="Coin Reports">Reports</a></td>
  <td width="13%"><a href="addCoin.php">Add Item</a></td>
  <td width="14%"><a href="want.php">Want List</a></td>
    <td width="11%"><a href="sellCoin.php">Sell Item</a></td>
    <td width="10%"><a href="forumMain.php">Forum</a></td> 
    <td width="14%">
    <?php 
   switch($User->getUserLevel()){
	  case 'user':
	  echo '<a href="userHome.php">User Tools</a>';
	  break;	  
	  case 'dealer':
	  echo '<a href="dealerHome.php">Dealer Tools</a>';
	  break;	  
	  case 'club':	
	  echo '<a href="clubView.php?ID='.$Encryption->encode($User->getCoinClubID()).'">Club Tools</a>';
	  break;
	
	}
    ?>
    </td>
  </tr>
</table>
<table width="100%" id="reportListLinks">
  <tr>
    <td class="darker">Circulated</td>
    <td class="darker"><a href="Cent.php">Cents</a></td>
    <td class="darker"><a href="Half_Dime.php">Half Dimes</a></td>    
    <td class="darker"><a href="Nickel.php">Nickels</a></td>
    <td class="darker"><a href="Dime.php">Dimes</a></td>
    <td class="darker"><a href="Quarter.php">Quarters</a></td>    
    <td class="darker"><a href="Half_Dollar.php">Halves</a></td>
    <td class="darker"><a href="AllDollars.php">Dollars</a></td>    
  </tr>
  <tr>
    <td class="darker">Bullion</td>
    <td class="darker"><a href="reportGold.php">Gold Coins </a></td>
    <td class="darker"><a href="Platinum_American_Eagle.php">Platinum Eagles</a></td>
    <td class="darker"><a href="Gold_American_Eagle.php">Gold Eagles</a></td>
    <td class="darker"><a href="Gold_American_Buffalo.php">Buffalo</a></td>
    <td class="darker"><a href="Silver_Dollar.php">Silver Eagles</a></td>
    <td class="darker">&nbsp;</td>
    <td class="darker">&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Other</td>
    <td class="darker"><a href="Commemorative.php">Commemoratives</a></td>
    <td class="darker"><a href="mintset.php">Mint Sets</a></td>
    <td class="darker"><a href="myRolls.php">Rolls</a></td>
    <td class="darker"><a href="myBags.php">Bags</a></td>
    <td class="darker"><a href="FirstDay.php">First Day</a></td>
    <td class="darker"><a href="myFolders.php">Folders</a></td>
    <td class="darker"><a href="coinContainer.php">Containers</a></td>
  </tr>
</table></div></div>