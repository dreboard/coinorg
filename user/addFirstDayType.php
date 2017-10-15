<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<style type="text/css">
#newTbl {margin:0px auto;}
#typeList a {border:none;}
#newGrade {border:#fff 3px solid; }
.newImg {width:150px; height:auto;}
</style>
<script type="text/javascript">
$(document).ready(function(){	

	$("img").animate({
  opacity: .7,
	});
	
	$("img").mouseover(function() {
        $(this).animate({
    opacity: 1
		});
});
$("img").mouseout(function() {
        $(this).animate({
    opacity: .7
		});
});



});
</script>     
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<table width="600" cellpadding="4" id="newTbl">
  <tr align="center">
    <th colspan="3"><h2>First Day Coins</h2></th>
    </tr>
  <tr align="center">
    <th><h2>Envelope</h2></th>
    <th> <h2>Coin Set</h2></th>
    <th><h2>Certified</h2></th>    
    </tr>
  <tr align="center">
  <td id="newNoGrade"><a href="addFirstDayRaw.php"><img src="../img/firstdaySet.jpg" alt="bulk" name="newBulk" class="newImg" id="newBulk" /></a></td>
    <td id="newNoGrade"><a href="addFirstDayCoins.php"><img id="newSet" src="../img/firstdaySlabs.jpg" class="newImg" alt="sets" /></a></td>
    <td id="newNoGrade"><a href="addFirstDayCert.php"><img id="newNoGradeImg" src="../img/firstdayCert.jpg" class="newImg" alt="no grade" /></a></td>    
    </tr>
</table>

<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
