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

	global $CONFIG;
	
	// Get the current page's owner
	if ($container = (int) get_input('container_guid')) {
		set_page_owner($container);
	}
	$page_owner = page_owner_entity();
	if ($page_owner === false || is_null($page_owner)) {
		$page_owner = $_SESSION['user'];
		set_page_owner($_SESSION['guid']);
	}
		
	
	// Add menus
	$owner = page_owner_entity();
	if (!($owner instanceof ElggGroup)) {
    		add_submenu_item(sprintf(elgg_echo("youtube:user"), $owner->name), $CONFIG->url . "pg/youtube/owned/" . $owner->getGUID(), 'videosactions');
    		add_submenu_item(elgg_echo('youtube:all'),$CONFIG->wwwroot."mod/youtube/world.php", 'videosactions');
			if ($owner->getGUID() == $_SESSION['guid']){
				add_submenu_item(elgg_echo('youtube:new'), $CONFIG->url . "pg/youtube/new/" . $owner->getGUID(), 'videosaddactions');
			}
	}
    if (($owner instanceof ElggEntity) && (can_write_to_container(0,$owner->guid))){
       	if ($owner instanceof Club){
       		add_submenu_item(elgg_echo('youtube:new'), $CONFIG->url . "pg/youtube/new/" . $owner->getGUID(), 'videosaddactions');
			
       	}else{
			if ($owner instanceof ElggGroup){
				add_submenu_item(elgg_echo('youtube:new'), $CONFIG->url . "pg/youtube/new/" . $owner->getGUID(), 'videosaddactions');
			}
		}
    }
    if (is_callable('group_gatekeeper')) group_gatekeeper();
	
	$limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	
	$title = sprintf(elgg_echo("youtube:user"),$owner->name);
	
	// Get objects
	$context = get_context();
	
	set_context('search');
	
	$objects = list_entities("object", "youtube_video", page_owner(), $limit, false);
	
	set_context($context);
	
	
	$body = elgg_view_title($title);
	$body .= $objects;
	$body = elgg_view_layout('two_column_left_sidebar', '', $body);
	
	// Finally draw the page
	page_draw($title, $body);
?>