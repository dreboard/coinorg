<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 


function insertRollCoinID($collectrollsID, $coinID, $theDate, $userID, $coinGrade, $purchaseDate){
	$coin = new Coin();
	$collection = new Collection();
	$coin->getCoinById($coinID);
	if($coinID == 0){
		return false;
	} else {
	$sql = mysql_query("INSERT INTO collection(coinID, collectrollsID, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, enterDate, userID, errorCoin, byMint, mintBox, century, design, series, designType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('$coinID', '$collectrollsID', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', 'None', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', '$coinGrade', '".$collection->getCoinGradeNum($coinGrade)."', '$purchaseDate', '$theDate', '$userID', '".$coin->getErrorCoin()."', '".$coin->getByMint()."', 'No', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 
		
}
return;
}


function newCoinSelects($coinType, $i){
   $sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND byMint = '1' AND coinYear <= ".date('Y')." ORDER BY coinYear ASC") or die(mysql_error());
   $html = '<select name="coinID['.$i.'][theID]" class="coinOptions"><option value="0">Select Coin</option>';
   while($row = mysql_fetch_array($sql))
		{
		  $coin = new Coin();
		  $coinID = intval($row['coinID']);
		  $coin->getCoinById($coinID);
		  $html .= '<option value="'.$coinID.'">'.$coin->getCoinName().'</option>';	
		}	
		$html .= '</select>';
	return $html;	
}	


if (isset($_GET["coinType"])) { 
$coinType = str_replace('_',' ',  strip_tags($_GET["coinType"]));
$coinTypeLink = strip_tags($_GET["coinType"]);
$CoinTypes->getCoinByType($coinType);
$CoinTypes->getRollCount();
}

if (isset($_POST["addCoinFormBtn2"])) { 
if (is_array($_POST['coinID'])){
  foreach ($_POST["coinID"] as $coinID){
	if($coinID['theID'] !=='0'){
	   echo $coinID["theID"].' '. $coinID["coinGrade"].'<br />';
		//insertRollCoinID($collectrollsID, $coinID=$coinID["theID"], $theDate, $userID, $coinGrade=$coinID["coinGrade"], $purchaseDate);
	}
  }
}
}
/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['rollNickname'] == '') {
	$_SESSION['errorMsg'] = 'Please Name your roll';
} else {
$coinType = mysql_real_escape_string($_POST["coinType"]);
$CoinTypes->getCoinByType($coinType);

$rollNickname = mysql_real_escape_string($_POST["rollNickname"]);
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
$additional = $collection->setToNone($_POST["additional"]);	
$auctionNumber = $collection->setToNone($_POST["auctionNumber"]);
$ebaySellerID = $collection->setToNone($_POST["ebaySellerID"]);
$shopName = $collection->setToNone($_POST["shopName"]);
$shopUrl = $collection->setToNone($_POST["shopUrl"]);
$showName = $collection->setToNone($_POST["showName"]);
$showCity = $collection->setToNone($_POST["showCity"]);	

mysql_query("INSERT INTO collectrolls(rollNickname, rollType, coinType, coinCategory, rollHolder, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, coinNote, enterDate, userID, rollCount, denomination) VALUES ('$rollNickname', 'Coin By Coin', '$coinType', '".$CoinTypes->getCoinCategory()."', '$rollHolder', '$purchaseDate', '$purchaseFrom', '$auctionNumber', '$additional', '$purchasePrice', '$ebaySellerID', '$shopName', '$shopUrl', '$coinNote', '$theDate', '$userID', '".$CoinTypes->getRollCount()."', '".$CoinTypes->getDenomination()."')") or die(mysql_error()); 
$collectrollsID = mysql_insert_id();


if (is_array($_POST['coinID'])){
  foreach ($_POST["coinID"] as $coinID){
	if($coinID['theID'] !=='0'){
	   //echo $coinID["theID"].' '. $coinID["coinGrade"].'<br />';
		insertRollCoinID($collectrollsID, $coinID["theID"], $theDate, $userID, $coinID["coinGrade"], $purchaseDate);
	}
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
$fileQuery = mysql_query("UPDATE collection SET coinPic1 = '$coinPic1' WHERE collectionID = '$collectionID' AND userID = '$userID'")  or die(mysql_error()); 
}
}
header("location: viewRollDetail.php?ID=".$Encryption->encode($collectrollsID)."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Same Year Different Mintmark Roll</title>

<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".detailDiv2").hide();

$("#purchaseFrom").change(function() {
	$(".detailDiv2").hide();
	$('#' + $(this).val()).show();
});	



$("#addCentForm").submit(function() {
      if($("#rollNickname").val() == "")  {
		$("#errorMsg").text("Name your roll.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#rollNickname").addClass("errorInput");
      return false;
      } else {
		$("#addCoinFormBtn").prop('value', 'Saving Roll...');  
	  return true;
	  }
});

$("#rollNickname").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text(String.fromCharCode(160));
	$("#endErrorMsg").text(String.fromCharCode(160));
});	

});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><span class="darker"><img src="../img/<?php echo $coinTypeLink ?>.jpg" width="100" height="auto" align="absmiddle" /></span> Add  <?php echo $coinType ?> Roll</h1>
 <p><a href="addRollType.php" class="brownLink">Back to roll types</a></p>
 <div id="CoinList">
