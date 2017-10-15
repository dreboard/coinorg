<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET["collectrollsID"])) { 
$collectrollsID = intval($_GET['collectrollsID']);
$collectionRolls->getCollectionRollById($collectrollsID);
$coinType = $collectionRolls->getCoinType();
$coinID = $collectionRolls->getCoinID();
$rollNickname = $collectionRolls->getRollNickname();
$coinTypeLink = str_replace(' ', '_', $coinType);
$rollID = $collectionRolls->getRollID();
$roll->getRollTypeById($rollID);
$coinCount = $roll->getCoinCount();

$coinQuery = mysql_query("SELECT * FROM collectrolls WHERE collectrollsID = '$collectrollsID'") or die(mysql_error());
while($row = mysql_fetch_array($coinQuery))
  {
  $coinType = $row['coinType'];
  $coinCategory = $row['coinCategory'];
  $coinSubCategory = $row['coinSubCategory'];
  }
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<style type="text/css">
#additional {width:99%;}
#gradeService {margin-bottom:7px;}
#addCoinTbl td {padding:3px;}
#additional {margin-bottom:7px;}
#coinTypes a {text-decoration:none;}

.bulkLinks {width:100px; height:auto;}
.rollHdr {margin:0px; padding:0px;}
</style>
<script type="text/javascript">
$(document).ready(function(){	



$(".coinList").change(function() {
var dataString = $(this).val();
$.ajax({url:"../inc/updateRoll.php?collectionID="+dataString+"&collectRollsID=<?php echo $collectrollsID ?>",
 success:function(result){
$(".coinList").html(result);
}});

});	

	
});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<br class="clear" />

<div id="content" class="clear">
<h1><span class="darker"><img src="../img/<?php echo $coinTypeLink ?>.jpg" width="100" height="auto" align="absmiddle" /></span>Add Coins to <?php echo $rollNickname ?> Roll ID# <?php echo $rollID ?></h1>
<span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
<p>Select individual coins</p>
<p>Selected Coins</p>
<?php 
if (isset($_POST["addRollCoinsFormBtn"])) { 
$collectrollsID = $_POST["collectrollsID"];
echo '<br />';
foreach($_POST['coin'] as $coinID) {

for ($i = 1; $i <= 10; $i++) {
    echo $i;
}	
	
echo $coinID.' '.$collectrollsID.'<br />';


}
}
?>

<div class="roundedWhite">
<p><a href="addRollType.php">Back to roll types</a></p>
<form id="addRollCoinsForm" method="post" action="" name="addRollCoinsForm">
<table width="100%" border="0" class="addRollTbl">
    <tr class="darker">
    <td width="18%">Coin Roll #</td>
    <td width="43%">Coin and Grade</td>
    </tr>
<?php 
//$counter = 5;
for( $i=1; $i<=$coinCount; $i++ )
{
echo '
   <tr>
    <td><label for="coin'.$i.'">Coin '.$i.'</label></td>
    <td><select name="coin['.$i.']" class="coinList" id="coin'.$i.'">
		<option value="0" selected="selected">Select A '.$coinType.' Coin</option>';
		?>
	    <?php echo $collectionRolls->coinSelects($coinType, $accountID); ?>
  <?php echo '</select>&nbsp;&nbsp;'.$collectionRolls->getCoinStatus($i, $collectrollsID, $accountID).'
<td>
</tr>';
}
?>
  <tr>
    <td colspan="2"valign="bottom">
      <input type="hidden" name="collectrollsID" id="collectrollsID" value="<?php echo $collectrollsID ?>" />      
      <input type="submit" name="addRollCoinsFormBtn" id="addRollCoinsFormBtn" value="Add Coins to Roll" />
    </td>
    </tr>
</table>
</form>
</div>
<div class="spacer"></div>

</div>
 <?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
