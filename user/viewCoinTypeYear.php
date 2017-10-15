<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

function getCoinsYearImg($coinVersion, $userID, $coinYear){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinVersion = '".str_replace('_', ' ', $coinVersion)."' AND coinYear = '$coinYear' AND userID = '$userID'") or die(mysql_error());
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


function getTypeYearRange($coinType){
	
}

if (isset($_GET['year'])) { 
$coinType = str_replace('_', ' ', strip_tags($_GET['coinType']));
$coinTypeLink = $_GET['coinType'];
$coinYear = intval($_GET['year']);
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinYear ?> <?php echo $coinType ?> Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	


$("#yearSwitchForm").submit(function() {
      if ($("#yearSwitch").val() == "") {
		$("#yearSwitch").addClass("errorInput");
		$("#switchLbl").addClass("errorTxt");
        return false;
      }else {
	 $("#switchLbl").removeClass("errorTxt");
	 $('#yearSwitchBtn').val("Loading Year...");		  
	  return true;
	  }
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
<h1><img src="../img/<?php echo $coinTypeLink ?>.jpg" width="100" height="100" align="left" /><?php echo $coinYear ?> <a href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>"><?php echo $coinType ?></a> Coins</h1>
<table width="680" border="0" cellpadding="3" id="yearSwitchTbl" class="clear">
  <tr>
    <td width="60"><a class="yearSwitch" href="viewCoinYear.php?year=<?php echo $coinYear -1; ?>&coinType=<?php echo $coinTypeLink ?>"><?php echo $coinYear -1; ?></a> |</td>
    <td width="60"><a class="yearSwitch" href="viewCoinYear.php?year=<?php echo $coinYear +1; ?>&coinType=<?php echo $coinTypeLink ?>"><?php echo $coinYear +1; ?></a> |</td>
    <td width="545"> <span id="switchLbl">Select Year</span>  <form action="viewCoinYear.php" method="get" class="compactForm" id="yearSwitchForm">
<select class="yearSwitch" name="year" id="yearSwitch">
<option value="" selected="selected">Switch Year</option>
<?php 
$sql = mysql_query("SELECT DISTINCT LEFT(coinName,4) AS coinYearOption FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."'");
while( $field = mysql_fetch_assoc($sql)) {
		echo '<option value="'.$field['coinYearOption'].'">'.$field['coinYearOption'].'</option>';
	}	
?>
</select>
<input name="coinType" type="hidden" value="<?php echo $coinTypeLink ?>" />
<input type="submit" value="Load Year" class="yearSwitch" id="yearSwitchBtn" />
</form></td>
  </tr>
</table>
<hr />
<h2><a href="viewSetYear.php?year=<?php echo $coinYear ?>"><?php echo $coinYear ?></a> <?php echo $coinType ?> Date Set <?php echo $collection->getNumOfCoinSavedThisYear($coinYear, $coinType, $userID); ?> of <?php echo $collection->getNumOfCoinThisYear($coinYear, $coinType); ?> (<?php echo percent($collection->getNumOfCoinSavedThisYear($coinYear, $coinType, $userID), $collection->getNumOfCoinThisYear($coinYear, $coinType)); ?>%)</h2>

<table cellpadding="3" class="typeTbl" width="100%">
<tr valign="top" align="center">
<?php
$i = 1;
$result = mysql_query("SELECT * 
FROM coins
WHERE coinType =  '".str_replace('_', ' ', $coinType)."'
AND coinName LIKE  '".$coinYear."%'
ORDER BY coinName DESC ") or die(mysql_error());
while($row = mysql_fetch_array($result)){
		$coinID = intval($row['coinID']);
		$coinName = strip_tags($row['coinName']);
		$coinType = str_replace(' ', '_', $row['coinType']);
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		echo '<td width="140"><a href="viewCoin.php?coinID='.$coinID.'"><img class="coinSwitch" src="../img/'.$collection->getImageByID($coinID, $userID).'" alt="" width="100" height="100" /></a><br />
 <a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>';
$i = $i + 1; //add 1 to $i
if ($i == 9) { //when you have echoed 3 <td>'s
echo '</tr><tr valign="top" align="center">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table>


<h2>Coins (<?php echo $collection->getAllCoinThisYear($coinYear, $coinType, $userID);?>)</h2>
<table width="100%" border="0" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$sql = mysql_query("SELECT * 
FROM coins
WHERE coinType =  '".str_replace('_', ' ', $coinType)."'
AND coinName LIKE  '".$coinYear."%'
ORDER BY coinName DESC ") or die(mysql_error());
  if(mysql_num_rows($sql)== 0){
	  echo '
    <tr>
    <td>No coins minted for '.$coinYear.'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
	while($row = mysql_fetch_array($sql))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="center">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
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
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<h2>Mint Rolls</h2>
<table width="100%" border="0" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM rollsmint WHERE rollName LIKE '$coinYear%' ORDER BY coinCategory DESC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No rolls issued for '.$coinYear.'</td>
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
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewMintRoll.php?rollMintID='.$rollMintID.'">'.$rollName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$rollCoinLink.'">'.$rollCoinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="center">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
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
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<h2>Rolls</h2>
<table width="100%" border="0" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE coinYear = '$coinYear' ORDER BY coinCategory DESC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No rolls saved for '.$coinYear.'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $collectrollsID = intval($row['collectrollsID']);
  $rollCoinType = strip_tags($row['coinType']);
  $rollCoinLink = str_replace(' ', '_', $rollCoinType);
  $rollNickname = strip_tags($row['rollNickname']);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewRollDetail.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a></td>
	<td><a href="viewListReport.php?coinType='.$rollCoinLink.'">'.$rollCoinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="center">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
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
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>