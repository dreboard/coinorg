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
<div class="roundedWhite">
  <table width="100%" class="reportList priceListTbl" border="1">
    <tr>
      <td width="444" class="darker">Types</td>
      <td width="210" align="center" class="darker">Collected Pieces</td>    
      <td width="228" align="center" class="darker"> Investment</td>
    </tr>
  
    <tr>
      <td><a href="viewListReport.php?coinType=Flowing_Hair_Dollar" class="brownLink">Quarters</a></td>
      <td align="center" id="Flying_EagleCount"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Flowing Hair Dollar', $accountID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Flowing Hair Dollar', $accountID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Draped_Bust_Dollar" class="brownLink">Half </a><a href="viewListReport.php?coinType=Trade_Dollar" class="brownLink">Dollars</a></td>
      <td align="center" id="Indian_HeadCount4"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Dollar', $accountID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Dollar', $accountID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Trade_Dollar" class="brownLink">Dollars</a><a href="viewListReport.php?coinType=Flowing_Hair_Dollar" class="brownLink"></a></td>
      <td align="center" id="Flying_EagleCount"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Flowing Hair Dollar', $accountID); ?>" /></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Flowing Hair Dollar', $accountID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Draped_Bust_Dollar" class="brownLink">Quarter Eagles</a></td>
      <td align="center" id="Indian_HeadCount8"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Draped Bust Dollar', $accountID); ?>" /></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Draped Bust Dollar', $accountID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Gobrecht_Dollar" class="brownLink">Five </a><a href="viewListReport.php?coinType=Trade_Dollar" class="brownLink">Dollars</a></td>
      <td align="center" id="Indian_HeadCount7"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Gobrecht Dollar', $accountID); ?>" /></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Gobrecht Dollar', $accountID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Seated_Liberty_Dollar" class="brownLink">Ten </a><a href="viewListReport.php?coinType=Trade_Dollar" class="brownLink">Dollars</a></td>
      <td align="center" id="Indian_HeadCount6"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Seated Liberty Dollar', $accountID); ?>" /></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Seated Liberty Dollar', $accountID)?>" /></td>
    </tr>
    <tr>
      <td><a href="viewListReport.php?coinType=Trade_Dollar" class="brownLink">Fifty Dollars</a></td>
      <td align="center" id="Indian_HeadCount5"><input readonly="readonly" class="smallCentCollectCount" type="text" value="<?php echo $collection->getReportTypeCount('Trade Dollar', $accountID); ?>"></td>
      <td align="center"><input readonly="readonly" class="valCount" type="text" value="<?php echo $collection->getSumTypeCount('Trade Dollar', $accountID)?>" /></td>
    </tr>
  
 <tr class="noHighlight">
   <td>Totals</td>
   <td align="center"><input id="smallCentCollectTotals" readonly class="collectCountTotal" type="text" value="<?php echo $collectTotal; ?>" /></td>
   <td align="center"><input id="valTotals" readonly class="collectCount" type="text" value="<?php echo getCoinSubCatValByID($accountID, "Dollar") ?>" /></td>
 </tr>
</table>
<br />
</div>
<hr />
<table width="919" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Early Commemorative Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Isabella_Quarter"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Isabella Quarter', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Isabella Quarter</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Columbian_Half_Dollar"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Columbian Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
Columbian Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Panama Pacific Exposition Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Panama Pacific Exposition Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Illinois_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Illinois Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Illinois Centennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Maine_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Maine Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Maine Centennial Half Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Pilgrim_Tercentenary"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Pilgrim Tercentenary', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Pilgrim Tercentenary Half Dollar</span> 
</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Missouri_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Missouri Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
Missouri Centennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Alabama_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Alabama Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Alabama Centennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Grant_Memorial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Grant Memorial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Grant Memorial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Monroe_Doctrine_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Monroe Doctrine Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Monroe Doctrine Centennial Half Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Huguenot_Walloon_Tercentenary"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Huguenot_Walloon_Tercentenary', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Huguenot&#45;Walloon Tercentenary Half Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('California Diamond Jubilee', $userID); ?>" alt="" width="100" height="100" /></a><br />
    California Diamond Jubilee Half Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Fort Vancouver Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Fort Vancouver Centennial Half Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lexington Concord', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Lexington Concord Half Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Stone Mountain', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Stone Mountain Half Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder">
    <td><a href="viewCommemorativeReport.php?coinVersion=Oregon_Trail_Memorial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Oregon Trail Memorial', $userID); ?>" alt="" width="100" height="100" /></a><br />
      Oregon Trail Memorial Half Dollar</td> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Oregon_Trail_Memorial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Oregon Trail Memorial', $userID); ?>" alt="" width="100" height="100" /></a><br />
    Oregon Trail Memorial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Sesquicentennial of American Independence', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Sesquicentennial of American Independence Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Vermont Sesquicentennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Vermont Sesquicentennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Hawaiian Sesquicentennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Hawaiian Sesquicentennial Half Dollar </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Maryland Tercentenary', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Maryland Tercentenary Half Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Texas Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
