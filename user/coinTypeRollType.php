<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
$rollType = str_replace('_', ' ', $_GET["rollType"]);
$rollTypeLink = $_GET["rollType"];

$CoinTypes->getCoinByType($coinType);
$getDates = htmlentities($CoinTypes->getDates());

$categoryLink = str_replace(' ', '_', $coin->getCategoryByType($coinType));
$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinType'");
while($row = mysql_fetch_array($pageQuery))
  {
	  $pageCategory = $row['pageCategory'];
	  $buttonTxt = str_replace('_', ' ', $pageCategory); 
	  $typeCount = intval($row['typeCount']);
	  $completeSet = intval($row['completeSet']);
	  if($pageCategory == "Half Dime"){
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  }
	  if($pageCategory == "Half Dollar"){
	  $pageCategory = "Half";
	  }
	  if($pageCategory == "Small Cent"){
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  }
	  $dates = $row['dates'];

  }
 }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinType ?> <?php echo $rollType ?> Rolls</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 100
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>


<table width="100%" border="0">
  <tr>
    <td><h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="100" height="100" align="middle"> <?php echo $coinType ?> <?php echo $rollType; ?> Rolls </h1></td>
    <td align="right" valign="middle"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Type</option>
      <option value="coinTypeRolls.php?coinType=<?php echo $coinCatLink ?>">All Rolls</option>
      <option value="coinTypeRollType.php?rollType=Mint&coinType=<?php echo $coinCatLink ?>">Mint</option>
      <option value="coinTypeRollType.php?rollType=Same_Coin&coinType=<?php echo $coinCatLink ?>">Single Coin</option>
      <option value="coinTypeRollType.php?rollType=Same_Type&coinType=<?php echo $coinCatLink ?>">Same Type</option>
      <option value="coinTypeRollType.php?rollType=Mixed_Type&coinType=<?php echo $coinCatLink ?>">Mixed Type</option>
      <option value="coinTypeRollType.php?rollType=Date_Range&coinType=<?php echo $coinCatLink ?>">Date Range</option>
      <option value="coinTypeRollType.php?rollType=Same_Year&coinType=<?php echo $coinCatLink ?>">Same Year</option>
      <option value="coinTypeRollType.php?rollType=Coin_By_Coin&coinType=<?php echo $coinCatLink ?>">Coin By Coin</option>
      <option value="proofTypeRolls.php?&coinType=<?php echo $coinCatLink ?>">Proof</option>
    </select></td>
  </tr>
</table>


<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />
<table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr>
      <td align="left"><strong>Collected</strong></td>
      <td align="right"><strong>Investment</strong></td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td width="10%" align="left"><?php echo $collectionRolls->getRollTypeCountByRolltype($rollType, $userID, $coinType) ?></td>
      <td width="15%" align="right"><?php echo $collectionRolls->getRollTypeValByCoinType($rollType, $userID, $coinType)?></td>
      <td width="57%">&nbsp;</td>
    </tr>
  </tbody>
</table>

<hr />
<h3>Collected Rolls</h3>
<table width="100%" border="0" id="rollListTbl">
  <thead class="darker">
  <tr>
    <td width="63%">Roll Name</td>  
    <td width="17%" align="center">Grade Range</td>
    <td width="20%" align="center">Roll Type</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND coinType = '$coinType' AND rollType = '".str_replace('_', ' ', $_GET["rollType"])."' ") or die(mysql_error());

if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td><a href="addBulk.php" class="brownLinkBold">No '.$coinType.' Rolls Collected</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $collectionRolls->getCollectionRollById(intval($row['collectrollsID']));	  
  echo '
    <tr class="gryHover">
    <td>'.$collectionRolls->getRollTypeLink(intval($row['collectrollsID'])).'</td>
	<td align="center">'.$collectionRolls->getCoinGrade().'</td>
	<td align="center"><a href="viewRollTypes.php?rollType='.str_replace(' ', '_', $collectionRolls->getRollType()).'&coinCategory='.str_replace(' ', '_', $collectionRolls->getCoinCategory()).'">'.$collectionRolls->getRollType().'</a></td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="63%">Roll Name</td>  
    <td width="17%" align="center">Grade Range</td>
    <td width="20%" align="center">Roll Type</td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>