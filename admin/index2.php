<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

######### edit details ##########
$appId = '470818899631048'; //Facebook App ID
$appSecret = 'f44f3691c4b79fe9d0c3c99b5f4f916e'; // Facebook App Secret
$return_url = 'http://mycoinorganizer.com/admin/index.php';  //return url (url to script)
$homeurl = 'http://mycoinorganizer.com/';  //return to home
$fbPermissions = 'publish_stream,manage_pages';  //Required facebook permissions
##################################

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));

$fbuser = $facebook->getUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Admin Home</title>
<script type="text/javascript">
$(document).ready(function(){	


});
</script>  

<style type="text/css">
#facebookDiv .innerFB {width:50%; float:left;}
</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1>Admin Home</h1>
<table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
        <td align="right"><strong><?php echo date('M'); ?>&nbsp;</strong></td>
        <td align="right"><strong>All Time</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="13%"><strong><a href="users.php">Members</a></strong></td>
        <td width="8%" align="right"><a href="users.php"><?php echo $User->getNewUserCount($month=date('m'), $year = date('Y'), $userLevel='user'); ?></a></td>
        <td width="9%" align="right"><?php echo $User->getUserCount($month, $year, $userLevel='user'); ?></td>
        <td width="70%">&nbsp;</td>
      </tr>
      <tr>
        <td><strong><a href="members.php">Clubs</a></strong></td>
        <td align="right"><a href="eventCalendar.php"><?php echo $User->getNewUserCount($month=date('m'), $year = date('Y'), $userLevel='club'); ?></a></td>
        <td align="right"><?php echo $User->getUserCount($month, $year, $userLevel='club'); ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
<p>&nbsp;</p>


<hr>
<p><img src="../siteImg/facebook.jpg" width="50" height="49"></p>
<p>
<?php

if($_POST)
{
    //Post variables we received from user
    $userPageId     = $_POST["userpages"];
    $userMessage    = $_POST["message"];

    if(strlen($userMessage)<1)
    {
        //message is empty
        $userMessage = 'No message was entered!';
    }

        //HTTP POST request to PAGE_ID/feed with the publish_stream
        $post_url = '/'.$userPageId.'/feed';

        /*
        // posts message on page feed
        $msg_body = array(
            'message' => $userMessage,
            'name' => 'Message Posted from Saaraan.com!',
            'caption' => "Nice stuff",
            'link' => 'http://www.saaraan.com/assets/ajax-post-on-page-wall',
            'description' => 'Demo php script posting message on this facebook page.',
            'picture' => 'http://www.saaraan.com/templates/saaraan/images/logo.png'
            'actions' => array(
                                array(
                                    'name' => 'Saaraan',
                                    'link' => 'http://www.saaraan.com'
                                )
                            )
        );
        */

        //posts message on page statues
        $msg_body = array(
        'message' => $userMessage,
        );

    if ($fbuser) {
      try {
            $postResult = $facebook->api($post_url, 'post', $msg_body );
        } catch (FacebookApiException $e) {
        echo $e->getMessage();
      }
    }else{
     $loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
     header('Location: ' . $loginUrl);
    }

    //Show sucess message
    if($postResult)
     {
         echo '<html><head><title>Message Posted</title><link href="style.css" rel="stylesheet" type="text/css" /></head><body>';
         echo '<div id="fbpageform" class="pageform" align="center">';
         echo '<h1>Your message is posted on your facebook wall.</h1>';
         echo '<a class="button" href="'.$homeurl.'">Back to Main Page</a> <a target="_blank" class="button" href="http://www.facebook.com/'.$userPageId.'">Visit Your Page</a>';
         echo '</div>';
         echo '</body></html>';
     }
}

?>
</p>
<p>&nbsp;</p>
<div id="facebookDiv">
  <div class="innerFB">
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=470818899631048";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-activity" data-site="http://mycoinorganizer.com" data-app-id="470818899631048" data-width="300" data-height="300" data-header="true" data-recommendations="false"></div>


  </div>

<div class="innerFB"><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=470818899631048";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="http://www.facebook.com/coin.organizer" data-width="470" data-num-posts="20"></div></div>
</div>

<hr class="clear" />

<p>&nbsp;</p>

<p>&nbsp;</p>





<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>