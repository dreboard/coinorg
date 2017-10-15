<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>PCGS Page</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#certNumList {width:100%;}



</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>PCGS Page</h1>
<table width="100%" border="0">
  <tr>
    <td width="25%"><strong>Total Collected Pieces</strong></td>
    <td width="33%"><?php echo $collection->getCollectionCountById($userID); ?></td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Unique Pieces</strong></td>
    <td><?php echo $collection->getUniqueCollectionCountById($userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td><strong>Total Collection Investment</strong></td>
    <td><?php echo $collection->getCoinSumByAccount($userID); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td><strong>Coin To Be Certified</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>
<br />
<table width="100%" border="1" cellpadding="3">
  <tr>
    <td align="left" valign="top">PCGS Video</td>
    <td rowspan="2" valign="top">
    CONTENT HERE</td>
  </tr>
  <tr>

    <td width="475" align="left" valign="top"><?php
/*
Function to embed the latest video from a YouTube Channel.
Parameters: The username of the Youtuber, the desired width of the video, the desired height of the video.
Example call: get_latest_video('wormholer693′, ’640′, ’385′);
Author: Andy Barratt
Website: http://www.andybarratt.co.uk
*/
function get_latest_video($username, $width, $height)
{
        //Set the URL of the search we’re using to get the specified user’s uploads.
        $url = 'http://gdata.youtube.com/feeds/api/users/'.$username.'/uploads';
        //Get the results from the url above and store them in a variable.
        $data = file_get_contents($url);
        //Create a filter to find the url of the first video in the retrieved data.
        $filter = "/<media:content url='(.+?)'/";
        //Use the preg_match function to run our filter on our data and return scraped text then the filtered text (video url) in an array.
        preg_match($filter,$data,$results);
        //store our videoURL in a variable.
        $videoURL = $results[1];
        
        //if a video was found
        if($videoURL)
        {
                //generate the code required to embed the video.
                $embedCode = '<object width="'.$width.'" height="'.$height.'"><param name="movie" value="'.$videoURL.'"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="'.$videoURL.'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="'.$width.'" height="'.$height.'"></embed></object>';
                //echo the embed code
                echo $embedCode;
        }
        else
        {
                echo 'No Video Found.';
        }
}
get_latest_video('PCGSVideo', '470','283');
?></td>    
</tr>
</table>


<hr />
<script type="text/javascript">
$(document).ready(function(){

$("#getListBtn").click(function() {
var dataString = $('#fromCol').val();
$("#getListBtn").prop('value', 'Searching.....');
$.ajax({url:"_getCerts.php?fromCol="+dataString, success:function(result){
$("#certNumList").val(result);
$("#getListBtn").prop('value', 'Results');
}});

});	

});
</script>

<form action="" method="post" name="pcgsCertNumForm">
<table width="500" border="0">
  <tr>
    <td width="135"><input type="button" name="getListBtn" id="getListBtn" value="Get Cert Numbers " /></td>
    <td width="355">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" valign="top"><textarea name="certNumList" id="certNumList" cols="45" rows="20"></textarea></td>
    </tr>
</table>
<input name="fromCol" id="fromCol" type="hidden" value="<?php echo $Encryption->encode($userID); ?>" />      
<input name="updatePcgsBtn" type="submit" value="Update" />

</form>


<br />


<noscript>
<a href="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2FCoinNewsnet%3Fformat%3Dxml&chan=y&num=20&desc=1&date=y&targ=y&utf=y&html=y">View RSS feed</a>
</noscript>

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>