<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Inventory Control</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h2>Set Inventory Control Options</h2>

<div>

<form action="" method="post" enctype="multipart/form-data" name="addCentForm" id="addCentForm">
  <table width="979" border="0" class="addCoinTbl">

  <tr>
    <td><label for="setNickname">Set Control Prefix</label></td>
    <td colspan="3"><input name="setNickname" type="text" id="setNickname" value="" size="50" maxlength="50" /></td>
    <td width="397"><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span></td>
  </tr>
    
  <tr>
    <td><label for="barCode">Create Barcode</label></td>
    <td colspan="4" valign="top"><select name="barCode" id="barCode">
      <option value="Yes" selected="selected">Yes</option>
      <option value="No">No</option>
    </select></td>
  </tr>
  <tr id="boxConditionRow">
    <td><label for="inventoryType">Inventory Type</label></td>
    <td colspan="4"><select id="inventoryType" name="inventoryType">
    <?php if(isset($_POST["inventoryType"])){echo '<option value="'.$_POST["inventoryType"].'" selected="selected">'.$_POST["inventoryType"].'</option>';} else {
		echo '<option value="Coins" selected="selected">Coins</option>';}?>
        <option value="Rolls">Rolls</option>
        <option value="Sets">Sets</option>      
        <option value="Folder">Folder</option>
        <option value="Container">Container</option>
        <option value="Bags">Bags</option>
        <option value="Boxes">Boxes</option>
    </select></td>
  </tr>
  <tr id="slabConditionRow">
    <td><label for="slabCondition">Slab Condition</label></td>
    <td colspan="4"><select id="slabCondition" name="slabCondition">
    <?php if(isset($_POST["slabCondition"])){echo '<option value="'.$_POST["slabCondition"].'" selected="selected">'.$_POST["slabCondition"].'</option>';} else {
		echo '<option value="Excellent" selected="selected">Excellent</option>';}?>
      <option value="Scratched Heavy">Scratched Heavy</option>
      <option value="Scratched Light">Scratched Light</option>      
      <option value="Cracked">Cracked</option>
      <option value="Cracked Severe">Cracked Severe</option>
    </select></td>
  </tr>
  <tr>
    <td><label for="coinsCondition">Coins Condition</label></td>
    <td colspan="4"><select id="coinCondition" name="coinsCondition">
      <?php if(isset($_POST["coinsCondition"])){echo '<option value="'.$_POST["coinsCondition"].'" selected="selected">'.$_POST["coinsCondition"].'</option>';} else {
		echo '<option value="Excellent" selected="selected">Excellent</option>';}?>
      <option value="Lightly Spotted">Lightly Spotted</option>
      <option value="Spotted">Spotted</option>
      <option value="Severely Spotted">Severely Spotted</option>
    </select></td>
  </tr>    
  </table>
   
  <table width="601">
  <tr>
    <td width="166" valign="bottom">  
            <input type="submit" name="addCoinFormBtn" id="addCoinFormBtn" value="Save" /></td>
    <td width="423" colspan="4" id="endErrorMsg" class="errorTxt">&nbsp;</td>
  </tr>
</table>
</form>
</div>
<br />


<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>