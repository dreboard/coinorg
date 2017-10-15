<?php 
include '../config.php';
if(isset($_GET["coinType"])){
	$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$coinID = $row['coinID'];
		$coinType = $row['coinType'];
		$name = $row['coinName'];

	//echo '<option value="' . $coinID . '">' . $name . '</option>';
	echo $coinID;
	}
}

/*if(isset($_GET["coinType"])){
	$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$coinID = $row['coinID'];
		$coinType = $row['coinType'];
		$name = $row['coinName'];

	//echo '<option value="' . $coinID . '">' . $name . '</option>';
	echo json_encode(
      array('listCoins' => '<option value="' . $coinID . '">' . $name . '</option>', 
      "getID" =>$coinID)
 ) ;

	}
}*/

/*if(isset($_GET["coinType"])){
$coinType = mysql_real_escape_string($_GET["coinType"]);
$result = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error()); 
$array = mysql_fetch_row($result); 
echo json_encode($array);
}*/
?>