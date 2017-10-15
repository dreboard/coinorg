<?php 
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<script type="text/javascript">
$(document).ready(function()
{
/*$("#switch").change(function()
{

var dataString = $(this).val();
alert(dataString);
$.ajax
({
type: "GET",
url: "functions/addRawFunctions.php",
data: dataString,
cache: false,
success: function(html)
{
$("#results").html(html);
} 
});
});*/

$("#switch").change(function(){
	var dataString = $(this).val();
  $.ajax({url:"functions/addRawFunctions.php?coinType="+dataString, success:function(result){
    $("#coinName").html(result);
  }});
});
});
</script>
<style type="text/css">
table {background-image:url(../img/slabBG.jpg); min-height:310px; background-repeat:no-repeat; background-position:center;}
td  { }
th {padding:5px; height:65px; color:#fff; padding-top:15px;}
table img {width:130px; height:auto;}
</style>
</head>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>

<form action="" method="get">
<input name="" type="text" /><br />
<select id="switch" name="coinType">

<option value="">Select A Half Cents</option>
<option value="Liberty_Cap_Half_Cent">Liberty Cap</option>
<option value="Draped_Bust_Half_Cent">Draped Bust</option>
<option value="Classic_Head_Half_Cent">Classic Head</option>
<option value="Braided_Hair_Half_Cent">Braided Hair</option>
</select><br />
<select id="coinName" name="coinName">
</select>
</form>

<p id="results">$(&quot;#switch&quot;).change(function(){<br />
var dataString = $(this).val();<br />
$.ajax({url:&quot;functions/addRawFunctions.php?coinType=&quot;+dataString, success:function(result){<br />
$(&quot;#coinName&quot;).html(result);<br />
}});<br />
});<br />
});</p>
<table width="210" border="0">
  <tr>
    <th scope="col"><span>Barber Dime</span></th>
  </tr>
  <tr>
    <td height="181" align="center"><img src="../img/Barber_Dime.jpg" /></td>
  </tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
