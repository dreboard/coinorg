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
<title>Add A New Folder</title>

<style type="text/css">
#newTbl {margin:0px auto;}
#typeList a {border:none;}
#newGrade {border:#fff 3px solid; }
.newImg {width:150px; height:auto;}
</style>
<script type="text/javascript">
$(document).ready(function(){	

	$("#newGradeImg").animate({
  opacity: .7,
	});
	
	$("#newGradeImg").mouseover(function() {
        $(this).animate({
    opacity: 1
		});
});
$("#newGradeImg").mouseout(function() {
        $(this).animate({
    opacity: .7
		});
});

	$("#newNoGradeImg").animate({
  opacity: .7,
	});
	
	$("#newNoGradeImg").mouseover(function() {
        $(this).animate({
    opacity: 1
		});
});
$("#newNoGradeImg").mouseout(function() {
        $(this).animate({
    opacity: .7
		});
});	
	
$("#newBulk").animate({
  opacity: .7,
	});
	
	$("#newBulk").mouseover(function() {
        $(this).animate({
    opacity: 1
		});
});
$("#newBulk").mouseout(function() {
        $(this).animate({
    opacity: .7
		});
});	

$("#newSet").animate({
  opacity: .7,
	});
	
	$("#newSet").mouseover(function() {
        $(this).animate({
    opacity: 1
		});
});
$("#newSet").mouseout(function() {
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
<table width="700" cellpadding="4" id="newTbl">
  <tr align="center">
    <td colspan="3" id="newNoGrade2"><h1>Add New Folder</h1></td>
    </tr>
  <tr align="center">
  <td id="newNoGrade"><a href="addFolder.php"><img id="newNoGradeImg" src="../img/whitmanFolders.jpg" class="newImg" alt="no grade" /></a></td>
    <td id="newNoGrade"><a href="addFolderBlank.php"><img src="../img/whitmanFoldersBlank.jpg" alt="bulk" name="newBulk" class="newImg" id="newBulk" /></a></td>    
    <td id="newGrade"><a href="addFolderCollection.php"><img class="newImg" id="newGradeImg" src="../img/whitmanFoldersFromCollection.jpg" alt="graded" /></a></td>
  </tr>
  <tr align="center" valign="top">
    <th><h2><a href="addFolder.php">Enter Purchased Folder</a></h2></th>
    <th><h2><a href="addFolderBlank.php">Store Empty Folder</a></h2></th>    
    <th><h2><a href="addFolderCollection.php">Create Folder <br />
      From My Collection</a></h2></th>
  </tr>
</table>

<p>Proof set coins from 1968 to the present contain "S" mint marked coins.  These were produced at the San Francisco United States government Mint.  Proof coin sets minted in 1964 and earlier have no mint mark and were produced at the Philadelphia United States government Mint.</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
