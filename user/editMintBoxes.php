<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";



$errorMsg = ""; 
if (isset($_GET["toUpdate"])) { 
$collectboxID = $Encryption->decode($_GET["toUpdate"]);
$CollectionBoxes->getCollectionBoxById($collectboxID);
$MintBox->getMintBoxByID($CollectionBoxes->getBoxMintID());

}


if (isset($_POST["addCoinFormBtn"])) { 
$collectboxID = $Encryption->decode($_POST["toUpdate"]);

$boxNickname = mysql_real_escape_string($_POST["boxNickname"]);
$boxMintID = mysql_real_escape_string($_POST["boxMintID"]);
$MintBox->getMintBoxByID($boxMintID);
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$boxCondition = mysql_real_escape_string($_POST["boxCondition"]);

if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

if($_POST['purchasePrice'] == '') {
	$purchasePrice = $MintBox->getFaceVal();
} else {
	$purchasePrice = mysql_real_escape_string($_POST["purchasePrice"]);
}
if($_POST['boxNickname'] == '') {
	$boxNickname = 'MintBox'.$MintBox->getNewBoxName($coinID);
} else {
	$boxNickname = mysql_real_escape_string($_POST["boxNickname"]);
}
if($_POST['coinNote'] == '') {
	$coinNote = 'None';
} else {
	$coinNote = mysql_real_escape_string($_POST["coinNote"]);
}
$boxType = 'Mint Box';

mysql_query("UPDATE collectboxes SET boxNickname = '$boxNickname', boxMintID = '$boxMintID', coinID= '".$MintBox->getCoinID()."', boxType = '".$MintBox->getCoinType()."', coinType = '".$MintBox->getCoinType()."', coinCategory = '".$MintBox->getCoinCategory()."', coinYear = '".$MintBox->getCoinYear()."', purchaseFrom = '$purchaseFrom', purchaseDate = '$purchaseDate', boxCondition = '$boxCondition', purchasePrice = '$purchasePrice', coinNote = '$coinNote' WHERE collectboxID = '$collectboxID'") or die(mysql_error()); 

$theBox  = $Encryption->encode($collectboxID);

//////////add file
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName($_FILES['file']['name']);
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . $_FILES['file']['name'];
$fileQuery = mysql_query("UPDATE collection SET  coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID'")  or die(mysql_error()); 
}
header("location: viewMinBoxDetail.php?collectboxID=$theBox");
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Mint Coin Box</title>

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){	


$("#addCoinForm").submit(function() {
      if($("#boxMintID").val() == "")  {
		 $("#boxMintID").addClass("errorInput");
		$("#errorMsg").text("Select a box type.");
		$("#boxMintIDLbl").addClass("errorTxt");
      return false;
      } else {
	  return true;
	  }
});

$("#boxMintID").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text("");
});	

	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1>Add Mint Roll Box</h1>
<div id="CoinList">
<p class="darker">Recently added Mint Boxes In Your Collection</p>


</div>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>

<div class="roundedWhite">
<form id="addTypeBoxForm" method="post" action="" name="addTypeBoxForm">

<table width="857" border="0" class="priceListTbl">
  <tr>
    <td class="darker" id="boxMintIDLbl2">Box Nickname</td>
    <td><input name="boxNickname" type="text" id="boxNickname" size="64" value="<?php echo $CollectionBoxes->getBoxNickname() ?>" /></td>
  </tr>
  <tr>
    <td width="208" class="darker" id="boxMintIDLbl">Box Type</td>
    <td width="459">
    <select name="boxMintID" id="boxMintID">
    <option value="<?php echo $CollectionBoxes->getBoxMintID() ?>" selected="selected"><?php echo $MintBox->getBoxName() ?></option>
<?php    
$query = mysql_query("SELECT * FROM boxmint") or die(mysql_error());
   while($row = mysql_fetch_array($query))
  {
  $boxMintID = intval($row['boxMintID']);
  $boxName = strip_tags($row['boxName']);
	 echo '<option value="'.$boxMintID.'"> '.$boxName.'</option> ';	
  }

 ?>
</select>
    </td>
  </tr>
  
  <tr>
    <td><label for="boxCondition" class="darker">Condition</label></td>
    <td>
      <select name="boxCondition" id="boxCondition">
      <option selected="selected" value="<?php echo $CollectionBoxes->getBoxCondition() ?>"><?php echo $CollectionBoxes->getBoxCondition() ?></option>
     <option value="Sealed">Sealed</option>
    <option value="Opened">Opened</option>
      </select></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td><input type="text" name="purchaseDate" id="purchaseDate" value="<?php echo $CollectionBoxes->getCoinDate() ?>" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From</span></td>
    <td>
    <select name="purchaseFrom" id="purchaseFrom">
    <option selected="selected" value="<?php echo $CollectionBoxes->getPurchaseFrom() ?>"><?php echo $CollectionBoxes->getPurchaseFrom() ?></option>
    <option value="None">None</option>  
     <option value="eBay">eBay</option>
    <option value="Mint">Mint</option>    
     <option value="Coin Shop">Coin Shop</option>
    <option value="Coin Show">Coin Show</option>
    
      </select></td>
  </tr>
  <tr>
    
    <td><span class="darker">Purchase Price</span></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="<?php echo $CollectionBoxes->getCoinPrice() ?>" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><span class="darker">Additional</span></td>
    <td><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""> <?php echo $CollectionBoxes->getCoinNote() ?></textarea></td>
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td colspan="4"><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>
  <tr>
    <td valign="bottom"><input type="hidden" name="toUpdate" id="toUpdate" value="<?php echo $Encryption->encode($collectboxID) ?>" />      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Update Mint Box" /></td>
    <td>&nbsp;</td>
  </tr>
</table>



</form>
</div>

 <p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
