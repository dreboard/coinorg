<?php
    
	/**
	 * Elgg Youtube Plugin
	 * This plugin allows users to make youtube link in the elgg platform
	 * 
	 * @package ElggYoutube
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Matthieu Petite <matthieu@antyda.com>
	 * @copyright Matthieu Petite Ltd 2008-2009
	 * @link http://www.antyda.com/
	 */
	 
	// Load configuration
	global $CONFIG;
	
	gatekeeper();
	set_context('youtube_video');

	// Get video fields
	$input = array();
	foreach($CONFIG->youtube as $shortname => $valuetype) {
		$input[$shortname] = get_input($shortname);
	}
	
	// New or old?
	$video = NULL;
	$video_guid = (int)get_input('video_guid');
	if ($video_guid)
	{
		$video = get_entity($video_guid);
		if (!$video->canEdit())
			$video = NULL; // if we can't edit it, go no further.
	}
	else
	{
		$video = new ElggObject();
		$video->subtype = 'youtube_video';

		// New instance, so set container_guid
		$container_guid = get_input('container_guid', $_SESSION['user']->getGUID());
		$video->container_guid = $container_guid;
	}
	
	// Have we got it? Can we edit it?
	if ($video instanceof ElggObject)
	{
		// Yes we have, and yes we can.
		
		// Save fields - note we always save latest description as both description and annotation
		if (sizeof($input) > 0)
		{
			foreach($input as $shortname => $value) {
					$video->$shortname = $value;
			}
		}
		
	
		// Validate create
		if (!$video->title)
		{
			register_error(elgg_echo("youtube:title"));
			
			forward($_SERVER['HTTP_REFERER']);
			exit;
		}
		
		// Access ids
		$video->access_id = (int)get_input('access_id', ACCESS_PRIVATE);
	
		// Ensure ultimate owner
		$video->owner_guid = ($video->owner_guid ? $video->owner_guid : $_SESSION['user']->guid); 
		
		// finally save
		if ($video->save())
		{
			// Now save description as an annotation
			$video->annotate('youtube_video', $video->description, $video->access_id);
			system_message(elgg_echo("pages:saved"));
			
			//add to river
			//add_to_river('river/object/youtube/create','create',$_SESSION['user']->guid,$video->guid);
		
			// Forward to the video's profile
			forward($CONFIG->wwwroot."/pg/youtube/view/".$video->getGUID());
			exit;
		}
		else
			register_error(elgg_echo('youtube:notsaved'));

	}
	else
	{
		register_error(elgg_echo("youtube:noaccess"));
	}
	

	// Forward to the user's profile
	forward($CONFIG->wwwroot."/pg/youtube/view/".$video->getGUID());
	exit;
	
	
?>