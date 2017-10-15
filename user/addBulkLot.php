<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

//////////ADD COIN
if (isset($_POST["addCollectionBtn"])) { 
$coincollectName = mysql_real_escape_string($_POST["coincollectName"]);
$coinCategory = mysql_real_escape_string($_POST["coinCategory"]);

if($_POST['coincollectDesc'] == '') {
	$coincollectDesc = 'None';
} else {
	$coincollectDesc = mysql_real_escape_string($_POST["coincollectDesc"]);
}

mysql_query("INSERT INTO coincollect(coincollectName, coinCategory, coincollectDesc, coincollectDate, userID) VALUES('$coincollectName', '$coinCategory',  '$coincollectDesc', '$theDate', '$userID')") or die(mysql_error()); 
$coincollectID = mysql_insert_id();

header("location: coinCollectionView.php?ID=".$Encryption->encode($coincollectID)."");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add New Bulk Lot</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../style.css"/>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30620319-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<style type="text/css">
#coinHdr {margin:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	

$("#addCollectionForm").submit(function() {
      if($("#coincollectName").val() == "")  {
		$("#errorMsg").text("Name your collection.");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#coincollectName").addClass("errorInput");
      return false;
      }else {
		$("#addCollectionBtn").prop('value', 'Saving....');  
	  return true;
	  }
});

$("input[type=text]").click(function(){
	  $(this).removeClass("errorInput");
	  $("label[for='" + this.id + "']").removeClass("errorTxt");
});

	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
  <h1>Add New Bulk Lot</h1>
  <p>For Bulk Purchases</p>
 <div id="CoinList">
<p class="darker">Recently Added Collections &nbsp;| &nbsp; <a href="coinCollection.php" class="brownLink">View All Collections</a></p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="13%">Date</td>
    <td width="40%">Name</td>
    <td width="31%">Type</td>   
    <td width="16%"> Coins</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM coincollect WHERE userID = '$userID'  ORDER BY coincollectID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="4">You dont have any saved collections</td>
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $coincollectID = intval($row['coincollectID']); 
  $CoinCollect->getCoinCollectionById($coincollectID);
  echo '
<tr>
<td>'.date("M j, Y",strtotime($CoinCollect->getCoinCollectionDate())).'</td> 
<td><a href="coinCollectionView.php?ID='.$Encryption->encode($coincollectID).'">'.$CoinCollect->getCoinCollectionName().'</a></td>
<td>'.$CoinCollect->getCoinCollectionType().'</td>
<td>'.$CoinCollect->getCoinsCount($coincollectID).'</td>
</tr>  
  ';
  }
}
?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<hr />

<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<div>

<form action="" method="post" enctype="multipart/form-data" name="addCollectionForm" id="addCoinForm">
  <table width="979" border="0" class="addCoinTbl">

  <tr>
    <td class="darker">Lot Name</td>
    <td colspan="4"><input name="coincollectName" type="text" id="coincollectName" size="70" maxlength="70" /></td>
  </tr>
  <tr>
    <td width="198" class="darker">Lot Purchase Date</td>
    <td colspan="4"><select name="coinCategory" id="coinCategory">
      <option selected="selected" value="None">General</option>
        <option value="Half Cent">Half Cents</option>
        <option value="Large Cents">Large Cents</option>
        <option value="Small Cents">Small Cents</option>
        <option value="Two Cent">Two Cent</option>
        <option value="Three Cent">Three Cent</option>
        <option value="Half Dime">Half Dime</option>
        <option value="Nickels">Nickels</option>
        <option value="Dime">Dimes</option>
        <option value="Twenty Cent">Twenty Cent</option>
        <option value="Quarters">Quarters</option>
        <option value="Half Dollar">Half Dollars</option>
        <option value="Dollar">Dollars</option>
    </select></td>
  </tr>
  <tr>
    <td class="darker"><label for="purchasePrice">Purchase Price</label></td>
    <td colspan="4"><input name="purchasePrice" type="text" id="purchasePrice" value="<?php if(isset($_POST["purchasePrice"])){echo $_POST["purchasePrice"];} else {echo "";}?>" class="purchasePrice" /></td>
  </tr>
  <tr>
    <td valign="top" class="darker">Description</td>
    <td colspan="4"><textarea name="coincollectDesc" id="coincollectDesc" class="wideTxtarea" cols="" rows="8
    "></textarea></td>
  </tr>
  <tr>
    <td class="darker"><input type="submit" name="addCollectionBtn" id="addCollectionBtn" value="Add Coin Lot" /></td>
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
