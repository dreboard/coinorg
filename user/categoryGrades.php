<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$categoryLink = $_GET["coinCategory"];

if($collection->getTypeCollectionProgress($coinCategory, $userID) == 0){
$ungradedTypeDisplay = '(0)';
} else {
	$ungradedTypeDisplay = '';
}
$allTypes = getSubCatCount($coinCategory);
$typeCollected = getSubVarietyCountCollected($userID, $coinCategory);
$completeTypeProgress = $General->percent($typeCollected, $allTypes);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinCategory ?> Grade Report</title>
<style type="text/css">
.miniGraphDiv {width:100%;}
</style>

</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<table width="100%" border="0">
  <tr>
    <td width="77%"><h1><img src="../img/<?php echo $categoryLink ?>.jpg" width="100" height="100" align="middle"> <?php echo $coinCategory ?> Grade Report</h1></td>
    <td width="23%" align="center" valign="top" id="changerRow"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <optgroup label="Half Cents">
        <option value="categoryGrades.php?coinCategory=Half_Cent">Half Cents</option>
        <option value="viewGradeReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewGradeReport.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewGradeReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewGradeReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="categoryGrades.php?coinCategory=Large_Cent">Large Cent</option>
        <option value="viewGradeReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewGradeReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewGradeReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewGradeReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewGradeReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewGradeReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Small Cents">
        <option value="categoryGrades.php?coinCategory=Small_Cent">Small Cents</option>
        <option value="viewGradeReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewGradeReport.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewGradeReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewGradeReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewGradeReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewGradeReport.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="categoryGrades.php?coinCategory=Two_Cent">Two Cent Grades</option>
        <option value="viewGradeReport.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="categoryGrades.php?coinCategory=Three_Cent">Three Cent Grades</option>
        <option value="viewGradeReport.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewGradeReport.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="categoryGrades.php?coinCategory=Half_Dime">Half Dime Grades</option>
        <option value="viewGradeReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewGradeReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewGradeReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewGradeReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="categoryGrades.php?coinCategory=Nickel">Nickel Grades</option>
        <option value="viewGradeReport.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewGradeReport.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewGradeReport.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewGradeReport.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewGradeReport.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewGradeReport.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="categoryGrades.php?coinCategory=Dime">Dime Grades</option>
        <option value="viewGradeReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewGradeReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewGradeReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewGradeReport.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewGradeReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewGradeReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="categoryGrades.php?coinCategory=Twenty_Cent">Twenty Cent Grades</option>
        <option value="viewGradeReport.php?coinCategory=Twenty_Cent">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="categoryGrades.php?coinCategory=Quarter">Quarter Grades</option>
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
        <option value="categoryGrades.php?coinCategory=Half_Dollar">Half Dollar Grades</option>
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
        <option value="categoryGrades.php?coinCategory=Dollar">Dollar Grades</option>
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
    </select><img src="../img/289.gif" vspace="2" id="loaderGif" /></td>
  </tr>
</table>
  <div>
  <?php include("../inc/pageElements/categoryLinks.php"); ?>
<?php include("../inc/coinGrade/$categoryLink.php"); ?>
    
    <hr>
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="16%">Ungraded</td>
    <td width="16%">Certified</td>
    <td width="16%">Errors</td>
    <td width="16%">First Day</td>
    <td width="16%">Proofs</td>
    <td width="16%">Unknown</td>
  </tr>
  <tr align="center">
    <td><a href="viewNoGradeReport.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getUngradedCountById($userID, $coinCategory); ?></a></td>
    <td><a href="viewCertCatReport.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getTypeCertificationCountById($userID, $coinCategory); ?></a></td>
    <td><a href="categoryErrors.php?coinCategory=<?php echo str_replace(' ', '_', $coinCategory); ?>"><?php echo $collection->getTypeErrorCountById($userID, $coinCategory); ?></a></td>
    <td><a href="categoryFirstDay.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]) ?>"><?php echo $collection->getTypeFirstDayCountById($userID, $coinCategory); ?></a></td>
    <td><a href="categoryProof.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]) ?>"><?php echo $collection->getTypeProofCountById($userID, $coinCategory); ?></a></td>
    <td><a href="categoryUnknown.php?coinCategory=<?php echo strip_tags($_GET["coinCategory"]) ?>"><?php echo $CollectionUnk->getTotalCollectedCoinsByID($coinCategory, $userID); ?></a></td>
  </tr>
