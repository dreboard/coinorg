<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 


//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['folderID'] == '') {
	$_SESSION['message'] = 'Please Select A Folder';
} else {
	
$folderID = mysql_real_escape_string($_POST["folderID"]);
$folderNickname = mysql_real_escape_string($_POST["folderNickname"]);
$folderCondition = mysql_real_escape_string($_POST["folderCondition"]);

$folder->getFolderByID($folderID);
$coinCategory = $folder->getCoinCategory();
$coinType = $folder->getCoinType();

if($_POST['purchasePrice'] == '') {
	$purchasePrice = '0.00';
} else {
	$purchasePrice = mysql_real_escape_string($_POST["purchasePrice"]);
}
if($_POST['coinNote'] == '') {
	$coinNote = 'None';
} else {
	$coinNote = mysql_real_escape_string($_POST["coinNote"]);
}

if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$additional = $collection->setToNone($_POST["additional"]);	
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	

mysql_query("INSERT INTO collectfolder(folderID, folderNickname, folderCondition, coinType, coinCategory, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, denomination) VALUES('$folderID', '$folderNickname', '$folderCondition', '$coinType', '$coinCategory', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '".$folder->getDenomination()."')") or die(mysql_error()); 

$collectfolderID = mysql_insert_id();

//Create collection folder
if ( !file_exists($userID.'/folder/'.$collectfolderID) ) {
    mkdir($userID.'/folder/'.$collectfolderID, 0755, true);
}

if($_POST['addCoins'] == '1'){		
$collectionFolder->getNewFolderCoins($collectfolderID, $folderID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $purchaseDate, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity);
}

if(!empty($_FILES['coinPic1']['tmp_name'])){	
if($_FILES['coinPic1']['size'] > $max_filesize){
	$_SESSION['message'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['coinPic1']['name']));
$Upload->SetTempName($_FILES['coinPic1']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID.'/folder/'.$collectfolderID."/" . str_replace(' ', '_', $_FILES['coinPic1']['name']);
$fileQuery = mysql_query("UPDATE collectfolder SET coinPic1 = '$coinPic1' WHERE collectfolderID = '$collectfolderID'")  or die(mysql_error()); 
$_SESSION['message'] = 'Image Saved';
}
}

header("location: viewFolderDetail.php?ID=".$Encryption->encode($collectfolderID)."");
}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add A Blank Folder</title>

<?php include("../secureScripts.php"); ?>
<script type="text/javascript">
$(document).ready(function(){	

$("#addFolderForm").submit(function() {
      if($("#folderID").val() == "")  {
		$("#errorMsg").text("Select A Folder.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#folderID").addClass("errorInput");
		$('label[for='+this.id+']').addClass('errorTxt');
      return false;
      } else if($("#folderNickname").val() == "")  {
		$("#errorMsg").text("Name Your Folder.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#folderNickname").addClass("errorInput");
		$('label[for='+this.id+']').addClass('errorTxt');
      return false;
      }else {
		  $("#addCoinFormBtn").prop('value', 'Saving Folder...');
	  return true;
	  }
});

$("input[type=text], select, textarea").click(function(){
	  $(this).removeClass("errorInput");
	  $("#errorMsg").empty();
	  $("label[for='" + this.id + "']").removeClass("errorTxt");
	  $("#endErrorMsg").text("");
});

$(".detailDiv2, #waitMsg").hide();
$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	
	
});
</script>  

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
   
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1>Add  Folder/Album</h1>
<div id="CoinList">
<p><strong>Recently Added  Folders/Albums In Your Collection</strong></p>

<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Collected</td>
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Coins</td>
  </tr>
</thead>
  <tbody>

