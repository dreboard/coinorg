<?php
	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */
	$container_guid = get_input('container_guid');
	if (!$container_guid) $container_guid = page_owner();
	$new_page = false;
	if (!$vars['entity']) {
		$new_video = true;
		
		// bootstrap the access permissions in the entity array so we can use defaults
		if (defined('ACCESS_DEFAULT')) {
			$vars['entity']->access_id = ACCESS_DEFAULT;
		} else {
			$vars['entity']->access_id = 0;
		}
	}
?>
<div class="contentWrapper">
<form action="<?php echo $vars['url']; ?>action/youtube/edit" method="post">

<?php

	//var_export($vars['profile']);
	if (is_array($vars['config']->youtube) && sizeof($vars['config']->youtube) > 0)
		foreach($vars['config']->youtube as $shortname => $valtype) {
?>

	<p>
		<label>
			<?php echo elgg_echo("youtube:{$shortname}") ?><br />
			<?php echo elgg_view("input/{$valtype}",array(
															'internalname' => $shortname,
															'value' => $vars['entity']->$shortname,
															'disabled' => $disabled
															)); ?>
		</label>
	</p>

<?php	
		}		
?>
	<p>
		<?php
			if (!$new_video)
			{ 
			?><input type="hidden" name="video_guid" value="<?php echo $vars['entity']->getGUID(); ?>" /><?php 
			}
		?>
		<?php
			if ($container_guid)
			{
				?><input type="hidden" name="container_guid" value="<?php echo $container_guid; ?>" /><?php 
			}
		?>
		<input type="hidden" name="owner_guid" value="<?php if (!$new_video) echo $vars['entity']->owner_guid; else echo page_owner(); ?>" />
		<input type="submit" class="submit_button" value="<?php echo elgg_echo("save"); ?>" />
	</p>

</form>
</div>