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

	$video_guid = get_input('video_guid');
	$context = get_context();
	set_context('video');
		
	$video = get_entity($video_guid);
	if (!$video) forward();

	$container = $video->container_guid;
	
	if ($container) {
		set_page_owner($container);
		
	} else {
		set_page_owner($video->owner_guid);
	}
	$owner = get_entity(page_owner());
	global $CONFIG;
	// add_submenu_item(sprintf(elgg_echo("pages:user"), page_owner_entity()->name), $CONFIG->url . "pg/pages/owned/" . page_owner_entity()->username, 'pageslinksgeneral');
	
	if ($video->canEdit()) {
		add_submenu_item(elgg_echo('youtube:delete'),"{$CONFIG->wwwroot}action/youtube/delete?video_guid={$video->getGUID()}", 'videosactions', true);
	}
	if ($owner instanceof Club){
			add_submenu_item(elgg_echo('youtube:clubs:owned'),$CONFIG->wwwroot."pg/youtube/owned/".$owner->getGUID(),'videosactions');
	}else{
			if ($owner instanceof ElggGroup){
					add_submenu_item(elgg_echo('youtube:groups:owned'),$CONFIG->wwwroot."pg/youtube/owned/".$owner->getGUID(),'videosactions');
				
			}else{
				if ($owner instanceof ElggUser){
					add_submenu_item(elgg_echo('youtube:users:owned'),$CONFIG->wwwroot."pg/youtube/owned/".$owner->getGUID(),'videosactions');
				}
			}
	}
	set_context($context);
	$title = $video->title;
	
	$body .= elgg_view_title($video->title);
	$body .= elgg_view_entity($video, true);
	
	//add comments
	//$body .= elgg_view_comments($pages);
	
	$body = elgg_view_layout('two_column_left_sidebar', '', $body);
	
	// Finally draw the page
	page_draw($title, $body);
?>