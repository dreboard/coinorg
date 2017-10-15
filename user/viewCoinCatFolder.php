<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$pages = new Paginator;
  function checkCoin($coinID, $userID){
	  $coin = new Coin();
	  $Encryption = new Encryption();
	  $coin->getCoinById($coinID);	  
	$pageQuery = mysql_query("SELECT * FROM collection WHERE userID = '$userID' AND  coinID = '$coinID'");
	$coinCount = mysql_num_rows($pageQuery);
	if($coinCount == 0){
		$image = '<a href="viewCoin.php?coinID='.$coinID.'"  title="'.$coin->getCoinName().'">  <img class="coinSwitch" src="../img/blank.jpg" alt="" width="100" height="100" /></a>';
	} else {
		while ($show = mysql_fetch_array($pageQuery))
		{
			$collection = new Collection();
			$coinVersion = str_replace(' ', '_', $show['coinVersion']);
			$coinID = intval($show['coinID']);
			$collectionID = intval($show['collectionID']);
			$collection->getCollectionById($collectionID); 
		}
		$image = '<a href="viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'"  title="'.$coin->getCoinName().'"><img class="coinSwitch" src="../img/'.$coinVersion.'.jpg" alt="" width="100" height="100" /></a>';
	}
	 return $image;
 }
 
 if (isset($_GET["coinCategory"])) { 
$coinCategory = str_replace('_', ' ', $_GET["coinCategory"]);
$coinCategoryLink = str_replace(' ', '_', $coinCategory);

$pageQuery = mysql_query("SELECT * FROM pages WHERE pageName = '$coinCategory'");
while($row = mysql_fetch_array($pageQuery))
  {
	  $pageCategory = $row['pageCategory'];
	  $typeCount = intval($row['typeCount']);
	  $completeSet = intval($row['completeSet']);
	  if($pageCategory == "Half Dime"){
	  $pageCategory = str_replace(' ', '_', $pageCategory);
	  }
	  if($pageCategory == "Half Dollar"){
	  $pageCategory = "Half";
	  }
	  $dates = $row['dates'];
   }
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="icon" type="image/png" href="../img/icon.png" />
<title><?php echo $coinCategory ?> Folder View</title>
<script type="text/javascript" src="../scripts/main.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	

});
</script>

<style type="text/css"> 
.paginate {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
}
a.paginate {
border: 1px solid #000080;
padding: 2px 6px 2px 6px;
text-decoration: none;
color: #000080;
}
a.paginate:hover {
background-color: #000080;
color: #FFF;
text-decoration: underline;
}
a.current {
border: 1px solid #000080;
font: bold .7em Arial,Helvetica,sans-serif;
padding: 2px 6px 2px 6px;
cursor: default;
background:#000080;
color: #FFF;
text-decoration: none;
}
span.inactive {
border: 1px solid #999;
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
padding: 2px 6px 2px 6px;
color: #999;
cursor: default;
}
</style> 


