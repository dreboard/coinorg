<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinCategory = 'Dime';
$categoryLink = str_replace(' ', '_', $coinCategory); 
$smallCentRollCount = '50';
$smallCentRollVal = '.50';
$smallCentlVal = '.01';


//Small Cent Type Collection
$allTypes = getSubCatCount('Dime');
$typeCollected = getSubVarietyCountCollected($userID, 'Dime');
$completeTypeProgress = percent($typeCollected, $allTypes);



?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Cent Report</title>
<script type="text/javascript">
$(document).ready(function(){

$(".priceListTbl input .collectCount, .priceListTbl input #rollsValTotal").each(function(){
  $(this).val(parseFloat($(this).val()).toFixed(2));
});


$("#viewGraphBtn").click(function() {
   window.location = 'reportNickelGraph.php';
});

/*var total = 0;
$(".smallCentCollectCount").each(function() {
	if (!isNaN(this.value) && this.value.length != 0) {
		total += parseFloat(this.value);
	}
});
$("#smallCentCollectTotals").val(total);
*/

var rollFaceVal = $("#rollsCollectTotal").val() * 0.5;
$("#rollFaceVal").val("$"+rollFaceVal);

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
    <td width="77%"><h1><img src="../img/Mixed_Cents.jpg" width="100" height="100" align="middle">My Half Cent Grade Report</h1></td>
    <td width="23%" align="center" valign="top">
    <select id="gradeSelects" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
    <option value="">Switch Denomination</option>
    <option value="SmallCentGrades.php">Small Cent Grades</option>
    <option value="NickelGrades.php">Nickel Grades</option>
    <option value="HalfDimeGrades.php">Half Dime Grades</option>
    <option value="DimeGrades.php">Dime Grades</option>
    <option value="QuarterGrades.php">Quarter Grades</option>
    <option value="HalfDollarGrades.php">Half Dollar Grades</option>
    <option value="DollarGrades.php">Dollar Cent Grades</option>
    <option value="HalfCentGrades.php">Half Cent Grades</option>
    <option value="LargeCentGrades.php">Large Cent Grades</option>
    <option value="TwoCentGrades.php">Two Cent Grades</option>
    <option value="ThreeCentGrades.php">Three Cent Grades</option>
    <option value="TwentyCentGrades.php">Twenty Cent Grades</option>
    <option value="SmallCentGrades.php">Cent Grades</option>    
</select>
    </td>
  </tr>
</table>

<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="14%" class="darker"><a href="Small_Cent.php">Coins</a></td>
    <td width="13%" class="darker"><a href="SmallCentRolls.php">Rolls</a></td>
    <td width="14%" class="darker"><a href="SmallCentFolders.php">Folders</a></td>    
    <td width="20%" class="darker"> <a href="SmallCentGrades.php">Grade Report</a></td>
    <td width="14%" class="darker"><a href="SmallCentError.php">Errors</a></td>
    <td width="12%" class="darker"> <a href="SmallCentBags.php">Bags</a></td>
    <td width="13%" class="darker"><a href="SmallCentBoxes.php">Boxes</a></td>    
  </tr>
</table> 


 
 <table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>Small Cent Type Certified Collection <?php echo $typeCollected ?> of <?php echo getSubCatCount('Small Cent') ?> (<?php echo $completeTypeProgress; ?>%)</h3></td>
    </tr>
  <tr class="dateHolder" valign="top"> 
  <td><a href="viewListReport.php?coinType=Flying_Eagle&page=1">
  <img class="coinSwitch" src="../img/<?php echo $collection->getCertReportImage('Flying Eagle', $userID); ?>" alt="" width="auto" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Flying_Eagle&page=1">Flying Eagle</a> 
</td>
  <td><a href="viewListReport.php?coinType=Indian_Head&page=1">  <img class="coinSwitch" src="../img/<?php echo $collection->getCertReportImage('Indian Head', $userID); ?>" alt="" width="auto" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Indian_Head&page=1">Indian Head</a> </td>
  
<td><a href="viewListReport.php?coinType=Lincoln_Wheat&page=1"><img class="coinSwitch" src="../img/<?php echo $collection->getCertReportImage('Lincoln Wheat', $userID); ?>" alt="" width="auto" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Lincoln_Wheat&page=1">Lincoln Wheat</a> </td>
  
<td> <a href="viewListReport.php?coinType=Lincoln_Memorial&page=1"><img class="coinSwitch" src="../img/<?php echo $collection->getCertReportImage('Lincoln Memorial', $userID); ?>" alt="" width="auto" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Lincoln_Memorial&page=1">Lincoln Memorial</a> </td>
  
<td><a href="viewListReport.php?coinType=Lincoln_Bicentennial&page=1"><img class="coinSwitch" src="../img/<?php echo $collection->getCertReportImage('Lincoln Bicentennial', $userID); ?>" alt="" width="auto" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial</a> </td>
  
<td><a href="viewListReport.php?coinType=Union_Shield&page=1"><img class="coinSwitch" src="../img/<?php echo $collection->getCertReportImage('Union Shield', $userID); ?>" alt="" width="auto" height="100" /></a><br />
  <a href="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</a> </td>
  </tr>
 </table>
  <div class="spacer"></div>
  <div class="roundedWhite">
    
    <table width="100%" border="0">
     <tr align="center">
       <td colspan="2" align="left"><h3><strong>Grading Services</strong></h3></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr align="center">
       <td width="11%"><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ICG&coinCategory=<?php echo $categoryLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=NGC&coinCategory=<?php echo $categoryLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ANACS&coinCategory=<?php echo $categoryLink; ?>"><strong>ANACS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=SEGS&coinCategory=<?php echo $categoryLink; ?>"><strong>SEGS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=PCI&coinCategory=<?php echo $categoryLink; ?>"><strong>PCI</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=ICCS&coinCategory=<?php echo $categoryLink; ?>"><strong>ICCS</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=HALLMARK&coinCategory=<?php echo $categoryLink; ?>"><strong>HALLMARK</strong></a></td>
       <td width="11%"><a href="viewCategoryService.php?proService=NTC&coinCategory=<?php echo $categoryLink; ?>"><strong>NTC</strong></a></td>
     </tr>
     <tr align="center">
       <td><a href="viewCategoryService.php?proService=PCGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('PCGS', 'Small Cent' ,$userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=ICG&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('ICG', 'Small Cent' ,$userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=NGC&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('NGC', 'Small Cent' ,$userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=ANACS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('ANACS', 'Small Cent' ,$userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=SEGS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('SEGS', 'Small Cent',$userID); ?></a></td>
      <td><a href="viewCategoryService.php?proService=PCI&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('PCI', 'Small Cent',$userID); ?></a></td>
       <td><a href="viewCategoryService.php?proService=ICCS&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('ICCS','Small Cent' ,$userID); ?></a></td>
      <td><a href="viewCategoryService.php?proService=HALLMARK&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('HALLMARK', 'Small Cent' ,$userID); ?></a></td>
      <td><a href="viewCategoryService.php?proService=NTC&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getProGrader('NTC','Small Cent' ,$userID); ?></a></td>
     </tr>
   </table>
   <br class="clear"> 
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
    <td width="20%" align="center"><a href="viewGrade.php?coinGrade=B0&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('B0', $coinCategory ,$userID); ?></a></td>
    <td width="28%" align="center"><a href="viewProGrade.php?coinGrade=B0&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('B0', $coinCategory ,$userID); ?></td>
    <td width="31%" align="center"><?php echo $collection->getTotalGrade('B0', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PO-1</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=P1&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('P1', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=P1&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('P1', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('P1', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>FR-2</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=FR2&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('FR2', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=FR2&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('FR2', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('FR2', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AG-3</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=AG3&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('AG3', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AG3&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('AG3', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('AG3', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>G-4</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=G4&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('G4', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=G4&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('G4', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('G4', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>G-6</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=G6&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('G6', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=G6&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('G6', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('G6', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VG-8</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=VG8&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('VG8', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VG8&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('VG8', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VG8', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VG-10</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=VG10&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('VG10', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VG10&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('VG10', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VG10', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>F-12</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=F12&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('F12', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=F12&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('F12', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('F12', $coinCategory, $userID) ?></td>
  </tr>
    <tr>
    <td><strong>F-15</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=F15&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('F15', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=F15&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('F15', $coinCategory,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('F15', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-20</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=VF20&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('VF20', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF20&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('VF20', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VF20', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-25</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=VF25&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('VF25', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF25&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('VF25', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VF25', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-30</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=VF30&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('VF30', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF30&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('VF30', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VF30', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-35</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=VF35&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('VF35', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=VF35&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('VF35', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('VF35', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>EF-40</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=EF40&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('EF40', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=EF40&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('EF40', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('EF40', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>EF-45</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=EF45&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('EF45', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=EF45&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('EF45', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('EF45', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-50</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=AU50&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('AU50', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU50&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('AU50', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('AU50', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-55</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=AU55&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('AU55', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU55&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('AU55', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('AU55', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-58</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=AU58&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('AU58', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=AU58&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('AU58', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('AU58', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-60</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS60&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS60', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS60&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS60', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS60', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-61</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS61&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS61', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS61&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS61', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS61', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-62</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS62&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS62', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS62&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS62', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS62', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-63</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS63&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS63', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS63&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS63', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS63', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-64</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS64&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS64', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS64&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS64', $coinCategory ,$userID); ?></td>
     <td align="center"><?php echo $collection->getTotalGrade('MS64', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-65</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS65&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS65', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS65&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS65', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS65', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-66</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS66&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS66', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS66&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS66', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS66', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-67</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS67&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS67', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS67&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS67', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS67', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-68</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS68&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS68', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS68&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS68', $coinCategory,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS68', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-69</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS69&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS69', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS69&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS69', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS69', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-70</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=MS70&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryGrade('MS70', $coinCategory ,$userID); ?></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=MS70&coinCategory=<?php echo $categoryLink; ?>"><?php echo $collection->getCategoryProGrade('MS70', $coinCategory ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTotalGrade('MS70', $coinCategory, $userID) ?></td>
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
    <td align="center"><a href="viewGrade.php?coinGrade=PR35&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR35', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR35&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR35', $coinCategory ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR35', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-40</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR40&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR40', $coinCategory ,$userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR40&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR40', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR40', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-45</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR45&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR45', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR45&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR45', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR45', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-50</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR50&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR50', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR50&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR50', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR50', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-55</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR55&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR55', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR55&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR55', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR55', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-58</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR58&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR58', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR58&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR58', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR58', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-60</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR60&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR60', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR60&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR60', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR60', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-61</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR61&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR61', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR61&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR61', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR61', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-62</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR62&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR62', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR62&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR62', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR62', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-63</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR63&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR63', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR63&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR63', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR63', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-64</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR64&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR64', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR64&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR64', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR64', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-65</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR65&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR65', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR65&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR65', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR65', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-66</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR66&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR66', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR66&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR66', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR66', $coinCategory, $userID) ?></td>
  </tr>
    <tr>
    <td><strong>PR-67</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR67&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR67', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR67&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR67', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR67', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-68</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR68&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR68', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR68&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR68', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR68', $coinCategory, $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-69</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR69&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR69', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR69&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR69', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR69', $coinCategory, $userID) ?></td>
  </tr>
    <tr>
    <td><strong>PR-70</strong></td>
    <td align="center"><a href="viewGrade.php?coinGrade=PR70&coinCategory=Small_Cent"><?php echo $collection->getCategoryGrade('PR70', $coinCategory, $userID); ?></a></td>
    <td align="center"><a href="viewProGrade.php?coinGrade=PR70&coinCategory=Small_Cent"><?php echo $collection->getCategoryProGrade('PR70', $coinCategory, $userID); ?></a></td>
    <td align="center"><?php echo $collection->getTotalGrade('PR70', $coinCategory, $userID) ?></td>
  </tr>
</table>
<p><input class="viewListBtns masterBtn" name="printSmallBtn" type="button" value="Print Small Cent Report"/ >&nbsp; | &nbsp;<input class="viewListBtns masterBtn" name="masterBtn" type="button" value="View Master Report"/ > or <select onChange="window.open(this.options[this.selectedIndex].value,'_top')">
<option selected="selected" value="">Quick Menu</option>
<optgroup label="Half Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Half_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Half_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Half_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Half_Cent&page=1">Braided Hair</option>
</optgroup>
<optgroup label="Large Cents">
<option value="reportCent.php">All Cents</option>
<option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent&page=1">Flowing Hair</option>
<option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent&page=1">Liberty Cap</option>
<option value="viewListReport.php?coinType=Draped_Bust_Large_Cent&page=1">Draped Bust</option>
<option value="viewListReport.php?coinType=Classic_Head_Large_Cent&page=1">Classic Head</option>
<option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent&page=1">Coronet Liberty Head</option>
<option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent&page=1">Braided Hair Liberty Head</option>
</optgroup>
<optgroup label="Cents">
<option value="reportCent.php">All Cents</option>
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
<option value="reportHalf.php">All Half Dollars</option>
<option value="viewListReport.php?coinType=Shield_Nickel&page=1">Flowing Hair Large Cent</option>
<option value="viewListReport.php?coinType=Indian_Head&page=1">Indian Head</option>
<option value="viewListReport.php?coinType=Lincoln_Wheat&page=1">Draped Bust Large Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Memorial&page=1">Classic Head Large Cent</option>
<option value="viewListReport.php?coinType=Lincoln_Bicentennial&page=1">Lincoln Bicentennial Series</option>
<option value="viewListReport.php?coinType=Union_Shield&page=1">Union Shield</option>
</optgroup>
<optgroup label="Dimes">
<option value="viewListReport.php?coinType=reportHalf.php">All Half Dollars</option>
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
<option value="reportHalf.php">All Half Dollars</option>
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
<option value="reportHalf.php">All Half Dollars</option>
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
</select> 
  <a href="Small_Cent.php">View Cent Collection </a><br>
<a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>