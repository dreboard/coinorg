<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["coinCategory"])) { 
$coinSubCategory = strip_tags($_GET["coinCategory"]);
$coinTypeSearch = str_replace('_',' ',  $coinSubCategory);
}

/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['coinType'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Coin Type';
} else {
$coinType = mysql_real_escape_string($_POST["coinType"]);
$CoinTypes->getCoinByType($coinType);

$coinYear = intval($_POST["coinYear"]);
$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$rollHolder = mysql_real_escape_string($_POST["rollHolder"]);
$mintMark = mysql_real_escape_string($_POST["mintMark"]);

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




$updateThis = mysql_query("UPDATE collectrolls SET rollNickname = '$rollNickname', endYear = '".mysql_real_escape_string($_POST["endYear"])."', startYear = '".mysql_real_escape_string($_POST["startYear"])."', rollHolder = '$rollHolder', rollCondition = '$rollCondition', proService = '$proService', proSerialNumber = '$proSerialNumber', slabLabel = '$slabLabel', slabCondition = '$slabCondition', designation = '$designation', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', showName = '$showName', showCity = '$showCity' WHERE collectrollsID = '$collectrollsID' AND userID = '$userID' ") or die(mysql_error()); 


mysql_query("INSERT INTO collectrolls(rollNickname, rollType, coinType, coinYear, coinCategory, rollHolder, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, coinGrade, enterDate, userID, mintMark, rollCount, denomination) VALUES ('$rollNickname', 'Same Year', '$coinType', '$coinYear', '".$CoinTypes->getCoinCategory()."', '$rollHolder', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$coinGrade', '$theDate', '$userID', '$mintMark', '".$CoinTypes->getRollCount()."', '".$CoinTypes->getDenomination()."')") or die(mysql_error()); 

$collectrollsID = mysql_insert_id();
//////////add file
if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
}
}
header("location: viewYearRollDetail.php?ID=".$Encryption->encode($collectrollsID)."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Same Year Different Mintmark Roll</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".detailDiv2, #waitMsg").hide();

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
      }else if ($("#coinType").val() == "") {
        $("#errorMsg").text("Please select a coin type...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#coinType").addClass("errorInput");
        return false;
      }else if ($("#coinYear").val() == "") {
        $("#errorMsg").text("Please select a year...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#coinYear").addClass("errorInput");
        return false;
      } else {
		$("#addCoinFormBtn").prop('value', 'Saving Roll...');  
	  return true;
	  }
});



$("#rollNickname, #coinCategory, #coinYear").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text('');
	$("#endErrorMsg").text('');
});	

$("#coinType").change(function () {
    $('#waitMsg').show();
    var dataString = $(this).val();
    $.ajax({
        url: "_coinYears.php?coinType=" + dataString,
        success: function (result) {
            $('#waitMsg').hide();
            $("#coinYear").html(result);
        }
    });
});


});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/Mixed_Cents.jpg" width="80" height="80" align="absmiddle" /> Edit Same Year  Roll</h1>

<table width="100%" border="0">
  <tr>
    <td><a href="addRollType.php" class="brownLink">Back to roll types</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

 <div id="CoinList">
<p class="darker">Recently added Same Year Rolls In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="70%">Type</td>
    <td width="16%">Investment</td>
    <td width="14%">Date</td>
  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectrolls WHERE rollType = 'Same Year' AND userID = '$userID' ORDER BY collectrollsID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any same coin rolls In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinCategory = $row['coinCategory'];
  $collectrollsID = intval($row['collectrollsID']); 
  $collectionRolls->getCollectionRollById($collectrollsID);

  echo '
<tr>
<td><a href="viewRollDetail.php?ID='.$Encryption->encode($collectrollsID).'">'.$collectionRolls->getRollNickname().'</a></td>
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
  <h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Roll Details</h2>
  <table width="979" border="0" class="addCoinTbl" cellpadding="2">

  <tr>
    <td colspan="5" class="darker">
<span class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';;
}
 ?></span>    
    </td>
    </tr>
  <tr>
    <td class="darker">Roll Nickname</td>
    <td colspan="4"><input name="rollNickname" type="text" id="rollNickname" size="80" value="<?php echo $collectionRolls->getRollNickname(); ?>" /></td>
  </tr>
  <tr>
    <td width="172" class="darker">Coin Type</td>
    <td colspan="4"><select name="coinType" id="coinType">
         <option selected="selected" value="<?php echo $collectionRolls->getCoinType(); ?>"><?php echo $collectionRolls->getCoinType(); ?></option>
      <?php    
