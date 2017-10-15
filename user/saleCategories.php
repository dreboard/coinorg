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
    <th><h2>Raw/Graded</h2></th>
    <th> <h2>Sets</h2></th>
    <th><h2>Bulk</h2></th>    
    <th><h2>Collections</h2></th>
  </tr>
  <tr align="center">
  <td id="newNoGrade"><a href="addCoinRaw.php"><img id="newNoGradeImg" src="../img/newCoin.jpg" class="newImg" alt="no grade" /></a></td>
    <td id="newNoGrade"><a href="addSet.php"><img id="newSet" src="../img/newSet.jpg" class="newImg" alt="sets" /></a></td>
    <td id="newNoGrade"><a href="addBulk.php"><img src="../img/newBulk.jpg" alt="bulk" name="newBulk" class="newImg" id="newBulk" /></a></td>    
    <td id="newGrade"><a href="addCoinGrade.php"><img class="newImg" id="newGradeImg" src="../img/newCollection.jpg" alt="graded" /></a></td>
    </tr>
  <tr align="center">
    <th><h2>Folders</h2></th>
    <th> <h2>First Day</h2></th>
    <th><h2>Bullion</h2></th>    
    <th><h2>Commemoratives</h2></th>
  </tr>
  <tr align="center">
  <td id="newNoGrade"><a href="addFolderType.php"><img id="newNoGradeImg" src="../img/whitmanFolders.jpg" class="newImg" alt="no grade" /></a></td>
    <td id="newNoGrade"><a href="addFirstDay.php"><img src="../img/newFirstDay.jpg" alt="graded" name="newGradeImg2" class="newImg" id="newGradeImg2" /></a></td>
    <td id="newNoGrade"><a href="addBullion.php"><img id="newSet2" src="../img/newBullion.jpg" class="newImg" alt="sets" /></a></td>    
    <td id="newGrade"><a href="addBulk.php"><img src="../img/newComm.jpg" alt="bulk" name="newBulk" class="newImg" id="newBulk2" /></a></td>
  </tr>
</table>

<p>Proof set coins from 1968 to the present contain "S" mint marked coins.  These were produced at the San Francisco United States government Mint.  Proof coin sets minted in 1964 and earlier have no mint mark and were produced at the Philadelphia United States government Mint.</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
