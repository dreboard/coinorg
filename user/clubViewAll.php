<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>My Clubs</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Clubs</h1>
<table width="100%" border="0">
  <tr>
    <td width="27%"><strong>Club Name</strong></td>
    <td width="24%"><strong>Members</strong></td>
    <td width="45%"><strong>Club Type</strong></td>
    <td width="4%">&nbsp;</td>
  </tr>
<?php 
$myQuery = mysql_query("SELECT * FROM clubmembers WHERE userID = '$userID'") or die(mysql_error()); 

if (mysql_num_rows($myQuery) ==0) {
        echo '
	<tr>
    <td>You dont belong to any clubs</td>
    <td></td>
    <td></td>
    <td></td>
  </tr> ';
    }
	while($row = mysql_fetch_array($myQuery)) {
         $coinClubID = intval($row['coinClubID']);
         $CoinClub->getClubById($coinClubID);
		 echo '
	<tr>
    <td><a href="viewClub.php?ID='.$Encryption->encode($coinClubID).'&year='.$year.'&month='.$month.'">'.$CoinClub->getClubName().'</a></td>
    <td>'.$CoinClub->getMemberCount($coinClubID).'</td>
    <td>'.$CoinClub->getClubType().'</td>
    <td>&nbsp;</td>
  </tr> ';
  
} 

?>
</table>
<p class="clear"><a href="clubReg.php">Start A Club</a></p>
<h1>Active Clubs</h1>
<table width="100%" border="0">
  <tr class="darker">
    <td width="43%">Club Name</td>
    <td width="8%">Members</td>
    <td width="30%">Contact</td>
    <td width="19%" align="center">Join</td>
  </tr>
<?php 
$myQuery = mysql_query("SELECT * FROM coinclub WHERE approval = '1'") or die(mysql_error()); 
	while($row = mysql_fetch_array($myQuery)) {
         $coinClubID = intval($row['coinClubID']);
         $CoinClub->getClubById($coinClubID);
		 echo '
		   <tr>
    <td><a href="clubView.php?ID='.$Encryption->encode($coinClubID).'&year='.$year.'&month='.$month.'">'.$CoinClub->getClubName().'</a></td>
    <td align="center">'.$CoinClub->getMemberCount($coinClubID).'</td>
    <td>'.$CoinClub->getClubType().'</td>
    <td align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick-subscriptions">
<input type="hidden" name="business" value="admin@mycoinorganizer.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Member Dues">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="src" value="1">
<input type="hidden" name="a3" value="9.99">
<input type="hidden" name="p3" value="1">
<input type="hidden" name="t3" value="Y">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</td>
  </tr>
		 
		 
		 
		 
		 <br />
		 ';
  
} 

?>
</table>
<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>