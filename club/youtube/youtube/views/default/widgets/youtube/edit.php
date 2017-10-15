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

?>
	<p>
		<?php echo elgg_echo("youtube:id"); ?>
		<input type="text" name="params[title]" value="<?php echo htmlentities($vars['entity']->title); ?>" />	
	</p>
	
	<p><?php echo elgg_echo("youtube:whatisid"); ?></p>
	<p>Caption <input type="text" name="params[caption]" value="<?php echo htmlentities($vars['entity']->caption); ?>" />	</p>