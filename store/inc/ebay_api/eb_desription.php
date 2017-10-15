<?php 
$endpoint = 'http://open.api.ebay.com/shopping';  // URL to call
$responseEncoding = 'XML';   // Format of the response
$apicall = "$endpoint?callname=GetSingleItem"
                 . "&version=537"
                 . "&appid=Volkovs7e-9d8f-463b-9fdb-d18a6b671a6" 
				 . "&ItemID=".$_GET['id'].""
				 . "&IncludeSelector=Description,ItemSpecifics,ShippingCosts"
                 . "&responseencoding=$responseEncoding";
//require_once('functions/xml2array.php');
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
	margin-left: 5px;
	margin-top: 5px;
	margin-right: 5px;
	margin-bottom: 5px;
	text-align: center;
}
-->
</style></head><body>
<?php 

$javascript = '/<script[^>]*?javascript{1}[^>]*?>.*?<\/script>/si';
$noscript = '';
$document = $resp->Item->Description;
$out2=preg_replace($javascript, $noscript, $document);


echo $out2;?></body></html>