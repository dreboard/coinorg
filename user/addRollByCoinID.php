<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["coinID"])) { 
$coin->getCoinById(intval($_GET["coinID"]));
$coinType = $coin->getCoinType();
$CoinTypes->getCoinByType($coinType);
$coinName = $coin->getCoinName();
}

/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['coinID'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Coin';
} else {

$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
$coinID = mysql_real_escape_string($_POST["coinID"]);
$coin->getCoinById($coinID);

$coinType = $coin->getCoinType();
$CoinTypes->getCoinByType($coinType);

$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$rollHolder = mysql_real_escape_string($_POST["rollHolder"]);

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

mysql_query("INSERT INTO collectrolls(rollNickname, coinID, coinVersion, rollType, coinType, coinCategory, rollHolder, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, coinGrade, enterDate, userID, coinYear, mintMark, faceVal) VALUES ('$rollNickname', '$coinID', '".$coin->getCoinVersion()."', 'Same Coin', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '$rollHolder', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$coinGrade', '$theDate', '$userID', '".$coin->getCoinYear()."', '".$coin->getMintMark()."', '".$CoinTypes->getRollVal()."')") or die(mysql_error()); 

$collectrollsID = mysql_insert_id();

//Create collection folder
if ( !file_exists($userID.'/rolls/'.$collectrollsID) ) {
    mkdir($userID.'/rolls/'.$collectrollsID, 0755, true);
}

if($_POST['addCoins'] == '1'){		
for ($i = 1; $i <= $CoinTypes->getRollCount(); $i++)
{ 
$collectionRolls->enterNewRollCoins($collectrollsID, $coinID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchasePrice, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity,  $purchaseDate);
}
}


//////////add file
if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID.'/rolls/'.$collectrollsID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID.'/rolls/'.$collectrollsID."/" . str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collectrolls SET coinPic1 = '$coinPic1' WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'")  or die(mysql_error()); 
}
}
header("location: viewSameRollDetail.php?ID=".$Encryption->encode($collectrollsID)."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add <?php echo $coinName ?> Roll</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".detailDiv2").hide();

$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	



$("#addCentForm").submit(function() {
      if($("#rollNickname").val() == "")  {
		$("#errorMsg").text("Name your roll.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#rollNickname").addClass("errorInput");
      return false;
      }else if ($("#coinID").val() == "") {
        $("#errorMsg").text("Please select a coin...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#coinID").addClass("errorInput");
        return false;
      } else {
		$("#addCoinFormBtn").prop('value', 'Saving Roll...');  
	  return true;
	  }
});

$("#rollNickname, #coinID").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text('');
	$("#endErrorMsg").text('');
});	

});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
 <h2><img src="../img/<?php echo str_replace(' ', '_', $coin->getCoinVersion()) ?>.jpg" width="80" height="80" align="absmiddle" /> Add Roll  <?php echo $coinName ?> <?php echo $coinType; ?></h2>
 <p><a href="addRollType.php" class="brownLinkBold">Back to roll types</a></p>
 <div id="CoinList">
<p class="darker">Recently added Same Coin Rolls In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="70%">Type</td>
    <td width="16%">Investment</td>
    <td width="14%">Date</td>
  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectrolls WHERE rollType = 'Same Coin' AND coinID = '".intval($_GET['coinID'])."' AND userID = '$userID' ORDER BY collectrollsID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any '.$coinName.' rolls In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinType = $row['coinType'];
  $collectrollsID = intval($row['collectrollsID']); 
  $collectionRolls->getCollectionRollById($collectrollsID);

  $coinID = intval($row['coinID']); 
  $coin->getCoinById($coinID);

  echo '
<tr>
<td>'.$collectionRolls->getRollTypeLink($collectrollsID).'</td>
<td>'.$collectionRolls->getCoinPrice().'</td>
<td>'.date("M j, Y",strtotime($collectionRolls->getCoinDate())).'</td>
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

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  
  <table width="100%" border="0">

  <tr>
    <td><h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Roll Details</h2></td>
    <td colspan="4" class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';;
}
 ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="darker">Roll Nickname</td>
    <td width="758" colspan="4"><input name="rollNickname" type="text" id="rollNickname" size="80" value="" /></td>
  </tr>  
  <tr>
    <td width="211" class="darker"><label for="rollHolder">Holder</label></td>
    <td width="758" colspan="4"><select name="rollHolder" id="rollHolder">
        <option value="Paper " selected="selected">Paper</option>
        <option value="Tube">Tube</option>  
        <option value="Plastic">Plastic</option>
        </select></td>
  </tr>
    <tr>
    <td class="darker">Add All Coins</td>
    <td><select name="addCoins" id="addCoins">
      <option value="0" selected="selected">No, Roll Only</option>
      <option value="1">Yes, Add All <?php echo $CoinTypes->getRollCount() ?> Coins</option>
    </select> 
      (All new coins will be added from collection)</td>
  </tr>
    </table>
