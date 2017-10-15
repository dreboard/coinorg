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
  $coinCategory = $row['coinCategory'];
  }
}


if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['coinID'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Coin';
} else {


if($_POST["coinID"] == '9999'){
	
} else {	
$coinID = mysql_real_escape_string($_POST["coinID"]);
}

$coin-> getCoinById($coinID);
$coinSubCategory = $coin->getCoinSubCategory();
$coinCategory = $coin->getCoinCategory();

$coinNickname =  $collection->setBlankNickname(mysql_real_escape_string($_POST["coinNickname"]), $coinID, $userID);

//ATTRIBUTES
$color = mysql_real_escape_string($_POST["color"]);
$fullAtt = mysql_real_escape_string($_POST["fullAtt"]);

if($coin->getCoinStrike() == 'Business'){
$morganDesignation = mysql_real_escape_string($_POST["morganDesignation"]);
} else {
	$morganDesignation = 'None';
}

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


////////ADDITIONAL
if($_POST['coinNote'] == '') {
	$coinNote = 'None';
} else {
	$coinNote = mysql_real_escape_string($_POST["coinNote"]);
}


////////PURCHASE
if($_POST['purchasePrice'] == '') {
	$purchasePrice = '0.00';
} else {
	$purchasePrice = mysql_real_escape_string($_POST["purchasePrice"]);
}

if($_POST['coinValue'] == '') {
	$coinValue = '0.00';
} else {
	$coinValue = mysql_real_escape_string($_POST["coinValue"]);
}

if($_POST['purchaseDate'] == '') {
	$purchaseDate = date("Y-m-d");
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
}

$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$additional = $collection->setToNone($_POST["additional"]);	
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

if (in_array(intval($_POST["coinID"]), $bieCoins)) {
$dieCrack = '1 Die Crack Obverse';
} else {
	$dieCrack = 'None';
}

if($holed !== '0' || $cleaned !== '0' || $altered !== '0' || $scratched !== '0' || $damaged !== '0' || $pvc !== '0' || $corrosion !== '0' || $bent !== '0' || $plugged !== '0' || $polished !== '0'){
	$problem = '1';	
} else {
	$problem = '0';
}

mysql_query("INSERT INTO collection(coinID, coinNickname, mintMark, holed, cleaned, altered, scratched, damaged, pvc, corrosion, bent, plugged, polished, varietyCoin, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, proService, proSerialNumber, slabCondition, pcgsVariety, strike, slabLabel, coinGrade, coinGradeNum, designation, problem, coinValue, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, errorCoin, byMint, mintBox, century, design, series, designType, showName, showCity, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal, seriesType, color, fullAtt, morganDesignation, varietyType, dieCrack) VALUES('$coinID', '$coinNickname', '".$coin->getMintMark()."', '$holed', '$cleaned', '$altered', '$scratched', '$damaged', '$pvc', '$corrosion', '$bent', '$plugged', '$polished', '".$coin->getVarietyCoin()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '$proService', '$proSerialNumber', '$slabCondition', '$pcgsVariety', '".$coin->getCoinStrike()."', '$slabLabel', '$coinGrade', '$coinGradeNum', '$designation', '$problem', '$coinValue', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '0', '".$coin->getByMint()."', '$mintBox', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '$showName', '$showCity', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."', '".$coin->getCoinSeriesType()."', '$color', '$fullAtt', '$morganDesignation', '".$coin->getVarietyType().", $dieCrack')") or die(mysql_error()); 	
$collectionID = mysql_insert_id();

//Create collection folder
if ( !file_exists($userID.'/'.$collectionID) ) {
    mkdir($userID.'/'.$collectionID, 0755, true);
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
#addCoinFormBtn {font-size:20px;}
#faq {cursor:pointer;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
var coinType = '<?php echo str_replace('_', ' ', strip_tags($_GET["coinType"])); ?>';
$("#waitMsg, #labelRow, #serialNumRow, #slabConditionRow, #designationRow, #showDetails, .detailDiv2, #pcgsVarietyRow, #ngcDetailsRow, #ngcDesignationRow, .imageRows").hide();

$("#coinID").change(function () {
    $('#waitMsg').show();
    var dataString = $(this).val();
    $.ajax({
        url: "_coinSelects.php?coinID=" + dataString,
        success: function (result) {
            $('#waitMsg').hide();
            $("#coinGrade").html(result);
        }
    });
});


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
$("select").change(function() {
	$(this).removeClass("errorTxt");
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
   
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear"><h1><img src="../img/<?php echo $rawCoinType ?>.jpg" align="absmiddle"  id="addtypeImg" />&nbsp;Add <?php echo $coinType ?></h1>
<div class="clear"></div>
  <table width="100%" border="0">
    <tr>
    <td width="26%" valign="top"><h3><a href="addCoinRaw.php">Return to Coin Types</a></h3></td>
    <td width="52%" valign="top"><h3><a href="addCoinTypeMulti.php?coinType=<?php echo $rawCoinType; ?>"> Multiple <?php echo $coinType; ?></a></h3></td>
    <td width="22%" align="right" valign="middle"><select id="select" name="select2" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
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
      <optgroup label="Cents">
        <option value="addCoinType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="addCoinType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="addCoinType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="addCoinType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="addCoinType.php?coinType=Two_Cent_Piece">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="addCoinType.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="addCoinType.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="addCoinType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="addCoinType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="addCoinType.php?coinType=Shield_Nickel">Shield</option>
        <option value="addCoinType.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="addCoinType.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="addCoinType.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="addCoinType.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="addCoinType.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="addCoinType.php?coinType=Draped_Bust_Dime">Drapped Bust Dime</option>
        <option value="addCoinType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="addCoinType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="addCoinType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="addCoinType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="addCoinType.php?coinCategory=Twenty_Cent_Piece">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="addCoinType.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="addCoinType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="addCoinType.php?coinType=Seated_Liberty_Quarter">Liberty Seated Quarter</option>
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

<div id="CoinList">
<p class="darker">Recently added <?php echo $coinType; ?> coins In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="11%">Date</td>
    <td width="55%">Coin</td>
    <td width="11%">Grade</td>   
        <td width="10%">Grader</td>  
    <td width="13%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND userID = '$userID' ORDER BY collectionID DESC LIMIT 5") or die(mysql_error());

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
  $collectionID = $row['collectionID']; 
  $purchaseDate = date("F j, Y",strtotime($row["purchaseDate"]));
  $coinGrade = $row['coinGrade']; 
  $purchasePrice = $row['purchasePrice'];  
  $collectedCoin = new Coin();
  $collectedCoin-> getCoinById($coinID);
  $collection-> getCollectionById($collectionID);
  $collectedCoinName = $collectedCoin->getCoinName();
  $coinPurchaseDate = date("M j, Y",strtotime($collection->getCoinDate()));
  $proService = $row['proService'];  
  echo '
<tr>
<td>'.$coinPurchaseDate.'</td> 
<td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'">'.substr($collectedCoinName, 0, 40).' '.substr($collection->getVarietyForCoin(intval($collectionID)), 0, 30).'</a></td>
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

<hr class="clear" />

<?php 

switch ($coinType)
{
case "Lincoln Wheat":?>
   <h3 id="faq">What Coin Do I Have <img src="../img/faq.jpg" width="40" height="40" align="absmiddle" /></h3> 
  <div class="whatDoDiv">

 <table width="100%" border="0">
  <tr>
    <td width="24%"><a href="http://www.lincolncentresource.com/1928mintmarks.html" target="_blank">1928 Large/Small S</a></td>
    <td width="76%">&nbsp;</td>
  </tr>
  <tr>
    <td><a href="http://www.lincolncentresource.com/1922Ddievarieties.html" target="_blank">1922 No D and Weak D</a></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><a href="http://www.lincolncentresource.com/San_Fransisco_Mintmark_Styles.html" target="_blank">San Fransisco Mintmark Styles</a></td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td><a href="http://www.traildies.com/" target="_blank">Trail Dies</a></td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
  </div>
  
<?php break;	
case "Lincoln Memorial":?>
   <h2 id="faq">What Coin Do I Have <img src="../img/faq.jpg" width="40" height="40" align="absmiddle" /></h2> 
  <div class="whatDoDiv">

 <table width="100%" border="0">
  <tr>
    <td width="24%"><a href="http://www.lincolncentresource.com/smalldates/1960smalldate.html" target="_blank">1960 Large/Small Date</a></td>
    <td width="76%"><a href="http://www.lincolncentresource.com/wideams.html" target="_blank">Wide AM and Close AM</a></td>
  </tr>
  <tr>
    <td><a href="http://www.lincolncentresource.com/smalldates/1974.html" target="_blank">1974 Large/Small Dates</a></td>
    <td><a href="http://www.traildies.com/" target="_blank">Trail Dies</a></td>
  </tr>
  <tr>
    <td><a href="http://www.lincolncentresource.com/smalldates/1970Ssmalldate.html" target="_blank">1970 Large/Small Date</a></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><a href="http://www.lincolncentresource.com/smalldates/1982.html" target="_blank">1982 Large/Small Date</a></td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td><a href="http://www.lincolncentresource.com/smalldates/1970Ssmalldate.html" target="_blank">1979 Type I/II</a></td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td><a href="http://www.lincolncentresource.com/smalldates/1970Ssmalldate.html" target="_blank">1981 Type I/II</a></td>
    <td>&nbsp;</td>
    </tr>
</table>
  </div>
  
<?php break;
case "Seated Liberty Dime":?>
   <h2 id="faq">What Coin Do I Have <img src="../img/faq.jpg" width="40" height="40" align="absmiddle" /></h2> 
  <div class="whatDoDiv">

 <table width="100%" border="0">
  <tr>
    <td width="41%"><a href="http://www.lincolncentresource.com/smalldates/1960smalldate.html" target="_blank">O, S &amp; CC Large/Small Mintmark</a></td>
    <td width="59%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
  </div>
<?php break;
case "Two Cent Piece":
  echo "The small motto is relatively rare. On the small motto, the letters are not quite bold and the spacing is wider. The large motto has bold letters and smaller spacing";
  break;
case "green":
  echo "";
  break;
default:
  echo "";
}
?>



<div id="addCoinDiv">
  <form action="" method="post" enctype="multipart/form-data" name="addCoinForm" id="addCoinForm">
  <h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Coin Details</h2>
<table width="979" border="0" cellpadding="3" class="addCoinTbl">
  <tr class="darker">
    <td colspan="2" class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';
}
 ?></td>
    </tr>
  <tr>
    <td><label for="coinNickname">Nickname</label></td>
    <td>
      <input name="coinNickname" type="text" id="coinNickname" size="80" value="<?php if(isset($_POST["coinNickname"])){echo $_POST["coinNickname"];} else {echo "";}?>" /></td>
  </tr>
  <tr>
    <td width="178"><label for="coinID">Year &amp; Mint</label></td>
    <td><select id="coinID" name="coinID">
<!--<option value="" selected="selected">Select Year</option>-->
 <?php if(isset($_POST["coinID"])){echo '<option value="'.$_POST["coinID"].'" selected="selected">'.$_POST["coinID"].'</option>';} else {
		echo '<option value="" selected="selected">Select Year</option>';}?>
<option value="9999">Unknown Date</option>
<option value="9998">Blank Planchet</option>
<option value="9997">Waffled</option>
<?php 
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' AND coinYear <= ".date('Y')." ORDER BY coinName DESC") or die(mysql_error()); 
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
    <td><label for="coinGrade">Grade</label></td>
    <td><select name="coinGrade" id="coinGrade">
    <?php if(isset($_POST["coinGrade"])){echo '<option value="'.$_POST["coinGrade"].'" selected="selected">'.$_POST["coinGrade"].'</option>';} else {
		echo '<option value="No Grade" selected="selected">No Grade</option>';}?>
<!--<option value="No Grade" selected="selected">No Grade </option>-->

</select>&nbsp;<span id="waitMsg">Generating Grades.....</span></td>
  </tr>

 <?php if (in_array($coin->getCategoryByType(str_replace('_', ' ', strip_tags($_GET["coinType"]))), $colorCategories)) {?>    
  <tr>
    <td><label for="color">Color</label></td>
    <td><select name="color" id="color">
    
      <?php if(isset($_POST["color"])){echo '<option value="'.$_POST["color"].'" selected="selected">'.$_POST["color"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
      <option value="BN">Brown (BN) Less then 5% original red color</option>
      <option value="RB">Red and Brown (RB) Between 5% and 95% original red color</option>
      <option value="RD">Red (RD)  More than 95% original red color</option>
    </select></td>
  </tr>
<?php } else {
	echo '<input type="hidden" name="color" value="None" />';
	 }  ?> 

 <?php if (in_array(str_replace('_', ' ', strip_tags($_GET["coinType"])), $fullTypes)) {?>   
  <tr>
    <td><label for="fullAtt">Full Attribute</label></td>
    <td><select name="fullAtt" id="fullAtt">
      <?php if(isset($_POST["fullAtt"])){echo '<option value="'.$_POST["fullAtt"].'" selected="selected">'.$_POST["fullAtt"].'</option>';} else {
		echo '<option value="None" selected="selected">Select</option>';}?>
        
<?php if (str_replace('_', ' ', strip_tags($_GET["coinType"])) == 'Jefferson Nickel'){ ?>        
<option value="6FS">6 Full Steps</option>
<option value="5FS">5 Full Steps</option>
<option value="FS">Full Steps</option>
<?php }?>
<?php if (str_replace('_', ' ', strip_tags($_GET["coinType"])) == 'Standing Liberty'){ ?>    
<option value="FH">Full Head</option>
<?php }?>
<?php if (str_replace('_', ' ', strip_tags($_GET["coinType"])) == 'Winged Liberty Dime'){ ?>   
<option value="FB">Full Band</option>
<?php }?>
<?php if (str_replace('_', ' ', strip_tags($_GET["coinType"])) == 'Roosevelt Dime'){ ?>   
<option value="FB">Full Band</option>
<option value="FT">Full Torch</option>
<?php }?>
<?php if (str_replace('_', ' ', strip_tags($_GET["coinType"])) == 'Franklin Half Dollar'){ ?>   
<option value="FBL">Full Bell Lines</option>
<?php }?>

    </select></td>
  </tr>
<?php } else {
	echo '<input type="hidden" name="fullAtt" value="None" />';
	 }  ?> 

<?php if ($coinType == 'Morgan Dollar'){ ?> 
  <tr>
    <td><label for="morganDesignation">Proof Like</label></td>
    <td><select name="morganDesignation" id="morganDesignation">
      <?php if(isset($_POST["morganDesignation"])){echo '<option value="'.$_POST["morganDesignation"].'" selected="selected">'.$_POST["morganDesignation"].'</option>';} else {
		echo '<option value="None" selected="selected">No</option>';}?>
 
<option value="SPL">Semi-Prooflike (SPL)</option>
<option value="PL">Proof Like (PL)</option>
<option value="DMPL">Deep Mirror Proof Like (DMPL)</option>
<option value="UPL">Ultra Prooflike (UPL)</option>

    </select></td>
  </tr>
<?php } else {
	echo '<input type="hidden" name="morganDesignation" value="None" />';
	 }  ?>  


  <tr>
    <td><label for="toned">Toned</label></td>
    <td><select name="toned" id="toned">
      <?php if(isset($_POST["toned"])){echo '<option value="'.$_POST["toned"].'" selected="selected">'.$_POST["toned"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>
<option value="Gray">Gray</option>
<option value="Gold">Gold</option>
<option value="Rainbow">Rainbow</option>
<option value="UPL">Reddish Orange</option>
<option value="Blue">Blue</option>
    </select></td>
  </tr>
  
<?php
if (strpos($coinType, 'Commemorative') !== false){ ?>
    <tr>
    <td><label for="mintBox">Presentation Box</label></td>
    <td><select name="mintBox" id="mintBox">
     <?php if(isset($_POST["mintBox"])){echo '<option value="'.$_POST["mintBox"].'" selected="selected">'.$_POST["mintBox"].'</option>';} else {
		echo '<option value="Yes" selected="selected">Yes</option>';}?>  
      <option value="No">No</option>
    </select></td>
  </tr>
<?php } else { echo ''; }  ?> 
  
  </table>
 <hr class="clear" />
 <h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Details</h2>  
<table width="979" border="0" class="addCoinTbl">
  
  <tr>
    <td width="185"><label for="proService">Grading Service</label></td>
    <td width="784"><select id="proService" name="proService">
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
    <td>
      <input name="slabLabel" type="text" id="slabLabel" size="70" value="<?php if(isset($_POST["slabLabel"])){echo $_POST["slabLabel"];} else {echo "";}?>" /></td>
  </tr>
  <tr id="serialNumRow">
    <td><label for="proSerialNumber">Serial Number</label></td>
    <td><input name="proSerialNumber" type="text" id="proSerialNumber" value="<?php if(isset($_POST["proSerialNumber"])){echo $_POST["proSerialNumber"];} else {echo "";}?>" size="70" /></td>
  </tr>
  <tr id="slabConditionRow">
    <td><label for="slabCondition">Slab Condition</label></td>
    <td><select id="slabCondition" name="slabCondition">
    <?php if(isset($_POST["slabCondition"])){echo '<option value="'.$_POST["slabCondition"].'" selected="selected">'.$_POST["slabCondition"].'</option>';} else {
		echo '<option value="" selected="selected">Choose</option>';}?>
        <option value="Excellent">Excellent</option>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select></td>
  </tr>
  
  <tr id="designationRow">
    <td><label for="designation">Designation</label></td>
    <td><select name="designation" id="designation">
 <?php if(isset($_POST["designation"])){echo '<option value="'.$_POST["designation"].'" selected="selected">'.$_POST["designation"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>       
<option value="DCAM">Deep Cameo Proof (DCAM)</option>
<option value="CAM">Cameo Proof (CAM)</option>
<option value="SP">Specimen (SP) Struck well like a Proof</option>
<option value="Genuine">Genuine</option>
<option value="Sample">Sample</option>
<option value="Authentic">Authentic</option>

</select></td>
  </tr>
  <tr id="pcgsVarietyRow">
    <td><label for="pcgsVariety">Variety</label></td>
    <td><select name="pcgsVariety" id="pcgsVariety">
 <?php if(isset($_POST["pcgsVariety"])){echo '<option value="'.$_POST["pcgsVariety"].'" selected="selected">'.$_POST["pcgsVariety"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>       
<option value="Minor Variety">Minor Variety</option>
<option value="Major Variety">Major Variety</option>
</select></td>
  </tr>

    <tr id="ngcDesignationRow">
    <td><label for="ngcDesignation">Additional</label></td>
    <td><select name="ngcDesignation" id="ngcDesignation">
 <?php if(isset($_POST["ngcDesignation"])){echo '<option value="'.$_POST["ngcDesignation"].'" selected="selected">'.$_POST["ngcDesignation"].'</option>';} else {
		echo '<option value="None" selected="selected">None</option>';}?>       
<option value="FIRST DAY OF ISSUE">FIRST DAY OF ISSUE</option>
<option value="FIRST DAY CEREMONY">FIRST DAY CEREMONY</option>
<option value="FIRST YEAR OF ISSUE">FIRST YEAR OF ISSUE</option>
<option value="FIRST STRIKES">FIRST STRIKES</option>
<option value="NUMBERED FIRST STRUCK EDITION">NUMBERED FIRST STRUCK EDITION</option>
</select></td>
  </tr>
   
    <tr id="ngcDetailsRow">
    <td><label for="ngcDetail">Details</label></td>
    <td><select name="ngcDetail" id="ngcDetail">
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

</select></td>
  </tr> 
  </table>
<hr />
<h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Condition</h2>
<table width="100%" border="0">
  <tr>
    <td width="20%" align="center"><label for="holed">Holed</label></td>
    <td width="20%" align="center"><label for="cleaned">Cleaned</label></td>
    <td width="20%" align="center"><label for="altered">Altered Surface</label></td>
    <td width="20%" align="center"><label for="scratched">Scratched</label></td>
    <td width="20%" align="center"><label for="damaged">Environmental Damage</label></td>
    </tr>
  <tr>
    <td align="center">
      <select name="holed" id="holed">
        <?php if(isset($_POST["holed"])){echo '<option value="'.$_POST["holed"].'" selected="selected">'.$_POST["holed"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
       <option value="1">Yes</option>
      </select></td>
    <td align="center"><select name="cleaned" id="cleaned">
      <?php if(isset($_POST["cleaned"])){echo '<option value="'.$_POST["cleaned"].'" selected="selected">'.$_POST["cleaned"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
     <option value="1">Yes</option>
    </select></td>
    <td align="center"><select name="altered" id="altered">
      <?php if(isset($_POST["altered"])){echo '<option value="'.$_POST["altered"].'" selected="selected">'.$_POST["altered"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
      <option value="1">Yes</option>
    </select></td>
    <td align="center"><select name="scratched" id="scratched">
      <?php if(isset($_POST["scratched"])){echo '<option value="'.$_POST["scratched"].'" selected="selected">'.$_POST["scratched"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
    <option value="1">Yes</option>
    </select></td>
    <td align="center"><select name="damaged" id="damaged">
      <?php if(isset($_POST["damaged"])){echo '<option value="'.$_POST["damaged"].'" selected="selected">'.$_POST["damaged"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
      <option value="1">Yes</option>
    </select></td>
    </tr>
  <tr>
    <td align="center"><label for="pvc">PVC Damage</label></td>
    <td align="center"><label for="corrosion">Corrosion</label></td>
    <td align="center"><label for="bent">Bent</label></td>
    <td align="center"><label for="plugged">Plugged</label></td>
    <td align="center"><label for="polished">Polished</label></td>
    </tr>
  <tr>
    <td align="center"><select name="pvc" id="pvc">
      <?php if(isset($_POST["pvc"])){echo '<option value="'.$_POST["pvc"].'" selected="selected">'.$_POST["pvc"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
      <option value="1">Yes</option>
    </select></td>
    <td align="center"><select name="corrosion" id="corrosion">
      <?php if(isset($_POST["corrosion"])){echo '<option value="'.$_POST["corrosion"].'" selected="selected">'.$_POST["corrosion"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
      <option value="1">Yes</option>
    </select></td>
    <td align="center"><select name="bent" id="bent">
      <?php if(isset($_POST["bent"])){echo '<option value="'.$_POST["bent"].'" selected="selected">'.$_POST["bent"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
      <option value="1">Yes</option>
    </select></td>
    <td align="center"><select name="plugged" id="plugged">
      <?php if(isset($_POST["plugged"])){echo '<option value="'.$_POST["plugged"].'" selected="selected">'.$_POST["plugged"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
     <option value="1">Yes</option>
    </select></td>
    <td align="center"><select name="polished" id="polished">
      <?php if(isset($_POST["polished"])){echo '<option value="'.$_POST["polished"].'" selected="selected">'.$_POST["polished"].'</option>';} else {
		echo '<option value="0" selected="selected">No</option>';}?>
      <option value="1">Yes</option>
    </select></td>
    </tr>
    </table>


<hr />

  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
 <tr>
   <td><label for="coinValue">Coin Value</label></td>
   <td><input name="coinValue" type="text" id="coinValue" value="<?php if(isset($_POST["coinValue"])){echo $_POST["coinValue"];} else {echo "";}?>" class="purchasePrice" /></td>
 </tr>
 <tr>
    <td><label for="purchasePrice">Purchase Price</label></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" value="<?php if(isset($_POST["purchasePrice"])){echo $_POST["purchasePrice"];} else {echo "";}?>" class="purchasePrice" /></td>
  </tr>
  <tr>
    <td width="185"><label for="purchaseDate">Purchase Date</label></td>
    <td><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" value="<?php if(isset($_POST["purchaseDate"])){echo $_POST["purchaseDate"];} else {echo "";}?>" /></td>
  </tr>  
  <tr>
    <td valign="top"><label for="purchaseFrom">Purchase  From</label></td>
    <td><select id="purchaseFrom" name="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Show">Coin Show</option>
      <option value="Shop">Coin Shop</option>
      <option value="Mint">U.S. Mint</option>
    </select></td>
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
 
<div id="Mint" class="detailDiv2">
<table width="60%" border="0">
  <tr>
    <td><label for="mintBox">Presentation Box</label></td>
    <td><select name="mintBox" id="mintBox">
     <?php if(isset($_POST["mintBox"])){echo '<option value="'.$_POST["mintBox"].'" selected="selected">'.$_POST["mintBox"].'</option>';} else {
		echo '<option value="Yes" selected="selected">Yes</option>';}?>  
      <option value="No">No</option>
    </select></td>
  </tr>
  <tr>
    <td width="32%"> <label for="additional">Details</label>&nbsp;</td>
    <td width="68%">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"><?php if(isset($_POST["additional"])){echo $_POST["additional"];} else {echo "";}?></textarea></td>
    </tr>
</table>
  </div> 
 </td>
 </tr>
 </table>
  <hr />

     <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">    
  <tr>
    <td><label for="file">Image 1</label></td>
    <td><label for="file"></label>
      <input type="file" name="file" id="file" /><input type="button" name="button1" id="button1" value="Add More" /></td>
  </tr>
  <tr id="image2Row" class="imageRows">
    <td><label for="file2">Image 2</label></td>
    <td><input type="file" name="file2" id="file2" /><input type="button" name="button2" id="button2" value="Add More" /></td>
  </tr>
  <tr id="image3Row" class="imageRows">
    <td><label for="file3">Image 3</label></td>
    <td><input type="file" name="file3" id="file3" /><input type="button" name="button3" id="button3" value="Add More" /></td>
  </tr>
  <tr id="image4Row" class="imageRows">
    <td><label for="file4">Image 4</label></td>
    <td><input type="file" name="file4" id="file4" /></td>
  </tr>
<tr>
    <td valign="top"><label for="coinNote">Notes</label></td>
    <td><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""><?php if(isset($_POST["coinNote"])){echo $_POST["coinNote"];} else {echo "";}?></textarea></td>
  </tr>  
  </table> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td valign="bottom">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom">      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value=" Add Coin " /></td>
    <td><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<hr />
<table width="100%" border="0">
  <tr>
    <td width="50%" align="center"><a href="http://www.amazon.com/gp/product/B0088YV34C?ie=UTF8&amp;camp=1789&amp;creativeASIN=B0088YV34C&amp;linkCode=xm2&amp;tag=xt0a-20" target="_blank">The Official 2013 Red Book</a></td>
    <td width="50%" align="center"><a href="http://www.amazon.com/gp/product/0794822851?ie=UTF8&amp;camp=1789&amp;creativeASIN=0794822851&amp;linkCode=xm2&amp;tag=xt0a-20" target="_blank">Cherrypickers' Guide to Rare Die Varieties</a></td>
  </tr>
  <tr>
    <td width="50%" align="center" valign="top"><iframe src="http://rcm.amazon.com/e/cm?t=xt0a-20&o=1&p=8&l=as1&asins=B0088YV34C&ref=tf_til&fc1=000000&IS2=1&lt1=_blank&m=amazon&lc1=2A2A2A&bc1=FFFFFF&bg1=FFFFFF&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></td>
    <td width="50%" align="center" valign="top"><iframe src="http://rcm.amazon.com/e/cm?lt1=_blank&bc1=FFFFFF&IS2=1&bg1=FFFFFF&fc1=000000&lc1=2A2A2A&t=xt0a-20&o=1&p=8&l=as1&m=amazon&f=ifr&ref=tf_til&asins=0794822851" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
