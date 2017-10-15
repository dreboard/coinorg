<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
$variety = strip_tags($_GET['variety']);
$coin->getCoinById($coinID);
$coinName = $coin->getCoinName(); 
$coinType = $coin->getCoinType(); 

$coinCategory = $coin->getCoinCategory(); 
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$categoryLink = str_replace(' ', '_', $coinCategory); 
$coinLink = str_replace(' ', '_', $coinType);
$count = $collection->getCoinCountById($coinID, $userID);
$collection->getCoinSumById($coinID, $userID);

$CoinTypes->getCoinByType($coinType);
$denomination = number_format($CoinTypes->getDenomination() * $count,2);


switch($variety){
	case 'ddo':
	$headerType = 'Double Die Obverse';
	break;
	case 'ddr':
	$headerType = 'Double Die Reverse';
	break;	
	case 'rpm':
	$headerType = 'Repunched Mintmark';
	break;	
	case 'rpd':
	$headerType = 'Repunched Date';
	break;		
	case 'omm':
	$headerType = 'Over Mintmark';
	break;
	case 'mms':
	$headerType = 'Mintmark Style';
	break;
	case 'odv':
	$headerType = 'Obverse Design Variety';
	break;
	case 'rdv':
	$headerType = 'Reverse Design Variety';
	break;
	case 'red':
	$headerType = 'Re Engraved Design';
	break;
	case 'imm':
	$headerType = 'Inverted Mintmark';
	break;
	case 'dmr':
	$headerType = 'Die Marriage Registry';
	break;	
	case 'mdr':
	$headerType = 'Master Die Reverse';
	break;	
	case 'mdo':
	$headerType = 'Master Die Obverse';
	break;									
}


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../scripts/lightbox.css"/>
<script type="text/javascript" src="../scripts/lightbox.js"></script>
<script type="text/javascript" src="../scripts/images.js"></script>
<title><?php echo $coinName ?> Reference/Variety Section</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
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

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><img src="../img/<?php echo str_replace(' ', '_', $coin->getCoinVersion()); ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a> </h1>
<h3><a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1" class="brownLink"><?php echo $coinType ?></a>  |  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink"><?php echo substr($coin->getCoinName(), 0, 4); ?> Date Set</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear(); ?>" class="brownLink"><?php echo $coin->getCoinYear(); ?> Mint Marks</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&amp;year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink">All Mint Marks</a> | <a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo $coinCategory ?></a></h3>

<table width="100%" border="0">
  <tr>
    <td width="16%"><strong>Total Collected</strong></td>
    <td width="13%" align="right"><?php echo $collection->getCoinVarietyTypeCount($userID, $coinID, $variety); ?></td>
    <td width="71%">&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Total Investment</strong></td>
    <td align="right">$<?php echo $collection->getCoinVarietyTypeSum($userID, $coinID, $variety) ?></td>
    <td>&nbsp;</td>
    </tr>
</table>
<hr />

<h2><?php echo $collection->getVarietyName($variety); ?></h2>
<table width="83%" border="0">
  <tr>
    <td colspan="2"><form action="viewCoinVarietyType.php" method="get" class="compactForm" id="yearSwitchForm">
  <select class="yearSwitch" name="variety" id="yearSwitch">
  <option value="" selected="selected">Switch Type</option>
  <option value="ddo">Double Die Obverse</option>
  <option value="ddr">Double Die Reverse</option>
  <option value="rpm">Repunched Mintmark</option>
<option value="rpd">Repunched Date</option>  
  <option value="omm">Over Mintmark</option>
  <option value="mms">Mintmark Style</option>
  <option value="odv">Obverse Design Variety</option>
  <option value="rdv">Reverse Design Variety</option>
  <option value="red">Re Engraved Design</option>
  <option value="imm">Inverted Mintmark</option>
  <option value="dmr">Die Marriage Registry</option>
  <option value="mdo">Master Die Obverse</option>
  <option value="mdr">Master Die Reverse</option>  
  </select>
  <input name="coinID" type="hidden" value="<?php echo $coinID ?>" />
  <input type="submit" value="Load Type" class="yearSwitch" id="yearSwitchBtn" />
</form></td>
    </tr>
  </table>
<table width="100%" border="0" id="clientTbl">
<thead class="darker">
  <tr>
    <td width="57%">Variety</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
</thead>
  <tbody>

<?php
$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND {$variety} != 'None' AND userID = '$userID' ORDER BY purchaseDate DESC") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
		  <tr>
		  <td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$collection->getVarietyName($variety).' Collected</strong></a></td>
		  <td width="11%" align="center">&nbsp;</td>  
		  <td width="14%" align="center">&nbsp;</td>
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
    <td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$collection->getVarietyForCoin(intval($row['collectionID'])).'</a></td>
	<td>'. $collection->getCoinGrade() .$grader.'</td>
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
    <td width="57%">Variety</td>
    <td width="11%" align="center">Grade</td>  
    <td width="14%" align="center">Collected</td>
    <td width="18%" align="center">Purchase</td>
  </tr>
	</tfoot>
</table>




<br />


<h3>&nbsp;</h3>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>