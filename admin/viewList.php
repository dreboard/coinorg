<?php 
include '../inc/config.php';
 
if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$pennyImg = str_replace(' ', '_', $coinType);

 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta name="keywords" content="Coin collection, coin folders, Union Shield, Lincoln Bicentennial, Lincoln Memorial, Lincoln Wheat, Indian Head, Flying Eagle, Nickels, Shield Nickel, Liberty Head, Buffalo Nickel, Jefferson Nickel, Westward Journey Series, Dimes, gold coin Investment, Half Dime, Liberty Head, Liberty Seated, Mercury Dime, Roosevelt Dime, Quarters, Liberty Seated Quarter, Barber Quarter, Standing Liberty, Washington Quarter, Statehood, D.C. and U. S. Territories, America the Beautiful, Half-Dollars, Liberty Half, Barber Half, Walking Liberty, Franklin Half, Kennedy Half, Dollars, Seated Liberty, Trade Dollar, Morgan dollar, Peace dollar, Eisenhower dollar, Susan B. Anthony, Sacagawea, Native American Series, Presidential Dollar" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<script src="../scripts/modernizr.js"></script>
<script type="text/javascript" src="../scripts/main.js"></script>
<title><?php echo $coinType ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">

#obvRev {margin:0px auto; display:block;}
.coinIcon {height:17px; width:17px;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>

<div id="content" class="clear">
<h1>Manage <?php echo $coinType ?> Coins</h1>
  <img id="obvRev" src="../img/<?php echo $pennyImg ?>_both.jpg" width="600" height="310" alt="Obverse and reverse" />
<table width=border="1" id="listTbl" class="clear">
  <tr class="darker">
    <td width="149">Type</td>
    <td width="202">Year/Mint</td>
    <td width="159">Update Values</td>
  </tr>
<?php 
if (isset($_GET["page"])) { 
$page = $_GET["page"]; 

$start_from = ($page-1) * 25; 
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
$allCount = mysql_num_rows($countAll);
$resultAll = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' LIMIT $start_from, 25") or die(mysql_error());
while($row = mysql_fetch_array($resultAll))
  {
  $coinType = $row['coinType'];
  $name = $row['coinName'];
  $coinID = $row['coinID'];
  $linkName = str_replace(' ', '_', $coinType);

  echo "
    <tr>
    <td>$coinType</td>
    <td><a href='viewCoin.php?coinID=$coinID'  title='".$name."' View'>$name</a></td>
	<td><a href='values.php?coinID=$coinID' title='".$name."' View'>Update Values</a></td>
  </tr>
  ";
}   
}
?>
</table>
<br />
<?php 
$rs_result = mysql_query("SELECT COUNT(*) FROM coins WHERE coinType = '$coinType'");
$row = mysql_fetch_array($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 25); 
 
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a class='pageList' href='viewList.php?page=".$i."&coinType=".$coinTypeLink."'> ".$i." </a> "; 
}; 
echo "<br />Page " . $page;

?>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>