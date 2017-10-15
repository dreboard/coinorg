<?php 
include"../inc/config.php";

if (isset($_GET["varietysetID"])) { 
$varietysetID = intval($_GET["varietysetID"]);
$countAll = mysql_query("SELECT * FROM varietyset WHERE varietysetID = '$varietysetID'") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
	$coinList = explode(",", $row['coins']);
	foreach ($coinList as $coins) {
	$coin->getCoinById($coins);
	$coinID = $coin->getCoinID();
    echo $coin->getCoinName().' '.$coin->getCoinType().'<br />';
         }
	  }
}


?>