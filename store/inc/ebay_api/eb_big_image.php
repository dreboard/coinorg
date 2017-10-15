<?php 
$endpoint = 'http://open.api.ebay.com/shopping';  // URL to call
$responseEncoding = 'XML';   // Format of the response
$apicall = "$endpoint?callname=GetSingleItem"
                 . "&version=537"
                 . "&appid=AndreBoa-6476-4b24-b648-88cc5db92712" 
				 . "&ItemID=".$_GET['id'].""
                 . "&responseencoding=$responseEncoding";

$resp = simplexml_load_file($apicall);
//print_r($resp);
//echo $resp->Item->PictureURL;


?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	text-align: center;
}
-->
</style></head><body>
<div align="center"><img src="<?php echo $resp->Item->PictureURL;?>"><br><?php echo $resp->Item->Title;?></div>
</body></html>