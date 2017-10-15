<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";

if (isset($_GET['design'])) { 
$design = str_replace('_', ' ', $_GET['design']);
$designLink = strip_tags($_GET['design']);
$designURL = str_replace(' ', '', $_GET['design']);
} 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Seated Liberty Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 3, "desc" ]],
	"iDisplayLength": 25
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
<h1><img src="../img/<?php echo $designLink ?>.jpg" width="175" height="125" align="middle"> My <?php echo $design ?> Coins</h1>
<table width="100%" class="clear" id="designLinksTbl">
  <tr id="reportListLinks">
  <td width="14%" class="darker"><a href="reportDesign.php?design=<?php echo $designLink ?>">Report</a></td>
     <td width="14%" class="darker"><a href="reportDesignCoins.php?design=<?php echo $designLink ?>">Coins</a></td>
    <td width="13%" class="darker"><a href="reportDesignYear.php?design=<?php echo $designLink ?>&setYear=<?php echo $CoinDesign->getDesignStartYear($design) ?>">Year Sets</a></td> 
    <td width="20%" class="darker"> <a href="reportDesignGrade.php?design=<?php echo $designLink ?>">Grade Report</a></td>
    <td width="14%" class="darker">
      <select name="designSel" id="designSel" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        >
        <option value="" selected="selected">Switch Design</option>
        <option value="reportDesignCoins.php?design=Barber">Barber Coins</option>
        <option value="reportDesignCoins.php?design=Seated_Liberty">Seated Liberty Coins</option>
        <option value="reportDesignCoins.php?design=Flowing_Hair">Flowing Hair Coins</option>
        <option value="reportDesignCoins.php?design=Draped_Bust">Draped Bust Coins</option>
        <option value="reportDesignCoins.php?design=Liberty_Cap">Liberty Cap Coins</option>
      </select>
    </td>
 
  </tr>
  <tr align="center">
    <td class="darker"><h3><a href="viewDesignFolder.php?design=<?php echo $designLink ?>&page=1"><img src="../img/folderIcon.jpg" width="14" height="20" align="texttop" /> Folder View</a></h3></td>
    <td class="darker"><h3><a href="viewDesignErrors.php?design=<?php echo $designLink ?>"><img src="../img/errorIcon.jpg" width="20" height="20" align="absmiddle" /> Errors</a></h3></td>
    <td class="darker"><h3><a href="viewDesignList.php?design=<?php echo $designLink ?>"><img src="../img/checkList.jpg" width="21" height="20" align="texttop" /> Check List</a></h3></td>
    <td class="darker"><h3><a href="viewDesignCertList.php?design=<?php echo $designLink ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Only</a></h3></td>
    <td class="darker">&nbsp;</td>
  </tr>
</table> 

  <br />

<table width="100%" class="reportListTbl" border="0">
  <tr>
    <td width="49%"><strong>Total Collected </strong></td>
    <td width="51%"><?php echo $CoinDesign->getCollectionCountByDesign($userID, $design); ?></td>
  </tr>
  <tr>
    <td><strong>Mint Collection Progress</strong></td>
    <td><?php echo $CoinDesign->getDesignByMintCountByID($userID, $design); ?> of <?php echo $CoinDesign->getCoinByDesignByMint($design); ?> (<?php echo percent($CoinDesign->getDesignByMintCountByID($userID, $design), $CoinDesign->getCoinByDesignByMint($design)); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete Collection Progress</strong></td>
    <td><?php echo $CoinDesign->getCollectionCountByDesign($userID, $design); ?> of <?php echo $CoinDesign->getCoinCountDesign($design); ?> (<?php echo percent($CoinDesign->getCollectionCountByDesign($userID, $design), $CoinDesign->getCoinCountDesign($design)) ?>%)</td>
  </tr>
  </table>
<hr />
  <h1>Coins</h1>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Year / Mint</td>
    <td width="11%" align="center">Grade</td>  
    <td width="18%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE design = '$design' AND userID = '$userID' ORDER BY coinYear ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr class="gryHover">
		  <td width="57%">No '.$design.'"> Coins Collected</td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {

  $collectionIDNum = strip_tags($row['collectionID']);
  $collection->getCollectionById($collectionIDNum);  
  
  $coinID = intval($row['coinID']);
  $coinGrade = $collection->getCoinGrade();
  $coinID = $collection-> getCoinID($coinID);  
  $coin-> getCoinById($coinID);
  $coinName = $coin->getCoinName(); 
  $collectedCoinName = $coin->getCoinName();
  
  $collectfolderID = $collection->getCollectionFolder();
  $collectionFolder->getCollectionFolderById($collectfolderID);
  $collectrollsID = $collection->getCollectionRoll();
  
  $collectsetID = $collection->getCollectionSet();
  
  $proService = $collection->getGrader();
if($collectfolderID == '0' && $collectrollsID == '0' && $proService == 'None' && $collectsetID == '0') {
    $coinIcon = '<img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />&nbsp;';
}
else if($proService != 'None') {
    $coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
}
else if($collectfolderID != '0') {
    $coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode($collectfolderID).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
}
else if($collectrollsID != '0') {
   $coinIcon = '<img align="absbottom" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" />';
}
else if($collectsetID != '0') {
   $coinIcon = '<img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" />';
}
else { //Or else if($value == 'BB') if you might add more at some point
   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
}
  
//$collection->getCollectionFolder()
//$collection->getCollectionRoll()
  echo '
    <tr class="gryHover" align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionIDNum).'">'.$collectedCoinName.' '.$General->summary($collection->getVarietyForCoin($collectionIDNum), $limit=30, $strip = false).' ' .$coin->getCoinType().'</a></td>
	<td>'. $collection->getCoinGrade() .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="57%">Year / Mint</td>
    <td width="11%" align="center">Grade</td>  
    <td width="18%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>


<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>