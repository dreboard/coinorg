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
<title>Cents</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
<div class="container fill-height">
<h1> Cents</h1>


<div class="table-responsive">
  <table class="table">
  <tr class="setFiveRow">
    <td><a href="Half_Cent.php"><img src="../img/Draped_Bust_Half_Cent_Red.jpg" width="150" height="150" /></a></td>
    <td><a href="Large_Cent.php"><img src="../img/Draped_Bust_Large_Cent_Red_Brown.jpg" width="150" height="150" /></a></td>
    <td><a href="Small_Cent.php"><img src="../img/Indian_Head_Red.jpg" width="150" height="150" /></a></td>
    <td><a href="Two_Cent.php"><img src="../img/Two_Cent.jpg" width="150" height="150" /></a></td>
    <td><a href="Three_Cent.php"><img src="../img/Three_Cent.jpg" width="150" height="150" /></a></td>
  </tr>
   <tr class="setFiveRow">
    <td><strong>Half Cents</strong></td>
    <td><strong>Large Cents</strong></td>
    <td><strong>Small Cents</strong></td>
    <td><strong>Two Cents</strong></td>
    <td><strong>Three Cents</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<!--Content Below-->

  <p class="clearfix"><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>