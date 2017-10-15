<?php
    
	$url = $vars['entity']->url;
	$videoembed = elgg_view("youtube/youtubeembed", array('video_url'=>$url));
	$info  = "<div style='height:150px;margin-left:220px'>";
	$info .= "<b><a href=\"" . $vars['entity']->getUrl() . "\">" . $vars['entity']->title . "</a></b>";
	
	$latest = $vars['entity']->getAnnotations('youtube_video', 1, 0, 'desc');
	if ($latest) {
		$latest = $latest[0];
	
		$time_updated = $latest->time_created;
		$owner_guid = $latest->owner_guid;
		$owner = get_entity($owner_guid);
		
			
		$info .= "<p class=\"owner_timestamp\" >".sprintf(elgg_echo("youtube:strapline"),
						"<a href=\"" . $owner->getURL() . "\">" . $owner->name ."</a>"
		).", ".friendly_time($time_updated)."</p>";
	}
	$info .= "</div>";
	echo elgg_view_listing($videoembed, $info);
?>