<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if(isset($_POST["addCoinFormBtn"])){
	
//add all coins to collection
if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
//$coinID = mysql_real_escape_string($_POST["coinID"]);
$coin-> getCoinById($coinID);
$coinType = $coin->getCoinType();
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();
$coinGrade = 'None';
$byMint = checkMintCount($coinID);
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
mysql_query("INSERT INTO collection(coinID, coinType, coinCategory, coinSubCategory, proService, proSerialNumber, slabLabel, coinGrade, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, accountID, errorType, byMint, folderID) VALUES('$coinID', '$coinType', '$coinCategory', '$coinSubCategory', '$proService', '$proSerialNumber', '$slabLabel', '$coinGrade', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$accountID', '$errorType', '$byMint', '$folderID')") or die(mysql_error()); 

}

//////////add file
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName($_FILES['file']['name']);
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . $_FILES['file']['name'];
$fileQuery = mysql_query("UPDATE collection SET  coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID'")  

or die(mysql_error()); 
}
else
{
echo 'Nothing selected';
}
}
}//End submit


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<style type="text/css">
.fromList{margin:0px;}
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}


.newFormImg {width:200px; height:auto; border:none; margin:0px;}
#rawTypeTbl img {width:150px; height:150px; border:none;}
.priceListTbl h3 {margin:0px;}

#otherDetails {width:99%;}
#content #CoinList h2 {
	text-align: center;
}
</style>
<script type="text/javascript">
$(document).ready(function(){	

});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Step 1: Add Coins to <?php echo $folderName ?></h1>
<select name="collectfolderID">
<?php 

	$myQuery = mysql_query("SELECT * FROM collectfolder WHERE folderStatus = 'Blank' AND accountID = '$accountID'") or die(mysql_error()); 
	
	while($row = mysql_fetch_array($myQuery))
	{
	  $collectfolderID = intval($row['collectfolderID']);
	  $folderNickname = strip_tags($row['folderNickname']);
	  $folderCode = strip_tags($row['folderCode']);
	  
	  
	}	

?>
</select>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
