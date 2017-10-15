<?php
    if ($vars['full']) {
		echo elgg_view("youtube/videoprofile",$vars);
	} else {
		if (get_input('search_viewtype') == "gallery") {
			echo elgg_view('youtube/videogallery',$vars); 				
		} else {
			echo elgg_view("youtube/videolisting",$vars);
		}
	}
?>