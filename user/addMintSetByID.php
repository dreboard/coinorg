<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['ID'])) { 
$getMintsetID = intval($_GET['ID']);
$Mintset->getMintsetById($getMintsetID);
$mintsetID = $Mintset->getSetID();
$setYear = $str2 = substr($Mintset->getSetName(), 5);

}

//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['ID'] == '') {
	$errorMsg = 'Please Select A Coin';
} else {
$setNickname = mysql_real_escape_string($_POST["setNickname"]);
$mintsetID = mysql_real_escape_string($_POST["ID"]);
$Mintset->getMintsetById($mintsetID);
$mintBox = mysql_real_escape_string($_POST["mintBox"]);
$coinYear = substr($Mintset->getSetName(), 0, 4);

if($_POST['purchaseDate'] == '') {
	$purchaseDate = date("Y-m-d");
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}
$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
$boxCondition = mysql_real_escape_string($_POST["boxCondition"]);
$coinsCondition = mysql_real_escape_string($_POST["coinsCondition"]);

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


mysql_query("INSERT INTO collectset(setVersion, mintBox, mintsetID, setType, slabCondition, coinsCondition, boxCondition, setNickname, coinYear, strike, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, coinNote, enterDate, userID, setCount) VALUES('Mint', '$mintBox', '$mintsetID', '".$Mintset->getSetType()."', '$slabCondition', '$coinsCondition', '$boxCondition', '$setNickname', '$coinYear', '".$Mintset->getCoinStrike()."', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$showName', '$showCity', '$coinNote', '$theDate', '$userID', '".$Mintset->getSetCount()."')") or die(mysql_error()); 


$collectsetID = mysql_insert_id();
$Mintset->getAllMintSetCoins($collectsetID, $mintsetID, $userID, $purchaseFrom, $auctionNumber, $additional, $purchaseDate, $ebaySellerID, $shopName, $shopUrl, $showName, $showCity);

//Create collection folder
if ( !file_exists($userID.'/sets/'.$collectsetID) ) {
    mkdir($userID.'/sets/'.$collectsetID, 0755, true);
}
//////////add file
if(!empty($_FILES['file']['tmp_name'])){
	
	if($_FILES['file']['size'] > $max_filesize){
	$errorMsg = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
	
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID.'/sets/'.$collectsetID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID.'/sets/'.$collectsetID."/"  . str_replace(' ', '_', $_FILES['file']['name']);
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

<title>Add <?php echo $Mintset->getSetName(); ?></title>
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
$("#coinHdr, #waitMsg").hide();

$("#mintsetID").change(function () {
    $("#coinHdr").show();
    $('#waitMsg').show();
    var dataString = $(this).val();
    $.ajax({
        url: "_mintArrayGet.php?mintsetID=" + dataString,
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
  <h1>Add <?php echo $Mintset->getSetName(); ?></h1>
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
$collectionQuery = mysql_query("SELECT * FROM collectset WHERE userID = '$userID' AND setType = '".$Mintset->getSetType()."' ORDER BY collectsetID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="4">You dont have any US Mint sets in your Collection</td>
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
  $mintsetID = intval($row['mintsetID']); 
  $CollectionSet->getCollectionSetById($collectsetID);
  $Mintset->getMintsetById($CollectionSet->getMintsetID());


  $thePageCode = "Go to the view coin page to view this coin";
  //SEND ENCODED COLLECTIONID 
  echo '
<tr>
<td>'.date("M j, Y",strtotime($CollectionSet->getCoinDate())).'</td> 
<td><a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'">'.$CollectionSet->getSetNickname().'</a></td>
<td><a href="viewSet.php?ID='.$Encryption->encode($mintsetID).'" title="'.$Mintset->getSetName().'">'.substr($Mintset->getSetName(), 0, 30).'</a></td>
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
    <td colspan="3"><input name="setNickname" type="text" id="setNickname" value="" size="50" maxlength="50" /></td>
    <td width="397"><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span></td>
  </tr>
  <tr>
    <td colspan="5">
    <br />
      <h4>These Coins Will Be Entered Into Your Collection</h4>
      <div id="coinDisplayList">
        <?php
	
	$countAll = mysql_query("SELECT * FROM mintset WHERE mintsetID = '".intval($_GET['ID'])."'") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
    $coins = strip_tags($row['coins']);
	$coinList = explode(",", $coins);
	foreach ($coinList as $coins) {
	$coin->getCoinById($coins);
	$coinID = $coin->getCoinID();
	$byMint = $coin->checkPDS($coinID);
    echo $coin->getCoinName().' '.$coin->getCoinType().'<br />';
         }
	  }
	
    ?>
    <br />
<br />

      </div>    </td>
    </tr>
  <tr>
    <td><label for="mintBox">Presentation Box</label></td>
    <td colspan="4" valign="top"><select name="mintBox" id="mintBox">
      <option value="Yes" selected="selected">Yes</option>
      <option value="No">No</option>
    </select></td>
  </tr>
  <tr id="boxConditionRow">
    <td><label for="boxCondition">Box/Envelope Condition</label></td>
    <td colspan="4"><select id="boxCondition" name="boxCondition">
    <?php if(isset($_POST["boxCondition"])){echo '<option value="'.$_POST["boxCondition"].'" selected="selected">'.$_POST["boxCondition"].'</option>';} else {
		echo '<option value="Excellent" selected="selected">Excellent</option>';}?>
      <option value="Slight Wear">Slight Wear</option>
      <option value="Heavy Wear">Heavy Wear</option>      
      <option value="Severely Worn">Severely Worn/Torn</option>
    </select></td>
  </tr>
  <tr id="slabConditionRow">
    <td><label for="slabCondition">Slab Condition</label></td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
    <?php if(isset($_POST["slabCondition"])){echo '<option value="'.$_POST["slabCondition"].'" selected="selected">'.$_POST["slabCondition"].'</option>';} else {
		echo '<option value="Excellent" selected="selected">Excellent</option>';}?>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select></td>
  </tr>
  <tr>
    <td><label for="coinsCondition">Coins Condition</label></td>
    <td colspan="4"><select id="coinCondition" name="coinsCondition">
      <?php if(isset($_POST["coinsCondition"])){echo '<option value="'.$_POST["coinsCondition"].'" selected="selected">'.$_POST["coinsCondition"].'</option>';} else {
		echo '<option value="Excellent" selected="selected">Excellent</option>';}?>
      <option value="Lightly Spotted">Lightly Spotted</option>
      <option value="Spotted">Spotted</option>
      <option value="Severely Spotted">Severely Spotted</option>
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
    <input name="ID" type="hidden" value="<?php echo intval($_GET['ID']) ?>" />
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
