<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 


//////////ADD COIN
if (isset($_POST["addContainerBtn"])) { 

if($_POST['containerTypeID'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Container';
} else {

$containerTypeID = mysql_real_escape_string($_POST["containerTypeID"]);
$ContainerType->getContainerTypeById($containerTypeID);
$containerType = $ContainerType->getContainerType();
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

switch($containerType){
	case 'Slabbed Box':
	$full = $ContainerType->getSlabCount();
	break;	
	case 'Roll Tray':	
	case 'Roll Bin':
	case 'Roll Box':
	case 'Mint Roll Box':
	$full = $ContainerType->getRollCount();
	break;	
	case 'Set Box':
	$full = $ContainerType->getSetCount();
	break;		
	case 'Other':
	$full = '999';
	break;			
}


mysql_query("INSERT INTO containers(containerName, full, containerTypeID, coinCategory, containerType, containerDate, userID, purchaseDate, purchaseFrom, coinNote, purchasePrice, shopName, shopUrl, showName, showCity, auctionNumber, ebaySellerID) VALUES('$containerName', '".$full."', '$containerTypeID', '".$ContainerType->getCoinCategory()."', '$containerType', '$theDate', '$userID', '$purchaseDate', '$purchaseFrom', '$coinNote', '$purchasePrice', '$shopName', '$shopUrl', '$showName', '$showCity', '$auctionNumber', '$ebaySellerID')") or die(mysql_error()); 
$containerID = mysql_insert_id();

switch($containerType){
	case 'Slabbed Box':
	header("location: coinContainerSlab.php?ID=".$Encryption->encode($containerID)."");
	break;	
	case 'Roll Box':
	header("location: coinContainerTray.php?ID=".$Encryption->encode($containerID)."");
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


}
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
$(".detailDiv2, .detailDiv3").hide();
$( ".purchaseDate" ).datepicker();
$("#containerList").change(function() {
	$(".detailDiv3").hide();
	$('#' + $(this).val()).show();
});	
$("#addCollectionForm").submit(function() {
      if($("#containerName").val() == "")  {
		$("#errorMsg").text("Name your container.");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#containerName").addClass("errorInput");
      return false;
      }else if(!$("input.containerTypeIDs:checked").val()){
		$("#errorMsg").text("Select your container.");
		$("#containerListLbl").addClass("errorTxt");
		$("#containerList").addClass("errorInput");
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
$("input[type=radio]").click(function(){
	  $("#containerList").removeClass("errorInput");
	  $("#containerListLbl").removeClass("errorTxt");
	  $("#errorMsg").text("");
});
	//$("#errorMsg").text(String.fromCharCode(160));
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1>Add New Storage Container</h1>
 <div id="CoinList">
<p class="darker">Recently Added Containers &nbsp;| &nbsp; <a href="coinContainer.php" class="brownLink">View All Containers</a></p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="13%">Date</td>
    <td width="50%">Name</td>
    <td width="19%">Type</td>   
    <td width="18%" align="center">Rolls/Sets/Coins</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM containers WHERE userID = '$userID'  ORDER BY containerID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="4">You dont have any saved containers</td>
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $containerID	 = intval($row['containerID']);
  $Container->getContainerById($containerID);  
  echo '
<tr>
<td>'.date("M j, Y",strtotime($Container->getContainerDate())).'</td> 
<td><a href="coinContainerList.php?ID='.$Encryption->encode($containerID).'">'.$Container->getContainerName().'</a></td>
<td>'.$Container->getContainerType().'</td>
<td align="center">'.$Container->getCollectionContainerCount($containerID).'</td>
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
  </tr>
</table>

</div>
<hr />


<div>

<form action="" method="post" enctype="multipart/form-data" name="addCollectionForm" id="addCollectionForm">
  <table width="979" border="0" class="addCoinTbl" cellpadding="3">

  <tr>
    <td colspan="5" class="darker"><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>&nbsp;</td>
    </tr>
  <tr>
    <td class="darker"><label for="containerName">Container Name</label></td>
    <td colspan="4"><input name="containerName" type="text" id="containerName" value="<?php if(isset($_POST["containerName"])){echo $_POST["containerName"];} else {echo "";}?>" size="70" maxlength="70" /></td>
  </tr>
  <tr>
    <td width="198" class="darker"><label for="containerList" id="containerListLbl">Container Type</label></td>
    <td colspan="4"><select id="containerList" name="container">
      <option selected="selected" value="">Type</option>
      <option value="Roll_Tray">Coin Roll Tray</option>
        <option value="Roll_Bin">Roll Bin</option>
        <option value="Roll_Box">Bank Roll Box</option>
        <option value="Mint_Roll_Box">Mint Roll Box</option>
        <option value="Slabbed_Box">Slabbed Coin Box</option>
        <option value="Set_Box">Mint Set Box</option>
        <option value="Other">Other</option> 
    </select></td>
  </tr>
  <tr>
    <td colspan="5" class="darker">
    
 
 <div id="Roll_Tray" class="detailDiv3">
 <table width="100%" border="0">
  <tr>
    <td width="4%"><input type="radio" name="containerTypeID" class="containerTypeIDs" value="5" /></td>
    <td width="21%">Penny Roll Tray</td>
    <td width="75%" rowspan="5" align="left" valign="top"><img src="../img/Roll_Tray.jpg" width="200" height="100" /></td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="3" /></td>
    <td>Nickel Roll Tray</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="6" /></td>
    <td>Dime Roll Tray</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="7" /></td>
    <td>Quarter Roll Tray</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="8" /></td>
    <td>Half Dollar Roll Tray</td>
    </tr>
 </table>
 </div>   
  
  <div id="Roll_Box" class="detailDiv3">
 <table width="100%" border="0">
  <tr>
    <td width="4%"><input type="radio" name="containerTypeID" class="containerTypeIDs" value="28" /></td>
    <td width="21%">Penny 20 Roll Box</td>
    <td width="75%" rowspan="9" align="left" valign="top"><img src="../img/Rolls_Box.jpg" width="200" height="100" /></td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="29" /></td>
    <td>Penny 50 Roll Box</td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="26" /></td>
    <td>Nickel 10 Roll Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="31" /></td>
    <td>Nickel 50 Roll Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="27" /></td>
    <td>Dime 10 Roll Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="30" /></td>
    <td>Dime 25 Roll Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="33" /></td>
    <td>Quarter 10 Roll Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="32" /></td>
    <td>Quarter 50 Roll Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="36" /></td>
    <td>Half Dollar 10 Roll Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="37" /></td>
    <td>Half Dollar 25 Roll Box</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="34" /></td>
    <td> Dollar 8 Roll Box</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="35" /></td>
    <td> Dollar 40 Roll Box</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><select id="addAllSel" name="addAllSel">
      <option selected="selected" value="0">Add All Rolls</option>
      <option value="0">No, I Will Asign Rolls</option>
      <option value="1">Yes, Add All To Bulk Collection</option>
    </select></td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
 </table>
 </div>   
    
  <div id="Roll_Bin" class="detailDiv3">
 <table width="100%" border="0">
  <tr>
    <td width="4%"><input type="radio" name="containerTypeID" class="containerTypeIDs" value="9" /></td>
    <td width="21%">Penny Roll Bin</td>
    <td width="75%" rowspan="5" align="left" valign="top"><img src="../img/Roll_Bin.jpg" width="200" height="100" /></td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="10" /></td>
    <td>Nickel Roll Bin</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="11" /></td>
    <td>Dime Roll Bin</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="12" /></td>
    <td>Quarter Roll Bin</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="13" /></td>
    <td>Half Dollar Roll Bin</td>
    </tr>
 </table>

 
 </div>
 <div id="Mint_Roll_Box" class="detailDiv3">
 <table width="100%" border="0">
  <tr>
    <td width="4%"><input type="radio" name="containerTypeID" class="containerTypeIDs" value="15" /></td>
    <td width="21%">US Mint Dollar  Roll Box</td>
    <td width="75%" rowspan="5" align="left" valign="top"><img src="../img/Roll_Box.jpg" width="200" height="100" /></td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="16" /></td>
    <td>US Mint Quarter  Roll Box</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
 </table>

 
 </div>
 <div id="Slabbed_Box" class="detailDiv3">
 <table width="100%" border="0">
  <tr>
    <td width="4%"><input type="radio" name="containerTypeID" class="containerTypeIDs" value="2" /></td>
    <td width="21%">PCGS Box</td>
    <td width="75%" rowspan="5" align="left" valign="top"><img src="../img/PCGS_Box.jpg" width="200" height="100" /></td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="1" /></td>
    <td>NGC Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="17" /></td>
    <td>Aluminum Storage Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="22" /></td>
    <td>Wooden Storage Box</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
 </table>

 
 </div>
 <div id="Set_Box" class="detailDiv3">
 <table width="100%" border="0">
  <tr>
    <td width="4%"><input type="radio" name="containerTypeID" class="containerTypeIDs" value="19" /></td>
    <td width="26%">US Mint Collectors Box One Lens</td>
    <td width="70%" rowspan="5" align="left" valign="top"><img src="../img/Set_Box.jpg" width="200" height="100" /></td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="18" /></td>
    <td>US Mint Collectors Box Two Lens</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="20" /></td>
    <td>Proof Set Storage Box</td>
    </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="21" /></td>
    <td>Multi Slab Plastic Storage Box</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    </tr>
 </table>

 
 </div>
 <div id="Other" class="detailDiv3">
 <table width="100%" border="0">
  <tr>
    <td width="4%"><input type="radio" name="containerTypeID" class="containerTypeIDs" value="23" /></td>
    <td width="21%">Shoe Box</td>
    <td width="75%" rowspan="5" align="left" valign="top"><img src="../img/Other_Box.jpg" width="200" height="100" /></td>
  </tr>
  <tr>
    <td><input type="radio" name="containerTypeID" class="containerTypeIDs" value="24" /></td>
    <td>Plastic Bin</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
 </table>
 </div>    
    </td>
    </tr>
    </table>
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl" cellpadding="3">
  <tr>
    <td width="186"><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input name="purchaseDate" type="text" class="purchaseDate" id="purchaseDate" value="<?php if(isset($_POST["purchaseDate"])){echo $_POST["purchaseDate"];} else {echo "";}?>" /></td>
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
            <td width="47%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="53%"><input name="auctionNumber" type="text" value="<?php if(isset($_POST["auctionNumber"])){echo $_POST["auctionNumber"];} else {echo "";}?>" /></td>
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
            <td width="47%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="53%"><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
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
            <td width="47%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="53%"><input name="showName" id="showName" type="text" value="<?php if(isset($_POST["showName"])){echo $_POST["showName"];} else {echo "";}?>" /></td>
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
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="" /></td>
  </tr>
    </table>
  <tr>
    <td class="darker">Description</td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td class="darker"><input type="submit" name="addContainerBtn" id="addContainerBtn" value="Add Container" /></td>
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