<p class="darker">Recently added Coin By Coin Rolls In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="70%">Type</td>
    <td width="16%">Investment</td>
    <td width="14%">Date</td>
  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectrolls WHERE rollType = 'Coin By Coin' AND userID = '$userID' ORDER BY collectrollsID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any Coin By Coin rolls In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinCategory = $row['coinCategory'];
  $collectrollsID = intval($row['collectrollsID']); 
  $collectionRolls->getCollectionRollById($collectrollsID);

  echo '
<tr>
<td><a href="viewRollDetail.php?ID='.$Encryption->encode($collectrollsID).'">'.$collectionRolls->getRollNickname().'</a></td>
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
 ?>&nbsp;</span>

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
<div id="coinsListArea">
<p>Select individual coins (Can also be added later)</p>
<table width="80%" border="0">
<?php

for ($i=1; $i<=$CoinTypes->getRollCount(); $i++)
  {
  echo '
  <tr class="ltGrayBG">
    <td width="10%">Coin '.$i.'</td>
    <td width="38%">
	 '.newCoinSelects($coinType, $i).'</td>
    <td width="14%">Grade </td>
    <td width="38%"><select name="coinID['.$i.'][coinGrade]">
      <option value="No Grade" selected="selected">No Grade</option>
      <option value="B0">B-0</option>
      <option value="P1" >PO-1</option>
      <option value="FR2">FR-2</option>
      <option value="AG3">AG-3</option>
      <option value="G4">G-4</option>
      <option value="G6">G-6</option>
      <option value="VG8">VG-8</option>
      <option value="VG10">VG-10</option>
      <option value="F12">F-12</option>
      <option value="F15">F-15</option>
      <option value="VF20">VF-20</option>
      <option value="VF25">VF-25</option>
      <option value="VF30">VF-30</option>
      <option value="VF35">VF-35</option>
      <option value="EF40">EF-40</option>
      <option value="EF45">EF-45</option>
      <option value="AU50">AU-50</option>
      <option value="AU53">AU-53</option>
      <option value="AU55">AU-55</option>
      <option value="AU58">AU-58</option>
      <option value="MS60">MS-60</option>
      <option value="MS61">MS-61</option>
      <option value="MS62">MS-62</option>
      <option value="MS63">MS-63</option>
      <option value="MS64">MS-64</option>
      <option value="MS65">MS-65</option>
      <option value="MS66">MS-66</option>
      <option value="MS67">MS-67</option>
      <option value="MS68">MS-68</option>
      <option value="MS69">MS-69</option>
      <option value="MS70">MS-70</option>
      <option value="PR35">PR-35</option>
      <option value="PR40">PR-40</option>
      <option value="PR45">PR-45</option>
      <option value="PR50">PR-50</option>
      <option value="PR55">PR-55</option>
      <option value="PR58">PR-58</option>
      <option value="PR60">PR-60</option>
      <option value="PR61">PR-61</option>
      <option value="PR62">PR-62</option>
      <option value="PR63">PR-63</option>
      <option value="PR64">PR-64</option>
      <option value="PR65">PR-65</option>
      <option value="PR66">PR-66</option>
      <option value="PR67">PR-67</option>
      <option value="PR68">PR-68</option>
      <option value="PR69">PR-69</option>
      <option value="PR70">PR-70</option>
    </select></td>
  </tr>';
  }
?>
</table>

</div>

  <h2><img src="../img/coinIcon.jpg" width="21" height="20" /> Roll Details</h2>
  <table width="979" border="0" class="addCoinTbl" cellpadding="2">

  <tr>
    <td class="darker">Roll Nickname</td>
    <td width="787" colspan="4"><input name="rollNickname" type="text" id="rollNickname" size="80" value="" /></td>
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
            <td width="47%"> <label for="additional">Details</label>&nbsp;</td>
            <td width="53%">&nbsp;</td>
            </tr>
          <tr>
            <td colspan="2"><textarea name="additional" id="additional" cols="" rows="" class="wideTxtarea"><?php if(isset($_POST["additional"])){echo $_POST["additional"];} else {echo "";}?></textarea></td>
            </tr>
          </table>
      </div> 
      <div id="None" class="detailDiv2">
        
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
    <input name="coinType" type="hidden" value="<?php echo str_replace('_',' ',  $_GET["coinType"]); ?>" /> 
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Mint Roll" /></td>
    <td colspan="4"><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>