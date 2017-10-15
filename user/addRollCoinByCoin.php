<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_',' ',  $_GET["coinType"]);
$coinTypeLink = strip_tags($_GET["coinType"]);
$CoinTypes->getCoinByType($coinType);
}

/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

$CoinTypes->getCoinByType(str_replace('_',' ',  $_POST["coinType"]));

mysql_query("INSERT INTO collectrolls(rollNickname, rollType, coinType, coinCategory, rollHolder, purchaseDate, purchaseFrom, auctionNumber, additional, purchasePrice, ebaySellerID, shopName, shopUrl, showName, showCity, coinNote, coinGrade, enterDate, userID, faceVal, denomination, coincollectID, containerID) VALUES ('".mysql_real_escape_string($_POST["rollNickname"])."', 'Same Type', '".str_replace('_',' ',  $_POST["coinType"])."', '".$CoinTypes->getCoinCategory()."', '".mysql_real_escape_string($_POST["rollHolder"])."', '".$General->setTheDate($_POST['purchaseDate'])."', '".$collection->setToNone($_POST["purchaseFrom"])."', '".$collection->setToNone($_POST["auctionNumber"])."', '".mysql_real_escape_string($_POST["coinNote"])."', '".$General->setThePrice(mysql_real_escape_string($_POST["purchasePrice"]))."', '".$collection->setToNone($_POST["ebaySellerID"])."', '".$collection->setToNone($_POST["shopName"])."', '".$collection->setToNone($_POST["shopUrl"])."', '".$collection->setToNone($_POST["showName"])."', '".$collection->setToNone($_POST["showCity"])."', '".$collection->setToNone($_POST["coinNote"])."', '".mysql_real_escape_string($_POST["coinGrade"])."', '$theDate', '$userID', '".$CoinTypes->getRollVal()."', '".$CoinTypes->getDenomination().", '".intval($_POST["coincollectID"])."', '".intval($_POST["containerID"])."')") or die(mysql_error()); 
$collectrollsID = mysql_insert_id();

if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
if($coinID['theID'] !==''){
      $coin->getCoinById($coinID['theID']);
	  $coinCategory = $coin->getCoinCategory();
	  $coinType = $coin->getCoinType();
	  //echo $coinID['theID'].' '. $coinID['coinGrade'].'<br />';
$sql = mysql_query("INSERT INTO collection(coinID, collectrollsID, coins, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseDate, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID['theID']."', '$collectrollsID', '".$CoinTypes->getRollCount()."', '$coinType', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', '".$coinID['coinGrade']."', '".$collection->getCoinGradeNum($coinID['coinGrade'])."', '".date("Y-m-d")."', '$theDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  
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
$Upload->SetUploadDirectory($userID.'/rolls/'.$collectrollsID.'/');
$Upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); 
$Upload->SetMaximumFileSize(3000000); 
$Upload->UploadFile();
$coinPic1 = $userID.'/rolls/'.$collectrollsID.'/'. str_replace(' ', '_', $_FILES['file']['name']);
$fileQuery = mysql_query("UPDATE collectrolls SET coinPic1 = '$coinPic1' WHERE collectrollsID = '$collectrollsID' AND userID = '$userID'") or die(mysql_error()); 
}
}

header("location: viewTypeRollDetail.php?ID=".$Encryption->encode($collectrollsID)."");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Coin By Coin Roll</title>

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

$("#addCentForm").submit(function() {
      if($("#rollNickname").val() == "")  {
		$("#errorMsg").text("Name your roll.");
		$("#endErrorMsg").text("There are form errors... Scroll up to fix");
		$("#rollNickname").addClass("errorInput");
      return false;
      }else {
		$("#addCoinFormBtn").prop('value', 'Saving Roll...');  
	  return true;
	  }
});

