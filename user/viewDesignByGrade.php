<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['designQuery'])) { 
$design = str_replace('_', ' ', $_GET['designQuery']);
$designLink = strip_tags($_GET['designQuery']);
$designURL = str_replace(' ', '', $_GET['designQuery']);
$designQuery = str_replace('_', ' ', $_GET['designQuery']);
$coinGrade = strip_tags($_GET['coinGrade']);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $designQuery ?> Grade report</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
});
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My <a href="reportDesignGrade.php?design=<?php echo $designLink ?>"><?php echo $designQuery ?>'s</a> Graded <?php echo $coinGrade ?></h1>

<table width="100%" id="reportListLinks" class="clear">
  <tr>
  <td width="14%" class="darker"><a href="reportDesign.php?design=<?php echo $designLink ?>">Report</a></td>
     <td width="14%" class="darker"><a href="reportDesignCoins.php?design=<?php echo $designLink ?>">Coins</a></td>
    <td width="13%" class="darker"><a href="reportDesignYear.php?design=<?php echo $designLink ?>&setYear=<?php echo $CoinDesign->getDesignStartYear($design) ?>">Year Sets</a></td> 
    <td width="20%" class="darker"> <a href="reportDesignGrade.php?design=<?php echo $designLink ?>">Grade Report</a></td>
    <td width="14%" class="darker">
      <select name="designSel" id="designSel2" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        >
        <option value="" selected="selected">Switch Design</option>
        <option value="reportDesign.php?design=Barber">Barber Coins</option>
        <option value="reportDesign.php?design=Seated_Liberty">Seated Liberty Coins</option>
        <option value="reportDesign.php?design=Flowing_Hair">Flowing Hair Coins</option>
        <option value="reportDesign.php?design=Draped_Bust">Draped Bust Coins</option>
        <option value="reportDesign.php?design=Liberty_Cap">Liberty Cap Coins</option>
      </select>
    </td>
 
  </tr>
</table>
  <table width="100%" border="0" id="listTbl" class="clear">
  <tr valign="top" class="darker">
    <td width="180" align="center"><h3><a href="viewDesignFolder.php?design=<?php echo $designLink ?>&page=1"><img src="../img/folderIcon.jpg" width="14" height="20" align="texttop" /> Folder View</a></h3></td>
    <td width="179" align="center"><h3><a href="viewDesignErrors.php?design=<?php echo $coinCatLink ?>"><img src="../img/errorIcon.jpg" width="20" height="20" align="absmiddle" /> Errors</a></h3></td>
    <td width="173" align="center"><h3><a href="viewDesignList.php?design=<?php echo $coinCatLink ?>"><img src="../img/checkList.jpg" width="21" height="20" align="texttop" /> Check List</a></h3></td>
    <td width="243" align="center"><h3><a href="viewDesignCertList.php?design=<?php echo $design ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Only</a></h3></td>

    <td width="203" align="center"><h3><br />
    </h3></td>
  </tr>
  </table>
<br />

<table width="100%" border="0" id="clientTbl" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE design = '$designQuery' AND proService = 'None' AND coinGrade = '$coinGrade' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
	if(mysql_num_rows($countAll) == 0){ 
				echo    '<tr>
    <td>No '.$designQuery. ' Graded '.$coinGrade.'\'s collected</td>
	<td>&nbsp;</td>	
	<td class="purchaseTotals" align="right">&nbsp;</td>	    
  </tr>';
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
    <td><strong>Type</strong></td>    
    <td width="14%" align="right"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>

<br />
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>