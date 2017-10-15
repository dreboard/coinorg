<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET["usersID"])) { 
$usersID = intval($_GET["usersID"]);
$Users = new User();
$Users->getUserById($usersID);
 }
 if (isset($_POST["removeID"])) { 
$Users->deleteUser(intval($_POST["removeID"]));
header("location: users.com");	
exit();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Users</title>
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
<h1><?php echo $Users->getDisplayName(); ?></h1>
<table width="100%" border="0">
  <tr>
    <td><strong>User Name</strong></td>
    <td><strong>Join Date</strong></td>
    <td><strong>Last Login</strong></td>
    <td><strong>Coins</strong></td>
    <td><strong>User Level</strong></td>
  </tr>
  <?php 
	echo '
	  <tr>
    <td>'.$Users->getUserName().'</td>
    <td>'.$Users->getUserDate().'</td><td>'.$Login->getUserIDLastLogin($usersID).'</td>
    <td>'.$collection->totalCoinsByUser($usersID).'</td>
    <td>'.$Users->getActive().'</td>
  </tr>
	 ';
  ?>
  
  <tr>
    <td><form name="form1" method="post" action="">
    <input name="removeID" type="hidden" value="<?php echo $usersID ?>">
    
    <input type="submit" name="button" id="button" value="Delete User"onclick="return confirm('Delete User?')">
    </form></td>
    <td>&nbsp;</td><td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<h3>Geographical Info</h3>
<table width="100%" border="0">
  <tr>
    <td width="15%">IP Address</td>
    <td width="75%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
  </tr>
  <tr>
    <td>Country</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>



<p><a href="../logout.php">Logout</a></p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>