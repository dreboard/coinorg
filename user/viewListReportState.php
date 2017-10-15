<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["page"])) { 
$coinType = "State Quarter";
$coinTypeLink = "State Quarter";
$pennyImg = str_replace(' ', '_', $coinType);
$page = $_GET['page'];

$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = 'State Quarter'");
while($row = mysql_fetch_array($pageQuery))
  {
	  $pageCategory = $row['pageCategory'];
	  $buttonTxt = str_replace('_', ' ', $pageCategory); 
	  $typeCount = intval($row['typeCount']);
	  $completeSet = intval($row['completeSet']);
	  if($pageCategory == "Half Dime"){
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  }
	  if($pageCategory == "Half Dollar"){
	  $pageCategory = "Half";
	  }
	  $dates = $row['dates'];
 if($page == 1) {
	 $pageName = $row['pageName'];
	 $imgLink = str_replace(' ', '_', $coinType);
  $pageText1 = stripslashes($row['pageText1']);
 } else {
  $pageText1 = "";
  
  }
  }
 }
 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){

$("#viewFolderBtn").click(function() {
   window.location = 'viewFolder.php?coinType=<?php echo $coinType ?>';
});
$("#viewReportBtn").click(function() {
   window.location = 'report<?php echo $pageCategory ?>.php';
});

 

});
</script>
<style type="text/css">


</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<table width="100%" border="0" class="reportListTbl">
  <tr>
    <td colspan="3"><h2><?php echo $coinType ?> <?php echo $dates ?> (List View)</h2></td>
  </tr>
  <tr>
    <td width="43%" rowspan="7" valign="top"><img id="obvRev" src="../img/<?php echo $pennyImg ?>_both.jpg" alt="Obverse and reverse" title="<?php echo $coinType ?>" /></td>
    <td width="33%">Total Collected</td>
    <td width="24%">44</td>
  </tr>
  <tr>
    <td>Total Unique</td>
    <td>30</td>
  </tr>
  <tr>
    <td>Total  Investment</td>
    <td>$125.00</td>
  </tr>
  <tr>
    <td>Type Collection Progress</td>
    <td>1 of 1 (100%)</td>
  </tr>
  <tr>
    <td>Year Collection Progress</td>
    <td>1 of 25 (14%)</td>
  </tr>
  <tr>
    <td valign="top">Complete Collection Progress</td>
    <td valign="top">1 of 100 (1%)</td>
  </tr>
</table>
  
  <p><?php echo $pageText1 ?></p>
  <hr />
<table width=border="1" id="listTbl" class="clear">
  <tr class="darker">
    <td><input  id="viewFolderBtn" class="viewListBtns" name="" type="button" value="Folder View" />
    <input id="viewReportBtn" class="viewListBtns" name="viewReportBtn" type="button" value="View <?php echo $buttonTxt ?> Report" /></td>
    <td><select onChange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Quick Menu</option>
