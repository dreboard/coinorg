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

$mintMark = mysql_real_escape_string($_POST["mintMark"]);
$coinType = mysql_real_escape_string($_POST["coinType"]);
$CoinTypes->getCoinByType($coinType);
$coinCategory = $CoinTypes->getCoinCategory();


$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
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
if($_POST['coinNote'] == '') {
	$coinNote = 'None';
} else {
	$coinNote = mysql_real_escape_string($_POST["coinNote"]);
}
$bagType = 'Mint Bag';

mysql_query("INSERT INTO collectbags(bagID, userID, bagNickname, coinID, bagType, coinType, coinCategory, coinVersion, coinYear, purchaseFrom, purchaseDate, bagCondition, purchasePrice, coinNote, faceVal) VALUES('$bagID', '$userID', '$bagNickname','".$MintBag->getCoinID()."', 'Mint', '".$MintBag->getCoinType()."', '".$MintBag->getCoinCategory()."', '".$MintBag->getCoinVersion()."', '".$MintBag->getCoinYear()."', '$purchaseFrom', '$purchaseDate', '$bagCondition', '$purchasePrice', '$coinNote', '".$MintBag->getFaceVal()."')") or die(mysql_error()); 

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


header("location: bagDetail.php?ID=".$Encryption->encode($collectbagID)."");
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
#newBag {width:50px; height:auto;}
.bulkLinks {width:100px; height:auto;}
.rollHdr {margin:0px; padding:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	


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

<table width="988" border="0" class="priceListTbl" id="addMintBagTbl">
      <tr>
        <td class="darker" id="bagNameLbl2"><label for="bagNickname">Bag Nickname</label></td>
        <td><input name="bagNickname" type="text" id="bagNickname" size="64" /></td>
      </tr>
      <tr>
    <td width="199" class="darker" id="bagNameLbl"><label for="bagID">Coin Type</label></td>
    <td width="779"><select id="coinType" name="coinType">
      <option value="" selected="selected">Select Coin</option>
      <optgroup label="Cents $50">
        <option value="Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Nickels $200">
        <option value="Jefferson_Nickel">Jefferson</option>
        <option value="Westward_Journey">Westward Journey</option>
        <option value="Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes $1000">
        <option value="Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Quarters $1000">
        <option value="Washington_Quarter">Washington Quarter</option>
        <option value="State Quarter">State Quarter</option>
        <option value="District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars $1000">
        <option value="Walking_Liberty">Walking Liberty Half</option>
        <option value="Franklin_Half_Dollar">Franklin Half</option>
        <option value="Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars $2000">
        <option value="Morgan_Dollar">Morgan Dollar</option>
        <option value="Peace_Dollar">Peace Dollar</option>
        <option value="Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>
  <tr>
    <td class="darker"><label for="coinYear" id="coinYearLbl">Year</label></td>
    <td><select name="coinYear" id="coinYear">
  <option value="">---Select year---</option>
  <?php for ($i = 1950; $i < date('Y'); $i++) : ?>
  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select></td>
  </tr>
  <tr>
    <td class="darker" id="rollNameLbl"><label for="mintMark">Mint Mark</label></td>
    <td><select name="mintMark" id="mintMark">
      <option value="P" selected="selected">P</option>
      <option value="D">D</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker" id="rollNameLbl"><label for="faceVal">Bag Size</label></td>
    <td><select name="faceVal" id="faceVal">
      <option value="25.000">$25</option>
      <option value="50.000">$50</option>
      <option value="100.000">$100</option>
      <option value="200.000">$200</option>
      <option value="250.000">$250</option>
      <option value="500.000">$500</option>
      <option value="1000.000">$1000</option>
      <option value="2000.000">$2000</option>                   
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
  <tr>
    <td class="darker"><label for="purchaseDate">Purchase Date</label></td>
    <td><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
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
    <td class="darker"><label for="purchasePrice">Purchase Price</label></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td class="darker"><label for="coinNote">Additional</label></td>
    <td><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
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
