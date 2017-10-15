<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 

$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$CoinTypes->getCoinByType($coinType);
$denomination = number_format($CoinTypes->getDenomination() * $count,2);

}

if (isset($_GET['wantBtn'])) { 
$coinID = intval($_GET['coinID']);
$wantGrade = mysql_real_escape_string($_GET["coinGrade"]);
$wantService = mysql_real_escape_string($_GET["proService"]);

$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 

$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$CoinTypes->getCoinByType($coinType);
$denomination = number_format($CoinTypes->getDenomination() * $count,2);

mysql_query("INSERT INTO wantlist(coinID, coinType, coinCategory, userID, listDate, coinGrade, proService, century) VALUES('$coinID', '$coinType', '$coinCategory', '$userID', '$theDate', '".mysql_real_escape_string($_GET["coinGrade"])."', '".mysql_real_escape_string($_GET["proService"])."', '".$coin->getCentury()."')") or die(mysql_error()); 
$wantlistID = mysql_insert_id();

}

if (isset($_POST['wantlistID'])) { 
$wantlistID = intval($_POST['wantlistID']);
mysql_query("DELETE FROM wantlist WHERE wantlistID = '$wantlistID'") or die(mysql_error()); 
}

if($WantList->getWantedCoin($coinID, $userID) >= 1){
	$wantBox = '| I<a href="viewWantCoinID.php?coinID='.$coinID.'">In want list</a>';
} else {
	$wantBox = '<input id="showWantBtn" type="button" value="Add to Want List" />';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 3, "desc" ]],
	"iDisplayLength": 50
} );

$("#wantForm").submit(function() {
      if ($("#coinGrade").val() == "") {
		$("#coinGrade").addClass("errorInput");
        return false;
      }else {
	 $('#wantBtn').val("Adding to list.....");	  
	  return true;
	  }
});


});

function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("thisCoinDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","_viewCoinList.php?coinID=<?php echo intval($coinID); ?>&q="+str,true);
xmlhttp.send();
}
</script> 

<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo str_replace(' ', '_', $coin->getCoinVersion()); ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $coinName; ?> </h1>
<h3><a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1" class="brownLink"><?php echo $coinType ?></a>  |  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink"><?php echo substr($coin->getCoinName(), 0, 4); ?> Date Set</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear(); ?>" class="brownLink"><?php echo $coin->getCoinYear(); ?> Mint Marks</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&amp;year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink">All Mint Marks</a> | <a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo $coinCategory ?></a></h3>

<table width="100%" border="0">
  <tr>
    <td width="15%"><strong>Total Sold</strong></td>
    <td width="10%" align="right"><?php echo $count ?></td>
    <td width="11%">&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Total Revenue</strong></td>
    <td align="right">$<?php echo $collection->getCoinSumById($coinID, $userID) ?></td>
    <td>&nbsp;</td>
    </tr>
</table>
<hr />







