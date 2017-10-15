<?php 
include "config.php";

function enterFolderCoinByID($coinID, $collectfolderID, $accountID){
$theDate = date("Y-m-d H:i:s");
$coin = new Coin();
$coin-> getCoinById($coinID);
$coinType = $coin->getCoinType();
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();
$coinGrade = 'No Grade';
//$byMint = checkMintCount($coinID);
$proService = 'None';
$proSerialNumber = 'None';
$slabLabel = 'None';
$purchasePrice = '0.00';
$coinNote = 'None';
$purchaseDate = $theDate;
$purchaseFrom = 'None';	
$additional = 'None';	
$auctionNumber = 'None';
$ebaySellerID = 'None';
$shopName = 'None';
$shopUrl = 'None';	
$errorType = 'None';
mysql_query("INSERT INTO collection(coinID, coinType, coinCategory, coinSubCategory, proService, proSerialNumber, slabLabel, coinGrade, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, accountID, errorType, collectfolderID) VALUES('$coinID', '$coinType', '$coinCategory', '$coinSubCategory', '$proService', '$proSerialNumber', '$slabLabel', '$coinGrade', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$accountID', '$errorType', '$collectfolderID')") or die(mysql_error()); 

return true;	
}


if(isset($_GET["coinID"])){
	$coinID  = intval($_GET["coinID"]);
	$collectfolderID  = intval($_GET["collectfolderID"]);
	$coin-> getCoinById($coinID);
    $coinName = $coin->getCoinName();
	$enterCoin = enterFolderCoinByID($coinID, $collectfolderID, $accountID);

	if($enterCoin) {
	//echo '<img id="coinImg$coinID" class="coinSwitch" src="img/$image" alt="" width="100" height="100" />';
	echo '<span class="collectLink'.$coinID.'"> (' . $coinName . " Updated)</span>";
	} else {
		
		echo "Coin not updated";
	}
}
?>