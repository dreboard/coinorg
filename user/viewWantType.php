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


});
</script>
<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><?php echo $coinType ?>  Report</h2>
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
    <td valign="top">&nbsp;</td>
  </tr>
</table>



  <table width="100%" border="0" id="listTbl" class="clear">
  <tr valign="top" class="darker">
    <td width="27" align="center" valign="middle"><h3><a href="viewListReport.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/coinIcon.jpg" width="21" height="20" align="texttop" /></a></h3></td>
    <td width="126" valign="middle"><a href="viewListReport.php?coinType=<?php echo $coinCatLink ?>">Report View</a></td>
    <td width="27" align="center" valign="middle"><h3><a href="viewList.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/checkList.jpg" width="21" height="20" align="texttop" /></a></h3></td>
    <td width="151" valign="middle"><a href="viewList.php?coinType=<?php echo $coinCatLink ?>">Check List</a></td>
    <td width="27" align="center" valign="middle"><h3><a href="viewGradeReport.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/gradeIcon.jpg" width="21" height="20" align="texttop" /></a></h3></td>
    <td width="145" valign="middle"><a href="viewGradeReport.php?coinType=<?php echo $coinCatLink ?>">Grade Report</a></td>
    <td width="31" align="center" valign="middle"><h3><a href="viewCertTypeReport.php?coinType=<?php echo $coinType ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /></a></h3></td>
    <td width="185" valign="middle"><a href="viewCertTypeReport.php?coinType=<?php echo $coinType ?>">Certified Only </a></td>

    <td width="243" align="center" valign="middle"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <optgroup label="Half Cents">
        <option value="HalfCentGrades.php">Half Cents</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewListReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewListReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="LargeCentGrades.php">Large Cent</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewListReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="SmallCentGrades.php">Small Cents</option>
        <option value="viewListReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewListReport.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewListReport.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="TwoCentGrades.php">Two Cent Grades</option>
        <option value="viewListReport.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="ThreeCentGrades.php">Three Cent Grades</option>
        <option value="viewListReport.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewListReport.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="HalfDimeGrades.php">Half Dime Grades</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="NickelGrades.php">Nickel Grades</option>
        <option value="viewListReport.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewListReport.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewListReport.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewListReport.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewListReport.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewListReport.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="DimeGrades.php">Dime Grades</option>
        <option value="viewListReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewListReport.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewListReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewListReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="TwentyCentGrades.php">Twenty Cent Grades</option>
        <option value="viewListReport.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="QuarterGrades.php">Quarter Grades</option>
        <option value="viewListReport.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewListReport.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewListReport.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewListReport.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewListReport.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewListReport.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewListReport.php?coinType=State Quarter">State Quarter</option>
        <option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewListReport.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="HalfDollarGrades.php">Half Dollar Grades</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewListReport.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewListReport.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewListReport.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewListReport.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewListReport.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewListReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="DollarGrades.php">Dollar Grades</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewListReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewListReport.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewListReport.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewListReport.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewListReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewListReport.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewListReport.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select>      <br /></td>
  </tr>
  <tr valign="top" class="darker">
    <td align="center" valign="middle"><h3><a href="coinTypeRolls.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/rollReportIcon.jpg" alt="" width="14" height="20" align="texttop" /></a></h3></td>
    <td valign="middle"><a href="coinTypeRolls.php?coinType=<?php echo $coinCatLink ?>">Coin Rolls</a></td>
    <td width="27" align="center" valign="middle"><h3><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/folderIcon.jpg" alt="" width="14" height="20" align="texttop" /></a></h3></td>
    <td width="151" valign="middle"><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"> Folder View</a></td>
    <td align="center" valign="middle"><h3><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/bagIcon2.jpg" alt="" width="21" height="20" align="texttop" /></a></h3></td>
    <td valign="middle"><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"> Bags</a></td>
    <td align="center" valign="middle"><h3><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/boxIcon2.jpg" alt="" width="21" height="20" align="texttop" /></a></h3></td>
    <td valign="middle"><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"> Boxes</a></td>
    <td align="center" valign="middle"><img src="../img/289.gif" vspace="2" id="loaderGif" /></td>
  </tr>
  </table>
  <hr />

  <div>
<?php include("../inc/pages/$coinCatLink.php"); ?>
</div>
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