<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$categoryLink = $_GET["coinCategory"];

 }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My <?php echo $coinCategory ?> Folder Collection</title>
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
    <td width="56%" rowspan="2"><h1><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a> Folders</h1>      <h3>&nbsp;</h3></td>
    <td align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <optgroup label="Half Cents">
        <option value="categoryRolls.php?coinCategory=Half_Cent">Half Cents</option>
        <option value="coinTypeRolls.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="coinTypeRolls.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="coinTypeRolls.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="coinTypeRolls.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="categoryRolls.php?coinCategory=Large_Cent">Large Cent</option>
        <option value="coinTypeRolls.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="coinTypeRolls.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="coinTypeRolls.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="coinTypeRolls.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="coinTypeRolls.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="coinTypeRolls.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Small Cents">
        <option value="categoryRolls.php?coinCategory=Small_Cent">Small Cents</option>
        <option value="coinTypeRolls.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="coinTypeRolls.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="coinTypeRolls.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="coinTypeRolls.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="coinTypeRolls.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="coinTypeRolls.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="categoryRolls.php?coinCategory=Two_Cent">Two Cent Grades</option>
        <option value="coinTypeRolls.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="categoryRolls.php?coinCategory=Three_Cent">Three Cent Grades</option>
        <option value="coinTypeRolls.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="coinTypeRolls.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="categoryRolls.php?coinCategory=Half_Dime">Half Dime Grades</option>
        <option value="coinTypeRolls.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="coinTypeRolls.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="coinTypeRolls.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="coinTypeRolls.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="categoryRolls.php?coinCategory=Nickel">Nickel Grades</option>
        <option value="coinTypeRolls.php?coinType=Shield_Nickel">Sheild</option>
        <option value="coinTypeRolls.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="coinTypeRolls.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="coinTypeRolls.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="coinTypeRolls.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="coinTypeRolls.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="categoryRolls.php?coinCategory=Dime">Dime Grades</option>
        <option value="coinTypeRolls.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="coinTypeRolls.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="coinTypeRolls.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="coinTypeRolls.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="coinTypeRolls.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="coinTypeRolls.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="categoryRolls.php?coinCategory=Twenty_Cent">Twenty Cent Grades</option>
        <option value="coinTypeRolls.php?coinCategory=Twenty_Cent">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="categoryRolls.php?coinCategory=Quarter">Quarter Grades</option>
        <option value="coinTypeRolls.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="coinTypeRolls.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="coinTypeRolls.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="coinTypeRolls.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="coinTypeRolls.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="coinTypeRolls.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="coinTypeRolls.php?coinType=State Quarter">State Quarter</option>
        <option value="coinTypeRolls.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="coinTypeRolls.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="categoryRolls.php?coinCategory=Half_Dollar">Half Dollar Grades</option>
        <option value="coinTypeRolls.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="coinTypeRolls.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="coinTypeRolls.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="coinTypeRolls.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="coinTypeRolls.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="coinTypeRolls.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="coinTypeRolls.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="coinTypeRolls.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="categoryRolls.php?coinCategory=Dollar">Dollar Grades</option>
        <option value="coinTypeRolls.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="coinTypeRolls.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="coinTypeRolls.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="coinTypeRolls.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="coinTypeRolls.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="coinTypeRolls.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="coinTypeRolls.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="coinTypeRolls.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="coinTypeRolls.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="coinTypeRolls.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="coinTypeRolls.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>
  <tr>
    <td width="33%" valign="top">&nbsp;</td>
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
    <td width="20%"><strong>Total Face Value:</strong></td>
    <td width="11%" align="center">$<?php echo $CoinCategories->getCategoryFaceVal($userID, $coinCategory); ?></td>
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
      <td><strong>Folder Type</strong></td>
      <td align="right"><strong>Collected</strong></td>
      <td align="right"><strong>Investment</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="18%"><a href="categoryFolderType.php?coinCategory=<?php echo $categoryLink; ?>&folderCompany=Whitman">Whitman</a></td>
      <td width="10%" align="right"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Mint', $userID, $coinCategory) ?></td>
      <td width="15%" align="right"><?php echo $collectionRolls->getRollSumByCategory($rollType='Mint', $userID, $coinCategory)?></td>
      <td width="57%">&nbsp;</td>
    </tr>
    <tr>
      <td><a href="categoryFolderType.php?coinCategory=<?php echo $categoryLink; ?>&folderCompany=H_E_Harris">H. E. Harris</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Coin', $userID, $coinCategory) ?></td>
      <td align="right"><?php echo $collectionRolls->getRollSumByCategory($rollType='Same Coin', $userID, $coinCategory)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="categoryFolderType.php?coinCategory=<?php echo $categoryLink; ?>&folderCompany=Dansco">Dansco</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Type', $userID, $coinCategory) ?></td>
      <td align="right"><?php echo $collectionRolls->getRollSumByCategory($rollType='Same Type', $userID, $coinCategory)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="categoryFolderType.php?coinCategory=<?php echo $categoryLink; ?>&folderCompany=Littleton">Littleton</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Date Range', $userID, $coinCategory) ?></td>
      <td align="right"><?php echo $collectionRolls->getRollSumByCategory($rollType='Date Range', $userID, $coinCategory)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="categoryRollType.php?coinCategory=<?php echo $categoryLink; ?>&rollType=Same_Year">Same Year Mixed Mint</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Same Year', $userID, $coinCategory) ?></td>
      <td align="right"><?php echo $collectionRolls->getRollSumByCategory($rollType='Same Year', $userID, $coinCategory)?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="categoryRollType.php?coinCategory=<?php echo $categoryLink; ?>&rollType=Coin_By_Coin">Coin By Coin</a></td>
      <td align="right"><?php echo $collectionRolls->getRollTypeCountByRollCategory($rollType='Coin By Coin', $userID, $coinCategory) ?></td>
            <td align="right"><?php echo $collectionRolls->getRollSumByCategory($rollType='Coin By Coin', $userID, $coinCategory)?></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

<hr />
<h3>Collected Rolls</h3>
<table width="100%" border="0" id="rollListTbl">
  <thead class="darker">
  <tr>
    <td width="63%" height="24">Name</td>  
    <td width="17%" align="center">Coin Type</td>
    <td width="20%" align="center">Roll Type</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM collectfolder WHERE userID = '$userID' AND coinCategory = '$coinCategory'") or die(mysql_error());

if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr class="gryHover">
    <td><a href="addFolderBlank.php" class="brownLinkBold">No '.$coinCategory.' Folders Collected</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
        $collectfolderID = intval($row['collectfolderID']);
		$collectionFolder->getCollectionFolderById($collectfolderID);
		$folderID = $collectionFolder->getFolderID();
		$folder->getFolderByID($folderID);

  echo '
    <tr class="gryHover">
    <td><a href="viewFolderDetail.php?ID='.$Encryption->encode($collectfolderID).'">'.$rollNickname.'</a> </td>
	<td align="center">'.$collectionFolder->getCoinType().'</td>
	<td align="center"><a href="viewRollTypes.php?rollType='.$rollTypeLink.'&coinCategory='.$coinCategory.'">'.$rollType.'</a></td>	    
  </tr>
  ';
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