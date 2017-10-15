<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['varietysetID'] == '') {
	$errorMsg = 'Please Select A Set';
} else {
$varietysetID = mysql_real_escape_string($_POST["varietysetID"]);
$setNickname = mysql_real_escape_string($_POST["setNickname"]);
$VarietySet->getVarietySetById($varietysetID);

if($_POST['purchaseDate'] == '') {
	$purchaseDate = date("Y-m-d");
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}
/*$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
$boxCondition = mysql_real_escape_string($_POST["boxCondition"]);
$coinsCondition = mysql_real_escape_string($_POST["coinsCondition"]);*/

$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$additional = $collection->setToNone($_POST["additional"]);	
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	

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

mysql_query("INSERT INTO collectset(setVersion, varietysetID, setType, slabCondition, setNickname, coinYear, strike, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, coinNote, enterDate, userID, setCount) VALUES('Variety Set', '$varietysetID', 'Variety Set', '$slabCondition', '$setNickname', '".$VarietySet->getCoinYear()."', 'Business', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '$coinNote', '$theDate', '$userID', '1')") or die(mysql_error()); 

$collectsetID = mysql_insert_id();
$VarietySet->getAllVarietySetCoins($collectsetID, $varietysetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchaseDate, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity);

//////////add file
if(!empty($_FILES['file']['tmp_name'])){
	
	if($_FILES['file']['size'] > $max_filesize){
	$errorMsg = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collectset SET coinPic1 = '$coinPic1' WHERE collectsetID = '$collectsetID'")  or die(mysql_error()); 
}
}

header("location: viewSetDetail.php?ID=".$Encryption->encode($collectsetID)."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add Coin Variety Set</title>
<script type="text/javascript" src="../scripts/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="http://www.mycoinorganizer.com/scripts/js/jquery-ui-1.8.22.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="http://www.mycoinorganizer.com/scripts/css/smoothness/jquery-ui-1.8.22.custom.css"/>
<link rel="stylesheet" type="text/css" href="http://www.mycoinorganizer.com/scripts/css/jquery.ui.datepicker.css"/>

<script type="text/javascript" src="../scripts/jquery.form.js"></script>
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
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".purchaseDate").datepicker();




$("#addCentForm").submit(function() {
      if($("#setNickname").val() == "")  {
		$("#errorMsg").text("Name Your Set.");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#setNickname").addClass("errorInput");
      return false;
      }else if ($("#mintsetID").val() == "") {
        $("#errorMsg").text("Select A Mintset...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#mintsetID").addClass("errorInput");
        return false;
      }  else {
		  $("#addCoinFormBtn").prop('value', 'Saving Mintset...');
	  return true;
	  }
});

$("#setNickname, #mintsetID").click(function(){
	$(this).removeClass("errorInput");
	$("#endErrorMsg").text("");
	$("#errorMsg").text("");
});	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#coinHdr, #waitMsg #labelRow, #serialNumRow, #slabConditionRow, #designationRow, #labelRow, #colorRow, #waitMsg").hide();

$("#proService").change(function() {
	$("#labelRow, #serialNumRow, #slabConditionRow, #designationRow, #labelRow, #colorRow").show();
});	

$("#varietysetID").change(function () {
    $("#coinHdr").show();
    $('#waitMsg').show();
    var dataString = $(this).val();
    $.ajax({
        url: "_varietyArrayGet.php?varietysetID=" + dataString,
        success: function (result) {
            $('#waitMsg').hide();
            $("#coinDisplayList").html(result);
        }
    });

});


$("#showDetails").hide();

//////////////////////////////////////////////////////////////////////////////////
$(".detailDiv2, .waitSpan").hide();

$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	
	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1><img src="../img/warSet.jpg" width="100" height="100" align="absmiddle"> Add  Coin Variety Set</h1>
 <p><a href="addSet.php" class="brownLinkBold">Back to set types</a> | For Certified/Graded Year Sets go to <a href="addGradedSet.php" class="brownLinkBold">Add Year Set</a></p>
 <div id="CoinList">
<p class="darker">Recently Added  Sets In Your Collection | <a href="mintsetHistory.php" class="brownLinkBold">Mint Set History</a></p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="13%">Date</td>
    <td width="40%">Set</td>
    <td width="31%">Type</td>   
    <td width="16%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectset WHERE userID = '$userID' AND setVersion = 'Variety Set' ORDER BY collectsetID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="4">You dont have any variety sets in your Collection</td>
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
  $collectsetID = intval($row['collectsetID']); 
  $varietysetID = intval($row['varietysetID']); 
  $CollectionSet->getCollectionSetById($collectsetID);
$VarietySet->getVarietySetById($varietysetID);  

  echo '
<tr>
<td>'.date("M j, Y",strtotime($CollectionSet->getCoinDate())).'</td> 
<td><a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'">'.$CollectionSet->getSetNickname().'</a></td>
<td><a href="viewVarietySet.php?ID='.$Encryption->encode($varietysetID).'" title="'.$VarietySet->getSetName().'">'.substr($VarietySet->getSetName(), 0, 30).'</a></td>
<td>'.$CollectionSet->getCoinPrice().'</td>
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

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <table width="979" border="0" class="addCoinTbl">

  <tr>
    <td><label for="setNickname">Set Nickname</label></td>
    <td><input name="setNickname" type="text" id="setNickname" value="" size="50" maxlength="50" /></td>
    <td width="397"><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span></td>
  </tr>
  <tr>
    <td width="216"><label for="varietysetID">Set Type</label></td>
    <td colspan="2">
    <select name="varietysetID" id="varietysetID">
    <option value="" selected="selected">Select A Coin Set</option>
<?php    
$query = mysql_query("SELECT * FROM varietyset") or die(mysql_error());
   while($row = mysql_fetch_array($query))
  {
	 echo '<option value="'.intval($row['varietysetID']).'">'.strip_tags($row['setName']).'</option> ';	
  }
 ?> 
    </select> <span id="waitMsg">Loading Coins........</span></td>
  </tr>
  <tr>
    <td class="darker">&nbsp;</td>
    <td colspan="2" valign="top">
    <h4 id="coinHdr">These Coins Will Be Entered Into Your Collection</h4>
    <div id="coinDisplayList">
    
    
    </div>
    </td>
  </tr>    
  </table>
<h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Details</h2>  
  <table width="979" border="0" class="addCoinTbl">
  
  <tr>
    <td width="185"><label for="proService">Grading Service</label></td>
    <td width="784" colspan="4"><select id="proService" name="proService">
 <?php if(isset($_POST["proService"])){echo '<option value="'.$_POST["proService"].'" selected="selected">'.$_POST["proService"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>    
<!--<option value="None" selected="selected">None</option> --> 
<option value="PCGS">PCGS (Professional Coin Grading Service)</option>
<option value="ICG">ICG (Independent Coin Grading Company)</option>
<option value="NGC">NGC (Numismatic Guaranty Corporation of America)</option>
<option value="ANACS">ANACS (American Numismatic Association Certification Service)</option>
<option value="SEGS">SEGS (Sovereign Entities Grading Service Inc)</option>
<option value="PCI">PCI</option>      
<option value="ICCS">ICCS (International Coin Certification Service )</option>  
<option value="HALLMARK">HALLMARK</option>  
<option value="NTC">NTC</option>                                                       
</select>

</td>
  </tr>
  <tr id="labelRow">
    <td><label for="slabLabel">Slab Label</label></td>
    <td colspan="4">
      <input name="slabLabel" type="text" id="slabLabel" size="70" value="<?php if(isset($_POST["slabLabel"])){echo $_POST["slabLabel"];} else {echo "";}?>" /></td>
  </tr>
  <tr id="serialNumRow">
    <td><label for="proSerialNumber">Serial Number</label></td>
    <td colspan="4"><input name="proSerialNumber" type="text" id="proSerialNumber" value="" size="70" /></td>
  </tr>
  <tr id="slabConditionRow">
    <td><label for="slabCondition">Slab Condition</label></td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
    <?php if(isset($_POST["slabCondition"])){echo '<option value="'.$_POST["slabCondition"].'" selected="selected">'.$_POST["slabCondition"].'</option>';} else {
		echo '<option value="" selected="selected">Choose</option>';}?>
        <option value="Excellent">Excellent</option>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select></td>
  </tr>
  <tr id="colorRow">
    <td><label for="color">Color</label></td>
    <td colspan="4"><select name="color" id="color">
      <?php if(isset($_POST["color"])){echo '<option value="'.$_POST["color"].'" selected="selected">'.$_POST["color"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
      <!--<option value="None" selected="selected">None</option>-->
      <option value="BN">Brown (BN) Less then 5% original red color</option>
      <option value="RB">Red and Brown (RB) Between 5% and 95% original red color</option>
      <option value="RD">Red (RD)  More than 95% original red color</option>
    </select></td>
  </tr>
  
  <tr id="designationRow">
    <td><label for="designation">Designation</label></td>
    <td colspan="4"><select name="designation" id="designation">
 <?php if(isset($_POST["designation"])){echo '<option value="'.$_POST["designation"].'" selected="selected">'.$_POST["designation"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>       
<!--<option value="None" selected="selected">None</option>-->
<option value="FB">Full Band (FB) - Mercury Head Dimes</option>
<option value="FH">Full Head (FH) - Standing Liberty Quarters</option>
<option value="FS">Full Steps (FS) - Jefferson Nickels</option>
<option value="FBL">Full Bell Lines (FBL) - Franklin Half Dollars</option>
<option value="PL">Proof Like (PL)</option>
<option value="DMPL">Deep Mirror Proof Like (DMPL)</option>
<option value="DCAM">Deep Cameo Proof (DCAM)</option>
<option value="CAM">Cameo Proof (CAM)</option>
<option value="SP">Specimen (SP) Struck well like a Proof</option>
</select></td>
  </tr>
  </table>   
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="186"><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>  
  <tr>
    <td valign="top"><strong>Pruchase From</strong></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Shop">Coin Shop</option>
      <option value="Show">Coin Show</option>
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
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">    
  <tr>
    <td width="187"><label for="file">Image</label></td>
    <td width="782" colspan="4">
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>
<tr>
    <td><label for="coinNote">Notes</label></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>  
  
  </table>  
 <br />

  
  <table width="601">
  <tr>
    <td width="166" valign="bottom">  
    <input name="coinCategory" type="hidden" value="<?php echo $coinTypeSearch ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Mintset" /></td>
    <td width="423" colspan="4" id="endErrorMsg" class="errorTxt">&nbsp;</td>
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
