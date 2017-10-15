<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$view = 'Album';
if (isset($_GET["coinVersion"])) { 
$coinVersion = str_replace('_', ' ', strip_tags($_GET["coinVersion"]));
$coinVersionLink = strip_tags($_GET["coinVersion"]);
$coinType = $coin->getCoinTypeByVersion($coinVersion);
$coinCategory = $coin->getCoinCategoryByVersion($coinVersion);
$commemorativeType = $coin->getCommemorativeByVersion($coinVersion);

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
<title><?php echo $coinVersion; ?> Coins</title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
$('#sortTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );

});
</script>
<style type="text/css">
#listTbl h3 {margin:0px;}
#viewSwitch {font-size:16px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><?php echo $coinVersion ?> </h2>
<table class="table">  
  <tr>
    <td class="hidden-xs" width="18%" rowspan="3" valign="top"><img src="../img/<?php echo $coinVersionLink ?>.jpg" alt="Obverse and reverse" name="obvRev" width="125" height="125" title="<?php echo $coin->getCoinTypeByVersion($coinVersion) ?>" /></td>
    <td>Type</td>
    <td><a href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $coin->getCoinTypeByVersion($coinVersion)) ?>"><?php echo $coinType ?></a></td>
  </tr>
  <tr>
    <td width="23%">Total Collected</td>
    <td width="59%"><?php echo $collection->getCollectionCountByVersion($userID, $coinVersion); ?> (<?php echo $collection->getCollectionUniqueCountByVersion($userID, $coinVersion); ?> Unique)</td>
  </tr>
  <tr>
    <td>Total  Investment</td>
    <td>$<?php echo $collection->getCoinSumByVersion($userID, $coinVersion); ?></td>
    </tr>
</table>

<hr />

<?php if (str_replace('_', ' ', strip_tags($_GET["coinVersion"])) == 'Franklin Half Dollar Proof') {?>
<hr />
<?php } else { echo ''; }  ?>

<table width="100%" border="0">
  <tr>
    <td width="50%"><select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')" id="viewSwitch">
      <option selected="selected" value="">Switch View</option>
      <option value="viewCoinVersion.php?view=List&coinVersion=<?php echo strip_tags($_GET["coinVersion"]); ?>">List View</option>
      <option value="viewCoinVersion.php?view=Album&coinVersion=<?php echo strip_tags($_GET["coinVersion"]); ?>">Album View</option>
    </select></td>
    <td width="50%">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
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
$result = mysql_query("SELECT * FROM coins WHERE coinVersion = '$coinVersion' AND coinYear <= ".date('Y')." ORDER BY coinYear ASC") or die(mysql_error());
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
  <?php //if (in_array($collection->getCoinType(), $vamTypes)) {?>
 <?php //} else { echo ''; }  ?>   			
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
$countAll = mysql_query("SELECT * FROM collection WHERE coinVersion = '$coinVersion' AND userID = '$userID' ORDER BY coinYear DESC") or die(mysql_error());
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