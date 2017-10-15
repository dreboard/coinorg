<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

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
//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) { 
if(!$collection->deleteCoinAndImages($Encryption->decode($_POST["ID"]), $userID)){
     $_SESSION['message'] = '<span class="errorTxt">Coin Not Deleted</span>';
} else {
	header("location: viewCoin.php?coinID=".$collection->getThisCoinsCoinID($Encryption->decode($_POST["ID"]), $userID)."");
     exit();
  }
}


if (isset($_POST["certRemoveBtn"])) { 
$collectionID = mysql_real_escape_string($Encryption->decode($_POST["certCoinID"]));
mysql_query("UPDATE collection SET certlist = '0' WHERE collectionID = '$collectionID' AND userID = '$userID' ") or die(mysql_error());
$_SESSION['message'] = '<span class="greenLink">Coin List Updated</span>';
header('Location: viewCoinDetail.php?ID='.$Encryption->encode($collectionID).'');
exit();
}

if(isset($_POST['varietyBtn'])){
////////VARIETIES
$ddo = mysql_real_escape_string($_POST["ddo"]);
$ddr = mysql_real_escape_string($_POST["ddr"]);
$rpm = mysql_real_escape_string($_POST["rpm"]);
$omm = mysql_real_escape_string($_POST["omm"]);
$mms = mysql_real_escape_string($_POST["mms"]);
$odv = mysql_real_escape_string($_POST["odv"]);
$rdv = mysql_real_escape_string($_POST["rdv"]);
$red = mysql_real_escape_string($_POST["red"]);
$imm = mysql_real_escape_string($_POST["imm"]);
$dmr = mysql_real_escape_string($_POST["dmr"]);
$mdo = mysql_real_escape_string($_POST["mdo"]);
$mdr = mysql_real_escape_string($_POST["mdr"]);
$rpd = mysql_real_escape_string($_POST["rpd"]);

if($ddo !== 'None' || $ddr !== 'None' || $rpm !== 'None' || $omm !== 'None' || $mms !== 'None' || $odv !== 'None' || $rdv !== 'None' || $red !== 'None' || $imm !== 'None' || $dmr !== 'None' || $mdo !== 'None' || $mdr !== 'None' || $rpd !== 'None'){
	$varietyCoin = '1';	
} else {
	$varietyCoin = $coin->getVarietyCoin();
}

$trailDieStrength = mysql_real_escape_string($_POST["trailDieStrength"]);
$trailDieNumber = mysql_real_escape_string($_POST["trailDieNumber"]);
$trailDieDirection = mysql_real_escape_string($_POST["trailDieDirection"]);
$trailDieDeviation = mysql_real_escape_string($_POST["trailDieDeviation"]);

if($trailDieStrength !== 'None' || $trailDieNumber !== 'None' || $trailDieDirection !== 'None' || $trailDieDeviation !== 'None'){
	$trailDie = '1';	
} else {
	$trailDie = '0';
}	
////////REFERENCE
$FSDenom = $coin->getFSDenom($coinType, $coinCategory);

if($_POST["fs1"] !== 'None'){
$fsNum = mysql_real_escape_string($_POST["fs1"]).mysql_real_escape_string($_POST["fs2"]).mysql_real_escape_string($_POST["fs3"]);
} else {
	$fsNum = 'None';
}

if($_POST["wileyBugert"] !== 'None'){
$wileyBugert = mysql_real_escape_string($_POST["wileyBugert"]).$collection->addPeriodToReferenceNum($_POST["wileyBugert2"]);
} else {
	$wileyBugert = 'None';
}

$sheldon = trim(mysql_real_escape_string($_POST["sheldon"]).mysql_real_escape_string($_POST["sheldon2"]));
$newcomb = trim(mysql_real_escape_string($_POST["newcomb"]).mysql_real_escape_string($_POST["newcomb2"]));
$snow = mysql_real_escape_string($_POST["snow"]);
$fortin = trim(mysql_real_escape_string($_POST["fortin"]).mysql_real_escape_string($_POST["fortin2"]));

if (in_array($coin->getCoinType(), $vamTypes)) {
	$vam = $collection->processVamNum($_POST["vam1"], $_POST["vam2"], $_POST["vam3"]);
} else {
	$vam = 'None';
}
	
}

