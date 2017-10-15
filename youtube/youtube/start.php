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

		
		function youtube_init() {
    		
    			global $CONFIG;
    			// Extend system JS with our own javascript, which are defined in the youtube/scripts view
				//extend_view('js','youtube/js/cycle'); //FIND OUT ABOUT THIS?
			
    			//add a widget
			    //add_widget_type('youtube',"Youtube","This is your youtube feed");
				
				// Set up menu for logged in users
				if (isloggedin()) {
					add_menu(elgg_echo('youtube:video'), $CONFIG->wwwroot . "pg/youtube/owned/" . $_SESSION['user']->getGUID());
				// And for logged out users
				} else {
					add_menu(elgg_echo('youtube:video'), $CONFIG->wwwroot . "mod/youtube/world.php",array(
					));
				}
				// Register a page handler, so we can have nice URLs
				register_page_handler('youtube','youtube_page_handler');
				
				// Register entity type
				register_entity_type('object','youtube_video');
				
				// Extend hover-over menu	
				extend_view('profile/menu/links','youtube/menu');
		
				// Register Actions
				register_action("youtube/edit",false, $CONFIG->pluginspath . "youtube/actions/edit.php");
				register_action("youtube/delete",false, $CONFIG->pluginspath . "youtube/actions/delete.php");
		
				// Register youtube value
				$CONFIG->youtube = array(
								'title'=>'text',
								'video_url'=>'url',
								'description'=>'longtext',
								'access_id' => 'access',
								);
			
		}
		
		/**
		 * Sets up submenus for the pages system.  Triggered on pagesetup.
		 *
		 */
		function youtube_submenus() {
			
			global $CONFIG;
			
			$page_owner = page_owner_entity();
			
			// Group submenu option	
			if ($page_owner instanceof ElggGroup && get_context() == 'groups') {	    			
					add_submenu_item(elgg_echo('youtube:groups:owned'),$CONFIG->wwwroot."pg/youtube/owned/".$page_owner->getGUID());
			}
			// Club submenu option
			if ($page_owner instanceof Club && get_context() == 'clubs') {	    							   
					add_submenu_item(elgg_echo('youtube:clubs:owned'),$CONFIG->wwwroot."pg/youtube/owned/".$page_owner->getGUID());
			}
		
				
	    }
		
		/**
		 * Pages page handler.
		 *
		 * @param array $page
		 */
		function youtube_page_handler($page)
		{
			global $CONFIG;
			
			if (isset($page[0]))
			{
				// See what context we're using
				switch($page[0])
				{
					case "new" :
						if (isset($page[1]))
	    					set_input('container_guid', $page[1]);
						include($CONFIG->pluginspath . "/youtube/new.php");
	          		break;
					case "view" :
    					if (isset($page[1]))
    						set_input('video_guid', $page[1]);

	    				 	$entity = get_entity($page[1]);
	    				 	//add_submenu_item(elgg_echo('pages:label:view'), $CONFIG->url . "pg/pages/view/{$page[1]}", 'pageslinks');
	    					 if (($entity) && ($entity->canEdit())) add_submenu_item(elgg_echo('youtube:edit'), $CONFIG->url . "pg/youtube/edit/{$page[1]}", 'videosactions');
	    					 	include($CONFIG->pluginspath . "youtube/view.php");
					break;
					case "world":
						include($CONFIG->pluginspath . "youtube/world.php");
					break;
					case "edit":
						if (isset($page[1]))
	    					set_input('video_guid', $page[1]);
						include($CONFIG->pluginspath . "/youtube/edit.php");
					break;
					case "owned" :
    					// Owned by a user
    					if (isset($page[1]))
    						set_input('container_guid',$page[1]);
    					include($CONFIG->pluginspath . "youtube/index.php");	
    				break;
					default:
						include($CONFIG->pluginspath . "youtube/world.php");
				}
			}
		}
	    /**
		 * Extend permissions checking to extend can-edit for write users.
		 *
		 * @param unknown_type $hook
		 * @param unknown_type $entity_type
		 * @param unknown_type $returnvalue
		 * @param unknown_type $params
		 */
		function youtube_write_permission_check($hook, $entity_type, $returnvalue, $params)
		{
			global $CONFIG;
			
			
			if ($params['entity']->getSubtype() == 'youtube_video') {
			
				$write_permission = $params['entity']->access_id;
				$user = $params['user'];
				
				$container = $params['entity']->container_guid;
				
				if (($write_permission) && ($user))
				{
					//$list = get_write_access_array($user->guid);
					$list = get_access_array($user->guid); // get_access_list($user->guid);
					if (($write_permission!=0) && (in_array($write_permission,$list))){
						return true;
					}
				}
			}
		}
		
		/**
		 * Extend container permissions checking to extend can_write_to_container for write users.
		 *
		 * @param unknown_type $hook
		 * @param unknown_type $entity_type
		 * @param unknown_type $returnvalue
		 * @param unknown_type $params
		 */
		function youtube_container_permission_check($hook, $entity_type, $returnvalue, $params) {
			
			
			if (get_context() == "youtube") {
				if (page_owner()) {
					if (can_write_to_container($_SESSION['user']->guid, page_owner())) return true;
				}
				if ($video_guid = get_input('container_guid',0)) {
					$entity = get_entity($video_guid);
				} 
				if ($entity instanceof ElggObject) {
					if (
							can_write_to_container($_SESSION['user']->guid, $entity->container_guid)
							|| in_array($entity->access_id,get_access_list())
						) {
							return true;
					}
				}
			}
			
		}
		
		// write permission plugin hooks
		register_plugin_hook('permissions_check', 'object', 'youtube_write_permission_check');
		register_plugin_hook('container_permissions_check', 'object', 'youtube_container_permission_check');
		
			
		
		register_elgg_event_handler('init','system','youtube_init');
		register_elgg_event_handler('pagesetup','system','youtube_submenus');

?>