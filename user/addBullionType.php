<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

function checkMintCount($coinID) {
        $coinQuery = mysql_query("SELECT * FROM coins WHERE coinID = '$coinID'") or die(mysql_error());
		while($row = mysql_fetch_array($coinQuery))
	  {
		  $byMint = $row['byMint'];
	  }
		return $byMint;
    }

if (isset($_GET["coinVersion"])) { 
$coinVersionLink = strip_tags($_GET["coinVersion"]);
$coinVersion = str_replace('_', ' ', mysql_real_escape_string($_GET["coinVersion"]));
$coinQuery = mysql_query("SELECT * FROM coins WHERE coinVersion = '$coinVersion'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinID = $row['coinID'];
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinSubCategory = $row['coinSubCategory'];
switch ($coinType)
{
case "Gold American Eagle":
  $bullionType = $coinVersion;
  break;
  
case "Platinum American Eagle":
  $bullionType = $coinVersion;
  break;

default:
  $bullionType = "";
}
  
  
  }
  
}

//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$coinID = mysql_real_escape_string($_POST["coinID"]);
$coin-> getCoinById($coinID);
$coinType = $coin->getCoinType();
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();
$coinVersion = $coin->getCoinVersion();
$byMint = checkMintCount($coinID);


if($_POST['coinID'] == '') {
	$coinID = '0';
} else {
	$coinID = mysql_real_escape_string($_POST["coinID"]);
}


if($_POST['proService'] == 'None') {
	$proSerialNumber = 'None';
	$slabLabel = 'None';
} else {
	$proService = mysql_real_escape_string($_POST["proService"]);
	$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
    $slabLabel = mysql_real_escape_string($_POST["slabLabel"]);
	$designation = mysql_real_escape_string($_POST["designation"]);
    $slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
}



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

$errorType = mysql_real_escape_string($_POST["errorType"]);
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);

if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

switch ($_POST["purchaseFrom"])
{
case "eBay":
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
	$auctionNumber = mysql_real_escape_string($_POST["auctionNumber"]);
	$ebaySellerID = mysql_real_escape_string($_POST["ebaySellerID"]);
	$additional = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
  break;
case "Coin Shop":
    $shopName = mysql_real_escape_string($_POST["shopName"]);
	$shopUrl = mysql_real_escape_string($_POST["shopUrl"]);
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]); 
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$additional = 'None';		
	 break;
case "Mint":
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
	if($_POST['additional'] == '') {
	$additional = 'None';;
	} else {
		$additional = mysql_real_escape_string($_POST["additional"]);
	}
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
  break;
  default:
    $purchaseFrom = 'None';	
	$additional = 'None';	
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	

}	
$problem = mysql_real_escape_string($_POST["problem"]);
$mintBox = mysql_real_escape_string($_POST["mintBox"]); 

mysql_query("INSERT INTO collection(coinID, coinType, coinCategory, coinSubCategory, coinVersion, proService, proSerialNumber, slabCondition, strike, slabLabel, coinGrade, designation, problem, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, errorType, byMint, mintBox) VALUES('$coinID', '$coinType', '$coinCategory', '$coinSubCategory', '$coinVersion', '$proService', '$proSerialNumber', '$slabCondition', '$strike', '$slabLabel', '$coinGrade', '$designation', '$problem', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '$errorType', '$byMint', '$mintBox')") or die(mysql_error());$collectionID = mysql_insert_id();
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

header("location: viewCoinDetail.php?collectionID=$collectionID");
exit;
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