Texas Centennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Daniel Boone Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Daniel Boone Centennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Arkansas Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Arkansas Centennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion="><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Connecticut Tercentenary', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Connecticut Tercentenary Half Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Hudson_New_York_Sesquicentennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Hudson New York Sesquicentennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  <span>Hudson New York Sesquicentennial</span> Half Dollar </td>
  
  <td><a href="viewCommemorativeReport.php?coinVersion=Old_Spanish_Trail"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Old Spanish Trail', $userID); ?>" alt="" width="100" height="100" /></a><br />
Old Spanish Trail Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Albany"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Albany Half Dollar', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Albany Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Battle_of_Gettysburg"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Battle of Gettysburg', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Battle of Gettysburg Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Bridgeport_Connecticut_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bridgeport Connecticut Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Bridgeport Connecticut Centennial Half Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Cincinnati_Music_Center"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Cincinnati Music Center', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Cincinnati Music Center Half Dollar</td>
  
  <td><a href="viewCommemorativeReport.php?coinVersion=Cleveland_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Cleveland Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
Cleveland Centennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Columbia_Sesquicentennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Columbia Sesquicentennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Columbia Sesquicentennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Delaware_Tercentenary"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Delaware Tercentenary', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Delaware Tercentenary Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Elgin_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Elgin Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Elgin Centennial Half Dollar </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Long_Island_Tercentenary"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Long Island Tercentenary', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Long Island Tercentenary Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Lynchburg_Sesquicentennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Lynchburg Sesquicentennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Lynchburg Sesquicentennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Norfolk_Bicentennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Norfolk Bicentennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Norfolk Bicentennial Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Rhode_Island_Tercentenary"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Rhode Island Tercentenary', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Rhode Island Tercentenary Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Bay_Bridge"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Bay Bridge', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Bay Bridge Half Dollar </td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Wisconsin_Territorial_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Wisconsin Territorial Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
 Wisconsin Territorial Centennial Half Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=York_County_Tercentenary"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('York County Tercentenary', $userID); ?>" alt="" width="100" height="100" /></a><br />
York County Tercentenary Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Roanoke"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Roanoke', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Roanoke Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=Battle_of_Antietam"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Battle of Antietam', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Battle of Antietam Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=New_Rochelle"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('New Rochelle', $userID); ?>" alt="" width="100" height="100" /></a><br />
  New Rochelle Half Dollar</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td><a href="viewCommemorativeReport.php?coinVersion=Iowa_Centennial"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Iowa Centennial', $userID); ?>" alt="" width="100" height="100" /></a><br />
  Iowa Centennial Half Dollar</td>
  <td><a href="viewCommemorativeReport.php?coinVersion=Booker_T_Washington"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Booker T Washington', $userID); ?>" alt="" width="100" height="100" /></a><br />
Booker T Washington Half Dollar</td>
  
<td><a href="viewCommemorativeReport.php?coinVersion=George_Washington_Carver"><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('George Washington Carver', $userID); ?>" alt="" width="100" height="100" /></a><br />
  George Washington Carver Half Dollar</td>
  
<td>&nbsp;</td>
  
<td>&nbsp;</td>
  </tr>
 </table>
<hr />

<a name="coins"></a>
<h1>Collected Commemoratives</h1>

<table width="100%" border="0">
  <tr align="center">
    <td width="20%"><strong>Certified Coins</strong></td>
    <td width="20%"><strong>Errors</strong></td>
    <td width="20%"><strong>First Day Coins</strong></td>
    <td width="20%"><strong>Proofs</strong></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr align="center">
    <td><?php echo $collection->getCertificationCountById($accountID) ?></td>
    <td>0</td>
    <td>0</td>
    <td>0</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE commemorativeVersion = 'Early Commemorative' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%" class="brownLink"><strong>No Early Commemorative Coins Collected</strong></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td class="purchaseTotals" align="right">$'.$collection->totalCoinCategoryInvestment($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>