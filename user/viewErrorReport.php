<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);

$categoryLink = str_replace(' ', '_', $coin->getCategoryByType($coinType));
$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'");
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
	  if($pageCategory == "Small Cent"){
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  }
	  $dates = $row['dates'];

  }
 }
 
 $totalByTypeCount = $coin->getCoinCountType($coinType);
 
 $byMintCount = $coin->getCoinByTypeByMint($coinType);
 $uniqueCount = $collection->getCollectionUniqueCountByType($userID, $coinType);
 
 $typePercent = percent($uniqueCount, $byMintCount);
 $typeAllPercent = percent($uniqueCount, $totalByTypeCount); 
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
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );

$("#loaderGif").hide();

$("#typeChanger").change(function() {
   $("#loaderGif").show();
});



 

});
</script>
<style type="text/css">
#listTbl h3 {margin:0px;}
#loaderGif {height:20px; width:auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><?php echo $coinType ?> <?php echo $dates ?> </h2>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="43%" rowspan="8" valign="top"><img id="obvRev" src="../img/<?php echo $coinCatLink ?>_both.jpg" alt="Obverse and reverse" title="<?php echo $coinType ?>" /></td>
    <td>Type</td>
    <td><a href="<?php echo $categoryLink ?>.php"><?php echo $coin->getCategoryByType($coinType) ?></a></td>
  </tr>
  <tr>
    <td width="33%">Total Collected</td>
    <td width="24%"><?php echo $collection->getCollectionCountByType($userID, $coinType) ?></td>
  </tr>
  <tr>
    <td>Total Unique</td>
    <td><?php echo $uniqueCount ?></td>
  </tr>
  <tr>
    <td>Total  Investment</td>
    <td>$<?php echo $collection->getCoinSumByType($coinType, $userID) ?></td>
  </tr>
  <tr>
    <td>Type Collection Progress</td>
    <td> <?php echo $uniqueCount  ?> of <?php echo $byMintCount ?> (<?php echo $typePercent ?>%)</td>
  </tr>
  <tr>
    <td>Complete Variety Progress</td>
    <td><?php echo $uniqueCount ?>  of <?php echo $totalByTypeCount ?> (<?php echo $typeAllPercent ?>%)</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top"><select name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')" id="typeChanger">
      <option selected="selected" value="">Quick Menu</option>
      <optgroup label="Half Cents">
        <option value="Half_Cent.php">All Half Cents</option>
        <option value="viewErrorReport.php?coinType=Liberty_Head_Gold_Dollar">Liberty Cap</option>
        <option value="viewErrorReport.php?coinType=Indian_Princess_Gold_Dollar">Draped Bust</option>
        <option value="viewErrorReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewErrorReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="Large_Cent.php">All Large Cents</option>
        <option value="viewErrorReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewErrorReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewErrorReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewErrorReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewErrorReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewErrorReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="Small_Cent.php">Small Cents</option>
        <option value="viewErrorReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewErrorReport.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewErrorReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewErrorReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewErrorReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewErrorReport.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="Two_Cent.php">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="Three_Cent.php">Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="Half_Dime.php">All Half Dimes</option>
        <option value="viewErrorReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewErrorReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewErrorReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewErrorReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="Nickel.php">All Nickels</option>
        <option value="viewErrorReport.php?coinType=Shield_Nickel">Shield Nickel</option>
        <option value="viewErrorReport.php?coinType=Indian_Head">Indian Head</option>
        <option value="viewErrorReport.php?coinType=Lincoln_Wheat">Lincoln Wheat</option>
        <option value="viewErrorReport.php?coinType=Lincoln_Memorial">Lincoln Memorial</option>
        <option value="viewErrorReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewErrorReport.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="Dime.php">All Dimes</option>
        <option value="viewErrorReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewErrorReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewErrorReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewErrorReport.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewErrorReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewErrorReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="Twenty_Cent.php">Twenty Cent Piece</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="Quarter.php">All Quarters</option>
        <option value="viewErrorReport.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewErrorReport.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewErrorReport.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewErrorReport.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewErrorReport.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewErrorReport.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewErrorReport.php?coinType=State Quarter">State Quarter</option>
        <option value="viewErrorReport.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewErrorReport.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="Half_Dollar.php">All Half Dollars</option>
        <option value="viewErrorReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewErrorReport.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewErrorReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewErrorReport.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewErrorReport.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewErrorReport.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewErrorReport.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewErrorReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="Dollar.php">All Dollars</option>
        <option value="viewErrorReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewErrorReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewErrorReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewErrorReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewErrorReport.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewErrorReport.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewErrorReport.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewErrorReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewErrorReport.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewErrorReport.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewErrorReport.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>
