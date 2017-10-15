<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 


function enterNewMixedRollCoins($collectrollsID, $coinID, $coinGrade, $userID, $purchasePrice){
if($coinID == '0' || $coinID == ''){
	return false;
} else {
$coin = new Coin();
$collection = new Collection();
$collectionRolls = new CollectionRolls();
$coin->getCoinById($coinID);

$sql = mysql_query("INSERT INTO collection(coinID, collectrollsID, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseFrom, purchaseDate, purchasePrice, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID."', '$collectrollsID', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', '".$coinGrade."', '".$collection->getCoinGradeNum($coinGrade)."', '".$collectionRolls->getPurchaseFrom()."', '".date("Y-m-d")."', '".$collection->setPurchaseToZero($purchasePrice)."', '$theDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	
return;
}

}
 

if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_',' ',  $_GET["coinCategory"]);
$coinCategory = strip_tags($_GET["coinCategory"]);
$CoinCategories->getCoinByCategory($coinCategory);
}

/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['rollNickname'] == '') {
	$_SESSION['errorMsg'] = 'Please Name your roll';
} else {

$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
$coinCategory = mysql_real_escape_string($_POST["coinCategory"]);
$CoinCategories->getCoinByCategory($coinCategory);

$coinGrade = mysql_real_escape_string($_POST["coinGrade"]);
$rollHolder = mysql_real_escape_string($_POST["rollHolder"]);

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

$coinNote = $collection->setToNone($_POST["coinNote"]);
$purchaseFrom = mysql_real_escape_string($_POST["purchaseFrom"]);
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	

mysql_query("INSERT INTO collectrolls(rollNickname, rollType, coinType, coinCategory, rollHolder, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, coinGrade, enterDate, userID, faceVal, denomination) VALUES ('$rollNickname', 'Mixed Type', 'None', '".$coinCategory."', '$rollHolder', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$coinGrade', '$theDate', '$userID', '".$CoinCategories->getRollVal()."', '".$CoinCategories->getDenomination()."')") or die(mysql_error()); 

$collectrollsID = mysql_insert_id();

if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
enterNewMixedRollCoins($collectrollsID, $coinID['theID'], $coinID['coinGrade'], $userID, $coinID['purchasePrice']);	
  } 
 }


//////////add file
if(!empty($_FILES['file']['tmp_name'])){	
if($_FILES['file']['size'] > $max_filesize){
	$_SESSION['errorMsg'] = '<span class="errorTxt">Image is Too Large Max 3 mb</span>';
}	 else {
$Upload->SetFileName(str_replace(' ', '_', $_FILES['file']['name']));
$Upload->SetTempName($_FILES['file']['tmp_name']);
$Upload->SetUploadDirectory($userID."/");
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID."/" . str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collectrolls SET coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
}
}
header("location: viewMixedRollDetail.php?ID=".$Encryption->encode($collectrollsID)."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add New Roll & New Coins</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".detailDiv2, .waitSpan").hide();

$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	



$("#addCentForm2").submit(function() {
      if($("#rollNickname").val() == "")  {
		$("#errorMsg").text("Name your roll.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#rollNickname").addClass("errorInput");
      return false;
      }else if ($("#coinID").val() == "") {
        $("#errorMsg").text("Please select a coin...");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#coinID").addClass("errorInput");
        return false;
      } else {
		$("#addCoinFormBtn").prop('value', 'Saving Roll...');  
	  return true;
	  }
});

$("#rollNickname, #coinID").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text('');
	$("#endErrorMsg").text('');
});	


$('.coinNumbers').on('change', function() {
	//var coinNum = parseInt($(this).attr("id"));
	var coinNum = $(this).attr("id").replace(/[^\d]/g, "");
	var coin = this.value;
    $("#wait" + coinNum).show();
    $.ajax({
        url: "_coinSelects2.php?coinID="+ coin,
        success: function (result) {
            $("#wait" + coinNum).hide();
            $("#coinGrade" + coinNum).html(result);
        }
    });     
});



});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo strip_tags($_GET["coinCategory"]) ?>.jpg" width="80" height="80" align="absmiddle" /> Add  <?php echo str_replace('_',' ',  strip_tags($_GET["coinCategory"])) ?> Roll</h1>

<table width="100%" border="0">
  <tr>
    <td width="18%" class="darker"><a href="addRollType.php">Back to roll types</a></td>
    <td width="75%"><select id="select" name="select2" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type</option>
        <option value="addRollCoinCategory.php?coinCategory=Small_Cent">Small Cent</option>
        <option value="addRollCoinCategory.php?coinCategory=Nickel">Nickel</option>
        <option value="addRollCoinCategory.php?coinCategory=Dime">Dime</option>
        <option value="addRollCoinCategory.php?coinCategory=Quarter">Quarter</option>
        <option value="addRollCoinCategory.php?coinCategory=Half_Dollar">Half Dollar</option>
        <option value="addRollCoinCategory.php?coinCategory=Dollar">Dollar</option>

    </select></td>
    <td width="7%">&nbsp;</td>
  </tr>
</table>

 <p></p>
 
 
 <div id="CoinList">
<p class="darker">Recently added  Rolls In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="70%">Type</td>
    <td width="16%">Investment</td>
    <td width="14%">Date</td>
  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' ORDER BY collectrollsID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any rolls In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinType = $row['coinType'];
  $collectrollsID = intval($row['collectrollsID']); 
  $collectionRolls->getCollectionRollById($collectrollsID);

  $coinID = intval($row['coinID']); 
  $coin->getCoinById($coinID);

  echo '
