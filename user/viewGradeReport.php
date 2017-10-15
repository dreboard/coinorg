<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
$coinTypeLink = str_replace(' ', '_', $_GET["coinType"]);
 }
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
<h2><img src="../img/<?php echo $_GET["coinType"]; ?>.jpg" alt="Obverse and reverse" name="obvRev2" width="50" height="50" align="absmiddle" title="<?php echo $coinType; ?>" /> <a class="brownLink" href="viewListReport.php?coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $coinType ?></a> Grade Report </h2>
<table width="100%" border="0">  
  <tr>
    <td class="darker">Type</td>
    <td colspan="2"><a href="<?php echo str_replace(' ', '_', $coin->getCategoryByType($coinType)); ?>.php"><?php echo $coin->getCategoryByType($coinType) ?> </a><a href="viewCoinType.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>"><strong>(<?php echo $collection->getCollectionCountByType($userID, $coinType); ?> Collected)</strong></a></td>
  </tr>
  <tr>
    <td class="darker">Total Graded</td>
    <td width="5%"><strong><?php echo $collection->getGradeTypeCount($coinType, $userID); ?></strong></td>
    <td width="81%"><?php echo $General->percent($collection->getGradeTypeCount($coinType, $userID), $collection->getCollectionCountByType($userID, $coinType)); ?> %</td>
  </tr>
  <tr>
    <td width="14%" class="darker">Total Ungraded</td>
    <td><strong><a href="viewNoGradeType.php?coinType=<?php echo strip_tags($_GET["coinType"]) ?>"><?php echo $collection->getNotGradedTypeCount($coinType, $userID); ?></a></strong></td>
    <td><?php echo $General->percent($collection->getNotGradedTypeCount($coinType, $userID), $collection->getCollectionCountByType($userID, $coinType)); ?> %</td>
  </tr>
  <tr>
    <td class="darker">Total Certified</td>
    <td><a title="View Number Of Certified Coins" href="viewCertTypeReport.php?coinType=<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>"><strong><?php echo $collection->getGradeProTypeCount($coinType, $userID); ?></strong></a></td>
    <td><?php echo $General->percent($collection->getGradeProTypeCount($coinType, $userID), $collection->getCollectionCountByType($userID, $coinType)); ?> %</td>
  </tr>
</table>
<hr />

  <?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  <div>
</div>

<hr />
<table width="100%" border="0" id="proTbl">
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
       <td width="11%"><a href="viewTypeService.php?proService=PCGS&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><strong>PCGS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICG&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><strong>ICG</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NGC&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><strong>NGC</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ANACS&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><strong>ANACS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=SEGS&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><strong>SEGS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=PCI&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><strong>PCI</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=ICCS&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><strong>ICCS</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=HALLMARK&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><strong>HALLMARK</strong></a></td>
       <td width="11%"><a href="viewTypeService.php?proService=NTC&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><strong>NTC</strong></a></td>
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
  
  <table width="100%" border="0">
  <tr>
    <td width="13%"><strong>Highest Grade:</strong></td>
    <td width="14%"><?php echo $collection->getBusinessHighGradeNumberByType($coinType, $userID, $strike='Business') ?></td>
    <td width="10%" align="center">

 	<?php if (str_replace('_', ' ', $coinType) == 'Morgan Dollar') {?>  <strong>Ultra Prooflike</strong><?php } else { echo ''; }  ?>     

 	<?php if (str_replace('_', ' ', $coinType) == 'Franklin Half Dollar') {?>  <strong>Full Bell Lines</strong><?php } else { echo ''; }  ?>     
    
 	<?php if (str_replace('_', ' ', $coinType) == 'Standing Liberty') {?>  <strong>Full Head</strong><?php } else { echo ''; }  ?>     
 
 	<?php if (in_array(str_replace('_', ' ', $coinType), $bandCategories)) {?>  <strong>Full Band</strong><?php } else { echo ''; }  ?>     
    
    
	<?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?>  <strong>Red</strong><?php } else { echo ''; }  ?>  
   
    </td>
    <td width="8%" align="center">
 	<?php if (str_replace('_', ' ', $coinType) == 'Morgan Dollar') {?>  <strong>Deep Mirror Prooflike</strong><?php } else { echo ''; }  ?>     	
	<?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?>  <strong>Red/BN</strong><?php } else { echo ''; }  ?> 
   <?php if (str_replace('_', ' ', $coinType) == 'Roosevelt Dime') {?> <strong>Full Torch</strong><?php } else { echo ''; }  ?>   
     </td>
    <td width="9%" align="center">
	 	<?php if (str_replace('_', ' ', $coinType) == 'Morgan Dollar') {?>  <strong>Proof Like</strong><?php } else { echo ''; }  ?>     
	<?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?>  <strong>BN</strong><?php } else { echo ''; }  ?>  </td>
    <td width="11%" align="center">
     	<?php if (str_replace('_', ' ', $coinType) == 'Morgan Dollar') {?>  <strong>Semi Prooflike</strong><?php } else { echo ''; }  ?>     
    </td>
    <td width="11%">&nbsp;</td>
    <td width="24%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Raw:</strong></td>
    <td><?php echo $collection->getTotalTypeNoProGradeByStrike($strike='Business', $coinType, $userID); ?></td>
    <td align="center">

