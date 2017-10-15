<?php
include("../inc/config.php");
include_once "../inc/pageElements/logSession.php";
if(isset($_GET['month'])) {  
	$month = intval($_GET['month']);
	$year = intval($_GET['year']); 
} else {
	$month = date("n");
	$year = date('Y') ; 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Calendar</title>
<?php include("../inc/scripts.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
<style type="text/css">
.calenderHdr {background-color:#333333; color:#fff;}
a {color:#7a5e47; font-weight:bold;}
table ul {list-style-type:none; padding:0px;}
table li {padding-left:5px;}
.calendarRow {padding:2px;}
.calendarRow a {font-size:80%;}
</style>

</head>

<body>
<div id="container">


<?php include("../inc/pageElements/headerAdmin.php"); ?>



<div id="contentHolder" class="wide">

<div id="content" class="inner">
  <br /> 
   
   
<br />
<h1><?php echo date( 'F', mktime(0, 0, 0, $month) ); ?> <?php echo $year; ?></h1>
<table width="100%" border="0">
  <tr>
    <td><?php echo $Calendar->monthControls($month, $year);?></td>
    <td align="right"><a href="eventList.php">List View</a></td>
    <td align="right"><a href="eventNew.php">New Event</a></td>
    
  </tr>
</table>



<?php echo $Calendar->drawMyCalendar($month, $year);
?>


  <p>&nbsp;</p>
  
</div>

</div>



<?php include("../inc/pageElements/footer.php"); ?>



</div><!--End container-->
</body>
</html>