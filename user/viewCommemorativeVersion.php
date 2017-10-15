<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$view = 'Album';
if (isset($_GET["commemorativeVersion"])) { 
$commemorativeVersion = str_replace('_', ' ', strip_tags($_GET["commemorativeVersion"]));
$commemorativeVersionLink = strip_tags($_GET["commemorativeVersion"]);

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
<title><?php echo $commemorativeVersion ?> List View</title>
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
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><?php echo $commemorativeVersion ?> </h2>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="18%" rowspan="3" valign="top"><img src="../img/<?php echo strip_tags($_GET["commemorativeVersion"]); ?>.jpg" alt="Obverse and reverse" name="obvRev" width="125" height="125" title="<?php echo $coinType ?>" /></td>
    <td>Type</td>
    <td><a href="viewListReport.php?coinType=<?php echo str_replace(' ', '_',  $Commemorative->getCommemorativeVersionCoinType($commemorativeVersion)); ?>"><?php echo  $Commemorative->getCommemorativeVersionCoinType($commemorativeVersion); ?></a></td>
  </tr>
  <tr>
    <td width="23%">Total Collected</td>
    <td width="59%"><?php echo $Commemorative->getTotalCollectedCommemorativeVersionByID($commemorativeVersion, $userID); ?> (<?php echo $Commemorative->getTotalUniqueCollectedCommemorativeVersionByID($commemorativeVersion, $userID); ?> Unique)</td>
  </tr>
  <tr>
    <td>Total  Investment</td>
    <td>$<?php echo $Commemorative->getInvestmentCommemorativeVersionByID($commemorativeVersion, $userID); ?></td>
    </tr>
</table>
  
  <div>

</div>

<hr />

<table width="100%" border="0">
  <tr>
    <td><select name="viewer" onchange="window.open(this.options[this.selectedIndex].value,'_top')" id="viewSwitch">
      <option selected="selected" value="">Switch View</option>
      <option value="viewCommemorativeVersion.php?view=List&commemorativeVersion=<?php echo strip_tags($_GET["commemorativeVersion"]); ?>">List View</option>
      <option value="viewCommemorativeVersion.php?view=Album&commemorativeVersion=<?php echo strip_tags($_GET["commemorativeVersion"]); ?>">Album View</option>
    </select></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<?php
switch ($view) {
			case 'Album': ?>
<div id="relatedTypeDiv">
<table width="100%" border="0" cellpadding="3" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM coins WHERE commemorativeVersion = '$commemorativeVersion' AND coinYear <= ".date('Y')." ORDER BY coinYear ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$coin->getCoinById($coinID);
echo '<td width="14%" height="135">
	<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.$collection->getImageByID($coinID, $userID).'" alt="" width="100" height="100" /></a><br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
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
$countAll = mysql_query("SELECT * FROM collection WHERE commemorativeVersion = '$commemorativeVersion' AND userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>&nbsp;</td>
		  <td>No '.$commemorativeVersion.' coins collected, <a class="brownLinkBold" href="addCoinType.php?coinType='.str_replace(' ', '_',  $Commemorative->getCommemorativeVersionCoinType($commemorativeVersion)).'">Add</a></strong></a></td>
		  <td>&nbsp;</td>
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