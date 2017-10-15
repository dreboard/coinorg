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



if (isset($_POST["vamBtn"])) { 
$collectionID = $Encryption->decode($_POST["ID"]);
$vam = $collection->processVamNum($_POST["vam1"], $_POST["vam2"], $_POST["vam3"]);
mysql_query("UPDATE collection SET vam = '$vam' WHERE collectionID = '$collectionID' AND userID = '$userID'") or die(mysql_error()); 
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


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
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
#addCoinFormBtn {font-size:20px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<span><?php echo $_SESSION['message']; ?></span>

<h1><a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a></h1>

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
    <td class="tdHeight"><?php echo $coinGrade ?>
    
    
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
<p>&nbsp;</p>

<h4>Edit Error Details</h4>
<table width="979" border="0" cellpadding="2" class="addCoinTbl" id="errorDetailsDiv">


  <tr class="errorsRow">
    <td width="23%"> <label for="offPercent" id="offPercentLbl" class="errorGroupLbl">Off Center </label>&nbsp;</td>
    <td width="74%" valign="middle">&nbsp;</td>
    </tr>
    <tr class="errorsRow">
      <td><label for="multipleStrike" id="multipleStrikeLbl" class="errorGroupLbl">Multiple Strikes</label></td>
    <td valign="middle">&nbsp;</td>
  </tr>
    <tr class="errorsRow">
      <td>&nbsp;</td>
      <td valign="middle">&nbsp;</td>
    </tr>
   <tr class="errorsRow">
     <td width="23%"> <label for="broadstrike" id="broadstrikeLbl" class="errorGroupLbl">Broadstrike</label>
      &nbsp;</td>
    <td width="74%" valign="middle">&nbsp;</td>
    </tr>
  <tr class="errorsRow">
    <td><label for="partialCollar" id="partialCollarLbl" class="errorGroupLbl">Partial Collar</label></td>
    <td valign="middle">&nbsp;</td>
    </tr>

  <tr class="errorsRow">
    <td width="23%"> <label for="bondedPlanchets" id="bondedPlanchetsLbl" class="errorGroupLbl">Bonded Planchets</label>
      &nbsp;</td>
    <td width="74%" valign="middle">&nbsp;</td>
    </tr>
 <tr class="errorsRow">
   <td><label for="matedPair" class="errorGroupLbl" id="matedPairLbl">Mated Pair Type</label>
     &nbsp;</td>
    <td valign="middle">&nbsp;</td>
    </tr>

<tr class="errorsRow">
  <td width="23%"> <label for="doubleDenom" class="errorGroupLbl" id="doubleDenomLbl">Double Denomination</label>&nbsp;</td>
    <td width="74%" valign="middle">&nbsp;</td>
    </tr>
    <tr class="errorsRow">
      <td width="23%"> <label for="indentPercent" id="indentPercentLbl" class="errorGroupLbl">Indent </label>&nbsp;</td>
    <td width="74%" valign="middle">&nbsp;</td>
    </tr>
        <tr class="errorsRow">
          <td width="23%"><label for="clippedPlanchet" id="clippedPlanchetLbl" class="errorGroupLbl">Clipped Planchet </label>
            &nbsp;</td>
          <td valign="middle">&nbsp;</td>
        </tr>
        <tr class="errorsRow">
          <td><label for="mule" class="errorGroupLbl" id="muleLbl">Mule</label></td>
          <td valign="middle">&nbsp;</td>
        </tr>
        <tr class="errorsRow">
          <td><label for="rotated" class="errorGroupLbl" id="rotatedLbl">Rotated Die</label></td>
          <td valign="middle">&nbsp;</td>
        </tr>    
                <tr class="errorsRow">
                  <td><label for="dieCrack" class="errorGroupLbl" id="dieCrackLbl">Die Cracks</label></td>
                  <td valign="middle">&nbsp;</td>
                </tr>    
                <tr class="errorsRow">
                  <td><label for="machineDouble" class="errorGroupLbl" id="Lbl">Machine Doubled</label></td>
                  <td valign="middle">&nbsp;</td>
                </tr>    
                <tr class="errorsRow">
          <td><label for="strikeThru">Strike Thru</label></td>
          <td valign="middle">&nbsp;</td>
        </tr>
                <tr class="errorsRow">
                  <td><label for="brockage">Brockage</label></td>
                  <td valign="middle">&nbsp;</td>
                </tr>
                <tr class="errorsRow">
                  <td>&nbsp;</td>
                  <td valign="middle">&nbsp;</td>
                </tr>    
                <tr class="errorsRow">
                  <td>Planchet Errors</td>
                  <td valign="middle">&nbsp;</td>
                </tr>    
                <tr class="errorsRow">
                  <td><label for="wrongPlanchet" class="errorGroupLbl" id="wrongPlanchetLbl">Wrong Planchet Type</label></td>
                  <td valign="middle">&nbsp;</td>
                </tr>
                <tr class="errorsRow">
                  <td><label for="wrongMetal" class="errorGroupLbl" id="wrongMetalLbl">Wrong Planchet Metal</label></td>
                  <td valign="middle">&nbsp;</td>
                </tr>
                <tr class="errorsRow">
                  <td>&nbsp;</td>
                  <td valign="middle">&nbsp;</td>
                </tr>    
                <tr class="errorsRow">
                  <td>&nbsp;</td>
                  <td valign="middle">&nbsp;</td>
                </tr>    
</table>


<p>&nbsp;</p>
<p><a class="topLink" href="#top">Top</a></p>
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>