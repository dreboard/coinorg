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
<title>My <?php echo $coinType ?> Bag Collection</title>
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
<h1><img src="../img/<?php echo $coinCatLink ?>.jpg" width="100" height="100" align="middle"> <?php echo $coinType ?> Bags (<?php echo $collectionBags->getBagCountByType($userID, $coinType); ?>)</h1>
<?php include("../inc/pageElements/viewTypeLinks.php"); ?>
<hr />
  <table width="100%" border="0">
  <tr>
    <td><strong>Total Bags: </strong></td>
    <td width="11%" align="right"><?php echo $collectionBags->getCountByCoinType($userID, $coinType); ?></td>
    <td width="69%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%"><strong>Total Face Value:</strong></td>
    <td width="11%" align="right">$<?php echo $collectionBags->getBagsTypeFaceVal($userID, $coinType); ?></td>
    <td width="69%" align="center">&nbsp;</td>
  </tr>
  
</table>
<hr />

<table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr>
      <td><strong>Condition</strong></td>
      <td align="right"><strong>Amount</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="20%"><a href="http://mycoinorganizer.com/user/addMintBag.php">Sealed Box</a></td>
      <td width="11%" align="right"><?php echo $collectionBags->getBagConditionTypeCount($bagCondition='Sealed Box', $userID, $coinType); ?></td>
      <td width="69%">&nbsp;</td>
    </tr>
    <tr>
      <td><a href="http://mycoinorganizer.com/user/addBagSame.php">Sealed Bag</a></td>
      <td align="right"><?php echo $collectionBags->getBagConditionTypeCount($bagCondition='Sealed Bag', $userID, $coinType); ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="http://mycoinorganizer.com/user/addBags.php">Open Bag</a></td>
      <td align="right"><?php echo $collectionBags->getBagConditionTypeCount($bagCondition='Open Bag', $userID, $coinType); ?></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<hr />
<table width="100%" border="0" cellpadding="3">
  <tbody>
    <tr>
      <td width="20%"><strong>Bag Type</strong></td>
      <td width="11%" align="right"><strong>Collected</strong></td>
      <td width="18%" align="right"><strong>Investment</strong></td>
      <td width="51%">&nbsp;</td>
    </tr>
<?php 
switch($coinTypeLink)
{
   
   case "America_the_Beautiful_Quarter":
   case "District_of_Columbia_and_US_Territories":
   case "Lincoln_Bicentennial":
   case "State_Quarter":
   case "Westward_Journey":
   case "Union_Shield":
   case "Sacagawea_Dollar":
   case "Kennedy_Half_Dollar":
      echo '    <tr>
      <td width="20%"><a href="viewBagTypeReport.php?coinType='.$coinTypeLink.'&bagType=Mint">Mint Bag</a></td>
      <td width="11%" align="right">'.$collectionBags->getBagTypeCountByCoinType($bagType="Mint", $userID, $coinType).'</td>
      <td width="12%" align="right">'.$collectionBags->getCoinTypeBagSumByBagType($bagType="Mint", $userID, $coinType).'</td>
      <td width="57%">&nbsp;</td>
    </tr>';
   break;            
default:
    echo '';;
}
?>    
    
    <tr>
      <td><a href="viewBagTypeReport.php?coinType=<?php echo $coinTypeLink ?>&bagType=Mint_Series">Mint Series</a></td>
      <td align="right"><?php echo $collectionBags->getBagTypeCountByCoinType($bagType='Mint Series', $userID, $coinType) ?></td>
      <td align="right"><?php echo $collectionBags->getCoinTypeBagSumByBagType($bagType='Mint Series', $userID, $coinType)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="viewBagTypeReport.php?coinType=<?php echo $coinTypeLink ?>&bagType=Mint">Mint</a></td>
      <td align="right"><?php echo $collectionBags->getBagTypeCountByCoinType($bagType='Mint', $userID, $coinType) ?></td>
      <td align="right"><?php echo $collectionBags->getCoinTypeBagSumByBagType($bagType='Mint', $userID, $coinType)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="viewBagTypeReport.php?coinType=<?php echo $coinTypeLink ?>&amp;bagType=Same_Type">By Coin Type</a></td>
      <td align="right"><?php echo $collectionBags->getBagTypeCountByCoinType($bagType='Same Type', $userID, $coinType) ?></td>
      <td align="right"><?php echo $collectionBags->getCoinTypeBagSumByBagType($bagType='Same Type', $userID, $coinType)?></td>
      <td>&nbsp;</td>
    </tr>
    
  </tbody>
</table>
<?php 
switch($coinTypeLink)
{
   
   case "America_the_Beautiful_Quarter":
      include "../inc/bags/America_the_Beautiful_Quarter.php";
   break;
   case "District_of_Columbia_and_US_Territories":
      include "../inc/bags/District_of_Columbia_and_US_Territories.php";
   break;
   case "Lincoln_Bicentennial":
      include "../inc/bags/Lincoln_Bicentennial.php";
   break;
   case "State_Quarter":
      include "../inc/bags/State_Quarter.php";
   break;
   case "Westward_Journey":
      include "../inc/bags/Westward_Journey.php";
   break;
   case "Union_Shield":
      include "../inc/bags/Union_Shield.php";
   break;            
   
default:
    include "../inc/bags/default.php";
}
?>

<hr />
<h3>Collected Bags</h3>
<table width="100%" border="0" id="rollListTbl">
  <thead class="darker">
  <tr>
    <td width="63%">Bag Name</td>  
    <td width="17%" align="center">Condition</td>
    <td width="20%" align="center">Bag Type</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectbags WHERE userID = '$userID' AND coinType = '$coinType'") or die(mysql_error());

if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td><a href="addBulk.php" class="brownLinkBold">No '.$coinType.' Bags Collected</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $bagNickname = strip_tags($row['bagNickname']);  
  $coinGrade = strip_tags($row['coinGrade']);  
  $coinID = intval($row['coinID']);
  $coinCategory = strip_tags($row['coinCategory']);
  $coinGrade = strip_tags($row['coinGrade']);
  $bagType = strip_tags($row['bagType']);
  $collectbagID = intval($row['collectbagID']);
  $bagCondition = strip_tags($row['bagCondition']);
  $coinType = strip_tags($row['coinType']);
  $coinCategoryLink = str_replace(' ', '_', $coinCategory);
  
  $bagTypeLink = str_replace(' ', '_', $bagType);

  echo '
    <tr>
    <td><a href="viewBagDetail.php?ID='.$Encryption->encode($collectbagID).'">'.$bagNickname.'</a> </td>
	<td align="center">'.$bagCondition.'</td>
	<td align="center"><a href="viewBagTypes.php?bagType='.$bagTypeLink.'&coinCategory='.$coinCategory.'">'.$bagType.'</a></td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

<tfoot class="darker">
  <tr>
    <td width="63%">Bag Name</td>  
    <td width="17%" align="center">Condition</td>
    <td width="20%" align="center">Bag Type</td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>