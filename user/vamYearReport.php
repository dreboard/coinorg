<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinYear"])) { 
$coinYear = intval($_GET["coinYear"]);
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = strip_tags($_GET["coinType"]);
$coinCatLink = str_replace(' ', '_', strip_tags($_GET["coinType"]));
$CoinTypes->getCoinByType($coinType);
$coinMetal = $coin->getMetalByType($coinType);

switch ($coinMetal)
{
case 'Gold':
  $byMintCount = $Bullion->getGoldTypeMintCount($coinType);
  break;
case 'Platinum':
  $byMintCount = $Bullion->getPlatinumTypeMintCount($coinType);
  break;  
default:
  $byMintCount = $coin->getCoinByTypeByMint($coinType);
}
switch (str_replace('_', ' ', $_GET["coinType"]))
{
  case 'Commemorative_Quarter':
  case 'Commemorative_Half_Dollar':
  case 'Commemorative_Dollar':
  case 'Commemorative_Quarter_Eagle':
  case 'Commemorative_Five_Dollar':
  case 'Commemorative_Ten_Dollar':
  case 'Commemorative_Fifty_Dollar':
  $totalByTypeCount = $coin->getCoinCountType($coinType);
  $uniqueCount = $collection->getCollectionUniqueCountByType($userID, $coinType);
  $typePercent = $General->percent($uniqueCount, $totalByTypeCount);
  $typeAllPercent = $General->percent($uniqueCount, $totalByTypeCount); 
  break;
default:
  $totalByTypeCount = $coin->getCoinCountType($coinType);
  $uniqueCount = $collection->getCollectionUniqueCountByType($userID, $coinType);
  $typePercent = $General->percent($uniqueCount, $byMintCount);
  $typeAllPercent = $General->percent($uniqueCount, $totalByTypeCount); 
}


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
<title><?php echo str_replace('_', ' ', $_GET["coinType"]) ?> List View</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );

$("#yearSwitchForm").submit(function() {
      if ($("#yearSwitch").val() == "") {
		$("#yearSwitch").addClass("errorInput");
		$("#switchLbl").addClass("errorTxt");
        return false;
      }else {
	 $("#switchLbl").removeClass("errorTxt");
	 $('#yearSwitchBtn').val("Loading...");		  
	  return true;
	  }
});
$("#vamSwitchForm").submit(function() {
      if ($("#vamSwitch").val() == "") {
		$("#vamSwitch").addClass("errorInput");
        return false;
      }else {
	 $('#vamSwitchBtn').val("Loading...");		  
	  return true;
	  }
});
});
</script>
<style type="text/css">
#yearSwitch, #yearSwitchBtn {font-size:18px;}
.vamRow span {font-size:90%;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><img src="../img/<?php echo strip_tags($_GET["coinType"]); ?>.jpg" alt="Obverse and reverse" width="50" height="50" align="absmiddle" title="<?php echo $coinType ?>" /> <?php echo str_replace('_', ' ', strip_tags($_GET["coinType"])); ?>  VAM Report</h2>

<hr />

  <?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  
  <hr />
 <a target="_blank" href="http://www.amazon.com/gp/product/0966016823/ref=as_li_ss_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=0966016823&linkCode=as2&tag=mycoinorganizer-20"><img src="../img/ads/Comprehensive-Catalog-and-Encyclopedia-of-Morgan-and-Peace-Silver-Dollars.jpg" width="850" height="120" alt="" /></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=mycoinorganizer-20&l=as2&o=1&a=0966016823" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" /> 
  
  <hr />
  <table width="100%" border="0">
    <tr>
      <td width="32%"><h3><?php echo $coinYear; ?> VAM List (Album View) </h3></td>
      <td width="35%"><select id="select6" name="select7" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
        <option selected="selected" value="">Switch View</option>
        <option value="vamYearReportList.php?coinYear=<?php echo $coinYear; ?>&amp;coinType=<?php echo strip_tags($_GET["coinType"]); ?>">Album View</option>
      </select></td>
      <td width="33%" align="right">
<form action="vamYearReport.php" method="get" class="compactForm" id="vamSwitchForm">
<select class="yearSwitch" name="coinYear" id="vamSwitch">
<option value="" selected="selected">Switch Year</option>
<?php 
$sql = mysql_query("SELECT DISTINCT coinYear FROM coins WHERE coinType = '".str_replace('_', ' ', strip_tags($_GET["coinType"]))."' AND coinYear <= '".date('Y')."' ORDER BY coinYear ASC");
while( $field = mysql_fetch_assoc($sql)) {
		echo '<option value="'.$field['coinYear'].'">'.$field['coinYear'].'</option>';
	}	
?>
</select>
<input name="coinType" type="hidden" value="<?php echo str_replace(' ', '_', $_GET["coinType"]) ?>" />
<input type="submit" value="Load Year" class="yearSwitch" id="vamSwitchBtn" />
</form>      
      </td>
    </tr>
  </table>
 
 
 <table width="100%" border="0">
  <tr align="center" class="darker">
    <td width="25%">Graded</td>
    <td width="25%">Raw</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
<tr align="center">
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
</table>

 
  
<?php 
include'../inc/varieties/vam/'.$_GET["coinYear"].'.php';
?>

  
<br class="clear" />
<p class="roundedWhite">


<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&icep_uq=&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=<?php echo $CoinTypes->getEbay(); ?>&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="../img/<?php echo $coinCatLink ?>.jpg" width="100" height="100" align="left" /><img src="../img/ebay-type.jpg" width="454" height="100" border="0" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&mpt=[CACHEBUSTER]"></p>
  
  <p>&nbsp;</p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>