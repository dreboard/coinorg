<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 


//////////ADD COIN
if (isset($_POST["addContainerBtn"])) { 
$containerName = mysql_real_escape_string($_POST["containerName"]);
$containerType = mysql_real_escape_string($_POST["containerType"]);

if($_POST['containerDesc'] == '') {
	$containerDesc = 'None';
} else {
	$containerDesc = mysql_real_escape_string($_POST["containerDesc"]);
}

mysql_query("INSERT INTO containers(containerName, containerType, containerDesc, containerDate, userID) VALUES('$containerName', '$containerType',  '$containerDesc', '$theDate', '$userID')") or die(mysql_error()); 
$containerID = mysql_insert_id();

header("location: coinContainerList.php?ID=".$Encryption->encode($containerID)."");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Create A Collection</title>
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
      if($("#containerName").val() == "")  {
		$("#errorMsg").text("Name your collection.");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#containerName").addClass("errorInput");
      return false;
      }else {
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
  <h1>Add New Storage Container</h1>
 <div id="CoinList">
<p class="darker">Recently Added Containers &nbsp;| &nbsp; <a href="coinContainer.php" class="brownLink">View All Containers</a></p>
<table width="100%" border="0">
  <tr class="darker">
    <td width="13%">Date</td>
    <td width="40%">Name</td>
    <td width="31%">Type</td>   
    <td width="16%"> Coins</td>

  </tr>
<?php 
$collectionQuery = mysql_query("SELECT * FROM containers WHERE userID = '$userID'  ORDER BY containerID DESC LIMIT 5") or die(mysql_error());

if(mysql_num_rows($collectionQuery) == 0){
	  echo '
		  <tr>
		  <td colspan="4">You dont have any saved containers</td>
		  </tr>  ';
} else {

while($row = mysql_fetch_array($collectionQuery))
  {
  $containerID	 = intval($row['containerID']);
  $Container->getContainerById($containerID);  
  echo '
<tr>
<td>'.date("M j, Y",strtotime($Container->getContainerDate())).'</td> 
<td><a href="coinContainerList.php?ID='.$Encryption->encode($containerID).'">'.$Container->getContainerName().'</a></td>
<td>'.$Container->getContainerType().'</td>
<td>'.$Container->getCollectionContainerCount($containerID).'</td>
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
<div class="roundedWhite">

<form action="" method="post" enctype="multipart/form-data" name="addCollectionForm" id="addCollectionForm">
  <table width="979" border="0" class="priceListTbl">

  <tr>
    <td class="darker">Container Name</td>
    <td colspan="4"><input name="containerName" type="text" id="containerName" size="70" maxlength="70" /></td>
  </tr>
  <tr>
    <td width="198" class="darker">Container Type</td>
    <td colspan="4"><select name="containerType" id="containerType">
      <option selected="selected" value="">Type</option>
        <option value="PCGS Box">PCGS Box</option>
        <option value="NGC Box">NGC Box</option>
        <option value="Plastic Tray">Plastic Tray</option>
        <option value="Roll Tray">Roll Tray</option>
        <option value="Plastic Bin">Plastic Bin</option>
        <option value="Shoe Box">Shoe Box</option>      
    </select></td>
  </tr>
  <tr>
    <td class="darker">Description</td>
    <td colspan="4"><textarea name="containerDesc" id="containerDesc" class="wideTxtarea" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td class="darker"><input type="submit" name="addContainerBtn" id="addContainerBtn" value="Add Container" /></td>
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
