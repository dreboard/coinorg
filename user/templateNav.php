<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css"> 

nav {
	margin: 0px auto; 
	text-align: center;
}

nav ul ul {
	display: none;
}

	nav ul li:hover > ul {
		display: block;
	}


nav ul {
	background: #efefef; 
	background: linear-gradient(top, #efefef 0%, #bbbbbb 100%);  
	background: -moz-linear-gradient(top, #efefef 0%, #bbbbbb 100%); 
	background: -webkit-linear-gradient(top, #efefef 0%,#bbbbbb 100%); 
	box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
	padding: 0 20px;
	border-radius: 10px;  
	list-style: none;
	position: relative;
	display: inline-table;
}
	nav ul:after {
		content: ""; clear: both; display: block;
	}

	nav ul li {
		float: left;
	}
		nav ul li:hover {
			background: #4b545f;
			background: linear-gradient(top, #4f5964 0%, #5f6975 40%);
			background: -moz-linear-gradient(top, #4f5964 0%, #5f6975 40%);
			background: -webkit-linear-gradient(top, #4f5964 0%,#5f6975 40%);
		}
			nav ul li:hover a {
				color: #fff;
			}
		
		nav ul li a {
			display: block; padding: 25px 40px;
			color: #757575; text-decoration: none;
		}
			
		
	nav ul ul {
		background: #5f6975; border-radius: 0px; padding: 0;
		position: absolute; top: 100%;
	}
		nav ul ul li {
			float: none; 
			border-top: 1px solid #6b727c;
			border-bottom: 1px solid #575f6a; position: relative;
		}
			nav ul ul li a {
				padding: 15px 40px;
				color: #fff;
			}	
				nav ul ul li a:hover {
					background: #4b545f;
				}
		
	nav ul ul ul {
		position: absolute; left: 100%; top:0;
	}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>








<h1>My Collection</h1>
<nav><ul id="navUlMenu" class="headerTbl">
  <li><a href="index.php">Home</a></li>
  <li><a href="">Denominations</a>
    <ul>
      <li><a href="Half_Cent.php">Half Cent</a></li>
      <li><a href="Large_Cent.php">Large Cent</a></li>
      <li><a href="Small_Cent.php">Small Cent</a></li>
      <li><a href="Two_Cent.php">Two Cent</a></li>
      <li><a href="Three_Cent.php">Three Cent</a></li>
      <li><a href="Half_Dime.php">Half Dime</a></li>
      <li><a href="Nickel.php">Nickel</a></li>
      <li><a href="Dime.php">Dime</a></li>
      <li><a href="Twenty_Cent.php">Twenty Cent</a></li>
      <li><a href="Quarter.php">Quarter</a></li>
      <li><a href="Half_Dollar.php">Half_Dollar</a></li>
      <li><a href="AllDollars.php">Dollar</a></li>
      <li><a href="Quarter_Eagle.php">Quarter Eagle</a></li>
      <li><a href="Three_Dollar.php">Three Dollar</a></li>
      <li><a href="Four_Dollar.php">Four Dollar</a></li>
      <li><a href="Five_Dollar.php">Five Dollar</a></li>
      <li><a href="Ten_Dollar.php">Ten Dollar</a></li>
      <li><a href="Twenty_Dollar.php">Twenty Dollar</a></li>
      <li><a href="Twenty_Five_Dollar.php">Twenty Five Dollar</a></li>
      <li><a href="Fifty_Dollar.php">Fifty Dollar</a></li>
      <li><a href="One_Hundred_Dollar.php">One Hundred Dollar</a></li>
     </ul>
  </li>
  <li><a href="report.php">Reports</a>
    <ul>
      <li><a href="viewCollection.php">My Collection</a></li>
      <li><a href="Commemorative.php">Commemoratives</a></li>
    <li><a href="reportGold.php">Gold Coins </a></li>
    <li><a href="Platinum_American_Eagle.php">Platinum Eagles</a></li>
    <li><a href="Gold_American_Eagle.php">Gold Eagles</a></li>
    <li><a href="Gold_American_Buffalo.php">Buffalo</a></li>
    <li><a href="Silver_Dollar.php">Silver Eagles</a></li>
    </ul>
  </li>
  <li><a href="addCoin.php">Add Item</a>
    <ul>
      <li><a href="addCoinRaw.php">Add Coin</a></li>
      <li><a href="addMintSet.php">Mint Set</a></li>
      <li><a href="addRollType.php">Rolls</a></li>
      <li><a href="addBulkCoins.php">Bulk Coin Lot</a></li>      
      <li><a href="addBulk.php">All Bulk Items</a></li>
    </ul>
  </li>
    <li><a href="My Collection.php">My Collection</a>
    <ul>
      <li><a href="myCoins.php">My Coins</a></li>
    <li><a href="Commemorative.php">Commemoratives</a></li>
    <li><a href="mintset.php">Mint Sets</a></li>
    <li><a href="myRolls.php">Rolls</a></li>
    <li><a href="myBags.php">Bags</a></li>
    <li><a href="FirstDay.php">First Day</a></li>
    <li><a href="myFolders.php">Folders</a></li>
    <li><a href="myBoxes.php">Boxes</a></li>
     </ul>
  </li>
    <li><a href="">Community</a>
    <ul>
      <li><a href="forumMain.php">Forum</a></li>
      <li><a href="clubViewAll.php">Coin Clubs</a></li>
      <li><a href="saleList.php">Coin Classifieds</a></li>
     </ul>
  </li>
</ul></nav>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
</p>
<hr />

<br />


<noscript>
<a href="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2FCoinNewsnet%3Fformat%3Dxml&chan=y&num=20&desc=1&date=y&targ=y&utf=y&html=y">View RSS feed</a>
</noscript>

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>