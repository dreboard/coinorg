<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$view = 'Album';
if (isset($_GET["series"])) { 
$series = str_replace('_', ' ', strip_tags($_GET["series"]));
$seriesLink = strip_tags($_GET["series"]);

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
<title><?php echo $series ?> Collection</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><?php echo $series ?></h2>
<table class="table">  
  <tr>
    <td class="hidden-xs" width="25%" rowspan="2" valign="top"><img src="../img/<?php echo str_replace(' ', '_', strip_tags($_GET["series"])) ?>.jpg" alt="Obverse and reverse" name="obvRev" width="200" height="200" /></td>
    <td width="21%" class="reportListTbl"> <strong>Collected</strong></td>
    <td width="54%" class="reportListTbl"><?php echo $collection->getCollectionCountBySeries($userID, $series); ?> (<?php echo $collection->getCollectionUniqueCountBySeries($userID, $series); ?> Unique)</td>
    </tr>
  <tr>
    <td class="reportListTbl"> <strong>Investment</strong></td>
    <td class="reportListTbl">$<?php echo $collection->getCoinSumBySeriesType($userID, $series); ?></td>
    </tr>
</table>

<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')" id="viewSwitch">
      <option selected="selected" value="">Switch View</option>
      <option value="viewCoinSeries.php?view=List&series=<?php echo strip_tags($_GET["series"]); ?>">List View</option>
      <option value="viewCoinSeries.php?view=Album&series=<?php echo strip_tags($_GET["series"]); ?>">Album View</option>
    </select>
   <br /> 


<?php
switch ($view) {
			case 'Album': ?>
<div class="table-responsive">
  <table class="table">
  <tr class="setFourRow" valign="top">
<?php
$i = 1;
$result = mysql_query("SELECT * FROM coins WHERE series = '".str_replace('_', ' ', strip_tags($_GET["series"]))."' ORDER BY denomination ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$coin->getCoinById($coinID);
echo '<td>
	<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.$collection->getImageByID($coinID, $userID).'" alt="" width="100" height="100" /></a><br />
	'.$coin->getCoinName().'
	</td>';
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

			<?php break;
			case 'List': ?>
<div class="table-responsive">
  <table class="table" id="tableSort">
  <thead class="darker">
  <tr class="active">
    <td width="3%">&nbsp;</td>
    <td width="40%">Year / Mint</td>
    <td width="11%" align="center">Grade</td>  
    <td width="13%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$result = mysql_query("SELECT * FROM collection WHERE series = '".str_replace('_', ' ', strip_tags($_GET["series"]))."' AND userID = '$userID' ORDER BY denomination DESC") or die(mysql_error());
if(mysql_num_rows($result) == 0){
	  echo '
		  <tr>
		  <td>&nbsp;</td>
		  <td>No BIE coins collected</strong></a></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($result))
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
if($collectfolderID == '0' && $collectrollsID == '0' && $proService == 'None' && $collectsetID == '0') {
    $coinIcon = '<img align="absmiddle" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="30" height="30" />';
}
else if($proService != 'None') {
    $coinIcon = '<img align="absmiddle" src="../img/graded.jpg" width="20" height="20" />';
}
else if($collectfolderID != '0') {
    $coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode($collectfolderID).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absmiddle" src="../img/Folder3.jpg" width="20" height="20" /></a>';
}
else if($collectrollsID != '0') {
   $coinIcon = '<a href="viewRollDetail.php?ID='.$Encryption->encode($collectrollsID).'" title="'.$collectionRolls->getRollNickname().'"><img align="absmiddle" src="../img/Small_Cent_Rolls.jpg" width="20" height="20" /></a>';
}
else if($collectsetID != '0') {
   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode($collectsetID).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absmiddle" src="../img/SetIcon.jpg" width="20" height="20" /></a>';
}
else { //Or else if($value == 'BB') if you might add more at some point
   $coinIcon = '<img align="absmiddle" src="../img/'.$coinLink.'.jpg" width="30" height="30" />';
}
  
//$collection->getCollectionFolder()
//$collection->getCollectionRoll()
  echo '
    <tr class="gryHover" align="center">
	<td width="3%" align="center" valign="middle" valign="middle">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionIDNum).'">'.substr($coin->getCoinName(), 0, 60).'</a></td>
	<td>'. $collection->getCoinGrade() .'</td>
		<td>'.date("M j Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr class="active">
    <td width="3%">&nbsp;</td>
    <td width="40%">Year / Mint</td>
    <td width="11%" align="center">Grade</td>  
    <td width="13%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>			
</div>
			<?php break;				
}
?>

<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>