<?php if (str_replace('_', ' ', $coinType) == 'Morgan Dollar') {?><a href="viewMorganReport.php?coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getMorganDesignationTypeCount($userID, $morganDesignation='UPL'); ?></a><?php } else { echo ''; }  ?>  

    	<?php if (str_replace('_', ' ', $coinType) == 'Franklin Half Dollar') {?><a href="viewFullReport.php?coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getTypeStrikeFullBandCount($userID, $coinType, 'Business', 'FBL'); ?></a><?php } else { echo ''; }  ?>  
        	
    	<?php if (str_replace('_', ' ', $coinType) == 'Standing Liberty') {?><a href="viewFullReport.php?coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getTypeStrikeFullBandCount($userID, $coinType, 'Business', 'FH'); ?></a><?php } else { echo ''; }  ?>     
    
    	<?php if (in_array(str_replace('_', ' ', $coinType), $bandCategories)) {?><a href="viewFullReport.php?coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getTypeStrikeFullBandCount($userID, $coinType, 'Business', 'FB'); ?></a><?php } else { echo ''; }  ?> 
    
	<?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?><a href="viewColorReport.php?coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><?php echo $collection->getTypeStrikeColorCount($userID, 'RD', $coinType, 'Business'); ?></a><?php } else { echo ''; }  ?> 
    
    
     </td>
    <td align="center">
	<?php if (str_replace('_', ' ', $coinType) == 'Morgan Dollar') {?><a href="proofLikeReport.php"><?php echo $collection->getMorganDesignationTypeCount($userID, $morganDesignation='DMPL'); ?></a><?php } else { echo ''; }  ?>  
    
    
	<?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?><a href="viewCertProofReport.php"><?php echo $collection->getTypeStrikeColorCount($userID, 'RB', $coinType, 'Business'); ?></a><?php } else { echo ''; }  ?>  
       <?php if (str_replace('_', ' ', $coinType) == 'Roosevelt Dime') {?> <strong>Full Torch</strong><?php } else { echo ''; }  ?>   
    </td>
    <td align="center">
	<?php if (str_replace('_', ' ', $coinType) == 'Morgan Dollar') {?><a href="proofLikeReport.php"><?php echo $collection->getMorganDesignationTypeCount($userID, $morganDesignation='PL'); ?></a><?php } else { echo ''; }  ?>  	
	
	<?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?><a href="viewCertProofReport.php"><?php echo $collection->getTypeStrikeColorCount($userID, 'BN', $coinType, 'Business'); ?></a><?php } else { echo ''; }  ?>  </td>
    <td align="center">
 	<?php if (str_replace('_', ' ', $coinType) == 'Morgan Dollar') {?><a href="proofLikeReport.php"><?php echo $collection->getMorganDesignationTypeCount($userID, $morganDesignation='SPL'); ?></a><?php } else { echo ''; }  ?>  	   
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Certified:</strong></td>
    <td><?php echo $collection->getTotalTypeProGradeByStrike($strike='Business', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  
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
    <td align="center"><a href="viewGradeType.php?coinGrade=FR2&amp;coinType=<?php echo $coinTypeLink; ?>"><?php echo $collection->getTypeGrade('FR2', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=AG3&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('AG3', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=G4&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('G4', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=G6&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('G6', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VG8&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('VG8', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VG10&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('VG10', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=F12&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('F12', $coinType ,$userID); ?></a></td>
    <td width="9%" align="center"><a href="viewGradeType.php?coinGrade=F15&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('F15', $coinType ,$userID); ?></a></td>
  </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewGradeProType.php?coinGrade=B0&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('B0', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=P1&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('P1', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=FR2&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('FR2', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=AG3&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('AG3', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=G4&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('G4', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=G6&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('G6', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=VG8&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('VG8', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=VG10&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('VG10', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=F12&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('F12', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=F15&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('F15', $coinType ,$userID); ?></a></td>
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
    <td width="10%" align="center"><strong>AU-53</strong></td>
    <td width="10%" align="center"><strong>AU-55</strong></td>
    <td width="9%" align="center"><strong>AU-58</strong></td>
    </tr>
  <tr>
    <td><strong>Raw</strong></td>
    <td width="9%" align="center"><a href="viewGradeType.php?coinGrade=VF20&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('VF20', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VF25&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('VF25', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VF30&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('VF30', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=VF35&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('VF35', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=EF40&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('EF40', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=EF45&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('EF45', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=AU50&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('AU50', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=AU53&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('AU53', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=AU55&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('AU55', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=AU58&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('AU58', $coinType ,$userID); ?></a></td>
    </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewGradeProType.php?coinGrade=VF20&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('VF20', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=VF25&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('VF25', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=VF30&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('VF30', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=VF35&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('VF35', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=EF40&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('EF40', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=EF45&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('EF45', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=AU50&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('AU50', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=AU53&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('AU53', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=AU55&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('AU55', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=AU58&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('AU58', $coinType ,$userID); ?></a></td>
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
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('AU53', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('AU55', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('AU58', $coinType, $userID) ?></strong></td>
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
    <td width="9%" align="center"><a href="viewGradeType.php?coinGrade=MS60&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS60', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS61&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS61', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS62&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS62', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS63&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS63', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS64&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS64', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS65&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS65', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS66&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS66', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS67&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS67', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS68&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS68', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeType.php?coinGrade=MS69&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS69', $coinType ,$userID); ?></a></td>
    </tr>
  <tr>
    <td><strong>Slab</strong></td>
    <td width="9%" align="center"><a href="viewGradeProType.php?coinGrade=MS60&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS60', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=MS61&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS61', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=MS62&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS62', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=MS63&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS63', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=MS64&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS64', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=MS65&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS65', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=MS66&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS66', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=MS67&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS67', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=MS68&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS68', $coinType ,$userID); ?></a></td>
    <td align="center"><a href="viewGradeProType.php?coinGrade=MS69&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS69', $coinType ,$userID); ?></a></td>
    </tr>
  <tr class="SemiKeyRow">
    <td><strong>Totals</strong></td>
    <td width="9%" align="center"><strong><?php echo $collection->getTotalTypeGrade('MS60', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS61', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS62', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS63', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS64', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS65', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS66', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS67', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS68', $coinType, $userID) ?></strong></td>
    <td align="center"><strong><?php echo $collection->getTotalTypeGrade('MS69', $coinType, $userID) ?></strong></td>
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
      <td width="9%" align="center"><a href="viewGradeType.php?coinGrade=MS70&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getTypeGrade('MS70', $coinType ,$userID); ?></a></td>
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
      <td width="9%" align="center"><a href="viewGradeProType.php?coinGrade=PR35&coinType=<?php echo $coinTypeLink ?>"><?php echo $collection->getProGrade('MS70', $coinType ,$userID); ?></a></td>
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
    <td width="9%" align="center"><strong><?php echo $collection->getTotalTypeGrade('MS70', $coinType, $userID) ?></strong></td>
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
<hr />

<?php
        $sql = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' AND strike = 'Proof'") or die(mysql_error()); 
      if(mysql_num_rows($sql) == 0){
		  echo '';
	  } else {?>

<h3>Proofs <?php echo $collection->getStrikeCountByType($coinType, $userID, $strike='Proof') ?></h3>
<table width="100%" border="0">
  <tr>
    <td width="14%"><strong>Highest Grade:</strong></td>
    <td width="13%"><?php echo $collection->getBusinessHighGradeNumberByType($coinType, $userID, $strike='Proof') ?></td>
    <td width="10%" align="center"><strong>DCAM</strong></td>
    <td width="9%" align="center"><strong>Ultra Cam</strong></td>
    <td width="8%" align="center"><strong>CAM</strong></td>
    <td width="10%" align="center"><?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?><strong>Red</strong><?php } else { echo ''; }  ?>  </td>
    <td width="9%" align="center"><?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?><strong>Red/BN</strong><?php } else { echo ''; }  ?>  </td>
    <td width="8%" align="center"><?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?><strong>BN</strong><?php } else { echo ''; }  ?>  </td>
    <td width="19%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Raw:</strong></td>
    <td><?php echo $collection->getTotalTypeNoProGradeByStrike($strike='Proof', $coinType, $userID); ?></td>
    <td align="center"><a href="viewCertProofReport.php"><?php echo $collection->getTypeDesignationGradeCount($userID, 'DCAM', $coinType); ?></a><a href="viewGradeType.php?coinGrade=PR55&amp;coinType=<?php echo $coinTypeLink ?>"></a></td>
    <td align="center"><a href="viewCertProofReport.php"><?php echo $collection->getTypeDesignationGradeCount($userID, 'UCAM', $coinType); ?></a><a href="viewGradeType.php?coinGrade=PR55&amp;coinType=<?php echo $coinTypeLink ?>"></a></td>
    <td align="center"><a href="viewCertProofReport.php"><?php echo $collection->getTypeDesignationGradeCount($userID, 'CAM', $coinType); ?></a><a href="viewGradeType.php?coinGrade=PR55&amp;coinType=<?php echo $coinTypeLink ?>"></a></td>
    <td align="center"><?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?><a href="viewCertProofReport.php"><?php echo $collection->getTypeStrikeColorCount($userID, 'RD', $coinType, 'Proof'); ?></a><?php } else { echo ''; }  ?>  </td>
    <td align="center"><?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?><a href="viewCertProofReport.php"><?php echo $collection->getTypeStrikeColorCount($userID, 'RB', $coinType, 'Proof'); ?></a><?php } else { echo ''; }  ?>  </td>
    <td align="center"><?php if (in_array(str_replace('_', ' ', $coinType), $colorCategories)) {?><a href="viewCertProofReport.php"><?php echo $collection->getTypeStrikeColorCount($userID, 'BN', $coinType, 'Proof'); ?></a><?php } else { echo ''; }  ?>  </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Certified:</strong></td>
    <td><?php echo $collection->getTotalTypeProGradeByStrike($strike='Proof', $coinType, $userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>





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
<?php } ?>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>