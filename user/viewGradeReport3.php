<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
$coinTypeLink = str_replace(' ', '_', $_GET["coinType"]);
$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'");
while($row = mysql_fetch_array($pageQuery))
  {
	  $pageCategory = $row['pageCategory'];
	  $buttonTxt = str_replace('_', ' ', $pageCategory); 
	  $typeCount = intval($row['typeCount']);
	  $completeSet = intval($row['completeSet']);
	  $pageCategory = str_replace(' ', '_', $pageCategory);
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
<h2><a class="brownLink" href="viewListReport.php?coinType=<?php echo $coinCatLink ?>"><?php echo $coinType ?></a> Grade Report </h2>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="42%" rowspan="9" valign="top"><img id="obvRev" src="../img/<?php echo $coinCatLink ?>_both.jpg" alt="Obverse and reverse" title="<?php echo $coinType ?>" /></td>
    <td>Type</td>
    <td><a href="<?php echo str_replace(' ', '_', $coin->getCategoryByType($coinType)); ?>.php"><?php echo $coin->getCategoryByType($coinType) ?></a></td>
  </tr>
  <tr>
    <td>Total Graded</td>
    <td><?php echo $collection->getGradeTypeCount($coinType, $userID); ?></td>
  </tr>
  <tr>
    <td width="31%">Total Ungraded</td>
    <td width="27%"><a href="viewNoGradeType.php?coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getNoGradeTypeCount($coinType, $userID); ?></a></td>
  </tr>
  <tr>
    <td>Total Certified</td>
    <td><?php echo $collection->getGradeProTypeCount($coinType, $userID); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>

  <?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  <div>
</div>

<hr />
<table width="100%" border="0" id="proTbl">
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
       <td width="11%"><a href="viewTypeService.php?proService=PCGS&coinType=<?php echo $coinTypeLink; ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICG&coinType=<?php echo $coinTypeLink; ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NGC&coinType=<?php echo $coinTypeLink; ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ANACS&coinType=<?php echo $coinTypeLink; ?>"><strong>ANACS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=SEGS&coinType=<?php echo $coinTypeLink; ?>"><strong>SEGS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=PCI&coinType=<?php echo $coinTypeLink; ?>"><strong>PCI</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICCS&coinType=<?php echo $coinTypeLink; ?>"><strong>ICCS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=HALLMARK&coinType=<?php echo $coinTypeLink; ?>"><strong>HALLMARK</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NTC&coinType=<?php echo $coinTypeLink; ?>"><strong>NTC</strong></a></td>
     </tr>
     <tr align="center">
       <td><a href="viewTypeService.php?proService=PCGS&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('PCGS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICG&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ICG', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=NGC&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('NGC', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ANACS&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ANACS', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=SEGS&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('SEGS', $coinType,$userID); ?></a></td>
      <td><a href="viewTypeService.php?proService=PCI&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('PCI', $coinType,$userID); ?></a></td>
       <td><a href="viewTypeService.php?proService=ICCS&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('ICCS',$coinType,$userID); ?></a></td>
      <td><a href="viewTypeService.php?proService=HALLMARK&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('HALLMARK', $coinType,$userID); ?></a></td>
      <td><a href="viewTypeService.php?proService=NTC&coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeProGrader('NTC',$coinType,$userID); ?></a></td>
     </tr>
   </table>
   <br />

   <hr />

<h3>Business Strikes <?php echo $collection->getStrikeCountByType($coinType, $userID, $strike='Business') ?></h3>
<p><strong>Highest Grade: </strong><?php echo $collection->getBusinessHighGradeNumberByType($coinType, $userID, $strike='Business') ?><br />
  <strong>Total Raw:</strong> <?php echo $collection->getTotalTypeNoProGradeByStrike($strike='Business', $coinType, $userID); ?><br />
  <strong>Total Certified:</strong> <?php echo $collection->getTotalTypeProGradeByStrike($strike='Business', $coinType, $userID); ?></p>
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
    <td align="center"><a href="viewGradeType.php?coinGrade=B0&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeGrade('B0', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=P1&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeGrade('P1', $coinType ,$userID); ?></a></td>
    <td align="center"><?php echo $collection->getTypeGrade('FR2', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('AG3', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('G4', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('G6', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('VG8', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('VG10', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('F12', $coinType ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getTypeGrade('F15', $coinType ,$userID); ?></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><?php echo $collection->getProGrade('B0', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('P1', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('FR2', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('AG3', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('G4', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('G6', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VG8', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VG10', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('F12', $coinType ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getProGrade('F15', $coinType,$userID); ?></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('B0', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('P1', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('FR2', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('AG3', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('G4', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('G6', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('VG8', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('VG10', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('F12', $coinType, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalTypeGrade('F15', $coinType, $userID) ?></strong></td>
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
    <td width="10%" align="center"><strong>AU-55</strong></td>
    <td width="9%" align="center"><strong>AU-58</strong></td>
    <td width="9%" align="center"><strong>MS-60</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><?php echo $collection->getTypeGrade('VF20', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('VF25', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('VF30', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('VF35', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('EF40', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('EF45', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('AU50', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('AU55', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('AU58', $coinType ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getTypeGrade('MS60', $coinType ,$userID); ?></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><?php echo $collection->getProGrade('VF20', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VF25', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VF30', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('VF35', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('EF40', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('EF45', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('AU50', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('AU55', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('AU58', $coinType ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getProGrade('MS60', $coinType ,$userID); ?></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('VF20', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('VF25', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('VF30', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('VF35', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('EF40', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('EF45', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('AU50', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('AU55', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('AU58', $coinType, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalTypeGrade('MS60', $coinType, $userID) ?></strong></td>
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
    <td align="center"><strong>MS-61</strong></td>
    <td align="center"><strong>MS-62</strong></td>
    <td align="center"><strong>MS-63</strong></td>
    <td align="center"><strong>MS-64</strong></td>
    <td align="center"><strong>MS-65</strong></td>
    <td align="center"><strong>MS-66</strong></td>
    <td align="center"><strong>MS-67</strong></td>
    <td align="center"><strong>MS-68</strong></td>
    <td align="center"><strong>MS-69</strong></td>
    <td width="9%" align="center"><strong>MS-70</strong></td>
  </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td align="center"><?php echo $collection->getTypeGrade('MS61', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('MS62', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('MS63', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('MS64', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('MS65', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('MS66', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('MS67', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('MS68', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getTypeGrade('MS69', $coinType ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getTypeGrade('MS70', $coinType ,$userID); ?></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><?php echo $collection->getProGrade('MS61', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS62', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS63', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS64', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS65', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS66', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS67', $coinType ,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS68', $coinType,$userID); ?></td>
    <td align="center"><?php echo $collection->getProGrade('MS69', $coinType ,$userID); ?></td>
    <td width="9%" align="center"><?php echo $collection->getProGrade('MS70', $coinType ,$userID); ?></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS61', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS62', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS63', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS64', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS65', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS66', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS67', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS68', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS69', $coinType, $userID) ?></strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalTypeGrade('MS70', $coinType, $userID) ?></strong></td>
  </tr>
</table>
<hr />

<h3>Proofs <?php echo $collection->getStrikeCountByType($coinType, $userID, $strike='Proof') ?></h3>
<p><strong>Highest Grade:</strong> <?php echo $collection->getBusinessHighGradeNumberByType($coinType, $userID, $strike='Proof') ?><br />
<strong>Total Raw:</strong> <?php echo $collection->getTotalTypeNoProGradeByStrike($strike='Proof', $coinType, $userID); ?><br />
<strong>Total Certified:</strong> <?php echo $collection->getTotalTypeProGradeByStrike($strike='Proof', $coinType, $userID); ?></p>
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
    <td align="center"><a href="viewGradeType.php?coinGrade=PR35&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR35', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR40&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR40', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR45&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR45', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR50&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR50', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR55&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR55', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR58&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR58', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR60&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR60', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR61&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR61', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR62&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR62', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR63&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR63', $coinType, $userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR35&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR35', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR40&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR40', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR45&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR45', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR50&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR50', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR55&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR55', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR58&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR58', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR60&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR60', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR61&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR61', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR62&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR62', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR63&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR63', $coinType, $userID); ?></a></td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR35', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR40', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR45', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR50', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR55', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR58', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR60', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR61', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR62', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR63', $coinType, $userID) ?></strong></td>
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
    <td align="center"><a href="viewGradeType.php?coinGrade=PR64&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR64', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR65&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR65', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR66&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR66', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR67&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR67', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR68&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR68', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR69&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR69', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=PR70&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('PR70', $coinType, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR64&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR64', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR65&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR65', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR66&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR66', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR67&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR67', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR68&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR68', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR69&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR69', $coinType, $userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=PR70&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('PR70', $coinType, $userID); ?></a></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR64', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR65', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR66', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR67', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR68', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR69', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('PR70', $coinType, $userID) ?></strong></td>
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
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>