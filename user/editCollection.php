<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$errorMsg = ""; 

if (isset($_GET['ID'])) { 
$coincollectID = $Encryption->decode($_GET['ID']);
$CoinCollect->getCoinCollectionById($coincollectID);

}
//////////ADD COIN
if (isset($_POST["addCollectionBtn"])) { 
$coincollectName = mysql_real_escape_string($_POST["coincollectName"]);
$coinCategory = mysql_real_escape_string($_POST["coinCategory"]);
$coincollectID = $Encryption->decode($_POST["ID"]);
$coincollectDesc = mysql_real_escape_string($_POST["coincollectDesc"]);

mysql_query("UPDATE coincollect SET coincollectName = '$coincollectName', coinCategory = '$coinCategory', coincollectDesc = '$coincollectDesc' WHERE coincollectID = '$coincollectID'") or die(mysql_error()); 

header("location: coinCollectionView.php?ID=".$Encryption->encode($coincollectID)."");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit <?php echo $CoinCollect->getCoinCollectionName(); ?></title>
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
$("#progressBar").hide();
$("#addCollectionForm").submit(function() {
      if($("#coincollectName").val() == "")  {
		$("#errorMsg").text("Name your collection.");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#coincollectName").addClass("errorInput");
      return false;
      }else {
		  $("#addCollectionBtn").prop('value', 'Saving....');
		  $("#progressBar").show();
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
  <h1>Edit <?php echo $CoinCollect->getCoinCollectionName(); ?></h1>
<table width="100%" border="0">
  <tr class="darker">
    <td width="16%" align="center" valign="middle"><a href="coinCollectionList.php?ID=<?php echo $Encryption->encode($coincollectID) ?>" class="brownLink">List View</a></td>
    <td align="center" valign="middle"><a href="coinCollectionView.php?ID=<?php echo $Encryption->encode($coincollectID) ?>">Album View</a></td>    
    <td width="16%" align="center" valign="middle"><a href="editCollection.php?ID=<?php echo $Encryption->encode($coincollectID) ?>">Edit Details</a></td>
    <td width="16%" align="center" valign="middle"><a href="coinCollectionAdd.php?ID=<?php echo $Encryption->encode($coincollectID) ?>">Add Coins</a></td>
    <td width="16%" align="center" valign="middle"><img src="../img/notepadIcon.jpg" width="40" height="40" align="absmiddle" /><a href="coinCollectionView.php?ID=<?php echo $Encryption->encode($coincollectID) ?>"> Notes</a></td>

    <td width="16%" align="center" valign="middle"><img src="../img/camIcon.jpg" width="40" height="40" align="absmiddle" /> <a href="coinCollectionGallery.php?ID=<?php echo $Encryption->encode($coincollectID) ?>"> Gallery</a>
            
    </td>
  </tr>
</table>
<div>
<hr />

<form action="" method="post" enctype="multipart/form-data" name="addCollectionForm" id="addCollectionForm">
  <table width="979" border="0" cellpadding="3">

  <tr>
    <td colspan="5"><span class="errorTxt" id="errorMsg"><?php echo $errorMsg; ?></span>&nbsp;</td>
    </tr>
  <tr>
    <td class="darker">Collection Name</td>
    <td colspan="4"><input name="coincollectName" type="text" id="coincollectName" value="<?php echo $CoinCollect->getCoinCollectionName(); ?>" size="70" maxlength="70" /></td>
  </tr>
  <tr>
    <td width="198" class="darker">Collection Type</td>
    <td colspan="4"><select name="coinCategory" id="coinCategory">
    
    <option selected="selected" value="<?php echo $CoinCollect->getCoinCategory(); ?>"><?php echo $CoinCollect->getCoinCategory(); ?></option>
      <option value="None">General</option>
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
    <td valign="top" class="darker">Description</td>
    <td colspan="4"><textarea name="coincollectDesc" id="coincollectDesc" class="wideTxtarea" cols="" rows=""><?php echo $CoinCollect->getCoinCollectionDesc(); ?>
    </textarea></td>
  </tr>
  <tr>
    <td class="darker">
    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($coincollectID) ?>" />
    <input type="submit" name="addCollectionBtn" id="addCollectionBtn" value="Edit Collection" /></td>
    <td colspan="4"><img src="../siteImg/progress.gif" width="200" height="30" id="progressBar"></td>
  </tr>
  
  </table>
</form>
<p>&nbsp;</p>
</div>
<div class="spacer"></div>
 <p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
