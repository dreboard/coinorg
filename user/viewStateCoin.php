<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinID"])) { 
$coinID = intval($_GET["coinID"]);
$pennyQuery = mysql_query("SELECT * FROM coins WHERE coinID = '$coinID'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $coinType = $row['coinType'];
  $coinCategory = $row['coinCategory'];
  $name = $row['coinName'];
  $mintage = $row['mintage'];
  $additional = $row['additional'];
  $coinID = $row['coinID'];
  $collection = $row['collection'];
  $linkName = str_replace(' ', '_', $coinType);
  $G4 = $row['G4'];
  $VG8 = $row['VG8'];
  $F12 = $row['F12'];
  $VF20 = $row['VF20'];
  $EF40 = $row['EF40'];  
  $AU50 = $row['AU50'];
  $MS60 = $row['MS60'];
  $MS63 = $row['MS63'];
  $MS65 = $row['MS65'];
  $PR63 = $row['PR63'];
  $PR65 = $row['PR65'];  

  if($collection == 0){
	  $have = 'No, <a href="javascript:void(0)" class="addCoinLink">Add This Coin</a>';
	  $auctionLink = '';
  } else {
	  $have = 'Yes, (0) <a href="javascript:void(0)" class="addCoinLink">Add Another</a>';
	  $auctionLink = '<a href="ebayTemplate.php?coinID=$coinID">Prepare for Auction</a>';
  }
  $image = str_replace(' ', '_', $coinType);
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
header("location: viewStateCoin.php?coinID=$newID");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>

<title><?php echo $name ?></title>
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
#priceListTbl {border-collapse:collapse;}
#priceListTbl td {padding:3px;}
#addCoinForm label{ float: left; width: 135px; font-weight: bold;}
#addCoinForm label, #addCoinForm input[type=text]{ margin-bottom:2px;}
.guideDivs {background-color:#fff; padding-left:10px;}
.guideDivs h3, .guideDivs h4 {text-align:center;}
.gradeGuideTbl {}
.tdHeight {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><?php echo $name; ?>,  U.S. <?php echo $coinCategory ?></h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="263" rowspan="8" valign="top"><img src="../img/<?php echo $image ?>.jpg" width="250" height="250" alt="11" /></td>
<td width="639" class="tdHeight"><span class="darker">Type: </span><a href="viewListReportState.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinType ?></a></td>
<td width="12"></td>
</tr>
<tr>
<td class="tdHeight"><span class="darker">Mintage:</span> <?php echo $mintage ?></td>
<td rowspan="7" valign="top">

    </td>
  </tr>
<tr>
  <td class="tdHeight"><span class="darker">Dates: </span><?php echo $dates; ?></td>
</tr>
  <tr>
    <td><span class="darker">In Collection:</span> <?php echo $have ?></td>
    </tr>
  <tr>
    <td><?php echo $auctionLink ?></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Additional:</span><br />
      <?php echo $additional ?></td>
    </tr>
</table>
<hr />

<form action="" method="post" name="addCoinForm" id="addCoinForm" enctype="multipart/form-data">
<span id="errorMsg">&nbsp;</span><br />
<label>Grade:</label> <select name="pennyGrade" id="pennyGrade">    
<option value="G4">G(4)</option>
<option value="VG8">VG(8)</option>
<option value="F12">F(12)</option>
<option value="VF20">VF(20)</option>
<option value="EF40">EF(40)</option>
<option value="AU50">AU(50)</option>
<option value="MS60">MS(60)</option>
<option value="MS63">MS(63)</option>
<option value="MS65">MS(65)</option>
<option value="MS67">MS(67)</option>
<option value="MS70">MS(70)</option>
<option value="PR63">PR(63)</option>
<option value="PR65">PR(65)</option>
<option value="PR70">PR(70)</option>
</select> 
<a id="gradeGuide" href="#gradeGuideAnc">Grade Guide</a><br /><br />
<label>Purchase Date: </label><input type="text" name="purchaseDate" id="purchaseDate" /><br />
<label>Obtained From:</label><input type="text" name="purchaseFrom" id="purchaseFrom" /><br />
<label>Purchase Price:</label> <input name="purchasePrice" type="text" id="purchasePrice" value="0.00" /><br />
<label>Upload Image:</label><input type="file" name="file" id="file" /><br /><br />
<input name="name" type="hidden" value="<?php echo $name ?>" />  
<input name="addCoinFormBtn" id="addCoinFormBtn" type="submit" value="Add Coin" />
  <br /><br /> 
    </form>
<h3><?php echo $name ?> Price Guide</h3>
<table width="900" border="1" id="priceListTbl">
  <tr class="darker">
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
    <td><?php echo $VG8 ?></td>
    <td><?php echo $VG8 ?></td>
    <td><?php echo $F12 ?></td>
    <td><?php echo $VF20 ?></td>
    <td><?php echo $EF40 ?></td>
    <td><?php echo $AU50 ?></td>
    <td><?php echo $MS60 ?></td>
    <td><?php echo $MS63 ?></td>
    <td><?php echo $MS65 ?></td>
    <td><?php echo $PR63 ?></td>
    <td><?php echo $PR65 ?></td>
  </tr>
</table>
<a name="gradeGuideAnc"></a>
<h2><?php echo $coinType ?> Grading Guide</h2>
<?php include("../inc/grades".$image.".php"); ?>

<p></p>
</div>
</body>
</html>