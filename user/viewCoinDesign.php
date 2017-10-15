<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$view = 'Album';
if (isset($_GET["design"])) { 
$design = str_replace('_', ' ', strip_tags($_GET["design"]));
$designLink = strip_tags($_GET["design"]);
$coinType = $coin->getCoinTypeByVersion($design);
$coinCategory = $coin->getCoinCategoryByVersion($design);

if (isset($_GET["view"])) { 
$view = $_GET['view'];
	
} else {
$view = 'Album';	
}

 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $design ?> Coins</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><?php echo $design ?> </h2>
<table class="table">  
  <tr>
    <td class="hidden-xs" width="25%" rowspan="8" valign="top"><img src="../img/<?php echo $designLink ?>.jpg" alt="Obverse and reverse" name="obvRev" width="200" height="200" title="<?php echo $coinType ?>" /></td>
    <td>Category</td>
    <td><a href="<?php echo str_replace(' ', '_', $coinCategory) ?>.php"><?php echo $coinCategory ?></a></td>
  </tr>
  <tr>
    <td width="24%">Type</td>
    <td width="51%"><a class="brownLink" href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $coinType); ?>"><?php echo $coinType ?></a></td>
  </tr>
  <tr>
    <td width="24%"> Collected</td>
    <td width="51%"><?php echo $collection->getCollectionCountByDesign($userID, $design); ?> (<?php echo $collection->getCollectionUniqueCountByDesign($userID, $design); ?> Unique)</td>
    </tr>
  <tr>
    <td width="24%">Bulk Coins</td>
    <td width="51%"><?php echo $collectionBags->getCoinCountSumByVersion(str_replace('_', ' ', strip_tags($_GET["design"])), $userID); ?></td>
    </tr>
  <tr>
    <td> Investment</td>
    <td>$<?php echo $collection->getCoinSumByDesign($userID, $design); ?></td>
    </tr>
</table>

<div class="table-responsive">
  <table class="table">
  <tr class="setFourRow" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM coins WHERE design = '".str_replace('_', ' ', strip_tags($_GET["design"]))."' ORDER BY coinID ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$coin->getCoinById($coinID);
echo '<td>
	<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.$collection->getImageByID($coinID, $userID).'" alt="" width="100" height="100" /></a><br />
	<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'"> '.$coin->getCoinName().'</a></td>';
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr class="setFourRow" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
</tr>
</table>
  </div>


   <?php 
$mintTypes = array('Westward Journey', 'Return to Monticello', 'District of Columbia and US Territories', 'Sacagawea Dollar', 'Presidential Dollar', 'State Quarter', 'America the Beautiful Quarter');  
if(in_array($coinType,$mintTypes)) {
  ?>   
<div class="well well-sm hidden-xs">
 <table class="table wellTbl">
  <tr class="setThreeRow">
    <td>Mint Rolls</td>
    <td>Mint Bags</td>
    <td>First Day</td>
  </tr>
  <tr class="setThreeRow">
      <td><a href="viewMintRoll.php?rollMintID=<?php echo $CollectMintRolls->getRollIdByDesign(str_replace('_', ' ', strip_tags($_GET["design"]))); ?>" class="btn btn-primary" role="button"><?php echo $collectionRolls->getCollectionRollsByVersion(str_replace('_', ' ', strip_tags($_GET["design"])), $userID); ?></a></td>

        <td>
    <?php 
	$bagID = $MintBag->getBagIDByCoinDesign(str_replace('_', ' ', strip_tags($_GET["design"])));
	?>
    <a href="viewBag.php?ID=<?php echo $Encryption->encode($bagID); ?>" class="btn btn-primary" role="button">
	<?php echo $collectionBags->getCountByMintBagID($bagID, $userID); ?></a></td>
    
    <td>
    <?php 
	$firstdayID = $FirstDay->getFirstDayIDByCoinDesign(str_replace('_', ' ', strip_tags($_GET["design"])));
	?>
    <a href="viewFirstDay.php?firstdayID=<?php echo $firstdayID; ?>" class="btn btn-primary" role="button">
	<?php echo $CollectionFirstday->getFirstDayCountByFirstDayId($firstdayID, $userID); ?></a></td>
  </tr>
</table></div>

<!-- Single button -->
<div class="btn-group visible-xs">
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Other Views</option>
      
   <option value="viewMintRoll.php?rollMintID=<?php echo $CollectMintRolls->getRollIdByDesign(str_replace('_', ' ', strip_tags($_GET["design"]))); ?>">Mint Rolls (<?php echo $collection->getCoinRollCountByType($coinType, $userID) ?>)</option>
    <option value="viewBag.php?ID=<?php echo $Encryption->encode($bagID); ?>">Mint Bags (<?php echo $collectionBags->getCountByMintBagID($bagID, $userID); ?>)</option>
    
    <option value="viewFirstDay.php?firstdayID=<?php echo $firstdayID; ?>">First Day Covers (<?php echo $CollectionFirstday->getFirstDayCountByFirstDayId($firstdayID, $userID); ?>
    0</option>  
</select>      
</div>

<?php }?>

<div class="visible-xs"><br /></div>

<div class="table-responsive">
 <table class="table table-hover tableSort">
<thead class="darker">
   <tr class="active">
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE design = '$design' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr class="gryHover">
		  <td><strong>No Coins Collected</strong></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {

  $collectionIDNum = strip_tags($row['collectionID']);
  $collection->getCollectionById($collectionIDNum);  
  
  $coinID = intval($row['coinID']);
  
  $coinGrade = $collection->getCoinGrade();
  $coinID = $collection-> getCoinID($coinID);  
  $coin-> getCoinByID($coinID); 
  $coinName = $coin->getCoinName(); 
  $collectedCoinName = $coin->getCoinName();
  
  $collectrollsID = intval($row['collectrollsID']);
  $collectionRolls->getCollectionRollById($collectrollsID);
  
  $collectfolderID = $collection->getCollectionFolder();
  $collectionFolder->getCollectionFolderById($collectfolderID);
  $collectrollsID = $collection->getCollectionRoll();
  
  $collectsetID = $collection->getCollectionSet();
  
  $proService = $collection->getGrader();
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />&nbsp;';
			$grader = '';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
			$grader = '/'.$collection->getGrader();
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
			$grader = '';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		   $grader = '';
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		   $grader = '';
		}
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		   $grader = '';
		}
  echo '
    <tr align="center">
    <td align="left">'.$coinIcon.'<a title="'.$collection->getCoinNickname().'" href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 40).' '. $collection->getCoinGrade() .$grader.' '.$collection->getVarietyForCoin(intval($row['collectionID'])).' '.substr($Errors->getErrorForCoin(intval($row['collectionID'])), 0, 30).'</a></td>
		<td>'.date("M j, Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}

?>
</tbody>
<tfoot class="darker">
  <tr class="active">
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
</div>    

<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>