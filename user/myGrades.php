<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coin Grade Report</title>
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
    <td width="77%"><h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle">   Coin Grades</h1></td>
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
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td>
  </tr>
</table> 
<div class="spacer"></div>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="16%"><strong>Total Graded</strong></td>
    <td width="51%"><?php echo $collection->getGradedCountById($userID); ?> (<?php echo $General->percent($collection->getGradedCountById($userID), $collection->getCollectionCountById($userID)) ?>%)</td>
    <td width="33%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Certified</strong></td>
    <td><?php echo $collection->getCertificationCountById($userID); ?> (<?php echo $General->percent($collection->getCertificationCountById($userID), $collection->getCollectionCountById($userID)) ?>%)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Ungraded</strong></td>
    <td><?php echo $collection->getUngradedCount($userID); ?> (<?php echo $General->percent($collection->getUngradedCount($userID), $collection->getCollectionCountById($userID)) ?>%)</td>
    <td>&nbsp;</td>
  </tr>  
</table>
<hr>


<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>My Certified Collection</h3></td>
  </tr>
  <tr class="dateHolder" valign="top"> 
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Half_Cent"><img src="../img/<?php echo $Report->getCertCategoryImage('Half Cent', $userID); ?>" width="50" height="50"></a></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Large_Cent"><img src="../img/<?php echo $Report->getCertCategoryImage('Large Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Small_Cent"><img src="../img/<?php echo $Report->getCertCategoryImage('Small Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Two_Cent"><img src="../img/<?php echo $Report->getCertCategoryImage('Two Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Three_Cent"><img src="../img/<?php echo $Report->getCertCategoryImage('Three Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
    <td align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Half_Dime"><img src="../img/<?php echo $Report->getCertCategoryImage('Half Dime', $userID); ?>" alt="" width="50" height="50"></a></td>
  </tr>
  <tr class="dateHolder" valign="top">
    <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Half_Cent">Half Cent</a></td>
    <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Large_Cent">Large Cent</a></td>
    <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Small_Cent">Small Cent</a></td>
    <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Two_Cent">Two Cent</a></td>
    <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Three_Cent">Three Cent</a></td>
    <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Half_Dime">Half Dime</a></td>
  </tr>
      <tr class="dateHolder" valign="top">
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Nickel"><img src="../img/<?php echo $Report->getCertCategoryImage('Nickel', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Dime"><img src="../img/<?php echo $Report->getCertCategoryImage('Dime', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Twenty_Cent"><img src="../img/<?php echo $Report->getCertCategoryImage('Twenty Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Quarter"><img src="../img/<?php echo $Report->getCertCategoryImage('Quarter', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Half_Dollar"><img src="../img/<?php echo $Report->getCertCategoryImage('Half Dollar', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Dollar"><img src="../img/<?php echo $Report->getCertCategoryImage('Dollar', $userID); ?>" alt="" width="50" height="50"></a></td>
      </tr>
    <tr class="dateHolder" valign="top">
        <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Nickel">Nickel</a></td>
        <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Dime">Dime </a></td>
        <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Twenty_Cent">Twenty Cent</a></td>
        <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Quarter">Quarter</a></td>
        <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Half_Dollar">Half Dollar</a></td>
        <td align="center" valign="middle"><a href="categoryGrades.php?coinCategory=Dollar">Dollar</a></td>
    </tr>
 </table>
<hr>
<table width="100%" border="0" cellpadding="2">
     <tr align="center">
       <td colspan="2" align="left"><h3>Grading Services</h3></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr align="center">
       <td width="11%"><a href="viewService.php?proService=PCGS"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewService.php?proService=ICG"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewService.php?proService=NGC"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewService.php?proService=ANACS"><strong>ANACS</strong></a></td>
       <td width="11%"><a href="viewService.php?proService=SEGS"><strong>SEGS</strong></a></td>
       <td width="11%"><a href="viewService.php?proService=PCI"><strong>PCI</strong></a></td>
       <td width="11%"><a href="viewService.php?proService=ICCS"><strong>ICCS</strong></a></td>
       <td width="11%"><a href="viewService.php?proService=HALLMARK"><strong>HALLMARK</strong></a></td>
       <td width="11%"><a href="viewService.php?proService=NTC"><strong>NTC</strong></a></td>
     </tr>
     <tr align="center">
       <td><a href="viewService.php?proService=PCGS"><?php echo $collection->getMasterProGrader('PCGS',$userID); ?></a></td>
       <td><a href="viewService.php?proService=ICG"><?php echo $collection->getMasterProGrader('ICG',$userID); ?></a></td>
       <td><a href="viewService.php?proService=NGC"><?php echo $collection->getMasterProGrader('NGC' ,$userID); ?></a></td>
       <td><a href="viewService.php?proService=ANACS"><?php echo $collection->getMasterProGrader('ANACS', $userID); ?></a></td>
       <td><a href="viewService.php?proService=SEGS"><?php echo $collection->getMasterProGrader('SEGS',$userID); ?></a></td>
      <td><a href="viewService.php?proService=PCI"><?php echo $collection->getMasterProGrader('PCI',$userID); ?></a></td>
       <td><a href="viewService.php?proService=ICCS"><?php echo $collection->getMasterProGrader('ICCS',$userID); ?></a></td>
      <td><a href="viewService.php?proService=HALLMARK"><?php echo $collection->getMasterProGrader('HALLMARK',$userID); ?></a></td>
      <td><a href="viewService.php?proService=NTC"><?php echo $collection->getMasterProGrader('NTC',$userID); ?></a></td>
     </tr>
  </table>

  <hr />  
    <table width="100%" border="0" cellpadding="2">
     <tr align="center">
       <td colspan="2" align="left"><h3>Non Grades</h3></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr align="center">
       <td width="11%"><a href="myDesingnations.php?designation=Genuine"><strong>Genuine</strong></a></td>
       <td width="11%"><a href="myDesingnations.php?designation=Sample"><strong>Sample</strong></a></td>
       <td width="11%"><a href="myDesingnations.php?designation=Authentic"><strong>Authentic</strong></a></td>
       <td width="11%">&nbsp;</td>
       <td width="11%">&nbsp;</td>
       <td width="11%">&nbsp;</td>
       <td width="11%">&nbsp;</td>
       <td width="11%">&nbsp;</td>
       <td width="11%">&nbsp;</td>
     </tr>
     <tr align="center">
       <td><a href="myDesingnations.php?designation=Genuine"><?php echo $collection->getGenuineGradeCount($userID, 'Genuine'); ?></a></td>
       <td><a href="myDesingnations.php?designation=Sample"><?php echo $collection->getGenuineGradeCount($userID, 'Sample'); ?></a></td>
       <td><a href="myDesingnations.php?designation=Authentic"><?php echo $collection->getGenuineGradeCount($userID, 'Authentic'); ?></a></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
     </tr>
   </table>
   <br class="clear"> 
  <table width="100%" border="1" class="reportTbl" cellpadding="3">
    <tr class="darker">
      <td>Grade</td>
      <td align="center">Grade</td>
      <td align="center">Third Party Grade</td>
      <td align="center">Total</td>
    </tr>
    <tr class="SemiKeyRow">
      <td colspan="4"><strong>Business Strikes</strong></td>
    </tr>
    <tr>
    <td width="21%"><strong>Basal 0</strong></td>
    <td width="20%" align="center"><a href="viewMasterGrade.php?coinGrade=B0"><?php echo $collection->getMasterGrade('B0' ,$userID); ?></a></td>
    <td width="28%" align="center"><a href="viewMasterProGrade.php?coinGrade=B0"><?php echo $collection->getMasterProGrade('B0' ,$userID); ?></a></td>
    <td width="31%" align="center"><?php echo $collection->getMasterTotalGrade('B0', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PO-1</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=P1"><?php echo $collection->getMasterGrade('P1' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=P1"><?php echo $collection->getMasterProGrade('P1' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('P1', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>FR-2</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=FR2"><?php echo $collection->getMasterGrade('FR2' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=FR2"><?php echo $collection->getMasterProGrade('FR2' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('FR2', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AG-3</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=AG3"><?php echo $collection->getMasterGrade('AG3' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=AG3"><?php echo $collection->getMasterProGrade('AG3' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('AG3', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>G-4</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=G4"><?php echo $collection->getMasterGrade('G4' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=G4"><?php echo $collection->getMasterProGrade('G4' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('G4', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>G-6</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=G6"><?php echo $collection->getMasterGrade('G6' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=G6"><?php echo $collection->getMasterProGrade('G6' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('G6', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VG-8</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VG8"><?php echo $collection->getMasterGrade('VG8' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VG8"><?php echo $collection->getMasterProGrade('VG8' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('VG8', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VG-10</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VG10"><?php echo $collection->getMasterGrade('VG10' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VG10"><?php echo $collection->getMasterProGrade('VG10' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('VG10', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>F-12</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=F12"><?php echo $collection->getMasterGrade('F12' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=F12"><?php echo $collection->getMasterProGrade('F12' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('F12', $userID) ?></td>
  </tr>
    <tr>
    <td><strong>F-15</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=F15"><?php echo $collection->getMasterGrade('F15' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=F15"><?php echo $collection->getMasterProGrade('F15',$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('F15', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-20</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VF20"><?php echo $collection->getMasterGrade('VF20' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VF20"><?php echo $collection->getMasterProGrade('VF20' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('VF20', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-25</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VF25"><?php echo $collection->getMasterGrade('VF25' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VF25"><?php echo $collection->getMasterProGrade('VF25' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('VF25', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-30</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VF30"><?php echo $collection->getMasterGrade('VF30' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VF30"><?php echo $collection->getMasterProGrade('VF30' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('VF30', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-35</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VF35"><?php echo $collection->getMasterGrade('VF35' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VF35"><?php echo $collection->getMasterProGrade('VF35' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('VF35', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>EF-40</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=EF40"><?php echo $collection->getMasterGrade('EF40' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=EF40"><?php echo $collection->getMasterProGrade('EF40' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('EF40', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>EF-45</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=EF45"><?php echo $collection->getMasterGrade('EF45' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=EF45"><?php echo $collection->getMasterProGrade('EF45' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('EF45', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-50</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=AU50"><?php echo $collection->getMasterGrade('AU50' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=AU50"><?php echo $collection->getMasterProGrade('AU50' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('AU50', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-55</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=AU55"><?php echo $collection->getMasterGrade('AU55' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=AU55"><?php echo $collection->getMasterProGrade('AU55' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('AU55', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-58</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=AU58"><?php echo $collection->getMasterGrade('AU58' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=AU58"><?php echo $collection->getMasterProGrade('AU58' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('AU58', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-60</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS60"><?php echo $collection->getMasterGrade('MS60' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS60"><?php echo $collection->getMasterProGrade('MS60' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS60', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-61</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS61"><?php echo $collection->getMasterGrade('MS61' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS61"><?php echo $collection->getMasterProGrade('MS61' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS61', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-62</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS62"><?php echo $collection->getMasterGrade('MS62' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS62"><?php echo $collection->getMasterProGrade('MS62' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS62', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-63</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS63"><?php echo $collection->getMasterGrade('MS63' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS63"><?php echo $collection->getMasterProGrade('MS63' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS63', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-64</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS64"><?php echo $collection->getMasterGrade('MS64' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS64"><?php echo $collection->getMasterProGrade('MS64' ,$userID); ?></a></td>
     <td align="center"><?php echo $collection->getMasterTotalGrade('MS64', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-65</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS65"><?php echo $collection->getMasterGrade('MS65' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS65"><?php echo $collection->getMasterProGrade('MS65' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS65', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-66</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS66"><?php echo $collection->getMasterGrade('MS66' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS66"><?php echo $collection->getMasterProGrade('MS66' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS66', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-67</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS67"><?php echo $collection->getMasterGrade('MS67' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS67"><?php echo $collection->getMasterProGrade('MS67' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS67', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-68</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS68"><?php echo $collection->getMasterGrade('MS68' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS68"><?php echo $collection->getMasterProGrade('MS68',$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS68', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-69</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS69"><?php echo $collection->getMasterGrade('MS69' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS69"><?php echo $collection->getMasterProGrade('MS69' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS69', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-70</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS70"><?php echo $collection->getMasterGrade('MS70' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS70"><?php echo $collection->getMasterProGrade('MS70' ,$userID); ?> </a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('MS70', $userID) ?></td>
  </tr>
 </table>
 
  <table width="100%" border="1" class="reportTbl" cellpadding="3">
  <tr>
    <td width="21%">&nbsp;</td>
    <td width="20%" align="center">&nbsp;</td>
    <td width="28%" align="center">&nbsp;</td>
    <td width="31%" align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td colspan="4"><strong>Proofs (<a href="proof.php" class="brownLink">Proof Report</a>)</strong></td>
    </tr>
    <tr>
    <td><strong>PR-35</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR35&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR35', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR35&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR35' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR35', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-40</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR40&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR40' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR40&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR40', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR40', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-45</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR45&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR45', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR45&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR45', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR45', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-50</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR50&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR50', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR50&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR50', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR50', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-55</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR55&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR55', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR55&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR55', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR55', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-58</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR58&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR58', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR58&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR58', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR58', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-60</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR60&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR60', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR60&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR60', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR60', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-61</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR61&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR61', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR61&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR61', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR61', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-62</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR62&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR62', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR62&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR62', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR62', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-63</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR63&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR63', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR63&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR63', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR63', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-64</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR64&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR64', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR64&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR64', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR64', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-65</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR65&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR65', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR65&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR65', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR65', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-66</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR66&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR66', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR66&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR66', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR66', $userID) ?></td>
  </tr>
    <tr>
    <td><strong>PR-67</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR67&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR67', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR67&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR67', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR67', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-68</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR68&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR68', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR68&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR68', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR68', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-69</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR69&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR69', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR69&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR69', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR69', $userID) ?></td>
  </tr>
    <tr>
    <td><strong>PR-70</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR70&coinCategory=Small_Cent"><?php echo $collection->getMasterGrade('PR70', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR70&coinCategory=Small_Cent"><?php echo $collection->getMasterProGrade('PR70', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getMasterTotalGrade('PR70', $userID) ?></td>
  </tr>
</table>
<p><br>
<a class="topLink" href="#top">Top</a></p>


</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>