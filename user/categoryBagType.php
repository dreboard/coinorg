<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$categoryLink = $_GET["coinCategory"];
$bagType = str_replace('_', ' ', $_GET["bagType"]);
 }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $coinCategory ?> Roll Collection</title>
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
    <td width="11%" rowspan="2"><img src="../img/<?php echo $categoryLink ?>.jpg" width="100" height="100" align="middle"></td>
    <td><h1><?php echo $coinCategory ?> Rolls</h1></td>
    <td align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <optgroup label="Half Cents">
        <option value="categoryBags.php?coinCategory=Half_Cent">Half Cents</option>
        <option value="viewBagReport.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewBagReport.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewBagReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewBagReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="categoryBags.php?coinCategory=Large_Cent">Large Cent</option>
        <option value="viewBagReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewBagReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewBagReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewBagReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewBagReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewBagReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Small Cents">
        <option value="categoryBags.php?coinCategory=Small_Cent">Small Cents</option>
        <option value="viewBagReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewBagReport.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewBagReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewBagReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewBagReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewBagReport.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="categoryBags.php?coinCategory=Two_Cent">Two Cent</option>
        <option value="viewBagReport.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="categoryBags.php?coinCategory=Three_Cent">Three Cent Grades</option>
        <option value="viewBagReport.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewBagReport.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="categoryBags.php?coinCategory=Half_Dime">Half Dime</option>
        <option value="viewBagReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewBagReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewBagReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewBagReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="categoryBags.php?coinCategory=Nickel">Nickel</option>
        <option value="viewBagReport.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewBagReport.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewBagReport.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewBagReport.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewBagReport.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewBagReport.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="categoryBags.php?coinCategory=Dime">Dime</option>
        <option value="viewBagReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewBagReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewBagReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewBagReport.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewBagReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewBagReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="categoryBags.php?coinCategory=Twenty_Cent">Twenty Cent</option>
        <option value="viewBagReport.php?coinCategory=Twenty_Cent">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="categoryBags.php?coinCategory=Quarter">Quarter</option>
        <option value="viewBagReport.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewBagReport.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewBagReport.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewBagReport.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewBagReport.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewBagReport.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewBagReport.php?coinType=State Quarter">State Quarter</option>
        <option value="viewBagReport.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewBagReport.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="categoryBags.php?coinCategory=Half_Dollar">Half Dollar</option>
        <option value="viewBagReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewBagReport.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewBagReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewBagReport.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewBagReport.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewBagReport.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewBagReport.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewBagReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="categoryBags.php?coinCategory=Dollar">Dollar</option>
        <option value="viewBagReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewBagReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewBagReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewBagReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewBagReport.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewBagReport.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewBagReport.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewBagReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewBagReport.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewBagReport.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewBagReport.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>
  <tr>
    <td width="20%" valign="top"><h3><?php echo $bagType ?> Rolls</h3></td>
    <td width="69%" valign="top"><select id="select" name="select2" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Roll Type</option>
      <option value="categoryRollType.php?coinCategory=<?php echo $categoryLink; ?>&amp;bagType=Mint">Mint Roll</option>
      <option value="categoryRollType.php?coinCategory=<?php echo $categoryLink; ?>&amp;bagType=Same_Coin">Same Coin</option>
      <option value="categoryRollType.php?coinCategory=<?php echo $categoryLink; ?>&amp;bagType=Same_Type">Same Type</option>
      <option value="categoryRollType.php?coinCategory=<?php echo $categoryLink; ?>&amp;bagType=Date_Range">Date Range</option>
      <option value="categoryRollType.php?coinCategory=<?php echo $categoryLink; ?>&amp;bagType=Same_Year">Same Year</option>
      <option value="categoryRollType.php?coinCategory=<?php echo $categoryLink; ?>&amp;bagType=Coin_By_Coin">Coin By Coin</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
<?php include("../inc/pageElements/categoryLinks.php"); ?>
<hr />

