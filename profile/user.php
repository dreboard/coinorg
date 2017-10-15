<?php 
include '../inc/config.php';

if(isset($_GET["username"])){
$username =strip_tags($_GET["username"]);
$searchQuery = mysql_query("SELECT * FROM user WHERE username  = '$username'") or die(mysql_error()); 
$anymatches = mysql_num_rows($searchQuery); 
 if ($anymatches == 0) 
 { 
 $_SESSION['pageMsg'] = "Sorry, but we can not find a user with that username<br><br>"; 
 } else {
 while ($row = mysql_fetch_array ($searchQuery)) {
   $username = strip_tags($row['username']);
   //$coinType = strip_tags($row['coinType']);
   $User ->getUserById(intval($row['userID'])); 
   $userID = $User ->getUserID();
}
}
mysql_free_result($searchQuery);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>User Profile <?php echo $User->getUserName() ?></title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/profileHeader.php"); ?>

<div id="content" class="clear">
<h2 id="pageHdr"><img src="../siteImg/webImg.jpg" width="23" height="23" align="baseline" /> User Profile <?php echo $User->getUserName() ?></h2>

<table width="100%" border="0">
  <tr>
    <td height="250" colspan="2"><img src="http://mycoinorganizer.com/user/<?php echo $User->getImageURL() ?>" class="profileImg" /></td>
    <td align="right">&nbsp;</td>
    <td width="564" rowspan="6"><object width="355" height="355"><param name="movie" value="http://togo.ebay.com/togo/seller.swf?2008013100" /><param name="flashvars" value="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $User->getEbayID(); ?>" /><embed src="http://togo.ebay.com/togo/seller.swf?2008013100" type="application/x-shockwave-flash" width="355" height="355" flashvars="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $User->getEbayID(); ?>"></embed></object></td>
  </tr>
  <tr>
    <td><?php echo $User->getCollectionAvatar($userID); ?><?php echo $User->getAnswerAvatar($userID); ?><?php echo $User->getInvestmentAvatar($userID); ?></td>
    <td></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Username</strong></td>
    <td><?php echo $User->getUserName() ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="136"><strong> Joined</strong></td>
    <td width="177"><?php echo date("F j, Y",strtotime($User->getUserDate())) ?></td>
    <td width="105" align="right">&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Message</strong></td>
    <td><?php echo $User->mailDisplay($userID) ?></td>
    <td align="right">&nbsp;</td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td align="right" valign="top">&nbsp;</td>
    </tr>
</table>
<hr />

<h3>Links</h3>
<table width="100%" border="0">
  <tr>
    <td width="16%"><strong>Home Page</strong></td>
    <td width="51%">http://mycoinorganizer.com/profile/<?php echo $User->getUserName() ?></td>
    <td width="33%">&nbsp;</td>
  </tr>
</table>

<h3>Awards</h3>
<table width="100%" border="0">
  <tr>
    <td width="16%"><strong>Collection Status</strong></td>
    <td width="75%"><?php echo $User->getCollectionAvatar($userID); ?>&nbsp;<?php echo $User->getCollectionLevel($userID); ?></td>
    <td width="9%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Forum Status</strong></td>
    <td><?php echo $User->getAnswerAvatar($userID); ?>&nbsp;<?php echo $User->getAnswerLevel($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Investment Status</strong></td>
    <td><?php echo $User->getInvestmentAvatar($userID); ?>&nbsp;<?php echo $User->getInvestmentLevel($userID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<h2><img src="../siteImg/clubSm.jpg" width="23" height="23" /> My Clubs/Groups </h2>

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
    <td>None</td>
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
    <td><a href="viewClub.php?coinClubID='.$coinClubID.'&year='.$year.'&month='.$month.'">'.$CoinClub->getClubName().'</a></td>
    <td>'.$CoinClub->getMemberCount($coinClubID).'</td>
    <td>'.$CoinClub->getClubType().'</td>
    <td>&nbsp;</td>
  </tr> ';
  
} 

?>
</table>



<hr />

<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>