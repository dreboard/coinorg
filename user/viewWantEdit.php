<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['wantlistID'])) { 
$wantlistID = intval($_GET['wantlistID']);
$WantList->getWantedById($wantlistID);




$coinType = $collection->getCoinType();
$coinID = $collection->getCoinID();
$proService = $collection->getGrader();
$coin-> getCoinById($coinID);
$coinName = $coin->getCoinName();  
$additional = $collection->getAdditional(); 
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
//getPageCategory
$linkName = str_replace(' ', '_', $coinType);
$coinLink = str_replace(' ', '_', $coinType);
}

//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) { 
$wantlistID = mysql_real_escape_string($_POST["wantlistID"]);
$coinID = mysql_real_escape_string($_POST["coinID"]);
mysql_query("DELETE FROM wantlist WHERE wantlistID = '$wantlistID'") or die(mysql_error()); 
header("location: want.php");
}

//////////ADD COIN
if (isset($_POST["updateCoinBtn"])) { 
$collectionID = mysql_real_escape_string($_POST["collectionID"]);
$collection->getCollectionById($collectionID);
$coinID = $collection->getCoinID();

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

$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$auctionNumber = mysql_real_escape_string($_POST["auctionNumber"]);
$ebaySellerID = mysql_real_escape_string($_POST["ebaySellerID"]);
$shopName = mysql_real_escape_string($_POST["shopName"]);
$shopUrl = mysql_real_escape_string($_POST["shopUrl"]);
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]); 
$additional = mysql_real_escape_string($_POST["additional"]);

$updateThis = mysql_query("UPDATE collection SET coinID = '$coinID', coinType = '$coinType', coinCategory = '$coinCategory', coinSubCategory = '$coinSubCategory', proService = '$proService', proSerialNumber = '$proSerialNumber', slabLabel = '$slabLabel', coinGrade = '$coinGrade', purchaseDate = '$purchaseDate', purchaseFrom = '$purchaseFrom', auctionNumber = '$auctionNumber', additional = '$additional', purchasePrice = '$purchasePrice', ebaySellerID = '$ebaySellerID', shopName = '$shopName', shopUrl = '$shopUrl', coinNote = '$coinNote', errorType = '$errorType', byMint = '$byMint' WHERE collectionID = '$collectionID'") or die(mysql_error()); 

//////////add file
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName($_FILES['file']['name']);
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . $_FILES['file']['name'];
$fileQuery = mysql_query("UPDATE collection SET  coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID'") or die(mysql_error()); 
}
if($updateThis){
	header("location: viewCoinDetail.php?collectionID=$collectionID");
	exit;
  } else {
	  echo 'Update failed';
  }
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

<h1><a href="viewCoin.php?coinID=<?php echo $coinID ?>"><?php echo $coinName; ?></a>,  U.S. <?php echo $coinCategory ?></h1>
<form id="editCoinForm" action="" method="post" enctype="multipart/form-data">
<table width="930" id="viewTbl">
  <tr>
    <td width="263" rowspan="9" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><img src="../img/<?php echo $coinLink ?>.jpg" width="250" height="250" alt="11" /></a></td>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td width="155" class="tdHeight"><span class="darker">Type: </span></td>
<td width="478" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinType ?></a></td>
<td width="14"></td>
</tr>
<tr>
<td class="tdHeight"><span class="darker">List Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($collection->getCoinDate())); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Purchase Range:</strong></td>
  <td class="tdHeight">$<?php echo $collection->getCoinPrice(); ?></td>
</tr>
  <tr>
    <td><span class="darker">In Collection:</span></td>
    <td><?php echo getDuplicates($coinID, $userID) ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><span class="darker">Additional:</span><br />
      <?php echo $additional ?></td>
    </tr>
</table>
</form>
<hr />
<form action="" method="post" name="deleteCoinForm" id="deleteCoinForm" class="compactForm">

<input name="wantlistID" type="hidden" value="<?php echo $wantlistID ?>" />
<input name="deleteCoinFormBtn" type="submit" value="Delete Coin From Want List" onclick="return confirm('Remove From List?')" />
</form>
<hr />

<div id="addCoinDiv">
  <h3>Enter Coin Details</h3>
  <form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td width="178" class="darker">Year &amp; Mint</td>
    <td width="779"><select id="coinID" name="coinID">
<option value="<?php echo $coinID ?>" selected="selected"><?php echo $coinName ?></option>
<?php 
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' ORDER BY coinName DESC") or die(mysql_error()); 
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
    <td><select id="strike" name="strike">
    <option value="<?php echo $WantList->getCoinStrike(); ?>" selected="selected"><?php echo $WantList->getCoinStrike(); ?></option>
      <option value="Business" selected="selected">Business</option>
      <option value="Proof">Proof</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker"><label for="proService">Grading Service</label></td>
    <td><select id="proService" name="proService">
    <option value="<?php echo $WantList->getGrader() ?>" selected="selected"><?php echo $WantList->getGrader() ?></option>
<option value="None">None</option>  
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
  <tr>
    <td class="darker">Grade</td>
    <td><select name="coinGrade">
  <option value="<?php echo $WantList->getCoinGrade(); ?>" selected="selected"><?php echo $WantList->getCoinGrade(); ?></option>  
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
  <option value="PR70">(PR-70) Perfect Proof.</option>
  </select></td>
  </tr>
  <tr>
    <td><strong>Designation</strong></td>
    <td><select name="designation" id="designation">
  <option value="<?php echo $WantList->getDesignation(); ?>" selected="selected"><?php echo $WantList->getDesignation(); ?></option>    
<option value="None">None</option>

<option value="FB">Full Band (FB) - Mercury Head Dimes</option>
<option value="FH">Full Head (FH) - Standing Liberty Quarters</option>
<option value="FS">Full Steps (FS) - Jefferson Nickels</option>
<option value="FBL">Full Bell Lines (FBL) - Franklin Half Dollars</option>
<option value="PL">Proof Like (PL) - Morgan Dollars</option>
<option value="DMPL">Deep Mirror Proof Like (DMPL) - Morgan Dollars</option>
<option value="DCAM">Deep Cameo Proof (DCAM) Proof Coinage</option>
<option value="CAM">Cameo Proof (CAM) - 1950-1970 Proof Coinage</option>
<option value="DC">Deep Cameo Proofs (DC) - 1950-1970 Proof Coinage</option>
<option value="BN">Brown (BN) Less then 5% original red color</option>
<option value="RB">Red and Brown (RB) Between 5% and 95% original red color</option>
<option value="RD">Red (RD)  More than 95% original red color</option>
<option value="SP">Specimen (SP) Struck well like a Proof</option>
</select></td>
  </tr>
  <tr>
    <td><strong>Problem</strong></td>
    <td><select name="problem" id="problem">
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
    <td valign="top"><strong>First Day</strong></td>
    <td><span id="noPriceSpn"><input name="firstday" type="radio" value="1" id="firstdayYes" /> 
      Yes</span><br />
<span id="noPriceSpn"><input name="firstday" type="radio" id="firstdayNo" value="0" checked="checked" /> 
No</span></td>
  </tr>
  <tr>
    <td><strong>Error Type</strong></td>
    <td><select name="errorType" id="errorType">
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
    <td><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add  Coin" /></td>
    <td><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>