<table width="100%" border="0">
  <tr>
    <td><strong>Collected</strong></td>
    <td align="right"><?php echo $collectionBags->getRollTypeCountByRollCategory($bagType, $userID, $coinCategory) ?></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Investment</strong></td>
    <td align="right">$<?php echo $collectionBags->getRollSumByCategory($bagType, $userID, $coinCategory)?></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%"><strong>Total Face Value:</strong></td>
    <td width="11%" align="right">$<?php echo $CoinCategories->getCategoryFaceVal($userID, $coinCategory); ?></td>
    <td width="69%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Certified Rolls: </strong></td>
    <td width="11%" align="right"><?php echo $collectionBags->getSmallCentCertCount($userID) ?></td>
    <td width="69%" align="center">&nbsp;</td>
  </tr>
</table>

<hr />
<h3>Collected Rolls</h3>
<table width="100%" border="0" id="rollListTbl">
  <thead>
  <tr class="darker">
    <td width="63%" height="24"><strong>Roll Name</strong></td>  
    <td width="17%" align="center"><strong> Grade Range</strong></td>
    <td width="20%" align="center"><strong>Roll Type</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectrolls WHERE bagType = '$bagType' AND userID = '$userID' AND coinCategory = '$coinCategory'") or die(mysql_error());

if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td><a href="addBulk.php" class="brownLinkBold">No '.$bagType.' Rolls Collected</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $rollNickname = strip_tags($row['rollNickname']);  
  $coinGrade = strip_tags($row['coinGrade']);  
  $coinID = intval($row['coinID']);
  $coin->getCoinByID($coinID);
  
  $coinCategory = strip_tags($row['coinCategory']);
  $coinGrade = strip_tags($row['coinGrade']);
  $bagType = strip_tags($row['bagType']);
  $collectrollsID = intval($row['collectrollsID']);
  $collectionBags->getCollectionRollById($collectrollsID);
  //$coinYearRange
  
  $coinType = strip_tags($row['coinType']);
  $coinCategoryLink = str_replace(' ', '_', $coinCategory);
  
  $bagTypeLink = str_replace(' ', '_', $bagType);
  
  switch ($bagType)
	{
	case 'Mint Roll':
	
  echo '
    <tr>
    <td><a href="viewRollDetail.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a> </td>
	<td align="center">'.$coinGrade.'</td>
	<td align="center"><a href="viewRollTypes.php?bagType='.$bagTypeLink.'&coinCategory='.$coinCategory.'">'.$bagType.'</a></td>	    
  </tr>
  ';
	  break;
	case 'Same Coin':
  echo '
    <tr>
    <td><a href="viewRollDetail.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a> </td>
	<td align="center">'.$coinGrade.'</td>
	<td align="center"><a href="viewCoinRoll.php?coinID='.$coinID.'">View Coin</a></td>	    
  </tr>
  ';
	  break;
	case 'Same Type':
  echo '
    <tr>
    <td><a href="viewRollDetail.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a> </td>
	<td align="center">'.$coinGrade.'</td>
	<td align="center"><a href="viewRollCoinType.php?coinType='.$collectionBags->getCoinType().'">'.$collectionBags->getCoinType().'</a></td>	    
  </tr>
  ';
	  break;
    case 'Date Range':
  echo '
    <tr>
    <td><a href="viewRollDetail.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a> </td>
	<td align="center">'.$coinGrade.'</td>
	<td align="center">'.$collectionBags->getYearRange().'</td>	    
  </tr>
  ';
	  break;
	case 'Same Year':
  echo '
    <tr>
    <td><a href="viewRollDetail.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a> </td>
	<td align="center">'.$coinGrade.'</td>
	<td align="center"><a href="viewRollTypes.php?bagType='.$bagTypeLink.'&coinCategory='.$coinCategory.'">'.$bagType.'</a></td>	    
  </tr>
  ';
	  break;
	case 'Coin By Coin':
  echo '
    <tr>
    <td><a href="viewRollDetail.php?collectrollsID='.$collectrollsID.'">'.$rollNickname.'</a> </td>
	<td align="center">'.$coinGrade.'</td>
	<td align="center"><a href="viewRollCoins.php?collectrollsID='.$collectrollsID.'">View Coins</a></td>	    
  </tr>
  ';
	  break;  
	}

	  }
}
?>
</tbody>

<tfoot>
  <tr class="darker">
    <td width="63%"><strong>Roll Name</strong></td>  
    <td width="17%" align="center"><strong>Grade Range</strong></td>
    <td width="20%" align="center"><strong>Roll Type</strong></td>
  </tr>
	</tfoot>
</table>
<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>