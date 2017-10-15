<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["coinType"])) { 
$rawCoinType = strip_tags($_GET["coinType"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
$coinQuery = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinID = $row['coinID'];
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinSubCategory = $row['coinSubCategory'];
  }
  
}

//////////ADD COIN
if (isset($_POST["sellCoinBtn"])) { 
$collectionID = mysql_real_escape_string($_POST["collectionID"]);
$collection->getCollectionById($collectionID);

$coin->getCoinById($collection->getCoinID());
$coinType = $coin->getCoinType();
$coinGrade = $collection->getCoinGrade();
$coinCategory = $coin->getCoinCategory();
$proService = $collection->getGrader();
$listPrice = mysql_real_escape_string($_POST["listPrice"]);
$listDate = date('Y-m-d');
$removeDate = date('Y-m-d', strtotime('+10 days'));

if($_POST['sellDetails'] == '') {
	$sellDetails = 'None';
} else {
	$sellDetails = mysql_real_escape_string($_POST["sellDetails"]);
}
if($_POST['shipPrice'] == '') {
	$shipPrice = '0.00';
} else {
	$shipPrice = mysql_real_escape_string($_POST["shipPrice"]);
}


mysql_query("INSERT INTO selllist(collectionID, coinID, seller, coinType, coinCategory, coinGrade, proService, listPrice, listDate, shipPrice, removeDate, sellDetails) VALUES('$collectionID', '$coinID', '$userID', '$coinType', '$coinCategory', '$coinGrade', '$proService', '$listPrice', '$listDate', '$shipPrice', '$removeDate', '$sellDetails')") or die(mysql_error()); 
$sellListID = mysql_insert_id();

//////////add file
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName($_FILES['file']['name']);
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory("auctions/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . $_FILES['file']['name'];
$fileQuery = mysql_query("UPDATE selllist SET coinPic1 = '$coinPic1' WHERE sellListID = '$sellListID'") or die(mysql_error()); 
}

header("location: viewAuctionDetail.php?sellListID=$sellListID");

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<style type="text/css">
.hdrImg {width:30px; height:30px;}
#sellDetails {width:99%;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$('#progress').hide();

$("#addCoinForm").submit(function() {
      if($("#coinID").val() == "")  {
		$("#errorMsg").text("Select a Coin.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#coinID").addClass("errorTxt");
      return false;
      } else {
	  return true;
	  }
});


$("#collectionID").change(function() {
	$('#progress').show();
	$("#coinDetails").html('<span class="brownLink">Getting Coin Info</span>');
var dataString = $(this).val();
$.ajax({
	url:"../inc/getCollectionDetail.php?collectionID="+dataString, 
	type: "GET", 
success:function(result){
	$('#progress').hide();
$("#coinDetails").html(result);
     
}});

});	

	
});
</script>  
   
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1><img src="../img/<?php echo $rawCoinType ?>.jpg" align="left"  class="hdrImg" />Sell <?php echo $coinType ?></h1>
  <table width="100%" border="0">
    <tr>
    <td width="26%" valign="top"><h3><a href="sellCoin.php">Return to Coin Types</a></h3></td>
    <td width="74%" valign="top"><h3><a href="sellCoinTypeMulti.php?coinType=<?php echo $rawCoinType; ?>">Add Multiple <?php echo $coinType; ?> Coins</a></h3></td>
  </tr>

  </table>

<div id="CoinList" class="roundedWhite">
<p class="darker">Recently added <?php echo $coinType; ?> coins In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="11%">Date</td>
    <td width="55%">Coin</td>
    <td width="11%">Grade</td>   
        <td width="10%">Grader</td>  
    <td width="13%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND userID = '$userID' ORDER BY collectionID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="5">You dont have any '.$coinType.' in  coins In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinType = $row['coinType'];
  
  if($row['coinPic1'] == 'blankBig.jpg'){
	  $thumb = '<img src="../img/1.jpg" width="25" height="25" />';
  } else {
	  $thumb = '<img src="'.$userID.'/'.$row['coinPic1'].'" width="auto" height="25" />';
  }
  $coinID = intval($row['coinID']); 
  $collectionID = $row['collectionID']; 
  $purchaseDate = date("F j, Y",strtotime($row["purchaseDate"]));
  $coinGrade = $row['coinGrade']; 
  $purchasePrice = $row['purchasePrice'];  
  $collectedCoin = new Coin();
  $collectedCoin-> getCoinById($coinID);
  $collection-> getCollectionById($collectionID);
  $collectedCoinName = $collectedCoin->getCoinName();
  $coinPurchaseDate = date("M j, Y",strtotime($collection->getCoinDate()));
  $proService = $row['proService'];  
  $thePageCode = "Go to the view coin page to view this coin";
  //SEND ENCODED COLLECTIONID 
  echo '
<tr>
<td>'.$coinPurchaseDate.'</td> 
<td><a href="viewCoinDetail.php?collectionID='.$collectionID.'">'.$collectedCoinName.'</a></td>
<td>'.$coinGrade.'</td>
<td>'.$proService.'</td>
<td>'.$purchasePrice.'</td>
</tr>  
  ';
  }
}
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>

<div class="clear"></div>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<a name="forms"></a>
<div id="addCoinDiv">
  <h3>Enter Coin Details</h3>
  <form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
<table width="979" border="0">

  <tr>
    <td class="darker">Listing Title</td>
    <td colspan="4"><input name="sellTitle" type="text" id="sellTitle" size="120" /></td>
  </tr>
  <tr>
    <td width="178" class="darker"><strong>Select Coin</strong></td>
    <td colspan="4"><select id="collectionID" name="collectionID">
<option value="">Select Year</option>
<option value="Unknown">Unknown</option>
<?php 
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' ORDER BY coinID DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$coinID = $row['coinID'];
		$coin-> getCoinById($coinID);
		$collectionID = $row['collectionID'];
		$collection->getCollectionByID($collectionID);
		$coinType = $row['coinType'];

	echo '<option value="' . $collectionID . '">' . $coin->getCoinName() . ' ' .$collection->getCoinGrade().'</option>';

	}
?>
    </select>
      <img src="../img/progress.gif" width="200" height="30" align="top" id="progress" /></td>
  </tr>
  <tr>
    <td colspan="5">
    <div id="coinDetails">
    
    </div>
    </td>
  </tr>

  <tr>
    <td><span class="darker"><strong>List Price</strong></span></td>
    <td colspan="4"><input name="listPrice" type="text" id="listPrice" value="0.00" /></td>
  </tr>
  <tr>
    <td><span class="darker"><strong>Shipping Price</strong></span></td>
    <td colspan="4"><input name="shipPrice" type="text" id="shipPrice" value="0.00" /> 
    Default ($0.00 Free)</td>
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td colspan="4"><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>
  
  <tr>
    <td colspan="5"><strong>Item Description</strong></td>
    </tr>  
  <tr>
    <td colspan="5"><textarea name="sellDetails" id="sellDetails" class="wysiwyg" cols="" rows=""></textarea></td>
    </tr>
  <tr>
    <td valign="bottom">      <input type="submit" name="sellCoinBtn" id="sellCoinBtn" value="Sell Coin" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>


<p>&nbsp;</p>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
