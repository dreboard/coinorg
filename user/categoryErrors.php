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
<title><?php echo $coinCategory ?> Errors</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 1, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<table width="100%" border="0">
  <tr>
    <td width="11%" rowspan="2"><img src="../img/<?php echo $categoryLink ?>.jpg" width="100" height="100" align="middle"></td>
    <td width="56%" rowspan="2"><h1><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a> Error Coins</h1>      <h3>&nbsp;</h3></td>
    <td align="right"><select id="select" name="select2" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <optgroup label="Half Cents">
        <option value="categoryCoins.php?coinCategory=Half_Cent">Half Cents</option>
        <option value="viewCoinType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewCoinType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewCoinType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewCoinType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="categoryCoins.php?coinCategory=Large_Cent">Large Cent</option>
        <option value="viewCoinType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewCoinType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewCoinType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewCoinType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewCoinType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewCoinType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Small Cents">
        <option value="categoryCoins.php?coinCategory=Small_Cent">Small Cents</option>
        <option value="viewCoinType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewCoinType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewCoinType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewCoinType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewCoinType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewCoinType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="categoryCoins.php?coinCategory=Two_Cent">Two Cent</option>
        <option value="viewCoinType.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="categoryCoins.php?coinCategory=Three_Cent">Three Cent</option>
        <option value="viewCoinType.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewCoinType.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="categoryCoins.php?coinCategory=Half_Dime">Half Dime</option>
        <option value="viewCoinType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewCoinType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewCoinType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewCoinType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="categoryCoins.php?coinCategory=Nickel">Nickel</option>
        <option value="viewCoinType.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewCoinType.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewCoinType.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewCoinType.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewCoinType.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewCoinType.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="categoryCoins.php?coinCategory=Dime">Dime</option>
        <option value="viewCoinType.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewCoinType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewCoinType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewCoinType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewCoinType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewCoinType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="categoryCoins.php?coinCategory=Twenty_Cent">Twenty Cent Grades</option>
        <option value="viewCoinType.php?coinCategory=Twenty_Cent">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="categoryCoins.php?coinCategory=Quarter">Quarter</option>
        <option value="viewCoinType.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewCoinType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewCoinType.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewCoinType.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewCoinType.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewCoinType.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewCoinType.php?coinType=State Quarter">State Quarter</option>
        <option value="viewCoinType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewCoinType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="categoryCoins.php?coinCategory=Half_Dollar">Half Dollar</option>
        <option value="viewCoinType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewCoinType.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewCoinType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewCoinType.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewCoinType.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewCoinType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewCoinType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewCoinType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="categoryCoins.php?coinCategory=Dollar">Dollar</option>
        <option value="viewCoinType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewCoinType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewCoinType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewCoinType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewCoinType.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewCoinType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewCoinType.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewCoinType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewCoinType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewCoinType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewCoinType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
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
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="11%" align="right"><?php echo $collection->getTotalCollectedCoinsByID($coinCategory, $userID); ?></td>
    <td width="36%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td align="right"><?php echo $collection->getUniqueCollectionCountByCategory($userID, $coinCategory) ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Collection Investment</strong></td>
    <td align="right">$<?php echo $collection->getTotalInvestmentSumByCategory($coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<h1>Error  By  Type</h1>
<table width="100%" border="1" cellpadding="3" id="categoryErrorTbl">
    <tr class="keyRow">
      <td>Grade</td>
      <td align="center">Errors</td>
      <td align="center">Third Party Errors</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="SemiKeyRow">
      <td>Error Type</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td width="40%"><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&errorType=xxxxxx">Off Center</a></strong></td>
    <td width="12%" align="center"><?php echo $collection->getCategoryError('Off Center', $coinCategory, $userID); ?></td>
    <td width="26%" align="center"><?php echo $collection->getCategoryProError('Off Center', $coinCategory, $userID); ?></td>
    <td width="22%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Broadstrike</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Broadstrike', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Broadstrike', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Partial Collar</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Partial Collar', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Partial Collar', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Multiple Strike</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Multiple Strike', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Multiple Strike', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Mated Pair</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Mated Pair', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Mated Pair', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Brockage</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Brockage', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Brockage', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Capped Die</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Capped Die', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Capped Die', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Indent</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Indent', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Indent', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Bonded</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Bonded', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Bonded', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Wrong Planchet</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Wrong Planchet', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Wrong Planchet',  $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Mule</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Mule', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Mule', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Weak Strike</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Weak Strike', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Weak Strike', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Transitional Error</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Transitional Error', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Transitional Error', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Double Denomination</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Double Denomination', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Double Denomination', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Folded Over</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Folded Over', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Folded Over', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Clipped Planchet</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Clipped Planchet',  $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Clipped Planchet',  $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Lamination Error</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Lamination Error', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Lamination Error',  $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Missing Edge Lettering</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Missing Edge Lettering', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Missing Edge Lettering', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr class="SemiKeyRow">
    <td><strong>Minor Errors</strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Die Cracks</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Die Cracks', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Die Cracks', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Machine Doubling</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Machine Doubling', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Machine Doubling', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Die Deterioration Doubling</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Die Deterioration Doubling', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Die Deterioration Doubling', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Flat Field Doubling</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Flat Field Doubling', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Flat Field Doubling', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Die Deterioration Doubling</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Die Deterioration Doubling', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Die Deterioration Doubling', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Ejection Doubling</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Ejection Doubling', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Ejection Doubling', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Punch Shoulder Outlines</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Punch Shoulder Outlines', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Punch Shoulder Outlines',  $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Plating Split Doubling</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Plating Split Doubling',  $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Plating Split Doubling',  $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Repunched Mint Mark</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Repunched Mint Mark', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Repunched Mint Mark', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong><a href="categoryErrorsType.php?coinCategory=<?php echo $_GET["coinCategory"]; ?>&amp;errorType=xxxxxx">Touch up Engraving Doubling</a></strong></td>
    <td align="center"><?php echo $collection->getCategoryError('Touch up Engraving Doubling', $coinCategory, $userID); ?></td>
    <td align="center"><?php echo $collection->getCategoryProError('Touch up Engraving Doubling', $coinCategory, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />

<table width="100%" border="0" id="clientTbl">
  <thead class="darker">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="34%">Year / Mint</td>
    <td width="28%" align="center">Type</td>
    <td width="12%" align="center">Grade</td>  
    <td width="13%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase </td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE errorCoin = '1' AND coinCategory = '$coinCategory' AND userID = '$userID' AND coinYear < ".date("Y")." ORDER BY coinYear DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td>&nbsp;</td>  
		  <td width="57%">No Errors Collected</strong></a></td>
		  <td>&nbsp;</td>  
		  <td>&nbsp;</td>  
		  <td>&nbsp;</td>  
		  <td>&nbsp;</td>  
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img class="typeIcon" align="middle" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="middle" src="../img/graded.jpg" width="20" height="20" /> ';
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="middle" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="middle" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		}
		else { 
		   $coinIcon = '<img align="middle" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		}
  
  echo '
    <tr class="gryHover" align="center"> 
	<td width="3%" valign="middle">'.$coinIcon.'</td>
    <td align="left"><a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 40).'</a></td>
	<td><a href="viewListReport.php?coinType='.str_replace(' ', '_', $coin->getCoinType()).'">'.$coin->getCoinType().'</td>
	<td>'. $collection->getCoinGrade() .'</td>
		<td>'.date("M j Y ",strtotime($collection->getCoinDate())) .'</td>
	<td>'. $collection->getCoinPrice() .'</td>	   	  
  </tr>
  ';
	  }
}
?>
</tbody>
<tfoot class="darker">
  <tr>
    <td>&nbsp;</td>
    <td>Year / Mint</td>
    <td align="center">Type</td>
    <td align="center">Grade</td>  
    <td width="13%" align="center"> Collected</td>
    <td width="9%" align="center">Purchase </td>
  </tr>
	</tfoot>
</table>











<p><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>