$("#rollNickname").click(function(){
	$(this).removeClass("errorInput");
	$("#errorMsg").text('');
	$(".addRadiosLbs").removeClass("errorTxt");
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
<table width="100%" border="0">
  <tr>
    <td width="9%" rowspan="2">
    <img src="../img/<?php echo $coinTypeLink ?>.jpg" width="80" height="80" align="absmiddle" />
    </td>
    <td width="91%"><h2> Add  <?php echo $coinType ?> Roll</h2></td>
  </tr>
  <tr>
    <td><strong>Roll Type:</strong> <a href="addRollSameCoinCollection.php">Coin By Coin</a></td>
  </tr>
</table>



 <p><a href="addRollType.php" class="brownLinkBold">Back to roll types</a> | <a href="addBulkType.php?coinType=<?php echo $_GET["coinType"]; ?>" class="brownLinkBold">Add Bulk <?php echo $coinType ?> Rolls</a></p>
 <div id="CoinList">
<p class="darker">Recently added Same <?php echo strip_tags(str_replace('_',' ',  $_GET["coinType"])) ?> Type Rolls In Your Collection</p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="70%">Type</td>
    <td width="16%">Investment</td>
    <td width="14%">Date</td>
  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM collectrolls WHERE rollType = 'Same Type' AND COINtYPE = '".strip_tags(str_replace('_',' ',  $_GET["coinType"]))."' AND userID = '$userID' ORDER BY collectrollsID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="3">You dont have any same coin rolls In Your Collection</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $collectrollsID = intval($row['collectrollsID']); 
  $collectionRolls->getCollectionRollById($collectrollsID);

  $coinID = intval($row['coinID']); 
  $coin->getCoinById($coinID);

  echo '
<tr>
<td><a href="viewTypeRollDetail.php?ID='.$Encryption->encode($collectrollsID).'">'.$collectionRolls->getRollNickname().'</a></td>
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
    <td class="darker"><label for="rollNickname">Roll Nickname</label></td>
    <td width="787"><input name="rollNickname" type="text" id="rollNickname" size="80" value="" /></td>
  </tr>
  <tr>
    <td class="darker"><label for="mintMark">Mint Marks</label></td>
    <td colspan="4"><select name="mintMark" id="mintMark">
      <option value="Mixed" selected="selected">Mixed</option>
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
    <td width="785"><select name="rollHolder" id="rollHolder">
        <option value="Paper " selected="selected">Paper</option>
        <option value="Tube">Tube</option>  
        <option value="Plastic">Plastic</option>
        </select></td>
  </tr>
    </table>
    <hr />
  <h2><img src="../img/addIcon.jpg" width="20" height="20" /> Adding Coins</h2>
      <p>Add each (up to <span class="darker"><?php echo $CoinTypes->getRollCount() ?> <?php echo str_replace('_',' ',  $_GET["coinType"]); ?></span> coins) to this roll</p>
<table width="100%" border="0">
  <tr class="darker">
    <td>Coin</td>
    <td align="left">Grade</td>
  </tr>
  <?php 
for ($i=1; $i<=$CoinTypes->getRollCount(); $i++) {
	$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_',' ',  $_GET["coinType"])."' AND coinYear <= ".date('Y')." ORDER BY coinYear ASC") or die(mysql_error()); 
	$coinCount = mysql_num_rows($sql);
	echo '<tr class="coinsRow"><td align="left">(Coin # '.$i.' ) ';
	echo '<select name="coinID['.$i.'][theID]" class="coinNumbers" id="theCoin'.$i.'"><option value="" selected="selected">Select A Coin</option>';
	while ($row = mysql_fetch_array($sql)){
		$coinStrike = strip_tags($row['strike']);
		$coinID = intval($row['coinID']);
		$coin->getCoinById($coinID);
		echo '<option value="'.$coinID.'">'.$coin->getCoinName() .'</option>';
	}
	    echo '</select></td>';
		echo '<td align="left"><select name="coinID['.$i.'][coinGrade]" id="coinGrade'.$i.'">';
	    echo '</select>&nbsp;<span class="waitSpan" id="wait'.$i.'">Generating Grades.....</span></td></tr>';		
	}
?>

</table>    

 <hr />      
<h2><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Grade Details</h2>  
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="185" class="darker">Grades</td>
    <td width="784"><strong>
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
    (Optional)</strong></td>
  </tr>
    </table>
  <hr />
  <h2><img src="../img/financeIcon.jpg" width="32" height="25" align="absmiddle" /> Purchase Details</h2> 
  <table width="979" border="0" class="addCoinTbl">
  <tr>
    <td width="186"><label for="purchaseDate">Purchase Date</label></td>
    <td><input type="text" name="purchaseDate" id="purchaseDate" class="purchaseDate" /></td>
  </tr>  
    <tr>
    <td><label for="purchasePrice">Pruchase Price</label></td>
    <td><input name="purchasePrice" type="text" id="purchasePrice" class="purchasePrice" value="" /></td>
  </tr>
  <tr>
    <td valign="top"><label for="purchaseFrom">Pruchase From</label></td>
    <td colspan="2"><select id="purchaseFrom" name="purchaseFrom">
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
     </table>
     <hr />
 <h2><img src="../img/storageMiniIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Storage/Collection</h2> 
  <table width="979" border="0" class="addCoinTbl">    
  <tr>
    <td width="167"><label for="coincollectID">Add To Collection</label></td>
    <td width="802"><label for="coincollectID"></label>
      <select name="coincollectID" id="coincollectID">	 
          <?php 
if(isset($_POST["coincollectID"])){echo '<option value="'.$_POST["coincollectID"].'" selected="selected">'.$_POST["coincollectID"].'</option>';
} else {
		echo  '<option value="0" selected="selected">No</option>'.
		$CoinCollect->getOpenList($userID);
 }?>
    </select></td>
  </tr>
  <tr>
    <td><label for="containerID">Add To Tray/Bin</label></td>
    <td><select name="containerID" id="containerID">	 
          <?php 
if(isset($_POST["coincollectID"])){echo '<option value="'.$_POST["coincollectID"].'" selected="selected">'.$_POST["coincollectID"].'</option>';
} else {
		echo  '<option value="0" selected="selected">No</option>'.
		$Container->getOpenCategoryOptions($userID, $CoinTypes->getCategoryByType(strip_tags($_GET["coinType"])));
 }?>
    </select></td>
  </tr>  
  </table> 
  <hr />
    <h2><img src="../img/cameraIcon.jpg" alt="" width="22" height="20" align="absmiddle" /> Additional</h2> 
  <table width="979" border="0" class="addCoinTbl">  
  <tr>
    <td width="132"><label for="file">Image</label></td>
    <td width="837">
      <input type="file" name="file" id="file" /> 
      Default: (Stock Image) 
      <label for="checkbox"></label></td>
  </tr>  
  <tr>
    <td><label for="coinNote">Notes</label></td>
    <td><textarea name="coinNote" id="coinNote" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td valign="bottom">  
    <input name="coinType" type="hidden" value="<?php echo str_replace('_',' ',  $_GET["coinType"]); ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Mint Roll" /></td>
    <td><span id="endErrorMsg" class="errorTxt"></span>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
