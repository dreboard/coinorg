<?php 
include 'inc/config.php';

$Users = new User();
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
   $Users ->getUserById(intval($row['userID'])); 
   $usersID = $Users ->getUserID();
}
}
mysql_free_result($searchQuery);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("secureScripts.php"); ?>
<title>Users Profile <?php echo $Users->getUserName() ?></title>
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
<?php include("inc/pageElements/profileHeader.php"); ?>

<div id="content" class="clear">
<h2 id="pageHdr"><img src="siteImg/webImg.jpg" width="23" height="23" align="baseline" /> Users Profile <?php echo $Users->getUserName() ?></h2>

<table width="100%" border="0">
  <tr>
    <td height="250" colspan="2"><img src="http://mycoinorganizer.com/user/<?php echo $Users->getImageURL() ?>" class="profileImg" /></td>
    <td align="right">&nbsp;</td>
    <td width="564" rowspan="6"><object width="355" height="355"><param name="movie" value="http://togo.ebay.com/togo/seller.swf?2008013100" /><param name="flashvars" value="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $Users->getEbayID(); ?>" /><embed src="http://togo.ebay.com/togo/seller.swf?2008013100" type="application/x-shockwave-flash" width="355" height="355" flashvars="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $Users->getEbayID(); ?>"></embed></object></td>
  </tr>
  <tr>
    <td><?php echo $Users->getCollectionAvatar($usersID); ?><?php echo $Users->getAnswerAvatar($usersID); ?><?php echo $Users->getInvestmentAvatar($usersID); ?></td>
    <td></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Usersname</strong></td>
    <td><?php echo $Users->getUserName() ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="136"><strong> Joined</strong></td>
    <td width="177"><?php echo date("F j, Y",strtotime($Users->getUserDate())) ?></td>
    <td width="105" align="right">&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Message</strong></td>
    <td><?php echo $Users->mailDisplay($usersID) ?></td>
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
    <td width="84%">http://www.mycoinorganizer.com/user.php?username=<?php echo $Users->getUserName() ?></td>
  </tr>
      <td class="darker">PCGS</td>
    <td><?php echo $Users->getPCGSLink() ?></td>
    </tr>
  <tr>
    <td class="darker">NGC</td>
    <td><?php echo $Users->getNGCLink() ?></td>
    </tr>
</table>

<h3>Awards</h3>
<table width="100%" border="0">
  <tr>
    <td width="16%"><strong>Collection Status</strong></td>
    <td width="75%"><?php echo $Users->getCollectionAvatar($usersID); ?>&nbsp;<?php echo $Users->getCollectionLevel($usersID); ?></td>
    <td width="9%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Forum Status</strong></td>
    <td><?php echo $Users->getAnswerAvatar($usersID); ?>&nbsp;<?php echo $Users->getAnswerLevel($usersID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Investment Status</strong></td>
    <td><?php echo $Users->getInvestmentAvatar($usersID); ?>&nbsp;<?php echo $Users->getInvestmentLevel($usersID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<hr />
<h2><img src="siteImg/clubSm.jpg" width="23" height="23" /> My Clubs/Groups </h2>

<table width="100%" border="0">
  <tr>
    <td width="27%"><strong>Club Name</strong></td>
    <td width="24%"><strong>Members</strong></td>
    <td width="45%"><strong>Club Type</strong></td>
    <td width="4%">&nbsp;</td>
  </tr>
<?php 
$myQuery = mysql_query("SELECT * FROM clubmembers WHERE userID = '$usersID'") or die(mysql_error()); 

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
<?php include("inc/pageElements/footer.php"); ?>
</body>
</html>