<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>youtube playlist jQuery and php Gdata Api html5</title>
<meta name="description" content="youtube keyword playlist jquery and php Gdata Api version2" />
<meta name="copyright" content="www.cfconsultancy.nl" />
<meta name="web_author" content="Ceasar Feijen" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<!-- Remove all above if you are including this file -->

<!-- Needed for the youtube player -->
<link rel="stylesheet" type="text/css" href="css/youtubeplaylist.css" />

<!-- Example css playlist to the right. See example 3 -->
<link rel="stylesheet" type="text/css" href="css/youtubeplaylist-right-with-thumbs.css" />

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.youtubeplaylist-min.js"></script>
<script type="text/javascript">
		$(function() {
            <!-- videoThumb is a css class found in the foreach list class="videoThumb". ytvideo is the holder ID set as div ID-->
			$(".videoThumb").ytplaylist({
				holderId: 'ytvideo',
                html5: true,
                <!-- Normal = 640 -->
        		playerWidth: '640',
                <!-- set 0 if controls is false or autohide is true - default is 30 -->
        		adjustHeight: '0',
                autoPlay: true,
                autoHide: true,
                playOnLoad: false,
                sliding: true,
                slideshow: false,
                slidingshow: true,
                playfirst: 0,
                theme: '&amp;theme=dark&amp;color=red',
                controls: true
			});
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
			$(".videoThumb3").ytplaylist({
				holderId: 'ytvideo3',
				html5: false,
				theme: '&amp;theme=light&amp;color=red',
				autoPlay: true,
				adjustHeight: '30',
				autoHide: false,
				playOnLoad: false,
				sliding: false,
				slideshow: true,
				modestbranding: true,
				showInfo: false
			});
			$(".videoThumb4").ytplaylist({
				holderId: 'ytvideo4',
				html5: true,
        		playerWidth: '520',
				autoPlay: true,
				sliding: false,
				listsliding: true,
				slidingshow: true,
				social: true,
				autoHide: false,
				playfirst: 0,
				playOnLoad: false,
				modestbranding: true,
				showInfo: false
			});
		});
</script>
<!-- END youtube player -->
<!-- Remove if you are including this file -->
</head>
<body>
<!-- END  -->

