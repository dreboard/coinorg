<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$view = 'Album';

if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 

$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$CoinTypes->getCoinByType($coinType);
$denomination = number_format($CoinTypes->getDenomination() * $count,2);

$doubleType = $coin->getCoinCategory();

switch ($coin->getVarietyType()) {
			case 'DDR': 
			$ddLabel = 'Double Die Reverse Listings';
			break;
			case 'DDO': 
			$ddLabel = 'Double Die Obverse Listings';
			break;			
			
}

if (isset($_GET["view"])) { 
$view = $_GET['view'];
	
} else {
$view = 'Album';	
}

 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coin->getCoinName(); ?> Double Die Listings</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );

$("#loaderGif").hide();

$("#typeChanger").change(function() {
   $("#loaderGif").show();
});



 

});
</script>
<style type="text/css">
#listTbl h3 {margin:0px;}
#viewSwitch {font-size:16px;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2><img src="../img/<?php echo str_replace(' ', '_', $coin->getCoinVersion()); ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $coinName; ?> </h2>
<h3><a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1" class="brownLink"><?php echo $coinType ?></a>  |  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink"><?php echo substr($coin->getCoinName(), 0, 4); ?> Date Set</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear(); ?>" class="brownLink"><?php echo $coin->getCoinYear(); ?> Mint Marks</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&amp;year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink">All Mint Marks</a> | <a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo $coinCategory ?></a></h3>

<table width="100%" border="0">
  <tr>
    <td width="15%"><strong>Total Collected</strong></td>
    <td width="10%" align="right"><?php echo $count ?></td>
    <td width="11%">&nbsp;</td>
    <td width="13%"><strong>Face Value</strong></td>
    <td width="25%">$<?php echo $denomination ?></td>
    <td width="26%" align="right">
    <?php 
    echo '
 <a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&icep_uq='.str_replace(' ', '+', $coin->getCoinName()).'&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId='.$CoinTypes->getEbay().'&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg">This coin on<img src="../img/coinEbay.jpg" width="69" height="23" align="absmiddle" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&uq=2009+S+Presidency&mpt=[CACHEBUSTER]">'; ?>
    
    </td>
  </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collection->getCoinSumById($coinID, $userID) ?></td>
    <td>&nbsp;</td>
    <td>
    <?php 
	switch($coin->getCoinMetal()){
		case 'Gold':
		case 'Platinum':
		echo '';
		break;
		default:
		echo '<strong>Roll Progress</strong>';
		break;
	}
	?>
    </td>
    <td colspan="2">
	    <?php 
	switch($coin->getCoinMetal()){
		case 'Gold':
		case 'Platinum':
		echo '';
		break;
		default:
		echo $CoinTypes->getCoinRollProgress($coinType, $userID, $coinID);
		break;
	}
	?>
</td>
  </tr>
</table>
<hr />

<?php include ("../inc/pageElements/coinLinks.php");?>

<table width="100%" border="0">
  <tr>
    <td><select name="viewer" onchange="window.open(this.options[this.selectedIndex].value,'_top')" id="viewSwitch">
      <option selected="selected" value="">Switch View</option>
      <option value="coinDoubleDieReport.php?view=List&coinID=<?php echo intval($_GET["coinID"]); ?>">List View</option>
      <option value="coinDoubleDieReport.php?view=Album&coinID=<?php echo intval($_GET["coinID"]); ?>">Album View</option>
    </select></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<h3 class=""><?php echo $ddLabel; ?> Listings</h3>
