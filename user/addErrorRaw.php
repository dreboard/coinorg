<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 
if (isset($_POST["halfCentFormBtn"])) { 
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$coinID = mysql_real_escape_string($_POST["coinID"]);
$coinType = str_replace('_', ' ', mysql_real_escape_string($_POST["coinType"]));

if($_POST["purchaseFrom"] == ''){
	$purchaseFrom = 'None';
} else {
    $purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
}

$gradeService = $_POST['gradeService'];
if($_POST['gradeService'] == 'Self') {
	$proSerialNumber = 'N/A';
	$proGrade = 'N/A';
} else {
	$proSerialNumber = mysql_real_escape_string($_POST["proSerialNumber"]);
    $proGrade = mysql_real_escape_string($_POST["proGrade"]);
	
}

$purchaseDateRaw = mysql_real_escape_string($_POST["purchaseDate"]);
$purchaseParts = explode("/", $purchaseDateRaw);
$year = intval($purchaseParts[2]);
$day = str_pad($purchaseParts[1], 2, '0', STR_PAD_LEFT); 
$month = str_pad($purchaseParts[0], 2, '0', STR_PAD_LEFT); 
$purchaseDate = date($year.'-'.$month.'-'.$day);
$enterDate = date('Y-m-d H:i:s');


/*mysql_query("INSERT INTO collection(coinType, coinName, coinGrade, pennyQuantity, purchaseDate, timeyear) VALUES('$coinType', '$name', '$coinGrade', '1', '$purchaseDate', '$year')") or die(mysql_error()); */
echo $coinID;
}

if (isset($_GET["coinType"])) { 
$coinType = intval($_GET["coinType"]);
$coinQuery = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinID = $row['coinID'];
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinSubType = $row['coinSubType'];
  }
  
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../scripts/jquery-ui-1.8.18.custom/css/ui-lightness/jquery-ui-1.8.18.custom.css"/>

<script type="text/javascript" src="../scripts/main.js"></script>
<title>Add A Coin</title>

<style type="text/css">
.fromList{margin:0px;}
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}
#coinTypes a {text-decoration:none;}