if(isset($_POST['errorBtn'])){
////////ERRORS
$offCenter = mysql_real_escape_string($_POST["offCenter"]);
$multipleStrike = mysql_real_escape_string($_POST["multipleStrike"]);
$secondStrike = mysql_real_escape_string($_POST["secondStrike"]);
$broadstrike = mysql_real_escape_string($_POST["broadstrike"]);
$partialCollar = mysql_real_escape_string($_POST["partialCollar"]);
$bondedPlanchets = mysql_real_escape_string($_POST["bondedPlanchets"]);
$matedPair = mysql_real_escape_string($_POST["matedPair"]);
$doubleDenom = mysql_real_escape_string($_POST["doubleDenom"]);
$indentPercent = mysql_real_escape_string($_POST["indentPercent"]);
$clippedPlanchet = mysql_real_escape_string($_POST["clippedPlanchet"]);
$mule = mysql_real_escape_string($_POST["mule"]);
$rotated = mysql_real_escape_string($_POST["rotated"]);
$dieCrack = mysql_real_escape_string($_POST["dieCrack"]);
$machineDouble = mysql_real_escape_string($_POST["machineDouble"]);
$strikeThru = mysql_real_escape_string($_POST["strikeThru"]);
$wrongPlanchet = mysql_real_escape_string($_POST["wrongPlanchet"]);
$wrongMetal = mysql_real_escape_string($_POST["wrongMetal"]);
$blisters = mysql_real_escape_string($_POST["wrongMetal"]);
$plating = mysql_real_escape_string($_POST["wrongMetal"]);
if($offCenter !== 'None' || $multipleStrike !== 'None' || $secondStrike !== 'None' || $broadstrike !== 'None' || $partialCollar !== 'None' || $bondedPlanchets !== 'None' || $matedPair !== 'None' || $doubleDenom !== 'None' || $indentPercent !== 'None' || $clippedPlanchet !== 'None' || $mule !== 'None' || $rotated !== 'None' || $dieCrack !== 'None' || $machineDouble !== 'None' || $strikeThru !== 'None' || $wrongPlanchet !== 'None' || $wrongMetal !== 'None'){
	$errorCoin = '1';
} else {
	$errorCoin = '0';
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
<title><?php echo $coinName ?></title>
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






});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span><?php echo $_SESSION['message']; ?></span>

<table width="100%" border="0">
  <tr>
    <td colspan="2"><h1 class="tblH1"><a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a></h1></td>
  </tr>
  <tr>
    <td width="9%" class="darker">Nickname:</td>
    <td width="91%" class="brownLink"><?php echo $collection->getCoinNickname(); ?></td>
  </tr>
  <tr>
    <td width="9%" class="darker">Variety:</td>
    <td width="91%" class="brownLink"><?php echo $collection->getVarietyForCoin(intval($collectionID)); ?></td>
  </tr>
  <tr>
    <td class="darker">Errors:</td>
    <td class="brownLink"><?php echo $Errors->getErrorForCoin(intval($collectionID)); ?></td>
  </tr>
</table>
<hr />
<table width="930" id="viewTbl">
  <tr>
    <td width="157" rowspan="12" valign="top"><a href="viewListReport.php?coinType=<?php echo $coinType ?>&amp;page=1"><?php echo '<img src="../img/'.$coinVersion.'.jpg" width="150" height="150" />'; ?></a></td>
    <td class="tdHeight"><strong>Category:</strong></td>
    <td class="tdHeight"><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td width="162" class="tdHeight"><span class="darker">Type: </span></td>
<td width="575" class="tdHeight"><a href="viewListReport.php?coinType=<?php echo $coinLink ?>"><?php echo $coinType ?></a></td>
<td width="16"></td>
</tr>
  <tr>
    <td class="tdHeight"><strong>Year:</strong></td>
    <td class="tdHeight"><a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear() ?>"><?php echo $coin->getCoinYear() ?></a></td>
    <td></td>
  </tr>
  <tr>
    <td class="tdHeight"><strong>Grade:</strong></td>
    <td class="tdHeight"><?php echo $coinGrade ?><?php echo $collection->getCoinAttribute($collectionID, $userID); ?>
    
    
    </td>
    <td></td>
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
    <td></td>
  </tr>
<tr>
<td class="tdHeight"><span class="darker">Purchase Date: </span></td>
<td class="tdHeight"><?php echo date("F j, Y",strtotime($collection->getCoinDate())); ?></td>
<td rowspan="7" valign="top">
  
</td>
  </tr>
<tr>
  <td class="tdHeight"><strong>Purchase Price:</strong></td>
  <td class="tdHeight">$<?php echo $collection->getCoinPrice(); ?></td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
      </td>
    </tr>
</table>
<?php include('../inc/pageElements/viewCoinLinks.php'); ?>

<hr />
<p><?php echo $collection->getCoinNote(); ?></p>
<h3>Additional Details</h3>

