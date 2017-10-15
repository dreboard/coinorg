<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['collectrollsID'])) { 
$collectrollsID = intval($_GET['collectrollsID']);

$collectionRolls->getCollectionRollById($collectrollsID);
$rollNickname = $collectionRolls->getRollNickname();

$coinType = $collectionRolls->getCoinType();
$coinID = $collectionRolls->getCoinID();
 
$additional = $collectionRolls->getAdditional(); 
//$coinCategory = $collectionRolls->getCoinCategory();  

//getPageCategory
$linkName = str_replace(' ', '_', $coinType);
$coinLink = str_replace(' ', '_', $coinType);
}

//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) { 
$collectionID = mysql_real_escape_string($_POST["collectionID"]);
mysql_query("DELETE FROM collection WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 

header("location: viewCoinDetail.php?collectionID=$collectionID");
}

//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$coinID = mysql_real_escape_string($_POST["coinID"]);


$coin-> getCoinById($coinID);

$coinType = $coin->getCoinType();
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();
$byMint = $coin->getByMint();

$proService = mysql_real_escape_string($_POST["proService"]);
if($_POST['proService'] == 'None') {
	$proSerialNumber = 'None';
	$slabLabel = 'None';
} else {
	$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
    $slabLabel = mysql_real_escape_string($_POST["slabLabel"]);
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
case "Other":
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
	$additional = mysql_real_escape_string($_POST["additional"]);
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


mysql_query("UPDATE collection SET coinID = '$coinID', coinType = '$coinType', coinCategory = '$coinCategory', coinSubCategory = '$coinSubCategory', proService = '$proService', proSerialNumber = '$proSerialNumber', slabLabel = '$slabLabel', coinGrade = '$coinGrade', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', enterDate = '$enterDate', errorType = '$errorType', byMint = '$byMint' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 

//////////add file
if(!empty($_FILES['file']['tmp_name'])){
	
	$coinPic1 = new UploadedPic('file');
	$photoFileName = $coinPic1 -> getFileName($userID.'/', $_FILES['file']['name']);	

$fileQuery = mysql_query("UPDATE collection SET  coinPic1 = '$photoFileName' WHERE collectionID = '$collectionID'")  or die(mysql_error()); 
}

header("location: viewCoinDetail.php?collectionID=$collectionID");

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	

$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<hr />

<h1>Edit <?php echo $rollNickname ?></h1>
<hr />
<form action="" method="post" name="deleteCoinForm" id="deleteCoinForm" class="compactForm">

<input name="collectrollsID" type="hidden" value="<?php echo $collectrollsID ?>" />
<input name="deleteCoinFormBtn" type="submit" value="Delete Roll From Collection" onclick="return confirm('Delete this Roll?')" />
</form>
<hr />

<form action="" method="post">
<h3>Edit Coins In Roll</h3>
<table width="44%" border="0" class="priceListTbl">
  <tr>
    <td width="31%"><strong>Coin 1</strong></td>
    <td width="69%">
	    <select name="coin1" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 2</strong></td>
    <td>
    <select name="coin2" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 3</strong></td>
    <td>
    <select name="coin3" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 4</strong></td>
    <td>
    <select name="coin4" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 5</strong></td>
    <td>
    <select name="coin5" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 6</strong></td>
    <td>
    <select name="coin6" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 7</strong></td>
    <td>
    <select name="coin7" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 8</strong></td>
    <td>
    <select name="coin8" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 9</strong></td>
    <td>
    <select name="coin9" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 10</strong></td>
    <td>
    <select name="coin10" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 11</strong></td>
    <td>
    <select name="coin11" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 12</strong></td>
    <td>
    <select name="coin12" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 13</strong></td>
    <td>
    <select name="coin13" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 14</strong></td>
    <td>
    <select name="coin14" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 15</strong></td>
    <td>
    <select name="coin15" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 16</strong></td>
    <td>
    <select name="coin16" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 17</strong></td>
    <td>
    <select name="coin17" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 18</strong></td>
    <td>
    <select name="coin18" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 19</strong></td>
    <td>
    <select name="coin19" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 20</strong></td>
    <td>
    <select name="coin20" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 21</strong></td>
    <td>
    <select name="coin21" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 22</strong></td>
    <td>
    <select name="coin22" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 23</strong></td>
    <td>
    <select name="coin23" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 24</strong></td>
    <td>
    <select name="coin24" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 25</strong></td>
    <td>
    <select name="coin25" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Coin 26</strong></td>
    <td>
    <select name="coin26" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 27</strong></td>
    <td>
    <select name="coin27" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 28</strong></td>
    <td>
    <select name="coin28" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 29</strong></td>
    <td>
    <select name="coin29" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 30</strong></td>
    <td>
    <select name="coin30" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 31</strong></td>
    <td>
    <select name="coin31" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 32</strong></td>
    <td>
    <select name="coin32" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 33</strong></td>
    <td>
    <select name="coin33" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 34</strong></td>
    <td>
    <select name="coin34" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 35</strong></td>
    <td>
    <select name="coin35" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 36</strong></td>
    <td>
    <select name="coin36" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 37</strong></td>
    <td>
    <select name="coin37" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 38</strong></td>
    <td>
    <select name="coin38" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 39</strong></td>
    <td>
    <select name="coin39" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 40</strong></td>
    <td>
    <select name="coin40" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 41</strong></td>
    <td>
    <select name="coin41" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 42</strong></td>
    <td>
    <select name="coin42" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 43</strong></td>
    <td>
    <select name="coin43" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 44</strong></td>
    <td>
    <select name="coin44" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 45</strong></td>
    <td>
    <select name="coin45" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 46</strong></td>
    <td>
    <select name="coin46" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 47</strong></td>
    <td>
    <select name="coin47" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 48</strong></td>
    <td>
    <select name="coin48" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 49</strong></td>
    <td>
    <select name="coin49" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
    <tr>
    <td><strong>Coin 50</strong></td>
    <td>
    <select name="coin50" class="coinList">
	<?php  $collection->coinSelects($coinType, $userID); ?>
    </select>
    </td>
  </tr>
</table>

</form>


<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td width="172" class="darker">Year &amp; Mint</td>
    <td colspan="4"><select id="coinID" name="coinID">
<option value="<?php echo $coinID ?>" selected="selected"><?php echo $coinName ?></option>
<?php 
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error()); 
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
    <td class="darker"><label for="proService">Grading Service</label></td>
    <td colspan="4"><select id="proService" name="proService">
<option value="<?php echo $collection->getCoinGrade() ?>" selected="selected"><?php echo $collection->getCoinGrade() ?></option>
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
      <input name="slabLabel" type="text" id="slabLabel" size="70" value="<?php echo $collection->getSlabLabel() ?>" /></td>
  </tr>
  <tr id="serialNumRow">
    <td class="darker">Serial Number</td>
    <td colspan="4"><input name="proSerialNumber" type="text" id="proSerialNumber" value="<?php echo $collection->getGraderNumber() ?>" size="70" /></td>
  </tr>
  <tr>
    <td class="darker">Grade</td>
    <td colspan="4"><select name="coinGrade">
<option value="<?php echo $collection->getCoinGrade() ?>" selected="selected"><?php echo $collection->getCoinGrade() ?> </option>    
<option value="No Grade">No Grade </option>
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
<option value="PR70">(PR-70) Perfect Proof - No microscopic flaws visible to 8x.</option>
</select></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" value="<?php echo $collection->getCoinDate() ?>" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Obtained From</span></td>
    <td width="110"><span class="darker">
    </span>
            
            <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            <label for="eBayRad">eBay</label></td>
    <td width="163"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
<label for="shopRad">Coin Shop</label></td>
    <td width="132">
      <input type="radio" name="purchaseFrom" value="Other" id="otherRad" />
      <label for="otherRad">Other</label></td>
    <td width="380">
      <input name="purchaseFrom" type="radio" id="noneRad" value="None" checked="checked" />
      <label for="noneRad">None</label></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="4">
    <div class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
    <td width="53%"><input name="auctionNumber" type="text" value="<?php echo $collection->getAuctionNumber() ?>" /></td>
    </tr>
  <tr>
    <td><label for="ebaySellerID">ebaySellerID</label>&nbsp;</td>
    <td><input name="ebaySellerID" type="text" value="<?php echo $collection->getEbaySellerID() ?>" /></td>
    </tr>
</table>
  </div>
  
     <div class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="shopName">Shop Name</label>
      &nbsp;</td>
    <td width="53%"><input name="shopName" type="text" value="<?php echo $collection->getGraderNumber() ?>" /></td>
    </tr>
  <tr>
    <td><label for="shopUrl">Website</label>
      &nbsp;</td>
    <td><input name="shopUrl" type="text" value="<?php echo $collection->getGraderNumber() ?>" /></td>
    </tr>
</table>
  </div>
  
      <div class="detailDiv">
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="additional">Details</label>&nbsp;</td>
    <td width="53%">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"><?php echo $collection->getGraderNumber() ?></textarea></td>
    </tr>
</table>
  </div> 
  
     </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" value="<?php echo $collection->getCoinPrice() ?>" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td colspan="4"><label for="file"></label>
      <input type="file" name="file" id="file" /> Use Stock Image: <input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
  </tr>
  <tr>
    <td><strong>Error Type</strong></td>
    <td colspan="4"><select name="errorType" id="errorType">
<option value="None" selected="selected">None</option>
<option value="Off Center">Off Center</option>
<option value="Broadstrike">Broadstrike</option>
<option value="Partial Collar">Partial Collar</option>
<option value="Multiple Strike">Multiple Strike</option>
<option value="Mated Pair">Mated Pair</option>
<option value="Brockage">Brockage</option>
<option value="Capped Die">Capped Die</option>
<option value="Indent">Indent</option>
<option value="Bonded">Bonded</option>
<option value="Wrong Planchet">Wrong Planchet</option>
<option value="Mule">Mule</option>
<option value="Weak Strike">Weak Strike</option>
<option value="Transitional Error">Transitional Error</option>
<option value="Double Denomination">Double Denomination</option>
<option value="Folded Over">Folded Over</option>
<option value="Clipped Planchet">Clipped Planchet</option>
<option value="Lamination Error">Lamination Error</option>
<option value="Missing Edge Lettering">Missing Edge Lettering</option>
</select></td>
  </tr>  
  <tr>
    <td><span class="darker">Notes</span></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom"> 
    <input name="collectionID" type="hidden" value="<?php echo $getCollectionID ?>" />
    <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Update  Coin" /></td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</form>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>