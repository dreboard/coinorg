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
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h2 id="pageHdr"> Users Account Details (<?php echo $User->getLastname() ?>, <?php echo $User->getFirstname() ?>)</h2>

<table width="100%" border="0">
  <tr>
    <td height="250" colspan="2"><img src="<?php echo $User->getImageURL() ?>" class="profileImg" /></td>
    <td align="right">&nbsp;</td>
    <td width="564" rowspan="6"><object width="355" height="355"><param name="movie" value="http://togo.ebay.com/togo/seller.swf?2008013100" /><param name="flashvars" value="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $User->getEbayID(); ?>" /><embed src="http://togo.ebay.com/togo/seller.swf?2008013100" type="application/x-shockwave-flash" width="355" height="355" flashvars="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $User->getEbayID(); ?>"></embed></object></td>
  </tr>
  <tr>
    <td><?php echo $User->getCollectionAvatar($userID); ?><?php echo $User->getAnswerAvatar($userID); ?><?php echo $User->getInvestmentAvatar($userID); ?></td>
    <td><a href="accountEdit.php">Edit My Profile</a></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Username</strong></td>
    <td><?php echo $User->getUserName(); ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="136"><strong> Joined</strong></td>
    <td width="177"><?php echo date("F j, Y",strtotime($User->getUserDate())); ?></td>
    <td width="105" align="right">&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Message</strong></td>
    <td><?php echo $User->mailDisplay($userID); ?></td>
    <td align="right">&nbsp;</td>
    </tr>
  <tr>
    <td valign="top"><strong>Site Views</strong></td>
    <td valign="top"><?php echo $User->getPageViews(); ?></td>
    <td align="right" valign="top">&nbsp;</td>
    </tr>
</table>
<hr />
<h2><img src="../siteImg/webImg.jpg" width="23" height="23" align="baseline" /> My Site </h2>
<table width="100%" border="0">
  <tr>
    <td width="28%"> <strong>Privacy Level:</strong> <?php echo $User->getPrivacyLevel(); ?></td>
    <td width="63%"><a href="accountEdit.php">(Edit Account and Settings)
    </a></td>
    <td width="9%">&nbsp;</td>
  </tr>

</table>
<h3>Links</h3>
<table width="100%" border="0">
  <tr>
    <td class="darker" width="16%">Home Page</td>
    <td width="84%">http://www.mycoinorganizer.com/user.php?page=<?php echo $User->getUserName() ?>/</td>
    </tr>
  <tr>
    <td class="darker">PCGS</td>
    <td><?php echo $User->getPCGSLink() ?></td>
    </tr>
  <tr>
    <td class="darker">NGC</td>
    <td><?php echo $User->getNGCLink() ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td><a href="viewClub.php?coinClubID='.$coinClubID.'&year='.$year.'&month='.$month.'">'.$CoinClub->getClubName().'</a></td>
    <td>'.$CoinClub->getMemberCount($coinClubID).'</td>
    <td>'.$CoinClub->getClubType().'</td>
    <td>&nbsp;</td>
  </tr> ';
  
} 

?>
</table>
<p class="clear"><a href="clubReg.php">Start A Club</a></p>


<hr />





<div class="roundedWhite"><h3>Award Legend</h3>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="17%"><strong>Collector Awards</strong></td>
    <td width="83%">&nbsp;</td>
  </tr>
  <tr>
    <td>Master</td>
    <td><img src="../img/Master_Collector.jpg" width="17" height="17" /> More than 1000 distinct coins in your collection</td>
  </tr>
  <tr>
    <td>Advanced</td>
    <td><img src="../img/Advanced_Collector.jpg" width="17" height="17" /> More than 500 but less than 1000 distinct coins in your collection</td>
  </tr>
  <tr>
    <td>Basic</td>
    <td><img src="../img/Basic_Collector.jpg" width="17" height="17" /> less than 500 distinct coins in your collection</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Forum Awards</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Master</td>
    <td><img src="../img/Master_User.jpg" width="17" height="17" /> Answering more than 500 forum questions</td>
  </tr>
  <tr>
    <td>Advanced</td>
    <td><img src="../img/Advanced_User.jpg" width="17" height="17" /> Answering more than 200 but less than 500 forum questions</td>
  </tr>
  <tr>
    <td>Basic</td>
    <td><img src="../img/Basic_User.jpg" width="17" height="17" /> Answering less than 200 forum questions</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Investor Awards</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Master</td>
    <td><img src="../img/Master_Investment.jpg" width="17" height="17" /> Investing more than $10,000</td>
  </tr>  <tr>
    <td>Advanced</td>
    <td><img src="../img/Advanced_Investment.jpg" width="17" height="17" /> Investing more than $1,000 but less than $10,000</td>
  </tr>
  <tr>
    <td>Basic</td>
    <td><img src="../img/Basic_Investment.jpg" width="17" height="17" /> Investing less than $1,000</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></div>
<hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>