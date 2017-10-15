<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
	if(isset($_GET['month'])) {  
		$month = intval($_GET['month']);
		$year = intval($_GET['year']); 
	} else {
		$month = date("n");
		$year = date('Y') ; 
	}
$coinClubID = $User->getCoinClubID();
$CoinClub->getClubById($coinClubID);	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Club</title>
<?php include("../secureScripts.php"); ?>
<script type="text/javascript" src="http://calendar.net84.net/scripts/jquery.ptTimeSelect.js"></script>

<link rel="stylesheet" type="text/css" href="http://calendar.net84.net/scripts/jquery.ptTimeSelect.css"/>

<script type="text/javascript">
$(document).ready(function(){	


});
</script>  


<style type="text/css">
#calDiv {width:600px; padding:0px; float:left;}
.calendar {border-color:#999999;}
.calendar li {font-size:80%;list-style-type:none;}
.calendar ul {}
#listCal {float:left;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/headerClub.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
    <h2 class="blueHdrTxt2"><?php echo $CoinClub->getClubName(); ?></h2>
<table width="254" border="0" id="listCal">

      <tr>
        <td width="76" align="center"><a href="news.php"><img src="../siteImg/mailIcon.jpg" alt="" width="50" height="50" align="absmiddle"></a></td>
        <td width="168" align="center"><a href="news.php">Newsletters</a></td>
        <td width="168" align="center">&nbsp;</td>
      </tr>
            <tr>
              <td align="center"><a href="members.php"><img src="../siteImg/usersIcon.jpg" alt="" width="50" height="50" align="absmiddle"></a></td>
        <td align="center"><a href="members.php">Members</a></td>
        <td align="center">&nbsp;</td>
        </tr>
            <tr>
              <td align="center"><a href="gallery.php"><img src="../siteImg/galleryIcon.jpg" alt="" width="50" height="50" align="absmiddle"></a></td>
        <td align="center"><a href="album.php">Albums</a></td>
        <td align="center">&nbsp;</td>
        </tr>
            <tr>
              <td align="center"><a href="eventMonth.php"><img src="../siteImg/calIcon.jpg" alt="" width="50" height="50" align="absmiddle"></a></td>
        <td align="center"><a href="eventMonth.php">Events</a></td>
        <td align="center">&nbsp;</td>
        </tr>
            <tr>
              <td align="center"><a href="eventMonth.php"><img src="../siteImg/ytIcon.jpg" alt="" width="50" height="50" align="absmiddle"></a></td>
              <td align="center"><a href="video.php">Videos</a></td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><a href="eventMonth.php"><img src="../siteImg/meetIcon.jpg" alt="" width="50" height="50" align="absmiddle"></a></td>
              <td align="center"><a href="meeting.php">Meetings</a></td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><a href="eventMonth.php"><img src="../siteImg/facebook.jpg" alt="" width="50" height="50" align="absmiddle"></a></td>
              <td align="center"><a href="facebook.php">Facebook</a></td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><a href="eventMonth.php"><img src="../siteImg/Cent.jpg" alt="" width="50" height="50" align="absmiddle"></a></td>
              <td align="center"><a href="shows.php">Shows</a></td>
              <td align="center">&nbsp;</td>
            </tr>
    </table>
<div id="calDiv">
  <?php 
echo $Calendar->monthControls2($month, $year);
echo $Calendar->drawClubcalendar2($month, $year, $coinClubID=$User->getCoinClubID());
?>
</div>

<hr class="clear" />

<h3>Club Activity</h3>


    <p>&nbsp;</p>
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