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
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	gatekeeper();
		
	$video_guid = get_input('video_guid');
	$video = get_entity($video_guid);
	
	// Get the current page's owner
	if ($container = $video->container_guid) {
		set_page_owner($container);
	}
	$video_owner = page_owner_entity();
	if ($video_owner === false || is_null($video_owner)) {
		$video_owner = $_SESSION['user'];
		set_page_owner($video_owner->getGUID());
	}
	
	$title = elgg_echo("youtube:edit");
	$body = elgg_view_title($title);
	
	if (($video) && ($video->canEdit()))
	{
		add_submenu_item(elgg_echo('youtube:delete'),"{$CONFIG->wwwroot}action/youtube/delete/{$video->getGUID()}", 'videosactions', true);
		add_submenu_item(elgg_echo('youtube:view'),"{$CONFIG->wwwroot}pg/youtube/view/{$video->getGUID()}", 'videosactions', false);
		add_submenu_item(elgg_echo('youtube:all'),"{$CONFIG->wwwroot}pg/youtube/world/{$container}", 'videosactions', false);
		$body .= elgg_view("youtube/forms/youtube/edit", array('entity' => $video));
			 
	} else {
		$body .= elgg_echo("pages:noaccess");
	}
	
	$body = elgg_view_layout('two_column_left_sidebar', '', $body);
	
	page_draw($title, $body);
?>