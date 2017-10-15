<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET['rollType'])) { 
$rollType = strip_tags(str_replace('_',' ', $_GET['rollType']));
$coinCategory = strip_tags($_GET['coinCategory']);
//$coinCategory = $coin->getCategoryByType($coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
  
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $rollType ?> Rolls</title>
 <script type="text/javascript">
$(document).ready(function(){	

$('#rollListTbl').dataTable( {
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
<hr />

<h1><img src="../img/<?php echo str_replace(' ', '_', $coinCategory) ?>.jpg" width="100" height="100" align="absmiddle" /> <a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo str_replace('_', ' ', $coinCategory) ?></a> <?php echo $rollType ?> Rolls</h1>

<?php include("../inc/pageElements/categoryLinks.php"); ?>
<hr />
<table width="100%" border="0">
  <tr>
    <td width="20%"><h3><a href="categoryRolls.php?coinCategory=<?php echo $_GET['coinCategory'] ?>" class="brownLink">View All Rolls</a></h3></td>
    <td width="18%"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type</option>
      <option value="myRolls.php">All Rolls</option>
      <option value="viewRollTypes.php?rollType=Mint&coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>">Mint</option>
      <option value="viewRollTypes.php?rollType=Same_Coin&coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>">Single Coin</option>
      <option value="viewRollTypes.php?rollType=Same_Type&coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>">Same Type</option>
      <option value="viewRollTypes.php?rollType=Mixed_Type&coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>">Mixed Type</option>      
      <option value="viewRollTypes.php?rollType=Date_Range&coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>">Date Range</option>
      <option value="viewRollTypes.php?rollType=Same_Year&coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>">Same Year</option>
      <option value="viewRollTypes.php?rollType=Coin_By_Coin&coinCategory=<?php echo str_replace(' ', '_', $coinCategory) ?>">Coin By Coin</option>
      <option value="proofRolls.php">Proof</option>
    </select></td>
    <td width="62%"><h3><a href="addRollType.php">Add Roll</a></h3></td>
  </tr>
</table>
<hr />

<table width="100%" border="0" id="rollListTbl">
<thead class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="18%">Type</td>
    <td width="19%" align="center">Coin</td>
    <td width="12%" align="center">Purchase </td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND rollType = '$rollType' AND coinCategory = '$coinCategory'") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td><a href="addBulk.php" class="brownLinkBold">No '.$rollType.' Rolls Collected</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $collectrollsID = $row['collectrollsID'];
  $collectionRolls->getCollectionRollById($collectrollsID);
  echo '
    <tr class="gryHover">
    <td>'.$collectionRolls->getRollTypeLink($collectrollsID).'</td>
	<td><a href="coinTypeRollType.php?rollType='.str_replace(' ', '_', $collectionRolls->getRollType()).'&coinType='.str_replace(' ', '_', $collectionRolls->getCoinType()).'">'.$collectionRolls->getCoinType().'</a></td>	
	<td align="center"><a href="viewRollTypes.php?rollType='.str_replace(' ', '_', $collectionRolls->getRollType()).'&coinCategory='.str_replace(' ', '_', $collectionRolls->getCoinCategory()).'">'.$collectionRolls->getRollType().'</a></td>
	<td align="center">$'.$collectionRolls->getCoinPrice().'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>
     
<tfoot class="darker">
  <tr>
    <td width="51%" height="24">Year / Mint</td>  
    <td width="18%">Type</td>
    <td width="19%" align="center">Coin</td>
    <td width="12%" align="center">Purchase </td>
  </tr>
	</tfoot>
</table>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>