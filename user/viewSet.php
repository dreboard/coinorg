<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$getMintsetID = intval($_GET['ID']);
//$Mintset->getVarietySetById(intval($_GET['ID']));
$Mintset->getMintsetById(intval($_GET['ID']));
$mintsetID = $Mintset->getSetID();
$setYear = $str2 = substr($Mintset->getSetName(), 5);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $Mintset->getSetName(); ?> Sets</title>
<?php include("../headItems.php"); ?>

</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><?php echo $Mintset->getSetName(); ?></h2>

<table class="table">
  <tr>
    <td width="12%">View <a href="viewSetYear.php?year=<?php echo substr($Mintset->getSetName(), 0, 4); ?>" class="brownLinkBold"><?php echo substr($Mintset->getSetName(), 0, 4); ?></a></td>
    <td width="88%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option value="">Switch Set</option>
      <option value="mintset.php">All Sets</option>
      <?php 
	$getcoinType = mysql_query("SELECT * FROM mintset ORDER BY setName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$mintsetID = $row['mintsetID'];
		$setName = $row['setName'];
	echo '<option value="viewSet.php?ID=' . $mintsetID . '">' . $setName . '</option>';

	}
?>
    </select></td>
  </tr>
</table>

<table class="table">
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


 <div class="btn-group btn-group-justified">
  <div class="btn-group">
    <a class="btn btn-primary" role="button" href="addMintSetByID.php?ID=<?php echo intval($_GET['ID']); ?>">Add This Set</a>
  </div> 
  <div class="btn-group">
  <a class="btn btn-default" role="button" href="addMintSet.php">Add Mintset</a>
  </div>  
  <div class="btn-group">
  <a class="btn btn-default" role="button" href="mintset.php">My Minsets</a>
  </div>
  </div>
<hr>

<div class="table-responsive">
<table class="table tableSort  table-hover">
<thead class="darker">
  <tr class="active">
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
    <td align="left"><a href="addMintSet.php">No Sets Saved, Add Mintset</a></td>
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


<tfoot class="darker active">
  <tr class="active">
    <td width="57%">Collected</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
</div>
<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>