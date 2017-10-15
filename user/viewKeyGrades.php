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
<title>My Key Grade Report</title>
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
    <td width="77%"><h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle"> My Key Grade Report</h1></td>
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
     <td width="25%" class="darker"><a href="myCoins.php">Key Report</a></td>
    <td width="25%" class="darker"><a href="viewKeyCoins.php">Key Coins</a></td>
    <td width="25%" class="darker"> <a href="viewKeyGrades.php">Grade Report</a></td>  
    <td width="25%" class="darker"><a href="viewKeyCheck.php">Checklist</a></td>   
  </tr>
</table>
<div class="spacer"></div>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="16%"><strong>Total Graded</strong></td>
    <td width="51%"><?php echo $collection->getKeyGradedCountById($userID); ?> (<?php echo $General->percent($collection->getKeyGradedCountById($userID), $collection->getKeyCollectionCountById($userID)) ?>%)</td>
    <td width="33%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Certified</strong></td>
    <td><?php echo $collection->getKeyCertificationCountById($userID); ?> (<?php echo $General->percent($collection->getKeyCertificationCountById($userID), $collection->getKeyCollectionCountById($userID)) ?>%)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Ungraded</strong></td>
    <td><?php echo $collection->getUngradedKeyCount($userID); ?> (<?php echo $General->percent($collection->getUngradedKeyCount($userID), $collection->getKeyCollectionCountById($userID)) ?>%)</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr>


