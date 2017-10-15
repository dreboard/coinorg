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
<p>&nbsp;</p>
<table width="600" cellpadding="4" id="newTbl">
  <tr align="center">
    <td colspan="2" align="left">Select A Category for Your Wanted Item</td>
    <th width="196">&nbsp;</th>
  </tr>
  <tr align="center">
    <th width="184"><h2>Raw/Graded</h2></th>
    <th width="186"> <h2>Bullion</h2></th>
    <th><h2>Commemorative</h2></th>
  </tr>
  <tr align="center">
  <td id="newNoGrade"><a href="addWantRaw.php"><img id="newNoGradeImg" src="../img/newCoin.jpg" class="newImg" alt="no grade" /></a></td>
    <td id="newNoGrade"><a href="addBullion.php"><img id="newSet" src="../img/newBullion.jpg" class="newImg" alt="sets" /></a></td>
    <td id="newGrade"><a href="addBulk.php"><img src="../img/newComm.jpg" alt="bulk" name="newBulk" class="newImg" id="newBulk2" /></a></td>
    </tr>
</table>

<p>&nbsp;g</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