<?php
switch ($view) {
			case 'Album': ?>
<div id="relatedTypeDiv">
<table width="100%" border="0" align="center" class="typeTbl" id="vamTbl" cellpadding="3">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3><?php echo $ddLabel; ?> Listings</h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder">
  <?php
switch ($coin->getVarietyType()) {
			case 'DDR': 
$arr = array();
if($coin->getCoinDDR() != 'None'){
$d = explode(',', $coin->getCoinDDR());
$i = 1;
foreach ($d as $value) {
	echo '
	  <td width="20%"><a href="viewDoubleDie.php?variety='.$value.'&coinID='.intval($_GET['coinID']).'"><img class="coinSwitch" src="../img/'.$collection->getDDRVarietyImg($coinID, trim($value), $userID).'" alt="" width="100" height="100" /></a><br />
  <span>'.$value.'</span> </td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if	
}
}

            break;
			case 'DDO':
$i = 1;
$arr = array();
$DDO = explode(',', $coin->getCoinDDO());
foreach ($DDO as $value) {
	echo '
	  <td width="20%"><a href="viewDoubleDie.php?variety='.str_replace('_', ' ', $value).'&coinID='.intval($_GET['coinID']).'"><img class="coinSwitch" src="../img/'.$collection->getDDOVarietyImg($coinID, $value, $userID).'" alt="" width="100" height="100" /></a><br />
  <span>'.$value.'</span> </td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if	
}
    break;
} ?>
  </tr>
 <tr>
<td colspan="5" align="center"><h3>Wexler Listings</h3></td>
 </tr> 
  <tr align="center" valign="top" class="dateHolder">
  <?php
switch ($coin->getVarietyType()) {
			case 'DDR': 
if($coin->getCoinWDDR() != ''){
	
$d = explode(',', $coin->getCoinWDDR());
$i = 1;
foreach ($d as $value) {
	echo '
	  <td width="20%"><img class="coinSwitch" src="../img/'.$collection->getWDDRVarietyImg($coinID, trim($value), $userID).'" alt="" width="100" height="100" /><br />
  <span>'.$value.'</span> </td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if	
}
} else {
	echo '<td colspan="5" align="center">No Wexler Listings</td>';
}
            break;
			case 'DDO':
if($coin->getCoinWDDO() != ''){			
$i = 1;
$arr = array();
$DDO = explode(',', $coin->getCoinWDDO());
foreach ($DDO as $value) {
	echo '
	  <td width="20%"><a href="viewDoubleDie.php?variety='.str_replace('_', ' ', $value).'&coinID='.intval($_GET['coinID']).'"><img class="coinSwitch" src="../img/'.$collection->getWDDOVarietyImg($coinID, $value, $userID).'" alt="" width="100" height="100" /></a><br />
  <span>'.$value.'</span> </td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if	
}
}
    break;
} ?>
  </tr>  
  
</table>
</div>			
	
			
			<?php break;
			case 'List': ?>
<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="40%">Year / Mint</td>
    <td width="11%" align="center">Grade</td>  
    <td width="13%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID' ORDER BY coinYear DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>&nbsp;</td>
		  <td>No coins collected</strong></a></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {

  $collectionIDNum = intval($row['collectionID']);
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
    $coinIcon = '<img align="absmiddle" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />';
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
   $coinIcon = '<img align="absmiddle" src="../img/'.$coinLink.'.jpg" width="20" height="20" />';
}
  
switch ($coin->getVarietyType()) {
			case 'DDO': 
  echo '
    <tr class="gryHover" align="center">
	<td width="3%" align="center" valign="middle" valign="middle">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionIDNum).'">'.substr($coin->getCoinName(), 0, 60).' '.$collection->getDDO().'</a></td>
	<td>'. $collection->getCoinGrade() .'</td>
		<td>'.date("M j Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
break;  
			case 'DDR': 
  echo '
    <tr class="gryHover" align="center">
	<td width="3%" align="center" valign="middle" valign="middle">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionIDNum).'">'.substr($coin->getCoinName(), 0, 60).' '.$collection->getDDR().'</a></td>
	<td>'. $collection->getCoinGrade() .'</td>
		<td>'.date("M j Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
break;    
}
  
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="40%">Year / Mint</td>
    <td width="11%" align="center">Grade</td>  
    <td width="13%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>			
			
			
			<?php break;				
}
?>
<p>&nbsp;</p>
  <hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>