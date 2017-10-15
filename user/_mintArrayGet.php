<?php 
include"../inc/config.php";



if (isset($_GET["firstdayID"])) { 
$firstdayID = mysql_real_escape_string($_GET["firstdayID"]);

$countAll = mysql_query("SELECT * FROM firstday WHERE firstdayID = '$firstdayID'") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
    $coins = strip_tags($row['coins']);


	$coinList = explode(",", $coins);
	foreach ($coinList as $coins) {
	$coin->getCoinById($coins);
	$coinID = $coin->getCoinID();
	$byMint = $coin->checkPDS($coinID);
	//enterMintsetCoin($coinID, $mintsetID, $coinType, $coinCategory, $byMint);
	
    echo $coin->getCoinName().' '.$coin->getCoinType().'<br />';
	
         }
	  }
}

if (isset($_GET["mintsetID"])) { 
$mintsetID = mysql_real_escape_string($_GET["mintsetID"]);

$countAll = mysql_query("SELECT * FROM mintset WHERE mintsetID = '$mintsetID'") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
    $coins = strip_tags($row['coins']);


	$coinList = explode(",", $coins);
	foreach ($coinList as $coins) {
	$coin->getCoinById($coins);
	$coinID = $coin->getCoinID();
	$byMint = $coin->checkPDS($coinID);
	//enterMintsetCoin($coinID, $mintsetID, $coinType, $coinCategory, $byMint);
	
    echo $coin->getCoinName().' '.$coin->getCoinType().'<br />';
	
         }
	  }
}
?>