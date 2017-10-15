<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) { 
$collectionID = $Encryption->decode($_GET['ID']);
$collection->getcollectionById($collectionID);
$coin->getCoinByID($collection->getCoinID());
$coinName = $coin->getCoinName();  
$coinType = $collection->getCoinType();
}

//////////ADD COIN
if (isset($_POST["addCertBtn"])) { 
$proService = mysql_real_escape_string($_POST["proService"]);
$collectionID = $Encryption->decode($_POST["ID"]);
$collection->getcollectionById($collectionID);
if($_POST['coinNote'] == '') {
	$coinNote = 'None';
} else {
	$coinNote = mysql_real_escape_string($_POST["coinNote"]);
}

$sql = mysql_query("UPDATE collection SET certlist = '1', certlistService = '$proService', certlistDate = '".date('Y-m-d')."' WHERE collectionID = '$collectionID' AND userID = '$userID' ") or die(mysql_error()); 

if($collection->getCollectionSet() != '0'){
$sql2 = mysql_query("DELETE FROM collectset WHERE collectsetID = '".$collection->getCollectionSet()."' AND userID = '$userID' LIMIT 1")or die(mysql_error());

$sql3 = mysql_query("UPDATE collection SET collectsetID = '0' WHERE collectsetID = '".$collection->getCollectionSet()."' AND userID = '$userID' ") or die(mysql_error()); 

}

$_SESSION['message'] = 'Coin Added';
header("location: viewCoinDetail.php?ID=".$Encryption->encode($collectionID)."");

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

$("#addCertListForm").submit(function() {
      if($("#proService").val() == "")  {
		$("#errorMsg").text("Select A Grading Service.");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#proService").addClass("errorInput");
      return false;
      }else {
		  $("#addCertBtn").prop('value', 'Saving Coin...');
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
  <h1>Add To Certified List</h1>
 <div id="CoinList">
<p class="darker">Recently Added Coins To Be Certified&nbsp;| &nbsp; <a href="certList.php" class="brownLink">View All </a> &nbsp;| <a class="brownLink" href="viewCoinDetail.php?ID=<?php echo $Encryption->encode($collectionID); ?>">Return to Coin</a></p>

<table width="100%" border="0" id="clientTbl" class="coinTbl">
  <tr class="darker">
    <td width="52%" height="24">Coin</td>  
    <td width="34%" align="center">Service</td>
    <td width="14%" align="center">Added</td>
  </tr>
<?php
$countAll = mysql_query("SELECT * FROM collection WHERE certlist = '1' AND userID = '$userID' ORDER BY denomination DESC LIMIT 5") or die(mysql_error());
if(mysql_num_rows($countAll) == 0){
	  echo '
    <tr>
    <td>No Coins On List</td>
	<td></td>
	<td></td>	   
  </tr>
  ';
} else {
  while($row = mysql_fetch_array($countAll))
	  {
  $collect2 = new Collection();
  $collect2->getCollectionById(intval($row['collectionID']));
  $coin-> getCoinById($collect2->getCoinID());
  echo '
    <tr>
    <td><a class="brownLink" href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coin->getCoinName().'</a></td>
	<td align="center">'.strip_tags($row['certlistService']).'</td>
	<td align="center">'.date("M j, Y",strtotime(strip_tags($row['certlistDate']))).'</td>	   
  </tr>
  ';
	  }
}
?>
</table>
</div>
<hr />


<div>
<form action="" method="post" enctype="multipart/form-data" name="addCertListForm" id="addCertListForm">
  <table width="979" border="0" class="priceListTbl">

  <tr>
    <td colspan="5" class="darker"><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>
</td>
    </tr>
    
 <?php if($collection->getCollectionSet() != '0'){?>   
  <tr>
    <td colspan="5"> <span class="errorTxt">This Coin Is In A Mint Set.</span> Adding this coin to the list will delete the set and add the remaing coins to your collection
    </td>
    </tr>    
<?php } else { echo ''; }?>    
    
    
  <tr>
    <td width="190" class="darker">Coin</td>
    <td width="779" colspan="4">
    <?php echo $coinName; ?> <?php echo $coinType ?>
    </td>
  </tr>
  <tr>
    <td class="darker"><label for="proService">Grading Service</label></td>
    <td colspan="4"><select id="proService" name="proService">
<option value="" selected="selected">Select..</option>
      <option value="PCGS">PCGS (Professional Coin Grading Service)</option>
      <option value="ICG">ICG (Independent Coin Grading Company)</option>
      <option value="NGC">NGC (Numismatic Guaranty Corporation of America)</option>
      <option value="ANACS">ANACS (American Numismatic Association Certification Service)</option>
    </select></td>
  </tr>  
  <tr>
    <td valign="top" class="darker">Additional</td>
    <td colspan="4"><textarea name="coinNote" id="certDesc" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td class="darker">
    <input name="ID" type="hidden" value="<?php echo $_GET['ID']; ?>" />
    <input type="submit" name="addCertBtn" id="addCertBtn" value="Add Certified List" /></td>
    <td colspan="4">&nbsp;</td>
  </tr>
  
  </table>
</form>
<br />

</div>
<div class="spacer"></div>
 <p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>