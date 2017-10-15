<?php 
include '../inc/config.php';
function updatePCGSReg($collectionID){
	$sql = mysql_query("UPDATE collection SET pcgs = '1' WHERE collectionID = '$collectionID'") or die(mysql_error());
}

		
if(isset($_GET["fromCol"])){
	$userID = $Encryption->decode($_GET["fromCol"]);
	$sql = mysql_query("SELECT * FROM collection WHERE proService = 'PCGS' AND userID = '$userID' AND pcgs = '0'") or die(mysql_error()); 
	if (mysql_num_rows($sql) == 0) {
 			echo 'No Unsubmitted Coins In Collection';
 		} else {
	while($row = mysql_fetch_array($sql)){
		updatePCGSReg($row['collectionID']);
		echo "".$row['proSerialNumber']."\r\n";
	    }
	}
}

?>

