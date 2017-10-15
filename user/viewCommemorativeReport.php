<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinVersion"])) { 
$coinVersion = str_replace('_', ' ', strip_tags($_GET["coinVersion"]));
$coinVersionLink = strip_tags($_GET["coinVersion"]);
$coinType = $coin->getCoinTypeByVersion($coinVersion);
$coinCategory = $coin->getCoinCategoryByVersion($coinVersion);
$commemorativeType = $coin->getCommemorativeByVersion($coinVersion);

 }
 
 $totalByTypeCount = $coin->getCoinCountType($coinType);
 
 $byMintCount = $coin->getCoinByTypeByMint($coinType);
 $uniqueCount = $collection->getCollectionUniqueCountByType($userID, $coinType);
 
 $typePercent = percent($uniqueCount, $byMintCount);
 $typeAllPercent = percent($uniqueCount, $totalByTypeCount); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinVersion ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){
$('.coinTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 25
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
<h2><?php echo $coinVersion ?> </h2>
<table width="100%" border="0" class="reportListTbl">  
  <tr>
    <td width="25%" rowspan="8" valign="top"><img src="../img/<?php echo $coinVersionLink ?>.jpg" alt="Obverse and reverse" name="obvRev" width="200" height="200" title="<?php echo $coinType ?>" /></td>
    <td>Type</td>
    <td><a href="<?php echo str_replace(' ', '_', $coinCategory) ?>.php"><?php echo $coinCategory ?></a></td>
  </tr>
  <tr>
    <td width="36%">Total Collected</td>
    <td width="39%"><?php echo $collection->getCollectionCountByType($userID, $coinType) ?></td>
  </tr>
  <tr>
    <td>Total  Investment</td>
    <td>$<?php echo $collection->getCoinSumByType($coinType, $userID) ?></td>
    </tr>
  <tr>
    <td>Type Collection Progress</td>
    <td><?php echo $uniqueCount  ?> of <?php echo $byMintCount ?> (<?php echo $typePercent ?>%)</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>



  <table width="100%" border="0" id="listTbl" class="clear">
  <tr valign="top" class="darker">
    <td width="237"><h3><a href="viewCoinFolder.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/folderIcon.jpg" width="14" height="20" align="texttop" /> Folder View</a></h3></td>
    <td width="237"><h3><a href="viewList.php?coinType=<?php echo $coinCatLink ?>"><img src="../img/checkList.jpg" width="21" height="20" align="texttop" /> Check List</a></h3></td>
    <td width="214"><h3><a href="viewCertTypeReport.php?coinType=<?php echo $coinType ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Only Coins</a></h3></td>

    <td width="69" align="center"><select name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')" id="typeChanger">
      <option selected="selected" value="">Quick Menu</option>
      <optgroup label="Half Cents">
        <option value="Half_Cent.php">All Half Cents</option>
        <option value="viewListReport.php?coinType=Liberty_Head_Gold_Dollar">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Indian_Princess_Gold_Dollar">Draped Bust</option>
        <option value="viewListReport.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewListReport.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="Large_Cent.php">All Large Cents</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewListReport.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewListReport.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewListReport.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="Small_Cent.php">Small Cents</option>
        <option value="viewListReport.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewListReport.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewListReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewListReport.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="Two_Cent.php">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="Three_Cent.php">Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="Half_Dime.php">All Half Dimes</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      <optgroup label="Nickels">
        <option value="Nickel.php">All Nickels</option>
        <option value="viewListReport.php?coinType=Shield_Nickel">Shield Nickel</option>
        <option value="viewListReport.php?coinType=Indian_Head">Indian Head</option>
        <option value="viewListReport.php?coinType=Lincoln_Wheat">Lincoln Wheat</option>
        <option value="viewListReport.php?coinType=Lincoln_Memorial">Lincoln Memorial</option>
        <option value="viewListReport.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewListReport.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="Dime.php">All Dimes</option>
        <option value="viewListReport.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewListReport.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewListReport.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewListReport.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="Twenty_Cent.php">Twenty Cent Piece</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="Quarter.php">All Quarters</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewListReport.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewListReport.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewListReport.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewListReport.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewListReport.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewListReport.php?coinType=State Quarter">State Quarter</option>
        <option value="viewListReport.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewListReport.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="Half_Dollar.php">All Half Dollars</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewListReport.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewListReport.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewListReport.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewListReport.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewListReport.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="Dollar.php">All Dollars</option>
        <option value="viewListReport.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewListReport.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewListReport.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewListReport.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewListReport.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewListReport.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewListReport.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewListReport.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewListReport.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewListReport.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewListReport.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select>
      <br /><img src="../img/289.gif" vspace="2" id="loaderGif" /></td>
  </tr>
  </table>
  <div>

</div>

<hr />

  <div id="relatedTypeDiv">
<table width="100%" border="0" cellpadding="3" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM coins WHERE coinVersion = '$coinVersion' ORDER BY coinYear ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$coin->getCoinById($coinID);
echo '<td width="14%" height="135">
	<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/'.$collection->getImageByID($coinID, $userID).'" alt="" width="100" height="100" /></a><br />
	<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">'.$coin->getCoinName().'</a>
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
  
  
  
  
  
  
  <hr />
  
  <p><a href="addCommemorative.php" class="brownLinkBold">Add Commemorative</a></p>
  <table width="100%" border="0" class="coinTbl">
<thead class="darker">
  <tr>
    <td width="74%">Year / Mint</td>  
    <td width="13%" align="center">Collected</td>
    <td width="13%" align="right">Purchase</td>
  </tr>
</thead>
  <tbody>
<?php
$countAll = mysql_query("SELECT DISTINCT coinID FROM collection WHERE coinVersion = '$coinVersion' AND userID = '$userID' ORDER BY coinID ASC") or die(mysql_error());
if(mysql_num_rows($countAll)== 0){
	  echo '
    <tr>
    <td>No '.$coinVersion.' Coins In Your Collection <a href="addCoin.php">Add A Coin</a> or <a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=search&icep_uq='.str_replace('_', '+', strip_tags($_GET["coinVersion"])).'&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=253&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg">Find on<img src="http://mycoinorganizer.com/img/coinEbay.jpg" width="69" height="23" align="absmiddle" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=search&uq=key+word&mpt=[CACHEBUSTER]"></td>
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
     
<tfoot class="darker">
  <tr>
    <td width="74%">Year / Mint</td>  
    <td width="13%" align="center">Collected</td>
    <td width="13%" align="right">Purchase</td>
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