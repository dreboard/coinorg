<?php 
include '../config.php';
if(isset($_GET["coinType"])){
	$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$dates = $row['dates'];

	echo $dates;

	}
}
?>