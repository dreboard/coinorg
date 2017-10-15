<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

//rawCoinType
function checkMintCount($coinID) {
        $coinQuery = mysql_query("SELECT * FROM coins WHERE coinID = '$coinID'") or die(mysql_error());
		while($row = mysql_fetch_array($coinQuery))
	  {
		  $byMint = $row['byMint'];
	  }
		return $byMint;
    }


//////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$folderCode = mysql_real_escape_string($_POST["folderCode"]);
$folderNickname = mysql_real_escape_string($_POST["folderNickname"]);

$folderID = $folder->getFolderIDByCode($folderCode);
$folder->getFolderByID($folderID);
$coinCategory = $folder->getCoinCategory();
$coinType = $folder->getCoinType();

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


mysql_query("INSERT INTO collectfolder(folderCode, folderNickname, coinType, coinCategory, coinGrade, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, accountID) VALUES('$folderCode', '$folderNickname', '$coinType', '$coinCategory', '$coinGrade', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$accountID')") or die(mysql_error()); 

$collectfolderID = mysql_insert_id();
//////////add file
if(!empty($_FILES['file']['tmp_name'])){
$Upload->SetFileName($_FILES['file']['name']);
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . $_FILES['file']['name'];
$fileQuery = mysql_query("UPDATE collectfolder SET  coinPic1 = '$coinPic1' WHERE collectfolderID = '$collectfolderID'")or die(mysql_error()); 
}
header("location: addFolderNum.php?collectfolderID=$collectfolderID");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Folder</title>

<style type="text/css">
.fromList{margin:0px;}
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}


.newFormImg {width:200px; height:auto; border:none; margin:0px;}
#rawTypeTbl img {width:150px; height:150px; border:none;}
.priceListTbl h3 {margin:0px;}