<optgroup label="Half Cents">
<option value="reportCent.php#half">All Half Cents</option>
<option value="viewListReport.php?coinType=Liberty_Head_Gold_Dollar&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Indian_Princess_Gold_Dollar&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Half_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Half_Cent&page=1">Braided Hair</option>
</optgroup>
<optgroup label="Large Cents">
<option value="reportCent.php#large">All Large Cents</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Large_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Large_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent&page=1">Coronet Liberty Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent&page=1">Braided Hair Liberty Head</option>
</optgroup>
<optgroup label="Cents">
<option value="reportCent.php#cent">All Cents</option>
<option value="viewListReport.php?coinType=Flying_Eagle&page=1">Flying Eagle Cent</option>
<option value="viewListReport.php?coinType=Indian_Head&page=1">Indian Head Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat&page=1">Lincoln Wheat Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial&page=1">Lincoln Memorial Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial</option>
<option value="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</option>
</optgroup>
<optgroup label="Two Cents">
<option value="Two_Cent">Two Cent Piece</option>
</optgroup>
<optgroup label="Three Cents">
<option value="Three_Cent">Three Cent Piece</option>
</optgroup>
<optgroup label="Half Dimes">
<option value="reportHalf_Dime.php">All Half Dimes</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Dime&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime&page=1">Liberty Cap Half Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime&page=1">Seated Liberty Half Dime</option>
</optgroup>
<optgroup label="Nickels">
<option value="reportNickel.php">All Nickels</option>
<option value="viewListReport.php?coinType=Shield_Nickel&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Indian_Head&page=1">Indian Head</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat&page=1">Classic Head Half Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial&page=1">Braided Hair Half Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial Series</option>
<option value="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</option>
</optgroup>
<optgroup label="Dimes">
<option value="reportDime.php">All Dimes</option>
<option value="viewListReport.php?coinType=Drapped_Bust_Dime&page=1">Drapped Bust Dime</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Dime&page=1">Liberty Cap Dime</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Dime&page=1">Liberty Seated Dime</option>
<option value="viewListReport.php?coinType=Barber_Dime&page=1">Barber Dime</option>
<option value="viewListReport.php?coinType=Winged_Liberty_Dime&page=1">Winged Liberty Dime</option>
<option value="viewListReport.php?coinType=Roosevelt_Dime&page=1">Roosevelt Dime</option>
</optgroup>
<optgroup label="Twenty Cents">
<option value="Twenty Cents">Twenty Cent Piece</option>
</optgroup>
<optgroup label="Quarters">
<option value="reportQuarter.php">All Quarters</option>
<option value="viewListReport.php?coinType=Draped_Bust_Quarter&page=1">Draped Bust Quarter</option>
<option value="viewListReport.php?coinType=Capped_Bust_Quarter&page=1">Capped Bust Quarter</option>
<option value="viewListReport.php?coinType=Liberty_Seated_Quarter&page=1">Liberty Seated Quarter</option>
<option value="viewListReport.php?coinType=Barber_Quarter&page=1">Barber Quarter</option>
<option value="viewListReport.php?coinType=Standing_Liberty&page=1">Standing Liberty</option>
<option value="viewListReport.php?coinType=Washington_Quarter&page=1">Washington Quarter</option>
<option value="viewListReport.php?coinType=State Quarter&page=1">State Quarter</option>
<option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories&page=1">D.C. and U. S. Territories</option>
<option value="viewListReport.php?coinType=America the Beautiful Quarter&page=1">America the Beautiful Quarter</option>
</optgroup>
<optgroup label="Half Dollars">
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar&page=1">Flowing Hair Half</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Dollar&page=1">Draped Bust Half</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar&page=1">Liberty Cap Half</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Half_Dollar&page=1">Seated Liberty Half</option>
<option value="viewListReport.php?coinType=Barber_Half_Dollar&page=1">Barber Half</option>
<option value="viewListReport.php?coinType=Walking_Liberty&page=1">Walking Liberty Half</option>
<option value="viewListReport.php?coinType=Franklin_Half_Dollar&page=1">Franklin Half</option>
<option value="viewListReport.php?coinType=Kennedy_Half_Dollar&page=1">Kennedy Half</option>
</optgroup>
<optgroup label="Dollars">
<option value="reportDollar.php">All Dollars</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Dollar&page=1">Flowing Hair Dollar</option>
<option value="viewListReport.php?coinType=Draped_Bust_Dollar&page=1">Draped Bust Dollar</option>
<option value="viewListReport.php?coinType=Gobrecht_Dollar&page=1">Gobrecht Dollar</option>
<option value="viewListReport.php?coinType=Seated_Liberty_Dollar&page=1">Seated Liberty Dollar</option>
<option value="viewListReport.php?coinType=Trade_Dollar&page=1">Trade Dollar</option>
<option value="viewListReport.php?coinType=Morgan_Dollar&page=1">Morgan Dollar</option>
<option value="viewListReport.php?coinType=Peace_Dollar&page=1">Peace Dollar</option>
<option value="viewListReport.php?coinType=Eisenhower_Dollar&page=1">Eisenhower Dollar</option>
<option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar&page=1">Susan B. Anthony</option>
<option value="viewListReport.php?coinType=Sacagawea_Dollar&page=1">Sacagawea/Native American</option>
<option value="viewListReport.php?coinType=Presidential_Dollar&page=1">Presidential Dollar</option>
</optgroup>
</select></td>

    <td>&nbsp;</td>
  </tr>
  <tr class="darker">
    <td width="316">Type</td>
    <td width="334">Year/Mint</td>
    <td width="302">In Collection</td>
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
  $mintage = $row['mintage'];
  $additional = $row['additional'];
  $coinID = $row['coinID'];
  $collection = $row['collection'];
  $linkName = str_replace(' ', '_', $coinType);
    if($collection == 0){
	  $have = 'No, <a href="addCoin.php?coinID=$coinID" class="addCoinLink">Add This Coin</a>';
	  $auctionLink = '';
  } else {
	  $have = '<img src="../img/'.$linkName.'.jpg"  title="'.$name.' in collection" class="coinIcon" /> (0) <a href="addCoin.php?coinID=$coinID" class="addCoinLink" title="'.$name.' in collection">Add Another</a>';
	  $auctionLink = '<a href="ebayTemplate.php?coinID=$coinID">Prepare for Auction</a>';
  }
  echo "
    <tr>
    <td>$coinType</td>
    <td><a href='viewCoin.php?coinID=$coinID'  title='".$name."' View'>$name</a></td>
	<td>$have</td>
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
            echo "<a class='pageList' href='viewListReportState.php?page=".$i."&coinType=".$coinTypeLink."'> ".$i." </a> "; 
}; 
echo "<br />Page " . $page;

?>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>