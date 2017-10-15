<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['collectfolderID'])) { 
$collectfolderID = intval($_GET['collectfolderID']);
$collectionFolder->getCollectionFolderById($collectfolderID);
$folderCode = $collectionFolder->getFolderCode();
$folderID = $folder->getFolderIDByCode($folderCode);
$folder->getFolderByID($folderID);
$folderName = $folder->getFolderName();

/*$sql = mysql_query("SELECT * FROM collectfolder WHERE collectfolderID = '$collectfolderID'") or die(mysql_error());
while($row = mysql_fetch_array($sql))
	  {
		  $folderCode = $row['folderCode'];
		  //$folderCodeTemp = $folder->getFolderByCode($folderCode);
		  
		  
	  }*/
}

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
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Step 2: Add Coins to <?php echo $folderName ?></h1>
<table border="1" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
 function checkCoin($coinID, $accountID, $collectfolderID){
	$pageQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND accountID = '$accountID'  AND collectfolderID = '$collectfolderID'");
	$coinCount = mysql_num_rows($pageQuery);
	while ($show = mysql_fetch_array($pageQuery))
{
	$coinType = str_replace(' ', '_', $show['coinType']);
}
	if($coinCount == 0){
		$image = "../img/blank.jpg";
	} else {
		//$image = $pennyImg.'placeholder.jpg';
		$image = '../img/'.$coinType.'.jpg';
	}
	 return $image;
 }
$c = 0; // Our counter
$n = 9; // Each Nth iteration would be a new table row
$countAll = mysql_query("SELECT * FROM coins WHERE ".$folderCode." = '1'") or die(mysql_error());
$coinCount = mysql_num_rows($countAll);
while ($show = mysql_fetch_array($countAll))
{
		$coinName = strip_tags($show['coinName']);
	$coinID = intval($show['coinID']);
	
	$coinType = strip_tags($show['coinType']);
	$coinLink = str_replace(' ', '_', $coinType);
	//checkCoin($coinID, $accountID, $collectfolderID);
	/*$pennyImg = str_replace(' ', '_', $show['coinType']);
	if($show['collection'] == 0){
		$image = "blank.jpg";
	} else {
		//$image = $pennyImg.'placeholder.jpg';
		$image = $pennyImg.'.jpg';
	}*/
	
  if($c % $n == 0 && $c != 0) // If $c is divisible by $n...
  {
    // New table row
    echo '</tr><tr class="dateHolder" valign="top">';
  }
  $c++;
  ?>
  <td width="11%">
  <span class="collection" id="collection<?php echo $show['coinID']; ?>"><?php echo $show['collection']; ?></span>
<a href="viewCoin.php?coinID=<?php echo $show['coinID'] ?>"><img id="coinImg<?php echo $show['coinID']; ?>" class="coinSwitch" src="../img/<?php echo checkCoin($coinID,$accountID, $collectfolderID); ?>" alt="" width="100" height="100" /></a><br />
  <a href='viewCoin.php?coinID=<?php echo $show['coinID']; ?>'><?php echo $show['coinName']; ?></a><br />
  <div class="collectLinks2"><a id="collectionHave<?php echo $show['coinID']; ?>" href="../inc/addFolderCollectionCoin.php?coinID=<?php echo $show['coinID']; ?>&amp;$collectfolderID=<?php echo $collectfolderID ?>" class="collectLink<?php echo $show['coinID']; ?>" style="color:#B87333; text-decoration:none;">Enter</a></div>

 <script type="text/javascript">
$(document).ready(function(){	
var coinImg = $('#coinImg<?php echo $show['coinID']; ?>');
function switchPic() {
	 if (coinImg.attr("src","../img/blank.jpg")) {
        coinImg.attr("src","../img/<?php echo $coinLink; ?>.jpg");
       } 
	 else if (coinImg.attr("src","../img/<?php echo $coinLink; ?>.jpg")) {
		coinImg.attr("src","../img/blank.jpg");
      }
}

$("#collectionHave<?php echo $show['coinID']; ?>").click(function(event) {
        event.preventDefault();
		//var dataString = "";
		$.ajax({url:"../inc/addFolderCollectionCoin.php?coinID=<?php echo $show['coinID']; ?>&collectfolderID=<?php echo $collectfolderID ?>", 
		success:function(result){
		$("#collectionHave<?php echo $show['coinID']; ?>").html(result);
		
		$('#coinImg<?php echo $show['coinID']; ?>').attr("src","../img/<?php echo $coinLink; ?>.jpg");

		}});
		
        /*$.get(this.href,{},function(response){ 
	   $('#updateMsg').html(response)
	  $('#coinImg<?php //echo $show['coinID']; ?>').attr("src","../img/<?php //echo $coinLink; ?>.jpg");
	})*/
}); 


});
</script> 
</td>
  <?php
} ?>
</tr>

</table>
<h2><a href="viewFolderDetail.php?collectfolderID=<?php echo $collectfolderID ?>">Done</a></h2>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
