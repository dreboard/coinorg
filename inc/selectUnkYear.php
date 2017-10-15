<?php 
include 'config.php';
$coinType = "Eisenhower Dollar";

//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$coinType = str_replace('_', ' ', mysql_real_escape_string($_POST["coinType"]));

switch (str_replace('_', ' ', $coinType))
{
case "Liberty_Cap_Half_Cent":
  $coinID = "9999";
  $century = "18";
  $design = "Liberty Cap";
  break;
case "Draped_Bust_Half_Cent":
  $coinID = "9999";
  $century = "19";  
  $design = "Draped Bust";
  break;
case "Classic_Head_Half_Cent":
  $coinID = "9999";
  $century = "19";  
  $design = "Classic Head";
  break;
case "Braided_Hair_Half_Cent":
  echo $coinID = "9999";
  $century = "19";  
  $design = "Braided Hair";
}




$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$coinCategory = "Half Cent";
$coinVersion = "Unknown ".$coinType;

$century = $coin->getCentury();
$byMint = checkMintCount($coinID);


if($_POST['coinID'] == '') {
	$coinID = '0';
} else {
	$coinID = mysql_real_escape_string($_POST["coinID"]);
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
    $mintBox = 'No'; 	
  break;
case "Coin Shop":
    $shopName = mysql_real_escape_string($_POST["shopName"]);
	$shopUrl = mysql_real_escape_string($_POST["shopUrl"]);
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]); 
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$additional = 'None';		
    $mintBox = 'No'; 	
	 break;
case "Mint":
    $purchaseFrom = "Mint";
	if($_POST['additional'] == '') {
	$additional = 'None';;
	} else {
		$additional = mysql_real_escape_string($_POST["additional"]);
	}
	$mintBox = mysql_real_escape_string($_POST["mintBox"]); 
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
  default:
    $purchaseFrom = 'None';	
	$additional = 'None';	
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
	$shopName = 'None';
	$shopUrl = 'None';	
    $mintBox = 'No'; 
}	

$strike = mysql_real_escape_string($_POST["strike"]);



mysql_query("INSERT INTO collection(coinID, coinType, coinCategory, coinVersion, strike, coinGrade, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, century, design) VALUES('$coinID', '$coinType', '$coinCategory', '$coinVersion', '$strike', '$coinGrade', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '$century', '$design')") or die(mysql_error()); 
$collectionID = mysql_insert_id();

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

}

?>
<table width="800" border="0">
  <tr>
    <td colspan="2" align="center"><strong>Liberty Cap<br />
    (1793-1797)    </strong></td>
    <td colspan="2" align="center"><strong>Draped Bust<br />
    (1800-1808)    </strong></td>
    <td colspan="2" align="center"><strong>Classic Head<br />
    (1809-1836)    </strong></td>
    <td colspan="2" align="center"><strong>Braided Hair<br />
    (1840-1857)    </strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><img src="../img/Liberty_Cap_Half_Cent.jpg" width="150" height="150" /></td>
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
    <td width="75"><strong>Weight:
    </strong></td>
    <td width="116">6.74 grams</td>
    <td width="76"><strong>Weight: </strong></td>
    <td width="115">6.74 grams</td>
    <td width="74"><strong>Weight: </strong></td>
    <td width="117">6.74 grams</td>
    <td width="76"><strong>Weight: </strong></td>
    <td width="117">6.74 grams</td>
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
<span id="errorMsg"></span>
<form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
  <table width="979" border="0" class="priceListTbl">
  <tr>
    <td width="178" class="darker">Coin Type</td>
    <td colspan="4"><select name="coinType2">
      <option value="Unknown" selected="selected">Unknown</option>
      <option value="Liberty_Cap_Half_Cent">Liberty Cap</option>
      <option value="Draped_Bust_Half_Cent" >Draped Bust</option>
      <option value="Classic_Head_Half_Cent">Classic Head</option>
      <option value="Braided_Hair_Half_Cent">Braided Hair</option>
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
    </select></td>
  </tr>
  <tr>
    <td class="darker"><label for="dates">Readable Numbers</label></td>
    <td colspan="4"><select name="date1">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="X" selected="selected">X</option>
    </select>
      <select name="date2">
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
      <select name="date3">
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
      (X represents unknown digiit in date, ie 179X, 17XX, ect...)</td>
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
    <td width="47%"> <label for="additional">Details</label>&nbsp;</td>
    <td width="53%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"></textarea></td>
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
    <td><span class="darker">Notes</span></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add  Coin" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
