<?php

	    $statement = $vars['statement'];
		$performed_by = $statement->getSubject();
	
	    $url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	    $string = sprintf(elgg_echo("youtube:river:updated"),$url) . " ";

	    echo $string; ?>