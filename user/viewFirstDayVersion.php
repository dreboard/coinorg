<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinVersion'])) { 
$coinVersion = str_replace('_', ' ', $_GET['coinVersion']);
$coinVersionLink = strip_tags($_GET['coinVersion']);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title><?php echo $coinVersion; ?> First Day Covers</title>

 <script type="text/javascript">
$(document).ready(function(){	

$('#rollListTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );
});
</script> 
<style type="text/css">
.tdHeight {padding:0px;}
hr {border-radius: 0 0 100% 100% / 0 0 150% 150%;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1><?php echo str_replace('_', ' ', $coinVersion); ?> First Day Covers</h1>
 <table width="100%" border="0" cellpadding="3">
  <tr>
    <td colspan="3">
    <select id="mintsetID" name="mintsetID" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
      <option value="" selected="selected">Switch Type</option>
      <option value="FirstDay.php">All Sets</option>
<option value="viewFirstDayType.php?coinType=State_Quarter">Statehood</option>
<option value="viewFirstDayType.php?coinType=District_of_Columbia_and_US_Territories">DC & US Territories</option>
<option value="viewFirstDayType.php?coinType=America_the_Beautiful_Quarter">America the Beautiful Quarter</option>
<option value="viewFirstDayType.php?coinType=Westward_Journey">Westward Journey</option>
<option value="viewFirstDayType.php?coinType=Return_To_Monticello">Return To Monticello</option>
<option value="viewFirstDayType.php?coinType=Sacagawea_Dollar">Sacagawea Dollar</option>
<option value="viewFirstDayType.php?coinType=Presidential_Dollar">Presidential</option>
    </select>
    </td>
    </tr>
  <tr>
    <td width="20%"><h3>Sets Collected</h3></td>
    <td width="18%" align="right"><?php echo $CollectionFirstday->firstDayVersionCollected($coinVersion, $userID); ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $CollectionFirstday->totalFirstDayVersionInvestment($coinVersion, $userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Certified</h3></td>
    <td align="right"><?php echo $CollectionFirstday->getCertificationFirstDayCountByVersion($userID, $coinVersion); ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr> 
 <table width="100%" border="0">
     <tr align="center">
       <td colspan="5" align="left"><h2><strong>Certified Sets</strong></h2></td>
    </tr>
     <tr align="center">
       <td width="12%">&nbsp;</td>
       <td width="21%"><a href="viewFirstDayTypeService.php?proService=PCGS&coinType=<?php echo $coinVersionLink; ?>"><strong>PCGS</strong></a></td>
       <td width="19%"><a href="viewFirstDayTypeService.php?proService=ICG&coinType=<?php echo $coinVersionLink; ?>"><strong>ICG</strong></a></td>
       <td width="25%"><a href="viewFirstDayTypeService.php?proService=NGC&coinType=<?php echo $coinVersionLink; ?>"><strong>NGC</strong></a></td>
       <td width="23%"><a href="viewFirstDayTypeService.php?proService=ANACS&coinType=<?php echo $coinVersionLink; ?>"><strong>ANACS</strong></a></td>
    </tr>
     <tr align="center">
       <td align="left">Envelope</td>
       <td><a href="viewFirstDayTypeService.php?proService=PCGS&coinVersion=<?php echo $coinVersionLink; ?>"><?php echo $CollectionFirstday->getFirstDayCoinTypeProGrader($coinVersion, $proService='PCGS', $firstdayType='Envelope', $userID); ?></a></td>
       <td><a href="viewFirstDayTypeService.php?proService=PCGS&coinVersion=<?php echo $coinVersionLink; ?>"><?php echo $CollectionFirstday->getFirstDayCoinTypeProGrader($coinVersion, $proService='IGC', $firstdayType='Envelope', $userID); ?></a></td>
       <td><a href="viewFirstDayTypeService.php?proService=PCGS&coinVersion=<?php echo $coinVersionLink; ?>"><?php echo $CollectionFirstday->getFirstDayCoinTypeProGrader($coinVersion, $proService='NGC', $firstdayType='Envelope', $userID); ?></a></td>
       <td><a href="viewFirstDayTypeService.php?proService=PCGS&coinVersion=<?php echo $coinVersionLink; ?>"><?php echo $CollectionFirstday->getFirstDayCoinTypeProGrader($coinVersion, $proService='ANACS', $firstdayType='Envelope', $userID); ?></a></td>
    </tr>
     <tr align="center">
       <td align="left">Slabed Coins</td>
       <td><a href="viewFirstDayTypeService.php?proService=PCGS&coinVersion=<?php echo $coinVersionLink; ?>"><?php echo $CollectionFirstday->getFirstDayCoinTypeProGrader($coinType, $proService='PCGS', $firstdayType='Coins', $userID); ?></a><a href="viewFirstDayTypeService.php?proService=PCGS&coinType=<?php echo $coinVersionLink; ?>"></a></td>
       <td><a href="viewFirstDayTypeService.php?proService=PCGS&coinVersion=<?php echo $coinVersionLink; ?>"><?php echo $CollectionFirstday->getFirstDayCoinTypeProGrader($coinType, $proService='ICG', $firstdayType='Coins', $userID); ?></a></td>
       <td><a href="viewFirstDayTypeService.php?proService=PCGS&coinVersion=<?php echo $coinVersionLink; ?>"><?php echo $CollectionFirstday->getFirstDayCoinTypeProGrader($coinType, $proService='NGC', $firstdayType='Coins', $userID); ?></a></td>
       <td><a href="viewFirstDayTypeService.php?proService=PCGS&coinVersion=<?php echo $coinVersionLink; ?>"><?php echo $CollectionFirstday->getFirstDayCoinTypeProGrader($coinType, $proService='ANACS', $firstdayType='Coins', $userID); ?></a></td>
     </tr>
     <tr align="center">
       <td>&nbsp;</td>
       <td><a href="viewFirstDayService.php?proService=PCGS"><?php echo $CollectionFirstday->getFirstDayProGrader('PCGS',$userID); ?></a></td>
       <td><a href="viewFirstDayService.php?proService=ICG"><?php echo $CollectionFirstday->getFirstDayProGrader('ICG',$userID); ?></a></td>
       <td><a href="viewFirstDayService.php?proService=NGC"><?php echo $CollectionFirstday->getFirstDayProGrader('NGC' ,$userID); ?></a></td>
       <td><a href="viewFirstDayService.php?proService=ANACS"><?php echo $CollectionFirstday->getFirstDayProGrader('ANACS',$userID); ?></a></td>
    </tr>
  </table>
<hr />

  <table width="100%" border="0" id="setList">
  <tr>
    <td width="46%"><h3>Coin Set</h3></td>
    <td width="10%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM collectfirstday WHERE coinVersion = '$coinVersion' ORDER BY coinYear ASC") or die(mysql_error()); 
	
	while($row = mysql_fetch_array($getcoinType)){
		$firstdayID = intval($row['firstdayID']);
		$collectfirstdayID = $Encryption->encode($row['collectfirstdayID']);
		$firstdayNickname = strip_tags($row['firstdayNickname']);
		$coinVersion = strip_tags($row['coinVersion']);
	echo '<tr class="setListRow">
    <td><a href="viewFirstDayDetail.php?collectfirstdayID=' . $collectfirstdayID . '">' . $firstdayNickname . '</a></td>
    <td align="center">'.$CollectionFirstday->getFirstDayCountByFirstDayId($firstdayID, $userID).'</td>
  </tr>';

	}
?>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>