</table>



  <table width="100%" border="0" id="listTbl" class="clear">
  <tr valign="top" class="darker">
    <td width="155"><h3><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/folderIcon.jpg" width="14" height="20" align="texttop" /> Folder View</a></h3></td>
    <td width="186"><a href="viewErrorReport.php?coinType=<?php echo $coinCatLink ?>">Errors</a></td>
    <td width="205"><h3><a href="viewList.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/checkList.jpg" width="21" height="20" align="texttop" /> Check List</a></h3></td>
    <td width="204"><h3><a href="viewCertTypeReport.php?coinType=<?php echo $coinType ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Only</a></h3></td>

    <td width="228" align="center"><a href="viewGradeReport.php?coinType=<?php echo $coinCatLink ?>">Grade Report</a><br /><img src="../img/289.gif" vspace="2" id="loaderGif" /></td>
  </tr>
  </table>
  <div>
<?php include("../inc/pages/$coinCatLink.php"); ?>
</div>

<table width="100%" border="1" class="reportList priceListTbl" cellpadding="3">
    <tr class="keyRow">
      <td>Grade</td>
      <td align="center">Errors</td>
      <td align="center">Third Party Errors</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="SemiKeyRow">
      <td>Error Type</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td width="40%"><strong>Off Center</strong></td>
    <td width="12%" align="center"><?php echo $collection->getTypeError('Off Center', $coinType, $userID); ?></td>
    <td width="26%" align="center"><?php echo $collection->getTypeProError('Off Center', $coinType, $userID); ?></td>
    <td width="22%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Broadstrike</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Broadstrike', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Broadstrike', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Partial Collar</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Partial Collar', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Partial Collar', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Multiple Strike</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Multiple Strike', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Multiple Strike', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Mated Pair</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Mated Pair', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Mated Pair', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Brockage</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Brockage', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Brockage', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Capped Die</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Capped Die', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Capped Die', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Indent</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Indent', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Indent', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Bonded</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Bonded', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Bonded', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Wrong Planchet</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Wrong Planchet', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Wrong Planchet', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Mule</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Mule', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Mule', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Weak Strike</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Weak Strike', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Weak Strike', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Transitional Error</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Transitional Error', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Transitional Error', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Double Denomination</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Double Denomination', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Double Denomination', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Folded Over</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Folded Over', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Folded Over', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Clipped Planchet</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Clipped Planchet', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Clipped Planchet', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Lamination Error</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Lamination Error', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Lamination Error', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Missing Edge Lettering</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Missing Edge Lettering', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Missing Edge Lettering', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Minor Errors</strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Die Cracks</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Die Cracks', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Die Cracks', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Machine Doubling</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Machine Doubling', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Machine Doubling', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Die Deterioration Doubling</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Die Deterioration Doubling', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Die Deterioration Doubling', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Flat Field Doubling</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Flat Field Doubling', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Flat Field Doubling', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Die Deterioration Doubling</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Die Deterioration Doubling', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Die Deterioration Doubling', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Ejection Doubling</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Ejection Doubling', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Ejection Doubling', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Punch Shoulder Outlines</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Punch Shoulder Outlines', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Punch Shoulder Outlines', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Plating Split Doubling</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Plating Split Doubling', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Plating Split Doubling', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Repunched Mint Mark</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Repunched Mint Mark', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Repunched Mint Mark', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Touch up Engraving Doubling</strong></td>
    <td align="center"><?php echo $collection->getTypeError('Touch up Engraving Doubling', $coinType, $userID); ?></td>
    <td align="center"><?php echo $collection->getTypeProError('Touch up Engraving Doubling', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<p><a href="addCoinType.php?coinType=<?php echo $coinCatLink ?>">Add <?php echo $coinType ?></a></p>
  <table width="100%" border="0" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="74%"><strong>Year / Mint</strong></td>  
    <td width="13%" align="center"><strong> Collected</strong></td>
    <td width="13%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
  <?php
/*
$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());

  while($row = mysql_fetch_array($countAll))
	  {
		  
		  
  $collectionID = strip_tags($row['collectionID']);
  $collection->getCollectionById($collectionID);  
  
  $coinType = strip_tags($row['coinType']);
  $additional = strip_tags($row['additional']);
  $coinID = intval($row['coinID']);
  
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $collectedCoinName = $coin->getCoinName();
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?rWeuTTresw='.base64_encode($thePageCode).'&TTrqpUU='.base64_encode($collectionID).'">'.$collectedCoinName.'</a></td>
	<td>'. $collection->getCoinGrade() .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	    
	<td>'.date("F j, Y",strtotime($collection->getCoinDate())) .'</td>

  </tr>
  ';
	  }
  */
  ?>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinType = '$coinType' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>Add Coin</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  
  
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="right">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="74%"><strong>Year / Mint</strong></td>  
    <td width="13%" align="center"><strong> Collected</strong></td>
    <td width="13%" align="right"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
  <p>&nbsp;</p>
  <hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>