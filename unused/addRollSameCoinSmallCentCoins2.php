<?php 
include '../inc/config.php';
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="../scripts/main.js"></script>
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
$.ajax({url:"../inc/updateRoll.php?collectionID="+dataString, success:function(result){
$(".coinList").html(result);
}});

});	

	
});
</script>     
<link rel="stylesheet" type="text/css" href="../style.css"/>
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




<table width="100%" border="0" class="addRollTbl">
    <tr class="darker">
    <td width="11%">Coin #</td>
    <td width="89%">Coin and Grade</td>
    </tr>
     
<?php 
//$counter = 5;
for( $i=1; $i<=$coinCount; $i++ )
{
echo '
   <tr>
    <td class="darker">Coin '.$i.'</td>
    <td><form class="compactForm" method="post" action="" name="addRollCoinsForm">
	<select name="coin['.$i.']" class="coinList" id="coin'.$i.'">
		<option value="0" selected="selected">Select A '.$coinType.' Coin</option>
		<input type="hidden" name="collectrollsID" id="collectrollsID" value="'.$collectrollsID.'" />      
      <input type="submit" name="addRollCoinsFormBtn" id="addRollCoinsFormBtn" value="Add This Coin" /></form>';
		?>
	    <?php echo $collectionRolls->coinSelects($coinType, $accountID); ?>
  <?php echo '</select>&nbsp;&nbsp;'.$collectionRolls->getCoinStatus($i, $collectrollsID, $accountID).'
<td>

</tr>';
}
?>
</table>
</div>
<div class="spacer"></div>
</div>
 <?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
