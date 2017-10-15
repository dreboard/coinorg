<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 
$coinSubCategory = 'Small Cent';

$coinQuery = mysql_query("SELECT * FROM coins WHERE coinSubCategory = 'Small Cent'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinType = $row['coinType'];
  $coinName = $row['coinName'];
  $coinCategory = $row['coinCategory'];
  $coinSubCategory = $row['coinSubCategory'];
  }
  

if (isset($_POST["addTypeRollFormBtn"])) { 
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
  case "Mint":
    $purchaseFrom = "Mint";
	$auctionNumber = 'None';
	$ebaySellerID = 'None';
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

mysql_query("INSERT INTO collectrolls(coinType, coinCategory, coinSubCategory, coinGrade, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, accountID, mixed) VALUES('$coinType', '$coinCategory', '$coinSubCategory', '$coinGrade', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$accountID', '1')") or die(mysql_error()); 

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
<title>Add A Coin</title>
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
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1><span class="darker"><img src="../img/Mixed_Cents.jpg" width="100" height="auto" align="absmiddle" /></span>Add  <?php echo $coinSubCategory ?> Roll</h1>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<p>Select individual coins</p>

<div class="roundedWhite">
<p><a href="addRollType.php">Back to roll types</a></p>

<form id="addTypeRollForm" method="post" action="" name="addTypeRollForm">

<table width="100%" border="0" class="priceListTbl">
  <tr>
    <td colspan="6" class="darker">

<table width="70%" border="0">
  <tr>
    <td width="26%">Coin 1</td>
    <td width="74%">
	    <select name="coin1">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 2</td>
    <td>
    <select name="coin2">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 3</td>
    <td>
    <select name="coin3">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 4</td>
    <td>
    <select name="coin4">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 5</td>
    <td>
    <select name="coin5">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 6</td>
    <td>
    <select name="coin6">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 7</td>
    <td>
    <select name="coin7">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 8</td>
    <td>
    <select name="coin8">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 9</td>
    <td>
    <select name="coin9">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 10</td>
    <td>
    <select name="coin10">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 11</td>
    <td>
    <select name="coin11">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 12</td>
    <td>
    <select name="coin12">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 13</td>
    <td>
    <select name="coin13">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 14</td>
    <td>
    <select name="coin14">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 15</td>
    <td>
    <select name="coin15">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 16</td>
    <td>
    <select name="coin16">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 17</td>
    <td>
    <select name="coin17">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 18</td>
    <td>
    <select name="coin18">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 19</td>
    <td>
    <select name="coin19">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 20</td>
    <td>
    <select name="coin20">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 21</td>
    <td>
    <select name="coin21">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 22</td>
    <td>
    <select name="coin22">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 23</td>
    <td>
    <select name="coin23">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 24</td>
    <td>
    <select name="coin24">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 25</td>
    <td>
    <select name="coin25">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Coin 26</td>
    <td>
    <select name="coin26">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 27</td>
    <td>
    <select name="coin27">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 28</td>
    <td>
    <select name="coin28">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 29</td>
    <td>
    <select name="coin29">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 30</td>
    <td>
    <select name="coin30">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 31</td>
    <td>
    <select name="coin31">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 32</td>
    <td>
    <select name="coin32">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 33</td>
    <td>
    <select name="coin33">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 34</td>
    <td>
    <select name="coin34">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 35</td>
    <td>
    <select name="coin35">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 36</td>
    <td>
    <select name="coin36">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 37</td>
    <td>
    <select name="coin37">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 38</td>
    <td>
    <select name="coin38">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 39</td>
    <td>
    <select name="coin39">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 40</td>
    <td>
    <select name="coin40">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 41</td>
    <td>
    <select name="coin41">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 42</td>
    <td>
    <select name="coin42">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 43</td>
    <td>
    <select name="coin43">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 44</td>
    <td>
    <select name="coin44">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 45</td>
    <td>
    <select name="coin45">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 46</td>
    <td>
    <select name="coin46">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 47</td>
    <td>
    <select name="coin47">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 48</td>
    <td>
    <select name="coin48">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 49</td>
    <td>
    <select name="coin49">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Coin 50</td>
    <td>
    <select name="coin50">
	<?php  $coin->coinSubSelects($coinSubCategory);  ?>
    </select>
    </td>
  </tr>
</table>

 

    </td>
    </tr>
  <tr>
    <td width="236"><strong>Grades
      
    </strong></td>
    <td colspan="5"><strong>
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
    <td colspan="5"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td><span class="darker">Obtained From</span></td>
    <td width="116">
      <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            <label for="eBayRad">eBay</label>
</td>
    <td width="158"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
<label for="shopRad">Coin Shop</label></td>
    <td width="149"><input type="radio" name="purchaseFrom" value="Other" id="otherRad" />
      <label for="otherRad">Other</label></td>
    <td width="150"><input type="radio" name="purchaseFrom" value="Mint" id="MintRad" />
       <label for="MintRad">Mint</label></td>
    <td width="153"><input name="purchaseFrom" type="radio" id="noneRad" value="None" checked="checked" />
      <label for="noneRad">None</label></td>
  </tr>
  <tr>
    <td colspan="6">
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
    <td colspan="5"><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td valign="top"><strong>Additional Info</strong></td>
    <td colspan="5"><label for="additional"></label>
      <textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="top"><strong>Image</strong></td>
    <td colspan="5"><input type="file" name="file" id="file" /></td>
  </tr>
  <tr>
    <td valign="bottom"><input type="hidden" name="coinCategory2" id="coinCategory2" />      <input type="submit" name="addTypeRollFormBtn" id="addTypeRollFormBtn" value="Add Type Roll" /></td>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>



</form>
</div>
<div class="spacer"></div>
 <p><a href="#top">Top</a></p>

</div>
 <?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
