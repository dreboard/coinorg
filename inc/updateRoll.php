<?php 
include "config.php";

if(isset($_GET["collectionID"])){
	$collectionID  = intval($_GET["collectionID"]);
	$collectrollsID  = intval($_GET["collectrollsID"]);
	$result = mysql_query("UPDATE collectrolls SET collection = '$collection' WHERE coinID = '$coinID'") or die(mysql_error()); 
	
	//update pages
	$getPage = mysql_query("SELECT * FROM pages WHERE $coinType = 'pageName'") or die(mysql_error()); 
	while($row = mysql_fetch_array($getPage)){
		$typeCount = $row['typeCount'];
		if($collection == 0){
		$newCount = $typeCount - 1;
		} elseif($collection == 0 && $typeCount == 0){
			$newCount = 0;
		}
		$result = mysql_query("UPDATE pages SET typeCount = '$newCount' WHERE  $coinType = 'pageName'") or die(mysql_error());
	}
	 
	
	if($result) {
	//echo '<img id="coinImg$penniesID" class="coinSwitch" src="img/$image" alt="" width="100" height="100" />';
	echo '<span class="collectLink"> (' . $name . " Updated)</span>";
	} else {
		
		echo "Coin not updated";
	}
}
?>