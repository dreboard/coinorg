<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinID"])) { 
$coinID = intval($_GET["coinID"]);
$coin->getCoinById($coinID);
$coinType = $coin->getCoinType();
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();
$coinVersion = $coin->getCoinVersion();
$coinName = $coin->getCoinName();
$rawCoinType = strip_tags(str_replace(' ', '_', $coinType)); 
}

//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

$coinID = mysql_real_escape_string($_POST["coinID"]);
$coin-> getCoinById($coinID);
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();

//ATTRIBUTES
$color = mysql_real_escape_string($_POST["color"]);
$fullAtt = mysql_real_escape_string($_POST["fullAtt"]);
$morganDesignation = mysql_real_escape_string($_POST["morganDesignation"]);
$mintBox = mysql_real_escape_string($_POST["mintBox"]);

if($_POST['coinGrade'] == 'No Grade' || $_POST['coinGrade'] == '') {
	$coinGrade = 'No Grade';
	$coinGradeNum = '0';
} else {
	$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
	$coinGradeNum = preg_replace('#[^0-9]#i', '', $_POST["coinGrade"]); 
}
//SLABBED
$proService = mysql_real_escape_string($_POST["proService"]);
$proSerialNumber = $collection->setToNone($_POST["proSerialNumber"]);	
$slabLabel = $collection->setToNone($_POST["slabLabel"]);
$designation = mysql_real_escape_string($_POST["designation"]);	
$slabCondition = mysql_real_escape_string($_POST["slabCondition"]);
$pcgsVariety = mysql_real_escape_string($_POST["pcgsVariety"]);

////////PURCHASE
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	

$holed = intval($_POST["holed"]);
$cleaned = intval($_POST["cleaned"]);
$altered = intval($_POST["altered"]);
$scratched = intval($_POST["scratched"]);
$damaged = intval($_POST["damaged"]);
$pvc = intval($_POST["pvc"]);
$corrosion = intval($_POST["corrosion"]);
$bent = intval($_POST["bent"]);
$plugged = intval($_POST["plugged"]);
$polished = intval($_POST["polished"]);

if (in_array($_POST["coinID"], $bieCoins)) {
$dieCrack = '1 Die Crack Obverse';
} else {
	$dieCrack = 'None';
}
$bie = mysql_real_escape_string($_POST["bie"]);

if($holed !== '0' || $cleaned !== '0' || $altered !== '0' || $scratched !== '0' || $damaged !== '0' || $pvc !== '0' || $corrosion !== '0' || $bent !== '0' || $plugged !== '0' || $polished !== '0'){
	$problem = '1';	
} else {
	$problem = '0';
}

mysql_query("INSERT INTO collection(coinID, coinNickname, mintMark, holed, cleaned, altered, scratched, damaged, pvc, corrosion, bent, plugged, polished, varietyCoin, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, proService, proSerialNumber, slabCondition, pcgsVariety, strike, slabLabel, coinGrade, coinGradeNum, designation, problem, coinValue, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, errorCoin, byMint, mintBox, century, design, series, designType, showName, showCity, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal, seriesType, color, fullAtt, morganDesignation, varietyType, dieCrack, bie, wddo, ddo, wddr, ddr, coincollectID, coinLotID, containerID) VALUES('$coinID', '".$collection->setToNone($_POST["coinNickname"])."', '".$coin->getMintMark()."', '$holed', '$cleaned', '$altered', '$scratched', '$damaged', '$pvc', '$corrosion', '$bent', '$plugged', '$polished', '".$coin->getVarietyCoin()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '$proService', '$proSerialNumber', '$slabCondition', '$pcgsVariety', '".$coin->getCoinStrike()."', '$slabLabel', '$coinGrade', '$coinGradeNum', '$designation', '$problem', '".$General->setThePrice(mysql_real_escape_string($_POST["coinValue"]))."', '".$General->setTheDate($_POST['purchaseDate'])."', '$purchaseFrom', '$auctionNumber', '".$collection->setToNone($_POST["additional"])."', '".$General->setThePrice(mysql_real_escape_string($_POST["purchasePrice"]))."', '$ebaySellerID', '$shopName', '$shopUrl', '".$collection->setToNone($_POST["coinNote"])."', '$theDate', '$userID', '0', '".$coin->getByMint()."', '$mintBox', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '$showName', '$showCity', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."', '".$coin->getCoinSeriesType()."', '$color', '$fullAtt', '$morganDesignation', '".$coin->getVarietyType()."', '$dieCrack', '$bie', '".mysql_real_escape_string($_POST["wddo"])."', '".mysql_real_escape_string($_POST["ddo"])."', '".mysql_real_escape_string($_POST["wddr"])."', '".mysql_real_escape_string($_POST["ddr"])."', '".mysql_real_escape_string($_POST["coincollectID"])."', '".mysql_real_escape_string($_POST["coinLotID"])."', '".mysql_real_escape_string($_POST["containerID"])."')") or die(mysql_error()); 	

