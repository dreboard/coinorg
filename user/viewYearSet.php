<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$getMintsetID = intval($_GET['ID']);
$VarietySet->getVarietySetById(intval($_GET['ID']));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $VarietySet->getSetName(); ?> Sets</title>
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
<h1><?php echo $VarietySet->getSetName(); ?> Sets</h1>


<table width="100%" border="0">
  <tr>
    <td width="12%">View <a href="viewSetYear.php?year=<?php echo substr($Mintset->getSetName(), 0, 4); ?>" class="brownLinkBold"><?php echo substr($Mintset->getSetName(), 0, 4); ?></a></td>
    <td width="88%"><select id="mintsetID" name="mintsetID" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option value="">Switch Set</option>
      <option value="mintset.php">All Sets</option>
      <?php 
	$sql = mysql_query("SELECT * FROM varietyset ORDER BY setName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
		$mintsetID = $row['varietysetID'];
		$setName = $row['setName'];
	echo '<option value="viewVarietySet.php?ID=' . $mintsetID . '">' . $setName . '</option>';

	}
?>
    </select></td>
  </tr>
</table>


<table width="100%" border="0">
  <tr>
    <td width="16%"><strong>Total Collected</strong></td>
    <td width="11%" align="right"><?php echo $CollectionSet->getMintsetCountByMintsetID($getMintsetID, $userID); ?></td>
    <td width="73%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $Mintset->getSetSumByType($getMintsetID, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Certified</strong></td>
    <td align="right"><?php echo $Mintset->getCoinCertifiedCountByID($getMintsetID, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<hr />
<h3><?php echo $Mintset->getSetName(); ?> Price Guide</h3>
<table width="100%" border="1" id="priceListTbl" cellpadding="3">
  <tr class="keyRow">
    <td width="27%">Value</td>
    <td width="73%">Issue Price</td>
    </tr>

  <tr>
    <td>$<?php echo $Mintset->getValue(); ?></td>
    <td>$<?php echo $Mintset->getIssuePrice(); ?></td>
    </tr>
</table>
<p><a href="mintset.php" class="brownLinkBold">My Minsets </a> | <a href="addMintSet.php" class="brownLinkBold"> Add Mintset</a> | <a href="addMintSetByID.php?ID=<?php echo intval($_GET['ID']); ?>" class="brownLinkBold"> Add <?php echo $Mintset->getSetName(); ?></a></p>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Collected</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$sql = mysql_query("SELECT * FROM collectset WHERE mintsetID = '$getMintsetID' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($sql)== 0){
	echo    ' <tr class="gryHover" align="center">
    <td align="left"><a href="addVarietySet.php">No Sets Saved, Add Variety Set</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	   
  </tr>';
} else {
  while($row = mysql_fetch_array($sql))
	  {
  $collectsetID = intval($row['collectsetID']);
  $mintsetID = intval($row['mintsetID']);
  $Mintset->getMintsetById($mintsetID);
  $CollectionSet2 = new CollectionSet();
  $CollectionSet2->getCollectionSetById($collectsetID);  
  $setNickName = $CollectionSet2->getSetNickname();
  
  echo '
    <tr class="gryHover" align="center">
    <td align="left"><a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'">'.$CollectionSet2->getSetNickname().'</a></td>
	<td>'. $CollectionSet2->getCoinGrade() .'</td>
		<td>'.date("M j, Y",strtotime($CollectionSet2->getCoinDate())) .'</td>
	<td>$'. $CollectionSet2->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot class="darker">
  <tr>
    <td width="57%">Collected</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>