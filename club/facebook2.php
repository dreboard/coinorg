<?php
$currentMenu[0] = 1;
$jsOnReady = 'displayTimeline({"feed":"home"});';
include_once('facebook_client/include/webzone.php');
include_once('facebook_client/include/presentation/header.php');
?>

<div class="container">	
	<div class="row">
		
		<div class="span3 bs-docs-sidebar">
			
			<?php
			$f1 = new Fb_ypbox();
			$cookie = $f1->getCookie();
			$user_data = $f1->getUserData();
			$fb_user_id = $user_data['id'];
			$fb_image = '<img src="'.$user_data['picture'].'" style="float:left; width:45px; margin-right:10px;">';
			
			//print_r($user_data);
			
			if($fb_user_id!='') {
				
				//echo '<p>';
				echo '<a href="'.$user_data['link'].'">'.$fb_image.'</a>';
				echo '<div>';
				echo '<h3>'.$user_data['name'].'</h3>';
				//echo ' <small>(<a href="#" id="fb_box_fb_logout_btn">Logout</a>)</small>';
				echo '<i class="icon-plus-sign"></i> <a href="#" id="update_status_btn">Update my status</a>';
				echo '<br><i class="icon-remove-circle"></i> <a href="#" id="fb_box_fb_logout_btn">Close session</a>';
				echo '</div>';
				echo '<br>';
				
				echo '<ul class="nav nav-list bs-docs-sidenav">';
					echo '<li><a href="#" class="loadTimeline" data-feed="home"><i class="icon-chevron-right"></i> Home</a></li>';
					echo '<li><a href="#" class="loadTimeline" data-feed="feed"><i class="icon-chevron-right"></i> My wall</a></li>';
					echo '<li><a href="#" class="loadTimeline" data-feed="posts"><i class="icon-chevron-right"></i> My posts</a></li>';
					echo '<li><a href="#" class="displayFriendsBtn" data-url=""><i class="icon-chevron-right"></i> My friends</a></li>';
				echo '</ul>';
			}
			else {
				echo 'Once connected, you will view your options in this section !';
			}
			?>
		</div>
		
		<div class="span7">
			<?php
			
			if($fb_user_id!='') {
				echo '<span id="loading"></span>';
				echo '<div id="timeline"></div>';
			}
			else {
				echo '<h3 style="margin-top:0px;">Click on the link bellow to connect with your account</h3>';
				echo '<p>';
				echo '<img src="'.$GLOBALS['fb_ypbox_path'].'/include/graph/icons/facebook32.png" style="vertical-align:middle; margin-right:10px; padding-bottom:8px;">';
				echo '<a href="#" id="fb_box_fb_login_btn" style="font-size:20px;">Facebook connect</a>';
				echo '</p>';
			}
			
			?>
		</div>
		
		<div class="span2" style="text-align:right;">
			
			<p>Some of our other apps</p>
			
			<a href="http://codecanyon.net/item/advanced-php-store-locator/244349?ref=yougapi" target="_blank"><img src="facebook_client/include/graph/advanced-store-locator-mini.png" style="margin-bottom:10px;"></a>
			<a href="http://codecanyon.net/item/jquery-carousel-evolution-for-wordpress/702228?ref=yougapi" target="_blank"><img src="facebook_client/include/graph/carousel-wpress-mini.png" style="margin-bottom:10px;"></a>
			&nbsp;<a href="http://codecanyon.net/item/domains-names-checker/3298128?ref=yougapi" target="_blank"><img src="facebook_client/include/graph/domains-checker-mini.png" style="margin-bottom:10px;"></a>
			<a href="http://codecanyon.net/item/facebook-images-gallery/3281185?ref=yougapi" target="_blank"><img src="facebook_client/include/graph/fb-gallery-mini.png" style="margin-bottom:10px;"></a>
			
			<br>
			
			<p>Featured mobile apps</p>
			<a href="http://codecanyon.net/item/mobile-site-builder/491023?ref=yougapi" target="_blank"><img src="facebook_client/include/graph/mobile-builder-mini.png" style="margin-bottom:10px;"></a>
			<a href="http://codecanyon.net/item/mobile-store-locator/239351?ref=yougapi" target="_blank"><img src="facebook_client/include/graph/mobile-store-locator-mini.png" style="margin-bottom:10px;"></a>
			
		</div>
		
	</div>
</div>

<?php
include_once('facebook_client/include/presentation/footer.php');
?>