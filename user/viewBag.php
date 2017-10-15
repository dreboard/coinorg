<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$bagID = $Encryption->decode($_GET['ID']);
$MintBag->getMintBagByID($bagID);
$coinVersion = $MintBag->getCoinVersion(); 
$coinType = $MintBag->getCoinType(); 
$coinCategory = $MintBag->getCoinCategory(); 
$coinVersionImg = str_replace(' ', '_', $MintBag->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $MintBag->getBagName() ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
</head>
<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo $coinVersionImg ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $MintBag->getBagName(); ?> </h1>
<h3>  <a href="viewSetYear.php?year=<?php echo $MintBag->getCoinYear(); ?>" class="brownLink"><?php echo $MintBag->getCoinYear(); ?></a>  | <a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo $coinCategory ?></a> | <a href="viewListReport.php?coinType=<?php echo $coinLink ?>" class="brownLink"><?php echo $coinType ?></a></h3>
<table width="100%" border="0">
  <tr>
    <td width="20%"><strong>Total Collected</strong></td>
    <td width="18%" align="right"><?php echo $collectionBags->getCountByMintBagID($bagID, $userID) ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collectionBags->getMintBagSumByID($bagID, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<hr />
<table width="100%" border="0" id="rollListTbl">
  <thead class="darker">
  <tr>
    <td width="63%">Bag Name</td>  
    <td width="17%" align="center">Condition</td>
    <td width="20%" align="center">Bag Type</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectbags WHERE userID = '$userID' AND bagID = '$bagID'") or die(mysql_error());

if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td><a href="addBulk.php" class="brownLinkBold">No '.$MintBag->getBagName().' Bags Collected</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $bagNickname = strip_tags($row['bagNickname']);  
  $coinGrade = strip_tags($row['coinGrade']);  
  $coinID = intval($row['coinID']);
  $coinCategory = strip_tags($row['coinCategory']);
  $coinGrade = strip_tags($row['coinGrade']);
  $bagType = strip_tags($row['bagType']);
  $collectbagID = intval($row['collectbagID']);
  $bagCondition = strip_tags($row['bagCondition']);
  $coinType = strip_tags($row['coinType']);
  $coinCategoryLink = str_replace(' ', '_', $coinCategory);
  
  $bagTypeLink = str_replace(' ', '_', $bagType);

  echo '
    <tr>
    <td><a href="viewBagDetail.php?ID='.$Encryption->encode($collectbagID).'">'.$bagNickname.'</a> </td>
	<td align="center">'.$bagCondition.'</td>
	<td align="center"><a href="viewBagType.php?bagType='.$bagTypeLink.'&coinCategory='.$coinCategory.'">'.$bagType.'</a></td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="63%">Bag Name</td>  
    <td width="17%" align="center">Condition</td>
    <td width="20%" align="center">Bag Type</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>