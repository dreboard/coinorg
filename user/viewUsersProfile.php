<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
if (isset($_GET['ID'])) { 
$siteUserID = $Encryption->decode($_GET['ID']);
$SiteUser = new User();
$SiteUser->getUserById($siteUserID);
$SiteUser->setUserViewNumber($siteUserID, $userID);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>User Profile <?php echo $SiteUser->getUserName() ?></title>
 <script type="text/javascript">
$(document).ready(function(){	

});
</script> 
<style type="text/css">
#profileImg {height:180px; width:auto;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><?php echo $SiteUser->getUserName() ?></h1>
<table width="100%" border="0">
  <tr>
    <td height="190" colspan="2"><img src="<?php echo $SiteUser->getImageURL() ?>" id="profileImg" /><!--<img src="../siteImg/siteUser.jpg" id="profileImg" />--></td>
    <td width="489" rowspan="6" align="center"><object width="355" height="355"><param name="movie" value="http://togo.ebay.com/togo/seller.swf?2008013100" /><param name="flashvars" value="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $SiteUser->getEbayID(); ?>" /><embed src="http://togo.ebay.com/togo/seller.swf?2008013100" type="application/x-shockwave-flash" width="355" height="355" flashvars="base=http://togo.ebay.com/togo/&lang=en-us&seller=<?php echo $User->getEbayID(); ?>"></embed></object></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $SiteUser->getCollectionAvatar($siteUserID); ?><?php echo $SiteUser->getAnswerAvatar($siteUserID); ?><?php echo $SiteUser->getInvestmentAvatar($siteUserID); ?></td>
    </tr>
  <tr>
    <td width="108"><strong> Joined</strong></td>
    <td width="389"><?php echo date("M j, Y",strtotime($SiteUser->getUserDate()))?></td>
    </tr>
  <tr>
    <td><strong>Message</strong></td>
    <td><?php echo $SiteUser->mailDisplay($siteUserID) ?></td>
    </tr>
  <tr>
    <td><strong>Clubs</strong></td>
    <td>
      
      
    </td>
    </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top"></td>
  </tr>
</table>
<br />
<hr />
<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>