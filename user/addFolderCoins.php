<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["ID"])) { 
$collectfolderID = $Encryption->decode($_GET["ID"]);
$collectionFolder->getCollectionFolderById($collectfolderID);
$folderID = $collectionFolder->getFolderID();
$folder->getFolderByID($folderID);
}

function enterNewFolderCoins($collectfolderID, $coinID, $coinGrade, $userID, $purchasePrice){
if($coinID == '0' || $coinID == ''){
	return false;
} else {
$coin = new Coin();
$collection = new Collection();
$collectionRolls = new CollectionRolls();
$coin->getCoinById($coinID);
$sql = mysql_query("INSERT INTO collection(coinID, collectfolderID, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseFrom, purchaseDate, purchasePrice, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID."', '$collectfolderID', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', '".$coinGrade."', '".$collection->getCoinGradeNum($coinGrade)."', '".$collectionRolls->getPurchaseFrom()."', '".date("Y-m-d")."', '".$purchasePrice."', '$theDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	
return;
}

}


/////////ADD COIN
if (isset($_POST["addCoinFormBtn"])) { 
$collectfolderID = $Encryption->decode($_POST["ID"]);

if (is_array($_POST['coinID'])){
foreach ($_POST["coinID"] as $coinID){
enterNewFolderCoins($collectfolderID, $coinID['theID'], $coinID['coinGrade'], $userID, $coinID['purchasePrice']);	
	
//if($coinID['theID'] !=='0'){
     // $coin->getCoinById($coinID['theID']);
//$sql = mysql_query("INSERT INTO collection(coinID, collectfolderID, mintMark, coinType, coinCategory, coinSubCategory, coinYear, coinVersion, strike, coinGrade, coinGradeNum, purchaseFrom, purchaseDate, purchasePrice, enterDate, userID, errorType, errorCoin, byMint, century, design, series, designType, seriesType, commemorativeType, commemorativeVersion, commemorative, denomination, keyDate, coinMetal) VALUES('".$coinID['theID']."', '$collectfolderID', '".$coin->getMintMark()."', '".$coin->getCoinType()."', '".$coin->getCoinCategory()."', '".$coin->getCoinSubCategory()."', '".$coin->getCoinYear()."', '".$coin->getCoinVersion()."', '".$coin->getCoinStrike()."', '".$coinID['coinGrade']."', '".$collection->getCoinGradeNum($coinID['coinGrade'])."', '".$collectionRolls->getPurchaseFrom()."', '".date("Y-m-d")."', '".$coinID['purchasePrice']."', '$theDate', '$userID', 'None', '0', '".$coin->getByMint()."', '".$coin->getCentury()."', '".$coin->getDesign()."', '".$coin->getSeries()."', '".$coin->getDesignType()."', '".$coin->getCoinSeriesType()."', '".$coin->getCommemorativeType()."', '".$coin->getCommemorativeVersion()."', '".$coin->getCommemorative()."', '".$coin->getDenomination()."', '".$coin->getKeyDate()."', '".$coin->getCoinMetal()."')") or die(mysql_error()); 	  
   //}
  } 
 }

header("location: viewFolderDetail.php?ID=".$Encryption->encode($collectfolderID)."");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add Coins to <?php echo $collectionFolder->getFolderNickname() ?> </title>

<style type="text/css">
</style>
<script type="text/javascript">
$(document).ready(function(){	

$("#addCoinFormBtn").click(function() {
	$("#addCoinFormBtn").prop('value', 'Updating Folder Coin.....');
});
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo str_replace(' ', '_', $collectionFolder->getCoinType()) ?>.jpg" width="80" height="80" align="absmiddle" /> Add Coins to <?php echo $collectionFolder->getFolderNickname(); ?> Folder</h1>
 <p><a href="viewFolderDetail.php?ID=<?php echo $Encryption->encode($collectfolderID); ?>" class="brownLinkBold">Back to folder</a></p>
 <hr />
<p>All new coins added to your collection with this form will be assigned to the <?php echo $collectionFolder->getFolderNickname(); ?> Folder.</p>

<form action="" method="post" name="addCentForm" id="addCentForm">
  <table width="100%" border="0">
  <tr class="darker">
    <td width="72%">Coin</td>
    <td width="28%" align="left">Grade</td>
  </tr>
  <?php 
  $i = 0;
$coinList = explode(",", $folder->getFolderCoins());
	foreach ($coinList as $coinID) {
		$coin->getCoinById($coinID);
	     $i++;
	echo '<tr class="gryHover"><td align="left">(In Folder '.$collectionFolder->checkForCoinIDInFolder($collectfolderID, $coinID, $userID).' )<input type="checkbox" name="coinID['.$i.'][theID]" id="coinID'.$coinID.'" value="'.$coinID.'" class="folderCoinsChk" /><label for="coinID'.$coinID.'">'.$General->summary($coin->getCoinName(), $limit=100, $strip = false). '</label><br />
	In Collection: '.$collectionFolder->checkForCoinIDInCollection($collectfolderID, $coinID, $userID).'<br /><br />
	</td>
	<td align="left"><select name="coinID['.$i.'][coinGrade]" id="coinGrade'.$i.'" onChange="document.getElementById(\'coinID' . $coinID . '\').checked=true;"><option value="No Grade" selected="selected">No Grade</option>'
		.$collection->getGradeList($coin->getCoinStrike()).'</select></td></tr>';		
	}
?>
  <tr>
    <td>  
    <input name="ID" type="hidden" value="<?php echo $_GET['ID']; ?>" />
        <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Add Coins" /></td>
        <td>&nbsp;</td>
  </tr>
</table>    
</form>

</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
