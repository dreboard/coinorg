<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);

$coin-> getCoinById($coinID);
$coinType = $coin->getCoinType();
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());

$coinName = $coin->getCoinName();  
$coinGrade = $WantList->getCoinGrade();
$proService = $WantList->getGrader();

$linkName = str_replace(' ', '_', $coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinLink = str_replace(' ', '_', $coinType);


$coinPic1 = '<img src="../img/'.$coinVersion.'.jpg" width="250" height="250" />';


}
//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) { 
$wantlistID = mysql_real_escape_string($_POST["wantlistID"]);
mysql_query("DELETE FROM wantlist WHERE wantlistID = '$wantlistID'") or die(mysql_error()); 
header("location: want.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinName ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span>Want List</span>

<h1><a href="viewCoin.php?coinID=<?php echo $coinID ?>"><?php echo $coinName; ?></a> Wanted</h1>

<table width="930" id="viewTbl">
  <tr>
    <td width="263" rowspan="11" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo $coinPic1 ?></a></td>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td width="155" class="tdHeight"><span class="darker">Type: </span></td>
<td width="478" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinLink ?>"><?php echo $coinType ?></a></td>
<td width="14"></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Grade Wanted:</strong></td>
    <td class="tdHeight"><?php echo $coinGrade ?></td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grading Service:</strong></td>
    <td class="tdHeight"><?php echo $proService ?></td>
    <td></td>
  </tr>
<tr>
<td class="tdHeight"><span class="darker">List Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($WantList->getEnterDate())); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><span class="darker">In Collection:</span></td>
  <td class="tdHeight"><a href="viewCoin.php?coinID=<?php echo $coinID ?>"><?php echo getDuplicates($coinID, $userID) ?></a></td>
</tr>
  <tr>
    <td><a href="viewCoinEdit.php?collectionID=<?php echo $collectionID ?>">Edit This Coin</a></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><br />
<form action="" method="post" name="deleteCoinForm" id="deleteCoinForm" class="compactForm">
<input name="coinID" type="hidden" value="<?php echo $coinID ?>" />
<input name="wantlistID" type="hidden" value="<?php echo $wantlistID ?>" />
<input name="deleteCoinFormBtn" type="submit" value="Delete Coin From Want List" onclick="return confirm('Remove From List?')" />
</form></td>
    </tr>
</table>
<hr />
<h3>Wanted Coins</h3>
<table width="100%" border="0">
  <tr class="darker">
    <td width="11%">Date</td>
    <td width="55%">Coin</td>
    <td width="11%">Grade</td>   
        <td width="10%">Grader</td>  
    <td width="13%"> Investment</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM wantlist WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
$wantNums = mysql_num_rows($collectionQuery);
if($wantNums == 0){
	  echo '
		  <tr>
		  <td colspan="5">You dont have any In Your Want List</td> 
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coinID = $row['coinID'];
  
  if($row['coinID'] == '0'){
	  $thumb = '';
  } else {
	  $thumb = '<img src="'.$userID.'/'.$coinVersion.'" width="auto" height="25" />';
  }
  $coinID = intval($row['coinID']); 
  $collectionID = $row['collectionID']; 
  $purchaseDate = date("F j, Y",strtotime($row["purchaseDate"]));
  $coinGrade = $row['coinGrade']; 
  $purchasePrice = $row['purchasePrice'];  
  $collectedCoin = new Coin();
  $collectedCoin-> getCoinById($coinID);
  $collection-> getCollectionById($collectionID);
  $collectedCoinName = $collectedCoin->getCoinName();
  $coinPurchaseDate = date("M j, Y",strtotime($collection->getCoinDate()));
  $proService = $row['proService'];  
  $thePageCode = "Go to the view coin page to view this coin";
  //SEND ENCODED COLLECTIONID 
  echo '
<tr>
<td>'.$coinPurchaseDate.'</td> 
<td><a href="viewCoinDetail.php?collectionID='.$collectionID.'">'.$collectedCoinName.'</a></td>
<td>'.$coinGrade.'</td>
<td>'.$proService.'</td>
<td>'.$purchasePrice.'</td>
</tr>  
  ';
  }
}
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>
<a href="subCollect.php?collectionID=<?php echo $collectionID ?>">Add This coin to collection</a> | <a href="addCoinType.php?coinType=<?php echo $coinLink ?>">Add <?php echo $coinType ?></a></p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>