</table>
<h3>Business <?php echo $collection->getGradedStrikeCountByCategory($coinCategory, $userID, $strike='Business') ?></h3>
<p>
<strong>Total Raw:</strong> <?php echo $collection->getTotalCategoryGradeByStrike($strike='Business', $coinCategory, $userID); ?><br />
<strong>Total Certified:</strong> <?php echo $collection->getTotalCategoryProGradeByStrike($strike='Business', $coinCategory, $userID); ?></p> 
<table width="100%" border="0" cellpadding="3" class="byGradeTbl">
  <tr class="keyRow">
    <td width="8%">&nbsp;</td>
    <td width="11%" align="center"><strong>Basal 0</strong></td>
    <td width="9%" align="center"><strong>PO-1</strong></td>
    <td width="8%" align="center"><strong>FR-2</strong></td>
    <td width="8%" align="center"><strong>AG-3</strong></td>
    <td width="8%" align="center"><strong>G-4</strong></td>
    <td width="8%" align="center"><strong>G-6</strong></td>
    <td width="8%" align="center"><strong>VG-8</strong></td>
    <td width="10%" align="center"><strong>VG-10</strong></td>
    <td width="9%" align="center"><strong>F-12</strong></td>
    <td width="9%" align="center"><strong>F-15</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=B0&amp;coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('B0', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=P1&amp;coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('P1', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=FR2&amp;coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('FR2', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=AG3&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('AG3', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=G4&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('G4', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=G6&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('G6', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=VG8&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('VG8', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=VG10&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('VG10', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=F12&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('F12', $coinCategory ,$userID); ?></a></td>
    <td width="9%" align="center"><a href="viewGradeCategory.php?coinGrade=F15&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('F15', $coinCategory ,$userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewProGrade.php?coinGrade=B0&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('B0', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=P1&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('P1', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=FR2&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('FR2', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AG3&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('AG3', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=G4&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('G4', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=G6&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('G6', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VG8&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('VG8', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VG10&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('VG10', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=F12&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('F12', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=F15&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('F15', $coinCategory ,$userID); ?></a></td>
    </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('B0', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('P1', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('FR2', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('AG3', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('G4', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('G6', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('VG8', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('VG10', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('F12', $coinCategory, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalCategoryGrade('F15', $coinCategory, $userID) ?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>

  <tr class="keyRow">
    <td width="8%">&nbsp;</td>
    <td width="11%" align="center"><strong>VF-20</strong></td>
    <td width="9%" align="center"><strong>VF-25</strong></td>
    <td width="8%" align="center"><strong>VF-30</strong></td>
    <td width="8%" align="center"><strong>VF-35</strong></td>
    <td width="8%" align="center"><strong>EF-40</strong></td>
    <td width="8%" align="center"><strong>EF-45</strong></td>
    <td width="8%" align="center"><strong>AU-50</strong></td>
    <td width="10%" align="center"><strong>AU-53</strong></td>
    <td width="10%" align="center"><strong>AU-55</strong></td>
    <td width="9%" align="center"><strong>AU-58</strong></td>
    </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td width="9%" align="center"><a href="viewGradeCategory.php?coinGrade=VF20&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('VF20', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=VF25&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('VF25', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=VF30&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('VF30', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=VF35&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('VF35', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=EF40&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('EF40', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=EF45&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('EF45', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=AU50&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('AU50', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=AU53&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('AU53', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=AU55&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('AU55', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=AU58&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('AU58', $coinCategory ,$userID); ?></a></td>
    </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewProGrade.php?coinGrade=VF20&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('VF20', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF25&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('VF25', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF30&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('VF30', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF35&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('VF35', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=EF40&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('EF40', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=EF45&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('EF45', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU50&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('AU50', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU53&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('AU53', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU55&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('AU55', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU58&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('AU58', $coinCategory ,$userID); ?></a></td>
    </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('VF20', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('VF25', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('VF30', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('VF35', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('EF40', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('EF45', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('AU50', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('AU53', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('AU55', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('AU58', $coinCategory, $userID) ?></strong></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>

  <tr class="keyRow">
    <td>&nbsp;</td>
    <td width="9%" align="center"><strong>MS-60</strong></td>
    <td align="center"><strong>MS-61</strong></td>
    <td align="center"><strong>MS-62</strong></td>
    <td align="center"><strong>MS-63</strong></td>
    <td align="center"><strong>MS-64</strong></td>
    <td align="center"><strong>MS-65</strong></td>
    <td align="center"><strong>MS-66</strong></td>
    <td align="center"><strong>MS-67</strong></td>
    <td align="center"><strong>MS-68</strong></td>
    <td align="center"><strong>MS-69</strong></td>
    </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td width="9%" align="center"><a href="viewGradeCategory.php?coinGrade=MS60&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS60', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=MS61&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS61', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=MS62&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS62', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=MS63&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS63', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=MS64&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS64', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=MS65&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS65', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=MS66&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS66', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=MS67&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS67', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=MS68&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS68', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=MS69&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS69', $coinCategory ,$userID); ?></a></td>
    </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewProGrade.php?coinGrade=MS60&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS60', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS61&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS61', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS62&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS62', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS63&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS63', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS64&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS64', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS65&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS65', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS66&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS66', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS67&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS67', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS68&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS68', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS69&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS69', $coinCategory ,$userID); ?></a></td>
    </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS60', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS61', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS62', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS63', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS64', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS65', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS66', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS67', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS68', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS69', $coinCategory, $userID) ?></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr class="keyRow">
    <td>&nbsp;</td>
    <td align="center"><strong>MS-70</strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td width="9%" align="center">&nbsp;</td>
  </tr>
    <tr>
      <td><strong>Raw</strong></td>
      <td width="9%" align="center"><a href="viewGradeCategory.php?coinGrade=MS70&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('MS70', $coinCategory ,$userID); ?></a></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
        <tr>
          <td><strong>Slab</strong></td>
      <td width="9%" align="center"><a href="viewProGrade.php?coinGrade=PR35&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('MS70', $coinCategory ,$userID); ?></a></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalCategoryGrade('MS70', $coinCategory, $userID) ?></strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>    
    <hr>

<h3>Proofs <?php echo $collection->getStrikeCountByCategory($coinCategory, $userID, $strike='Proof') ?></h3>
<p>
<strong>Total Raw:</strong> <?php echo $collection->getTotalCategoryGradeByStrike($strike='Proof', $coinCategory, $userID); ?><br />
<strong>Total Certified:</strong> <?php echo $collection->getTotalCategoryProGradeByStrike($strike='Proof', $coinCategory, $userID); ?></p> 
<table width="100%" border="0" cellpadding="3" class="byGradeTbl">
  <tr class="keyRow">
    <td>&nbsp;</td>
    <td align="center"><strong>PR-35</strong></td>
    <td align="center"><strong>PR-40</strong></td>
    <td align="center"><strong>PR-45</strong></td>
    <td align="center"><strong>PR-50</strong></td>
    <td align="center"><strong>PR-55</strong></td>
    <td align="center"><strong>PR-58</strong></td>
    <td align="center"><strong>PR-60</strong></td>
    <td align="center"><strong>PR-61</strong></td>
    <td align="center"><strong>PR-62</strong></td>
    <td align="center"><strong>PR-63</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR35&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR35', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR40&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR40', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR45&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR45', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR50&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR50', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR55&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR55', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR58&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR58', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR60&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR60', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR61&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR61', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR62&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR62', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR63&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR63', $coinCategory, $userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR35&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR35', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR40&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR40', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR45&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR45', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR50&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR50', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR55&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR55', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR58&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR58', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR60&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR60', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR61&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR61', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR62&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR62', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR63&coinCategory=<?php echo $coinCategoryLink ?>"><?php echo $collection->getCategoryProGrade('PR63', $coinCategory, $userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR35', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR40', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR45', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR50', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR55', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR58', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR60', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR61', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR62', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR63', $coinCategory, $userID) ?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="keyRow">
    <td>&nbsp;</td>
    <td align="center"><strong>PR-64</strong></td>
    <td align="center"><strong>PR-65</strong></td>
    <td align="center"><strong>PR-66</strong></td>
    <td align="center"><strong>PR-67</strong></td>
    <td align="center"><strong>PR-68</strong></td>
    <td align="center"><strong>PR-69</strong></td>
    <td align="center"><strong>PR-70</strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR64&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR64', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR65&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR65', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR66&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR66', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR67&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR67', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR68&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR68', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR69&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR69', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewGradeCategory.php?coinGrade=PR70&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryGrade('PR70', $coinCategory, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR64&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR64', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR65&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR65', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR66&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR66', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR67&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR67', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR68&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR68', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR69&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR69', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR70&coinCategory=<?php echo $categoryLink ?>"><?php echo $collection->getCategoryProGrade('PR70', $coinCategory, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR64', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR65', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR66', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR67', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR68', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR69', $coinCategory, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalCategoryGrade('PR70', $coinCategory, $userID) ?></strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>    

    <p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>