<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){	


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//HALF CENT OPERATIONS

/*$("#halfCentCoinType").change(function() {
$(this).find("option:selected").each(function(){
	//$("#bagTypeCoinCategory").val($(this).parent().attr("label"));
	$('#Half_CentFormImg').attr("src","../img/"+$(this).attr("value")+".jpg");
	//alert($(this).attr("value"));
});
});	*/

$("#halfCentCoinType").change(function() {
var dataString = $(this).val();

$.ajax({url:"../inc/functions/addRawFunctions.php?coinType="+dataString, success:function(result){
$("#halfCentCoinName").html(result);
}});

$.ajax({url:"../inc/functions/addRawPage.php?coinType="+dataString, success:function(result){
$("#halfCentYears").html(result);
}});

$(this).find("option:selected").each(function(){
	$('#Half_CentFormImg').attr("src","../img/"+$(this).attr("value")+"_both.jpg");
});
});	
$("#halfCentFormBtn").val("Add "+dataString);


	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Select Mixed Coin Type</h1>
<table width="100%" border="0" align="center" id="rawTypeTbl">

  <tr align="center">
    <td><a href="addRollsMixedSmallCent.php"><img src="../img/Union_Shield.jpg" class="newImg" id="Union_Shield" /></a></td>
    <td><a href="addRollsMixedNickel.php"><img src="../img/Indian_Head_Nickel.jpg" width="250" height="250" /></a></td>
    <td><a href="addRollsMixedDime.php"><img src="../img/Winged_Liberty_Dime.jpg" width="250" height="250" /></a></td>
    <td><a href="addRollsMixedQuarter.php"><img src="../img/Standing_Liberty.jpg" width="250" height="250" /></a></td>
    <td><a href="addRollsMixedHalf_Dollar.php"><img src="../img/Walking_Liberty.jpg" width="250" height="250" /></a></td>
    <td><a href="addRollsMixedDollarChoose.php"><img src="../img/Morgan_Dollar.jpg" width="250" height="250" /></a></td>
  </tr>
  <tr align="center">
    <th scope="col"><a href="addRollsMixed.php?coinCategory=Small_Cent">Small Cents</a></th>
    <th scope="col"><a href="addRollsMixed.php?coinCategory=Nickel">Nickels</a></th>
    <th scope="col"><a href="addRollsMixed.php?coinCategory=Dime">Dimes</a></th>
    <th scope="col"><a href="addRollsMixed.php?coinCategory=Quarter">Quarters</a></th>
    <th scope="col"><a href="addRollsMixed.php?coinCategory=Half_Dollar">Half Dollars</a></th>
    <th scope="col"><a href="addRollsMixed.php?coinCategory=Dollar">Large Dollars</a></th>
  </tr>
  <tr align="center">
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">Small Dollars</th>
  </tr>
</table>
 <div class="spacer"></div>
<p><a href="addRollType.php">Back to Type of Roll</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
