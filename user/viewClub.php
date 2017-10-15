<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
include_once "../inc/facebook/src/facebook.php";
$facebook = new Facebook(array(
  'appId'  => '470818899631048',
  'secret' => 'f44f3691c4b79fe9d0c3c99b5f4f916e',
));

function getManagerLinks($userID, $coinClubID){
	$CoinClub = new CoinClub();
	$CoinClub->getClubById($coinClubID);	
	if($userID === $CoinClub->getClubAdmin()){
		return ' | <a href="mailUsers.php?coinClubID='.$coinClubID.'">Send Message</a>';
	  } else {
  return '';
  }
	
}



if(isset($_GET["ID"])) {
$coinClubID = $Encryption->decode($_GET['ID']);
$CoinClub->getClubById($coinClubID);	
$month = intval($_GET['month']);
$year = intval($_GET['year']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>View Club</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );


});
</script> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=172128739577962";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style type="text/css">
#calDiv {width:600px; padding:0px; float:left;}
.calendar {border-color:#999999;}
#listCal {float:left;}
.thumb {height:240px; width:auto;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1><?php echo $CoinClub->getClubName() ?></h1>
<p><?php 
if($CoinClub->getClubAdmin() == $userID){
		echo '<a href="enterEvent.php?coinClubID='.$coinClubID.'">Manage Members</a> | <a href="mailUsers.php?coinClubID='.$coinClubID.'">Send Message</a> | <a href="enterEvent.php?coinClubID='.$coinClubID.'">Add Event</a>';
	  } else {
  echo '';
	  }
 ?></p>
<table width="100%" border="0">
  <tr>
    <td width="13%"><strong> Club Type</strong></td>
    <td width="27%" align="right"><?php echo $CoinClub->getClubType() ?></td>
    <td width="60%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Members</strong></td>
    <td align="right"><?php echo $CoinClub->getMemberCount($coinClubID); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Manager</strong></td>
    <td align="right"><a href="viewClubProfile.php?ID=<?php echo $Encryption->encode($userID); ?>"><?php echo $CoinClub->getClubManageUserNamer($coinClubID) ?></a></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<hr />
<h3>Recent Activity</h3>


 <table width="100%">
 <td width="50%">
 <?php
/*
Function to embed the latest video from a YouTube Channel.
Parameters: The username of the Youtuber, the desired width of the video, the desired height of the video.
Example call: get_latest_video('wormholer693′, ’640′, ’385′);
Author: Andy Barratt
Website: http://www.andybarratt.co.uk
*/
function get_latest_video($username, $width, $height)
{
        //Set the URL of the search we’re using to get the specified user’s uploads.
        $url = 'http://gdata.youtube.com/feeds/api/users/'.$username.'/uploads';
        //Get the results from the url above and store them in a variable.
        $data = file_get_contents($url);
        //Create a filter to find the url of the first video in the retrieved data.
        $filter = "/<media:content url='(.+?)'/";
        //Use the preg_match function to run our filter on our data and return scraped text then the filtered text (video url) in an array.
        preg_match($filter,$data,$results);
        //store our videoURL in a variable.
        $videoURL = $results[1];
        
        //if a video was found
        if($videoURL)
        {
                //generate the code required to embed the video.
                $embedCode = '<object width="'.$width.'" height="'.$height.'"><param name="movie" value="'.$videoURL.'"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="'.$videoURL.'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="'.$width.'" height="'.$height.'"></embed></object>';
                //echo the embed code
                echo $embedCode;
        }
        else
        {
                echo 'No Video Found.';
        }
}
get_latest_video($CoinClub->getChannel(), '470','283');
?>
 </td>
<td>
<?php

$sql = mysql_query("SELECT * FROM album WHERE coinClubID = '$coinClubID' ORDER BY albumID DESC LIMIT 1 ") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
$albumID = intval($row['albumID']);
$Album->getAlbumByID($albumID);
echo '<a href="albumView.php?ID='.$Encryption->encode($albumID).'"><img title="'.$Album->getAlbumName().'" class="thumb" src="'.$Album->albumFirstPic($albumID).'" /></a><br />
<strong>Images:</strong> '.$Album->getAlbumImgCount($albumID).' <br /><a href="albumView.php?ID='.$Encryption->encode($albumID).'">'.$Album->getAlbumName().'</a>'; 

}
?>
</td>
 <tr>
   <td valign="middle" class="darker"><a href="clubVideo.php?ID=<?php echo $Encryption->encode($coinClubID); ?>"><img src="../siteImg/ytIcon.jpg" width="50" height="50" align="absmiddle" /> All Videos</a></td>
   <td><a href="clubAlbum.php?ID=<?php echo $Encryption->encode($coinClubID); ?>"><img src="../siteImg/galleryIcon.jpg" width="50" height="50" align="absmiddle" /> <strong>View All Albums</strong></a></td>
 </table>   
<p>
<strong>Recent Newsletter</strong><br />

<?php 
$sql = mysql_query("SELECT * FROM news WHERE coinClubID = '$coinClubID' AND newsType = 'Letter' ORDER BY newsID DESC LIMIT 1 ") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
$newsID = intval($row['newsID']);
$News->getNewsIDById($newsID);
echo '<a href="download.php?ID='.$Encryption->encode($newsID).'"><img src="../siteImg/newsIcon.jpg" width="50" height="50" align="absmiddle" />'.$News->getFileName().'</a>'; 

}
?>
</p>
<hr />