</style>
<script type="text/javascript">
$(document).ready(function(){	


$("#addCoinForm2").submit(function() {
      if($("#coinID").val() == "")  {
		$("#errorMsg").text("Select a Coin.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#coinID").addClass("errorTxt");
      return false;
      } else {
	  return true;
	  }
});
$("#coinID").click(function() {
		$("#coinID").removeClass("errorTxt");
});

$("#labelRow, #serialNumRow, #slabConditionRow").hide();


$("#proService").change(function() {
	$("#labelRow, #serialNumRow, #slabConditionRow").show();
});	

$("#coinName").change(function() {
var dataString = $(this).val();
$.ajax({
	url:"../inc/functions/addRawFunctions.php?coinType="+dataString, 
	type: "GET", 
success:function(result){
$("#coinID").val(dataString);
//alert(dataString);
}});

});	
	
	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear"><h1>Add <?php echo $coinType ?> <?php echo $bullionType; ?></h1>
  <table width="100%" border="0">
    <tr>
    <td width="24%" rowspan="3"><span class="darker"><img src="../img/<?php echo $coinVersionLink ?>.jpg" alt="<?php echo coinVersionLink ?>" name="<?php echo coinVersionLink ?>Img" align="left"  class="newFormImg" id="<?php echo coinVersionLink ?>Img2" /></span></td>
    <td width="39%" valign="top"><a href="addBullion.php">Return to Coin Types</a></td>
    <td width="37%" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><a href="addCoinTypeMulti.php?coinType=<?php echo $rawCoinType; ?>">Add Multiple</a></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
</table>


<div class="clear"></div>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<a name="forms"></a>
<div id="addCoinDiv">
  
  <form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td width="178" class="darker">Year &amp; Mint</td>
    <td colspan="4"><select id="coinID" name="coinID">
<option value="4003">Select Year</option>
<?php 
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinVersion = '$coinVersion' ORDER BY coinName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$coinID = $row['coinID'];
		$coinType = $row['coinType'];
		$name = $row['coinName'];

	echo '<option value="' . $coinID . '">' . $name . '</option>';

	}
?>
    </select></td>
  </tr>
  <tr>
    <td class="darker">Strike</td>
    <td colspan="4"><select id="strike" name="strike">
      <option value="Business" selected="selected">Business</option>
      <option value="Proof">Proof</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker"><label for="proService">Grading Service</label></td>
    <td colspan="4"><select id="proService" name="proService">
<option value="None" selected="selected">None</option>  
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
    <td class="darker">Slab Label</td>
    <td colspan="4"><label for="slabLabel"></label>
      <input name="slabLabel" type="text" id="slabLabel" size="70" /></td>
  </tr>
  <tr id="serialNumRow">
    <td class="darker">Serial Number</td>
    <td colspan="4"><input name="proSerialNumber" type="text" id="proSerialNumber" value="" size="70" /></td>
  </tr>
  <tr id="slabConditionRow">
    <td class="darker">Slab Condition</td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
      <option value="Excellent" selected="Excellent">Excellent</option>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker">Grade</td>
    <td colspan="4"><select name="coinGrade">
<option value="No Grade" selected="selected">No Grade </option>
<option value="B0">(B-0) Basal 0 </option>
<option value="P1" >(PO-1) Poor</option>
<option value="FR2">(FR-2) Fair</option>
<option value="AG3">(AG-3) About Good</option>
<option value="G4">(G-4) Good</option>
<option value="G6">(G-6) Good</option>
<option value="VG8">(VG-8) Very Good</option>
<option value="VG10">(VG-10) Very Good</option>
<option value="F12">(F-12) Fine</option>
<option value="F15">(F-15) Fine</option>
<option value="VF20">(VF-20) Very Fine</option>
<option value="VF25">(VF-25) Very Fine</option>
<option value="VF30">(VF-30) Very Fine</option>
<option value="VF35">(VF-35) Very Fine</option>
<option value="EF40">(EF-40) Extremely Fine</option>
<option value="EF45">(EF-45) Extremely Fine</option>
<option value="AU50">(AU-50) About Uncirculated</option>
<option value="AU55">(AU-55) About Uncirculated</option>
<option value="AU58">(AU-58) Very Choice About Uncirculated</option>
<option value="MS60">(MS-60) Mint State Basal</option>

<option value="MS61">(MS-61) Mint State Acceptable</option>
<option value="MS62">(MS-62) Mint State Acceptable</option>
<option value="MS63">(MS-63) Mint State Acceptable</option>

<option value="MS64">(MS-64) Mint State Acceptable</option>
<option value="MS65">(MS-65) Mint State Choice</option>

<option value="MS66">(MS-66) Mint State Choice</option>
<option value="MS67">(MS-67) Mint State Choice</option>

<option value="MS68">(MS-68) Mint State Premium</option>
<option value="MS69">(MS-69) Mint State All-But-Perfect</option>
<option value="MS70">(MS-70) Mint State Perfect</option>

<option value="PR35">(PR-35) Impaired Proof.</option>
<option value="PR40">(PR-40) Impaired Proof.</option>
<option value="PR45">(PR-45) Impaired Proof.</option>
<option value="PR50">(PR-50) Impaired Proof.</option>

<option value="PR55">(PR-55) Impaired Proof.</option>
<option value="PR58">(PR-58) Impaired Proof.</option>
<option value="PR60">(PR-60) Brilliant Proof.</option>
<option value="PR61">(PR-61) Brilliant Proof.</option>
<option value="PR62">(PR-62) Brilliant Proof.</option>
<option value="PR63">(PR-63) Brilliant Proof.</option>
<option value="PR64">(PR-64) Brilliant Proof.</option>
<option value="PR65">(PR-65) Gem Proof.</option>
<option value="PR66">(PR-66) Choice Gem Proof.</option>
<option value="PR67">(PR-67) Extraordinary Proof.</option>
<option value="PR68">(PR-68) Extraordinary Proof.</option>
<option value="PR69">(PR-69) Extraordinary Proof.</option>
<option value="PR70">(PR-70) Perfect Proof.</option>
</select></td>
  </tr>
  <tr>
    <td><strong>Designation</strong></td>
    <td colspan="4"><select name="designation" id="designation">
<option value="None" selected="selected">None</option>

<option value="Full Band">Full Band (FB) - Mercury Head Dimes</option>
<option value="Full Head">Full Head (FH) - Standing Liberty Quarters</option>
<option value="Full Steps">Full Steps (FS) - Jefferson Nickels</option>
<option value="Full Bell Lines">Full Bell Lines (FBL) - Franklin Half Dollars</option>
<option value="Proof Like">Proof Like (PL) - Morgan Dollars</option>
<option value="Deep Mirror Proof Like">Deep Mirror Proof Like (DMPL) - Morgan Dollars</option>
<option value="Cameo Proof">Cameo Proof (CAM) - 1950-1970 Proof Coinage</option>
<option value="Deep Cameo Proof">Deep Cameo Proofs (DC) - 1950-1970 Proof Coinage</option>
<option value="Brown">Brown (BN) Less then 5% original red color</option>
<option value="Red and Brown">Red and Brown (RB) Between 5% and 95% original red color</option>
<option value="Red">Red (RD)  More than 95% original red color</option>
<option value="Specimen">Specimen (SP) Struck well like a Proof</option>
</select></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Obtained From</span></td>
    <td width="104"><span class="darker">
    </span>
            
            <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            <label for="eBayRad">eBay</label></td>
    <td width="163"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
<label for="shopRad">Coin Shop</label></td>
    <td width="132">
      <input type="radio" name="purchaseFrom" value="Mint" id="otherRad" />
      <label for="mintRad">U.S Mint</label></td>
    <td width="380">
      <input name="purchaseFrom" type="radio" id="noneRad" value="None" checked="checked" />
      <label for="noneRad">None</label></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="4">
    <div id="ebayDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
    <td width="53%"><input name="auctionNumber" type="text" value="" /></td>
    </tr>
  <tr>
    <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
    <td><input name="ebaySellerID" type="text" value="" /></td>
    </tr>
</table>
  </div>
  
     <div id="shopDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="shopName">Shop Name</label>
      &nbsp;</td>
    <td width="53%"><input name="shopName" type="text" value="" /></td>
    </tr>
  <tr>
    <td><label for="shopUrl">Website</label>
      &nbsp;</td>
    <td><input name="shopUrl" type="text" value="" /></td>
    </tr>
</table>
  </div>
  
      <div id="otherDetails" class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="mintBox">Presentation Box</label>&nbsp;</td>
    <td width="53%"><select name="mintBox" id="mintBox">
<option value="Yes" selected="selected">Yes</option>    
<option value="No">No</option>
</select></td>
    </tr>
  <tr>
    <td colspan="2"><label for="additional">Details</label><br />
<textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"></textarea></td>
    </tr>
</table>
  </div> 
  
     </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td colspan="4"><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>
  <tr>
    <td><strong>Problem</strong></td>
    <td colspan="4"><select name="problem" id="problem">
<option value="None" selected="selected">None</option>
<option value="Holed">Holed</option>
<option value="Cleaned">Cleaned</option>
<option value="Altered Surface">Altered Surface</option>
<option value="Scratched">Scratched</option>
<option value="Environmental Damage">Environmental Damage</option>
<option value="PVC Damage">PVC Damage</option>
<option value="Corrosion">Corrosion</option>
<option value="Planchet Flaw">Planchet Flaw</option>
</select></td>
  </tr>
      
  <tr>
    <td><span class="darker">Notes</span></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add  Coin" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>


<div id="CoinList">
<p class="darker">Recently added <?php echo $coinType; ?> coins In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="15%">Date</td>
    <td width="56%">Coin</td>
    <td width="15%">Grade</td>    
    <td width="14%">Total Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND userID = '$userID' ORDER BY collectionID DESC LIMIT 5") or die(mysql_error());
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
  
  $thePageCode = "Go to the view coin page to view this coin";
  //SEND ENCODED COLLECTIONID 
  echo '
<tr>
<td>'.$coinPurchaseDate.'</td> 
<td><a href="viewCoinDetail.php?collectionID='.$collectionID.'">'.$collectedCoinName.'</a></td>
<td>'.$coinGrade.'</td>
<td>'.$purchasePrice.'</td>
</tr>  
  ';
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

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
