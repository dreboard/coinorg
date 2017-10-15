<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


if (isset($_POST["varietyBtn"])) { 
$collectionID = $Encryption->decode($_POST["ID"]);
$variety = mysql_real_escape_string($_POST["variety1"]).'-'.mysql_real_escape_string($_POST["variety2"]);
mysql_query("UPDATE collection SET variety = '$variety' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
}



if (isset($_POST["FSBtn"])) { 
$collectionID = $Encryption->decode($_POST["ID"]);
$fsNum = mysql_real_escape_string($_POST["fs1"]).mysql_real_escape_string($_POST["fs2"]).mysql_real_escape_string($_POST["fs3"]);
mysql_query("UPDATE collection SET fsNum = '$fsNum' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
}

if (isset($_POST["vamBtn"])) { 
$collectionID = $Encryption->decode($_POST["ID"]);
//$vam = $collection->processVamNum($_POST["vam"], $_POST["vam2"], $_POST["vam3"]);
$vam = mysql_real_escape_string($_POST["vam"]);
mysql_query("UPDATE collection SET vam = '$vam' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
}

if (isset($_POST["wbBtn"])) { 
$wileyBugert = mysql_real_escape_string($_POST["wileyBugert"]).$collection->addPeriodToReferenceNum($_POST["wileyBugert2"]);
$collectionID = $Encryption->decode($_POST["ID"]);
$collection->setWileyBugert($collectionID, $userID, $wileyBugert);
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
}

if (isset($_POST["fortinBtn"])) { 
$fortin = mysql_real_escape_string($_POST["fortin"]).$collection->addPeriodToReferenceNum($_POST["fortin2"]);
$collectionID = $Encryption->decode($_POST["ID"]);
$collection->setFortin($collectionID, $userID, $fortin);
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
}


if (isset($_GET['ID'])) { 
$collectionID = $Encryption->decode($_GET['ID']);

if($collection->getCollectionById($collectionID) == NULL){
header("location: myCoins.php");
} else {

$coinType = $collection->getCoinType();
$coinID = $collection->getCoinID();
$coin-> getCoinById($coinID);
$coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
$coinName = $coin->getCoinName();  
$additional = $collection->getAdditional(); 
$coinGrade = $collection->getCoinGrade();
$proService = $collection->getGrader();
$coinCategory = $coin->getCoinCategory();  
$coinSubCategory = $coin->getCoinSubCategory();  
$page ->getCoinPage($coinCategory);
$linkName = str_replace(' ', '_', $coinType);
$categoryLink = str_replace(' ', '_', $coinCategory);
$coinLink = str_replace(' ', '_', $coinType);
$varietyType = $collection->getVariety();
if($collection->getCoinImage1() !== '../img/noPic.jpg'){
  $coinPic1 = '<img src="'.$collection->getCoinImage1().'" class="coinImg" />';
	} else {
	$coinPic1 = '<img src="../img/'.$coinVersion.'.jpg" width="250" height="250" />';
	}
  }
}



if (isset($_POST["varietyREDBtn"])) { 
$collection->setRED($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["red"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyDDOBtn"])) { 
$collection->setDDO($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["ddo"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyDDRBtn"])) { 
$collection->setDDR($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["ddr"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyRPMBtn"])) { 
$collection->setRPM($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["rpm"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyRPDBtn"])) { 
$collection->setRPD($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["rpd"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyOMMBtn"])) { 
$collection->setOMM($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["omm"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyMMSBtn"])) { 
$collection->setMMS($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["mms"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyODVBtn"])) { 
$collection->setODV($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["odv"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyRDVBtn"])) { 
$collection->setRDV($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["rdv"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyIMMBtn"])) { 
$collection->setIMM($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["imm"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyDMRBtn"])) { 
$collection->setDMR($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["dmr"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyMDOBtn"])) { 
$collection->setMDO($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["mdo"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["varietyMDRBtn"])) { 
$collection->setMDR($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["mdr"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}

if (isset($_POST["bieBtn"])) { 
$collectionID = $Encryption->decode($_POST["ID"]);
$bie = mysql_real_escape_string($_POST["bie"]);
mysql_query("UPDATE collection SET bie = '$bie' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
//ERRORS
if (isset($_POST["offCenterBtn"])) { 
$Errors->setOffCenter($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["offCenter"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["multipleStrikeBtn"])) { 
$Errors->setMultipleStrike($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["multipleStrike"]), mysql_real_escape_string($_POST["secondStrike"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["broadstrikeBtn"])) { 
$Errors->setBroadstrike($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["broadstrike"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["partialCollarBtn"])) { 
$Errors->setPartialCollar($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["partialCollar"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["bondedPlanchetsBtn"])) { 
$Errors->setBondedPlanchets($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["bondedPlanchets"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["matedPairBtn"])) { 
$Errors->setMatedPair($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["matedPair"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["doubleDenomBtn"])) { 
$Errors->setDoubleDenom($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["doubleDenom"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["indentPercentBtn"])) { 
$Errors->setIndentPercent($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["indentPercent"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}

if (isset($_POST["clippedPlanchetBtn"])) { 
$Errors->setClippedPlanchet($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["clippedPlanchet"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["muleBtn"])) { 
$mule = mysql_real_escape_string($_POST["mule"]) . ' ' . mysql_real_escape_string($_POST["mule2"]);
$Errors->setDoubleDenom($Encryption->decode($_POST["ID"]), $userID, $mule);
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["rotatedBtn"])) { 
$rotated = mysql_real_escape_string($_POST["rotated"]) .mysql_real_escape_string($_POST["rotated2"]);
$Errors->setRotated($Encryption->decode($_POST["ID"]), $userID, $rotated);
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}

if (isset($_POST["dieCrackBtn"])) { 
$dieCrackObv = mysql_real_escape_string($_POST["dieCrackObv"]);
$dieCrackRev = mysql_real_escape_string($_POST["dieCrackRev"]);
if ($dieCrackObv == 'None') { 
	$dieCrack = $dieCrackRev;
} else if ($dieCrackRev == 'None') { 
	$dieCrack = $dieCrackObv;
} else  { 
	$dieCrack = $dieCrackObv.', '. $dieCrackObv;
} 
$Errors->setDieCrack($Encryption->decode($_POST["ID"]), $userID, $dieCrack);
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}
if (isset($_POST["machineDoubleBtn"])) { 
$Errors->setMachineDouble($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["machineDouble"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
}


if (isset($_POST["snowBtn"])) { 
$collection->setSnow($Encryption->decode($_POST["ID"]), $userID, mysql_real_escape_string($_POST["snow"]));
header('Location: viewCoinVariety.php?ID='.$Encryption->encode($collectionID).'');
exit();
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
$('#collectTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


$("#wantForm").submit(function() {
      if ($("#coinGrade").val() == "") {
		$("#coinGrade").addClass("errorInput");
        return false;
      }else {
	 $('#wantBtn').val("Adding to list.....");	  
	  return true;
	  }
});

$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#collectionListForm").submit(function() {
      if ($("#Collection").val() == "") {
		$("#Collection").addClass("errorInput");
        return false;
      }else {
	 $('#collectionListBtn').val("Adding to collection.....");	  
	  return true;
	  }
});
$("#vamForm").submit(function() {
      if ($("#vamNumber").val() == "") {
		$("#vamNumber").addClass("errorInput");
        return false;
      }else {
	 $('#vamBtn').val("Assigning Vam.....");	  
	  return true;
	  }
});





});
</script> 
<style type="text/css">
.varieryChk {width:100px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span><?php echo $_SESSION['message']; ?></span>

<table width="100%" border="0">
  <tr>
    <td><h1 class="tblH1"><?php echo '<img src="../img/'.$coinVersion.'.jpg" width="50" height="50" align="absmiddle" />'; ?> <a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a></h1></td>
  </tr>
  <tr>
    <td class="brownLink"><?php echo $collection->getVarietyForCoin(intval($collectionID)).' '.$Errors->getErrorForCoin(intval($collectionID)) ?></td>
  </tr>
</table>


<table width="753" id="viewTbl">
  <tr>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a></td>
    </tr>
  <tr>
    <td width="162" class="tdHeight"><span class="darker">Type: </span></td>
<td width="575" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinLink ?>"><?php echo $coinType ?></a></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Year:</strong></td>
    <td class="tdHeight"><a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear() ?>"><?php echo $coin->getCoinYear() ?></a></td>
    </tr>
  <tr>
    <td class="tdHeight"><strong>Grade:</strong></td>
    <td class="tdHeight"><?php echo $coinGrade ?>
      
      
    </td>
    </tr>
  <tr>
    <td class="tdHeight"><strong>Grading Service:</strong></td>
    <td class="tdHeight"><a href="viewTypeService.php?proService=<?php echo $proService ?>&coinType=<?php echo $coinLink ?>"><?php echo $proService ?></a> 
      <?php 
   if($proService !== 'None'){
      echo $collection->getGraderNumber();
   }
     ?> 
      &nbsp; 
      <?php
	if($proService == 'None'){
	if($collection->getCertlist() == '0'){
		echo '(<a href="certListAdd.php?ID='.$_GET['ID'].'" class="greenLink">Add to Certification list</a>)';
	} else {
		echo '(This Coin Is On The <a href="certList.php" class="brownLinkBold">To Be Certified List</a>) <form action="" method="post" class="compactForm">
	  <input name="certCoinID" type="hidden" value="'.$Encryption->encode($collectionID).'" />
	  <input name="certRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove this Coin?\')" />
	  </form>';		
	}
	}
 ?></td>
    </tr>
  <tr>
    <td colspan="2" valign="top">
      </td>
  </tr>
</table>
<br />
<?php include('../inc/pageElements/viewCoinLinks.php'); ?>
<h2>Update/Set Variety, Reference & Error Details</h2>
<hr />
<table width="83%" border="0">
  <tr>
    <td width="26%"></td>
    <td width="11%"><strong>Current</strong></td>
    <td width="63%"><strong>Change</strong></td>
  </tr>
  </table>
    <?php if (in_array($collection->getCoinID(), $bieCoins)) {?>
<table width="83%" border="0"> 
  <tr>
    <td width="26%"><strong>BIE Type</strong></td>
    <td width="11%"><?php echo	$collection->getBIE();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="bieForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
<select name="bie" id="bie">
  <option value="None" selected="selected">Select Number</option>
<option value="Full">Full BIE</option>
<option value="Partial">Partial BIE</option>
</select>      
      &nbsp;
<input id="bieBtn" name="bieBtn" type="submit" value="Set BIE" onclick="return confirm('Assign BIE Type?');" />
	  </form>
</td>
  </tr>
 
  </table>
  <hr />

 <?php } else { echo ''; }  ?>
<table width="83%" border="0" id="conecaTbl" class="varietyListTbl">
  <tr>
    <td><h3><img src="../img/varietyIcon.jpg" alt="" width="25" height="25" align="absmiddle" /> CONECA/Variety</h3></td>
    <td><strong>Current</strong></td>
    <td><strong>Change</strong></td>
  </tr>
  <tr>
    <td width="26%"><strong>Double Die Obverse</strong></td>
    <td width="11%"><?php echo	$collection->getDDO();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionDDOForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="ddo" id="ddo" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="DDO-'.sprintf("%03s", $list_day).'">DDO-'.sprintf("%03s", $list_day).'</option>';
}
?>
        </select> &nbsp;
        <input id="varietyDDOBtn" name="varietyDDOBtn" type="submit" value="Set DDO #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Double Die Reverse</strong></td>
    <td width="11%"><?php echo	$collection->getDDR();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionDDRForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="ddr" id="ddr" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="DDR-'.sprintf("%03s", $list_day).'">DDR-'.sprintf("%03s", $list_day).'</option>';
}
?>
        </select> &nbsp;
        <input id="varietyDDRBtn" name="varietyDDRBtn" type="submit" value="Set DDR #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Repunched Mintmark</strong></td>
    <td width="11%"><?php echo	$collection->getRPM();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionRPMForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="rpm" id="rpm" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="RPM-'.sprintf("%03s", $list_day).'">RPM-'.sprintf("%03s", $list_day).'</option>';
}
?>
        </select>
        &nbsp;
    	<input id="varietyRPMBtn" name="varietyRPMBtn" type="submit" value="Set RPM #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table>
  
  
  
  
  
  
  
  <table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Repunched Date</strong></td>
    <td width="11%"><?php echo	$collection->getRPD();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionRPDForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="rpd" id="rpd" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="RPD-'.sprintf("%03s", $list_day).'">RPD-'.sprintf("%03s", $list_day).'</option>';
}
?>
        </select>
        &nbsp;
    	<input id="varietyRPDBtn" name="varietyRPDBtn" type="submit" value="Set RPD #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table>
  
  
  <table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Over Mintmark</strong></td>
    <td width="11%"><?php echo	$collection->getOMM();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionOMMForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="omm" id="omm" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="OMM-'.sprintf("%03s", $list_day).'">OMM-'.sprintf("%03s", $list_day).'</option>';
}
?>
        </select>
        &nbsp;
    	<input id="varietyOMMBtn" name="varietyOMMBtn" type="submit" value="Set OMM #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Mintmark Style</strong></td>
    <td width="11%"><?php echo	$collection->getMMS();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionMMSForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="mms" id="mms" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="MMS-'.sprintf("%03s", $list_day).'">MMS-'.sprintf("%03s", $list_day).'</option>';
}
?>
        </select>
        &nbsp;
    	<input id="varietyMMSBtn" name="varietyMMSBtn" type="submit" value="Set MMS #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Obverse Design Variety</strong></td>
    <td width="11%"><?php echo	$collection->getODV();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionODVForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="odv" id="odv" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="ODV-'.sprintf("%03s", $list_day).'">ODV-'.sprintf("%03s", $list_day).'</option>';
}
?>
        </select>
        &nbsp;
    	<input id="varietyODVBtn" name="varietyODVBtn" type="submit" value="Set ODV #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Reverse Design Variety</strong></td>
    <td width="11%"><?php echo	$collection->getRDV();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionRDVForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="rdv" id="rdv" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="RDV-'.sprintf("%03s", $list_day).'">RDV-'.sprintf("%03s", $list_day).'</option>';
}
?>
        </select>
        &nbsp;
    	<input id="varietyRDVBtn" name="varietyRDVBtn" type="submit" value="Set RDV #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Re Engraved Design</strong></td>
    <td width="11%"><?php echo $collection->getRED();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionREDForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="red" id="red" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="RED-'.sprintf("%03s", $list_day).'">RED-'.sprintf("%03s", $list_day).'</option>';
}

?>
        </select>
        &nbsp;
    	<input id="varietyREDBtn" name="varietyREDBtn" type="submit" value="Set RED #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Inverted Mintmark</strong></td>
    <td width="11%"><?php echo $collection->getIMM();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionIMMForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="imm" id="imm" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="IMM-'.sprintf("%03s", $list_day).'">IMM-'.sprintf("%03s", $list_day).'</option>';
}

?>
        </select>
        &nbsp;
    	<input id="varietyIMMBtn" name="varietyIMMBtn" type="submit" value="Set IMM #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Die Marriage Registry</strong></td>
    <td width="11%"><?php echo $collection->getDMR();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionDMRForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="dmr" id="dmr" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="DMR-'.sprintf("%03s", $list_day).'">DMR-'.sprintf("%03s", $list_day).'</option>';
}

?>
        </select>
        &nbsp;
    	<input id="varietyDMRBtn" name="varietyDMRBtn" type="submit" value="Set DMR #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Master Die Obverse</strong></td>
    <td width="11%"><?php echo $collection->getMDO();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionMDOForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="mdo" id="mdo" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="MDO-'.sprintf("%03s", $list_day).'">MDO-'.sprintf("%03s", $list_day).'</option>';
}

?>
        </select>
        &nbsp;
    	<input id="varietyMDOBtn" name="varietyMDOBtn" type="submit" value="Set MDO #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table><table width="83%" border="0">
  <tr>
    <td width="26%"><strong>Master Die Reverse</strong></td>
    <td width="11%"><?php  echo $collection->getMDR();?></td>
    <td width="63%"><form action="" method="post" class="compactForm" id="collectionMDRForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="mdr" id="mdr" class="varieryChk">
          <?php 
for ($list_day = 001; $list_day <= 075; $list_day++) {
	echo '<option value="MDR-'.sprintf("%03s", $list_day).'">MDR-'.sprintf("%03s", $list_day).'</option>';
}

?>
        </select>
        &nbsp;
    	<input id="varietyMDRBtn" name="varietyMDRBtn" type="submit" value="Set MDR #" onclick="return confirm('Assign Variety Number?');" />
	  </form>
</td>
  </tr>
  </table>


<?php if (in_array($collection->getCoinType(), $trailTypes)) {?>     
<table width="945" border="0" cellpadding="3" class="varietyCoinTbl" id="wexlerTbl">
<tr>
    <td width="205"><h3><img src="../img/varietyIcon.jpg" alt="" width="25" height="25" align="absmiddle" /> Trail Dies</h3></td>
    <td width="152"><strong>Current</strong></td>
    <td width="562"><strong>Change</strong></td>
  </tr>
<tr>
  <td><strong>Strength</strong></td>
  <td><?php $collection->getTrailDieStrength();?></td>
  <td>
  <form action="" method="post" class="compactForm">
  <select name="trailDieStrength" id="trailDieStrength">
    <option value="Weak">Weak</option>
    <option value="Moderate">Moderate</option>
    <option value="Strong">Strong</option>
    <option value="Very Strong">Very Strong</option>
  </select>
  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
  <input id="trailDieStrengthBtn" name="trailDieStrengthBtn" type="submit" value="Set Strength #" onclick="return confirm('Assign Trail Die Strength?');" /></form></td>
</tr>
<tr>
  <td><strong>Step Deviation</strong></td>
  <td><?php 	$collection->getTrailDieDeviation();?></td>
  <td><form action="" method="post" class="compactForm"><select name="trailDieDeviation" id="trailDieDeviation">
    <option value="Light">Light</option>
    <option value="Moderate">Moderate</option>
    <option value="Strong">Strong</option>
    <option value="Very Strong">Very Strong</option>
  </select>  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
  <input id="trailDieStrengthBtn" name="trailDieStrengthBtn" type="submit" value="Set Step Deviation #" onclick="return confirm('Assign Trail Step Deviation?');" /></form></td>
</tr>
<tr>
  <td><strong>Number</strong></td>
  <td><?php 	$collection->getTrailDieNumber();?></td>
  <td><form action="" method="post" class="compactForm">
  <select name="trailDieNumber" id="trailDieNumber">
      <option value="DEO">DEO</option>
      <option value="DER">DER</option>
  </select>
    <select name="trailDieNumber2" id="trailDieNumber2">
      <?php 
for ($list_day = 001; $list_day <= 025; $list_day++) {
	echo '<option value="'.sprintf("%03s", $list_day).'">'.sprintf("%03s", $list_day).'</option>';
}
?>
    </select>
    <select name="trailDieNumber3" id="trailDieNumber3">
      <option value="WS">WS</option>
      <option value="T">T</option>
      <option value="WST">WST</option>
  </select>  
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
  <input id="trailDieNumberBtn" name="trailDieNumberBtn" type="submit" value="Set Trail Die Number" onclick="return confirm('Assign Trail Die Number?');" /></form>  </td>
</tr>
<tr>
  <td><strong>Offset Direction</strong></td>
  <td><?php 	$collection->getTrailDieDirection();?></td>
  <td><form action="" method="post" class="compactForm">
  <select name="trailDieDirection" id="trailDieDirection">
      <?php 
for ($vam1 = 1; $vam1 <= 360; $vam1++) {
echo "<option value=".$vam1.">".$vam1."</option>";
}
?>
  </select>  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
  <input id="trailDieDirectionBtn" name="trailDieDirectionBtn" type="submit" value="Set Trail Die Direction" onclick="return confirm('Assign Trail Die Direction?');" /></form></td>
</tr>
  </table>
<?php } else { echo ''; }  ?>     

<hr />
<h3><img src="../img/varietyIcon.jpg" alt="" width="25" height="25" align="absmiddle" /> By Reference #</h3>

<table width="83%" border="0">
  <tr>
    <td width="18%"></td>
    <td width="22%"><strong>Current</strong></td>
    <td width="60%"><strong>Change</strong></td>
  </tr>
  </table>
  <?php if (in_array($collection->getCoinType(), $vamTypes)) {?>
<table width="83%" border="0"> 
  <tr>
    <td width="18%"><strong>Van Allen / Mallis</strong></td>
    <td width="22%"><?php echo	$collection->getVAM();?></td>
    <td width="60%"><form action="" method="post" class="compactForm" id="vamForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
<select name="vam" id="vamNumber">
  <option value="" selected="selected">Select Number</option>
<?php
	switch($collection->getStrike()){
		case 'Business':
		$vamList = "get_".$collection->getCoinYear()."_".$collection->getMintMark();
		break;
		case 'Proof':
		$vamList = "get_".$collection->getCoinYear()."_".$collection->getMintMark()."_Proof";
		break;
}

foreach ($VAM->{$vamList}() as $key => $value) {
  echo '<option value="'.$value.'">'.$value.'</option> ';
}
?> 
</select>      
      &nbsp;
<input id="vamBtn" name="vamBtn" type="submit" value="Set VAM #" onclick="return confirm('Assign Number?');" />
	  </form>
</td>
  </tr>
 
  </table>
 <?php } else { echo ''; }  ?>   
<table width="83%" border="0"> 
  <tr>
    <td width="18%"><strong>Fivaz-Stanton</strong></td>
    <td width="22%"><?php echo	$collection->getFsNum();?></td>
    <td width="60%"><form action="" method="post" class="compactForm" id="FZForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="fs1" id="fs1" class="varieryChk">
          <?php 
for ($list_day = 1; $list_day <= 15; $list_day++) {
	echo '<option value="FS'.$list_day.'">'.$list_day.'</option>';
}
?>
        </select>
        <select name="fs2" id="fs2">
          <option value="1">1</option>
        </select>
        <select name="fs3" id="fs3">
          <?php 
for ($fs3 = 2; $fs3 <= 9; $fs3++) {
echo "<option value=".$fs3.">".$fs3."</option>";
}
?>
        </select>
        <input id="FSBtn" name="FSBtn" type="submit" value="Set FS #" onclick="return confirm('Assign Number?');" />
	  </form>
</td>
  </tr>
  </table>

<?php if (in_array($collection->getCoinType(), $sheldonTypes)) {?>    
<table width="83%" border="0"> 
  <tr>
    <td width="18%"><strong>Sheldon</strong></td>
    <td width="22%"><?php echo	$collection->getSheldon();?></td>
    <td width="60%"><form action="" method="post" class="compactForm" id="collectionDDOForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="sheldon" id="sheldon" class="varieryChk">
          <?php 
for ($list_day = 1; $list_day <= 295; $list_day++) {
	echo '<option value="S'.$list_day.'">'.$list_day.'</option>';
}
?>
        </select>
        <select name="sheldon2" id="sheldon2">
          <option value="a">A</option>
          <option value="b">B</option>
          <option value="c">C</option>
        </select>
        <input id="vamBtn" name="vamBtn" type="submit" value="Set Sheldon #" onclick="return confirm('Assign Number?');" />
	  </form>
</td>
  </tr>
  </table>
  <?php } else { echo ''; }  ?>  
  <?php if (in_array($collection->getCoinType(), $newcombTypes)) {?> 
  
<table width="83%" border="0"> 
  <tr>
    <td width="18%"><strong>Newcomb</strong></td>
    <td width="22%"><?php echo	$collection->getNewcomb();?></td>
    <td width="60%"><form action="" method="post" class="compactForm" id="collectionDDOForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="newcomb" id="newcomb" class="varieryChk">
          <?php 
for ($list_day = 1; $list_day <= 30; $list_day++) {
	echo '<option value="N'.$list_day.'">'.$list_day.'</option>';
}
?>
        </select>
        <select name="newcomb2" id="newcomb2">
          <option value="a">A</option>
          <option value="b">B</option>
          <option value="c">C</option>
        </select>
        <input id="newcombBtn" name="newcombBtn" type="submit" value="Set Newcomb #" onclick="return confirm('Assign Number?');" />
	  </form>
</td>
  </tr>
  </table>
  <?php } else { echo ''; }  ?>  
  <?php if (in_array($collection->getCoinType(), $wileyBugertTypes)) {?>   
<table width="83%" border="0"> 
  <tr>
    <td width="18%"><strong>Wiley-Bugert</strong></td>
    <td width="22%"><?php echo	$collection->getWileyBugert();?></td>
    <td width="60%"><form action="" method="post" class="compactForm" id="wbForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="wileyBugert" id="wileyBugert">
          <?php 
for ($list_day = 101; $list_day <= 105; $list_day++) {
	echo '<option value="WB-'.sprintf("%02s", $list_day).'">'.sprintf("%02s", $list_day).'</option>';
}
?>
        </select>
.
<select name="wileyBugert2" id="wileyBugert2" class="varieryChk">
<option value=""></option>
  <?php 
for ($list_day = 01; $list_day <= 05; $list_day++) {
	echo '<option value="'.sprintf("%02s", $list_day).'">'.sprintf("%02s", $list_day).'</option>';
}
?>
</select>
<input id="wbBtn" name="wbBtn" type="submit" value="Set Wiley-Bugert #" onclick="return confirm('Assign Number?');" />
	  </form>
</td>
  </tr>
    <?php } else { echo ''; }  ?>  
  </table>
  
  
<?php if (in_array($collection->getCoinType(), $snowTypes)) {?>    
<table width="83%" border="0"> 
  <tr>
    <td width="18%"><strong>Snow</strong></td>
    <td width="22%"><?php echo	$collection->getSnow();?></td>
    <td width="60%">
      <form action="" method="post" class="compactForm" id="getSnowForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
<select name="snow" id="snow">
  <option value="" selected="selected">Select Number</option>
<?php
	switch($collection->getStrike()){
		case 'Business':
		$SnowList = "get_".$collection->getCoinYear()."_".$collection->getMintMark();
		break;
		case 'Proof':
		$SnowList = "get_".$collection->getCoinYear()."_".$collection->getMintMark()."_Proof";
		break;
}

foreach ($Snow->{$SnowList}() as $key => $value) {
  echo '<option value="'.$value.'">'.$value.'</option> ';
}
?> 
</select>    
      &nbsp;
<input id="snowBtn" name="snowBtn" type="submit" value="Set Snow #" onclick="return confirm('Assign Number?');" />
	  </form>
</td>
  </tr>
  </table>
<?php } else { echo ''; }  ?>   
  <?php if (in_array($collection->getCoinType(), $snowTypes)) {?>    
<table width="83%" border="0"> 
  <tr>
    <td width="18%"><strong>Fortin</strong></td>
    <td width="22%"><?php echo	$collection->getFortin();?></td>
    <td width="60%"><form action="" method="post" class="compactForm" id="fortinForm">
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
        <select name="fortin" id="fortin" class="varieryChk">
          <?php 
for ($list_day = 101; $list_day <= 117; $list_day++) {
	echo '<option value="F-'.sprintf("%02s", $list_day).'">'.sprintf("%02s", $list_day).'</option>';
}
?>
        </select>
        <select name="fortin2" id="fortin2">
          <option value="a">A</option>
          <option value="b">B</option>
          <option value="c">C</option>
        </select>
        <input id="fortinBtn" name="fortinBtn" type="submit" value="Set Fortin #" onclick="return confirm('Assign Number?');" />
	  </form>
</td>
  </tr>
  </table>
<?php } else { echo ''; }  ?>   



<hr />
<h3><img src="../img/errorIcon.jpg" alt="" width="20" height="20" align="absmiddle" /> Set Error Details</h3>

<table width="979" border="0" cellpadding="2" class="addCoinTbl" id="errorDetailsDiv">
  <tr class="errorsRow">
    <td>&nbsp;</td>
    <td><strong>Current</strong></td>
    <td valign="middle"><strong>Change</strong></td>
  </tr>
  <tr class="errorsRow">
    <td width="22%"><strong>Off Center&nbsp;</strong></td>
    <td width="28%"><?php echo	$collection->getOffCenter();?></td>
    <td width="50%" valign="middle">
    <form action="" method="post" class="compactForm">
    <select name="offCenter" id="offCenter" class="errorGroup">
    <option value="0" selected="selected">Percentage</option>
    <?php 
	for($i=5;$i<100;$i+=5)
{
    echo '<option value="Off Center '.$i.'%">'.$i.'%</option>';
}
	
	?>
    </select>
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input id="offCenterBtn" name="offCenterBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
    </form>
    
    </td>
    </tr>
    <tr class="errorsRow">
      <td><label for="multipleStrike" id="multipleStrikeLbl" class="errorGroupLbl">Multiple Strikes</label></td>
      <td><?php echo $collection->getMultipleStrike();?></td>
    <td rowspan="3" valign="middle">
    <form action="" method="post" class="compactForm">
      <select name="multipleStrike" id="multipleStrike" class="errorGroup">
      <option value="None" selected="selected"># of Strikes</option>
      <option value="Double Struck">Double Struck</option>
      <option value="Triple Struck">Triple Struck</option>
    </select>
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
      <br />

    <select name="secondStrike" id="secondStrike" class="errorGroup">
      <option value="None" selected="selected">0</option>
      <?php 
	for($i=5;$i<100;$i+=5)
{
    echo '<option value="2nd Strike off '.$i.'%">'.$i.'%</option>';
}
	
	?>
    </select>
    Multiple strike 2nd strike off center percentage
    <br />
    <input id="multipleStrikeBtn" name="multipleStrikeBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
      </form></td>
  </tr>
    <tr class="errorsRow">
      <td rowspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="errorsRow">
      <td>&nbsp;</td>
    </tr>
   <tr class="errorsRow">
     <td width="22%"> <label for="broadstrike" id="broadstrikeLbl" class="errorGroupLbl">Broadstrike</label>
       &nbsp;</td>
     <td width="28%"><?php echo $collection->getBroadstrike();?></td>
    <td width="50%" valign="middle">
    <form action="" method="post" class="compactForm">
    <select name="broadstrike" id="broadstrike" class="errorGroup">
      <option value="None" selected="selected">Select</option>
      <option value="Broadstrike Type I">Type I</option>
      <option value="Broadstrike Type II">Type II</option>
    </select>
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input id="broadstrikeBtn" name="broadstrikeBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
    </form></td>
    </tr>
  <tr class="errorsRow">
    <td><label for="partialCollar" id="partialCollarLbl" class="errorGroupLbl">Partial Collar</label></td>
    <td><?php echo	$collection->getPartialCollar();?></td>
    <td valign="middle">
    <form action="" method="post" class="compactForm">
    <select name="partialCollar" id="partialCollar" class="errorGroup">
      <option value="None" selected="selected">Select</option>
      <option value="Partial Collar">Yes</option>
    </select>
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input id="partialCollarBtn" name="partialCollarBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
    </form></td>
    </tr>

  <tr class="errorsRow">
    <td width="22%"> <label for="bondedPlanchets" id="bondedPlanchetsLbl" class="errorGroupLbl">Bonded Planchets</label>
      &nbsp;</td>
    <td width="28%"><?php echo	$collection->getBondedPlanchets();?></td>
    <td width="50%" valign="middle">
    <form action="" method="post" class="compactForm">
    <select name="bondedPlanchets" id="bondedPlanchets" class="errorGroup">
      <option value="None" selected="selected">Select</option>
      <option value="Bonded Planchets 1">1</option>
      <option value="2 Bonded Planchets">2</option>
      <option value="3 Bonded Planchets">3</option>
    </select>
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
<input id="bondedPlanchetsBtn" name="bondedPlanchetsBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
    </form></td>
    </tr>
 <tr class="errorsRow">
   <td><label for="matedPair" class="errorGroupLbl" id="matedPairLbl">Mated Pair Type</label>
     &nbsp;</td>
   <td><?php echo	$collection->getMatedPair();?></td>
    <td valign="middle">
    <form action="" method="post" class="compactForm">
    <select name="matedPair" id="matedPair" class="errorGroup">
      <option value="None" selected="selected">Select</option>
      <option value="Mated Pair Overlapping">Overlapping</option>
      <option value="Mated Pair Full Brockage">Full Brockage</option>
      <option value="Mated Pair Die Cap">Die Cap</option>
      <option value="Mated Pair 2 Die Caps">2 Die Caps</option>      
    </select>
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input id="matedPairBtn" name="matedPairBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
    </form></td>
    </tr>

<tr class="errorsRow">
  <td width="22%"> <label for="doubleDenom" class="errorGroupLbl" id="doubleDenomLbl">Double Denomination</label>&nbsp;</td>
  <td width="28%"><?php echo	$collection->getDoubleDenom();?></td>
    <td width="50%" valign="middle">
    <form action="" method="post" class="compactForm">
    <select name="doubleDenom" id="doubleDenom" class="errorGroup">
      <option value="None" selected="selected">Struck On</option>
<?php 
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT DISTINCT coinType FROM coins WHERE coinMetal != 'Platinum' AND coinType != 'No Coin' AND commemorative = '0' ORDER BY denomination ASC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$coinType = $row['coinType'];
	echo '<option value="Struck On ' . $coinType . '">' . $coinType . '</option>';

	}
?>
    </select>
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
    <input id="doubleDenomBtn" name="doubleDenomBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
    </form>
</td>
    </tr>
    <tr class="errorsRow">
      <td width="22%"> <label for="indentPercent" id="indentPercentLbl" class="errorGroupLbl">Indent </label>&nbsp;</td>
      <td width="28%"><?php echo	$collection->getIndentPercent();?></td>
    <td width="50%" valign="middle">
    <form action="" method="post" class="compactForm">
      <select name="indentPercent" id="indentPercent" class="errorGroup">
    <option value="None" selected="selected">Percentage</option>
    <?php 
	for($i=5;$i<100;$i+=5)
{
    echo '<option value="Indent '.$i.'%">'.$i.'%</option>';
}
	
	?>
    </select>
      <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
      <input id="indentPercentBtn" name="indentPercentBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
    </form></td>
    </tr>
        <tr class="errorsRow">
          <td width="22%"><label for="clippedPlanchet" id="clippedPlanchetLbl" class="errorGroupLbl">Clipped Planchet </label>
            &nbsp;</td>
          <td width="28%"><?php echo	$collection->getClippedPlanchet();?></td>
          <td valign="middle">
          <form action="" method="post" class="compactForm">
          <select name="clippedPlanchet" id="clippedPlanchet" class="errorGroup">
            <option value="None" selected="selected">Select Type</option>
            <option value="Straight Clipped Planchet">Straight</option>
            <option value="Curved Clipped Planchet">Curved</option>
            <option value="Ragged Clipped Planchet">Ragged</option>
            <option value="Elliptical Clipped Planchet">Elliptical</option>
          </select>
          <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
<input id="clippedPlanchetBtn" name="clippedPlanchetBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
          </form></td>
        </tr>
        <tr class="errorsRow">
          <td><label for="mule" class="errorGroupLbl" id="muleLbl">Mule</label></td>
          <td><?php echo	$collection->getMule();?></td>
          <td valign="middle">
          <form action="" method="post" class="compactForm">
          <select name="mule" id="mule" class="errorGroup">
            <option value="None" selected="selected">Select</option>
            <?php 
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$getcoinType = mysql_query("SELECT DISTINCT coinType FROM coins WHERE coinMetal != 'Platinum' AND coinType != 'No Coin' AND commemorative = '0' ORDER BY denomination ASC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$coinType = $row['coinType'];
	echo '<option value="' . $coinType . '">' . $coinType . '</option>';

	}
?>
          </select> <select name="mule2" id="mule2" class="errorGroup">
            <option value="None" selected="selected">Select</option>
            <option value=" Obverse">Obverse</option>
              <option value=" Reverse">Reverse</option>
          </select>
          <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
          <input id="muleBtn" name="muleBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
          </form></td>
        </tr>
        <tr class="errorsRow">
          <td><label for="rotated" class="errorGroupLbl" id="rotatedLbl">Rotated Die</label></td>
          <td><?php echo $collection->getRotated();?></td>
          <td valign="middle">
          <form action="" method="post" class="compactForm">
          
          <select name="rotated" id="rotated" class="errorGroup">
            <option value="0" selected="selected">Degrees</option>
            <?php 
	for($i=5;$i<180;$i+=5)
{
    echo '<option value="'.$i.' Degrees">'.$i.' Degrees</option>';
}
	
	?>
          </select>
          <select name="rotated2" id="rotated2" class="errorGroup">
            <option value="None" selected="selected">Select</option>
              <option value="CW"> CW</option>
              <option value="CCW"> CCW</option>
            </select>
          <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
<input id="rotatedBtn" name="rotatedBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
            </form></td>
        </tr>    
                <tr class="errorsRow">
                  <td><label for="dieCrack" class="errorGroupLbl" id="dieCrackLbl">Die Cracks</label></td>
                  <td><?php echo	$collection->getDieCrack();?></td>
                  <td valign="middle">
                  <form action="" method="post" class="compactForm">
                    <select name="dieCrackObv" id="dieCrackObv" class="errorGroup">
                      <option value="None" selected="selected"># Of Obverse Cracks</option>
                      <option value="1 Die Crack Obverse">1</option>
                      <option value="2 Die Cracks Obverse">2</option>
                      <option value="3 Die Cracks Obverse">3</option>
                      <option value="4 Die Cracks Obverse">4</option>
                      <option value="5 Die Cracks Obverse">5</option>
                    </select>
                    <select name="dieCrackRev" id="dieCrackRev" class="errorGroup">
                      <option value="None" selected="selected"># Of Reverse Cracks</option>
                      <option value="1 Die Crack Reverse">1</option>
                      <option value="2 Die Cracks Reverse">2</option>
                      <option value="3 Die Cracks Reverse">3</option>
                      <option value="4 Die Cracks Reverse">4</option>
                      <option value="5 Die Cracks Reverse">5</option>
                    </select>
                    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
<input id="dieCrackBtn" name="dieCrackBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
                    </form></td>
                </tr>    
                <tr class="errorsRow">
                  <td><label for="machineDouble" class="errorGroupLbl" id="Lbl">Machine Doubled</label></td>
                  <td><?php echo	$collection->getMachineDouble();?></td>
                  <td valign="middle">
                  <form action="" method="post" class="compactForm">
                  <select name="machineDouble" id="machineDouble" class="errorGroup">
                    <option value="None" selected="selected">Type</option>
                    <option value="Machine Doubled Push Type">Push Type</option>
                    <option value="Machine Doubled Slide Type">Slide Type</option>
                  </select>
                  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
                  <input id="machineDoubleBtn" name="machineDoubleBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
                  </form></td>
                </tr>    
                <tr class="errorsRow">
          <td><label for="strikeThru">Strike Thru</label></td>
          <td><?php echo	$collection->getStrikeThru();?></td>
          <td valign="middle">
          <form action="" method="post" class="compactForm">
          <select name="strikeThru" id="strikeThru" class="errorGroup">
            <option value="None" selected="selected">Type</option>
            <option value="Struck Thru Grease Filled Die">Grease</option>
            <option value="Struck Thru Object">Object</option>
          </select>
          <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
          <input id="strikeThruBtn" name="strikeThruBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
          </form></td>
        </tr>
<tr class="errorsRow">
                  <td><label for="brockage">Brockage</label></td>
                  <td><?php echo	$collection->getBrockage();?></td>
                  <td valign="middle">
                  <form action="" method="post" class="compactForm">
                  <select name="brockage" id="brockage" class="errorGroup">
                    <option value="None" selected="selected">Type</option>
                    <option value="Partial">Partial</option>
                    <option value="Full">Full</option>
                  </select>
                  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
                  <input id="brockageBtn" name="brockageBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
                  </form></td>
                </tr>  
                <tr class="errorsRow">
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td valign="middle">&nbsp;</td>
                </tr>
                <tr class="errorsRow">
                  <td>Planchet Errors</td>
                  <td>&nbsp;</td>
                  <td valign="middle">&nbsp;</td>
                </tr>    
                <tr class="errorsRow">
                  <td><label for="wrongPlanchet" class="errorGroupLbl" id="wrongPlanchetLbl">Wrong Planchet Type</label></td>
                  <td><?php echo	$collection->getWrongPlanchet();?></td>
                  <td valign="middle">
                  <form action="" method="post" class="compactForm">
                  <select name="wrongPlanchet" id="wrongPlanchet" class="errorGroup">
                    <option value="None" selected="selected">Select Denomination</option>
                    <option value="Struck on Small Cent Planchet">Cent Planchet</option>
                    <option value="Struck on Nickel Planchet">Nickel Planchet</option>
                    <option value="Struck on Dime Planchet">Dime Planchet</option>
                    <option value="Struck on Quarter Planchet">Quarter Planchet</option>
                    <option value="Struck on Half Dollar Planchet">Half Dollar Planchet</option>
                    <option value="Struck on Dollar Planchet">Dollar Planchet</option>
                  </select>
                  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
<input id="wrongPlanchetBtn" name="wrongPlanchetBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
                  </form></td>
                </tr>
                <tr class="errorsRow">
                  <td><label for="wrongMetal" class="errorGroupLbl" id="wrongMetalLbl">Wrong Planchet Metal</label></td>
                  <td><?php echo	$collection->getWrongMetal();?></td>
                  <td valign="middle">
                  <form action="" method="post" class="compactForm">
                  <select name="wrongMetal" id="wrongMetal" class="errorGroup">
                    <option value="None" selected="selected">Select Metal</option>
                    <option value="Struck on Gold Planchet">Gold Planchet</option>
                    <option value="Struck on Silver Planchet">Silver Planchet</option>
                    <option value="Struck on Copper Planchet">Copper Planchet</option>
                    <option value="Struck on Steel Planchet">Steel Planchet</option>
                    <option value="Struck on Aluminum Planchet">Aluminum Planchet</option>
                  </select>
                  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
                  <input id="wrongMetalBtn" name="wrongMetalBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
                  </form></td>
                </tr>
                <tr class="errorsRow">
                  <td><label for="blisters">Plating Blisters</label></td>
                  <td><?php echo	$collection->getBlisters();?></td>
                  <td valign="middle">
                  <form action="" method="post" class="compactForm">
                  <select name="blisters" id="blisters" class="errorGroup">
                    <option value="None" selected="selected">Type</option>
                    <option value="Circular Blisters">Circular</option>
                    <option value="Linear Blisters">Linear</option>
                    <option value="Intact Blisters">Intact</option>
                    <option value="Ruptured Blisters">Ruptured</option>
                  </select>
                  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
<input id="blistersBtn" name="blistersBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
                  </form></td>
                </tr>
                <tr class="errorsRow">
                  <td><label for="plating">Plating Error</label></td>
                  <td><?php echo	$collection->getPlating();?></td>
                  <td valign="middle">
                  <form action="" method="post" class="compactForm">
                  <select name="plating" id="plating" class="errorGroup">
                    <option value="None" selected="selected">Type</option>
                    <option value="Unplated">Unplated</option>
                    <option value="Partially Plated ">Partially Plated </option>
                    <option value="Split Plating">Split / Peeling</option>
                    <option value="Brassy Plating">Brassy plating</option>
                  </select>
                  <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID) ?>" />
                  <input id="platingBtn" name="platingBtn" type="submit" value="Update Error" onclick="return confirm('Set Error?');" />
                  </form></td>
                </tr>
                <tr class="errorsRow">
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td valign="middle">&nbsp;</td>
                </tr>
                <tr class="errorsRow">
                  <td><span class="compactForm">
                    
                  </span></td>
                  <td>&nbsp;</td>
                  <td valign="middle">&nbsp;</td>
                </tr>    
    </table>
</form>


<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>