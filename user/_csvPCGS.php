<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

/*
pcgsregID
PCGSNo = $SetRegistry->getOtherNum($collectionID);
CertNo = $SetRegistry->getPCGSNum($collectionID);
Date = $date = substr($coinName, 0, 4);
Variety = '';
Denom = $coin->getDenomination();
Grade = $collection->getCoinGrade();
Cost = $collection->getCoinGrade();
Value = '';
PurchaseDate = $collection->getCoinGrade();
Source = $collection->getCoinGrade();
Comments = $collection->getCoinGrade();
Notes = $collection->getCoinGrade();
Country 'US';



function insertTempCoins($setregID){
	
	$results = mysql_query("SELECT * FROM collection WHERE setregID = '$setregID'") or die(mysql_error()); 
        $row = mysql_fetch_array($results);
        $coinID = $row['coinID'];
		$coin->getCoinById($coinID);
		$collectionID = $row['collectionID'];
		$collection->getCollectionById($collectionID);
		
		$PCGSNo = $SetRegistry->getOtherNum($collectionID);
		$CertNo = $SetRegistry->getPCGSNum($collectionID);
		$Date = $date = substr($coin->getCoinName(), 0, 4);
		$Variety = '';
		$Denom = $SetRegistry->assignPCGSDemon($coin->getDenomination());
		$Grade = $collection->getCoinGrade();
		$Cost = $collection->getCoinPrice();
		$Value = '';
		$PurchaseDate = $collection->getCoinDate();
		$Source = $collection->getPurchaseFrom();
		$Comments = $collection->getCoinNote();
		$Notes = $collection->getCoinNote();
		$Country = 'US';
	
	
	$query = mysql_query("INSERT INTO pcgsreg (PCGSNo, Type, Category, Investment, Date, denomination, PCGSNo, Type, Category, Investment, Date, denomination) VALUES ('".$PCGSNo."','".$coinType."','".$coinCategory."','".$purchasePrice."','".$purchaseDate."','".$denomination."', '".$PCGSNo."','".$coinType."','".$coinCategory."','".$purchasePrice."','".$purchaseDate."','".$denomination."')") or die(mysql_error());	
}
*/
/*function insertTempCoins($coinName, $coinType, $coinCategory, $purchasePrice, $purchaseDate, $denomination){
	$query = mysql_query("INSERT INTO pcgsreg (Name, Type, Category, Investment, Date, denomination) VALUES ('".$coinName."','".$coinType."','".$coinCategory."','".$purchasePrice."','".$purchaseDate."','".$denomination."')") or die(mysql_error());	
}
*/
if (isset($_GET['userID'])) {
$result = mysql_query("SELECT * FROM pcgsreg WHERE setregID = '$setregID'") or die(mysql_error()); 
$num_fields = mysql_num_fields($result); 
$headers = array(); 
for ($i = 0; $i < $num_fields; $i++) 
{     
       $headers[] = mysql_field_name($result , $i); 
} 
$fp = fopen('php://output', 'w'); 
if ($fp && $result) 
{     
       header('Content-Type: text/csv');
       header('Content-Disposition: attachment; filename="export.csv"');
       header('Pragma: no-cache');    
       header('Expires: 0');
       fputcsv($fp, $headers); 
       while ($row = mysql_fetch_row($result)) 
       {
          fputcsv($fp, array_values($row)); 
       }

} 
$endResult = mysql_query("TRUNCATE TABLE pcgsreg") or die(mysql_error()); 

}
?>