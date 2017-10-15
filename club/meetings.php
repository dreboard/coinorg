<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Members</title>

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
<h1>Manage Meetings</h1>
<table width="100%" border="0">
<thead>
  <tr>
    <td><strong>Title</strong></td>
    <td><strong>Date</strong></td>
    <td><strong>Members</strong></td>
  </tr>
  </thead>
  <tbody>
  <?php 
  $sql = mysql_query("SELECT * FROM event WHERE eventType ='Monthly Meeting' AND coinClubID = '".$User->getCoinClubID()."' GROUP BY 
    MONTH(eventStartDate), 
    YEAR(eventStartDate)
ORDER BY 
    MONTH(eventStartDate) DESC, 
    YEAR(eventStartDate) DESC") or die(mysql_error());
while ($row = mysql_fetch_array($sql))
{
	$eventStartDate = date("m/d/y", strtotime($row["eventStartDate"]));
	$eventTitle = strip_tags($row["eventTitle"]);
	$eventID = intval($row["eventID"]);

	echo '
	  <tr>
    <td><a href="eventDisplay.php?eventID='.$eventID.'">'.$eventTitle.'</a></td>
    <td>'.$eventStartDate.'</td>
    <td>0</td>
  </tr>
	 ';
}
  
  ?>
  </tbody>
  <tfoot>  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </tfoot>
</table>


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