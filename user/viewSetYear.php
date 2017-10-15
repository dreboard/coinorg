<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


function getYearCoins($userID, $coinYear){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($countAll);	
}
function getYearSets($userID, $coinYear){
	$countAll = mysql_query("SELECT * FROM collectset WHERE coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($countAll);	
}
function getCoinYearImg($coinType, $userID, $coinYear){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
	$img_check = mysql_num_rows($countAll);
	if($img_check == 0){ 
	  return "blank.jpg";
	  } else {
	while($row = mysql_fetch_array($countAll)){
		$coinType = str_replace(' ', '_', $row['coinType']);
		return $coinType.'.jpg';
	}
	
	}	
}


function thisYearDisplay($coinCategory, $userID, $coinYear){
	$collection = new Collection();
	$countAll = mysql_query("SELECT DISTINCT coinType, coinCategory, coinVersion FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinYear = '$coinYear'") or die(mysql_error());
	while($row = mysql_fetch_array($countAll)){
		$coinType = str_replace(' ', '_', $row['coinType']);
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		$yearCoin = '<td width="140"><a href="viewCoinYear.php?coinType='.$coinType.'&year='.$coinYear.'"><img class="coinSwitch" src="../img/'.getCoinYearImg($coinType, $userID, $coinYear).'" alt="" width="100" height="100" /></a><br />
 <a href="viewCoinYear.php?coinType='.$coinType.'&year='.$coinYear.'">'.$row['coinType'].'</a></td>';
		return $yearCoin;
	}	
}


/* THE ONE THAT WORKS
function thisYearDisplay($coinCategory, $userID, $coinYear){
	$collection = new Collection();
	$countAll = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinYear = '$coinYear'") or die(mysql_error());
	while($row = mysql_fetch_array($countAll)){
		$coinType = str_replace(' ', '_', $row['coinType']);
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		$yearCoin = '<td width="140"><a href="viewCoinYear.php?coinType='.$coinType.'&year='.$coinYear.'"><img class="coinSwitch" src="../img/'.getCoinYearImg($coinType, $userID, $coinYear).'" alt="" width="100" height="100" /></a><br />
 <a href="viewCoinYear.php?coinType='.$coinType.'&year='.$coinYear.'">'.$row['coinType'].'</a></td>';
		return $yearCoin;
	}	
}*/

//viewCoinYear
//<a href="viewListReport.php?coinType='.$coinType.'">'.$row['coinType'].'</a>

/*function coinYearDisplay($coinCategory, $userID, $coinYear){
	$collection = new Collection();
	$countAll = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinName LIKE '%$coinYear%' AND commemorative = '0'") or die(mysql_error());
	while($row = mysql_fetch_array($countAll)){
		$coinType = str_replace(' ', '_', $row['coinType']);
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		$yearCoin = '<td width="140"><a href="'.str_replace(' ', '_', $coinCategory).'.php"><img class="coinSwitch" src="../img/'.$coinType.'.jpg" alt="" width="100" height="100" /></a><br />
 <a href="'.str_replace(' ', '_', $coinCategory).'.php">'.str_replace('_', ' ', $coinCategory).'</a></td>';
		return $yearCoin;
	}	
}*/

if (isset($_GET['year'])) { 
if($_GET['year'] > date('Y')){
	$year = intval(date('Y'));
} else if($_GET['year'] <= '1792'){
    $year = intval(date('Y'));
}else {
$year = intval($_GET['year']);
}
}

if (isset($_GET['century'])) { 
$year = intval($_GET['century']).strip_tags($_GET['theYear']);

if($year > date('Y')){
	$year = intval(date('Y'));
} else if($year <= '1792'){
    $year = intval(date('Y'));
}else {
$year = intval($_GET['century']).strip_tags($_GET['theYear']);
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $year ?> Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	

$("#yearSwitchForm").submit(function() {
	 $('#yearSwitchBtn').val("Loading...");	  
});

});
</script> 
<style type="text/css">
#yearSwitchTbl {font-size:115%;}
.yearSwitch {font-size:115%;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><?php echo $year; ?> Sets &amp; Coins</h1>

<table width="100%" border="0" cellpadding="3" id="yearSwitchTbl">
  <tr>
    <td width="71"><a class="yearSwitch" href="viewSetYear.php?year=<?php echo $year -1; ?>"><?php echo $year -1; ?></a> |</td>
    <td width="70"><a class="yearSwitch" href="viewSetYear.php?year=<?php echo $year +1; ?>"><?php echo $year +1; ?></a> |</td>
    <td width="337"> Select Year  <form action="viewSetYear.php" method="get" class="compactForm" id="yearSwitchForm">
<select class="yearSwitch" name="century">
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
<select name="theYear" class="yearSwitch">
<option value="00">00</option>
<?php 
for ($num = 1; $num <= 99; $num++) {
if($num<10)
$day = "0$num"; // add the zero
else
$day = "$num"; // don't add the zero
echo "<option value=".$day.">".$day."</option>";
}
?>
</select>

<input type="submit" value="Load Year" class="yearSwitch" id="yearSwitchBtn" />
</form></td>
    <td width="418">| <a href="addCoinTypeYear.php?coinYear=<?php echo $year ?>">Add <?php echo $year ?> Coins</a></td>
  </tr>
</table>
<hr />
<h2><?php echo $year ?> Date Set</h2>
<table border="0" cellpadding="3" class="typeTbl" id="folderTbl">
<tr align="center" valign="top">
<?php
$i = 1;
$coinCategoryGroup = array("Half Cent", "Large Cent", "Small Cent", "Two Cent", "Three Cent", "Half Dime", "Nickel", "Dime", "Twenty Cent", "Quarter", "Half Dollar", "Dollar");
foreach ($coinCategoryGroup as $coinCategory){
echo thisYearDisplay($coinCategory, $userID, $year); 
$i = $i + 1; //add 1 to $i
if ($i == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr>

</table>


<?php if ($year >= '1936'){ ?>
<hr />

<h2>Minsets (<?php echo getYearSets($userID, $year); ?>)</h2>
<a href="mintset.php" class="brownLinkBold">My Minsets </a> | <a href="addMintSet.php"> <span class="brownLinkBold">Add Mintset</span></a><span class="brownLinkBold">
</p>
</span>

<table width="100%" border="0" class="coinTbl">
  <thead class="darker">
  <tr>
    <td width="57%">Set Name</td>
    <td width="11%" align="center">Collected</td>  
    <td width="18%" align="center">Investment</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM mintset WHERE setName LIKE '$year%'") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td>No mintsets issued for '.$year.'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $mintsetID = intval($row['mintsetID']);
  $Mintset->getMintsetById($mintsetID);

  echo '
    <tr class="gryHover">
    <td align="left"><a href="viewSet.php?ID='.$mintsetID.'">'.$Mintset->getSetName().'</a></td>
	<td align="center">'.$CollectionSet->getMintsetCountByMintsetID($mintsetID, $userID).'</td>
	<td align="center">$'.$CollectionSet->getMintsetIDSumById($mintsetID, $userID).'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot class="darker">
  <tr>
    <td width="57%">Set Name</td>
    <td width="11%" align="center">Collected</td>  
    <td width="18%" align="center">Investment</td>
  </tr>
	</tfoot>
</table>

<?php } else { echo '';}  ?>

<hr />

<h2>Coins (<?php echo getYearCoins($userID, $year); ?>)</h2>
<table width="100%" border="0">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM coins WHERE coinYear = '$year' ORDER BY denomination ASC") or die(mysql_error());
  if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td>No coins minted for '.$year.'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
	while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  echo '
    <tr class="gryHover">
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $coinType).'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="center">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>
     
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>

<?php if ($year >= '1999'){ ?>
<hr />

<h2>Mint Rolls</h2>
<table width="100%" border="0" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM rollsmint WHERE rollName LIKE '$year%' ORDER BY coinCategory DESC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td>No rolls issued for '.$year.'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $rollMintID = intval($row['rollMintID']);
  $rollCoinType = strip_tags($row['coinType']);
  $rollCoinLink = str_replace(' ', '_', $rollCoinType);
  $rollName = strip_tags($row['rollName']);
  echo '
    <tr class="gryHover">
    <td><a href="viewMintRoll.php?rollMintID='.$rollMintID.'">'.$rollName.'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $row['coinType']).'">'.$rollCoinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="center">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>
     
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>

<?php } else { echo '';}  ?>
<hr />
<h2>Rolls</h2>
<table width="100%" border="0" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE coinYear = '$year' ORDER BY coinCategory DESC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td>No rolls saved for '.$year.'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td><td>&nbsp;</td>	 	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
  echo '
    <tr class="gryHover">
    <td>'.$collectionRolls->getRollTypeLink(intval($row['collectrollsID'])).'</td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $collectionRolls->getCoinType()).'">'.$collectionRolls->getCoinType().'</a></td>	
	<td align="center">'.date("M j, Y",strtotime($collectionRolls->getCoinDate())).'</td>
	<td align="center">$'.$collectionRolls->getCoinPrice().'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>
     
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="25%">Type</td>
    <td width="10%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>

<hr />
<h2>Bags</h2>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="46%">Bag</td>
    <td width="22%" align="center">Type</td>
    <td width="13%" align="center">Date Collected</td>
    <td width="19%" align="center">Purchase Price</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll2 = mysql_query("SELECT * FROM collectbags WHERE coinYear = '$year' AND userID = '$userID' ORDER BY denomination DESC") or die(mysql_error());
if(mysql_num_rows($countAll2)== 0){
	  echo '
    <tr class="gryHover">
    <td>No bags saved for '.$year.'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	  
	<td>&nbsp;</td>	   
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll2))
	  {
  $collectbagID = intval($row['collectbagID']); 
  $collectionBags->getCollectionBagById($collectbagID);
  echo '
    <tr class="gryHover" align="center">
    <td align="left"><a href="viewBagDetail.php?ID='.$Encryption->encode($collectbagID).'">'.$collectionBags->getBagNickname().'</a></td>
	<td><a href="categoryBags.php?coinCategory='.str_replace(' ', '_', $collectionBags->getCoinCategory()).'">'. strip_tags($collectionBags->getCoinCategory()) .'</a></td>	
	<td>'.date("F j, Y",strtotime($collectionBags->getCoinDate())) .'</td>
	<td>$'. floatval($collectionBags->getCoinPrice()) .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="46%">Bag</td>
    <td width="22%" align="center">Type</td>
    <td width="13%" align="center">Date Collected</td>
    <td width="19%" align="center">Purchase Price</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>