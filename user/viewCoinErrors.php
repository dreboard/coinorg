<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 

$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$CoinTypes->getCoinByType($coinType);
$denomination = number_format($CoinTypes->getDenomination() * $count,2);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../scripts/lightbox.css"/>
<script type="text/javascript" src="../scripts/lightbox.js"></script>
<script type="text/javascript" src="../scripts/images.js"></script>
<title><?php echo $coinName ?> Errors</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


$("#wantForm").submit(function() {
      if ($("#coinGrade").val() == "") {
		$("#coinGrade").addClass("errorInput");
        return false;
      }else {
	 $('#wantBtn').val("Adding to list.....");	  
	  return true;
	  }
});

$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#collectionListForm").submit(function() {
      if ($("#Collection").val() == "") {
		$("#Collection").addClass("errorInput");
        return false;
      }else {
	 $('#collectionListBtn').val("Adding to collection.....");	  
	  return true;
	  }
});






});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo str_replace(' ', '_', $coin->getCoinVersion()); ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a> </h1>
<h3><a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1" class="brownLink"><?php echo $coinType ?></a>  |  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink"><?php echo substr($coin->getCoinName(), 0, 4); ?> Date Set</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear(); ?>" class="brownLink"><?php echo $coin->getCoinYear(); ?> Mint Marks</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&amp;year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink">All Mint Marks</a> | <a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo $coinCategory ?></a></h3>

<table width="100%" border="0">
  <tr>
    <td width="15%"><strong>Total Collected</strong></td>
    <td width="10%" align="right"><?php echo $count ?></td>
    <td width="11%">&nbsp;</td>
    <td width="13%"><strong>Face Value</strong></td>
    <td width="51%">$<?php echo $denomination ?></td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collection->getCoinSumById($coinID, $userID) ?></td>
    <td>&nbsp;</td>
    <td>
    <?php 
	switch($coin->getCoinMetal()){
		case 'Gold':
		case 'Platinum':
		echo '';
		break;
		default:
		echo '<strong>Roll Progress</strong>';
		break;
	}
	?>
    </td>
    <td>
	    <?php 
	switch($coin->getCoinMetal()){
		case 'Gold':
		case 'Platinum':
		echo '';
		break;
		default:
		echo $CoinTypes->getCoinRollProgress($coinType, $userID, $coinID);
		break;
	}
	?>
</td>
  </tr>
</table>
<hr />

<table width="83%" border="0">
  <tr>
    <td colspan="2"><h3><img src="../img/varietyIcon.jpg" alt="" width="25" height="25" align="absmiddle" /> <?php echo $coinName ?> Errors By Type</h3></td>
    </tr>
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=offCenter&coinID=<?php echo $coinID; ?>">Off Center</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'offCenter');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=multipleStrike&coinID=<?php echo $coinID; ?>">Multiple Strike</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'multipleStrike');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=broadstrike&coinID=<?php echo $coinID; ?>">Broadstrike</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'broadstrike');?></td>
  </tr>
  
  
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=partialCollar&coinID=<?php echo $coinID; ?>">Partial Collar</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'partialCollar');?></td>
  </tr>
  
  
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=bondedPlanchets&coinID=<?php echo $coinID; ?>">Bonded Planchets</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'bondedPlanchets');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=matedPair&coinID=<?php echo $coinID; ?>">Mated Pair</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'matedPair');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=doubleDenom&coinID=<?php echo $coinID; ?>">Double Denomination</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'doubleDenom');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=indentPercent&coinID=<?php echo $coinID; ?>">Indent</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'indentPercent');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=clippedPlanchet&coinID=<?php echo $coinID; ?>">Clipped Planchet</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'clippedPlanchet');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=mule&coinID=<?php echo $coinID; ?>">Mule</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'mule');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=rotated&coinID=<?php echo $coinID; ?>">Rotated Die</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'rotated');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=dieCrack&coinID=<?php echo $coinID; ?>">Die Crack</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'dieCrack');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=machineDouble&coinID=<?php echo $coinID; ?>">Machine Doubled</a></td>
    <td width="74%"><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'machineDouble');?></td>
  </tr>
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=strikeThru&coinID=<?php echo $coinID; ?>">Strike Thru</a></td>
    <td><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'strikeThru');?></td>
  </tr>
<tr>

    <td width="26%"><a href="viewCoinErrorType.php?error=brockage&coinID=<?php echo $coinID; ?>">Brockage</a></td>
    <td><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'brockage');?></td>
  </tr>  
  
  <tr>
   <td width="26%"><a href="viewCoinErrorType.php?error=wrongPlanchet&coinID=<?php echo $coinID; ?>">Wrong Planchet Type</a></td>
    <td><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'wrongPlanchet');?></td>
  </tr>
  <tr>
    <td width="26%"><a href="viewCoinErrorType.php?error=wrongMetal&coinID=<?php echo $coinID; ?>">Wrong Planchet Metal</a></td>
    <td><?php echo	$Errors->getErrorByTypeCoinCount($userID, $coinID, 'wrongMetal');?></td>
  </tr>
  </table>

<br />


<h3>&nbsp;</h3>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>