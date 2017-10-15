<?php
//Getters
$q = $_GET['q'];
$t = $_GET['t'];
$username = $_GET['username'];
$feed = $_GET['feed'];
$time = $_GET['time'];
$cat = $_GET['cat'];
$playlist = $_GET['playlist'];

if($t=='') {
	$t=3;
	$feed='most_viewed';
	$time='today';
}

//prepare data to call
$domVideoResults = 'domVideoResults';
$display_type=2;
$pageNumber=1;
$nb_display=44;
$videoCriteria = "{'dom':'$domVideoResults', 'q':'$q', 'username':'$username', 'feed':'$feed', 'time':'$time', 'type':'$t', 'category':'$cat', 'playlist':'$playlist',
'pageNumber':'$pageNumber', 'nb_display':'$nb_display', 'display_type':'$display_type'}";
$jsOnReady = "$('body').data('videoCriteria', $videoCriteria); displayVideosList();";
$currentMenu[0]=1;

include_once('vbox/include/webzone.php');
include_once('include/presentation/header.php');

?>

<div class="container">	
	<?php
	
	echo '<div class="row">';
		echo '<div class="span4">';
		
			//search
			echo '<form method="get">';
			echo '<b>Search:</b><br>';
			if($t==1) echo '<input type="text" id="q" name="q" value="'.$q.'"> ';
			else echo '<input type="text" id="q" name="q"> ';
			echo '<input type="submit" value="Ok" class="btn">';
			echo '<input type="hidden" id="t" name="t" value="1">';
			echo '</form>';
		
		echo '</div>';
		
		echo '<div class="span4">';
		
			//by channel
			echo '<form method="get">';
			echo '<b>Username:</b><br>';
			if($t==2) echo '<input type="text" id="username" name="username" value="'.$username.'"> ';
			else echo '<input type="text" id="username" name="username"> ';
			echo '<input type="submit" value="Ok" class="btn">';
			echo '<input type="hidden" id="t" name="t" value="2">';
			echo '</form>';
			
			//Playlist
			echo '<form method="get">';
			echo '<b>Playlist:</b><br>';
			echo '<input type="text" id="playlist" name="playlist" value="'.$playlist.'"> ';
			echo '<input type="submit" value="Ok" class="btn">';
			echo '<input type="hidden" id="t" name="t" value="6">';
			echo '</form>';
			
		echo '</div>';
		
		echo '<div class="span2">';
		
			//featured videos
			echo '<form method="get">';
			echo '<b>Featured:</b><br>';
			if($t==3) {
				echo '<table><tr>';
				echo '<td>Feeds: </td><td><select id="feed" name="feed" onchange="submit();" style="width:140px"><option value=""></option>';
				foreach($datas_youtubeStandardFeeds as $i => $v) {
					if($feed==$i) echo '<option value="'.$i.'" selected>'.$v.'</option>';
					else echo '<option value="'.$i.'">'.$v.'</option>';
				}
				echo '</select></td></tr>';
				echo '<tr><td>Time: </td><td><select id="time" name="time" onchange="submit();" style="width:140px"><option value=""></option>';
				foreach($datas_youtubeTimeParameters as $i => $v) {
					if($time==$i) echo '<option value="'.$i.'" selected>'.$v.'</option>';
					else echo '<option value="'.$i.'">'.$v.'</option>';
				}
				echo '</select></td>';
				echo '</tr></table>';
			}
			else {
				echo '<table><tr>';
				echo '<td>Feeds: </td><td><select id="feed" name="feed" onchange="submit();" style="width:140px"><option value=""></option>';
				foreach($datas_youtubeStandardFeeds as $i => $v) {
					if($feed==$i) echo '<option value="'.$i.'" selected>'.$v.'</option>';
					else echo '<option value="'.$i.'">'.$v.'</option>';
				}
				echo '</select></td></tr>';
				echo '<tr><td>Time: </td><td><select id="time" name="time" onchange="submit();" style="width:140px"><option value=""></option>';
				foreach($datas_youtubeTimeParameters as $i => $v) {
					if($time==$i) echo '<option value="'.$i.'" selected>'.$v.'</option>';
					else echo '<option value="'.$i.'">'.$v.'</option>';
				}
				echo '</select></td>';
				echo '</tr></table>';
			}
			echo '<input type="hidden" id="t" name="t" value="3">';
			echo '</form>';
		
		echo '</div>';
		
		echo '<div class="span2"><div style="float:right;">';
		
			//Categories
			echo '<form>';
			echo '<input type="hidden" id="t" name="t" value="5">';
			echo '<b>Categories:</b><br>';
			echo '<select name="cat" onchange="form.submit();" style="width:150px">';
			echo '<option></option>';
			foreach($data_youtube_categories as $ind=>$value) {
				if($cat==$ind) echo '<option selected value="'.$ind.'">'.$value.'</option>';
				else echo '<option value="'.$ind.'">'.$value.'</option>';
			}
			echo '</select>';
			echo '</form>';
		
		echo '</div></div>';
	echo '</div>';
	
	echo '<hr>';
	echo '<div id="'.$domVideoResults.'"></div><div style="clear:both;"></div>';	
	?>
</div>
