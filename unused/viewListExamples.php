<?php 
include 'inc/configSite.php';
 
if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$pennyImg = str_replace(' ', '_', $coinType);

$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'");
while($row = mysql_fetch_array($pageQuery))
  {
	  $dates = $row['dates'];

	 $pageName = $row['pageName'];
  $pageText1 = stripslashes($row['pageText1']);

  }
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<script src="scripts/modernizr.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>
<title><?php echo $coinType ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">

#obvRev {margin:0px auto; display:block;}
.coinIcon {height:17px; width:17px;}
.coinSubType {height:200px; width:auto;}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("inc/pageElements/nav.php"); ?>

<div id="content" class="clear">
<h2><?php echo $coinType ?> <?php echo $dates ?></h2>
  <img id="obvRev" src="img/<?php echo $pennyImg ?>_both.jpg" width="600" height="310" alt="Obverse and reverse" />
  <p><?php echo $pageText1 ?></p>
<table width=958 id="listTbl" class="clear">
  <tr class="darker">
    <td width="352">Year/Mint</td>
    <td width="152">Mintage</td>
    <td width="210">Additional</td>
</tr>
<?php 

$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());

while($row = mysql_fetch_array($countAll))
  {
  $coinType = $row['coinType'];
  $name = $row['coinName'];
  $mintage = $row['mintage'];
  $additional = $row['additional'];
  $coinID = $row['coinID'];
  $collection = $row['collection'];
  $linkName = str_replace(' ', '_', $coinType);
    if($collection == 0){
	  $have = 'No, <a href="addCoin.php?coinID=$coinID" class="addCoinLink">Add This Coin</a>';
	  $auctionLink = '';
  } else {
	  $have = '<img src="img/'.$linkName.'.jpg"  title="'.$name.' in collection" class="coinIcon" /> (0) <a href="addCoin.php?coinID=$coinID" class="addCoinLink" title="'.$name.' in collection">Add Another</a>';
	  $auctionLink = '<a href="ebayTemplate.php?coinID=$coinID">Prepare for Auction</a>';
  }
  echo "
    <tr>
    <td><a href='viewCoin.php?coinID=$coinID'  title='".$name."' View'>$name</a></td>
    <td>$mintage</td>
    <td>".summary($additional, $limit=50, $strip = false)."</td>
  </tr>
  ";
}   

?>
</table>

<p><a class="topLink" href="#top">Top</a></p>

</div>

</body>
</html>