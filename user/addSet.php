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
<title>Add Coin Set</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
  <div class="row">
  
  <!--Start Box-->
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addMintSet.php"><img src="../img/newMintSet.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>New Mint Set</h3>
        <p><a href="addMintSet.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  
  <!--Start Box-->
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addGradedSet.php"><img src="../img/newGradeSet.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>New Graded Set</h3>
        <p><a href="addGradedSet.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->  
  
  <!--Start Box-->
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addVarietySet.php"><img src="../img/typeSet.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>New Variety Set</h3>
        <p><a href="addVarietySet.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  
  
   
  </div>

<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>