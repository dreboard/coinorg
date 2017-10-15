<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["coinType"])) { 
$rawCoinType = strip_tags($_GET["coinType"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
$coinQuery = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinID = $row['coinID'];
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinSubCategory = $row['coinSubCategory'];
  }
  
}

//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$coinID = mysql_real_escape_string($_POST["coinID"]);
$coin-> getCoinById($coinID);
$coinType = $coin->getCoinType();
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$problem = mysql_real_escape_string($_POST["problem"]);
$designation = mysql_real_escape_string($_POST["designation"]);
$strike = mysql_real_escape_string($_POST["strike"]);
$coinVersion = $coin->getCoinVersion();
$proService = mysql_real_escape_string($_POST["proService"]);
$century = $coin->getCentury();

if($_POST['coinNote'] == '') {
	$coinNote = 'None';
} else {
	$coinNote = mysql_real_escape_string($_POST["coinNote"]);
}

$errorType = mysql_real_escape_string($_POST["errorType"]);
$firstday = mysql_real_escape_string($_POST["firstday"]); 

if($_POST['coinID'] == '') {
	$coinID = '0';
} else {
	$coinID = mysql_real_escape_string($_POST["coinID"]);
}

mysql_query("INSERT INTO wantlist(coinID, coinType, coinCategory, coinSubCategory, coinVersion, proService, strike, coinGrade, designation, problem,  coinNote, enterDate, userID, errorType, firstday, century) VALUES('$coinID', '$coinType', '$coinCategory', '$coinSubCategory', '$coinVersion', '$proService', '$strike', '$coinGrade', '$designation', '$problem', '$coinNote', '$theDate', '$userID', '$errorType', '$firstday', '$century')") or die(mysql_error()); 
$wantlistID = mysql_insert_id();

header("location: viewWantDetail.php?wantlistID=$wantlistID");

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
.hdrImg {width:30px; height:30px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	


$("#addCoinForm").submit(function() {
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

<div id="content" class="clear"><h1><img src="../img/<?php echo $rawCoinType ?>.jpg" align="left"  class="hdrImg" />Add <?php echo $coinType ?></h1>
<h3><a href="addCoinRaw.php">Return to Coin Types</a></h3>

<div id="CoinList" class="roundedWhite">
<p class="darker">Recently added <?php echo $coinType; ?> coins to your want list</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="11%">Date</td>
    <td width="55%">Coin</td>
    <td width="11%">Grade</td>   
        <td width="10%">Grader</td>  
    <td width="13%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM wantlist WHERE coinType = '$coinType' AND userID = '$userID' ORDER BY wantlistID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="5">You dont have any '.$coinType.' in  coins In Your Collection</td> 
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
  $coinID = intval($row['coinID']); 
  $wantlistID = intval($row['wantlistID']); 
  $listDate = date("F j, Y",strtotime($row["listDate"]));
  $coinGrade = $row['coinGrade']; 
  $purchasePrice = $row['purchasePrice'];  
  $collectedCoin = new Coin();
  $collectedCoin-> getCoinById($coinID);
  $collection-> getCollectionById($collectionID);
  $collectedCoinName = $collectedCoin->getCoinName();
  $coinPurchaseDate = date("M j, Y",strtotime($collection->getCoinDate()));
  $proService = $row['proService'];  
  $thePageCode = "Go to the view coin page to view this coin";
  //SEND ENCODED COLLECTIONID 
  echo '
<tr>
<td>'.$coinPurchaseDate.'</td> 
<td><a href="viewCoinDetail.php?collectionID='.$collectionID.'">'.$collectedCoinName.'</a></td>
<td>'.$coinGrade.'</td>
<td>'.$proService.'</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>

<div class="clear"></div>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<a name="forms"></a>
<div id="addCoinDiv">
  <h3>Enter Coin Details</h3>
  <form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td width="178" class="darker">Year &amp; Mint</td>
    <td width="779"><select id="coinID" name="coinID">
<option value="">Select Year</option>
<option value="Unknown">Unknown</option>
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
      <option value="Business" selected="selected">Business</option>
      <option value="Proof">Proof</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker"><label for="proService">Grading Service</label></td>
    <td><select id="proService" name="proService">
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
  <tr>
    <td class="darker">Grade</td>
    <td><select name="coinGrade">
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
    <td><select name="designation" id="designation">
<option value="None" selected="selected">None</option>

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


<p>&nbsp;</p>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
