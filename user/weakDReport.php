<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', strip_tags($_GET["coinType"]));
$coinVersionLink = strip_tags($_GET["coinType"]);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Lincoln Wheat BIE Collection</title>
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
#loaderGif {height:20px; width:auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><img src="../img/Lincoln_Wheat.jpg" alt="Obverse and reverse" name="obvRev" width="30" height="30" align="absmiddle" title="<?php echo $coinType ?>" /> Lincoln Wheat Weak/No D Collection</h2>
<table width="100%" border="0">  
  <tr>
    <td><strong>Type</strong></td>
    <td><a href="viewListReport.php?coinType=<?php echo str_replace(' ', '_', $coinType) ?>"><?php echo $coinType ?></a></td>
  </tr>
  <tr>
    <td width="16%"><strong>Total Collected</strong></td>
    <td width="84%"><?php echo $Errors->getBIECount($userID); ?> (<?php echo $Errors->getBIEUniqueCount($userID); ?> Unique)</td>
  </tr>
  <tr>
    <td><strong>Total  Investment</strong></td>
    <td>$<?php echo $Errors->getBIESum($userID); ?></td>
    </tr>
</table>
<hr />
<table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="33%">Full</td>
    <td width="33%">Partial</td>
    <td width="33%">Undefined</td>
  </tr>
  <tr align="center">
    <td><?php echo $Errors->getBIETypeCount($userID, $bie='Full'); ?></td>
    <td><?php echo $Errors->getBIETypeCount($userID, $bie='Partial'); ?></td>
    <td><?php echo $Errors->getBIETypeCount($userID, $bie='None'); ?></td>
  </tr>
</table>
<hr />


  <div> 

</div>
<br />
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />

<table width="100%" border="0">
  <tr>
    <td><select name="viewer" onchange="window.open(this.options[this.selectedIndex].value,'_top')" id="viewSwitch">
      <option selected="selected" value="">Switch View</option>
      <option value="lincolnBIE.php?view=List&coinType=Lincoln_Wheat">List View</option>
      <option value="lincolnBIE.php?view=Album&coinType=Lincoln_Wheat">Album View</option>
    </select></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<?php
switch ($_GET['view']) {
			case 'Album': ?>
<div id="relatedTypeDiv">
<table width="100%" border="0" cellpadding="3" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM coins WHERE coinID IN(".implode(',',$bieCoins).") ORDER BY coinYear ASC") or die(mysql_error());
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



$result = mysql_query("SELECT * FROM collection WHERE coinID IN(".implode(',',$bieCoins).") ORDER BY coinYear ASC") or die(mysql_error());
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
  <br />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>