.newFormImg {width:200px; height:auto; border:none; margin:0px;}
#rawTypeTbl img {width:150px; height:150px; border:none;}
.priceListTbl h3 {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#halfCentHeadDiv, #largeCentForm").hide();


$("#eBayRad").click(function() {

});
$("#shopRad").click(function() {

});
$("#otherRad").click(function() {

});


//ADD COIN TYPE
$("#addTypeBagForm").submit(function() {
      if($("#bagType").val() == "")  {
		$("#bagTypeLbl").addClass("errorTxt");
		$("#bagType").addClass("errorInput");
      return false;
      } else {
	  return true;
	  }
});


$("#coinType").change(function() {
$(this).find("option:selected").each(function(){
	//$("#bagTypeCoinCategory").val($(this).parent().attr("label"));
	$('#coinTypeImage').attr("src","../img/"+$(this).attr("value")+"_both.jpg");

});
});	


$("#Braided_Hair_Liberty_Head_Large_Cent").click(function() {
$("#Half_CentImg, #Union_Shield").animate({
    opacity: .5
		});
		$(this).animate({
    opacity: 1
		});
		$("#largeCentForm").show();
		$("#halfCentForm").hide();
		
});
$("#Half_CentImg").click(function() {
$("#Braided_Hair_Liberty_Head_Large_Cent, #Union_Shield").animate({
    opacity: .5
		});
		$(this).animate({
    opacity: 1
		});
		$("#halfCentHeadDiv").show();
		$("#largeCentForm").hide();
});
$("#Union_Shield").click(function() {
$("#Braided_Hair_Liberty_Head_Large_Cent, #Half_CentImg").animate({
    opacity: .5
		});
		$(this).animate({
    opacity: 1
		});
});
///////////////////////////////////////////////////////////////////////////////////Form validation


$("#purchasePrice").focus(function(event){
	$(this).val("");
});

$("#noPrice").click(function(){
	$("#purchasePrice").val("0.00");
	$("#purchasePrice").removeClass("errorInput");
	$("#errorMsg").text("");
	$("#endErrorMsg").text("");
});


$("#addCoinForm").submit(function() {
      if($("#coinType").val() == "")  {
		$("#errorMsg").text("Select a penny type.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#typeLbl").addClass("errorTxt");
      return false;
      }else if ($("#purchaseDate").val() == "") {
        $("#errorMsg").text("Please enter a purchase date...");
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
      } else {
	  return true;
	  }
});

$("#coinType, #purchaseDate, #purchaseFrom, #purchasePrice, #proSerialNumber").click(function(){
	$(this).removeClass("errorInput");
	$("#endErrorMsg").text("");
	$("#errorMsg").text("");
});	


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//HALF CENT OPERATIONS

/*$("#halfCentCoinType").change(function() {
$(this).find("option:selected").each(function(){
	//$("#bagTypeCoinCategory").val($(this).parent().attr("label"));
	$('#Half_CentFormImg').attr("src","../img/"+$(this).attr("value")+".jpg");
	//alert($(this).attr("value"));
});
});	*/

$("#halfCentCoinType").change(function() {
var dataString = $(this).val();

$.ajax({url:"../inc/functions/addRawFunctions.php?coinType="+dataString, success:function(result){
$("#halfCentCoinName").html(result);
}});

$.ajax({url:"../inc/functions/addRawPage.php?coinType="+dataString, success:function(result){
$("#halfCentYears").html(result);
}});

$(this).find("option:selected").each(function(){
	$('#Half_CentFormImg').attr("src","../img/"+$(this).attr("value")+"_both.jpg");
});
});	
$("#halfCentFormBtn").val("Add "+dataString);


	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Error Coin</h1>
<table width="100%" border="0" id="rawTypeTbl">
  <tr align="center">
    <td><a href="addHalfCent.php"><img src="../img/Half_Cent.jpg" alt="Half Cent" name="Half_CentImg"  class="newImg" id="Half_CentImg" /></a></td>
    <td><a href="addLargeCent.php"><img src="../img/Braided_Hair_Liberty_Head_Large_Cent.jpg" name="Braided_Hair_Liberty_Head_Large_Cent"  class="newImg" id="Braided_Hair_Liberty_Head_Large_Cent" /></a></td>
    <td><a href="addCent.php"><img src="../img/Union_Shield.jpg" class="newImg" id="Union_Shield" /></a></td>
    <td><a href="addTwoCent.php"><img src="../img/Two_Cent.jpg" class="newImg" /></a></td>
    <td><a href="addThreeCent.php"><img src="../img/Three_Cent.jpg" class="newImg" /></a></td>
    <td><a href="addHalfDime.php"><img src="../img/Seated_Liberty_Half_Dime.jpg" class="newImg" /></a></td>
  </tr>  
  <tr>
    <th scope="col"><a href="addHalfCent.php">Half-Cents</a></th>
    <th scope="col"><a href="addLargeCent.php">Large Cents</a></th>
    <th scope="col"><a href="addCent.php">Small Cents</a></th>
    <th scope="col"><a href="addTwoCent.php">Two Cent</a></th>
    <th scope="col"><a href="addThreeCent.php">Three Cent</a></th>
    <th scope="col"><a href="addHalfDime.php">Half Dime</a></th>
  </tr>

  <tr align="center">
    <td><a href="addNickel.php"><img src="../img/Indian_Head_Nickel.jpg" width="250" height="250" /></a></td>
    <td><a href="addDime.php"><img src="../img/Winged_Liberty_Dime.jpg" width="250" height="250" /></a></td>
    <td><a href="addTwentyCent.php"><img src="../img/Twenty_Cent_Piece.jpg" width="250" height="250" /></a></td>
    <td><a href="addQuarter.php"><img src="../img/Standing_Liberty.jpg" width="250" height="250" /></a></td>
    <td><a href="addHalfDollar.php"><img src="../img/Walking_Liberty.jpg" width="250" height="250" /></a></td>
    <td><a href="addDollar.php"><img src="../img/Morgan_Dollar.jpg" width="250" height="250" /></a></td>
  </tr>
  <tr>
    <th scope="col"><a href="addNickel.php">Nickels</a></th>
    <th scope="col"><a href="addDime.php">Dimes</a></th>
    <th scope="col"><a href="addTwentyCent.php">Twenty Cent</a></th>
    <th scope="col"><a href="addQuarter.php">Quarters</a></th>
    <th scope="col"><a href="addHalfDollar.php">Half Dollars</a></th>
    <th scope="col"><a href="addDollar.php">Dollars</a></th>
  </tr>
</table>
 <div class="spacer"></div>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<a name="forms"></a>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
