<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Note Book</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h1><img class="hidden-xs" src="http://mycoinorganizer.com/siteImg/notebook1.jpg" width="50" height="50" align="absmiddle" /> My Notebook</h1>
<div class="btn-group btn-group-justified">
  <div class="btn-group">
  <a class="btn btn-primary" role="button" href="userNoteNew.php">New Note</a>
  </div>
  <div class="btn-group">
    <a href="userCalendar.php" class="btn btn-default" role="button">Calendar</a>
  </div>
  <div class="btn-group">
    <a href="#" class="btn btn-default" role="button">Gallery</a>
  </div>
</div>
<br>

<div class="table-responsive">
  <table id="tableSort" class="table table-hover">
  <thead>
  <tr class="active">
    <th width="82%">All Notes</span></th>
    <th width="18%">Modified</th>
    </tr>
    </thead>
  <tbody>
  <?php 
  	$sql = mysql_query("SELECT * FROM notes WHERE userID = '$userID' ORDER BY noteID DESC") or die(mysql_error());
if(mysql_num_rows($sql) == 0){
	  echo '<tr><td>No Saved Notes</td><td>&nbsp;</td></tr>';
} else {
		while($row = mysql_fetch_array($sql))
		{
			echo '<tr class="gryHover"><td><a href="userNote.php?ID='.$Encryption->encode(intval($row['noteID'])).'">'.strip_tags($row['noteTitle']).'</a></td>
			<td>'.date("M j, Y",strtotime($row['noteDate'])).'</td>
			</tr>';
		}
}
  ?>   
    </tbody>
<tfoot>  
  <tr class="active">
    <th width="82%">All Notes</span></th>
    <th width="18%">Modified</th>
    </tr>
    </tfoot>   
</table>
</div>
<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>