<table width="499">
<?php 
if($collection->getCollectionFolder() == '0' && $collection->getCollectionRoll() == '0' && $collection->getCollectionSet() == '0') {
?>

 <?php } else if($collection->getCollectionFolder() != '0') { 
 $collectionFolder->getCollectionFolderById($collection->getCollectionFolder())
 ?>
	  <tr>
    <td width="28%" class="darker">Folder:</td>
    <td width="72%">
	<a href="viewFolderDetail.php?ID=<?php echo $Encryption->encode($collection->getCollectionFolder()) ?>" title="<?php echo $collectionFolder->getFolderNickname() ?>"><?php echo $collectionFolder->getFolderNickname(); ?></a>  
    </td>
  </tr>				
 <?php } else if($collection->getCollectionRoll() != '0') { 

 ?>
  <tr>
    <td width="28%" class="darker">Roll:</td>
    <td width="72%"><?php echo $collectionRolls->getRollTypeLink($collection->getCollectionRoll()); ?></td>
  </tr>
  <?php } else if($collection->getCollectionSet() != '0') { 
 $CollectionSet->getCollectionSetById($collection->getCollectionSet())
 ?> 

  <tr>
    <td><strong>Set: </strong></td>
    <td><?php echo $collection->getSetHolderNumber($collectionID, $userID) ?></td>
  </tr>
<?php } else { echo '';}?>
</table>
<br />

  <?php if($proService !== 'None'){ ?>
      <table width="50%" border="0">
  <tr>
    <td width="28%"><strong>Slab Label:</strong></td>
    <td width="72%"><?php echo $collection->getSlabLabel(); ?></td>
  </tr>
  <tr>
    <td><strong>Designation:</strong></td>
    <td><?php echo $collection->getDesignation(); ?></td>
  </tr>
  <tr>
    <td><strong>Slab Condition:</strong></td>
    <td><?php echo $collection->getSlabCondition(); ?></td>
  </tr>
  <tr>
    <td><strong>Problem:</strong></td>
    <td><?php echo $collection->getProblem(); ?></td>
  </tr>
  </table>
  <?php  } else { echo '';}?>



<hr />
<?php if ($collection->getGrader() == 'PCGS'){ ?>

<div id="wantedCoinsDiv">

<?php if ($collection->getSetReg() != '0'){ ?>

<form class="compactForm" method="post" action="" id="addRegForm">
<input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>" />
<img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="30" height="30" align="absmiddle" /> <input name="addRegBtn" id="addRegBtn" type="submit" value="Add to Registry List" />
</form>
<br />

</div>
<hr />

<?php } else {
	echo '';
}  ?>


<?php } else {
	echo '';
}  ?>


<div class="floatLeft">
<table width="995" border="0" class="floatLeft">
  <tr>
    <td><h3>Reference</h3></td>
    <td><a href="viewCoinVariety.php?ID=<?php echo $_GET['ID'] ?>">Update/Edit</a></td>
    </tr>
  <tr>
    <td width="18%"><strong>Errors</strong></td>
    <td width="82%"><?php if($Errors->getErrorForCoin(intval($collectionID)) == false){
		echo 'None';
	} else {
		echo $Errors->getErrorForCoin(intval($collectionID));
	}?>
      
    </td>
    </tr>
  <tr>
    <td><strong>Varieties</strong></td>
    <td><?php if($collection->getVarietyForCoin(intval($collectionID)) == false){
		echo 'None';
	} else {
		echo $collection->getVarietyForCoin(intval($collectionID));
	}?></td>
    </tr>
  <tr>
    <td><strong>Van Allen / Mallis</strong></td>
    <td><?php echo $collection->getVam(); ?></td>
    </tr>
  <tr>
    <td><strong>Fivaz-Stanton</strong></td>
    <td><?php echo $collection->getFsNum(); ?></td>
    </tr>
  <tr>
    <td><strong>Sheldon</strong></td>
    <td><?php echo $collection->getSheldon(); ?></td>
    </tr>
  <tr>
    <td><strong>Newcomb</strong></td>
    <td><?php echo $collection->getNewcomb(); ?></td>
    </tr>
  <tr>
    <td><strong>Wiley-Bugert</strong></td>
    <td><?php echo $collection->getWileyBugert(); ?></td>
    </tr>
  <tr>
    <td><strong>Snow</strong></td>
    <td><?php echo $collection->getSnow(); ?></td>
    </tr>
  <tr>
    <td><strong>Fortin</strong></td>
    <td><?php echo $collection->getFortin(); ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>                 
</table>
</div>


<?php if (in_array($collection->getCoinType(), $trailTypes)) {?>
<table width="400" border="0" cellpadding="3" id="wexlerTbl">
<tr>
    <td width="200"><h3> Trail Dies</h3></td>
    <td width="260"><a href="viewCoinVariety.php?ID=<?php echo $_GET['ID'] ?>">Update/Edit</a></td>
  </tr>
<tr>
  <td><label for="trailDieStrength">Strength</label></td>
  <td><?php echo $collection->getTrailDieStrength(); ?></td>
</tr>
<tr>
  <td><label for="trailDieDeviation">Step Deviation</label></td>
  <td><?php echo $collection->getTrailDieDeviation(); ?></td>
</tr>
<tr>
  <td><label for="trailDieNumber">Number</label></td>
  <td><?php echo $collection->getTrailDieNumber(); ?></td>
</tr>
<tr>
  <td><label for="trailDieDirection">Offset Direction</label></td>
  <td><?php echo $collection->getTrailDieDirection(); ?></td>
</tr>
<tr>
  <td colspan="2"><a href="#" class="brownLink">View Full Trail Die Report</a></td>
  </tr>
  </table>
  <?php } else { echo ''; }  ?>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>