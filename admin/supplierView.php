<?php 
include '../inc/config.php';

if (isset($_SESSION['accountID'])) {
	  $accountID = intval($_SESSION['accountID']);
} else {
header('Location: ../login.php');
}

?>
<?php 
if (isset($_GET['accountID'])) {
$supplyID = intval($_GET['supplyID']);  
$activeResult = mysql_query("SELECT * FROM suppliers WHERE supplyID = '$supplyID'") or die(mysql_error());
while($row = mysql_fetch_array($activeResult))
  {
  $supplyID = $row['supplyID'];
  $supplyName = $row['supplyName'];
  
  $supplyFirstName = $row['supplyFirstName'];
  $supplyLastName = $row['supplyLastName'];
  
  $supplyAddress = $row['supplyAddress'];
  $supplyCity = $row['supplyCity'];
  $supplyState = $row['supplyState'];
  
  $supplyZip = $row['supplyZip'];
  $supplyPhone = $row['supplyPhone'];
  $supplyEmail = $row['supplyEmail'];
  $supplyWeb = $row['supplyWeb'];
  $supplyDetail = $row['supplyDetail'];
  $supplyStatus = $row['supplyStatus'];
  
  $supplyCategory = $row['supplyCategory'];

  
  $contactName = $supplyLastName. ", " .$supplyFirstName;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="MYCOINORGANIZER.COM test site" />
<meta name="keywords" content="Penny collection" />
<?php include("../secureScripts.php"); ?>
<title>New Supplier</title>
<script type="text/javascript">
$(document).ready(function(){	
$('#recoverDiv').hide();
$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });


});
</script>  


<style type="text/css">

#menuList {float:left;}
#menuList li {list-style-type:none; font-size:1.4em; padding:10px; width:110px;}

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>New Supplier</h1>
<table class="midTable" width="60%" border="2" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="supplierAll.php">New Supplier</a></td>
    <td><a href="supplierNew.php">New Supplier</a></td>
    <td>&nbsp;</td>
  </tr>
</table>


<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>