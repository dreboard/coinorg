<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

	if(isset($_GET['month'])) {  
		$month = intval($_GET['month']);
		$year = intval($_GET['year']); 
	} else {
		$month = date("n");
		$year = date('Y') ; 
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include("../secureScripts.php"); ?>
<title>Calendar</title>
<script type="text/javascript">
$(document).ready(function(){	

});
</script>  

<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="../style.css"/>
<?php include ("../inc/analyticsTracking.php"); ?>
</head>

<body class="no-js">
<?php include("../inc/pageElements/adminHeader.php"); ?>
<div id="content" class="clear">
<h1><?php echo date( 'F', mktime(0, 0, 0, $month) ); ?> <?php echo $year; ?></h1>
<p><a href="eventNew.php">New Event</a></p>
<?php 
echo $Calendar->monthControls($month, $year);
echo $Calendar->draw_calendar($month, $year, $loc="back");
?>

<p>&nbsp;</p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>