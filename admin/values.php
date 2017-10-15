<?php 
include '../inc/config.php';

if (isset($_GET["coinID"])) { 
$coinID = intval($_GET["coinID"]);
$coin->getCoinById($coinID);
$coinType = $coin->getCoinType();

}

  $G4 =  '0.00';
  $VG8 =  '0.00';
  $F12 =  '0.00';
  $VF20 =  '0.00';
  $EF40 =  '0.00';
  $AU50 =  '0.00';
  $MS60 =  '0.00';
  $MS63 =  '0.00';
  $MS65 =  '0.00';
  $PR63 =  '0.00';
  $PR65 = '0.00';
$updateMsg = '';
if (isset($_GET["coinID2"])) { 
$coinID = intval($_GET["coinID"]);
$pennyQuery = mysql_query("SELECT * FROM coins WHERE coinID = '$coinID'") or die(mysql_error());
while($row = mysql_fetch_array($pennyQuery))
  {
  $coinType = $row['coinType'];
  $coinCategory = $row['coinCategory'];
  $coinName = $row['coinName'];
  $mintage = $row['mintage'];
  $additional = $row['additional'];
  $coinID = $row['coinID'];
  $collection = $row['collection'];
  $linkName = str_replace(' ', '_', $coinType);
  $G4 = $row['G4'];
  $VG8 = $row['VG8'];
  $F12 = $row['F12'];
  $VF20 = $row['VF20'];
  $EF40 = $row['EF40'];  
  $AU50 = $row['AU50'];
  $MS60 = $row['MS60'];
  $MS63 = $row['MS63'];
  $MS65 = $row['MS65'];
  $PR63 = $row['PR63'];
  $PR65 = $row['PR65'];  

  if($collection == 0){
	  $have = 'No, <a href="javascript:void(0)" class="addCoinLink">Add This Coin</a>';
	  $auctionLink = '';
  } else {
	  $have = 'Yes, (0) <a href="javascript:void(0)" class="addCoinLink">Add Another</a>';
	  $auctionLink = '<a href="ebayTemplate.php?coinID=$coinID">Prepare for Auction</a>';
  }
  $image = $coinCategory.'s';
  }
}


if (isset($_POST["updateCoinValBtn"])) { 
$coinID = intval($_POST["coinID"]);
  $G4 = floatval($_POST['G4']);
  $VG8 = floatval($_POST['VG8']);
  $F12 = floatval($_POST['F12']);
  $VF20 = floatval($_POST['VF20']);
  $EF40 = floatval($_POST['EF40']);  
  $AU50 = floatval($_POST['AU50']);
  $MS60 = floatval($_POST['MS60']);
  $MS63 = floatval($_POST['MS63']);
  $MS65 = floatval($_POST['MS65']);
  $PR63 = floatval($_POST['PR63']);
  $PR65 = floatval($_POST['PR65']);  
  $coinName = $_POST['name'];
$coinUpdate = mysql_query("UPDATE coins SET G4 = '$G4', VG8 = '$VG8', F12 = '$F12', VF20 = '$VF20', EF40 = '$EF40', AU50 = '$AU50', MS60 = '$MS60', MS63 = '$MS63',  MS65 = '$MS65', PR63 = '$PR63', PR65 = '$PR65' WHERE coinID = '$coinID'") or die(mysql_error());
  if($coinUpdate){
	  $updateMsg = 'Values Updated for ' . $coinName;
  } else {
	  $updateMsg = 'Error, values not updated';
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	

/*$("#valueInpBtn").click(function () {
      $(".valueInp").each(function(){
        $(this).val ("");
      });
});

$(".valueInp").each(function(){
$(this).focus(function() {
		$(this).val("");
   });
});*/

$("#passRecoverForm").submit(function() {
      if ($("#recoverEmail").val() == "") {
		$("#recoverEmail").addClass("errorInput");
        $("#note2").text("Need email address...").addClass('errorTxt');
        return false;
      }else {
	 $('#passRecoverFormBtn').val("Accessing Account.....");	  
	  return true;
	  }
});


});
</script>  


<style type="text/css">

#menuList {float:left;}
#menuList li {list-style-type:none; font-size:1.4em; padding:10px; width:110px;}

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Current Stored Values for </h1>

<h3><?php echo $coin->getCoinName(). " " . $coin->getCoinType() ?></h3>
<p><?php echo $updateMsg ?></p>
<form id="priceListForm" action="" method="post">

<table width="900" border="0" id="priceListTbl">
  <tr class="darker">
    <td id="g4">G-4</td>
    <td id="vg8">VG-8</td>
    <td id="f12">F-12</td>
    <td id="vf20">VF-20</td>
    <td id="ef40">EF-40</td>
    <td id="au50">AU-50</td>
    <td id="ms60">MS-60</td>
    <td id="ms63">MS-63</td>
    <td id="ms65">MS-65</td>
    <td id="pr63">PR63</td>
    <td id="pr65">PR65</td>
  </tr>
  <tr>
    <td><input id="g4Txt" name="G4" type="text" value="<?php echo $coin->getG4() ?>" class="valueInp" /></td>
    <td><input id="vg8Txt" name="VG8" type="text" value="<?php echo $coin->getVG8() ?>" class="valueInp"  /></td>
    <td><input id="f12Txt" name="F12" type="text" value="<?php echo $coin->getF12() ?>" class="valueInp" /></td>
    <td><input id="vf20Txt" name="VF20" type="text" value="<?php echo $coin->getVF20() ?>" class="valueInp" /></td>
    <td><input id="ef40Txt" name="EF40" type="text" value="<?php echo $coin->getEF40() ?>" class="valueInp" /></td>
    <td><input id="au50Txt" name="AU50" type="text" value="<?php echo $coin->getAU50() ?>" class="valueInp" /></td>
    <td><input id="ms60Txt" name="MS60" type="text" value="<?php echo $coin->getMS60() ?>" class="valueInp" /></td>
    <td><input id="ms63Txt" name="MS63" type="text" value="<?php echo $coin->getMS63() ?>" class="valueInp" /></td>
    <td><input id="ms65Txt" name="MS65" type="text" value="<?php echo $coin->getMS65() ?>" class="valueInp" /></td>
    <td><input id="pr63Txt" name="PR63" type="text" value="<?php echo $coin->getPR63() ?>" class="valueInp"  /></td>
    <td><input id="pr65Txt" name="PR65" type="text" value="<?php echo $coin->getPR65() ?>" class="valueInp" /></td>
  </tr>
</table>
<input name="coinID" type="hidden" value="<?php echo $coin->getCoinID(); ?>" />
<input name="updateCoinValBtn" id="updateCoinValBtn" type="submit" value="Update Coin Value" />
<input type="reset" name="Reset" id=" valueInpBtn" value="Clear Values">
</form>
<div id="viewListLinks"><?php include("viewListLinks.php"); ?></div>
<p><a href="viewList.php?coinType=<?php echo $coinType; ?>&amp;page=1">Back to <?php echo $coinType; ?> list </a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>