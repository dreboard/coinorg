<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


function goldYearDisplay($coinCategory, $userID, $coinYear){
	$collection = new Collection();
	$countAll = mysql_query("SELECT * FROM coins WHERE coinCategory = '".str_replace('_', ' ', $coinCategory)."' AND coinYear = '$coinYear' AND coinMetal = 'Gold'") or die(mysql_error());
	while($row = mysql_fetch_array($countAll)){
		$coinType = str_replace(' ', '_', $row['coinType']);
		$coinVersion = str_replace(' ', '_', $row['coinVersion']);
		$coinCategory = str_replace(' ', '_', $row['coinCategory']);
		$yearCoin = '<td width="140"><a href="'.str_replace(' ', '_', $coinCategory).'.php"><img class="coinSwitch" src="../img/'.$coinVersion.'.jpg" alt="" width="100" height="100" /></a><br />
 <a href="'.str_replace(' ', '_', $coinCategory).'.php">'.str_replace('_', ' ', $coinCategory).'</a></td>';
		return $yearCoin;
	}	
}


if (isset($_GET['year'])) { 
if($_GET['year'] > date('Y')){
	$year = intval(date('Y'));
} else if($_GET['year'] <= '1792'){
    $year = intval(date('Y'));
}else {
$year = intval($_GET['year']);
}
}

if (isset($_GET['century'])) { 
$year = intval($_GET['century']).strip_tags($_GET['theYear']);

if($year > date('Y')){
	$year = intval(date('Y'));
} else if($year <= '1792'){
    $year = intval(date('Y'));
}else {
$year = intval($_GET['century']).strip_tags($_GET['theYear']);
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View Mint Set</title>
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
<h1><?php echo $year; ?> Gold Sets &amp; Coins</h1>

<table border="0">
  <tr>
    <td><a href="viewGoldYear.php?year=<?php echo $year -1; ?>"><?php echo $year -1; ?></a> |</td>
    <td><a href="viewGoldYear.php?year=<?php echo $year +1; ?>"><?php echo $year +1; ?></a> |</td>
    <td> Select Year  <form action="viewGoldYear.php" method="get" class="compactForm">
<select name="century">
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
<select name="theYear">
<option value="00">00</option>
<?php 
for ($num = 1; $num <= 99; $num++) {
if($num<10)
$day = "0$num"; // add the zero
else
$day = "$num"; // don't add the zero
echo "<option value=".$day.">".$day."</option>";
}
?>
</select>

<input name="getYear" type="submit" />
</form></td>
    <td>&nbsp;</td>
    <td><a href="reportGold.php">View Gold Report</a></td>
  </tr>
</table>
<hr />
<table border="0" cellpadding="3" class="typeTbl" id="folderTbl">
<tr align="center" valign="top">
<?php
$i = 1;
$coinCategoryGroup = array("Dollar", "Quarter Eagle", "Three Dollar", "Four Dollar", "Five Dollar", "Ten Dollar", "Twenty Dollar", "Twenty Five Dollar", "Fifty Dollar");
foreach ($coinCategoryGroup as $coinCategory){
echo goldYearDisplay($coinCategory, $userID, $year); 
$i = $i + 1; //add 1 to $i
if ($i == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr>

</table>

<h2>Minsets</h2>
<a href="mintset.php">My Minsets </a> | <a href="addMintSet.php"> Add Mintset</a></p>

<table width="100%" border="0" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="57%"><strong>Set Name</strong></td>
    <td width="11%" align="center"><strong>Collected</strong></td>  
    <td width="18%" align="center"><strong>Investment</strong></td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM mintset WHERE setName LIKE '$year%'  AND coinMetal = 'Gold' ") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No mintsets issued for '.$year.'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $mintsetID = intval($row['mintsetID']);
  $Mintset->getMintsetById($mintsetID);

  echo '
    <tr align="center">
    <td align="left"><a href="viewSet.php?mintsetID='.$mintsetID.'">'.$Mintset->getSetName().'</a></td>
	<td>'.$CollectionSet->getMintsetCountByMintsetID($mintsetID, $userID).'</td>
	<td>$'.$CollectionSet->getMintsetIDSumById($mintsetID, $userID).'</td>	   
  </tr>
  ';
	  }
}
?>
</tbody>


<tfoot>
  <tr class="darker">
    <td><strong>Set Name</strong></td>
    <td align="center"><strong>Collected</strong></td>  
    <td width="18%" align="center"><strong>Investment</strong></td>
  </tr>
	</tfoot>
</table>
<hr />

<h2>Coins</h2>
<table width="100%" border="0" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="51%" height="24"><strong>Year / Mint</strong></td>  
    <td width="25%"><strong>Type</strong></td>
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM coins WHERE coinName LIKE '$year%' AND coinMetal = 'Gold' ORDER BY coinCategory DESC") or die(mysql_error());
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  $coinType = $coin->getCoinType();
  $coinYear = $coin->getCoinYear();
  $coinLink = str_replace(' ', '_', $coinType);
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>
	<td><a href="viewListReport.php?coinType='.$coinType.'">'.$coinType.'</a></td>	
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="center">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
?>
</tbody>
     
<tfoot>
  <tr class="darker">
    <td width="51%"><strong>Year / Mint</strong></td>  
    <td>Type</td>    
    <td width="10%" align="center"><strong> Collected</strong></td>
    <td width="14%" align="center"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>