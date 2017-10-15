<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinYear"])) { 
$coinYear = intval($_GET["coinYear"]);
$coinType = str_replace('_', ' ', strip_tags($_GET["coinType"]));
$coinTypeLink = strip_tags($_GET["coinType"]);
$coinCatLink = str_replace(' ', '_', strip_tags($_GET["coinType"]));
$CoinTypes->getCoinByType($coinType);
$coinMetal = $coin->getMetalByType($coinType);
$getDates = htmlentities($CoinTypes->getDates());
$mintedYearNumber = $collection->dateSetNums($coinType, $userID);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo intval($_GET["coinYear"]); ?> <?php echo str_replace('_', ' ', strip_tags($_GET["coinType"])); ?>  Snow Report</title>
<script type="text/javascript">
$(document).ready(function(){
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "asc" ]],
	"iDisplayLength": 50
} );


$("#snowYear").click(function() {

});

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

$("#snowSwitchForm").submit(function() {
      if ($("#snowYear").val() == "") {
		$("#snowYear").addClass("errorInput");
        return false;
      }else {
	 $('#snowSwitchBtn').val("Loading...");		  
	  return true;
	  }
});


});
</script>
<style type="text/css">
#yearSwitch, #yearSwitchBtn {font-size:18px;}
.vamRow span {font-size:90%;}
#snowTbl a {font-weight:normal;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>


<hr />

  <?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  <h3>By Year Snow</h3>
  <hr />
  <a target="_blank" href="http://www.amazon.com/gp/product/0794828310/ref=as_li_ss_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=0794828310&linkCode=as2&tag=mycoinorganizer-20"> <img src="../img/ads/guide-to-indian-head-cents-AMAZON-banner.jpg" width="850" height="120" /></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=mycoinorganizer-20&l=as2&o=1&a=0794828310" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
<hr />
<p><a href="viewCoinYear.php?year=<?php echo str_replace('_', ' ', $_GET["coinYear"]); ?>&coinType=<?php echo $_GET["coinType"]; ?>" class="brownLinkBold">View Full <?php echo str_replace('_', ' ', $_GET["coinYear"]); ?> <?php echo str_replace('_', ' ', $_GET["coinType"]); ?> Report</p>

<table width="98%" border="0" cellpadding="3" id="snowTbl">
<tr>
<?php 
$i = 1;
$imgURL = $CoinTypes->getMintedYearList($getDates);
$delimiter=",";
$itemList = array();
$itemList = explode($delimiter, $imgURL);
foreach($itemList as $item){
echo '<td width="10%"><strong><a class="brownLink" href="snowYearReport.php?coinType='.str_replace(' ', '_', $coinType).'&coinYear='.$item.'">'.$item.'</a></td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 11) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>
<hr />

<table width="100%" border="0">
    <tr>
      <td width="83%"><h2><img src="../img/<?php echo $_GET["coinType"]; ?>.jpg" alt="Obverse and reverse" width="50" height="50" align="absmiddle" title="<?php echo $coinType; ?>" /> <?php echo str_replace('_', ' ', $_GET["coinYear"]); ?> <?php echo str_replace('_', ' ', $_GET["coinType"]); ?>  Snow Report (Album View)</h2></td>
      <td width="17%" align="right" valign="middle">
        <form action="snowYearListReport.php" method="get" class="compactForm">
          <input name="coinType" type="hidden" value="<?php echo str_replace(' ', '_', $_GET["coinType"]); ?>" />
          <input name="coinYear" type="hidden" value="<?php echo intval($_GET["coinYear"]); ?>" />
          <input type="submit" value="List View" id="viewSwitchBtn" />
        </form>
      </td>
    </tr>
  </table>
<?php 
include'../inc/varieties/snow/'.$_GET["coinYear"].'.php';
?>

  
<br class="clear" />
<p class="roundedWhite">


<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&icep_uq=&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=<?php echo $CoinTypes->getEbay(); ?>&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="../img/<?php echo $coinCatLink; ?>.jpg" width="100" height="100" align="left" /><img src="../img/ebay-type.jpg" width="454" height="100" border="0" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&mpt=[CACHEBUSTER]"></p>
  
  <p>&nbsp;</p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>