<!-- Needed for the youtube player -->
<div class="youtubeplayer">
    <!--Only used for the demo. Just remove -->
    <h1>youtube playlist jQuery, html5 and php Gdata Api v2</h1>
    <h2>Example html5 with the searchbox enabled (autohide playbar, social icons, slideshow (loop) and sliding effect)</h2>
    <!-- END  -->
    <div class="yt_holder">
        <div id="ytvideo" style="z-index:1;"></div>
            <!--Up and Down arrow -->
  			<div class="you_up"><img src="css/up_arrow.png" alt="+ Slide" title="HIDE" /></div>
  			<div class="you_down"><img src="css/down_arrow.png" alt="- Slide" title="SHOW" /></div>
            <!-- END  -->
			<div class="youplayer">
				<ul class="videoyou">
	            <?php
	            /***************************************************************************
	            //youtube playlist jquery plugin Html5 Gdata Api v2  : 4.0
	            //released:             : Sep 12 2012
	            //copyright             : Copyright © 2012 cfconsultancy
	            //email                 : info@cfconsultancy.nl
	            //website               : http://www.cfconsultancy.nl
	            ***************************************************************************/
	            // Use like this.
	            include_once('class/class.youtubelist.php');

                //First set the type, keywords, username, favorites or playlist
	            $video = new youtubelist('keywords');

	            //remove this if you don't want anyone to change the results
	            if (!isset($_GET['q']) || empty($_GET['q']) || $_GET['q'] == 'Keywords') {
	            //END

	            //Default keywords, username, favorites or playlist (in this example keywords)
	            $video->set_keywords('webm');

	            //remove this if you don't want anyone to change the results
	                } else {

	            $video->set_keywords(htmlspecialchars($_GET['q'], ENT_QUOTES));
	            }
	            //END

                //Max results
	            $video->set_max(50);
                // --set sorting order: relevance, published, viewCount, rating or none; default: relevance
                // --set to none if you want to get realtime video's from a  username (channel) !
                // --Extra order for a playlist is title (Entries are ordered alphabetically by title) Default entries are ordered by their position in the playlist
                // --Or commentCount (Entries are ordered by number of comments from most comments to least comments)
	            $video->set_order('relevance');
                //--Cache the feed
	            $video->set_cachexml(false);
                // --How long must the cach been saved (in seconds)
	            $video->set_cachelife(86400);
                // --Set where to store xml files
	            $video->set_xmlpath('./cache/');
                // --Set safesearch possible: none, moderate, strict; default: strict
	            $video->set_safeSearch('strict');
                // --OPTIONAL - Set lang; codes can be found here http://www.loc.gov/standards/iso639-2/php/code_list.php row ISO 639-1 Code
                // --If not set all languages will appear in the results
	            $video->set_lang('en');
                // --OPTIONAL - The restriction parameter identifies the IP address that should be used to filter videos that can only be played in specific countries. Or don't use
	            //$video->set_restriction($_SERVER['REMOTE_ADDR']);
                // --OPTIONAL - The caption parameter enables you to restrict a search to videos that have or do not have caption tracks. true or false or don't use.
	            //$video->set_caption('true');
                // --Starting point. default 1
	            $video->set_start(1);
	            // --OPTIONAL - The time parameter restricts the search to videos uploaded within the specified time.
	            // --Valid values for this parameter are today (1 day), this_week (7 days), this_month (1 month) and all_time. The default value for this parameter is all_time.
                $video->set_time('all_time');
                // --OPTIONAL - Search only 3d. Only used for the search option or don't set.
                //$video->set_3d('true');
                // --OPTIONAL - Search only HD. Only used for the search option or don't set.
                //$video->set_hd('true');
                // --OPTIONAL - Search for license. possible: cc, youtube. Only used for the search option or don't set.
                //$video->set_license('youtube');
                // --OPTIONAL - Search for duration. possible: short, medium, long. Only used for the search option or don't set.
                //$video->set_duration('long');
                // --OPTIONAL - Set length title and description text
                $video->set_descriptionlength(300);
                $video->set_titlelength(75);

                //This part is the foreach list
	            if ( $video->get_videos() !=null ) {
	                foreach ($video->get_videos() as $yKey => $yValue) {
	                    echo '<li><p>' . $yValue['title'] . '</p><span class="time">' . $yValue['time'] . '</span><a class="videoThumb" href="http://www.youtube.com/watch?v=' . $yValue['videoid'] . '">' . $yValue['description'] . '</a></li>';
	                }
	            }else{
	                echo '<li>Sorry, no video\'s found</li>';
	            }
	            //End list
	            ?>
       			</ul>
	      		<!-- remove this if you don't want anyone to change the results -->
	      		<div class="search">
	                <form id="quick-search" action="<?php echo basename(__FILE__); ?>" method="get" onsubmit="this.submit();return false;">
	                <p>
	                <label for="qsearch">Search:</label>
	                <input class="tbox" id="qsearch" type="text" name="q" value="Keywords" title="Start typing and hit ENTER" onblur="if(this.value=='') this.value='Keywords';" onfocus="if(this.value=='Keywords') this.value='';" />
	                <input class="btn" alt="Search" type="image" name="searchsubmit" title="Search" src="css/search.gif" />
	                </p>
	                </form>
	      		</div>
	      		<!-- END -->
        </div>
        <!-- Remove if you don't want the footer shadow -->
        <div style="height:0px; font-size:0em;clear:both;">&nbsp;</div>
        <div class="ytfooter">&nbsp;</div>
        <!-- END -->
    </div>
</div>
<!-- END youtube player -->

<div style="height:20px; font-size:0.1em;clear:both;">&nbsp;</div>

