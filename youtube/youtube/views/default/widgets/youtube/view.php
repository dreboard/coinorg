<?php
    
     /**
	 * Elgg youtube widget
	 * This plugin allows users to pull in their youtube video to display on their profile
	 * 
	 * @package Elggyoutube
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Robert Gay <robertg@windango.com>
	 * @copyright Windango, Inc. 2008
	 * @link http://elgg.com/
	 */
	 
	 //some required params
	 $youtube_id = $vars['entity']->title;
	 $caption = $vars['entity']->caption;

	 
    // if the youtube id is empty, then do not sure any photos
if($youtube_id){
	 
	echo $caption;
	if(preg_match("/vimeo.com/",$vars['entity']->title)){
		$pos = strripos($youtube_id, "m/") + 2;
		$youtube_id = substr($youtube_id, $pos);
?>
<object width="425" height="344"><param name="allowfullscreen" value="true" />	<param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $youtube_id; ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $youtube_id; ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="285" height="213"></embed></object>
<?php
	}
	else{
		$pos = strripos($youtube_id, "=") + 1;
	 	$youtube_id = substr($youtube_id, $pos);
?>
		
<object width="425" height="344"><param name="movie" value="http://www.youtube.com/v/<?php echo $youtube_id; ?>&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/<?php echo $youtube_id; ?>&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" width="285" height="213"></embed></object>

<?php 

	}
    
}
else {        
        echo "You have not yet entered your Youtube video url which is required to display your video.";
        
}
?>