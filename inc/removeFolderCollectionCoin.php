<?php 
include "config.php";

if(isset($_GET["collectionID"])){
	$collectionID  = intval($_GET["collectionID"]);
	$collection->getCollectionById($collectionID);
	
	$coinID = $collection->getCoinID();
	$coin->getCoinById($coinID);
	
	$coinName = $coin->getCoinName();
    $removeThis = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectionID = '$collectionID'") or die(mysql_error()); 
	if($removeThis) {
	 echo '<span class="collectLink'.$coinID.'"> (' . $coinName . " Removed)</span>";
	} else {
		echo "Coin not updated";
	}
}
?>