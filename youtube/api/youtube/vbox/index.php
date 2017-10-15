<?php
include_once("../../../YouTube API Ultimate Integration/youtube/vbox/include/webzone.php");

// views
if(@$_GET['q']=='displayEmbedCode') include("../../../YouTube API Ultimate Integration/youtube/vbox/views/ajax_displayEmbedCode.php");
elseif (@$_GET['q']=='displayVideosList') include("../../../YouTube API Ultimate Integration/youtube/vbox/views/ajax_displayVideosList.php");

else echo 'Silence is golden.';
?>