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
	$video_guid = get_input('video_guid');
	
	if ($video = get_entity($video_guid)) {
		
		if ($video->canEdit()) {
			
				// Bring all child elements forward
				$owner = $video->owner;	
				$arrayMetaData = get_metadata_for_entity ($video->getGUID());
				foreach ($arrayMetaData as $metadata){
					$arrayMetaData->delete();	
				}
				if ($video->delete()) {
					
					system_message(elgg_echo('pages:delete:success'));
					forward('pg/youtube/owned/' . $owner);
					exit;
				}
			
		}
		
	}
	
	register_error(elgg_echo('pages:delete:failure'));
	forward($_SERVER['HTTP_REFERER']);

?>