<table width="100%" border="0" id="coinIdTbl">
    <tr align="center">
      <td width="3%" align="left"><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="22" height="22" align="absmiddle" /></td>
      <td width="15%" align="left"><a class="brownLink" href="viewCoin.php?coinID=<?php echo $coinID ?>"><strong>Main Report</strong></a></td>
    <td width="3%" align="left"><a href="viewCoinGrade.php?coinID=<?php echo $coinID ?>" class="brownLink"><img src="../img/grades.jpg" alt="graded" width="25" height="25" align="absmiddle" /></a></td>
    <td width="14%" align="left"><a href="viewCoinGrade.php?coinID=<?php echo $coinID ?>" class="brownLink"><strong>Grade Report</strong></a></td>
    <td width="5%" align="center"><a href="viewCoinFinance.php?coinID=<?php echo $coinID ?>&year=<?php echo $year ?>"><img src="../img/financeIcon.jpg" alt="" width="32" height="25" align="absmiddle" /></a></td>
    <td width="15%" align="left"><a href="viewCoinFinance.php?coinID=<?php echo $coinID ?>&year=<?php echo $year ?>"><strong><span class="brownLink">Financial Report</span></strong></a></td>
    <td width="3%" align="left"><a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><img src="../img/timeIcon.jpg" width="25" height="25" align="absmiddle" /></a></td>
    <td width="15%" align="left"><a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><strong>Collection History</strong></a></td>
    <td align="center"><img src="../img/addIcon.jpg" width="20" height="20" /></td>
    <td align="left"><a href="addCoinByID.php?coinID=<?php echo $coinID ?>" class="brownLinkBold">Add</a></td>
    </tr>
  
  <tr align="center">
    <td width="3%" align="left"><strong><a href="viewCoinCert.php?coinID=<?php echo $coinID ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /></a></strong></td>
    <td width="15%" align="left"><strong><a href="viewCoinCert.php?coinID=<?php echo $coinID ?>">Certified</a> <?php echo $collection->getCoinCertifiedCountByID($coinID, $userID) ?></strong></td>
    <td width="3%" align="left"><strong><a href="viewCoinRoll.php?coinID=<?php echo $coinID ?>"><img src="../img/rollReportIcon.jpg" width="21" height="20" align="absmiddle" /></a></strong></td>
    <td width="14%" align="left"><strong><a href="viewCoinRoll.php?coinID=<?php echo $coinID ?>">Rolls </a><?php echo $collection->getCoinRollCountByID($coinID, $userID) ?></strong></td>
    <td width="5%" align="center"><strong><a href="viewCoinError.php?coinID=<?php echo $coinID ?>"><img src="../img/errorIcon.jpg" width="20" height="20" align="absmiddle" /></a></strong></td>
    <td width="15%" align="left"><strong><a href="viewCoinError.php?coinID=<?php echo $coinID ?>"> Errors </a><?php echo $Errors->getErrorTypeCoinCount($coinID, $userID) ?></strong></td>
    <td width="3%" align="left"><strong><a href="viewCoinBag.php?coinID=<?php echo $coinID ?>v"><img src="../img/bagIcon2.jpg" width="21" height="20" align="absmiddle" /></a></strong></td>
    <td width="15%" align="left"><strong><a href="viewCoinBag.php?coinID=<?php echo $coinID ?>v">Bags </a><?php echo $collectionBags->getBagCountByCoin($userID, $coinID) ?></strong></td>
    <td width="4%" align="center"><strong><a href="viewCoinBox.php?coinID=<?php echo $coinID ?>"><img src="../img/boxIcon2.jpg" width="21" height="20" align="absmiddle" /></a></strong></td>
    <td width="23%" align="left"><strong><a href="viewCoinBox.php?coinID=<?php echo $coinID ?>">Boxes </a><?php echo $CollectionBoxes->getBoxCountByCoin($userID, $coinID); ?></strong></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

<hr />
<form>
  <label for="listSwitcher">Filter Results: </label><select id="listSwitcher" name="q" onchange="showUser(this.value)">
<option value="all" selected="selected">Switch View:</option>
<option value="folder">In Folders</option>
<option value="roll">In Rolls</option>
<option value="set">In Sets</option>
<option value="certified">To Be Certified</option>
<option value="all">All</option>
</select>
</form>
<br />

<div id="thisCoinDiv">

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Year / Mint</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM selllist WHERE coinID = '$coinID' AND userID = '$userID' ORDER BY sellDate DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$coinName.' Sold</strong></a></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $SellList->getSellItemById(intval($row['sellListID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		   
		 if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
		}
		
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		}
  
  echo '
    <tr align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coin->getCoinName().'</a></td>
	<td>'. $SellList->getCoinGrade() .'</td>
		<td>'.date("F j, Y",strtotime($row["sellDate"])).'</td>
	<td>$'. $SellList->getSalePrice() .'</td>	   
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
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>