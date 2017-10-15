<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$collectbagID = $Encryption->decode($_GET['ID']);
$collectionBags->getCollectionBagById($collectbagID);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $collectionBags->getBagNickname(); ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo str_replace(' ', '_', $collectionBags->getCoinType()); ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $collectionBags->getBagNickname(); ?></h1>
<h3><a href="viewSetYear.php?year=<?php echo $collectionBags->getCoinYear(); ?>" class="brownLink">All <?php echo $collectionBags->getCoinYear(); ?></a>  | <a href="<?php echo str_replace(' ', '_', $collectionBags->getCoinCategory()); ?>.php" class="brownLink"><?php echo $collectionBags->getCoinCategory(); ?></a> | <a href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $collectionBags->getCoinType()); ?>" class="brownLink"><?php echo $collectionBags->getCoinType(); ?></a>
<?php 
if ($collectionBags->getCoinVersion() != 'None') {
	echo ' | <a class="brownLink" href="viewCoinVersion.php?coinVersion='.str_replace(' ', '_', $collectionBags->getCoinType()).'">'.$collectionBags->getCoinVersion().'</a>';
} else {
	echo '';
}

?>
</h3>
<table width="100%" border="0">
  <tr>
    <td><a href="myBags.php" class="brownLinkBold">All Bags</a></td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php 
  if($collectionBags->getBagID() != '0'){
	  $MintBag->getMintBagByID($collectionBags->getBagID());
	  echo '
	    <tr>
		<td colspan="3">
		<a class="brownLinkBold" href="viewBag.php?bagID='.$collectionBags->getBagID().'">'.$MintBag->getBagName().'</a>
		</td>
		</tr>
	  ';
  }  
  ?>  
  <tr>
    <td><strong>Bag Type</strong></td>
    <td align="right"><a href="viewBagType.php?bagType=<?php echo str_replace(' ', '_', $collectionBags->getBagType()); ?>"><?php echo $collectionBags->getBagType() ?></a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Coin Count</strong></td>
    <td align="right"><?php echo $collectionBags->getCoinCount(); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="12%"><strong> Collected</strong></td>
    <td width="16%" align="right"><?php echo date("F j, Y",strtotime($collectionBags->getCoinDate())); ?></td>
    <td width="72%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong> Investment</strong></td>
    <td align="right">$<?php echo number_format($collectionBags->getCoinPrice() ,2); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Face Value</strong></td>
    <td align="right">$<?php echo number_format($collectionBags->getFaceVal() ,2); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Condition</strong></td>
    <td align="right"><?php echo $collectionBags->getBagCondition(); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Year</strong></td>
    <td align="right"><a href="viewBagYear.php?coinYear=<?php echo $collectionBags->getCoinYear(); ?>"><?php echo $collectionBags->getCoinYear(); ?> Bags</a></td>
    <td>&nbsp;</td>
  </tr>
</table>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>