$query = mysql_query("SELECT DISTINCT coinType FROM coins WHERE coinCategory = '$coinTypeSearch'") or die(mysql_error());
   while($row = mysql_fetch_array($query))
  {
  $coinType = $row['coinType'];
	 echo '<option value="'.$coinType.'"> '.$coinType.'</option> ';	
  }

 ?>
    </select></td>
  </tr>
<tr>
    <td class="darker">Year</td>
    <td colspan="3"><select name="coinYear" id="coinYear">
      <option value="" selected="selected">Current Year--><?php echo $collectionRolls->getCoinYear() ?></option>
    </select></td>
    <td width="643"><span id="waitMsg">Generating Years.....</span></td>
  </tr>
  <tr>
    <td class="darker">Mint Marks</td>
    <td colspan="4"><select name="mintMark" id="mintMark">
      <option value="<?php echo $collectionRolls->getMintMark(); ?> " selected="selected"><?php echo $collectionRolls->getMintMark(); ?></option>
      <option value="Unknown">Unknown</option>
      <option value="P&amp;D">P &amp; D</option>
      <option value="PDS">PDS</option>
      <option value="D">D</option>
      <option value="S">S</option>
      <option value="P">P</option>
      <option value="O">O</option>
      <option value="CC">CC</option>
      <option value="W">W</option>
      <option value="O&amp;CC">O &amp; CC</option>
    </select></td>
  </tr>
  <tr>
    <td width="172" class="darker"><label for="rollHolder">Holder</label></td>
    <td colspan="4"><select name="rollHolder" id="rollHolder">
      <option value="<?php echo $collectionRolls->getRollHolder(); ?>" selected="selected"><?php echo $collectionRolls->getRollHolder(); ?></option>
      <option value="Paper">Paper</option>
      <option value="Tube">Tube</option>
      <option value="Plastic">Plastic</option>
    </select></td>
  </tr>
    </table>
<h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Grade Details</h2>  
  <table width="979" border="0" class="addCoinTbl">
  
  
    
  <tr>
    <td width="185" class="darker">Grades</td>
    <td width="784" colspan="4"><strong>
      <select name="coinGrade" id="coinGrade">
        <option value="<?php echo $collectionRolls->getCoinGrade(); ?>" selected="selected"><?php echo $collectionRolls->getCoinGrade(); ?></option>
        <option value="No Grade">No Grade </option>
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
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="190"><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input name="purchaseDate" type="text" class="purchaseDate" id="purchaseDate" value="<?php echo $collectionRolls->getCoinDate(); ?>" /></td>
  </tr>  
  <tr>
    <td valign="top"><strong>Pruchase From</strong></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
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
    <td colspan="5" valign="top">
      <div id="eBay" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="33%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="67%"><input name="auctionNumber" type="text" value="<?php echo $collectionRolls->getAuctionNumber(); ?>" /></td>
            </tr>
          <tr>
            <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
            <td><input name="ebaySellerID" type="text" value="<?php echo $collectionRolls->getEbaySellerID(); ?>" /></td>
            </tr>
          </table>
      </div>
      
      <div id="Shop" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="33%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="67%"><input name="shopName" type="text" value="<?php echo $collectionRolls->getShopName(); ?>" /></td>
            </tr>
          <tr>
            <td><label for="shopUrl">Website</label>
              &nbsp;</td>
            <td><input name="shopUrl" type="text" value="<?php echo $collectionRolls->getShopUrl(); ?>" /></td>
            </tr>
          </table>
      </div>
      <div id="Show" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="33%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="67%"><input name="showName" id="showName" type="text" value="<?php echo $collectionRolls->getShowName(); ?>" /></td>
            </tr>
          <tr>
            <td><label for="showCity">City</label>&nbsp;</td>
            <td><input name="showCity" type="text" value="<?php echo $collectionRolls->getShowCity(); ?>" /></td>
            </tr>
          </table>
      </div> 
      
      <div id="None" class="detailDiv2">
        
      </div>    </td>
    </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="<?php echo $collectionRolls->getCoinPrice(); ?>" /></td>
  </tr>
    </table>
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
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php echo $collectionRolls->getCoinNote(); ?></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">  
    <input name="ID" type="hidden" value="<?php echo $_GET["ID"] ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Save Changes" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
