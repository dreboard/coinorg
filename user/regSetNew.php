<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


//////////ADD COIN
if (isset($_POST["addSetRegBtn"])) { 
$setregName = mysql_real_escape_string($_POST["setregName"]);
$coinType = mysql_real_escape_string($_POST["coinType"]);
$CoinTypes->getCoinByType($coinType);

mysql_query("INSERT INTO setreg(setregName, coinType, coinCategory, setregDate, userID) VALUES('$setregName', '$coinType', '".$CoinTypes->getCoinCategory()."', '$theDate', '$userID')") or die(mysql_error()); 
$setregID = mysql_insert_id();


header("location: regSetDetail.php?ID=".$Encryption->encode($setregID)."");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Create Set Registry</title>
 <script type="text/javascript">
$(document).ready(function(){	

$("#addSetRegForm").submit(function() {
      if($("#setregName").val() == "")  {
		$("#errorMsg").text("Name your set.");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#setregName").addClass("errorInput");
      return false;
      }else {
	  return true;
	  }
});

});
</script> 
<style type="text/css">
#clientTbl_filter input {text-align:right; margin-right:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
  <h1>Add New Set Registry</h1>
 <div id="CoinList">
<p class="darker">Recently Added Sets &nbsp;| &nbsp; <a href="regSet.php" class="brownLink">View All Sets</a></p>

<table width="100%" border="0" id="clientTbl" class="coinTbl">
  <tr class="darker">
    <td width="51%" height="24">Set Name</td>  
    <td width="10%" align="center">Category</td>
    <td width="14%" align="right">Coins</td>
  </tr>
<?php
$countAll = mysql_query("SELECT * FROM setreg WHERE userID = '$userID' ORDER BY setregID DESC LIMIT 5") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
    <td>No Saved Sets</td>
	<td></td>
	<td></td>	   
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $setregID = intval($row['setregID']);
  $SetRegistry->getSetRegById($setregID);
  echo '
    <tr>
    <td>'.$SetRegistry->getSetregName().'</td>
	<td align="center">'.$SetRegistry->getCoinType().'</td>
	<td align="center"></td>	   
  </tr>
  ';
	  }
}
?>

</table>
</div>
<hr />

<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<div class="roundedWhite">

<form action="" method="post" enctype="multipart/form-data" name="addSetRegForm" id="addSetRegForm">
  <table width="979" border="0" class="priceListTbl">

  <tr>
    <td class="darker">Set Name</td>
    <td colspan="4"><input name="setregName" type="text" id="setregName" size="70" maxlength="70" /></td>
  </tr>
  <tr>
    <td class="darker">Coin Type</td>
    <td colspan="4"><select name="coinType" id="coinType">
      <option selected="selected" value="">Select Type...</option>
      <optgroup label="Cents">
        <option value="Flying Eagle">Flying Eagle</option>
        <option value="Indian Head">Indian Head</option>
        <option value="Lincoln Wheat">Lincoln Wheat</option>
        <option value="Lincoln Memorial">Lincoln Memorial</option>
        <option value="Lincoln Bicentennial">Lincoln Bicentennial</option>
        <option value="Union Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Nickels/Half Dimes">
        <option value="Shield_Nickel">Shield_Nickel</option>
        <option value="Liberty_Head">Liberty Head</option>
        <option value="Lincoln_Wheat">Classic Head Half Cent</option>
        <option value="Lincoln_Memorial">Braided Hair Half Cent</option>
        <option value="Lincoln_Bicentennial">Lincoln Bicentennial Series</option>
        <option value="Union_Shield">Union Shield</option>
        </optgroup>
      <optgroup label="Dimes">
        <option value="Drapped_Bust_Dime">Drapped Bust Dime</option>
        <option value="Liberty_Cap_Dime">Liberty Cap Dime</option>
        <option value="Seated_Liberty_Dime">Liberty Seated Dime</option>
        <option value="Barber_Dime">Barber Dime</option>
        <option value="Winged_Liberty_Dime">Winged Liberty Dime</option>
        <option value="Roosevelt_Dime">Roosevelt Dime</option>
        </optgroup>
      <optgroup label="Quarters">
        <option value="Draped_Bust_Quarter">Draped Bust Quarter</option>
        <option value="Capped_Bust_Quarter">Capped Bust Quarter</option>
        <option value="Liberty_Seated_Quarter">Liberty Seated Quarter</option>
        <option value="Barber_Quarter">Barber Quarter</option>
        <option value="Standing_Liberty">Standing Liberty</option>
        <option value="Washington_Quarter">Washington Quarter</option>
        <option value="State Quarter">State Quarter</option>
        <option value="District_of_Columbia_and_US_Territories">D.C. and U. S. Territories</option>
        <option value="America the Beautiful Quarter">America the Beautiful Quarter</option>
        </optgroup>
      <optgroup label="Half Dollars">
        <option value="Flowing_Hair_Half_Dollar">Flowing Hair Half</option>
        <option value="Draped_Bust_Half_Dollar">Draped Bust Half</option>
        <option value="Liberty_Cap_Half_Dollar">Liberty Cap Half</option>
        <option value="Seated_Liberty_Half_Dollar">Seated Liberty Half</option>
        <option value="Barber_Half_Dollar">Barber Half</option>
        <option value="Walking_Liberty">Walking Liberty Half</option>
        <option value="Franklin_Half_Dollar">Franklin Half</option>
        <option value="Kennedy_Half_Dollar">Kennedy Half</option>
        </optgroup>
      <optgroup label="Dollars">
        <option value="Flowing_Hair_Dollar">Flowing Hair Dollar</option>
        <option value="Draped_Bust_Dollar">Draped Bust Dollar</option>
        <option value="Gobrecht_Dollar">Gobrecht Dollar</option>
        <option value="Seated_Liberty_Dollar">Seated Liberty Dollar</option>
        <option value="Trade_Dollar">Trade Dollar</option>
        <option value="Morgan_Dollar">Morgan Dollar</option>
        <option value="Peace_Dollar">Peace Dollar</option>
        <option value="Eisenhower_Dollar">Eisenhower Dollar</option>
        <option value="Susan_B_Anthony_Dollar">Susan B. Anthony</option>
        <option value="Sacagawea_Dollar">Sacagawea/Native American</option>
        <option value="Presidential_Dollar">Presidential Dollar</option>
        </optgroup>
    </select></td>
  </tr>  
  <tr>
    <td class="darker">Description</td>
    <td colspan="4"><textarea name="setRegDesc" id="setRegDesc" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td class="darker"><input type="submit" name="addSetRegBtn" id="addSetRegBtn" value="Add Collection" /></td>
    <td colspan="4">&nbsp;</td>
  </tr>
  
  </table>
</form>
</div>
<div class="spacer"></div>
 <p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>