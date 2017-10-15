<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinCatLink = strip_tags($_GET["coinType"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>By Mint Mark Checklist</title>

<style type="text/css">
.byYearDiv {float:left; margin-right:5px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="40" height="40" align="absmiddle" /> <?php echo $coinType; ?> By Mint Mark Checklist</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<br />

<h3>Complete Date Sets</h3>

<?php echo intval(percent($collection->getNumOfByMintCoinSavedThisYear($year='1970', $coinType, $userID), $coin->getYearByMintCount($coinType, $year='1970')));	 ?>
<br />
<br />

<?php

function addYearNumbers($val){
	if(intval($val) === 100){ 
    $num = 1;
	} else {
		$num = 0;
	}
	return $num;
}

$i = 0;
foreach (range($coin->getTypeStartYear($coinType), $coin->getTypeEndYear($coinType)) as $mintedYears) {
$completeDate = percent($collection->getNumOfByMintCoinSavedThisYear($mintedYears, $coinType, $userID), $coin->getYearByMintCount($coinType, $mintedYears));	

$i = $i + addYearNumbers($completeDate); 

}
echo $i;	
?>



 
<?php 

function getByMintYearSetCollected($coinType, $userID, $coinYear){
$sql = mysql_query("SELECT DISTINCT coinYear FROM collection WHERE coinType = '$coinType' AND coinYear = '$coinYear' AND byMint = '1'");	
	return mysql_num_rows($sql);
}

function getYearTypeCount($coinNameYear, $coinType, $userID){
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' AND  coinName LIKE '$coinNameYear%' AND byMint = '1'");	
	return mysql_num_rows($sql);
}

 
 ?>  
  
  

<br />

<?php 
function getCoinProgressImg($coinID, $userID, $coinYear, $coinVersion){
	$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '".$coinID."' AND userID = '$userID'") or die(mysql_error());
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
function getYearProgressList($coinNameYear, $coinType, $userID){
$sql = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' AND  coinName LIKE '$coinNameYear%' AND byMint = '1'");
while($row = mysql_fetch_array($sql)){
	$coinVersion = strip_tags($row['coinVersion']);
	$coinName = strip_tags($row['coinName']);
	$coinID = strip_tags($row['coinID']);
	$coinYear = substr($coinName, 0, 4);
		echo '<td valign="top"><a href="viewCoin.php?coinID='.$coinID.'"><img class="coinSwitch" src="../img/'.getCoinProgressImg($coinID, $userID, $coinYear, $coinVersion).'" alt="" width="75" height="75" /></a><br />
                   <a class="brownLinkBold" href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>';
	}		
	return;
}
?>


<table width="100%" border="1">
<?php 
$sql = mysql_query("SELECT DISTINCT LEFT(coinName,4) AS coinYearOption FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."'");
while( $field = mysql_fetch_assoc($sql)) {
	    echo 
		'
		<tr align="left" valign="top">
		<td colspan="7"><a href="viewCoinTypeYear.php?year='.$field['coinYearOption'].'&coinType='.$coinCatLink.'"> View '.$coinType.' '.$field['coinYearOption'].' Coins</a></td>
		</tr><tr align="left" valign="top">
		'.
		getYearProgressList($field['coinYearOption'], $coinType, $userID).'
		</tr>
		
		';
	}	
?>
</table>


<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>