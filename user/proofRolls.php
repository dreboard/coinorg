<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$setType = 'Proof';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Proof Coins</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/Eisenhower_Dollar_Proof.jpg" width="100" height="100" align="middle"> My <a href="proof.php" class="brownLink">Proof</a> Rolls</h1>
<table width="100%" id="reportListLinks" class="clear">
  <tr>
     <td width="33%" class="darker"><a href="myCoins.php">Coins</a></td>
    <td width="33%" class="darker"> <a href="myGrades.php">Grade Report</a></td>
    <td width="33%" class="darker"><a href="myError.php">Errors</a></td>
  </tr>
</table> 

<hr />

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="13%" align="right"><?php echo $collectionRolls->getProofRollCount($userID); ?></td>
    <td width="34%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  
    <tr>
    <td><strong>Total Coin Investment</strong></td>
    <td align="right">$<?php echo $collectionRolls->getProofRollTypeValByCoinType($userID) ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<table width="100%" border="0">
  <tr>
    <td width="16%"><h3>Proof Rolls</h3></td>
    <td width="16%"><h3><a href="myRolls.php" class="brownLink">View All Rolls</a></h3></td>
    <td width="68%"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type</option>
      <option value="myRolls.php">All Rolls</option>
      <option value="RollTypes.php?rollType=Mint">Mint</option>
      <option value="RollTypes.php?rollType=Same_Coin">Single Coin</option>
      <option value="RollTypes.php?rollType=Same_Type">Coin Type</option>
      <option value="RollTypes.php?rollType=Date_Range">Date Range</option>
      <option value="RollTypes.php?rollType=Same_Year">Same Year</option>
      <option value="RollTypes.php?rollType=Coin_By_Coin">Coin By Coin</option>
      <option value="proofRolls.php">Proof</option>
    </select></td>
  </tr>
</table>

<table width="100%" border="0" id="setList">
 <thead class="darker">
  <tr>
  <td width="59%" align="left"> Roll</td>
    <td width="24%" align="center">Type</td>
    <td width="17%" align="center">Collected</td>  
  </tr>
</thead>
  <tbody>
<?php 
	$sql = mysql_query("SELECT * FROM collectrolls WHERE strike = 'Proof' AND userID = '$userID' ORDER BY denomination ASC") or die(mysql_error()); 
if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
		  <td>No Proof Rolls Collected</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {
	while($row = mysql_fetch_array($sql)){
		$collectrollsID = $row['collectrollsID'];
		$collectionRolls->getCollectionRollById($collectrollsID);
		$rollNickname = $row['rollNickname'];
	echo '<tr class="setListRow">
    <td><a href="viewRollDetail.php?ID=' .$Encryption->encode($collectrollsID). '">' . $rollNickname . '</a></td>
	<td align="center"><a href="coinTypeRolls.php?coinType='.str_replace(' ', '_', $collectionRolls->getCoinType()).'">'. $collectionRolls->getCoinType() .'</td>
    <td align="center">'.$collectionRolls->getCoinDate().'</td>
  </tr>';

	}
}
?>
<tbody>
 <tfoot class="darker">
  <tr>
  <td width="59%" align="left"> Roll</td>
    <td width="24%" align="center">Type</td>
    <td width="17%" align="center">Collected</td>  
  </tr>
</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>