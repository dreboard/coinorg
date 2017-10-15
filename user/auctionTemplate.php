<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinID"])) { 
$coinID = intval($_GET["coinID"]);
$pennyQuery = mysql_query("SELECT * FROM coins WHERE coinID = '$coinID'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $coinType = $row['coinType'];
  $coinCategory = $row['coinCategory'];
  $coinName = $row['coinName'];
  $mintage = $row['mintage'];
  $additional = $row['additional'];
  $coinID = $row['coinID'];
  $collection = $row['collection'];
  $linkName = str_replace(' ', '_', $coinType);
  $G4 = $row['G4'];
  $VG8 = $row['VG8'];
  $F12 = $row['F12'];
  $VF20 = $row['VF20'];
  $EF40 = $row['EF40'];  
  $AU50 = $row['AU50'];
  $MS60 = $row['MS60'];
  $MS63 = $row['MS63'];
  $MS65 = $row['MS65'];
  $PR63 = $row['PR63'];
  $PR65 = $row['PR65'];  

  if($collection == 0){
	  $have = 'No, <a href="javascript:void(0)" class="addCoinLink">Add This Coin</a>';
	  $auctionLink = '';
  } else {
	  $have = 'Yes, (0) <a href="javascript:void(0)" class="addCoinLink">Add Another</a>';
	  $auctionLink = '<a href="ebayTemplate.php?coinID='.$coinID.'">Prepare for Auction</a>';
  }
  $image = str_replace(' ', '_', $coinType);
  }
  
  $pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'") or die(mysql_error());
  while($row = mysql_fetch_array($pageQuery))
  {
    $pageName = $row['pageName'];
    $pageText1 = $row['pageText1'];
	$dates = $row['dates'];
  }
  
}
if (isset($_POST["addCoinFormBtn"])) { 
$coinID = intval($_POST["coinID"]);
$pennyGrade = mysql_real_escape_string($_POST["pennyGrade"]);
$name = mysql_real_escape_string($_POST["name"]);
$purchaseDateRaw = mysql_real_escape_string($_POST["purchaseDate"]);
$purchaseParts = explode("/", $purchaseDateRaw);
$year = intval($purchaseParts[2]);
$day = str_pad($purchaseParts[1], 2, '0', STR_PAD_LEFT); 
$month = str_pad($purchaseParts[0], 2, '0', STR_PAD_LEFT); 
$purchaseDate = date($year.'-'.$month.'-'.$day);
$enterDate = date('Y-m-d H:i:s');
if($_POST["purchaseFrom"] == ''){
	$purchaseFrom = 'None';
} else {
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
}

$insertCoin = mysql_query("INSERT INTO collection(coinType, name, pennyGrade, pennyQuantity, purchaseDate, timeyear) VALUES('$coinType', '$name', '$pennyGrade', '1', '$purchaseDate', '$year')") or die(mysql_error()); 
$newID = mysql_insert_id($insertCoin);
header("location: viewCoin.php?coinID=$newID");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	

});
</script> 
<style type="text/css">


</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Auction Template</h1>

<table width="775px" border="0" style="margin:0px auto;"><tbody><tr><td colspan="2" rowspan="5"><img style="margin:0px;" src="http://www.mycoinorganizer.com/img/logo.jpg" width="361" height="198" alt="My Coin Organizer"></td><td width="45%" align="center"><h1>1972 S Proof Lincoln Memorial</h1></td><td width="1%">&nbsp;</td></tr><tr><td rowspan="9" align="center"><img src="http://www.mycoinorganizer.com/auctions/1970SLincoln.jpg" width="250" height="250" alt="1999-P PCGS MS64FS"></td><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td width="17%"><strong>Coin Type</strong></td>
  <td width="37%">Lincoln Memorial Cent</td><td>&nbsp;</td></tr><tr>
    <td><strong>Year</strong></td>
    <td>1970</td><td>&nbsp;</td></tr><tr>
      <td><strong>Strike</strong></td>
      <td>Proof</td><td>&nbsp;</td></tr><tr><td><strong>Delivery</strong></td><td> No international delivery </td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
  <tr>
    <td colspan="3" valign="top">
    <p><strong>1972 S Choice Proof Lincoln Memorial Penny Cent</strong></p>
    <p>You are looking at a proof Lincoln Memorial Penny. Proof coins are made by the mint as exceptional examples of each coin type and date, intended for the collector.<br />
      <br />
      Proof pennies prior to 1968 have no mintmark and were produced at the Philadelphia mint. From 1968 forward they bear an S mintmark, showing that they were made at the San Francisco mint. For the years 1965, 1966 and 1967 no proof pennies were made by the mint, but in their place Special Mint Set coins were produced. SMS coins are not as brilliant and shiny as proofs but they are still exceptional when compared to the common circulating coins.</p>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr><td colspan="3"><strong>TERMS</strong>. Payment is due within 72 hours of purchase unless other arrangements are made. </td><td>&nbsp;</td></tr>
</tbody></table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</body>
</html>