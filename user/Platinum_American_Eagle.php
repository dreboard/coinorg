<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$commemorativeVersion = 'Platinum American Eagle';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Platinum American Eagle Collection</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<?php echo $_SESSION['message']; ?>
<h2><img src="../img/Mixed_Platinum.jpg" width="100" height="100" align="middle">My Platinum American Eagle</h2>

<table class="table">
  <tr>
    <td width="49%"><strong> Collected </strong></td>
    <td width="51%"><?php echo $Bullion->getPlatinumCountByID($userID); ?></td>
  </tr>
  <tr>
    <td><strong> Investment</strong></td>
    <td>$<?php echo $Bullion->getAllPlatinumSum($userID); ?></td>
  </tr>
  <tr>
    <td><strong> Face Value</strong></td>
    <td>$<?php echo number_format($Bullion->getAllPlatinumFaceVal($userID), 2, ".", ""); ?></td>
  </tr>
  <tr>
    <td><strong>Type  Progress</strong></td>
    <td><?php echo $Bullion->getPlatinumCollectionProgressByCategory($userID); ?> of 4 (<?php echo percent($Bullion->getPlatinumCollectionProgressByCategory($userID), '4'); ?>%)</td>
  </tr>
  <tr>
    <td><strong>Complete  Progress</strong></td>
    <td><?php echo $Bullion->getPlatinumCollectionProgressByCategory($userID); ?> of <?php echo $Bullion->getPlatinumMintCount(); ?> (<?php echo percent($Bullion->getPlatinumCollectionProgressByCategory($userID), $Bullion->getPlatinumMintCount()) ?>%)</td>
  </tr>
  </table>
<hr />

<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
<table class="table">
  <tr class="setFiveRow">
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Platinum', $userID); ?>" alt="" width="100" height="100" /><br />
    <span>Ten Dollar</span></strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Platinum Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Ten Dollar Proof</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Platinum_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
Ten Dollar Burnished</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Platinum', $userID); ?>" alt="" width="100" height="100" /><br />
Twenty Five<br />
Dollar</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Platinum_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Twenty Five<br />
Dollar Proof</strong></td>
  </tr>
  <tr class="setFiveRow">
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Platinum_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
Twenty Five <br />
Dollar Burnished</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Platinum', $userID); ?>" alt="" width="100" height="100" /><br />
Fifty Dollar</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Platinum_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Fifty Proof</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Platinum_Reverse Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Fifty Dollar <br />
Reverse Proof</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Platinum_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
Fifty Dollar Burnished</strong></td>
  </tr>
  <tr class="setFiveRow">
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Platinum', $userID); ?>" alt="" width="100" height="100" /><br />
One Hundred Dollar</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Platinum_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
One Hundred Dollar <br />
Proof</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Platinum_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
One Hundred Dollar<br />
Burnished</strong></td>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
</table>
</div>

<div class="table-responsive">
  <table class="table table-hover">
   <tr class="active">
    <td width="444" class="darker">Types</td>
    <td width="210" align="center" class="darker">Collected Pieces</td>    
    <td width="228" align="center" class="darker"> Investment</td>
  </tr>
  
  <tr>
  <td><a href="viewListReport.php?coinType=Tenth_Ounce_Platinum">$10 Tenth Ounce</a> (1986-Present)</td>
  <td align="center"><?php echo $collection->getReportTypeCount('Tenth_Ounce_Platinum', $userID); ?></td>  
  <td align="center"><?php echo $collection->getSumTypeCount('Tenth_Ounce_Platinum', $userID)?></td>

  <tr>
    <td><a href="viewListReport.php?coinType=Quarter_Ounce_Platinum">$25 Quarter Ounce</a> (1986-Present)</td>
     <td align="center"><?php echo $collection->getReportTypeCount('Quarter_Ounce_Platinum', $userID); ?></td>  
     <td align="center"><?php echo $collection->getSumTypeCount('Quarter_Ounce_Platinum', $userID)?></td>
  </tr>
  

 <tr>
    <td><a href="viewListReport.php?coinType=Half_Ounce_Platinum">$50 Half Ounce</a> (1986-Present)
    <td align="center"><?php echo $collection->getReportTypeCount('Half_Ounce_Platinum', $userID); ?></td>
    <td align="center"><?php echo $collection->getSumTypeCount('Half_Ounce_Platinum', $userID)?></td>
 </tr>
 
 
 
 <tr>
 <td><a href="viewListReport.php?coinType=One_Ounce_Platinum">$100 One Ounce</a> (1986-Present)</td>
    <td align="center"><?php echo $collection->getReportTypeCount('One_Ounce_Platinum', $userID); ?></td>
    <td align="center"><?php echo $collection->getSumTypeCount('One_Ounce_Platinum', $userID)?></td>
 </tr>

 <tr class="active">
   <td class="darker">Totals</td>
   <td align="center" class="darker"><?php echo $Bullion->getPlatinumCountByID($userID); ?></td>
   <td align="center" class="darker"><?php echo $Bullion->getAllPlatinumSum($userID); ?></td>
 </tr>
</table>
</div>
<hr>

<div class="table-responsive">
  <table class="table table-hover">
  <tr class="active">
    <td width="72%"><h3 class="noMargin">Platinum Eagle Sets</h3></td>
    <td width="28%" align="center"><h3 class="noMargin">Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM mintset WHERE coinMetal = 'Platinum' ORDER BY setName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$thisMintsetID = $row['mintsetID'];
		$setName = $row['setName'];
	echo '<tr class="setListRow">
    <td><a href="viewSet.php?ID=' . $thisMintsetID . '">' . $setName . '</a></td>
    <td align="center">'.$CollectionSet->getMintsetCountByMintsetID($thisMintsetID, $userID).'</td>
  </tr>';

	}
?>
</table>
</div> 
<hr>

<a target="_self" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&icep_uq=Platinum+American+Eagle&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=39482&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="../img/Platinum_on_ebay.jpg"  class="img-responsive hidden-xs" border="0" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&uq=Platinum+American+Eagle&mpt=[CACHEBUSTER]">
<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>