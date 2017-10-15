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
$coinCategory = $collectionRolls->getCoinCategory(); 

$CoinTypes->getCoinByType($coinType);
$rollNickname = $collectionRolls->getRollNickname();
 
$additional = $collectionRolls->getAdditional(); 

$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$coinLink = str_replace(' ', '_', $coinType);

$coinID = $collectionRolls->getCoinID();
$coin->getCoinById($coinID);
$coinStrike = $coin->getCoinStrike();

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
if(!empty($coinID['theID'])){
      $coin->getCoinById($coinID['theID']);
	  $sql = mysql_query("INSERT INTO collection(coinID, collectrollsID, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseFrom, purchaseDate, purchasePrice, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID['theID']."', '$collectrollsID', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', '".$coinID['coinGrade']."', '".$collection->getCoinGradeNum($coinID['coinGrade'])."', '".$collectionRolls->getPurchaseFrom()."', '".date("Y-m-d")."', '".$coinID['purchasePrice']."', '$theDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  
   }
  } 
 }


//////////add file
header("location: viewSameRollEdit.php?ID=".$Encryption->encode($collectrollsID)."");
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
$("#addCoinFormBtn").click(function() {
		$(this).prop('value', 'Saving Coins...');  
});
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo $coinLink ?>.jpg" width="80" height="80" align="absmiddle" /> Add Coins to <?php echo $rollNickname ?> Roll</h1>
 <p><a href="viewSameRollDetail.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>" class="brownLinkBold">Roll Main View</a></p>
 <hr />
<span class="errorTxt" id="errorMsg"><?php
if(isset($_SESSION['errorMsg'])) {
	echo $_SESSION['errorMsg'];
} else {
	$_SESSION['errorMsg'] = '';;
}
 ?></span>

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <h2> Select Up to <?php echo $optionLimit; ?> New <?php echo $coin->getCoinName(); ?> <?php echo $coin->getCoinType(); ?> Coins for This Roll.</h2>
 <p>Or. You can add more detail to each coin entering it one at a time at <a href="addCoinByID.php?coinID=<?php echo intval($coinID); ?>" class="brownLinkBold">Add A Coin</a>.  Slabbed coins will not be available for rolls. To change the roll coin you can <a href="editRollSameCoin.php?ID=<?php echo $Encryption->encode($collectrollsID) ?>" class="brownLinkBold">Edit This Roll Details</a>.</p> 
  
<div id="addCoinsList">    
<table width="100%" border="0">
  <tr class="darker">
    <td width="14%">Coin</td>
    <td width="18%">Price</td>
    <td width="68%" align="left">Grade</td>
  </tr>
  <?php 
  for ($i=1; $i<=$optionLimit; $i++) {	
	echo '<tr class="coinsRow"><td align="left">(Coin # '.$i.' ) ';
	echo '<input name="coinID['.$i.'][theID]" type="checkbox" value="'.$collectionRolls->getCoinID().'" class="coinNumbers" id="theCoin'.$i.'" /></td>';

		echo '<td><input name="coinID['.$i.'][purchasePrice]" type="text" id="purchasePrice" value="" class="purchasePrice" /></td>';
		echo '<td align="left"><select name="coinID['.$i.'][coinGrade]" id="coinGrade'.$i.'"onChange="document.getElementById(\'theCoin' . $i . '\').checked=true;">
		<option value="No Grade" selected="selected">Choose Grade...</option>
		'.$collection->getGradeList($coinStrike).'';
	    echo '</select></td></tr>';		
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
