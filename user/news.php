<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Coin News</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}

.rss-box {
	background-color: #808080; 
	border-style: solid; border-width: 1px; border-color: #CCCCCC; 
	padding: 0; 
	width: 250px;
}
.rss-items {
	margin-top:0px;
	padding:0.5em; 0.5em;
	margin-left:5px;
	color:#FFFFFF;
}
p.rss-title {padding:0.5em;}
.rss-title {
	padding: 5px; 
	background: #666666; color: white; 
	font-family: "Times New Roman", Times, serif; font-size: 14px;     
        font-weight: bold; 
	text-align: left; vertical-align: top 
	font-size: 90%;
	margin: 0px;
	padding:0em;
}

.rss-item  {
  font-family: verdana, arial, sans-serif;
  font-size: 0.75em;
  font-weight : normal;
  color: #020202;
  list-style:none;
  padding-bottom:1em;
}

.rss-item a {
	text-decoration : underline;
	color:black;
	font-size: 105%;
	font-weight:bold;
	font-family:arial, sans-serif;
	}
	
.rss-item a:visited {
	color:purple;
}

.rss-date {
	font-size: 85%;
	font-weight : normal;
	color: #151515;
	}

 
/* buttons modeled from http://www.wellstyled.com/css-inline-buttons.html */

.pod-play {
   _width:12em;
   margin: 0 0.2em; padding: 0.1em 0; _padding:0;
   
   white-space:nowrap;
   text-decoration: none;
   vertical-align:middle;
   background: #fb6;
   color: black;
   }
.pod-play em {
   _width:1em; _cursor:hand;
   font-style: normal;
   margin:0; padding: 0.1em 0.5em;
   background: white;
   color: #222;
   }
.pod-play span {
   _width:1em; _cursor:hand;
   margin:0; padding: 0.1em 0.5em 0.1em 0.3em;
   }
.pod-play:hover {
   background: #666;
   color: white;
   }
.pod-play:hover em {
   background: black;
   color: white
   }
iframe {margin-left:0px;}
#newsStoretbl td {padding:0px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>Coin News</h1>
<br />
<script language="JavaScript" src="http://itde.vccs.edu/rss2js/feed2js.php?src=https%3A%2F%2Fwww.usmint.gov%2FrssProdInfo.xml&chan=y&num=0&desc=0&date=n&targ=n" type="text/javascript"></script>

<noscript>
<a href="http://itde.vccs.edu/rss2js/feed2js.php?src=https%3A%2F%2Fwww.usmint.gov%2FrssProdInfo.xml&chan=y&num=0&desc=0&date=n&targ=n&html=y">View RSS feed</a>
</noscript>
<br />

<table width="100%" border="0" cellpadding="0" id="newsStoretbl">
  <tr>
    <td width="383" rowspan="2" align="left" valign="top"><script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2FCoinNewsnet%3Fformat%3Dxml&chan=y&num=20&date=y&utf=y"  charset="UTF-8" type="text/javascript"></script>

<noscript>
<a href="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2FCoinNewsnet%3Fformat%3Dxml&chan=y&num=20&date=y&utf=y&html=y">View RSS feed</a>
</noscript>
</td>
    <td width="189" rowspan="2" align="left" valign="top">&nbsp;</td>
    <td width="741" align="center" valign="top"><?php
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
get_latest_video('PCGSVideo', '470','283');
?></td>
  </tr>
  <tr>
    <td align="center" valign="top">
    <br />
    <object width="355" height="355"><param name="movie" value="http://togo.ebay.com/togo/seller.swf?2008013100" /><param name="flashvars" value="base=http://togo.ebay.com/togo/&lang=en-us&seller=artcoins" /><embed src="http://togo.ebay.com/togo/seller.swf?2008013100" type="application/x-shockwave-flash" width="355" height="355" flashvars="base=http://togo.ebay.com/togo/&lang=en-us&seller=artcoins"></embed></object>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>