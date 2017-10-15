<!DOCTYPE html>
<head>

<title>Facebook Client</title> 

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta charset="UTF-8" />

<!-- Include CSS files -->
<link rel="stylesheet" href="include/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="include/css/bootstrap-responsive.min.css" type="text/css">
<link rel="stylesheet" href="include/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<link rel="stylesheet" href="include/css/style.css" type="text/css">

<!-- Include JS files -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="include/js/json2.js"></script>

<script> 
jQuery(document).ready(function() {
	<?php
	echo $jsOnReady;
	?>
})
</script>

</head>

<body>

<?php
$f1 = new Fb_ypbox();
$f1->loadJsSDK();
$f1->load_js_functions(array('timeline_js'=>1, 'prettydate_js'=>1));
?>

<div class="container"> 
	<br>
	<h1 style="margin-bottom:5px;">Facebook Client</h1>
	<span style="color: #666;">Post updates, comment and get your Facebook news in your own app - <a href="http://codecanyon.net/item/facebook-premium-client-application/232385?ref=yougapi">Download this app</a> (last update: Dec 2012)</span>
	<hr>
	<div id="topMenu">
		<ul>
			<?php
			if($currentMenu[0]==1) echo '<li><a href="./" class="current">Home</a></li>';
			else echo '<li><a href="./">Home</a></li>';
			echo '<li><a href="http://codecanyon.net/user/yougapi/portfolio?ref=yougapi">Our other apps</a></li>';
			?>
		</ul>
		
	</div>
	
	<hr>
</div>