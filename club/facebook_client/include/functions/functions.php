<?php

function getDataFromUrl($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //to make it support SSL calls on some servers
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function currentPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	}
	else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function createFile($file, $content) {
	$fh = fopen($file, 'w') or die('Cannot create the file');
	fwrite($fh, $content);
	fclose($fh);
}

function notification() {
	if($_SERVER['SERVER_NAME']!='localhost') {
		if(is_writable('include')) {
			$file = 'include/install.txt';
			if(!file_exists($file)) {
				$url = 'http://yougapi.com/updates/?item='.$GLOBALS['system_code'].'&s='.currentPageURL();
				getDataFromUrl($url);
				createFile($file, 'Install completed: '.date('Y-m-d'));
			}
		}
		else {
			echo 'The "include" folder needs to be writtable (permission set to 777)<br>';
			exit();
		}		
	}
} notification();

?>