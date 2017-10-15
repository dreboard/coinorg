<?php 
	switch ($vars['size']){
		case "large":
			$width=540;
			$height=326;
			break;
		default:
			$width=240;
			$height=147;
	}
	//http://www.youtube.com/watch?v=s91erUAji-I&hl=fr&fs=1&color1=0x006699&color2=0x54abd6
	$begin=strpos($vars['video_url'],"=");
	$begin = $begin + 1;
	$myVideoId = substr($vars['video_url'],$begin);
?>
<object width="<?php echo $width?>" height="<?php echo $height?>">
	<param name="movie" value="http://www.youtube.com/v/<?php echo $myVideoId;?>&hl=fr&fs=1&color1=0x006699&color2=0x54abd6"></param>
	<param name="allowFullScreen" value="true">
	</param><param name="allowscriptaccess" value="always"></param>
	<embed src="http://www.youtube.com/v/<?php echo $myVideoId;?>&hl=fr&fs=1&color1=0x006699&color2=0x54abd6" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="<?php echo $width?>" height="<?php echo $height?>"></embed>
</object>