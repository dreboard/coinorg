<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
$errorMsg = ""; 

//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$coinType = mysql_real_escape_string($_POST["coinType"]);
$coinCategory = 'Large Cent';

$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
if($_POST['coinGrade'] == 'No Grade') {
	$coinGradeNum = '0';
} else {
	$coinGradeNum = preg_replace('#[^0-9]#i', '', $coinGrade); 
}


$coinYear = mysql_real_escape_string($_POST["date1"]).mysql_real_escape_string($_POST["date2"]).mysql_real_escape_string($_POST["date3"]).mysql_real_escape_string($_POST["date4"]);
$mintMark = 'P';
$century = $collection->calculateCentrury($_POST["date2"]);

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

if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

mysql_query("INSERT INTO unknowncoins(coinType, coinCategory, coinGrade, coinGradeNum, coinYear, problem, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, century, denomination, viewable, coinMetal, mintMark) VALUES ('$coinType', '$coinCategory', '$coinGrade', '$coinGradeNum', '$coinYear', '$problem', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '$century' , '0.010', '0', 'Copper', '$mintMark')") or die(mysql_error()); 
$unknownCollectionID = mysql_insert_id();

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
$fileQuery = mysql_query("UPDATE unknowncoins SET coinPic1 = '$coinPic1' WHERE unknownCollectionID = '$unknownCollectionID'")  or die(mysql_error()); 
}
}
header("location: viewCoinUnkDetail.php?ID=".$Encryption->encode($unknownCollectionID)."");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Unknown Half Cent</title>

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".detailDiv2").hide();
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
<h1><img src="../img/Large_Cent.jpg" align="absmiddle"  id="addtypeImg" />&nbsp;Add Unknown Large Cent</h1>
<div class="clear"><a href="addCoinRaw.php">Return to Coin Types</a></div>
<br />

<table width="100%" border="0">
  <tr>
    <td colspan="2" align="center"><strong><a href="addCoinType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</a><br />
    (1793-1797)    </strong></td>
    <td colspan="2" align="center"><strong><a href="addCoinType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</a><br />
    (1800-1808)    </strong></td>
    <td colspan="2" align="center"><strong><a href="addCoinType.php?coinType=Classic_Head_Half_Cent">Classic Head</a><br />
    (1809-1836)    </strong></td>
    <td colspan="2" align="center"><strong><a href="addCoinType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</a><br />
    (1840-1857)    </strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><img src="../img/Flowing_Hair_Large_Cent.jpg" width="150" height="150" /></td>
    <td colspan="2" align="center"><img src="../img/Draped_Bust_Half_Cent.jpg" width="150" height="150" /></td>
    <td colspan="2" align="center"><img src="../img/Classic_Head_Half_Cent.jpg" width="150" height="150" /></td>
    <td colspan="2" align="center"><img src="../img/Braided_Hair_Half_Cent.jpg" width="150" height="150" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    <td colspan="2" align="center">&nbsp;</td>
    <td colspan="2" align="center">&nbsp;</td>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="84"><strong>Weight:
    </strong></td>
    <td width="157">6.74 grams</td>
    <td width="86"><strong>Weight: </strong></td>
    <td width="153">6.74 grams</td>
    <td width="86"><strong>Weight: </strong></td>
    <td width="156">6.74 grams</td>
    <td width="86"><strong>Weight: </strong></td>
    <td width="158">6.74 grams</td>
  </tr>
  <tr>
    <td><strong>Diameter: </strong></td>
    <td>22 mm </td>
    <td><strong>Diameter: </strong></td>
    <td>22 mm </td>
    <td><strong>Diameter: </strong></td>
    <td>22 mm </td>
    <td><strong>Diameter: </strong></td>
    <td>22 mm </td>
  </tr>
</table>
<p>* All Half Cents Minted in Philadelphia, no mintmarks.</p>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<div id="addCoinDiv">
<h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Coin Details</h2>
  <form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
  <table width="979" border="0" cellpadding="3">
  <tr>
    <td width="176" class="darker">Coin Type</td>
    <td width="785"><select name="coinType" id="coinType">
      <option value="Unknown" selected="selected">Unknown</option>
      <option value="Flowing Hair Large Cent">Libeap</option>
      <option value="Liberty Cap Large Cent" >Liberty Cap Large Cent</option>
      <option value="Draped Bust Large Cent">Draped Bust Large Cent</option>
      <option value="Classic Head Large Cent">Classic Head Large Cent</option>
      <option value="Coronet Liberty Head Large Cent">Coronet Liberty Head Large Cent</option>      
      <option value="Braided Hair Liberty Head Large Cent">Braided Hair Liberty Head Large Cent</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker">Grade</td>
    <td><select name="coinGrade">
      <option value="No Grade" selected="selected">No Grade </option>
      <option value="B0">(B-0) Basal 0 </option>
      <option value="P1" >(PO-1) Poor</option>
      <option value="FR2">(FR-2) Fair</option>
      <option value="AG3">(AG-3) About Good</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker"><label for="dates">Readable Year</label></td>
    <td><select name="date1">
      <option value="1">1</option>
      <option value="X" selected="selected">X</option>
    </select>
      <select name="date2">
        <option value="X" selected="selected">X</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>
      <select name="date3">
        <option value="X" selected="selected">X</option>
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <select name="date4">
        <option value="X" selected="selected">X</option>
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select> 
      <span id="unkTxt">(X represents unknown digiit in date, ie 179X, 17XX, ect...)</span></td>
  </tr>
  <tr>
    <td class="darker">Problem</td>
    <td><select name="problem" id="problem">
      <?php if(isset($_POST["problem"])){echo '<option value="'.$_POST["problem"].'" selected="selected">'.$_POST["problem"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
      <!--<option value="None" selected="selected">None</option>-->
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
    </table>
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
<tr>
    <td><span class="darker">Purchase Price</span></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="" class="purchasePrice" /></td>
  </tr>
  <tr>
    <td width="176"><span class="darker">Purchase Date</span></td>
    <td width="793"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Obtained From</span></td>
    <td><span class="darker">
      <select id="purchaseFrom" name="purchaseFrom">
        <option value="None" selected="selected">None</option>
        <option value="eBay">eBay</option>
        <option value="Shop">Coin Show</option>
        <option value="Show">Coin Shop</option>
        <option value="Mint">U.S. Mint</option>
      </select>
      </span></td>
    </tr>
  <tr>
    <td colspan="5" valign="top">
      <div id="eBay" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="30%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="70%"><input name="auctionNumber" type="text" value="<?php if(isset($_POST["auctionNumber"])){echo $_POST["auctionNumber"];} else {echo "";}?>" /></td>
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
            <td width="30%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="70%"><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
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
            <td width="30%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="70%"><input name="showName" id="showName" type="text" value="<?php if(isset($_POST["showName"])){echo $_POST["showName"];} else {echo "";}?>" /></td>
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
  
     <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl"> 
  <tr>
    <td width="162"><strong>Image</strong></td>
    <td width="807"><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><span class="darker">Notes</span></td>
    <td><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Coin" /></td>
    <td><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>


<p>&nbsp;</p>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
