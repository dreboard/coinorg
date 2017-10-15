<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coin->getCoinById($coinID);

mysql_query("INSERT INTO wantlist(coinID, userID, listDate, coinGrade, proService) VALUES('$coinID', '$userID', '$listDate', '$coinGrade', '$proService')") or die(mysql_error()); 
$collectionID = mysql_insert_id();


}


?>