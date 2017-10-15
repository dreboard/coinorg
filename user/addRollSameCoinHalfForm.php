<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["coinType"])) { 

$coinType = str_replace('_', ' ', mysql_real_escape_string($_GET["coinType"]));
$rawcoinType = strip_tags($_GET["coinType"]);

$coinQuery = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinCategory = $row['coinCategory'];
  $coinSubCategory = $row['coinSubCategory'];
  }
  
}


if (isset($_POST["addTypeRollFormBtn"])) { 
$i = 0;
if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
	$i++;
    echo "Coin #" . $i . " " . $coinID. " <br />";
}
}
}


if (isset($_POST["addTypeRollFormBtn22"])) { 

$coinType = join(", ", $_POST['coinType']); 
$mintMark = $_POST['mintMark'];
$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);

if($_POST['purchaseDate'] == '') {
	$purchaseDate = $theDate;
} else {
	$purchaseDate = date("Y-m-d",strtotime($_POST["purchaseDate"]));
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


mysql_query("INSERT INTO collectrolls(coinType, coinCategory, coinSubCategory, coinGrade, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, mixed) VALUES('$coinType', '$coinCategory', '$coinSubCategory', '$coinGrade', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '1')") or die(mysql_error()); 

$collectrollsID = mysql_insert_id();


//////////add file
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName($_FILES['file']['name']);
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . $_FILES['file']['name'];
$fileQuery = mysql_query("UPDATE collectrolls SET  coinPic1 = '$coinPic1' WHERE collectrollsID = '$collectrollsID'");
}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Roll</title>

<style type="text/css">
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}
#coinTypes a {text-decoration:none;}

.bulkLinks {width:100px; height:auto;}
.rollHdr {margin:0px; padding:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	


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
      } else if( $('#gradeService').val() !== 'Self' && $("#proSerialNumber").val() == ""){
      $("#errorMsg").text("Enter your serial number.");
	  $("#proSerialNumber").addClass("errorInput");
	  return false;
     }else if( $('#gradeService').val() !== 'Self' && $("#proGrade").val() == ""){
      $("#errorMsg").text("Enter a coin grade.");
	  $("#proGrade").addClass("errorInput");
	  $("#endErrorMsg").text("There are form errors... Scroll up to fix");
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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//ADD TYPE ROLL

$("#addTypeRollForm").submit(function() {
      if($("#rollType").val() == "")  {
		$("#rollTypeLbl").addClass("errorTxt");
		$("#rollType").addClass("errorInput");
      return false;
      } else {
	  return true;
	  }
});

$("#rollType").change(function() {
$(this).find("option:selected").each(function(){
	$("#rollCoinCategory").val($(this).parent().attr("label"));
	$('#typeImage').attr("src","../img/"+$(this).attr("value")+".jpg");

});
});	

//ADD MINT ROLL FORM
$("#addMintRollForm").submit(function() {
      if($("#rollName").val() == "")  {
		$("#rollNameLbl").addClass("errorTxt");
		$("#rollName").addClass("errorInput");
      return false;
      } else {
	  return true;
	  }
});

$("#rollName").change(function() {
$(this).find("option:selected").each(function(){
	$("#rollCoinCategory").val($(this).parent().attr("label"));
	if($("#rollCoinCategory").val() == 'State Quarter'){
	$('#rollImage').attr("src","../img/State_Quarter.jpg");
	}else if($("#rollCoinCategory").val() == 'Sacagawea Dollar'){
	$('#rollImage').attr("src","../img/Sacagawea_Dollar.jpg");
	} 
	//$('#rollImage').attr("src","../img/Flying_Eagle.jpg
	
   // alert($(this).parent().attr("label"));
});
});	

	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1><span class="darker"><img src="../img/<?php echo $rawcoinType ?>.jpg" width="100" height="auto" align="absmiddle" /></span>Add  <?php echo $coinType ?> Roll</h1>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<p>Select individual coins</p>

<div class="roundedWhite">
<p><a href="addRollType.php">Back to roll types</a></p>

<form id="addTypeRollForm" method="post" action="" name="addTypeRollForm">

<table width="100%" border="0" class="priceListTbl">
  <tr>
    <td colspan="5" class="darker">
    

<?php 
function coinSelects($coinType){
   $getTypes = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType'") or die(mysql_error());
   while($row = mysql_fetch_array($getTypes))
  {
	  $i=0;
  $coinName = $row['coinName'];
 $coinID = $row['coinID'];
 
        echo '<option  value="'.$coinType.'"> '.$coinName.'</option>';	
		
  }	
return;	

}
?>
<table width="44%" border="0">
  <tr>
    <td width="31%">Coin 1</td>
    <td width="69%">
	    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 2</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 3</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 4</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 5</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 6</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 7</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 8</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 9</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 10</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 11</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 12</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 13</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 14</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 15</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 16</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 17</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 18</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 19</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 20</td>
    <td>
    <select name="coinID[]" class="coinOptions">
	<?php echo $collectionRolls->newCoinSelects($coinType); ?>
    </select>
    </td>
  </tr>
</table>

 

    </td>
    </tr>
  <tr>
    <td><strong>Grades
      
    </strong></td>
    <td colspan="4"><strong>
      <select name="coinGrade" id="coinGrade">
        <option value="No Grade" selected="selected">No Grade </option>
        <option value="Good to XF ">Good to XF</option>
        <option value="Good to AU" >Good to AU</option>
        <option value="Good to BU">Good to BU</option>
        <option value="F to XF ">Fine to Extra Fine</option>
        <option value="F to BU" >Fine to BU</option>
        <option value="XF to AU ">XF to AU</option>
        <option value="XF to BU" >XF to BU</option>
        <option value="Good to BU">Good to BU</option>
        <option value="AU" >About Uncirculated</option>
        <option value="BU">Brilliant Uncirculated</option>
      </select>
    </strong></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From</span></td>
    <td width="106">
      <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            <label for="eBayRad">eBay</label>
</td>
    <td width="153"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
<label for="shopRad">Coin Shop</label></td>
    <td width="115"><input type="radio" name="purchaseFrom" value="Other" id="otherRad" />
      <label for="otherRad">Other</label></td>
    <td width="200"><input name="purchaseFrom" type="radio" id="noneRad" value="None" checked="checked" />
      <label for="noneRad">None</label></td>
  </tr>
  <tr>
    <td colspan="5">
      <div id="ebayDetails" class="detailDiv">
        <table width="71%" border="0">
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
        <table width="71%" border="0">
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
        <table width="100%" border="0">
          <tr>
            <td width="47%"> <label for="additional">Details</label>&nbsp;</td>
            <td width="53%">&nbsp;</td>
            </tr>
          <tr>
            <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"></textarea></td>
            </tr>
          </table>
      </div>    </td>
    </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td valign="top"><strong>Additional Info</strong></td>
    <td colspan="4"><label for="additional"></label>
      <textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="top"><strong>Image</strong></td>
    <td colspan="4"><input type="file" name="file" id="file" /></td>
  </tr>
  <tr>
    <td valign="bottom"><input type="hidden" name="coinCategory2" id="coinCategory2" />      <input type="submit" name="addTypeRollFormBtn" id="addTypeRollFormBtn" value="Add Type Roll" /></td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>



</form>
</div>
<div class="spacer"></div>
 <p>Proof set coins from 1968 to the present contain "S" mint marked coins.  These were produced at the San Francisco United States government Mint.  Proof coin sets minted in 1964 and earlier have no mint mark and were produced at the Philadelphia United States government Mint.</p>

</div>
 <?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
