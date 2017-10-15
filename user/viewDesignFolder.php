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
 
 
 if (isset($_GET["design"])) { 
$design = str_replace('_', ' ', $_GET["design"]);
$designLink = str_replace(' ', '_', $design);

 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="icon" type="image/png" href="../img/icon.png" />
<title><?php echo $design ?> Folder View</title>
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
.smallTxt {font-size:70%;}
</style> 


</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><?php echo $design ?> Folder View</h2>


<table width="100%" class="clear" id="designLinksTbl">
  <tr id="reportListLinks">
  <td width="14%" class="darker"><a href="reportDesign.php?design=<?php echo $designLink ?>">Report</a></td>
     <td width="14%" class="darker"><a href="reportDesignCoins.php?design=<?php echo $designLink ?>">Coins</a></td>
    <td width="13%" class="darker"><a href="reportDesignYear.php?design=<?php echo $designLink ?>&setYear=<?php echo $CoinDesign->getDesignStartYear($design) ?>">Year Sets</a></td> 
    <td width="20%" class="darker"> <a href="reportDesignGrade.php?design=<?php echo $designLink ?>">Grade Report</a></td>
    <td width="14%" class="darker">
      <select name="designSel" id="designSel" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        >
        <option value="" selected="selected">Switch Design</option>
        <option value="reportDesignCoins.php?design=Barber">Barber Coins</option>
        <option value="reportDesignCoins.php?design=Seated_Liberty">Seated Liberty Coins</option>
        <option value="reportDesignCoins.php?design=Flowing_Hair">Flowing Hair Coins</option>
        <option value="reportDesignCoins.php?design=Draped_Bust">Draped Bust Coins</option>
        <option value="reportDesignCoins.php?design=Liberty_Cap">Liberty Cap Coins</option>
      </select>
    </td>
 
  </tr>
  <tr align="center">
    <td class="darker"><h3><a href="viewDesignFolder.php?design=<?php echo $designLink ?>&page=1"><img src="../img/folderIcon.jpg" width="14" height="20" align="texttop" /> Folder View</a></h3></td>
    <td class="darker"><h3><a href="viewDesignErrors.php?design=<?php echo $designLink ?>"><img src="../img/errorIcon.jpg" width="20" height="20" align="absmiddle" /> Errors</a></h3></td>
    <td class="darker"><h3><a href="viewDesignList.php?design=<?php echo $designLink ?>"><img src="../img/checkList.jpg" width="21" height="20" align="texttop" /> Check List</a></h3></td>
    <td class="darker"><h3><a href="viewDesignCertList.php?design=<?php echo $designLink ?>"><img src="../img/gradeImg.jpg" width="20" height="24" align="absmiddle" /> Certified Only</a></h3></td>
    <td class="darker">&nbsp;</td>
  </tr>
</table>
<p>
  
  <?php $countAll = mysql_query("SELECT * FROM coins WHERE design = '$design' ") or die(mysql_error());
$num_rows = mysql_num_rows($countAll);
$pages->items_total = $num_rows;
$pages->mid_range = 7;
$pages->paginate();
echo $pages->display_pages();?>
  
</p>
<div class="roundedWhite" id="albumDiv">
<br />
<table width="100%" border="0" id="folderTbl">
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM coins WHERE design = '$design' ORDER BY coinName ASC ".$pages->limit." ") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$coinID = intval($row['coinID']);
	$coin->getCoinById($coinID);
	$coinCategory = $coin->getCoinCategory();
	checkCoin($coinID, $userID);	
echo '<td width="14%" height="135">'.checkCoin($coinID, $userID).'<br /><span class="smallTxt">
	'.$coin->getCoinName().'<br />
'.$coin->getCoinCategory().'</span>
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 8) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop
echo '' //close out the table
?>
</tr></table><br />
</div>
<p><?php
echo $pages->display_pages(); // Optional call which will display the page numbers after the results.
echo $pages->display_jump_menu(); // Optional – displays the page jump menu
echo $pages->display_items_per_page(); //Optional – displays the items per page menu
?></p>
</div>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>