<?php 
include '../config.php';
if(isset($_GET["coinName"])){
	$coinName = mysql_real_escape_string($_GET["coinName"]);
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinName = '$coinName'") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$coinID = $row['coinID'];
	echo $coinID;

	}
}
?>