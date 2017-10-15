<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);

$categoryLink = str_replace(' ', '_', $_GET["coinType"]);
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
<title><?php echo $coinType ?> Grade Report</title>
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
<h2><?php echo $coinType ?> Grade Report </h2>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="42%" rowspan="8" valign="top"><img id="obvRev" src="../img/<?php echo $coinCatLink ?>_both.jpg" alt="Obverse and reverse" title="<?php echo $coinType ?>" /></td>
    <td>Total Graded</td>
    <td><a href="<?php echo $categoryLink ?>.php"><?php echo $coin->getCategoryByType($coinType) ?></a></td>
  </tr>
  <tr>
    <td width="31%">Total Ungraded</td>
    <td width="27%"><a href="viewNoGradeReport.php?coinType=<?php echo $coinType ?>"><?php echo $collection->getNoGradeTypeCount($coinType, $userID); ?></a></td>
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
        <option value="viewGradeReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewGradeReport.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewGradeReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewGradeReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="LargeCentGrades.php">Large Cent</option>
        <option value="viewGradeReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewGradeReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewGradeReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewGradeReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewGradeReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewGradeReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="SmallCentGrades.php">Small Cents</option>
        <option value="viewGradeReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewGradeReport.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewGradeReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewGradeReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewGradeReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewGradeReport.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="TwoCentGrades.php">Two Cent Grades</option>
        <option value="viewGradeReport.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="ThreeCentGrades.php">Three Cent Grades</option>
        <option value="viewGradeReport.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewGradeReport.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="HalfDimeGrades.php">Half Dime Grades</option>
        <option value="viewGradeReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewGradeReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewGradeReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewGradeReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="NickelGrades.php">Nickel Grades</option>
        <option value="viewGradeReport.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewGradeReport.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewGradeReport.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewGradeReport.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewGradeReport.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewGradeReport.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="DimeGrades.php">Dime Grades</option>
        <option value="viewGradeReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewGradeReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewGradeReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewGradeReport.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewGradeReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewGradeReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="TwentyCentGrades.php">Twenty Cent Grades</option>
        <option value="viewGradeReport.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="QuarterGrades.php">Quarter Grades</option>
        <option value="viewGradeReport.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewGradeReport.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewGradeReport.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewGradeReport.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewGradeReport.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewGradeReport.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewGradeReport.php?coinType=State Quarter">State Quarter</option>
        <option value="viewGradeReport.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewGradeReport.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="HalfDollarGrades.php">Half Dollar Grades</option>
        <option value="viewGradeReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewGradeReport.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewGradeReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewGradeReport.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewGradeReport.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewGradeReport.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewGradeReport.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewGradeReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="DollarGrades.php">Dollar Grades</option>
        <option value="viewGradeReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewGradeReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewGradeReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewGradeReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewGradeReport.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewGradeReport.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewGradeReport.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewGradeReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewGradeReport.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewGradeReport.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewGradeReport.php?coinType=Presidential_Dollar">Presidential Dollar</option>
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
  <div>
&nbsp;
</div>



