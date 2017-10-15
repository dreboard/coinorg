<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$commemorativeVersion = 'Early Commemorative';
$collectTotal = $Commemorative->getTotalCollectedCommemorativeVersionByID($commemorativeVersion, $userID);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Early Commemorative Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Early_Commemorative.jpg" width="100" height="100" align="middle">  My <?php echo $commemorativeVersion; ?> Collection</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="25%" class="darker"><a href="CommemorativeCoins.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Coins</a></td>
    <td width="25%" class="darker"><a href="CommemorativeAlbum.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Album View</a></td>
    <td width="25%" class="darker"> <a href="CommemorativeGrades.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Grade Report</a></td>
    <td width="25%" class="darker"><a href="CommemorativeError.php?commemorativeVersion=<?php echo str_replace(' ', '_', $commemorativeVersion); ?>">Errors</a></td>  
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $collectTotal; ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $Commemorative->getInvestmentCommemorativeVersionByID($commemorativeVersion, $userID); ?></td>
  </tr>
  <tr>
    <td><strong>Total Face Value</strong></td>
    <td>$<?php echo number_format($Commemorative->getCommemorativeVersionFaceValByID($commemorativeVersion, $userID), 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $collectTotal; ?> of <?php echo $Commemorative->getCompleteCommemorativeCount($commemorativeVersion); ?> (<?php echo percent($collectTotal, $Commemorative->getCompleteCommemorativeCount($commemorativeVersion)) ?>%)</td>
  </tr>
  </table>
  <br />
<div class="roundedWhite">
  <table width="100%" class="reportList priceListTbl" border="1">
    <tr>
      <td width="444" class="darker">Types</td>
      <td width="210" align="center" class="darker">Collected Pieces</td>    
      <td width="228" align="center" class="darker"> Investment</td>
    </tr>
  
    <tr>
      <td><a href="viewListReport.php?coinType=Commemorative_Quarter" class="brownLink">Quarters</a></td>
      <td align="center" id="Flying_EagleCount"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionReportTypeCount($commemorativeVersion, 'Commemorative_Quarter', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionSumTypeCount($commemorativeVersion, 'Commemorative_Quarter', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Commemorative_Half_Dollar" class="brownLink">Half Dollars</a></td>
      <td align="center" id="Indian_HeadCount4"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionReportTypeCount($commemorativeVersion, 'Commemorative_Half_Dollar', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionSumTypeCount($commemorativeVersion,'Commemorative_Half_Dollar', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Commemorative_Dollar" class="brownLink">Dollars</a></td>
      <td align="center" id="Flying_EagleCount"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionReportTypeCount($commemorativeVersion, 'Commemorative_Dollar', $userID); ?>" /></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionSumTypeCount($commemorativeVersion,'Commemorative_Dollar', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Commemorative_Quarter_Eagle" class="brownLink">Quarter Eagles</a></td>
      <td align="center" id="Indian_HeadCount8"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionReportTypeCount($commemorativeVersion, 'Commemorative_Quarter_Eagle', $userID); ?>" /></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionSumTypeCount($commemorativeVersion,'Commemorative_Quarter_Eagle', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Commemorative_Five_Dollar" class="brownLink">Five </a></td>
      <td align="center" id="Indian_HeadCount7"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionReportTypeCount($commemorativeVersion, 'Commemorative_Five_Dollar', $userID); ?>" /></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionSumTypeCount($commemorativeVersion,'Commemorative_Five_Dollar', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Commemorative_Ten_Dollar" class="brownLink">Ten </a></td>
      <td align="center" id="Indian_HeadCount6"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionReportTypeCount($commemorativeVersion, 'Commemorative_Ten_Dollar', $userID); ?>" /></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionSumTypeCount($commemorativeVersion,'Commemorative_Ten_Dollar', $userID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Commemorative_Fifty_Dollar" class="brownLink">Fifty Dollars</a></td>
      <td align="center" id="Indian_HeadCount5"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionReportTypeCount($commemorativeVersion, 'Commemorative_Half_Dollar', $userID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $Commemorative->getCommemorativeVersionSumTypeCount($commemorativeVersion,'Commemorative_Fifty_Dollar', $userID)?>" /></td>
    </tr>
  
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $Commemorative->getInvestmentCommemorativeVersionByID($commemorativeVersion, $userID); ?>" /></td>
 </tr>
</table>
<br />
</div>

<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>