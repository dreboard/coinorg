<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['ID'])) { 
$containerID = $Encryption->decode($_GET['ID']);
$Container->getContainerById($containerID);

}
//////////ADD COIN
if (isset($_POST["theContainer"])) { 

$containerID = $Encryption->decode($_POST["theContainer"]);
$Container->getContainerById($containerID);
$containerName = mysql_real_escape_string($_POST["containerName"]);

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
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	

mysql_query("UPDATE containers SET containerName = '$containerName', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', coinNote = '$coinNote', purchasePrice = '$purchasePrice', shopName = '$shopName', shopUrl = '$shopUrl', showName = '$showName', showCity = '$showCity', auctionNumber = '$auctionNumber', ebaySellerID = '$ebaySellerID' WHERE containerID = '$containerID'  AND userID = '$userID' ") or die(mysql_error()); 

switch($Container->getContainerType()){
	case 'Slabbed Box':
	header("location: coinContainerSlab.php?ID=".$Encryption->encode($containerID)."");
	break;	
	case 'Roll Tray':
	header("location: coinContainerTray.php?ID=".$Encryption->encode($containerID)."");
	break;			
	case 'Roll Bin':
	header("location: coinContainerBin.php?ID=".$Encryption->encode($containerID)."");
	break;	
	case 'Mint Roll Box':
	header("location: coinContainerMint.php?ID=".$Encryption->encode($containerID)."");
	break;	
	case 'Set Box':
	header("location: coinContainerSet.php?ID=".$Encryption->encode($containerID)."");
	break;		
	case 'Other':
	header("location: coinContainerList.php?ID=".$Encryption->encode($containerID)."");
	break;			
}
exit();

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Create A Collection</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../style.css"/>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30620319-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<style type="text/css">
#coinHdr {margin:0px;}
.detailDiv3 {font-weight:normal!important;}
</style>
<script type="text/javascript">
$(document).ready(function(){	

$("#addCollectionForm").submit(function() {
      if($("#containerName").val() == "")  {
		$("#errorMsg").text("Name your container.");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#containerName").addClass("errorInput");
      return false;
      }else {
		  $("#addContainerBtn").prop('value', 'Adding....');
	  return true;
	  }
});

$("input[type=text]").click(function(){
	  $(this).removeClass("errorInput");
	  $("label[for='" + this.id + "']").removeClass("errorTxt");
	  $("#errorMsg").text("");
});

});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1>Edit Storage Container</h1>
 
<hr />


<div>

<form action="" method="post" enctype="multipart/form-data" name="addCollectionForm" id="addCollectionForm">
  <table width="979" border="0" class="addCoinTbl" cellpadding="3">

  <tr>
    <td colspan="5" class="darker"><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>&nbsp;</td>
    </tr>
  <tr>
    <td class="darker"><label for="containerName">Container Name</label></td>
    <td width="772" colspan="4"><input name="containerName" type="text" id="containerName" value="<?php echo $Container->getContainerName(); ?>" size="70" maxlength="70" /></td>
  </tr>
  <tr>
    <td width="189" class="darker">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
    </table>
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl" cellpadding="3">
  <tr>
    <td width="186"><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input name="purchaseDate" type="text" class="purchaseDate" id="purchaseDate" value="<?php echo $Container->getCoinDate(); ?>" /></td>
  </tr>
  <tr>
    <td><label for="purchasePrice">Purchase Price</label></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" value="<?php echo $Container->getCoinPrice(); ?>" /></td>
  </tr>  
  <tr>
    <td valign="top"><strong>Pruchase From</strong></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
      <option value="<?php echo $Container->getPurchaseFrom(); ?>" selected="selected"><?php echo $Container->getPurchaseFrom(); ?></option>      
      <option value="None">None</option>
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
            <td width="67%"><input name="auctionNumber" type="text" value="<?php echo $Container->getAuctionNumber(); ?>" /></td>
            </tr>
          <tr>
            <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
            <td><input name="ebaySellerID" type="text" value="<?php echo $Container->getEbaySellerID(); ?>" /></td>
            </tr>
          </table>
      </div>
      
      <div id="Shop" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="33%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="67%"><input name="shopName" type="text" value="<?php echo $Container->getShopName(); ?>" /></td>
            </tr>
          <tr>
            <td><label for="shopUrl">Website</label>
              &nbsp;</td>
            <td><input name="shopUrl" type="text" value="<?php echo $Container->getShopUrl(); ?>" /></td>
            </tr>
          </table>
      </div>
      <div id="Show" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="33%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="67%"><input name="showName" id="showName" type="text" value="<?php echo $Container->getShowName(); ?>" /></td>
            </tr>
          <tr>
            <td><label for="showCity">City</label>&nbsp;</td>
            <td><input name="showCity" type="text" value="<?php echo $Container->getShowCity(); ?>" /></td>
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
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="<?php echo $Container->getCoinPrice(); ?>" /></td>
  </tr>
    </table>
  <tr>
    <td class="darker">Description</td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php echo $Container->getCoinNote(); ?></textarea></td>
  </tr>
  <tr>
    <td class="darker">
    <input name="theContainer" type="hidden" value="<?php echo $_GET['ID']; ?>" />
    <input type="submit" name="addContainerBtn" id="addContainerBtn" value="Update Container" /></td>
    <td colspan="4">&nbsp;</td>
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