<h3>Club Events <?php echo date( 'F', mktime(0, 0, 0, $month) ); ?> <?php echo $year; ?></h3>

<table width="100%" border="0">
  <tr>
    <td width="38%" valign="top">
  <?php 
  	$sql = mysql_query("SELECT * FROM event WHERE MONTH(eventStartDate) = '$month' AND coinClubID = '$coinClubID'") or die(mysql_error());
	
	$html = '';
	$html .= '<ul>';
		while($row = mysql_fetch_array($sql))
		{
			$eventID = $row['eventID'];
			$Event->getEventById($eventID);
			$eventTitle = $row['eventTitle'];
			$html .= '<li><a class="'.$Event->getColorCode().'" href="eventDisplay.php?ID='.$Encryption->encode($eventID).'">'.$Event->getEventTitle().'</a></li>';
		}
	$html .= '</ul>';
	echo $html;
  ?>  
    </td>
    <td width="62%" valign="top"><div id="calDiv">
  <?php 
echo $Calendar->monthControls2($month, $year);
echo $Calendar->drawClubcalendar2($month, $year, $coinClubID=$User->getCoinClubID());
?>
</div></td>
  </tr>
</table>




<hr class="clear" />
<?php 
$ebayID = ' wintercoins';
?>

<table width="100%" border="0">
  <tr>
    <td width="50%" align="center" valign="top">
    <script language="JavaScript" src="http://lapi.ebay.com/ws/eBayISAPI.dll?EKServer&ai=aj%7Ckvpqvqlvxwkl&bdrcolor=FFCC00&cid=0&eksize=1&encode=UTF-8&endcolor=FF0000&endtime=y&fbgcolor=FFFFFF&fntcolor=000000&fs=0&hdrcolor=FFFFCC&hdrimage=1&hdrsrch=n&img=y&lnkcolor=0000FF&logo=2&num=5&numbid=y&paypal=n&popup=n&prvd=9&r0=3&shipcost=n&si=<?php echo $ebayID ?>&sid= <?php echo $ebayID ?>&siteid=0&sort=MetaEndSort&sortby=endtime&sortdir=asc&srchdesc=n&tbgcolor=FFFFFF&title=My+Listings+on+eBay+Closing+Soon...&tlecolor=FFCE63&tlefs=0&tlfcolor=000000&toolid=10004&width=570height=590"></script>
    </td>
    <td align="center">
    <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fmycoinor&amp;width=410&amp;height=590&amp;show_faces=true&amp;colorscheme=light&amp;stream=true&amp;border_color&amp;header=true&amp;appId=437896882943465" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:410px; height:590px;" allowTransparency="true"></iframe>
    
    </td>
  </tr>
</table>




<hr class="clear" />


<p><a class="topLink" href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>