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
<title>User Tools</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2>User Tools</h2>
<table class="table">
  <tr class="setFiveRow">
    <td>&nbsp;</td>
    <td><a href="userCalendar.php"><img src="../siteImg/calendar1.jpg" width="200" height="200" /></a></td>
    <td><a href="userNotes.php"><img src="../siteImg/notebook1.jpg" width="200" height="200" /></a></td>
    <td><img src="../siteImg/settings.jpg" width="200" height="200"></td>
    <td>&nbsp;</td>
  </tr>
    <tr class="setFiveRow">
      <td>&nbsp;</td>
    <td><a href="userCalendar.php">My Calendar</a></td>
    <td><a href="userNotes.php">My Notebook</a></td>
    <td><a href="userSettings.php">Settings</a></td>
    <td>&nbsp;</td>
    </tr>
</table>
<p><a class="topLink" href="#top">Top</a></p>

<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>