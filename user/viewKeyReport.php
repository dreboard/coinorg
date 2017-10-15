<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Key/Semi Key Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );


});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:130%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Mixed_KeyCoins.jpg" width="100" height="100" align="middle" id="setTypes"> My Key/Semi Key Report</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="50%" class="darker"><a href="viewKeyReport.php">Key Report</a></td>
    <td width="50%" class="darker"><a href="viewKeyCheck.php">Checklist</a></td>  
  </tr>
</table> 
<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="28%"><strong>Total Collected </strong></td>
    <td width="72%"><?php echo $collection->getKeyCollectionCountById($userID); ?></td>
  </tr>
  <tr>
    <td width="28%"><strong>Total Unique </strong></td>
    <td width="72%"><?php echo $collection->getKeyCollectionById($userID)	; ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getKeySumByAccount($userID); ?></td>
  </tr>
  </table>
  <hr />

<div class="roundedWhite">
  <table width="100%" id="masterCountTbl" border="1">
    <tr>
    <td width="206" class="darker">Types</td>
    <td width="306" align="center" class="darker">Collected </td>    
    <td width="452" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewKeyCategory.php?coinCategory=Half_Cent" class="brownLink">Half Cents</a></td>
  <td align="center" id="Flying_EagleCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Half Cent', $userID); ?>"/ ></td>  
  <td align="center"><input readonly class="valCount" id="halfVal" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Half Cent', $userID); ?>" /></td>
</tr>
  <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Large_Cent" class="brownLink">Large Cents</a></td>
     <td align="center" id="Indian_HeadCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Large Cent', $userID); ?>"/ ></td>  
     <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Large Cent', $userID); ?>" /></td>
  </tr>
  

 <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Small_Cent" class="brownLink">Small Cents</a>
    <td align="center" id="Lincoln_WheatCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Small Cent', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" id="smallVal" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Small Cent', $userID); ?>" /></td>
 </tr>
 
 
 <tr>
 <td><a href="viewKeyCategory.php?coinCategory=Half_Dime" class="brownLink">Half Dimes</a></td>
    <td align="center" id="Lincoln_MemorialCount"><input readonly class="rollCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Half Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Half Dime', $userID); ?>" /></td>
 </tr>

 <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Nickel" class="brownLink">Nickels</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Nickel', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Nickel', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Dime" class="brownLink">Dimes</a></td>
    <td align="center" id="Union_ShieldCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Dime', $userID); ?>"/ ></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Dime', $userID); ?>" /></td>
 </tr>

 <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Twenty_Cent" class="brownLink">Twenty Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Twenty Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Twenty Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Two_Cent" class="brownLink">Two Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Two Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Two Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Three_Cent" class="brownLink">Three Cents</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Three Cent', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Three Cent', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Quarter" class="brownLink">Quarters</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Quarter', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Quarter', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Half_Dollar" class="brownLink">Half Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Half Dollar', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Half Dollar', $userID); ?>" /></td>
 </tr>
 
  <tr>
    <td><a href="viewKeyCategory.php?coinCategory=Dollar" class="brownLink">Dollars</a></td>
    <td align="center" id="WestwardJourneyCount"><input readonly class="smallCentCollectCount" type="text" value="<?php echo $collection->getTotalCollectedKeyCoinsByID('Dollar', $userID); ?>" /></td>
    <td align="center"><input readonly class="valCount" type="text" value="<?php echo $collection->getTotalInvestmentSumByKeyCategory('Dollar', $userID); ?>" /></td>
 </tr>
 
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collection->getKeyCollectionCountById($userID); ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo $collection->getKeySumByAccount($userID); ?>" /></td>
 </tr>
</table>
<p><br>
<a class="topLink" href="#top">Top</a></p></div>


<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>