<!-- Needed for the youtube player example 2-->
<div class="youtubeplayer">
    <!--Only used for the demo. Just remove --><h2>Example userlist (channel) version (showinfo false)</h2><!-- END  -->
    <div class="yt_holder">
    	<div id="ytvideo2"></div>
            <!--Up and Down arrow -->
  			<div class="you_up"><img src="css/up_arrow.png" alt="+ Slide" title="HIDE" /></div>
  			<div class="you_down"><img src="css/down_arrow.png" alt="- Slide" title="SHOW" /></div>
            <!-- END  -->
			<div class="youplayer">
			<ul class="videoyou">
	        <?php
	        // Use like this.
	        include_once('class/class.youtubelist.php');
	        $video = new youtubelist('username');
	        //Default keywords or username or playlist (in this example username)
	        $video->set_username('rpoland');
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
<!-- END youtube player -->

<div style="height:20px; font-size:0.1em;clear:both;">&nbsp;</div>

<!-- Needed for the youtube player example 3-->
<div class="youtubeplayer">
    <!--Only used for the demo. Just remove --><h2>Example userlist (channel) version with 100 video's (showinfo false and slideshow is true)</h2><!-- END  -->
    <div class="yt_holder">
    	<div id="ytvideo3"></div>
            <!--Up and Down arrow -->
  			<div class="you_up"><img src="css/up_arrow.png" alt="+ Slide" title="HIDE" /></div>
  			<div class="you_down"><img src="css/down_arrow.png" alt="- Slide" title="SHOW" /></div>
            <!-- END  -->
			<div class="youplayer">
			<ul class="videoyou">
	        <?php
	        // Use like this.
	        include_once('class/class.youtubelist.php');
	        $video = new youtubelist('username');
	        //Default keywords or username or playlist (in this example username)
	        $video->set_username('rpoland');
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
	                echo '<li><p>' . $yValue['title'] . '</p><span class="time">' . $yValue['time'] . '</span><a class="videoThumb3" href="http://www.youtube.com/watch?v=' . $yValue['videoid'] . '" rel="nofollow">' . $yValue['description'] . '</a></li>';
	            }
	        }else{
	            echo '<li>Sorry, no video\'s found</li>';
	        }
	        $video = new youtubelist('username');
	        //Default keywords or username or playlist (in this example username)
	        $video->set_username('rpoland');
	        $video->set_max(50);
	        $video->set_order('none');
	        $video->set_cachexml(false);
	        $video->set_cachelife(86400);
	        $video->set_xmlpath('./cache/');
	        $video->set_safeSearch('strict');
	        $video->set_lang('en');
	        //for a result of 100 start with 51
	        $video->set_start(51);

	        if ( $video->get_videos() !=null ) {
	            foreach ($video->get_videos() as $yKey => $yValue) {
	                echo '<li><p>' . $yValue['title'] . '</p><span class="time">' . $yValue['time'] . '</span><a class="videoThumb3" href="http://www.youtube.com/watch?v=' . $yValue['videoid'] . '" rel="nofollow">' . $yValue['description'] . '</a></li>';
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
<!-- END youtube player -->

<div style="height:20px; font-size:0.1em;clear:both;">&nbsp;</div>

<!-- Needed for the youtube player example 3 -->
<div class="youtubeplayer">
    <!--Only used for the demo. Just remove --><h2>Example playlist version with playlist to the right (with thumbs, slideshow (loop) and only listsliding)</h2><!-- END  -->
    <div class="yt_holder yt_holder_right">
    	<div id="ytvideo4"></div>
            <!--Up and Down arrow -->
  			<div class="you_up"><img src="css/up_arrow.png" alt="+ Slide" title="HIDE" /></div>
  			<div class="you_down"><img src="css/down_arrow.png" alt="- Slide" title="SHOW" /></div>
            <!-- END  -->
			<div class="youplayer ytplayerright">
			<ul class="videoyou videoytright">
	        <?php
	        // Use like this.
	        include_once('class/class.youtubelist.php');
            //in this example a playlist
	        $video = new youtubelist('playlist');
	        //This is the link to the playlist.
	        //http://www.youtube.com/playlist?list=PLAEAD0FC99564BA7F
	        $video->set_playlist('C4FBCA46405A8BF8');
	        $video->set_max(50);
	        $video->set_order('none'); // to retrieve most actual video's
	        $video->set_cachexml(true);
	        $video->set_cachelife(86400);
	        $video->set_xmlpath('./cache/');
	        $video->set_start(1);
            // --Set text and description length
            $video->set_descriptionlength(85);
            $video->set_titlelength(25);

	        if ( $video->get_videos() !=null ) {
	            foreach ($video->get_videos() as $yKey => $yValue) {
	                echo '<li><p>' . $yValue['title'] . '</p><span class="time timeright">' . $yValue['time'] . '</span><a class="videoThumb4" href="http://www.youtube.com/watch?v=' . $yValue['videoid'] . '">' . $yValue['description'] . '</a></li>';
	            }
	        }else{
	            echo '<li>Sorry, no video\'s found</li>';
	        }
	        ?>
       		</ul>
        </div>
        <!-- Remove if you don't want the footer shadow -->
        <div style="height:0px; font-size:0em;clear:both;">&nbsp;</div>
        <div class="ytfooter ytfooterright">&nbsp;</div>
        <!-- END -->
    </div>
</div>
<!-- END youtube player -->


<!-- Remove if you are including this file -->
<div class="youtubeplayer" style="clear:both;">
<div style="height:10px; font-size:0.1em;clear:both;">&nbsp;</div>
<h3>Player options jQuery</h3>
<p>The player acts on a simple unordered list containing links to YouTube videos which are created by a little php script</p>
<p><strong>holderId - </strong><em>(ytvideo)</em><br />The ID of the element (usually a div) into which the YouTube video will be inserted</p>
<p><strong>html5 - </strong><em>(true)</em><br />Uses the experimental iframe player version from youtube for html5 support</p>
<p>NOTE: Only works in Chrome and IE9 beta with flash fallback for all other browsers. Also most of the parameters like colors doesn't work yet. Youtube is working on this new embed method.
<br /><b>Use the html 5 option at your own risk</b>.
<br />More info here <a href="http://www.youtube.com/html5" target="_blank">http://www.youtube.com/html5</a>
</p>
<h3>NEW version 4</h3>

<h2>NEW auto loop through playlist</h2>
<ul>
<li><strong>slidingshow - </strong><em>(false)</em><br />Set to true to play the complete playlist one after another in a continues loop
</li>
</ul>
<p><strong>social - </strong><em>(true)</em><br /> Facebook and twitter icons with mouseover video. Set to false ro remove (default = true)</p>
<p><strong>slideshow - </strong><em>(false)</em><br /> Set to true ro remove the playlist below the player and activates the new auto playlist player from youtube (default = false)</p>
<p><strong>sliding - </strong><em>(false)</em><br /> Set to true to let the list scroll up and show the arrows (default = false)</p>
<p><strong>listsliding - </strong><em>(false)</em><br /> Set to true to only let the list scroll up (default = false)</p>
<p><strong>adjustHeight - </strong><em>(30)</em><br /> Instead of adjusting the css you can set the heifgt of the video for all behaviours (like autohide true or not ect.)</p>
<p><strong>autoHide - </strong><em>(true)</em><br /> Hide, Unhide the player bar (true or false)</p>
<p><strong>playOnLoad - </strong><em>(false)</em><br /> Auto play by onload page (true or false)</p>
<p><strong>playfirst - </strong><em>(0)</em><br /> Select the video to start with. 0 is the first, 1 the second ect.</p>
<p><strong>playerHeight - </strong><em>(385)</em><br /> The height of the embdedded youtube video</p>
<p><strong>playerWidth</strong> - <em>(640)</em><br />The width of the embdedded youtube video</p>
<p><strong>showRelated</strong> - <em>(true)<br /></em>Set to <em><strong>false </strong></em>to stop related videos being shown at the end of the embedded video</p>
<p><strong>showInfo</strong> - <em>(true)<br /></em>Set to <em><strong>false </strong></em>to stop the title being shown in the video</p>
<p><strong>wmode</strong> - <em>(true)<br /></em>Set to <em><strong>false </strong></em> if you don't want wmode=opaque (html5 only)</p>
<p><strong>modestbranding</strong> - <em>(true)<br /></em>Set to <em><strong>false </strong></em>to show the youtube logo on the playerbar</p>
<p><strong>controls</strong> - <em>(true)<br /></em>Set to <em><strong>false </strong></em>to remove the player bar (only player 3 and html5)</p>
<p><strong>Theme color option</strong> - <em>&theme=dark&color=red (default)<br /></em>Since august 10 2011 a new player is introduced by youtube. There are four themes available.
<br /><img src="player-colors-youtube.jpg" width="550" height="185" alt="" /><br />(Note: Using the desaturated color disables the modestbranding option.)</p>
<p><strong>allowFullScreen</strong> - <em>(true)<br /></em>Add the full screen button (doesn't work with the html5 version)</p>
<h3>Player options php</h3>
<p><strong>Choose which feed you want</strong><br />keywords, playlist or userchannel</p>
<p><strong>Easy remove the search option</strong></p>
<p><strong>Sort</strong>  <br />can be relevance (default), published, viewCount, rating or none</p>
<p><strong>Set to none</strong> if you want to get realtime video's from a  username (channel) !</p>
<p><strong>Extra sort playlist</strong>  <br />Set title to ordered alphabetically by title or commentCount (Entries are ordered by number of comments from most comments to least comments)</p>
<p><strong>Set language filter</strong><br />for example en (english)</p>
<p><strong>Set time parameter to restrict the search to videos uploaded within the specified time</strong><br />for example 1 day or 1 month</p>
<p><strong>Set restriction filter</strong><br />The restriction parameter identifies the IP address that should be used to filter videos that can only be played in specific countries.
It is recommend that you always use this parameter to specify the end user's IP address. (By default, the API filters out videos that cannot be played in the country from which you send API requests.
This restriction is based on your client application's IP address.). Or don't use to get all video's.</p>
<p><strong>safeSearch</strong><br /> parameter none , moderate, strict</p>
<p><strong>caption</strong><br />The caption parameter enables you to restrict a search to videos that have or do not have caption tracks. true or false (within single quotes) or don't use.</p>
<p><strong>Cache the xml feed</strong><em>(true or false)</em></p>
<p><strong>Empty cached xml</strong><br />for example after one hour 3600, one day 86400 or one week 604800 (in seconds)</p>
<p><strong>Set length title and description text</strong><br />Standard is 75 and 300 characters
<p><strong>Set 3d</strong><br />Search only for 3d movies (works only in search mode). true (within single quotes)
<p>NEW <strong>Set HD</strong><br />Search only for HD movies (works only in search mode). true (within single quotes)
<p>NEW <strong>Set license</strong><br />Search only for movies with or cc or youtube license(works only in search mode)
<p>NEW <strong>Set duration</strong><br />To find videos less than 4 minutes long, use duration=short. To find videos that are between 4 and 20 minutes long (inclusive), use duration=medium. Only videos that are longer than 20 minutes will be returning when requesting duration=long(works only in search mode)
<h3>Advantage</h3>
<p><strong>Object-oriented programming</strong></p>
<p><strong>Everything is well documentated in this script so you can easy change things for your own needs</strong></p>
<p><strong>Optimized SEO</strong></p>
<p><strong>Easy integration in your website</strong></p>
<p><strong>Works in all major browsers</strong></p>
<h3>Resctrictions</h3>
<p>maximum 50 movies (youtube restriction)</p>
<h3>Purchase</h3>
<p>You can buy this script at codecanyon <a href="http://codecanyon.net/item/youtube-playlist-jquery-and-php-gdata-api/104623?ref=ceasar">here</a> for only $9</p>
</div>
</body>
</html>
<!-- END  -->