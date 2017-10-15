<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);	

$pageMsg = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Page</title>
<?php include("../secureScripts.php"); ?>

<script type="text/javascript">
$(document).ready(function(){	


});
</script>  

<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/headerClub.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
<h2 id="pageHdr">Search Page</h2>

<table id="productList">
<?php 
if(isset($_POST["search"])){
$search = trim(mysql_real_escape_string($_POST["search"]));
$searchQuery = mysql_query("SELECT * FROM user WHERE coinClubID = '$coinClubID' AND lastname LIKE'%$search%' OR firstname LIKE '%$search%' ORDER BY lastname DESC") or die(mysql_error()); 
$anymatches = mysql_num_rows($searchQuery); 
 if ($anymatches == 0) 
 { 
 $pageMsg = "Sorry, but we can not find an entry to match your query<br /><br />"; 
 } else {
  echo 'There are <strong>' . $anymatches . '</strong> matches for search ' . $search;
  $counter = 1; 
 while ($row = mysql_fetch_array ($searchQuery)) {
   $lastname = strip_tags($row['lastname']);
   $firstname = strip_tags($row['firstname']);
   $userID = intval($row['userID']);
   echo '
   <tr><td>'.$counter++.'. <a href="userView.php?ID='.$Encryption->encode($userID).'">' .$lastname.', '.$firstname.'</a></td></tr>';
}
}
mysql_free_result($searchQuery);
}
?>
</table>
<p><?php echo $pageMsg ?></p>
<p>&nbsp;</p>

</div>                
</div>
</div>
<?php include("../inc/pageElements/footerClub.php"); ?>
</div><!--End container-->
</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>