<table border="0" id="folderTbl" class="typeTbl">
  <tr class="dateHolder" valign="top">
    <td colspan="6"><h3>My Key Type Certified Collection</h3></td>
  </tr>
  <tr class="dateHolder" valign="top"> 
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Half_Cent"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Half Cent', $userID); ?>" width="50" height="50"></a></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Large_Cent"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Large Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Small_Cent"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Small Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Two_Cent"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Two Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
    <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Three_Cent"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Three Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
    <td align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Half_Dime"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Half Dime', $userID); ?>" alt="" width="50" height="50"></a></td>
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
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Nickel"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Nickel', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Dime"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Dime', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Twenty_Cent"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Twenty Cent', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Quarter"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Quarter', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td height="100" align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Half_Dollar"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Half Dollar', $userID); ?>" alt="" width="50" height="50"></a></td>
        <td align="center" valign="middle" class="certBgRow"><a href="categoryGrades.php?coinCategory=Dollar"><img src="../img/<?php echo $collection->getKeyCertCategoryImage('Dollar', $userID); ?>" alt="" width="50" height="50"></a></td>
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
       <td><a href="viewService.php?proService=PCGS"><?php echo $collection->getKeyMasterProGrader('PCGS',$userID); ?></a></td>
       <td><a href="viewService.php?proService=ICG"><?php echo $collection->getKeyMasterProGrader('ICG',$userID); ?></a></td>
       <td><a href="viewService.php?proService=NGC"><?php echo $collection->getKeyMasterProGrader('NGC' ,$userID); ?></a></td>
       <td><a href="viewService.php?proService=ANACS"><?php echo $collection->getKeyMasterProGrader('ANACS', $userID); ?></a></td>
       <td><a href="viewService.php?proService=SEGS"><?php echo $collection->getKeyMasterProGrader('SEGS',$userID); ?></a></td>
      <td><a href="viewService.php?proService=PCI"><?php echo $collection->getKeyMasterProGrader('PCI',$userID); ?></a></td>
       <td><a href="viewService.php?proService=ICCS"><?php echo $collection->getKeyMasterProGrader('ICCS',$userID); ?></a></td>
      <td><a href="viewService.php?proService=HALLMARK"><?php echo $collection->getKeyMasterProGrader('HALLMARK',$userID); ?></a></td>
      <td><a href="viewService.php?proService=NTC"><?php echo $collection->getKeyMasterProGrader('NTC',$userID); ?></a></td>
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
    <td width="20%" align="center"><a href="viewMasterGrade.php?coinGrade=B0"><?php echo $collection->getKeyMasterGrade('B0' ,$userID); ?></a></td>
    <td width="28%" align="center"><a href="viewMasterProGrade.php?coinGrade=B0"><?php echo $collection->getKeyMasterProGrade('B0' ,$userID); ?></td>
    <td width="31%" align="center"><?php echo $collection->getKeyMasterTotalGrade('B0', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PO-1</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=P1"><?php echo $collection->getKeyMasterGrade('P1' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=P1"><?php echo $collection->getKeyMasterProGrade('P1' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('P1', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>FR-2</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=FR2"><?php echo $collection->getKeyMasterGrade('FR2' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=FR2"><?php echo $collection->getKeyMasterProGrade('FR2' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('FR2', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AG-3</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=AG3"><?php echo $collection->getKeyMasterGrade('AG3' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=AG3"><?php echo $collection->getKeyMasterProGrade('AG3' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('AG3', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>G-4</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=G4"><?php echo $collection->getKeyMasterGrade('G4' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=G4"><?php echo $collection->getKeyMasterProGrade('G4' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('G4', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>G-6</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=G6"><?php echo $collection->getKeyMasterGrade('G6' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=G6"><?php echo $collection->getKeyMasterProGrade('G6' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('G6', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VG-8</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VG8"><?php echo $collection->getKeyMasterGrade('VG8' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VG8"><?php echo $collection->getKeyMasterProGrade('VG8' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('VG8', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VG-10</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VG10"><?php echo $collection->getKeyMasterGrade('VG10' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VG10"><?php echo $collection->getKeyMasterProGrade('VG10' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('VG10', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>F-12</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=F12"><?php echo $collection->getKeyMasterGrade('F12' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=F12"><?php echo $collection->getKeyMasterProGrade('F12' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('F12', $userID) ?></td>
  </tr>
    <tr>
    <td><strong>F-15</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=F15"><?php echo $collection->getKeyMasterGrade('F15' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=F15"><?php echo $collection->getKeyMasterProGrade('F15',$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('F15', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-20</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VF20"><?php echo $collection->getKeyMasterGrade('VF20' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VF20"><?php echo $collection->getKeyMasterProGrade('VF20' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('VF20', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-25</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VF25"><?php echo $collection->getKeyMasterGrade('VF25' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VF25"><?php echo $collection->getKeyMasterProGrade('VF25' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('VF25', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-30</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VF30"><?php echo $collection->getKeyMasterGrade('VF30' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VF30"><?php echo $collection->getKeyMasterProGrade('VF30' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('VF30', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>VF-35</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=VF35"><?php echo $collection->getKeyMasterGrade('VF35' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=VF35"><?php echo $collection->getKeyMasterProGrade('VF35' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('VF35', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>EF-40</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=EF40"><?php echo $collection->getKeyMasterGrade('EF40' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=EF40"><?php echo $collection->getKeyMasterProGrade('EF40' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('EF40', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>EF-45</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=EF45"><?php echo $collection->getKeyMasterGrade('EF45' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=EF45"><?php echo $collection->getKeyMasterProGrade('EF45' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('EF45', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-50</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=AU50"><?php echo $collection->getKeyMasterGrade('AU50' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=AU50"><?php echo $collection->getKeyMasterProGrade('AU50' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('AU50', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-55</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=AU55"><?php echo $collection->getKeyMasterGrade('AU55' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=AU55"><?php echo $collection->getKeyMasterProGrade('AU55' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('AU55', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>AU-58</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=AU58"><?php echo $collection->getKeyMasterGrade('AU58' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=AU58"><?php echo $collection->getKeyMasterProGrade('AU58' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('AU58', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-60</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS60"><?php echo $collection->getKeyMasterGrade('MS60' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS60"><?php echo $collection->getKeyMasterProGrade('MS60' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS60', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-61</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS61"><?php echo $collection->getKeyMasterGrade('MS61' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS61"><?php echo $collection->getKeyMasterProGrade('MS61' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS61', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-62</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS62"><?php echo $collection->getKeyMasterGrade('MS62' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS62"><?php echo $collection->getKeyMasterProGrade('MS62' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS62', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-63</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS63"><?php echo $collection->getKeyMasterGrade('MS63' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS63"><?php echo $collection->getKeyMasterProGrade('MS63' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS63', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-64</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS64"><?php echo $collection->getKeyMasterGrade('MS64' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS64"><?php echo $collection->getKeyMasterProGrade('MS64' ,$userID); ?></td>
     <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS64', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-65</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS65"><?php echo $collection->getKeyMasterGrade('MS65' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS65"><?php echo $collection->getKeyMasterProGrade('MS65' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS65', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-66</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS66"><?php echo $collection->getKeyMasterGrade('MS66' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS66"><?php echo $collection->getKeyMasterProGrade('MS66' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS66', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-67</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS67"><?php echo $collection->getKeyMasterGrade('MS67' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS67"><?php echo $collection->getKeyMasterProGrade('MS67' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS67', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-68</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS68"><?php echo $collection->getKeyMasterGrade('MS68' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS68"><?php echo $collection->getKeyMasterProGrade('MS68',$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS68', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-69</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS69"><?php echo $collection->getKeyMasterGrade('MS69' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS69"><?php echo $collection->getKeyMasterProGrade('MS69' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS69', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>MS-70</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=MS70"><?php echo $collection->getKeyMasterGrade('MS70' ,$userID); ?></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=MS70"><?php echo $collection->getKeyMasterProGrade('MS70' ,$userID); ?></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('MS70', $userID) ?></td>
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
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR35&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR35', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR35&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR35' ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR35', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-40</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR40&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR40' ,$userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR40&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR40', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR40', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-45</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR45&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR45', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR45&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR45', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR45', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-50</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR50&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR50', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR50&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR50', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR50', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-55</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR55&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR55', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR55&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR55', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR55', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-58</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR58&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR58', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR58&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR58', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR58', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-60</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR60&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR60', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR60&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR60', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR60', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-61</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR61&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR61', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR61&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR61', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR61', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-62</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR62&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR62', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR62&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR62', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR62', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-63</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR63&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR63', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR63&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR63', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR63', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-64</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR64&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR64', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR64&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR64', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR64', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-65</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR65&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR65', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR65&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR65', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR65', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-66</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR66&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR66', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR66&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR66', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR66', $userID) ?></td>
  </tr>
    <tr>
    <td><strong>PR-67</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR67&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR67', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR67&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR67', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR67', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-68</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR68&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR68', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR68&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR68', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR68', $userID) ?></td>
  </tr>
  <tr>
    <td><strong>PR-69</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR69&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR69', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR69&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR69', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR69', $userID) ?></td>
  </tr>
    <tr>
    <td><strong>PR-70</strong></td>
    <td align="center"><a href="viewMasterGrade.php?coinGrade=PR70&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterGrade('PR70', $userID); ?></a></td>
    <td align="center"><a href="viewMasterProGrade.php?coinGrade=PR70&coinCategory=Small_Cent"><?php echo $collection->getKeyMasterProGrade('PR70', $userID); ?></a></td>
    <td align="center"><?php echo $collection->getKeyMasterTotalGrade('PR70', $userID) ?></td>
  </tr>
</table>
<p><br>
<a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>