<h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Grade Details</h2>  
  <table width="979" border="0" class="addCoinTbl">
  
  
    
  <tr>
    <td width="193" class="darker">Grades</td>
    <td width="776" colspan="4"><strong>
      <select name="coinGrade" id="coinGrade">
        <option value="No Grade" selected="selected">No Grade </option>
        <option value="Good to XF ">Good to XF</option>
        <option value="Good to AU" >Good to AU</option>
        <option value="Good to BU">Good to BU</option>
        <option value="F to XF ">Fine to Extra Fine</option>
        <option value="F to BU" >Fine to BU</option>
        <option value="XF to AU ">XF to AU</option>
        <option value="XF to BU" >XF to BU</option>
        <option value="Good to BU">Good to BU</option>
        <option value="AU" >About Uncirculated</option>
        <option value="BU">Brilliant Uncirculated</option>
      </select>
    </strong></td>
  </tr>

    </table>
 <hr />
 
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="3"><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="" /></td>
  </tr>
  <tr>
    <td width="195"><span class="darker">Purchase Date</span></td>
    <td colspan="3"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>  
  <tr>
    <td valign="top"><strong><span class="darker">Purchase</span> From</strong></td>
    <td><select id="purchaseFrom" name="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Shop">Coin Show</option>
      <option value="Show">Coin Shop</option>
      <option value="Mint">U.S. Mint</option>
    </select></td>
    <td width="241">&nbsp;</td>
    <td width="238">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="top">
      <div id="eBay" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="34%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="66%"><input name="auctionNumber" type="text" value="<?php if(isset($_POST["auctionNumber"])){echo $_POST["auctionNumber"];} else {echo "";}?>" /></td>
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
            <td width="34%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="66%"><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
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
            <td width="34%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="66%"><input name="showName" id="showName" type="text" value="<?php if(isset($_POST["showName"])){echo $_POST["showName"];} else {echo "";}?>" /></td>
            </tr>
          <tr>
            <td><label for="showCity">City</label>&nbsp;</td>
            <td><input name="showCity" type="text" value="<?php if(isset($_POST["showCity"])){echo $_POST["showCity"];} else {echo "";}?>" /></td>
            </tr>
          </table>
      </div> 
      
      <div id="None" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="47%">&nbsp; </td>
            <td width="53%">&nbsp;</td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          </table>
      </div>    </td>
    </tr>
    </table>
    <hr />
       <h2><img src="../img/storageMiniIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Storage/Collection</h2> 
  <table width="979" border="0" class="addCoinTbl">    
  <tr>
    <td width="167"><label for="coincollectID">Add To Collection</label></td>
    <td width="802"><label for="coincollectID"></label>
      <select name="coincollectID" id="coincollectID">	 
          <?php 
if(isset($_POST["coincollectID"])){echo '<option value="'.$_POST["coincollectID"].'" selected="selected">'.$_POST["coincollectID"].'</option>';
} else {
		echo  '<option value="0" selected="selected">No</option>'.
		$CoinCollect->getOpenList($userID);
 }?>
    </select></td>
  </tr>
  <tr>
    <td><label for="containerID">Add To Tray/Bin</label></td>
    <td><select name="containerID" id="containerID">	 
          <?php 
if(isset($_POST["coincollectID"])){echo '<option value="'.$_POST["coincollectID"].'" selected="selected">'.$_POST["coincollectID"].'</option>';
} else {
		echo  '<option value="0" selected="selected">No</option>'.
		$Container->getOpenOptions($userID, intval($_GET["coinID"]));
 }?>
    </select></td>
  </tr>  
  </table> 
<hr />

    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">  
  <tr>
    <td width="186"><strong>Image</strong></td>
    <td width="783" colspan="4"><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><span class="darker">Notes</span></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">  
    <input type="hidden" name="coinID" value="<?php echo intval($_GET["coinID"]); ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Mint Roll" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form><br />

<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
