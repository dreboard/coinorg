<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_GET["coinType"])) { 
$coinType = str_replace('_', ' ', $_GET["coinType"]);
$coinTypeLink = $_GET["coinType"];
$coinCatLink = str_replace(' ', '_', $_GET["coinType"]);
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
});
</script>
<style type="text/css">
#yearSwitch, #yearSwitchBtn {font-size:18px;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h2><img src="../img/<?php echo $_GET["coinType"]; ?>.jpg" alt="Obverse and reverse" width="50" height="50" align="absmiddle" title="<?php echo $coinType ?>" /> <?php echo str_replace('_', ' ', $_GET["coinType"]) ?>  VAM Report</h2>

<hr />

  <?php include("../inc/pageElements/viewTypeLinks.php"); ?>
  
  <hr />
<h3>By Year VAM Report</h3>
<table width="98%" border="0" cellpadding="3" class="autoCoinTbl">
<tr>
<?php 
$i = 1;
$imgURL = $CoinTypes->getMintedYearList(htmlentities($CoinTypes->getDates()));
$delimiter=",";
$itemList = array();
$itemList = explode($delimiter, $imgURL);
foreach($itemList as $item){
echo '<td><strong><a class="brownLink" href="vamYearReport.php?coinYear='.$item.'&coinType='.$_GET['coinType'].'">'.$item.'</a></strong> '.$collection->getNumOfByMintCoinSavedThisYear($item, $coinType, $userID).' of '.$coin->getYearDistinctMintMarkCount($coinType, $item) .'</td>'; 
$i = $i + 1; //add 1 to $i
if ($i == 10) { //when you have echoed 3 <td>'s
echo '</tr><tr>'; //echo a new row
$i = 1; //reset $i
} //close the if
}
echo '</tr>'; //close out the table' //close out the table
?>
</table>


<hr />
  <div>
  <h2>Morgan Dollar's With Assigned VAM</h2>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * 
FROM collection
WHERE coinType =  '".str_replace('_', ' ', $coinType)."'
AND vam !=  'None'
ORDER BY coinYear ASC ") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><a href="addCoinType.php?coinType='.$_GET["coinType"].'"><strong>No '.$coinType.' VAM coins</strong></a></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="18%" align="center">&nbsp;</td>
		  </tr>  ';
} else {

  while($row = mysql_fetch_array($countAll))
	  {
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		  $collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));
		   
		if(intval($row['collectfolderID']) == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />&nbsp;';
			$grader = '';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
			$grader = '/'.$collection->getGrader();
		}
		else if(intval($row['collectfolderID']) != '0') {
			
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
			$grader = '';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		   $grader = '';
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		   $grader = '';
		}
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		   $grader = '';
		}
  
  echo '
    <tr align="center">
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.substr($coin->getCoinName(), 0, 50).' '. $collection->getCoinGrade() .$grader.' '.$collection->getVam().'</a></td>
		<td>'.date("M j, Y",strtotime($collection->getCoinDate())) .'</td>
	<td>$'. $collection->getCoinPrice() .'</td>	   
  </tr>
  ';
	  }
}

?>
</tbody>
<tfoot class="darker">
  <tr>
    <td width="69%">Year / Mint</td>
    <td width="17%" align="center">Collected</td>
    <td width="14%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>
</div>
<br class="clear" />
<p class="roundedWhite">


<a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&icep_uq=&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=<?php echo $CoinTypes->getEbay(); ?>&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg"><img src="../img/<?php echo $coinCatLink ?>.jpg" width="100" height="100" align="left" /><img src="../img/ebay-type.jpg" width="454" height="100" border="0" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575051408&toolid=10001&campid=5337366073&customid=&mpt=[CACHEBUSTER]"></p>
  
  <p>&nbsp;</p>

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>