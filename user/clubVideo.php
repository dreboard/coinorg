<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
include "../youtube/channel/class/class.youtubelist.php";

if(isset($_GET["ID"])) {
$coinClubID = $Encryption->decode($_GET['ID']);
$CoinClub->getClubById($coinClubID);	
$channel = $CoinClub->getChannel();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Video Channel Gallery</title>


<script type="text/javascript" src="../youtube/channel/js/jquery.youtubeplaylist-min.js"></script>
<script type="text/javascript">
		$(function() {
            <!-- videoThumb is a css class found in the foreach list class="videoThumb". ytvideo is the holder ID set as div ID-->

			$(".videoThumb2").ytplaylist({
				holderId: 'ytvideo2',
				html5: true,
				theme: '&amp;theme=light&amp;color=red',
				autoPlay: true,
				autoHide: false,
				playOnLoad: false,
				sliding: true,
				slideshow: false,
				modestbranding: true,
				showInfo: false
			});


		});
</script>


<style type="text/css">
#youplayerDiv {width:700px; margin:0px auto;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<link rel="stylesheet" type="text/css" href="../youtube/channel/css/youtubeplaylist-right-with-thumbs.css">
<link rel="stylesheet" type="text/css" href="../youtube/channel/css/youtubeplaylist.css">
</head>

<body>
<div id="container">
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="contentHolder" class="wide">
<div id="content" class="inner">
    <h2 class="blueHdrTxt2">Video Channel</h2>
<div id="youplayerDiv">
<div class="youtubeplayer">

    <div class="yt_holder">
    	<div id="ytvideo2"></div>
            <!--Up and Down arrow -->
  			<div class="you_up"><img src="../youtube/css/up_arrow.png" alt="+ Slide" title="HIDE" /></div>
  			<div class="you_down"><img src="../youtube/css/down_arrow.png" alt="- Slide" title="SHOW" /></div>
            <!-- END  -->
			<div class="youplayer">
			<ul class="videoyou">
	        <?php
	        // Use like this.
	        $video = new youtubelist('username');
	        //Default keywords or username or playlist (in this example username)
	        $video->set_username($channel);
	        $video->set_max(50);
	        $video->set_order('none');
	        $video->set_cachexml(false);
	        $video->set_cachelife(86400);
	        $video->set_xmlpath('./cache/');
	        $video->set_lang('en');
            //for a result of 100 start with 1
	        $video->set_start(1);

	        if ( $video->get_videos() !=null ) {
                foreach ($video->get_videos() as $yKey => $yValue) {
	                echo '<li><p>' . $yValue['title'] . '</p><span class="time">' . $yValue['time'] . '</span><a class="videoThumb2" href="http://www.youtube.com/watch?v=' . $yValue['videoid'] . '" rel="nofollow">' . $yValue['description'] . '</a></li>';
	            }
	        }else{
	            echo '<li>Sorry, no video\'s found</li>';
	        }
	        ?>
       		</ul>
        </div>
        <!-- Remove if you don't want the footer shadow -->
        <div style="height:0px; font-size:0em;clear:both;">&nbsp;</div>
        <div class="ytfooter">&nbsp;</div>
        <!-- END -->
        </div>
        
    </div>
</div>

   <p class="clear">&nbsp;</p>
    <p><a href="http://www.youtube.com/subscription_center?add_user=MARVEL" target="_blank"><img src="../siteImg/ytIcon.jpg" width="50" height="50" align="absmiddle" /> <span class="brownLinkBold">Subscribe</span></a></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>


</div>                
</div>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</div><!--End container-->
</body>
</html>
<?php 
 if(isset($_SESSION['errorMsg'])) {
  unset($_SESSION['errorMsg']);
  } 
  
?>