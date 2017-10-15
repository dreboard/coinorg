<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["rollType"])) { 
$rollType = str_replace('_', ' ', $_GET["rollType"]);
$rollTypeLink = $_GET["rollType"];
switch(str_replace('_', ' ', $_GET["rollType"])){
			case 'Same Coin':
			$addLink = '<a href="addRollSame.php">Add Same Coin Roll</a>';
			break;
			case 'Mint':
			$addLink = '<a href="addMintRoll.php">Add Mint Roll</a>';
			break;
			case 'Date Range':
			$addLink = '<a href="addRollDateRange.php">Add Date Range Roll</a>';
			break;
			case 'Mixed Type':
			$addLink = '<a href="addRollsMixed.php">Add Mixed Type Roll</a>';
			break;
			case 'Same Year':
			$addLink = '<a href="addRollSameMintDiffYrs.php">Add Same Year Roll</a>';
			break;
			case 'Same Type':
			$addLink = '<a href="addRollSameType.php">Add Same Type Roll</a>';
			break;
			case 'Coin By Coin':
			$addLink = '<a href="addRollSameType.php">Add Same Type Roll</a>';
			break;			
		}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coin Rolls Report</title>

<style type="text/css">
.gradeNums td {padding:5px; font-size:120%;}
#setList .setListRow:hover{background-color:#ccc;}
table h3 {margin:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1><img src="../img/<?php echo $_GET["rollType"] ?>.jpg" alt="" width="100" height="100" align="middle"> My <?php echo $rollType ?> Rolls</h1>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="20%"><h3>Rolls Collected</h3></td>
    <td width="18%" align="right"><?php echo $collectionRolls->getRollTypeCount($rollType, $userID) ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $collectionRolls->getCoinSumByRollType($rollType, $userID)?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Certified</h3></td>
    <td align="right"><?php echo $CollectionFirstday->getCertificationFirstDayCountById($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>

  <div>
    <hr class="clear">
<table width="100%" border="0">
  <tr>
    <td width="20%"><h3><a href="myRolls.php" class="brownLink">View All Rolls</a></h3></td>
    <td width="18%"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type</option>
      <option value="myRolls.php">All Rolls</option>
      <option value="RollTypes.php?rollType=Mint">Mint</option>
      <option value="RollTypes.php?rollType=Same_Coin">Single Coin</option>
      <option value="RollTypes.php?rollType=Same_Type">Same Type</option>
      <option value="RollTypes.php?rollType=Mixed_Type">Mixed Type</option>      
      <option value="RollTypes.php?rollType=Date_Range">Date Range</option>
      <option value="RollTypes.php?rollType=Same_Year">Same Year</option>
      <option value="RollTypes.php?rollType=Coin_By_Coin">Coin By Coin</option>
      <option value="proofRolls.php">Proof</option>
    </select></td>
    <td width="62%"><h3><?php echo $addLink ?></h3></td>
  </tr>
</table>
<br>

    
   <table width="100%" border="0" id="setList">
 <thead class="darker">
  <tr>
  <td width="59%" align="left"> Roll</td>
    <td width="24%" align="center">Type</td>
    <td width="17%" align="center">Collected</td>  
  </tr>
</thead>
  <tbody>
<?php 
	$sql = mysql_query("SELECT * FROM collectrolls WHERE rollType = '".str_replace('_', ' ', $_GET["rollType"])."' AND userID = '$userID' ORDER BY denomination ASC") or die(mysql_error()); 
if(mysql_num_rows($sql) == 0){
	  echo '
		  <tr>
		  <td>No '.str_replace('_', ' ', $_GET["rollType"]).' Rolls Collected</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>  ';
} else {
	while($row = mysql_fetch_array($sql)){
		$collectionRolls->getCollectionRollById($row['collectrollsID']);
		$rollNickname = $row['rollNickname'];
	echo '<tr class="setListRow">
    <td>' .$collectionRolls->getRollTypeLink($row['collectrollsID']).'</td>
	<td align="center"><a href="coinTypeRolls.php?coinType='.str_replace(' ', '_', $collectionRolls->getCoinType()).'">'. $collectionRolls->getCoinType() .'</a></td>
    <td align="center">'.$collectionRolls->getCoinDate().'</td>
  </tr>';
	}
}
?>
<tbody>
 <tfoot class="darker">
  <tr>
  <td width="59%" align="left"> Roll</td>
    <td width="24%" align="center">Type</td>
    <td width="17%" align="center">Collected</td>  
  </tr>
</tfoot>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>