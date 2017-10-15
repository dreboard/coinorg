<?php
   
	// Output body
	$entity = $vars['entity'];
	
?>	
	<div class="contentWrapper">	
	<div id="pages_page">
	
<?php	
	if ($entity)
	{
		echo '<center>';
		echo elgg_view('youtube/youtubeembed',array('video_url'=>$entity->video_url,'size'=>'large'));
		echo '</center>';
?>
<?php
			
	}
?>
</div>

</div>