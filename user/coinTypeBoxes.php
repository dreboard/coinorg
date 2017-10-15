<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);

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
<title><?php echo $coinType ?> Rolls</title>
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
<h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="100" height="100" align="middle"> <?php echo $coinType ?> Rolls (<?php echo $collectionRolls->getRollCountByType($userID, $coinType); ?>)</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />
  <table width="100%" border="0">
  <tr>
    <td width="20%"><strong>Total Face Value:</strong></td>
    <td width="11%" align="center">$<?php echo $collectionRolls->getTypeFaceVal($userID, $coinType); ?></td>
    <td width="69%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Certified Rolls: </strong></td>
    <td width="11%" align="center"><?php echo $collectionRolls->getSmallCentCertCount($userID) ?></td>
    <td width="69%" align="center">&nbsp;</td>
  </tr>
</table>


<hr />
<table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr>
      <td><strong>Roll Type</strong></td>
      <td align="right"><strong>Collected</strong></td>
      <td align="right"><strong>Investment</strong></td>
      <td>&nbsp;</td>
    </tr>
  <?php 
$mintTypes = array('Lincoln Bicentennial', 'Westward Journey', 'Return to Monticello', 'District of Columbia and US Territories', 'Sacagawea Dollar', 'Presidential Dollar', 'State Quarter', 'America the Beautiful Quarter');  
if(in_array($coinType,$mintTypes)) {
  ?>  
    <tr>
      <td width="18%"><a href="coinTypeRollType.php?rollType=Mint&coinType=<?php echo $coinCatLink ?>">Mint Roll</a></td>
      <td width="10%" align="right"><?php echo $collectionRolls->getRollTypeCountByRolltype($rollType='Mint', $userID, $coinType) ?></td>
      <td width="15%" align="right"><?php echo $collectionRolls->getRollTypeValByCoinType($rollType='Mint', $userID, $coinType)?></td>
      <td width="57%">&nbsp;</td>
    </tr>
 <?php }  ?>   
    <tr>
      <td><a href="coinTypeRollType.php?rollType=Same_Coin&coinType=<?php echo $coinCatLink ?>">Single Coin</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCountByRolltype($rollType='Same Coin', $userID, $coinType) ?></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeValByCoinType($rollType='Same Coin', $userID, $coinType)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="coinTypeRollType.php?rollType=Same_Type&coinType=<?php echo $coinCatLink ?>">By Coin Type</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCountByRolltype($rollType='Same Type', $userID, $coinType) ?></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeValByCoinType($rollType='Same Type', $userID, $coinType)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="coinTypeRollType.php?rollType=Date_Range&coinType=<?php echo $coinCatLink ?>">Date Range</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCountByRolltype($rollType='Date Range', $userID, $coinType) ?></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeValByCoinType($rollType='Date Range', $userID, $coinType)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="coinTypeRollType.php?rollType=Same_Year&coinType=<?php echo $coinCatLink ?>">Same Year Mixed Mint</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCountByRolltype($rollType='Same Year', $userID, $coinType) ?></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeValByCoinType($rollType='Same Year', $userID, $coinType)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="coinTypeRollType.php?rollType=Coin_By_Coin&coinType=<?php echo $coinCatLink ?>">Coin By Coin</a></td>
            <td align="right"><?php echo $collectionRolls->getRollTypeCountByRolltype($rollType='Coin By Coin', $userID, $coinType) ?></td>
            <td align="right"><?php echo $collectionRolls->getRollTypeValByCoinType($rollType='Coin By Coin', $userID, $coinType)?></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<br />

<hr />
<h3>Complete Date Roll Sets (<?php echo $collectionRolls->getNumOfAllYearByType($coinType, $userID) ?> of <?php echo count(explode(',', $CoinTypes->getMintedYearList($getDates)));?>)</h3>


<table width="98%" border="0" cellpadding="3" class="autoCoinTbl">
<tr>
<?php 

$i = 1;
$imgURL = $CoinTypes->getMintedYearList($getDates);
$delimiter=",";
$itemList = array();
$itemList = explode($delimiter, $imgURL);
foreach($itemList as $item){
echo '<td><strong><a class="brownLink" href="viewCoinYear.php?coinType='.str_replace(' ', '_', $coinType).'&year='.$item.'">'.$item.'</a></strong> '.$collectionRolls->getNumOfRollsSavedThisYear($item, $coinType, $userID).'</td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>

<?php 
switch($coinTypeLink)
{
   case "America_the_Beautiful_Quarter":
      include "../inc/rolls/America_the_Beautiful_Quarter.php";
   break;
   case "District_of_Columbia_and_US_Territories":
      include "../inc/rolls/District_of_Columbia_and_US_Territories.php";
   break;
   case "Lincoln_Bicentennial":
      include "../inc/rolls/Lincoln_Bicentennial.php";
   break;
   case "State_Quarter":
      include "../inc/rolls/State_Quarter.php";
   break;
   case "Westward_Journey":
      include "../inc/rolls/Westward_Journey.php";
   break;
   case "Union_Shield":
      include "../inc/rolls/Union_Shield.php";
   break;            
default:
    include "../inc/rolls/default.php";
}
?>

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
$countAll = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID' AND coinType = '$coinType'") or die(mysql_error());

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