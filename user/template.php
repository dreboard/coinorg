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
<title>My Collection</title>
 <script type="text/javascript">
$(document).ready(function(){	
$('#clientTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
});
</script> 
<style type="text/css">
#masterCountTbl {border-collapse:collapse; font-size:110%;}
#masterCountTbl  .SemiKeyRow a {color:#fff;}

.rss-box {
	background-color: #808080; 
	border-style: solid; border-width: 1px; border-color: #CCCCCC; 
	padding: 0; 
	width: 300px;
}
.rss-items {
	margin-top:0px;
	padding:0.5em; 0.5em;
	margin-left:5px;
	color:#FFFFFF;
}
p.rss-title {padding:0.5em;}
.rss-title {
	padding: 5px; 
	background: #666666; color: white; 
	font-family: "Times New Roman", Times, serif; font-size: 14px;     
        font-weight: bold; 
	text-align: left; vertical-align: top 
	font-size: 100%;
	margin: 0px;
	padding:0em;
}

.rss-item  {
  font-family: verdana, arial, sans-serif;
  font-size: 0.75em;
  font-weight : normal;
  color: #020202;
  list-style:none;
  padding-bottom:1em;
}

.rss-item a {
	text-decoration : underline;
	color:black;
	font-size: 105%;
	font-weight:bold;
	font-family:arial, sans-serif;
	}
	
.rss-item a:visited {
	color:purple;
}

.rss-date {
	font-size: 85%;
	font-weight : normal;
	color: #151515;
	}

 
/* buttons modeled from http://www.wellstyled.com/css-inline-buttons.html */

.pod-play {
   _width:12em;
   margin: 0 0.2em; padding: 0.1em 0; _padding:0;
   
   white-space:nowrap;
   text-decoration: none;
   vertical-align:middle;
   background: #fb6;
   color: black;
   }
.pod-play em {
   _width:1em; _cursor:hand;
   font-style: normal;
   margin:0; padding: 0.1em 0.5em;
   background: white;
   color: #222;
   }
.pod-play span {
   _width:1em; _cursor:hand;
   margin:0; padding: 0.1em 0.5em 0.1em 0.3em;
   }
.pod-play:hover {
   background: #666;
   color: white;
   }
.pod-play:hover em {
   background: black;
   color: white
   }

</style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>

<h1>My Collection</h1>
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
</table>
<br />
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td><script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2FCoinNewsnet%3Fformat%3Dxml&chan=y&num=20&date=y&utf=y"  charset="UTF-8" type="text/javascript"></script>

<noscript>
<a href="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2FCoinNewsnet%3Fformat%3Dxml&chan=y&num=20&date=y&utf=y&html=y">View RSS feed</a>
</noscript>
</td>
    <td align="center" valign="top"><script type="text/javascript"><!--
amazon_ad_tag="mycoinorganizer-20"; 
amazon_ad_width="600"; 
amazon_ad_height="520"; 
amazon_color_border="3C3C3C"; 
amazon_color_logo="FFFFFF"; 
amazon_color_link="2C2C2C"; //--></script>
<script type="text/javascript" src="http://www.assoc-amazon.com/s/asw.js"></script>
<br />
<script type="text/javascript"><!--
google_ad_client = "ca-pub-2249489075026967";
/* Coin Ad 1 */
google_ad_slot = "9370811391";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td>
  </tr>
</table>


<hr />

<br />


<noscript>
<a href="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.feedburner.com%2FCoinNewsnet%3Fformat%3Dxml&chan=y&num=20&desc=1&date=y&targ=y&utf=y&html=y">View RSS feed</a>
</noscript>

<p class="clear"><a href="#top">Top</a></p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>