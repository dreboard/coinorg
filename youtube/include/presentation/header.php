<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>

<title>YouTube Search and API Integration</title> 
<meta name="description" content="This application enables you to literally get all YouTube on your own website. You can integrate the YouTube search so your visitors can search among millions of videos and watch them directly on y..." /> 

<meta charset="UTF-8" />

<!-- Include CSS files -->
<link rel="stylesheet" href="include/css/style.css" type="text/css">
<link rel="stylesheet" href="include/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="include/css/bootstrap-responsive.min.css" type="text/css">
<link rel="stylesheet" href="include/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

<!-- Include JS files -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="include/js/json2.js"></script>
<script type="text/javascript" src="include/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="include/js/fancybox/jquery.easing-1.3.pack.js"></script>

<?php
//Integrate the vbox CSS and JS
$v1 = new Vbox_class();
$v1->display_vbox_js_css();
?>

<script> 
jQuery(document).ready(function() {
	<?php
	echo $jsOnReady;
	?>
})
</script>

</head>

<body>

<div class="container"> 
	<br>
	<a href="http://codecanyon.net/item/youtube-api-ultimate-integration/403773?ref=yougapi"><img src="include/graph/youtube-integration-mini.png" align="left" style="margin-right:30px;"></a>
	<h1 style="margin-bottom:5px;">YouTube Search and API integration</h1>
	
	<hr>
	<div id="topMenu">
		<ul>
			<?php
			if($currentMenu[0]==1) echo '<li><a href="./" class="current">Demo 1</a></li>';
			else echo '<li><a href="./">Demo 1</a></li>';
			if($currentMenu[1]==1) echo '<li><a href="./index2.php" class="current">Demo 2</a></li>';
			else echo '<li><a href="./index2.php">Demo 2</a></li>';
			?>
		</ul>
	</div>
	
	<div class="row">
		<div class="span4">
		<h5>Features</h5>
		- Integrate the YouTube Search into your website<br>
		- Display any YouTube channel<br>
		- Display featured videos (daily, weekly, etc...)<br>
		- Powered by jQuery and AJAX - Supports paginations<br>
		- 2 display types - More than 25 different filters<br>
		- Very clean and organised source code<br>
		</div>
		
		<div class="span4">
		<h5>Possible uses</h5>
		<p>
		- Let your users search videos from your website<br>
		- Display videos from your favorite channels<br>
		- Automatically display the latest videos<br>
		- And more...<br>
		</p> 
		</div> 
		
		<div class="span4">
		<h5>Available on codecanyon</h5>
		<p><a href="http://codecanyon.net/item/youtube-api-ultimate-integration/403773?ref=yougapi"><img src="include/graph/cc_125x125_v1.gif" align="right" style="margin-bottom:10px;"></a><br>
		Check <a href="http://codecanyon.net/user/yougapi?ref=yougapi">our portfolio</a> on codecanyon.</p>
		</div>
	</div>
	
	<hr>
</div>