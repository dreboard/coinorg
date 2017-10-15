<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['ID'])) { 
$collectrollsID = $Encryption->decode($_GET['ID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$CollectMintRolls->getMintRollById($collectionRolls->getRollMintID());
$coinType = $collectionRolls->getCoinType();
$rollType = $collectionRolls->getRollType();
$CoinTypes->getCoinByType($coinType);
$coinID = $collectionRolls->getCoinID();
$rollNickname = $collectionRolls->getRollNickname();
//$coinID = $collectionRolls->getCoinDate();
$coin-> getCoinById($coinID);
$coinName = $coin->getCoinName();  
$additional = $collectionRolls->getAdditional(); 
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$coinLink = str_replace(' ', '_', $coinType);

$inRollRequest = mysql_query("SELECT * FROM collection WHERE collectrollsID = '$collectrollsID' AND userID = ".$userID."") or die(mysql_error());
$inRollCount = mysql_num_rows($inRollRequest); 
$optionLimit = $CoinTypes->getRollCount() - $inRollCount;   
}

/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 

if($_POST['coinID'] == '') {
	$_SESSION['errorMsg'] = 'Please Select A Coin';
} else {

$collectrollsID = $Encryption->decode(mysql_real_escape_string($_POST["ID"]));

if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
if($coinID['theID'] !==''){
      $coin->getCoinById($coinID['theID']);
	  $coinCategory = $coin->getCoinCategory();
	  $coinType = $coin->getCoinType();
	  
$sql = mysql_query("INSERT INTO collection(coinID, collectrollsID, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseFrom, purchaseDate, purchasePrice, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID['theID']."', '$collectrollsID', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', '".$coinID['coinGrade']."', '".$collection->getCoinGradeNum($coinID['coinGrade'])."', '".$collectionRolls->getPurchaseFrom()."', '".date("Y-m-d")."', '".$coinID['purchasePrice']."', '$theDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  
   }
  } 
 }


//////////add file

header("location: viewYearRollDetail.php?ID=".$_POST["ID"]."");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Coins to <?php echo $rollNickname ?> Roll</title>

<style type="text/css">
.coinsRow:hover {background-color:#CCC;}
</style>
<script type="text/javascript">
$(document).ready(function(){	
$(".waitSpan").hide();


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

$("#coinID").click(function(){
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
<h1><img src="../img/<?php echo $coinLink ?>.jpg" width="80" height="80" align="absmiddle" /> Add Coins to <?php echo $rollNickname ?> Roll</h1>
 <p><a href="viewTypeRollDetail.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>" class="brownLinkBold">Roll Main View</a></p>
 <hr />
<span class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';;
}
 ?></span>

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <h2> Select Up to <?php echo $optionLimit; ?> New Coins for This Roll.</h2>
 <p>Or. You can add more detail to each coin entering it one at a time at <a href="addCoinType.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>" class="brownLinkBold">Add A Coin</a>.  Slabbed coins will not be available for rolls. To change the coin type you can <a href="editRollCoinType.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>" class="brownLinkBold">Edit This Roll Details</a>.</p> 
  
<div id="addCoinsList">    
<table width="100%" border="0">
  <tr class="darker">
    <td width="45%">Coin</td>
    <td width="14%">Price</td>
    <td width="41%" align="left">Grade</td>
  </tr>
  <?php 
  for ($i=1; $i<=$optionLimit; $i++) {	
	$sql = mysql_query("SELECT * FROM coins WHERE coinType = '".$coinType."' AND  coinYear = '".$collectionRolls->getCoinYear()."' AND coinYear <= ".date('Y')." AND byMint = '1'  ORDER BY coinYear ASC") or die(mysql_error()); 
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
		echo '<td><input name="coinID['.$i.'][purchasePrice]" type="text" id="purchasePrice" value="" class="purchasePrice" /></td>';
		echo '<td align="left"><select name="coinID['.$i.'][coinGrade]" id="coinGrade'.$i.'">';
	    echo '</select>&nbsp;<span class="waitSpan" id="wait'.$i.'">Generating.....</span></td></tr>';		
	}
?>
</table>    
  <br />  
</div>
<table width="979" border="0" class="addCoinTbl">  
  <tr>
    <td valign="bottom">  
    <input name="ID" type="hidden" value="<?php echo $_GET['ID']; ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Coins to Roll" /></td>
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