<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td align="center"><strong>Basal 0</strong></td>
    <td align="center"><strong>PO-1</strong></td>
    <td align="center"><strong>FR-2</strong></td>
    <td align="center"><strong>AG-3</strong></td>
    <td align="center"><strong>G-4</strong></td>
    <td align="center"><strong>G-6</strong></td>
    <td align="center"><strong>VG-8</strong></td>
    <td align="center"><strong>VG-10</strong></td>
    <td align="center"><strong>F-12</strong></td>
    <td align="center"><strong>F-15</strong></td>
  </tr>
  <tr>
    <td>Raw</td>
    <td align="center"><a href="viewGradeType.php?coinGrade=B0&amp;coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('B0', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=P1&amp;coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('P1', $coinType ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getTypeGrade('FR2', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('AG3', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('G4', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('G6', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('VG8', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('VG10', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('F12', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('F15', $coinType ,$userID); ?></td>
  </tr>
  <tr>
    <td>Slab</td>
    <td align="center"><?php echo $collection->getProGrade('B0', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('P1', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('FR2', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('AG3', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('G4', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('G6', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VG8', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VG10', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('F12', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('F15', $coinType,$userID); ?></td>
  </tr>
</table>






<table width="100%" border="1" class="reportTbl" cellpadding="3">
    <tr class="darker">
      <td>Grade</td>
      <td align="center">Grade</td>
      <td align="center">Third Party Grade</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="SemiKeyRow">
      <td colspan="4"><strong>Business Strikes</strong></td>
      </tr>
    <tr>
    <td width="21%"><strong>Basal 0</strong></td>
    <td width="20%" align="center"><a href="viewGradeType.php?coinGrade=B0&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('B0', $coinType ,$userID); ?></a></td>
    <td width="28%" align="center"><a href="viewProGrade.php?coinGrade=B0&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('B0', $coinType ,$userID); ?></td>
    <td width="31%" align="center"><?php echo $collection->getTotalGrade('B0', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PO-1</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=P1&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('P1', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=P1&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('P1', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('P1', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>FR-2</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=FR2&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('FR2', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=FR2&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('FR2', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('FR2', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AG-3</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=AG3&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('AG3', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AG3&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('AG3', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('AG3', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>G-4</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=G4&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('G4', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=G4&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('G4', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('G4', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>G-6</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=G6&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('G6', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=G6&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('G6', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('G6', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VG-8</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VG8&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('VG8', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VG8&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('VG8', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VG8', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VG-10</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VG10&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('VG10', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VG10&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('VG10', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VG10', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>F-12</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=F12&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('F12', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=F12&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('F12', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('F12', $coinType, $userID) ?></td>
  </tr>
    <tr>
    <td><strong>F-15</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=F15&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('F15', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=F15&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('F15', $coinType,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('F15', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-20</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VF20&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('VF20', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF20&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('VF20', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VF20', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-25</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VF25&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('VF25', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF25&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('VF25', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VF25', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-30</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VF30&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('VF30', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF30&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('VF30', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VF30', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-35</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VF35&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('VF35', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF35&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('VF35', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VF35', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>EF-40</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=EF40&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('EF40', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=EF40&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('EF40', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('EF40', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>EF-45</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=EF45&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('EF45', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=EF45&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('EF45', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('EF45', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-50</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=AU50&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('AU50', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU50&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('AU50', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('AU50', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-55</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=AU55&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('AU55', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU55&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('AU55', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('AU55', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-58</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=AU58&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('AU58', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU58&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('AU58', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('AU58', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-60</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS60&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS60', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS60&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS60', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS60', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-61</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS61&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS61', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS61&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS61', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS61', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-62</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS62&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS62', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS62&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS62', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS62', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-63</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS63&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS63', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS63&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS63', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS63', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-64</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS64&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS64', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS64&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS64', $coinType ,$userID); ?></td>
     <td align="center"><?php echo $collection->getTotalGrade('MS64', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-65</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS65&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS65', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS65&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS65', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS65', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-66</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS66&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS66', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS66&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS66', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS66', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-67</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS67&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS67', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS67&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS67', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS67', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-68</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS68&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS68', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS68&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS68', $coinType,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS68', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-69</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS69&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS69', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS69&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS69', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS69', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-70</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS70&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getTypeGrade('MS70', $coinType ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS70&coinType=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrade('MS70', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS70', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td colspan="4"><strong>Proofs</strong></td>
    </tr>
    <tr>
    <td><strong>PR-35</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR35&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR35', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR35&coinType=Small_Cent"><?php echo $collection->getProGrade('PR35', $coinType ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR35', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-40</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR40&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR40', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR40&coinType=Small_Cent"><?php echo $collection->getProGrade('PR40', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR40', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-45</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR45&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR45', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR45&coinType=Small_Cent"><?php echo $collection->getProGrade('PR45', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR45', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-50</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR50&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR50', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR50&coinType=Small_Cent"><?php echo $collection->getProGrade('PR50', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR50', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-55</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR55&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR55', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR55&coinType=Small_Cent"><?php echo $collection->getProGrade('PR55', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR55', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-58</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR58&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR58', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR58&coinType=Small_Cent"><?php echo $collection->getProGrade('PR58', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR58', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-60</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR60&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR60', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR60&coinType=Small_Cent"><?php echo $collection->getProGrade('PR60', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR60', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-61</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR61&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR61', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR61&coinType=Small_Cent"><?php echo $collection->getProGrade('PR61', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR61', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-62</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR62&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR62', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR62&coinType=Small_Cent"><?php echo $collection->getProGrade('PR62', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR62', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-63</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR63&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR63', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR63&coinType=Small_Cent"><?php echo $collection->getProGrade('PR63', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR63', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-64</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR64&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR64', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR64&coinType=Small_Cent"><?php echo $collection->getProGrade('PR64', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR64', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-65</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR65&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR65', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR65&coinType=Small_Cent"><?php echo $collection->getProGrade('PR65', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR65', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-66</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR66&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR66', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR66&coinType=Small_Cent"><?php echo $collection->getProGrade('PR66', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR66', $coinType, $userID) ?></td>
  </tr>
    <tr>
    <td><strong>PR-67</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR67&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR67', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR67&coinType=Small_Cent"><?php echo $collection->getProGrade('PR67', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR67', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-68</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR68&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR68', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR68&coinType=Small_Cent"><?php echo $collection->getProGrade('PR68', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR68', $coinType, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-69</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR69&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR69', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR69&coinType=Small_Cent"><?php echo $collection->getProGrade('PR69', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR69', $coinType, $userID) ?></td>
  </tr>
    <tr>
    <td><strong>PR-70</strong></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR70&coinType=Small_Cent"><?php echo $collection->getTypeGrade('PR70', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR70&coinType=Small_Cent"><?php echo $collection->getProGrade('PR70', $coinType, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR70', $coinType, $userID) ?></td>
  </tr>
</table>


<p><a href="addCoinType.php?coinType=<?php echo $coinCatLink ?>">Add <?php echo $coinType ?></a></p>
  
  <p>&nbsp;</p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>