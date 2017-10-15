<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['coinID'])) { 
$coinID = intval($_GET['coinID']);
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

<h1><a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a> Errors</h1>

<h1><img src="../img/<?php echo str_replace(' ', '_', $coin->getCoinVersion()); ?>.jpg" alt="11" width="100" height="100" align="absmiddle" /> <?php echo $coinName; ?> </h1>
<h3><a href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1" class="brownLink"><?php echo $coinType ?></a>  |  <a href="viewSetYear.php?year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink"><?php echo substr($coin->getCoinName(), 0, 4); ?> Date Set</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear(); ?>" class="brownLink"><?php echo $coin->getCoinYear(); ?> Mint Marks</a> | <a href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&amp;year=<?php echo substr($coin->getCoinName(), 0, 4); ?>" class="brownLink">All Mint Marks</a> | <a href="<?php echo $categoryLink ?>.php" class="brownLink"><?php echo $coinCategory ?></a></h3>

<?php include ("../inc/pageElements/coinLinks.php");?>

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