<tr>
<td>'.$collectionRolls->getRollTypeLink(intval($row['collectrollsID'])).'</td>
<td>'.$collectionRolls->getCoinPrice().'</td>
<td>'.date("M j, Y",strtotime($collectionRolls->getCoinDate())).'</td>
</tr>  
  ';
  }
}
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<hr />
<span class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';;
}
 ?></span>

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Roll Details</h2>
  <table width="979" border="0" class="addCoinTbl">

  <tr>
    <td class="darker">Roll Nickname</td>
    <td width="787" colspan="4"><input name="rollNickname" type="text" id="rollNickname" size="80" value="" /></td>
  </tr>
  <tr>
    <td class="darker">Mint Marks</td>
    <td colspan="4"><select name="mintMark" id="mintMark">
      <option value="Mixed " selected="selected">Mixed</option>
      <option value="Unknown">Unknown</option>
      <option value="P&amp;D">P &amp; D</option>

      <option value="PDS">PDS</option>
      <option value="D">D</option>
      <option value="S">S</option>
      <option value="P">P</option>
      <option value="O">O</option>
      <option value="CC">CC</option>
      <option value="W">W</option>
      <option value="O&amp;CC">O &amp; CC</option>
    </select></td>
  </tr>
  <tr>
    <td width="184" class="darker"><label for="rollHolder">Holder</label></td>
    <td width="785" colspan="4"><select name="rollHolder" id="rollHolder">
        <option value="Paper " selected="selected">Paper</option>
        <option value="Tube">Tube</option>  
        <option value="Plastic">Plastic</option>
        </select></td>
  </tr>
    
    </table>
   
<p>Select Up To <strong><?php echo $CoinCategories->getRollCount(); ?></strong> New Coins</p>  

<div id="addCoinsList">    
<table width="100%" border="0">
  <tr class="darker">
    <td width="54%">Coin</td>
    <td width="16%">Price</td>
    <td width="30%" align="left">Grade</td>
  </tr>
  <?php 
  for ($i=1; $i<=$CoinCategories->getRollCount(); $i++) {	
	$sql = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_',' ',  strip_tags($_GET["coinCategory"]))."' AND coinYear <= ".date('Y')." AND byMint = '1'  ORDER BY coinYear ASC") or die(mysql_error()); 
	$coinCount = mysql_num_rows($sql);
	echo '<tr class="gryHover"><td align="left">(Coin # '.$i.' ) ';
	echo '<select name="coinID['.$i.'][theID]" class="coinNumbers" id="theCoin'.$i.'"><option value="" selected="selected">Select A Coin</option>';
	while ($row = mysql_fetch_array($sql)){
		$coinStrike = strip_tags($row['strike']);
		$coinID = intval($row['coinID']);
		$coin->getCoinById($coinID);
		echo '<option value="'.$coinID.'">'.$coin->getCoinName() .'</option>';
	}
	    echo '</select></td>';
		echo '<td><input name="coinID['.$i.'][purchasePrice]" type="text" id="purchasePrice" value="" class="purchasePrice" /></td>';
		echo '<td align="left"><select name="coinID['.$i.'][coinGrade]" id="coinGrade'.$i.'">';
	    echo '</select>&nbsp;<span class="waitSpan" id="wait'.$i.'">Generating.....</span></td></tr>';		
	}
?>
</table>    
  <br />  
</div>
  
  
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="186"><span class="darker">Purchase Date</span></td>
    <td colspan="4"><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>  
  <tr>
    <td valign="top"><strong>Pruchase From</strong></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
      <option value="None" selected="selected">None</option>
      <option value="eBay">eBay</option>
      <option value="Shop">Coin Show</option>
      <option value="Show">Coin Shop</option>
      <option value="Mint">U.S. Mint</option>
    </select></td>
    <td width="241">&nbsp;</td>
    <td width="238">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" valign="top">
      <div id="eBay" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="47%"> <label for="auctionNumber">Auction Number</label>&nbsp;</td>
            <td width="53%"><input name="auctionNumber" type="text" value="<?php if(isset($_POST["auctionNumber"])){echo $_POST["auctionNumber"];} else {echo "";}?>" /></td>
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
            <td width="47%"> <label for="shopName">Shop Name</label>
              &nbsp;</td>
            <td width="53%"><input name="shopName" type="text" value="<?php if(isset($_POST["shopName"])){echo $_POST["shopName"];} else {echo "";}?>" /></td>
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
            <td width="47%"> <label for="showName">Show Name</label>&nbsp;</td>
            <td width="53%"><input name="showName" id="showName" type="text" value="<?php if(isset($_POST["showName"])){echo $_POST["showName"];} else {echo "";}?>" /></td>
            </tr>
          <tr>
            <td><label for="showCity">City</label>&nbsp;</td>
            <td><input name="showCity" type="text" value="<?php if(isset($_POST["showCity"])){echo $_POST["showCity"];} else {echo "";}?>" /></td>
            </tr>
          </table>
      </div> 
      
      <div id="None" class="detailDiv2">
        <table width="60%" border="0">
          <tr>
            <td width="47%">&nbsp; </td>
            <td width="53%">&nbsp;</td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          </table>
      </div>    </td>
    </tr>
  <tr>
    <td><span class="darker">Purchase Price</span></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="" /></td>
  </tr>
    </table>
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">  
  <tr>
    <td width="186"><strong>Image</strong></td>
    <td width="783" colspan="4"><label for="file"></label>
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><span class="darker">Notes</span></td>
    <td colspan="4"><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>

  <tr>
    <td valign="bottom">  
    <input name="coinCategory" type="hidden" value="<?php echo str_replace('_',' ',  strip_tags($_GET["coinCategory"])); ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Mint Roll" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