#otherDetails {width:99%;}
#content #CoinList h2 {
	text-align: center;
}
</style>
<script type="text/javascript">
$(document).ready(function(){	

/*$("#folderID").change(function() {
var dataString = $(this).val();
$.ajax({
	url:"../inc/functions/getFolderCoins.php?folderID="+dataString, 
	type: "GET", 
success:function(result){
$("#folderDisplayDiv").html(result);
//alert(dataString);
}});

$(this).find("option:selected").each(function(){
	$("#folderType").val($(this).parent().attr("label"));
	//$('#typeImage').attr("src","../img/"+$(this).attr("value")+".jpg");
});

});	*/

	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span class="darker"><img src="../img/<?php echo $rawCoinType ?>.jpg" alt="Half Cent" name="Half_CentFormImg" align="left"  class="newFormImg" id="Half_CentFormImg2" /></span>
<h1>Step 1: Add Folder</h1>
<div class="clear"></div>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<a name="forms"></a>
<div id="addCoinDiv">
  
  <form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
<table width="979" border="0" class="priceListTbl">

  <tr>
    <td width="193" class="darker">Folder </td>
    <td colspan="4"><select name="folderCode" id="folderCode">
<optgroup label="Small  Cents">
<option value="None" selected="selected">None</option>
<option value="whitmanIndian">Indian Cents 1857-1909</option>
<option value="whitmanLincoln1">Lincoln Cents 1909-1940</option>
<option value="whitmanLincoln2">Lincoln Cents 1941-1974</option>
<option value="whitmanLincoln3">Lincoln Cents Starting 1975</option>
<option value="whitmanLincoln4">Lincoln Memorial Cents 1959-1998</option>
<option value="whitmanLincoln5">Lincoln Memorial Cents 1999-Date</option>
</optgroup>
</select> 
      *</td>
  </tr>
  <tr>
    <td class="darker">Folder Nickname</td>
    <td colspan="4"><input name="folderNickname" type="text" id="folderNickname" size="41" maxlength="100" /> 
      (Additional way to identify folder) </td>
  </tr>
  <tr>
    <td colspan="5">
<div id="folderDisplayDiv">
<table width="50%" border="0">

</table>
</div>
    </td>
    </tr>
  <tr>
    <td class="darker">Condition</td>
    <td colspan="4"><select name="mintMark" id="bagMintMark">
    <option value="Yes" selected="selected">New</option>
    <option value="No">Used</option>      
    </select></td>
  </tr>
  <tr>
    <td class="darker">Grades</td>
    <td colspan="4"><select name="coinGrade">
  <option value="No Grade" selected="selected">No Grade </option>
  <option value="Good to XF ">Good to XF</option>
  <option value="Good to AU" >Good to AU</option>
  <option value="Good to BU">Good to BU</option>
  <option value="XF to AU ">XF to AU</option>
  <option value="XF to BU" >XF to BU</option>
  <option value="Good to BU">Good to BU</option>
  <option value="AU" >About Uncirculated</option>
  <option value="BU">Brilliant Uncirculated</option>
  </select></td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>
  <tr>
    <td valign="top"><span class="darker">Obtained From</span></td>
    <td width="115"><span class="darker">
    </span>
            <label>
            <input type="radio" name="purchaseFrom" value="eBay" id="eBayRad" />
            eBay</label></td>
    <td width="167"><input type="radio" name="purchaseFrom" value="Coin Shop" id="shopRad" />
Coin Shop</td>
    <td width="160"><label>
      <input type="radio" name="purchaseFrom" value="Assembled" id="otherRad" />
      Assembled</label></td>
    <td width="322"><label>
      <input name="purchaseFrom" type="radio" id="noneRad" value="None" checked="checked" />
      None</label></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="4">
    <div id="ebayDetails" class="detailDiv">
<table width="60%" border="0">
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
<table width="60%" border="0">
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
<table width="60%" border="0">
  <tr>
    <td width="47%"> <label for="additional">Details</label>&nbsp;</td>
    <td width="53%">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"></textarea></td>
    </tr>
</table>
  </div> 
  
     </td>
  </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" value="0.00" class="purchasePrice" /><span id="noPriceSpn"><input name="noPrice" type="checkbox" value="0.00" id="noPrice" /> $0.00</span></td>
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td colspan="4"><label for="file"></label>
      <input type="file" name="file" id="file" /> Use Stock Image: <input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><span class="darker">Notes</span></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">      <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add  Folder" /></td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p>&nbsp; </p>
<div id="CoinList">
  <p><?php echo $coinType; ?> Folder In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="8%">Image</td>
    <td width="58%">Coin</td>
    <td width="12%">Grade</td>    
    <td width="11%">Total Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND accountID = '$accountID' ORDER BY coinID ASC") or die(mysql_error());
while($row = mysql_fetch_array($collectionQuery))
  {
  //$coinID = $row['coinID'];
  $coinType = $row['coinType'];
  
  if($row['coinPic1'] == 'blankBig.jpg'){
	  $thumb = '<img src="../img/1.jpg" width="25" height="25" />';
  } else {
	  $thumb = '<img src="'.$accountID.'/'.$row['coinPic1'].'" width="auto" height="25" />';
  }
  $collectionID = $row['collectionID']; 
  $purchaseDate = date("F j, Y",strtotime($row["purchaseDate"]));
  $coinGrade = $row['coinGrade']; 
  $purchasePrice = $row['purchasePrice'];  
  $collectedCoin = new Coin();
  $collectedCoin-> getCoinById($row['coinID']);
  $collectedCoinName = $collectedCoin->getCoinName();
  
  $thePageCode = "Go to the view coin page to view this coin";
  //SEND ENCODED COLLECTIONID 
  echo '
<tr>
<td>'.$thumb.'</td> 
<td><a href="viewCoin.php?rWeuTTresw='.base64_encode($thePageCode).'&TTrqpUU='.base64_encode($collectionID).'">'.$collectedCoinName.'</a></td>
<td>'.$coinGrade.'</td>
<td>'.$purchasePrice.'</td>
</tr>  
  ';
  }
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
