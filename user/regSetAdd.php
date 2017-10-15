<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$setregID = $Encryption->decode($_GET['ID']);
$SetRegistry->getSetRegById($setregID);

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View <?php echo $SetRegistry->getSetregName(); ?></title>
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
<h1>Add Coins To <?php echo $SetRegistry->getSetregName(); ?></h1>

<table width="100%" border="0">
  <tr>
    <td class="darker">Type</td>
    <td align="right"><?php echo $SetRegistry->getCoinType(); ?></td>
    <td align="right"><a href="regSet.php"><strong>All SetRegistry</strong></a></td>
  </tr>
  <tr>
    <td width="15%" class="darker">Coins</td>
    <td width="28%" align="right"><?php echo $SetRegistry->getCoinsCount($setregID); ?></td>
    <td width="57%" align="right"><a href="regSetEdit.php?ID=<?php echo $Encryption->encode($setregID) ?>"><strong>Edit This Set</strong></a></td>
  </tr>
  <tr>
    <td class="darker">Investment</td>
    <td align="right">$<?php echo $SetRegistry->getCollectionSum($setregID); ?></td>
    <td align="right"><a href="regSetNew.php" class="darker">Add New Set Registry</a></td>
  </tr>
  <tr>
    <td class="darker">Collected</td>
    <td align="right"><?php echo date("F j, Y",strtotime($SetRegistry->getSetregDate()));; ?></td>
    <td align="right">&nbsp;</td>
    </tr>
</table>
<br />
<p><?php echo $SetRegistry->getSetregDesc(); ?></p>
<hr />

<h3><a href="regSetDetail.php?ID=<?php echo $Encryption->encode($setregID) ?>" class="brownLink">Album View</a> | List View</h3>
<hr />
<h3>Add Coins</h3>
<form action="" method="post" name="addRegCoinsForm">
<table width="100%" border="0">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Grade</strong></td>
    <td width="14%" align="center"><strong>Add</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE setregID = '0' AND coinType = '".$SetRegistry->getCoinType()."' AND proService = 'PCGS' AND userID = '$userID' ORDER BY coinYear ASC ") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No Coins Collected</td>
	<td>&nbsp;</td><td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $collectionID = intval($row['collectionID']);
  $coin-> getCoinById($coinID);
  $collection-> getCollectionById($collectionID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinLink = str_replace(' ', '_', $coinType);
  echo '
    <tr>
    <td><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'"  title="'.$coin->getCoinName().'">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinGrade().'</td>
	<td align="center"><input name="ID" type="checkbox" value="'.$Encryption->encode($collectionID).'" /></td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="10%" align="center"><strong> Grade</strong></td>
    <td width="14%" align="center"><strong>Add</strong></td>
  </tr>
	</tfoot>
</table>

</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>