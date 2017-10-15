<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$coinCatLink = str_replace(' ', '_', $_GET["coinCategory"]);
}

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinCategory ?> Want List</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );


});
</script>
<style type="text/css">
#coinCategory {width:150px; height:auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><?php echo $coinCategory ?> Want Report</h2>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="17%" rowspan="8" valign="top"><img id="coinCategory" src="../img/<?php echo $coinCatLink ?>_both.jpg" alt="Obverse and reverse" title="<?php echo $coinType ?>" /></td>
    <td>Category</td>
    <td><a href="<?php echo $categoryLink ?>.php"><?php echo $coin->getCategoryByType($coinType) ?></a></td>
    <td align="right"><select id="typeChanger" name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Coin</option>
      <optgroup label="Half Cents">
        <option value="viewWantCategory.php?coinCategory=Half_Cent">Half Cents</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewWantType.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewWantType.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="viewWantCategory.php?coinCategory=Large_Cent">Large Cents</option>
        <option value="viewWantType.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewWantType.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewWantType.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewWantType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="viewWantCategory.php?coinCategory=Small_Cent">Small Cents</option>
        <option value="viewWantType.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewWantType.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewWantType.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewWantType.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewWantType.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewWantType.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="viewWantCategory.php?coinCategory=Two_Cent">Two Cents</option>
        <option value="viewWantType.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="viewWantCategory.php?coinCategory=Three_Cent">Three Cents</option>
        <option value="viewWantType.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewWantType.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="viewWantCategory.php?coinCategory=Half_Dime">Half Dimes</option>
        <option value="viewWantType.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewWantType.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="viewWantCategory.php?coinCategory=Nickel">Nickels</option>
        <option value="viewWantType.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewWantType.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewWantType.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewWantType.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewWantType.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewWantType.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="viewWantCategory.php?coinCategory=Dime">Dimes</option>
        <option value="viewWantType.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewWantType.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewWantType.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewWantType.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewWantType.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="viewWantCategory.php?coinCategory=Twenty_Cent">Twenty Cents</option>
        <option value="viewWantType.php?coinCategory=Twenty_Cent_Piece">Twenty Cent</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="viewWantCategory.php?coinCategory=Quarter">Quarters</option>
        <option value="viewWantType.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewWantType.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewWantType.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewWantType.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewWantType.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewWantType.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewWantType.php?coinType=State Quarter">State Quarter</option>
        <option value="viewWantType.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewWantType.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="viewWantCategory.php?coinCategory=Half_Dollar">Half Dollars</option>
        <option value="viewWantType.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewWantType.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewWantType.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewWantType.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewWantType.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewWantType.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewWantType.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewWantType.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="viewWantCategory.php?coinCategory=Dollar">Dollars</option>
        <option value="viewWantType.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewWantType.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewWantType.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewWantType.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewWantType.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewWantType.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewWantType.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewWantType.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewWantType.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewWantType.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewWantType.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>
  <tr>
    <td width="23%">Total Wanted</td>
    <td width="60%" colspan="2"><?php echo $collection->getCollectionCountByType($userID, $coinType) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
  </tr>
</table>



  
  <hr />

  <div>

</div>

  <table width="100%" border="0" class="coinTbl">
<thead>
  <tr class="darker">
    <td width="74%"><strong>Year / Mint</strong></td>  
    <td width="13%" align="center"><strong> Collected</strong></td>
    <td width="13%" align="right"><strong>Purchase Price</strong></td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT * FROM wantlist WHERE coinCategory = '$coinCategory' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>Add Coin</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	    
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $coinID = intval($row['coinID']);
  $coin-> getCoinById($coinID);  
  $coinName = $coin->getCoinName(); 
  
  
  $thePageCode = "Go to the view coin page to view this coin";
  echo '
    <tr>
    <td><a href="viewCoin.php?coinID='.$coinID.'">'.$coinName.'</a></td>
	<td align="center">'.$collection->getCoinCountById($coinID, $userID).'</td>
	<td align="right">$'.$collection->getCoinSumById($coinID, $userID).'</td>	    
  </tr>
  ';
	  }
}
?>
</tbody>

     
<tfoot>
  <tr class="darker">
    <td width="74%"><strong>Year / Mint</strong></td>  
    <td width="13%" align="center"><strong> Collected</strong></td>
    <td width="13%" align="right"><strong>Purchase Price</strong></td>
  </tr>
	</tfoot>
</table>
  <p>&nbsp;</p>
  <hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>