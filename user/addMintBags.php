<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_POST["addMintBagFormBtn"])) { 
if($_POST['bagID'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Bag';
} else {
$bagID = mysql_real_escape_string($_POST["bagID"]);
$MintBag->getMintBagByID($bagID);
if($_POST['bagNickname'] == '') {
	$bagNickname = $MintBag->getBagName().$collectionBags->getBagCountByID($userID);
} else {
$bagNickname = mysql_real_escape_string($_POST["bagNickname"]);
}
$bagCondition = mysql_real_escape_string($_POST["bagCondition"]);

if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

if($_POST['purchasePrice'] == '') {
	$purchasePrice = '0.00';
} else {
	$purchasePrice = mysql_real_escape_string($_POST["purchasePrice"]);
}
$coinNote = $collection->setToNone($_POST["coinNote"]);
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$additional = $collection->setToNone($_POST["additional"]);	
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	
$bagType = 'Mint Bag';

mysql_query("INSERT INTO collectbags(bagID, userID, bagNickname, coinID, bagType, coinType, coinCategory, coinVersion, design, coinYear, purchaseFrom, purchaseDate, bagCondition, purchasePrice, coinNote, faceVal) VALUES('$bagID', '$userID', '$bagNickname', '".$MintBag->getCoinID()."', 'Mint Series', '".$MintBag->getCoinType()."', '".$MintBag->getCoinCategory()."', '".$MintBag->getCoinVersion()."','".$MintBag->getDesign()."', '".$MintBag->getCoinYear()."', '$purchaseFrom', '$purchaseDate', '$bagCondition', '$purchasePrice', '$coinNote', '".$MintBag->getFaceVal()."')") or die(mysql_error()); 

$collectbagID  = mysql_insert_id();



if(!empty($_FILES['coinPic1']['tmp_name'])){	
if($_FILES['coinPic1']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic1']['name']));
$Upload->SetTempName($_FILES['coinPic1']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . str_replace(' ', '_', $_FILES['coinPic1']['name']);
$fileQuery = mysql_query("UPDATE collectbags SET coinPic1 = '$coinPic1' WHERE collectbagID = '$collectbagID' AND userID = '$userID'")  or die(mysql_error()); 
}
}


header("location: viewBagDetail.php?ID=".$Encryption->encode($collectbagID)."");
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Mint Bag</title>

<style type="text/css">
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}
#coinTypes a {text-decoration:none;}

.bulkLinks {width:100px; height:auto;}
.rollHdr {margin:0px; padding:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".detailDiv2, #waitMsg").hide();

$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	

$("#bagID").click(function() {
	$("#bagNameLbl").removeClass("errorTxt");
	$("#bagID").removeClass("errorInput");
});


//ADD MINT BAG FORM
$("#addMintBagForm").submit(function() {
      if($("#bagID").val() == "")  {
		$("#bagNameLbl").addClass("errorTxt");
		$("#bagID").addClass("errorInput");
      return false;
      } else {
		  $("#addMintBagFormBtn").prop('value', 'Saving Bag...');
	  return true;
	  }
});

	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1><span class="darker"><img id="newBag" src="../img/newBag.jpg" align="absmiddle" /></span> Add Mint Bag</h1>
<p class="clear"><a href="addBulk.php" class="brownLinkBold">Back to Bulk</a></p>
<div id="CoinList">
<p class="darker">Recently added Mint Bags In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="11%">Date</td>
    <td width="55%">Coin</td>
    <td width="13%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectbags WHERE bagType = 'Mint Bag' AND userID = '$userID' ORDER BY collectbagID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any Mint Bags in Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $bagID = intval($row['bagID']); 
$MintBag->getMintBagByID($bagID);  
$collectbagID = intval($row['collectbagID']); 
  $purchaseDate = date("F j, Y",strtotime($row["purchaseDate"]));
  $purchasePrice = floatval($row['purchasePrice']);  

  echo '
<tr>
<td>'.$purchaseDate.'</td> 
<td><a href="bagDetail.php?ID='.$Encryption->encode($_GET['collectbagID']).'">'.$MintBag->getBagName().'</a></td>
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
  </tr>
</table>

</div>
<hr />

<span class="errorTxt" id="errorMsg"><?php echo $_SESSION['errorMsg']; ?></span>
<br />

<div>
<form action="" method="post" enctype="multipart/form-data" name="addMintBagForm" id="addMintBagForm">
    <h2><img src="../img/bagIcon2.jpg" width="32" height="25" align="absmiddle" /> Bag Details</h2> 
<table width="988" border="0" class="addCoinTbl" id="addMintBagTbl">
      <tr>
        <td class="darker" id="bagNameLbl2"><label for="bagNickname">Bag Nickname</label></td>
        <td><input name="bagNickname" type="text" id="bagNickname" size="64" /></td>
      </tr>
      <tr>
    <td width="199" class="darker" id="bagNameLbl"><label for="bagID">Bag Type</label></td>
    <td width="779"><select name="bagID" id="bagID">
      <option value="" selected="selected">Select A Mint Bag</option>
      <?php    
$query = mysql_query("SELECT * FROM bags") or die(mysql_error());
   while($row = mysql_fetch_array($query))
  {
  $bagID = intval($row['bagID']);
  $bagName = strip_tags($row['bagName']);
	 echo '<option value="'.$bagID.'"> '.$bagName.'</option> ';	
  }

 ?>
    </select></td>
  </tr>
  <tr>
    <td class="darker" id="rollNameLbl"><label for="bagCondition">Condition</label></td>
    <td><select name="bagCondition" id="bagCondition">
      <option value="Sealed Box">Sealed Box</option>
      <option value="Sealed Bag">Sealed Bag</option>
      <option value="Open Bag">Open Bag</option>
    </select></td>
  </tr>
  </table>
    <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="202" class="darker"><label for="purchaseDate">Purchase Date</label></td>
    <td width="767"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td class="darker"><label for="purchaseFrom">Obtained From</label></td>
    <td><select name="purchaseFrom" id="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Mint">Mint</option>
      <option value="Coin Shop">Coin Shop</option>
      <option value="Coin Show">Coin Show</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="5" valign="top">
      <div id="eBay" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="35%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="65%"><input name="auctionNumber" type="text" value="<?php if(isset($_POST["auctionNumber"])){echo $_POST["auctionNumber"];} else {echo "";}?>" /></td>
            </tr>
          <tr>
            <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
            <td><input name="ebaySellerID" type="text" value="<?php if(isset($_POST["ebaySellerID"])){echo $_POST["ebaySellerID"];} else {echo "";}?>" /></td>
            </tr>
          </table>
      </div>
      
      <div id="Shop" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="35%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="65%"><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
            </tr>
          <tr>
            <td><label for="shopUrl">Website</label>
              &nbsp;</td>
            <td><input name="shopUrl" type="text" value="<?php if(isset($_POST["shopUrl"])){echo $_POST["shopUrl"];} else {echo "";}?>" /></td>
            </tr>
          </table>
      </div>
      <div id="Show" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="35%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="65%"><input name="showName" id="showName" type="text" value="<?php if(isset($_POST["showName"])){echo $_POST["showName"];} else {echo "";}?>" /></td>
            </tr>
          <tr>
            <td><label for="showCity">City</label>&nbsp;</td>
            <td><input name="showCity" type="text" value="<?php if(isset($_POST["showCity"])){echo $_POST["showCity"];} else {echo "";}?>" /></td>
            </tr>
          </table>
      </div> 
      <div id="Mint" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td><label for="mintBox">Presentation Box</label></td>
            <td><select name="mintBox" id="mintBox">
              <?php if(isset($_POST["mintBox"])){echo '<option value="'.$_POST["mintBox"].'" selected="selected">'.$_POST["mintBox"].'</option>';} else {
		echo '<option value="Yes" selected="selected">Yes</option>';}?>  
              <option value="No">No</option>
              </select></td>
            </tr>
          <tr>
            <td width="35%"> <label for="additional">Details</label>&nbsp;</td>
            <td width="65%">&nbsp;</td>
            </tr>
          <tr>
            <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"><?php if(isset($_POST["additional"])){echo $_POST["additional"];} else {echo "";}?></textarea></td>
            </tr>
          </table>
      </div> 
      <div id="None" class="detailDiv2">
        
      </div>    </td>
    </tr>
  <tr>
    <td class="darker"><label for="purchasePrice">Purchase Price</label></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
      </table>
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">  
  <tr>
    <td width="203" class="darker"><label for="coinNote">Additional</label></td>
    <td width="766"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td class="darker"><label for="coinPic1">Image</label></td>
    <td><input type="file" name="coinPic1" id="coinPic1" /></td>
  </tr>
  <tr>
    <td><input type="hidden" name="bagCoinCategory" id="bagCoinCategory" />
      <input type="submit" name="addMintBagFormBtn" id="addMintBagFormBtn" value="Add Mint Bag" /></td>
    <td>&nbsp;</td>
  </tr>
</table>



</form>
</div>

 <div class="spacer"></div>
 <p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
