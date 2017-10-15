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
<title><?php echo $coinName ?> Reference/Variety Section</title>
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
    <td colspan="2"><h3><img src="../img/varietyIcon.jpg" alt="" width="25" height="25" align="absmiddle" /> <?php echo $coinName ?> CONECA/Variety By Type</h3></td>
    </tr>
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=ddo&coinID=<?php echo $coinID; ?>">Double Die Obverse</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'ddo');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=ddr&coinID=<?php echo $coinID; ?>">Double Die Reverse</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'ddr');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=rpm&coinID=<?php echo $coinID; ?>">Repunched Mintmark</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'rpm');?></td>
  </tr>
  
  
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=rpd&coinID=<?php echo $coinID; ?>">Repunched Date</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'rpd');?></td>
  </tr>
  
  
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=omm&coinID=<?php echo $coinID; ?>">Over Mintmark</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'omm');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=mms&coinID=<?php echo $coinID; ?>">Mintmark Style</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'mms');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=odv&coinID=<?php echo $coinID; ?>">Obverse Design Variety</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'odv');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=rdv&coinID=<?php echo $coinID; ?>">Reverse Design Variety</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'rdv');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=red&coinID=<?php echo $coinID; ?>">Re Engraved Design</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'red');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=imm&coinID=<?php echo $coinID; ?>">Inverted Mintmark</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'imm');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=mdr&coinID=<?php echo $coinID; ?>">Die Marriage Registry</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'dmr');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=mdo&coinID=<?php echo $coinID; ?>">Master Die Obverse</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'mdo');?></td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><a href="viewCoinVarietyType.php?variety=mdr&coinID=<?php echo $coinID; ?>">Master Die Reverse</a></td>
    <td width="74%"><?php echo	$collection->getCoinVarietyTypeCount($userID, $coinID, 'mdr');?></td>
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