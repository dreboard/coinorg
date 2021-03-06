<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$categoryLink = $_GET["coinCategory"];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Key Check List</title>
<script type="text/javascript">
$(document).ready(function(){


});
</script>  


<style type="text/css">
.gradeNums td {padding:5px; font-size:120%;}

</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<table width="100%" border="0">
  <tr>
    <td width="77%"><h1><img src="../img/<?php echo strip_tags($_GET["coinCategory"]) ?>.jpg" alt="" width="100" height="100" align="middle" id="setTypes"> My <?php echo $coinCategory; ?> Key Check List</h1></td>
    <td width="23%" align="center" valign="top">
    <select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Category....</option>
      <option value="viewKeyCategory.php?coinCategory=Half_Cent">Half Cents</option>
      <option value="viewKeyCategory.php?coinCategory=Large_Cent">Large Cent</option>
      <option value="viewKeyCategory.php?coinCategory=Small_Cent">Small Cents</option>
      <option value="viewKeyCategory.php?coinCategory=Two_Cent">Two Cent</option>
      <option value="viewKeyCategory.php?coinCategory=Three_Cent">Three Cent</option>
      <option value="viewKeyCategory.php?coinCategory=Half_Dime">Half Dime</option>
      <option value="viewKeyCategory.php?coinCategory=Nickel">Nickel</option>
      <option value="viewKeyCategory.php?coinCategory=Dime">Dime</option>
      <option value="viewKeyCategory.php?coinCategory=Quarter">Quarter</option>
      <option value="viewKeyCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
      <option value="viewKeyCategory.php?coinCategory=Dollar">Dollar</option>
    </select></td>
  </tr>
</table>

<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="50%" class="darker"><a href="myCoins.php">Key Report</a></td>
    <td width="50" class="darker"><a href="viewKeyCheck.php">Checklist</a></td>   
  </tr>
</table>

<hr>

<table width=100% id="listTbl" class="clear">
  <tr class="darker">
    <td width="523">Year/Mint</td>
    <td width="213">In Collection</td>
    <td width="248">Type</td>
  </tr>
<?php 




$countAll = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND keyDate = '1' ORDER BY coinYear ASC") or die(mysql_error());

while($row = mysql_fetch_array($countAll))
  {
  $coinType = $row['coinType'];
  $name = $row['coinName'];
  $mintage = $row['mintage'];
  $coinID = $row['coinID'];

  $coinTypeLink = str_replace(' ', '_', $coinType);
    if($collection->checkCollection($coinID, $userID) == 0){
	  $have = 'No, <a href="addCoinByID.php?coinID='.$coinID.'" class="addCoinLink">Add This Coin</a>';
	  $auctionLink = '';
  } else {
	  $have = '<img src="../img/'.$coinTypeLink.'.jpg"  title="'.$name.' in collection" class="coinIcon" /> (0) <a href="addCoinByID.php?coinID='.$coinID.'" class="addCoinLink" title="'.$name.' in collection">Add Another</a>';
	  $auctionLink = '<a href="ebayTemplate.php?coinID='.$coinID.'">Prepare for Auction</a>';
  }
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$name.'</a></td>
    <td>'.$have.'</td>
	<td><a href="viewKeyTypeReport.php?coinType='.str_replace(' ', '_', $row['coinType']).'">'.$coinType.'</a></td>
  </tr>
  ';
}   

?>
</table>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>