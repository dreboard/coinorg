<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);	

$pageMsg = '';

$User->getUserById($userID);

if (isset($_POST['youtubeBtn'])) {
$youtube = mysql_real_escape_string($_POST['youtube']);
$fileQuery = mysql_query("UPDATE coinclub SET youtube = '$youtube' WHERE coinClubID = '$coinClubID'")  or die(mysql_error()); 
$_SESSION['pageMsg'] = 'youtube Updated';
}

if (isset($_POST['ebayBtn'])) {
$ebayID = mysql_real_escape_string($_POST['ebayID']);
$fileQuery = mysql_query("UPDATE coinclub SET ebayID = '$ebayID' WHERE coinClubID = '$coinClubID'")  or die(mysql_error()); 
$_SESSION['pageMsg'] = 'Ebay Seller ID Updated';
}

if (isset($_POST['faceBtn'])) {
$facebook = mysql_real_escape_string($_POST['facebook']);
$fileQuery = mysql_query("UPDATE coinclub SET facebook = '$facebook' WHERE coinClubID = '$coinClubID'")  or die(mysql_error()); 
$_SESSION['pageMsg'] = 'Facebook Fan Page Updated';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit My Account</title>
<?php include("../secureScripts.php"); ?>
<style type="text/css">
.imageURL {width:100px; height:auto;}
</style>
<script type="text/javascript">
$(document).ready(function(){

$("#waitEbayComplete, #waityoutubeComplete, #waitFaceComplete").hide();

$("#faceForm").submit(function() {
  if ($("#facebook").val() == "") {
	$("#facebook").addClass("errorInput");
	$("label[for='" + this.id + "']").addClass("errorTxt");
	$("#faceMsg").text("Enter Link...").addClass("errorTxt");
	return false;
  }else {
	  $("#waitFaceComplete").show();
 $('#faceBtn').val("Changing Facebook.....");	  
  return true;
  }
});

$("#youtubeForm").submit(function() {
   if ($("#youtube").val() == "") {
	$("#youtube").addClass("errorInput");
	$("label[for='" + this.id + "']").addClass("errorTxt");
	$("#youtubeMsg").text("Enter Link...").addClass("errorTxt");
	return false;
  }else {
	  $("#waityoutubeComplete").show();
 $('#youtubeBtn').val("Changing Channel.....");	  
  return true;
  }
});


$("#ebayForm").submit(function() {
   if ($("#ebayID").val() == "") {
	$("#ebayID").addClass("errorInput");
	$("label[for='" + this.id + "']").addClass("errorTxt");
	$("#ebayMsg").text("Enter Ebay ID...").addClass("errorTxt");
	return false;
  }else {
	  $("#waitEbayComplete").show();
 $('#ebayBtn').val("Changing Ebay ID.....");	  
  return true;
  }
});

  
$('#facebook').click(function(){
	$("#facebook").removeClass("errorInput");
	$("#faceMsg").text("");
}); 
$('#youtube').click(function(){
	$("#youtube").removeClass("errorInput");
	$("#youtubeMsg").text("");
}); 
$('#ebayID').click(function(){
	$("#ebayID").removeClass("errorInput");
	$("#ebayMsg").text("");
}); 
});
</script>
</head>

<body>
<a name="top"></a>
<?php include("../inc/pageElements/headerClub.php"); ?>
<div id="content" class="clear">

<h2 id="pageHdr"><img src="<?php echo $User->getImageURL() ?>" alt="" align="left" class="imageURL" />&nbsp; Add/Edit Club Media/Seller Details<br />
&nbsp;&nbsp;(<?php echo $CoinClub->getClubName() ?>)</h2>

<br class="clear" />
<span><?php 
if(isset($_SESSION['pageMsg'])){
echo '<span class="greenLink">'.addslashes($_SESSION['pageMsg']).'</span>'; 
} else {
echo ''; 
}
if(isset($_SESSION['errorMsg'])){
echo '<span class="errorTxt">'.addslashes($_SESSION['errorMsg']).'</span>'; 
} else {
echo ''; 
}
?>

</span>

<h2><img src="../siteImg/facebook.jpg" width="50" height="50" align="absmiddle" /> Change Facebook Link</h2>
<form action="" name="faceForm" id="faceForm" method="post">
<table width="90%" border="0" cellspacing="0" cellpadding="6" id="accountFormTbl">

<tr>
  <td width="25%" align="right" valign="top"><label for="facebook">Facebook Page URL</label></td>
  <td width="28%"><input name="facebook" type="text" id="facebook" size="60" /></td>
  <td width="47%" class="errorTxt" id="faceMsg">&nbsp;</td>
</tr>      
<tr>
<td></td>
<td colspan="2"><label>
<input type="submit" name="faceBtn" id="faceBtn" value="Change Facebook" onclick="return confirm('Change Your Fan Page')" />
<img src="../img/progress.gif" alt="" name="waitFaceComplete" width="200" height="30" align="absmiddle" id="waitFaceComplete" /></label></td>
</tr>
</table>
</form>

<hr />
<h2><img src="../siteImg/ytIcon.jpg" width="50" height="50" align="absmiddle" /> Change YouTube Channel</h2>
<form action="" name="youtubeForm" id="youtubeForm" method="post">
<table width="90%" border="0" cellspacing="0" cellpadding="6" id="accountFormTbl">

<tr>
  <td width="25%" align="right" valign="top"><label for="youtube">YouTube Channel Name</label></td>
  <td width="28%"><input name="youtube" type="text" id="youtube" size="60" /></td>
  <td width="47%" class="errorTxt" id="youtubeMsg">&nbsp;</td>
</tr>      
<tr>
<td></td>
<td colspan="2"><label>
<input type="submit" name="youtubeBtn" id="youtubeBtn" value="Change Youtube" onclick="return confirm('Change Channel URL')" />
<img src="../img/progress.gif" alt="" name="waityoutubeComplete" width="200" height="30" align="absmiddle" id="waityoutubeComplete" /></label></td>
</tr>
</table>
</form>
<hr />

<h2><img src="../siteImg/ebayIcon.jpg" width="50" height="50" align="absmiddle" /> Change eBay Seller</h2>
<form action="" name="ebayForm" id="ebayForm" method="post">
<table width="90%" border="0" cellspacing="0" cellpadding="6" id="accountFormTbl">

<tr>
  <td width="25%" align="right" valign="top"><label for="ebayID"> Ebay ID</label></td>
  <td width="29%"><input name="ebayID" type="text" id="ebayID" size="60" /></td>
  <td width="46%" class="errorTxt" id="ebayMsg">&nbsp;</td>
</tr>      
<tr>
<td></td>
<td colspan="2"><label>
<input type="submit" name="ebayBtn" id="ebayBtn" value="Change Ebay ID" onclick="return confirm('Change Ebay ID')" />
<img src="../img/progress.gif" alt="" name="waitEbayComplete" width="200" height="30" align="absmiddle" id="waitEbayComplete" /></label></td>
</tr>
</table>
</form>
<hr />


</div>
<?php include("../inc/pageElements/footerClub.php"); ?>
</body>
</html>
