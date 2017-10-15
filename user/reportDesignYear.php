<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


function getCategoryYearImg($coinCategory, $userID, $coinYear, $design){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinYear = '$coinYear' AND userID = '$userID' AND design = '$design' LIMIT 1") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		return $coinVersion.'.jpg';
	}
	
	}	
}


if (isset($_GET['setYear'])) { 
$design = str_replace('_', ' ', $_GET['design']);
$designLink = strip_tags($_GET['design']);
$designURL = str_replace(' ', '', $_GET['design']);
$designQuery = str_replace('_', ' ', $_GET['design']);
$setYear = intval($_GET['setYear']);
if($setYear > $CoinDesign->getDesignEndYear($design)){
	$setYear = $CoinDesign->getDesignEndYear($design);
} else if($setYear <= $CoinDesign->getDesignStartYear($design)){
    $setYear = $CoinDesign->getDesignStartYear($design);
}else {
$setYear = intval($_GET['setYear']);
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $design ?> Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );

$("#yearSwitchForm").submit(function() {
	 $('#yearSwitchBtn').val("Loading Year...");	  
});

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
<h1><img src="../img/<?php echo $designLink ?>.jpg" align="middle"> My  <?php echo $setYear ?> <?php echo $design ?> Date Set</h1>
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
    <td width="22%"><strong>Total Collected </strong></td>
    <td width="78%"><?php echo $collection->getCollectionCountByDesignByYear($userID, $setYear, $design); ?></td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $collection->getCoinSumByDesignByYear($userID, $setYear, $design); ?></td>
  </tr>
  </table>
<br />
<table width="728" border="0" align="center">
  <tr>
    <td align="center"><a href="reportDesignYear.php?setYear=<?php echo $setYear -1; ?>&design=<?php echo $designLink ?>"><?php echo $setYear -1; ?></a> |<a href="reportDesignYear.php?setYear=<?php echo $setYear +1; ?>&design=<?php echo $designLink ?>"><?php echo $setYear +1; ?></a> | Switch Date Set  <form action="reportDesignYear.php" method="get" class="compactForm" id="yearSwitchForm">
      <select name="setYear">
        <?php 
$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE design = '".str_replace('_', ' ', $_GET['design'])."' AND coinYear <= ".date('Y')." ORDER BY coinYear DESC") or die(mysql_error());
  while($row = mysql_fetch_array($sql))
	  {
    $coinYear = intval($row['coinYear']);	
    echo '<option value="'.intval($row['coinYear']).'" selected="selected">'.intval($row['coinYear']).'</option>';
	  }
?>
        </select>
      <input value="Load Year" type="submit" id="yearSwitchBtn" />
<input name="design" type="hidden" value="<?php echo $designLink ?>" />
    </form> 
    | <a href="viewSetYear.php?year=<?php echo $setYear ?>">All <?php echo $setYear ?> Coins</a> | 
    <select id="designSel" onchange="window.open(this.options[this.selectedIndex].value,'_top')">>
      <option value="" selected="selected">Switch Design</option>
      <option value="reportDesignYear.php?setYear=<?php echo $CoinDesign->getDesignStartYear($design='Barber'); ?>&design=Barber">Barber Coins</option>
      <option value="reportDesignYear.php?setYear=<?php echo $CoinDesign->getDesignStartYear($design='Seated Liberty'); ?>&design=Seated_Liberty">Seated Liberty Coins</option>
      <option value="reportDesignYear.php?setYear=<?php echo $CoinDesign->getDesignStartYear($design='Flowing Hair'); ?>&design=Flowing_Hair">Flowing Hair Coins</option>
      <option value="reportDesignYear.php?setYear=<?php echo $CoinDesign->getDesignStartYear($design='Draped Bust'); ?>&design=Draped_Bust">Draped Bust Coins</option>
      <option value="reportDesignYear.php?setYear=<?php echo $CoinDesign->getDesignStartYear($design='Liberty Cap'); ?>&design=Liberty_Cap">Liberty Cap Coins</option>
    </select>
    </td>
    </tr>
</table>
<br />

<table cellpadding="3" class="typeTbl">
<tr valign="top" align="center">
<?php
$i = 1;
$result = mysql_query("SELECT DISTINCT coinCategory, coinType FROM coins WHERE design =  '".str_replace('_', ' ', $_GET['design'])."' AND coinYear =  '".$_GET['setYear']."' ORDER BY denomination ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
		echo '<td width="140"><a href="viewCoinYear.php?year='.$_GET['setYear'].'&coinType='.str_replace(' ', '_', $row['coinType']).'">
		<img class="coinSwitch" src="../img/'.getCategoryYearImg($row['coinCategory'], $userID, $_GET['setYear'], str_replace('_', ' ', $_GET['design'])).'" alt="" width="100" height="100" />
		</a><br />
 <a href="viewCoinYear.php?year='.$_GET['setYear'].'&coinType='.str_replace(' ', '_', $row['coinType']).'">'.strip_tags($row['coinCategory']).'</a></td>';
$i = $i + 1; //add 1 to $i
if ($i == 9) { //when you have echoed 3 <td>'s
echo '</tr><tr valign="top" align="center">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table>

  <h1>Coins</h1>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="59%" height="24">Year / Mint</td>  
    <td width="32%">Type</td>
    <td width="9%" align="right">Purchase </td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinYear = '".$_GET['setYear']."' AND userID = '$userID' AND design = '".str_replace('_', ' ', $_GET['design'])."' ORDER BY denomination ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td class="brownLink"><a href="addCoinRaw.php" class="brownLink">No '.$designQuery.' coins saved for '.$setYear.'</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	     
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $collectionID = intval($row['collectionID']);
  $coin-> getCoinById($coinID);
  $collection-> getCollectionById($collectionID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  echo '
    <tr class="gryHover">
    <td><a href="viewCoin.php?coinID='.$coinID.'" class="brownLink">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td class="purchaseTotals" align="right">$'.$collection->getCoinPrice().'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>
 
<tfoot class="darker">
  <tr>
    <td width="59%" height="24">Year / Mint</td>  
    <td width="32%">Type</td>
    <td width="9%" align="right">Purchase </td>
  </tr>
	</tfoot>
</table>
<p class="clear">&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>