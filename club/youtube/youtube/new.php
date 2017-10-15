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
	admin_gatekeeper();
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
		
    
    global $CONFIG;
	add_submenu_item(elgg_echo('youtube:new'), $CONFIG->url . "pg/youtube/new/" . page_owner_entity()->getGUID(), 'videolinksgeneral');
    
	$title = elgg_echo("youtube:new");
	$area2 .= elgg_view_title($title);
	$area2 .= elgg_view("youtube/forms/youtube/edit");
	
	$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);
	
	page_draw($title, $body);
?>  