<?php
$sql = mysql_query("SELECT * FROM collectfolder WHERE userID = '$userID' ORDER BY collectfolderID DESC LIMIT 5") or die(mysql_error());
if(mysql_num_rows($sql)== 0){
	echo    ' <tr align="center">
    <td align="left"><strong><a href="addFolderBlank.php">No Folders Saved, Add</a></strong></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>';
} else {
  while($row = mysql_fetch_array($sql))
	  {
  //$collectsetID = $Encryption->encode($row['collectsetID']);
  $folderID = intval($row['folderID']);
  $collectfolderID = intval($row['collectfolderID']);
  $collectionFolder->getCollectionFolderById($collectfolderID);   
  echo '
    <tr align="center">
    <td align="left"><a href="viewFolderDetail.php?ID='.$Encryption->encode($collectfolderID).'">'.$collectionFolder->getFolderNickname().'</a></td>
		<td>'.date("F j, Y",strtotime($collectionFolder->getCoinDate())) .'</td>
	<td>'. $collectionFolder->folderCoinsCount($collectfolderID, $userID) .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="57%">Collected</td>
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Coins</td>
  </tr>
	</tfoot>
</table>
<hr />

</div>

<a name="forms"></a>
<div id="addCoinDiv">
  <form action="" method="post" enctype="multipart/form-data" name="addFolderForm" id="addFolderForm">
    <h2><img src="../img/folderIcon.jpg" width="21" height="20" /> Folder Details</h2>
<table width="979" border="0" class="priceListTbl2" cellpadding="3">

 
  <tr>
    <td colspan="5" class="darker"><span class="errorTxt" id="errorMsg"><?php echo $_SESSION['message']; ?></span>&nbsp;</td>
    </tr>
  <tr>
    <td class="darker"><label for="folderID">Folder/Album</label></td>
    <td colspan="4"><select id="folderID" name="folderID">
      <option value="" selected="selected">Select</option>
      <optgroup label="Folders">
        <?php 
$result = mysql_query("SELECT * FROM folders WHERE folderType = 'folder' AND  folderCompany = 'Whitman' ORDER BY denomination ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$folderID = strip_tags($row['folderID']);
	$folder->getFolderByID($folderID);
echo '
<option value="'.$folderID.'">'.$folder->getFolderName().' '.ucwords($folder->getFolderType()).'</option>
';
}
?>
        </optgroup>
        <optgroup label="Albums">
        <?php 
$result = mysql_query("SELECT * FROM folders WHERE folderType = 'album' AND  folderCompany = 'Whitman'  ORDER BY denomination ASC ") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$folderID = strip_tags($row['folderID']);
	$folder->getFolderByID($folderID);
echo '
<option value="'.$folderID.'">'.$folder->getFolderName().' '.ucwords($folder->getFolderType()).'</option>
';
}
?>
        </optgroup>      
    </select></td>
  </tr>
  <tr>
    <td class="darker"><label for="folderNickname"> Nickname</label></td>
    <td colspan="4"><input name="folderNickname" type="text" id="folderNickname" size="41" maxlength="100" value="" /> 
      (Additional way to identify folder) </td>
  </tr>
  <tr>
    <td class="darker"><label for="folderCondition">Condition</label></td>
    <td colspan="4"><select name="folderCondition" id="folderCondition">
    <option value="New" selected="selected">New</option>
    <option value="Used">Used</option>      
    </select></td>
  </tr>
  <tr>
    <td class="darker">Add All Coins</td>
    <td colspan="4"><select name="addCoins" id="addCoins">
      <option value="0" selected="selected">No, Folder Only</option>
      <option value="1">Yes, Folder and All Coins</option>
    </select> 
      (All new coins will be added to collection)</td>
  </tr>
  </table>
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="182"><label for="purchaseDate">Purchase Date</label></td>
    <td width="787" colspan="2"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="purchaseFrom">Obtained From</label></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Shop">Coin Show</option>
      <option value="Show">Coin Shop</option>
      <option value="Mint">U.S. Mint</option>
    </select></td>
    </tr>
  <tr>
    <td colspan="5" valign="top">
      <div id="eBay" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="32%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="68%"><input name="auctionNumber" type="text" value="<?php if(isset($_POST["auctionNumber"])){echo $_POST["auctionNumber"];} else {echo "";}?>" /></td>
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
            <td width="32%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="68%"><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
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
            <td width="32%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="68%"><input name="showName" id="showName" type="text" value="<?php if(isset($_POST["showName"])){echo $_POST["showName"];} else {echo "";}?>" /></td>
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
            <td width="32%"> <label for="additional">Details</label>&nbsp;</td>
            <td width="68%">&nbsp;</td>
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
    <td><label for="purchasePrice">Purchase Price</label></td>
    <td colspan="2"><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /></td>
  </tr>
  </table>
  
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">      
  <tr>
    <td><label for="file">Image</label></td>
    <td colspan="4">
      <input type="file" name="coinPic1" id="file" /> Use Stock Image: <input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><label for="coinNote">Notes</label></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="bottom"><input name="folderIDHolder" type="hidden" id="folderIDHolder" value="" />      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Folder" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span></td>
  </tr>
</table>
</form>
</div>
<p>&nbsp; </p>



</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