</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><img src="../img/<?php echo $coinCategoryLink ?>.jpg" width="50" height="50" align="absmiddle" /> My <a class="brownLink" href="<?php echo $_GET["coinCategory"] ?>.php"><?php echo $coinCategory ?></a> Coin Album</h2>
<table width="800">
  <tr class="darker">
    <td width="136"><a href="viewFolderCollection.php" class="brownLink">All Folders</a></td>
    <td align="left"><a href="<?php echo $coinCategoryLink ?>.php" class="brownLink">View <?php echo $coinCategory ?> Report</a>&nbsp;&nbsp;</td>
    <td width="236"><select name="select" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option selected="selected" value="">Switch Folder</option>
      <option value="viewFolderCollection.php">All Folders</option>
      <optgroup label="Half Cents">
        <option value="viewCoinCatFolder.php?coinCategory=Half_Cent&amp;page=1">Half Cents</option>
        <option value="viewCoinFolder.php?coinType=Liberty_Cap_Half_Cent">Liberty Cap</option>
        <option value="viewCoinFolder.php?coinType=Draped_Bust_Half_Cent">Draped Bust</option>
        <option value="viewCoinFolder.php?coinType=Classic_Head_Half_Cent">Classic Head</option>
        <option value="viewCoinFolder.php?coinType=Braided_Hair_Half_Cent">Braided Hair</option>
        </optgroup>
      <optgroup label="Large Cents">
        <option value="viewCoinCatFolder.php?coinCategory=Large_Cent&amp;page=1">Large Cents</option>
        <option value="viewCoinFolder.php?coinType=Flowing_Hair_Large_Cent">Flowing Hair</option>
        <option value="viewCoinFolder.php?coinType=Liberty_Cap_Large_Cent">Liberty Cap</option>
        <option value="viewCoinFolder.php?coinType=Draped_Bust_Large_Cent">Draped Bust</option>
        <option value="viewCoinFolder.php?coinType=Classic_Head_Large_Cent">Classic Head</option>
        <option value="viewCoinFolder.php?coinType=Coronet_Liberty_Head_Large_Cent">Coronet Liberty Head</option>
        <option value="viewCoinFolder.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Braided Hair Liberty Head</option>
        </optgroup>
      <optgroup label="Cents">
        <option value="viewCoinCatFolder.php?coinCategory=Small_Cent&amp;page=1">Small Cents</option>
        <option value="viewCoinFolder.php?coinType=Flying_Eagle">Flying Eagle Cent</option>
        <option value="viewCoinFolder.php?coinType=Indian_Head">Indian Head Cent</option>
        <option value="viewCoinFolder.php?coinType=Lincoln_Wheat">Lincoln Wheat Cent</option>
        <option value="viewCoinFolder.php?coinType=Lincoln_Memorial">Lincoln Memorial Cent</option>
        <option value="viewCoinFolder.php?coinType=Lincoln_Bicentennial">Lincoln Bicentennial</option>
        <option value="viewCoinFolder.php?coinType=Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Two Cents">
        <option value="viewCoinCatFolder.php?coinCategory=Two_Cent&amp;page=1">Two Cents</option>
        <option value="viewCoinFolder.php?coinType=Two_Cent">Two Cent Piece</option>
        </optgroup>
      <optgroup label="Three Cents">
        <option value="viewCoinCatFolder.php?coinCategory=Three_Cent&amp;page=1">Three Cents</option>
        <option value="viewCoinFolder.php?coinType=Nickel_Three_Cent">Nickel Three Cent Piece</option>
        <option value="viewCoinFolder.php?coinType=Silver_Three_Cent">Silver Three Cent Piece</option>
        </optgroup>
      <optgroup label="Half Dimes">
        <option value="viewCoinCatFolder.php?coinCategory=Half_Dime&amp;page=1">Half Dimes</option>
        <option value="viewCoinFolder.php?coinType=Flowing_Hair_Half_Dime">Flowing Hair</option>
        <option value="viewCoinFolder.php?coinType=Draped_Bust_Half_Dime">Draped Bust</option>
        <option value="viewCoinFolder.php?coinType=Liberty_Cap_Half_Dime">Liberty Cap Half Dime</option>
        <option value="viewCoinFolder.php?coinType=Seated_Liberty_Half_Dime">Seated Liberty Half Dime</option>
        </optgroup>
      </optgroup>
      <optgroup label="Nickels">
        <option value="viewCoinCatFolder.php?coinCategory=Nickel&amp;page=1">All Nickels</option>
        <option value="viewCoinFolder.php?coinType=Shield_Nickel">Sheild</option>
        <option value="viewCoinFolder.php?coinType=Liberty_Head_Nickel">Liberty Head</option>
        <option value="viewCoinFolder.php?coinType=Indian_Head_Nickel">Indian Head</option>
        <option value="viewCoinFolder.php?coinType=Jefferson_Nickel">Jefferson</option>
        <option value="viewCoinFolder.php?coinType=Westward_Journey">Westward Journey</option>
        <option value="viewCoinFolder.php?coinType=Return_to_Monticello">Return to Monticello</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="viewCoinCatFolder.php?coinCategory=Dime&amp;page=1">Dimes</option>
        <option value="viewCoinFolder.php?coinType=Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="viewCoinFolder.php?coinType=Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="viewCoinFolder.php?coinType=Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="viewCoinFolder.php?coinType=Barber_Dime">Barber Dime</option>
        <option value="viewCoinFolder.php?coinType=Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="viewCoinFolder.php?coinType=Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Twenty Cents">
        <option value="Twenty Cents">Twenty Cents</option>
        <option value="viewCoinCatFolder.php?coinCategory=Twenty_Cent&amp;page=1">Twenty Cents</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="viewCoinCatFolder.php?coinCategory=Quarter&amp;page=1">All Quarters</option>
        <option value="viewCoinFolder.php?v=Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="viewCoinFolder.php?coinType=Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="viewCoinFolder.php?coinType=Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="viewCoinFolder.php?coinType=Barber_Quarter">Barber Quarter</option>
        <option value="viewCoinFolder.php?coinType=Standing_Liberty">Standing Liberty</option>
        <option value="viewCoinFolder.php?coinType=Washington_Quarter">Washington Quarter</option>
        <option value="viewCoinFolder.php?coinType=State Quarter">State Quarter</option>
        <option value="viewCoinFolder.php?coinType=District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="viewCoinFolder.php?coinType=America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="viewCoinCatFolder.php?coinCategory=Half_Dollar&amp;page=1">All Half Dollars</option>
        <option value="viewCoinFolder.php?coinType=Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="viewCoinFolder.php?v=Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="viewCoinFolder.php?coinType=Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="viewCoinFolder.php?v=Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="viewCoinFolder.php?coinType=Barber_Half_Dollar">Barber Half</option>
        <option value="viewCoinFolder.php?coinType=Walking_Liberty">Walking Liberty Half</option>
        <option value="viewCoinFolder.php?coinType=Franklin_Half_Dollar">Franklin Half</option>
        <option value="viewCoinFolder.php?coinType=Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="viewCoinCatFolder.php?coinCategory=Dollar&amp;page=1">All Dollars</option>
        <option value="viewCoinFolder.php?coinType=Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="viewCoinFolder.php?coinType=Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="viewCoinFolder.php?coinType=Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="viewCoinFolder.php?coinType=Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="viewCoinFolder.php?coinType=Trade_Dollar">Trade Dollar</option>
        <option value="viewCoinFolder.php?coinType=Morgan_Dollar">Morgan Dollar</option>
        <option value="viewCoinFolder.php?coinType=Peace_Dollar">Peace Dollar</option>
        <option value="viewCoinFolder.php?coinType=Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="viewCoinFolder.php?coinType=Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="viewCoinFolder.php?coinType=Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="viewCoinFolder.php?coinType=Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
    <td width="19">&nbsp;</td>
  </tr>
</table>  

<div class="spacer"></div>
<?php //include("../inc/folders/$coinCategoryLink.php"); ?>
<p>

<?php $countAll = mysql_query("SELECT * FROM coins WHERE coinCategory = '$coinCategory' AND coinYear <= ".date('Y')." ") or die(mysql_error());
$num_rows = mysql_num_rows($countAll);
$pages->items_total = $num_rows;
$pages->mid_range = 7;
$pages->paginate();
echo $pages->display_pages();?>

</p>

<table width="100%" border="0" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM coins WHERE coinCategory = '$coinCategory'  AND coinYear <= ".date('Y')." ORDER BY coinName ASC ".$pages->limit." ") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$coin->getCoinById($coinID);
	checkCoin($coinID, $userID);	
echo '<td width="14%" height="135">'.checkCoin($coinID, $userID).'<br />
	'.$coin->getCoinName().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 8) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table>
<p><?php
echo $pages->display_pages(); // Optional call which will display the page numbers after the results.
echo $pages->display_jump_menu(); // Optional – displays the page jump menu
echo $pages->display_items_per_page(); //Optional – displays the items per page menu
?></p>
</div>
<p>&nbsp;</p>

</body>
</html>