<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

error_reporting(0);

function insertTempCoins($coinName, $coinType, $coinCategory, $purchasePrice, $purchaseDate, $denomination){
	$query = mysql_query("INSERT INTO exceldump (Name, Type, Category, Investment, Date, denomination) VALUES ('".$coinName."','".$coinType."','".$coinCategory."','".$purchasePrice."','".$purchaseDate."','".$denomination."')") or die(mysql_error());
	
}



if (isset($_GET['collection'])) {
//PROCESS COLLECTION	
$getCoins = mysql_query("SELECT coinID, purchasePrice, purchaseDate FROM collection WHERE userID = '".$Encryption->decode($_GET["collection"])."'") or die(mysql_error());

while($row = mysql_fetch_array($getCoins)){ 
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinCategory = $coin->getCoinCategory();
  $purchasePrice = floatval($row['purchasePrice']);
  $purchaseDate = strip_tags($row['purchaseDate']);
  $denomination = $coin->getDenomination();
  insertTempCoins($coinName, $coinType, $coinCategory, $purchasePrice, $purchaseDate, $denomination);
 }	
		
//convert to excel	
$result = mysql_query("SELECT Name, Type, Category, Investment, Date FROM exceldump ORDER BY denomination ASC") or die(mysql_error());

$count = mysql_num_fields($result); 
for ($i = 0; $i < $count; $i++){ 
    $header .= mysql_field_name($result, $i)."\t"; 
} 

while($row = mysql_fetch_row($result)){ 
  $line = ''; 
  
  foreach($row as $value){ 
    if(!isset($value) || $value == ""){ 
      $value = "\t"; 
    }else{ 
      $value = str_replace('"', '""', $value); 
      $value = '"' . $value . '"' . "\t"; 
    } 
    $line .= $value; 
  } 
  $data .= trim($line)."\n"; 
} 

  $data = str_replace("\r", "", $data); 

header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=myCollection.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

echo $header."\n".$data;  

$endResult = mysql_query("TRUNCATE TABLE exceldump") or die(mysql_error());
}
?>