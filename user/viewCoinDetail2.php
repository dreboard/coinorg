<?php 
include '../inc/config.php';

function totalIDInvestment($coinID){
$myQuery = mysql_query("SELECT SUM(purchasePrice) FROM collection WHERE coinID='$coinID'") or die(mysql_error()); 

while($row = mysql_fetch_array($myQuery))
{
  $coinSum = $row['SUM(purchasePrice)'];
}	
	return $coinSum;
}

if (isset($_GET['TTrqpUU'])) { 
$coinID = base64_decode($_GET['TTrqpUU']);

$pennyQuery = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {  
  $coinType = $row['coinType'];    
  $coinType = strip_tags($row['coinType']);
  $additional =strip_tags( $row['additional']);
  $coinID = strip_tags($row['coinID']);
  $coin-> getCoinById($coinID);
  $coinName = $coin->getCoinName();  
  $coinCategory = $coin->getCoinCategory();  
  $purchaseDate = $coin->getCoinDate();  
  getCoinGrade;
  $page ->getCoinPage($coinCategory);
  //$mintage = $page->getPageDates();
  $mintage = $coin->getMintageNumber();
  $linkName = str_replace(' ', '_', $coinType);
  $coinGrade = strip_tags($row['coinGrade']);
  $purchaseDate = strip_tags($row["purchaseDate"]);
  $purchaseFrom = strip_tags($row['purchaseFrom']);

/*  if($collection == 0){
	  $have = 'No, <a href="javascript:void(0)" class="addCoinLink">Add This Coin</a>';
	  $auctionLink = '';
  } else {
	  $have = 'Yes, (0) <a href="javascript:void(0)" class="addCoinLink">Add Another</a>';
	  $auctionLink = '<a href="ebayTemplate.php?coinID='.$coinID.'">Prepare for Auction</a>';
  }*/
  $coinLink = str_replace(' ', '_', $coinType);
  }
  
  $pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'") or die(mysql_error());
  while($row = mysql_fetch_array($pageQuery))
  {
    $pageName = $row['pageName'];
    $pageText1 = $row['pageText1'];
	$dates = $row['dates'];
  }
  
}
if (isset($_POST["addCoinFormBtn"])) { 
$coinID = intval($_POST["coinID"]);
$pennyGrade = mysql_real_escape_string($_POST["pennyGrade"]);
$name = mysql_real_escape_string($_POST["name"]);
$purchaseDateRaw = mysql_real_escape_string($_POST["purchaseDate"]);
$purchaseParts = explode("/", $purchaseDateRaw);
$year = intval($purchaseParts[2]);
$day = str_pad($purchaseParts[1], 2, '0', STR_PAD_LEFT); 
$month = str_pad($purchaseParts[0], 2, '0', STR_PAD_LEFT); 
$purchaseDate = date($year.'-'.$month.'-'.$day);
$enterDate = date('Y-m-d H:i:s');
if($_POST["purchaseFrom"] == ''){
	$purchaseFrom = 'None';
} else {
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
}

$insertCoin = mysql_query("INSERT INTO collection(coinType, name, pennyGrade, pennyQuantity, purchaseDate, timeyear) VALUES('$coinType', '$name', '$pennyGrade', '1', '$purchaseDate', '$year')") or die(mysql_error()); 
$newID = mysql_insert_id($insertCoin);
header("location: viewCoin.php?coinID=$newID");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="../scripts/main.js"></script>

<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#addCoinForm').hide();

$(".addCoinLink").click(function(event) {
    $('#addCoinForm').toggle();
	$("#errorMsg").text("Enter Coin Details");
}); 

$("#purchasePrice").focus(function(event){
	$(this).val("");
});

$("#purchasePrice").blur(function(event){
	if($(this).val("")){
	$(this).val("0.00");
	}
});

$("#purchaseDate, #purchaseFrom, #purchasePrice").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text("");
});	

$("#addCoinForm").submit(function() {
       if ($("#purchaseDate").val() == "") {
        $("#errorMsg").text("Please enter a purchase date...").addClass("errorTxt");;
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#purchaseDate").addClass("errorInput");
        return false;
      } else if ($("#purchaseFrom").val() == "") {
        $("#errorMsg").text("Please insert how you got the coin..");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#purchaseFrom").addClass("errorInput");
        return false;
      }else if ($("#purchasePrice").val() == "") {
        $("#errorMsg").text("Please enter a purchase price click $0.00...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#noPriceSpn").show();
		$("#purchasePrice").addClass("errorInput");
        return false;
      }  else {
	  return true;
	  }
});

});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><?php echo $coinName; ?>,  U.S. <?php echo $coinCategory ?></h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="263" rowspan="8" valign="top"><img src="../img/<?php echo $coinLink ?>.jpg" width="250" height="250" alt="11" /></td>
<td width="155" class="tdHeight"><span class="darker">Type: </span></td>
<td width="478" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinType ?></a></td>
<td width="14"></td>
</tr>
<tr>
<td class="tdHeight"><span class="darker">Grade:</span></td>
<td class="tdHeight"><?php echo $coinGrade ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><span class="darker">Added: </span></td>
  <td class="tdHeight"><?php echo $purchaseDate; ?></td>
</tr>
  <tr>
    <td><span class="darker">In Collection:</span></td>
    <td><?php echo getDuplicates($coinID, $accountID) ?></td>
    </tr>
  <tr>
    <td><strong>Total Investment:</strong></td>
    <td>$<?php echo totalIDInvestment($coinID); ?></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><span class="darker">Additional:</span><br />
      <?php echo $additional ?></td>
    </tr>
</table>
<hr />
<h3><?php echo $coinName ?> Price Guide</h3>
<table width="900" border="1" id="priceListTbl" cellpadding="3">
  <tr class="keyRow">
    <td>G-4</td>
    <td>VG-8</td>
    <td>F-12</td>
    <td>VF-20</td>
    <td>EF-40</td>
    <td>AU-50</td>
    <td>MS-60</td>
    <td>MS-63</td>
    <td>MS-65</td>
    <td>PR63</td>
    <td>PR65</td>
  </tr>
  
  
  <tr>
    <td><?php echo $coin->getG4(); ?></td>
    <td><?php echo $coin->getVG8() ?></td>
    <td><?php echo $coin->getF12() ?></td>
    <td><?php echo $coin->getVF20() ?></td>
    <td><?php echo $coin->getEF40() ?></td>
    <td><?php echo $coin->getAU50() ?></td>
    <td><?php echo $coin->getMS60() ?></td>
    <td><?php echo $coin->getMS63() ?></td>
    <td><?php echo $coin->getMS65() ?></td>
    <td><?php echo $coin->getPR63() ?></td>
    <td><?php echo $coin->getPR65() ?></td>
  </tr>
</table>
<p><a href="addCoinByID.php?coinID=<?php echo $coinID ?>">Add Another <?php echo $coinType ?> <?php echo $coinName ?></a></p>
<hr />
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>