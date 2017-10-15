<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$view = 'Album';
if (isset($_GET["seriesType"])) { 
$seriesType = str_replace('_', ' ', strip_tags($_GET["seriesType"]));
$seriesTypeLink = strip_tags($_GET["seriesType"]);

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
<title><?php echo $seriesType ?> Coins</title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );

});
</script>
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><?php echo $seriesType ?> </h2>
<table border="0" class="table">  
  <tr>
    <td rowspan="3" valign="top"><img src="../img/<?php echo str_replace(' ', '_', strip_tags($_GET["seriesType"])) ?>.jpg" alt="Obverse and reverse" name="obvRev" width="125" height="125" class="hidden-xs" /></td>
    <td>Strike</td>
    <td><a href="viewSets.php?setType=Special_Mint">U.S. Special Mint Coins</a></td>
    </tr>
  <tr>
    <td>Total Collected</td>
    <td><?php echo $collection->getCollectionCountBySeriesType($userID, $seriesType); ?> (<?php echo $collection->getCollectionUniqueCountBySeriesType($userID, $seriesType); ?> Unique)</td>
    </tr>
  <tr>
    <td>Total Investment</td>
    <td>$<?php echo $collection->getCoinSumBySeriesType($userID, $seriesType); ?></td>
    </tr>
</table>

<hr />

<select name="viewSwitch" class="form-control" id="viewSwitch" onChange="window.open(this.options[this.selectedIndex].value,'_top')">
  <option selected="selected" value="">Switch View</option>
  <option value="viewCoinSeriesType.php?seriesType=Special_Mint&view=List">List View</option>
  <option value="viewCoinSeriesType.php?seriesType=Special_Mint">Album View</option>
</select>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<?php
switch ($view) {
			case 'Album': ?>
<div class="table-responsive">
  <table class="table">
  <tr class="setFourRow" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM coins WHERE seriesType = '".str_replace('_', ' ', strip_tags($_GET["seriesType"]))."' ORDER BY coinID ASC") or die(mysql_error());
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
<table class="table" id="sortTbl">
<thead class="darker">
  <tr>
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE seriesType = '".str_replace('_', ' ', strip_tags($_GET["seriesType"]))."' AND userID = '$userID' ORDER BY coinYear DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><strong>None Collected</strong></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
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
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'. $coin->getCoinType(). ' '. $collection->getCoinGrade().$collection->getCoinAttribute(intval($row['collectionID']), $userID).$grader.' '.$collection->getVarietyForCoin(intval($row['collectionID'])).' '.substr($Errors->getErrorForCoin(intval($row['collectionID'])), 0, 30).'</a></td>
		<td>'.date("M j, Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
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