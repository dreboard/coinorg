<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Login to your account</title>
<script type="text/javascript">
$(document).ready(function(){	


});
</script>  

<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Manage EBAY Sellers</h1>
<p>Save A Favorite Seller</p>
<form id="saveSellerForm" name="saveSellerForm" method="post" action="">
<table width="500" border="0">
  <tr>
    <td width="186">&nbsp;</td>
    <td width="304">&nbsp;</td>
  </tr>
  <tr>
    <td>Seller User Name:</td>
    <td><label>
      <input type="text" name="ebaysellerName" id="ebaysellerName" />
    </label></td>
  </tr>
  <tr>
    <td valign="top">Seller Details:</td>
    <td><label>
      <textarea name="ebaySellerNotes" id="ebaySellerNotes" cols="45" rows="5"></textarea>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="saveSellerBtn" id="button" value="Submit" />
    </label></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr class="darker">
    <td>User Name</td>
    <td>Join Date</td>
    <td>Coins</td>
    <td>User Level</td>
  </tr>
  <?php 
  $sql = mysql_query("SELECT * FROM ebaysellers ORDER BY SellerID ASC") or die(mysql_error());
while ($row = mysql_fetch_array($sql))
{
	$SellerID = $row["SellerID"];
	$addedDate = date("m/d/y", strtotime($row["addedDate"]));
	$ebaySellersID = $row["ebaySellersID"];
	$website = $row["website"];
	echo '
	  <tr>
    <td><a href="userEbaySeller.php?SellerID='.$SellerID.'">'.$SellerID.'</a></td>
    <td>'.$addedDate.'</td>
    <td></td>
    <td>'.$website.'</td>
  </tr>
	 ';
}
  
  ?>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<?php 
include"../inc/classes/calendar/Calendar.php";
echo monthControls($monthNumber=date('n'), $month=date('m'), $year=date('Y'));
echo draw_calendar(date('n'), date('Y'));
?>



<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>