$collectionID = mysql_insert_id();

//Create collection folder
if ( !file_exists($userID.'/coins/'.$collectionID) ) {
    mkdir($userID.'/coins/'.$collectionID, 0755, true);
}

//////////add file
if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID.'/coins/'.$collectionID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID.'/coins/'.$collectionID."/" . str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
}
}
if(!empty($_FILES['file2']['tmp_name'])){	
if($_FILES['file2']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file2']['name']));
$Upload->SetTempName($_FILES['file2']['tmp_name']);
$Upload->SetUploadDirectory($userID.'/coins/'.$collectionID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic2 = $userID.'/coins/'.$collectionID."/" . str_replace(' ', '_', $_FILES['file2']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic2 = '$coinPic2' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
}
}
if(!empty($_FILES['file3']['tmp_name'])){	
if($_FILES['file3']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file3']['name']));
$Upload->SetTempName($_FILES['file3']['tmp_name']);
$Upload->SetUploadDirectory($userID.'/coins/'.$collectionID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic3 = $userID.'/coins/'.$collectionID."/" . str_replace(' ', '_', $_FILES['file3']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic3 = '$coinPic3' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
}
}
if(!empty($_FILES['file4']['tmp_name'])){	
if($_FILES['file4']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file4']['name']));
$Upload->SetTempName($_FILES['file4']['tmp_name']);
$Upload->SetUploadDirectory($userID.'/coins/'.$collectionID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic4 = $userID.'/coins/'.$collectionID."/" . str_replace(' ', '_', $_FILES['file4']['name']);
$fileQuery = mysql_query("UPDATE collection SET coinPic4 = '$coinPic4' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
}
}

header("location: viewCoinDetail.php?ID=".$Encryption->encode($collectionID)."");

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add A Coin</title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){	
$("#waitMsg, #labelRow, #serialNumRow, #slabConditionRow, #designationRow, #showDetails, .detailDiv2, #pcgsVarietyRow, #ngcDetailsRow, #ngcDesignationRow, .imageRows").hide();

$("#proService").change(function() {
	$("#labelRow, #serialNumRow, #slabConditionRow, #designationRow").show();
   if (this.value == 'PCGS'){
      $('#pcgsVarietyRow').show();
   } else {
      $('#pcgsVarietyRow').hide();
   }
      if (this.value == 'NGC'){
      $('#ngcDetailsRow, #ngcDesignationRow').show();
   } else {
      $('#ngcDetailsRow, #ngcDesignationRow').hide();
   }
});	

$("#addCoinForm").submit(function() {
	var errorType = $('#errorType').val();
      if($("#coinID").val() == "")  {
		$("#errorMsg").text("Select a Coin.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#coinID").addClass("errorTxt");
      return false;
      } else {
		  $("#addCoinFormBtn").prop('value', 'Saving Coin...');
	  return true;
	  }
});
$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	


$("#button1").click(function() {
	$('#image2Row').show();
});	
$("#button2").click(function() {
	$('#image3Row').show();
});
$("#button3").click(function() {
	$('#image4Row').show();
});

});
</script> 
<style>
.noShow {
    display: none;
}
</style> 
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
<div class="container fill-height">
<h2><img class="hidden-xs" src="../img/<?php echo strip_tags(str_replace(' ', '_', $coinVersion)) ?>.jpg" align="absmiddle"  width="90" height="90" />&nbsp;Add <?php echo $coinName ?> <?php echo $coinType; ?></h2>

<div class="table-responsive  hidden-xs">  
<table class="table table-hover">
    <tr class="setThreeRow">
    <td width="26%" valign="top"><a role="button" class="btn btn-primary" href="addCoinRaw.php">Return to Coin Types</a></td>
    <td width="52%" valign="top"><a role="button" class="btn btn-primary" href="addCoinTypeMultiByID.php?coinID=<?php echo $coinID; ?>"> Add Multiple <?php echo $coinName; ?></a></td>
    <td width="22%" align="right" valign="middle"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type</option>
      <optgroup label="Half Cents">
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="addCoinType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="addCoinType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="addCoinType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="addCoinType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="addCoinType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="addCoinType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Small Cents">
        <option value="addCoinType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="addCoinType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="addCoinType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="Three_Cent">Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="addCoinType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="addCoinType.php?coinType=Shield_Nickel">Flowing Hair Large Cent</option>
        <option value="addCoinType.php?coinType=Indian_Head">Indian Head</option>
        <option value="addCoinType.php?coinType=Lincoln_Wheat">Draped Bust Large Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Memorial">Classic Head Large Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial Series</option>
        <option value="addCoinType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="addCoinType.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="addCoinType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="addCoinType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="addCoinType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="Twenty Cents">Twenty Cent Piece</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="addCoinType.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="addCoinType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="addCoinType.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="addCoinType.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="addCoinType.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="addCoinType.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="addCoinType.php?coinType=State Quarter">State Quarter</option>
        <option value="addCoinType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="addCoinType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="addCoinType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="addCoinType.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="addCoinType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="addCoinType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="addCoinType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="addCoinType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="addCoinType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="addCoinType.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="addCoinType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="addCoinType.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="addCoinType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="addCoinType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="addCoinType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="addCoinType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
    </tr>
  </table>
</div>

<table class="table visible-xs">
  <tr>
    <td><a role="button" class="btn btn-primary btn-block" href="addCoinRaw.php">Return to Coin Types</a></td>
  </tr>
  <tr>
    <td><a role="button" class="btn btn-primary btn-block" href="addCoinTypeMultiByID.php?coinID=<?php echo $coinID; ?>"> Add Multiple <?php echo $coinName; ?></a></td>
  </tr>
  <tr>
    <td><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type</option>
      <optgroup label="Half Cents">
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="addCoinType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="addCoinType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="addCoinType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="addCoinType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="addCoinType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="addCoinType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Small Cents">
        <option value="addCoinType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="addCoinType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="addCoinType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="Three_Cent">Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="addCoinType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="addCoinType.php?coinType=Shield_Nickel">Flowing Hair Large Cent</option>
        <option value="addCoinType.php?coinType=Indian_Head">Indian Head</option>
        <option value="addCoinType.php?coinType=Lincoln_Wheat">Draped Bust Large Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Memorial">Classic Head Large Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial Series</option>
        <option value="addCoinType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="addCoinType.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="addCoinType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="addCoinType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="addCoinType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="Twenty Cents">Twenty Cent Piece</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="addCoinType.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="addCoinType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="addCoinType.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="addCoinType.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="addCoinType.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="addCoinType.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="addCoinType.php?coinType=State Quarter">State Quarter</option>
        <option value="addCoinType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="addCoinType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="addCoinType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="addCoinType.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="addCoinType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="addCoinType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="addCoinType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="addCoinType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="addCoinType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="addCoinType.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="addCoinType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="addCoinType.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="addCoinType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="addCoinType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="addCoinType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="addCoinType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>
</table>



<h2>Coin Details</h2>
<form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm" class="form-horizontal" role="form">

  <div class="form-group">
    <label for="nickname" class="col-sm-2 control-label">Nickname</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nickname" placeholder="Descriptive Name For Coin">
    </div>
  </div>


  <div class="form-group">
    <label for="coinGrade" class="col-sm-2 control-label">Grade</label>
    <div class="col-sm-10">
      <?php include("../inc/coinGrade/".$coin->getCoinStrike()."List.php"); ?>
    </div>
  </div>


  <div class="form-group">
    <label for="color" class="col-sm-2 control-label">Color</label>
    <div class="col-sm-10">
      <select  class="form-control" name="color" id="color">
      <?php if(isset($_POST["color"])){echo '<option value="'.$_POST["color"].'" selected="selected">'.$_POST["color"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
      <option value="BN">Brown (BN) Less then 5% original red color</option>
      <option value="RB">Red and Brown (RB) Between 5% and 95% original red color</option>
      <option value="RD">Red (RD)  More than 95% original red color</option>
    </select>
    </div>
  </div>


 <?php if ($coin->getCoinType() == 'Indian Head' && $coin->getSnow() != 'None') {?>
  <div class="form-group">
    <label for="snow" class="col-sm-2 control-label">snow</label>
    <div class="col-sm-10">
 <select  class="form-control" name="snow" id="snow">
      <?php if(isset($_POST["snow"])){echo '<option value="'.$_POST["snow"].'" selected="selected">'.$_POST["snow"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
  <?php
  $snowNums = explode(',',$coin->getSnow());
  foreach($snowNums as $key) {    
    echo '<option value="'.$key.'">'.$key.'</option>';    
}
  ?>    
</select>
    </div>
  </div>
<?php } else {
	echo '<input type="hidden" name="snow" value="None" class="noShow" />';
	 }  ?> 


  <?php if (in_array($coin->getCoinID(), $bieCoins)){?>  
  <div class="form-group">
    <label for="bie" class="col-sm-2 control-label">BIE Type</label>
    <div class="col-sm-10">
      <select  class="form-control" name="bie" id="bie">
      <?php if(isset($_POST["bie"])){echo '<option value="'.$_POST["bie"].'" selected="selected">'.$_POST["bie"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
      <option value="Full">Full</option>
      <option value="Partial">Partial</option>
    </select>
    </div>
  </div>
<?php } else {
	echo '<input type="hidden" name="bie" value="None" class="noShow" />';
	 }  ?> 


 <?php if ($coin->getVarietyType() == 'DDO') {?> 
  <div class="form-group">
    <label for="ddo" class="col-sm-2 control-label">DDO</label>
    <div class="col-sm-10">
      <select  class="form-control" name="ddo" id="ddo">
          <?php if(isset($_POST["ddo"])){echo '<option value="'.$_POST["ddo"].'" selected="selected">'.$_POST["ddo"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
<?php $d = explode(',', $coin->getCoinDDO());
foreach ($d as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>'; 
         }?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="wddo" class="col-sm-2 control-label">WDDO</label>
    <div class="col-sm-10">
      <select  class="form-control" name="wddo" id="wddo">
          <?php if(isset($_POST["wddo"])){echo '<option value="'.$_POST["wddo"].'" selected="selected">'.$_POST["wddo"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
<?php $d = explode(',', $coin->getCoinWDDO());
foreach ($d as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>'; 
         }?>
    </select>
    </div>
  </div>
 <?php } else {
	echo '<input type="hidden" name="ddo" value="None" class="noShow" /><input type="hidden" name="wddo" value="None" class="noShow" />';
	 }  ?> 


<?php if ($coin->getVarietyType() == 'DDR') {?> 
  <div class="form-group">
    <label for="ddr" class="col-sm-2 control-label">DDR</label>
    <div class="col-sm-10">
      <select  class="form-control" name="ddr" id="ddr">
          <?php if(isset($_POST["ddr"])){echo '<option value="'.$_POST["ddr"].'" selected="selected">'.$_POST["ddr"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
<?php $d = explode(',', $coin->getCoinDDR());
foreach ($d as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>'; 
         }?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="wddr" class="col-sm-2 control-label">WDDR</label>
    <div class="col-sm-10">
      <select  class="form-control" name="wddr" id="wddr">
          <?php if(isset($_POST["wddr"])){echo '<option value="'.$_POST["wddr"].'" selected="selected">'.$_POST["wddr"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
<?php $d = explode(',', $coin->getCoinWDDR());
foreach ($d as $value) {
	echo '<option value="'.$value.'">'.$value.'</option>'; 
         }?>
    </select>
    </div>
  </div>
 <?php } else {
	echo '<input type="hidden" name="ddr" value="None" class="noShow" /><input type="hidden" name="wddr" value="None" class="noShow" />';
	 }  ?> 


 <?php if ($coin->getVarietyType() == 'RPM') {?>  
  <div class="form-group">
    <label for="rpmDirection" class="col-sm-2 control-label">RPM</label>
    <div class="col-sm-10">
<select name="rpmDirection"  class="form-control">
      <?php if(isset($_POST["rpmDirection"])){echo '<option value="'.$_POST["rpmDirection"].'" selected="selected">'.$_POST["rpmDirection"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
      <option value="North">North</option>
      <option value="South">South</option>
       <option value="East">East</option>
      <option value="West">West</option>    
      <option value="Northeast">Northeast</option>
      <option value="Northwest">Northwest</option>
       <option value="Southeast">Southeast</option>
      <option value="Southwest">Southwest</option>        
      <option value="North">North</option>
      <option value="South">South</option>
       <option value="East">East</option>
      <option value="West">West</option>     
    </select>
    </div>
  </div>
<?php } else {
	echo '<input type="hidden" name="rpmDirection" value="None" class="noShow" />';
	 }  ?> 


<div class="form-group">
 <?php if (in_array($coin->getCoinType(), $fullTypes) && $coin->getCoinStrike() == 'Business') {?>          
    <label for="fullAtt" class="col-sm-2 control-label">Full Attribute</label>
    <div class="col-sm-10">
<select class="form-control" name="fullAtt" id="fullAtt">
      <?php if(isset($_POST["fullAtt"])){echo '<option value="'.$_POST["fullAtt"].'" selected="selected">'.$_POST["fullAtt"].'</option>';} else {
		echo '<option value="None" selected="selected">Select</option>';}?>
        
<?php if ($coin->getCoinType() == 'Jefferson Nickel'){ ?>        
<option value="6FS">6 Full Steps</option>
<option value="5FS">5 Full Steps</option>
<option value="FS">Full Steps</option>
<?php }?>
<?php if ($coin->getCoinType() == 'Standing Liberty'){ ?>    
<option value="FH">Full Head</option>
<?php }?>
<?php if ($coin->getCoinType() == 'Winged Liberty Dime'){ ?>   
<option value="FB">Full Band</option>
<?php }?>
<?php if ($coin->getCoinType() == 'Roosevelt Dime'){ ?>   
<option value="FB">Full Band</option>
<option value="FT">Full Torch</option>
<?php }?>
<?php if ($coin->getCoinType() == 'Franklin Half Dollar'){ ?>   
<option value="FBL">Full Bell Lines</option>
<?php }?>
    </select>
    </div>
  </div>
<?php } else {
	echo '<input type="hidden" name="fullAtt" value="None" class="noShow" />';
	 }  ?> 


<?php if ($coin->getCoinType() == 'Morgan Dollar' && $coin->getCoinStrike() == 'Business'){ ?>   
  <div class="form-group">
    <label for="morganDesignation" class="col-sm-2 control-label">Proof Like</label>
    <div class="col-sm-10">
      <select name="morganDesignation" class="form-control">
      <?php if(isset($_POST["morganDesignation"])){echo '<option value="'.$_POST["morganDesignation"].'" selected="selected">'.$_POST["morganDesignation"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
<option value="SPL">Semi-Prooflike (SPL)</option>
<option value="PL">Proof Like (PL)</option>
<option value="DMPL">Deep Mirror Proof Like (DMPL)</option>
<option value="UPL">Ultra Prooflike (UPL)</option>
    </select>
    </div>
  </div>
<?php } else {
	echo '<input type="hidden" name="morganDesignation" value="None" class="noShow" />';
	 }  ?>  


  <div class="form-group">
    <label for="toned" class="col-sm-2 control-label">Toned</label>
    <div class="col-sm-10">
      <select name="toned" class="form-control">
      <?php if(isset($_POST["toned"])){echo '<option value="'.$_POST["toned"].'" selected="selected">'.$_POST["toned"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
<option value="Gray">Gray</option>
<option value="Gold">Gold</option>
<option value="Rainbow">Rainbow</option>
<option value="UPL">Reddish Orange</option>
<option value="Blue">Blue</option>
    </select>
    </div>
  </div>


<?php if (strpos($coin->getCoinType(), 'Commemorative') !== false){ ?>
  <div class="form-group">
    <label for="mintBox" class="form-control">Presentation Box</label>
    <div class="col-sm-10">
     <select name="mintBox" id="mintBox">
     <?php if(isset($_POST["mintBox"])){echo '<option value="'.$_POST["mintBox"].'" selected="selected">'.$_POST["mintBox"].'</option>';} else {
		echo '<option value="Yes" selected="selected">Yes</option>';}?>  
      <option value="No">No</option>
    </select>
    </div>
  </div>
<?php } else { echo ''; }  ?> 


 <h2>Certified Details</h2>  
 
  <div class="form-group">
    <label for="proService" class="col-sm-2 control-label">Grade</label>
    <div class="col-sm-10">
      <select class="form-control" name="proService" id="proService">
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
    </div>
  </div>


  <div class="form-group" id="labelRow">
    <label for="proSerialNumber" class="col-sm-2 control-label">Serial Number</label>
    <div class="col-sm-10">
    <input class="form-control" name="proSerialNumber" type="text" id="proSerialNumber" value="<?php if(isset($_POST["proSerialNumber"])){echo $_POST["proSerialNumber"];} else {echo "";}?>" size="70" />
    </div>
  </div>


  <div class="form-group" id="slabConditionRow">
    <label for="slabCondition" class="col-sm-2 control-label">Slab Condition</label>
    <div class="col-sm-10">
      <select id="slabCondition" class="form-control">
    <?php if(isset($_POST["slabCondition"])){echo '<option value="'.$_POST["slabCondition"].'" selected="selected">'.$_POST["slabCondition"].'</option>';} else {
		echo '<option value="" selected="selected">Choose</option>';}?>
        <option value="Excellent">Excellent</option>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select>
    </div>
  </div>


  <div class="form-group" id="designationRow">
    <label for="designation" class="col-sm-2 control-label">Designation</label>
    <div class="col-sm-10">
      <select id="designation" class="form-control">
 <?php if(isset($_POST["designation"])){echo '<option value="'.$_POST["designation"].'" selected="selected">'.$_POST["designation"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>  
<?php if ($coin->getCoinStrike() == 'Proof'){ ?>    
<option value="DCAM">Deep Cameo Proof (DCAM)</option>
<option value="CAM">Cameo Proof (CAM)</option>
<?php }?>
<option value="SP">Specimen (SP) Struck well like a Proof</option>
<option value="Genuine">Genuine</option>
<option value="Sample">Sample</option>
<option value="Authentic">Authentic</option>
    </select>
    </div>
  </div>


  <div class="form-group" id="pcgsVarietyRow">
    <label for="pcgsVariety" class="col-sm-2 control-label">Variety</label>
    <div class="col-sm-10">
      <select id="pcgsVariety" class="form-control">
 <?php if(isset($_POST["pcgsVariety"])){echo '<option value="'.$_POST["pcgsVariety"].'" selected="selected">'.$_POST["pcgsVariety"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>       
<option value="Minor Variety">Minor Variety</option>
<option value="Major Variety">Major Variety</option>
    </select>
    </div>
  </div>


  <div class="form-group" id="ngcDesignationRow">
    <label for="ngcDesignation" class="col-sm-2 control-label">Additional</label>
    <div class="col-sm-10">
      <select id="ngcDesignation" class="form-control">
 <?php if(isset($_POST["ngcDesignation"])){echo '<option value="'.$_POST["ngcDesignation"].'" selected="selected">'.$_POST["ngcDesignation"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>       
<option value="FIRST DAY OF ISSUE">FIRST DAY OF ISSUE</option>
<option value="FIRST DAY CEREMONY">FIRST DAY CEREMONY</option>
<option value="FIRST YEAR OF ISSUE">FIRST YEAR OF ISSUE</option>
<option value="FIRST STRIKES">FIRST STRIKES</option>
<option value="NUMBERED FIRST STRUCK EDITION">NUMBERED FIRST STRUCK EDITION</option>
    </select>
    </div>
  </div>


  <div class="form-group" id="ngcDetailsRow">
    <label for="ngcDetail" class="col-sm-2 control-label">Details</label>
    <div class="col-sm-10">
      <select id="ngcDetail" class="form-control">
 <?php if(isset($_POST["ngcDetail"])){echo '<option value="'.$_POST["ngcDetail"].'" selected="selected">'.$_POST["ngcDetail"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>       
<option value="UNC DETAILS (Uncirculated)">UNC DETAILS (Uncirculated)</option>
<option value="AU DETAILS (About Uncirculated)">AU DETAILS (About Uncirculated)</option>
<option value="XF DETAILS (Extremely Fine)">XF DETAILS (Extremely Fine)</option>
<option value="VF DETAILS (Very Fine)">VF DETAILS (Very Fine)</option>
<option value="F DETAILS (Fine)">F DETAILS (Fine) </option>
<option value="VG DETAILS (Very Good)">VG DETAILS (Very Good)</option>
<option value="G DETAILS (Good)">G DETAILS (Good) </option>
<option value="AG DETAILS (About Good)">AG DETAILS (About Good)</option>
<option value="FA DETAILS (Fair)">FA DETAILS (Fair) </option>
<option value="PR DETAILS (Poor)">PR DETAILS (Poor) </option>
<option value="Mint Error UNC DETAILS">Mint Error UNC DETAILS</option>
    </select>
    </div>
  </div>

<h2>Condition</h2>problem

<div class="well" id="problemBox">

<div class="checkbox">
  <label>
    <input type="checkbox" value="1" name="cleaned">
    Cleaned
  </label>
</div>

<div class="checkbox">
  <label>
    <input type="checkbox" value="1" name="holed">
    Holed
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="1" name="altered">
   Altered
  </label>
</div>

<div class="checkbox">
  <label>
    <input type="checkbox" value="1" name="scratched">
   Scratched
  </label>
</div>

<div class="checkbox">
  <label>
    <input type="checkbox" value="1" name="pvc">
   PVC Damage
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="1" name="corrosion">
   Corrosion
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="1" name="bent">
    Bent
  </label>
</div>

<div class="checkbox">
  <label>
    <input type="checkbox" value="1" name="plugged">
    Plugged
  </label>
</div>
<div class="checkbox">
  <label>
    <input type="checkbox" value="1" name="polished">
   Polished
  </label>
</div>
</div><!--/End checkbox well-->

<h2>Purchase Details</h2> 
  <div class="form-group">
    <label for="purchasePrice" class="col-sm-2 control-label">Purchase Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="purchasePrice" placeholder="Descriptive Name For Coin">
    </div>
  </div>


  <div class="form-group">
    <label for="purchasePrice" class="col-sm-2 control-label">Purchase Price</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="purchasePrice" placeholder="Descriptive Name For Coin">
    </div>
  </div>





























</form>
  <div class="visible-xs">    
    <br />
</div>

 
<!--Content Below-->
  
 
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>