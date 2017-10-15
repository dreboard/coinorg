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
<title>Add Item</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Coins</a></li>
  <li><a href="#bulk" data-toggle="tab">Bulk</a></li>
  <li><a href="#special" data-toggle="tab">Special</a></li>
  <li><a href="#supplies" data-toggle="tab">Supplies</a></li>
</ul>
<!-- /Nav tabs -->   
  </div>
  <div class="panel-body"><!--panel-body -->

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home">
  <div class="row">
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addCoinRaw.php"><img src="../img/newCoin.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>New Coin</h3>
        <p><a href="addCoinRaw.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
<div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addSet.php"><img src="../img/newSet.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Mint &amp; Proof Sets</h3>
        <p><a href="addSet.php" class="btn btn-default" role="button">Add Sets</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addBullion.php"><img src="../img/newBullion.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Gold, Silver &amp; Platinum</h3>
        <p><a href="addBullion.php" class="btn btn-default" role="button">Add Bullion</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  
</div>
  </div><!--/End Pane-->
<div class="tab-pane" id="bulk">
  <div class="row">
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addBulk.php"><img src="../img/newBulk.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Coin Rolls &amp; Bags</h3>
        <p><a href="addBulk.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
<div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addFolderBlank.php"><img src="../img/whitmanFolders.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Folders &amp; Albums</h3>
        <p><a href="addFolderBlank.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addBulkLot.php"><img src="../img/newBulkLot.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Bulk Lots</h3>
        <p><a href="addBulkLot.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  
</div>
  </div><!--/End Pane-->
  
  <div class="tab-pane" id="special">
  <div class="row">
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addCommemorative.php"><img src="../img/newComm.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Commemoratives</h3>
        <p><a href="addCommemorative.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
<div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addFirstDayType.php"><img src="../img/newFirstDay.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>First Day Sets</h3>
        <p><a href="addFirstDayType.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addCollection.php"><img src="../img/newCollection.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Create Collection</h3>
        <p><a href="addCollection.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  
</div>
  </div><!--/End Pane-->
  
  <div class="tab-pane" id="supplies">
  <div class="row">
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="coinContainerNew.php"><img src="../img/storage.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Cointainers</h3>
        <p><a href="coinContainerNew.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
<div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="addSupply.php"><img src="../img/coin-supplies.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Supplies</h3>
        <p><a href="addSupply.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  <div class="col-xs-6 col-md-4">
  <div class="thumbnail">
      <a href="inventory.php"><img src="../img/inventory.jpg" class="img-responsive" alt="no grade" /></a>
      <div class="caption">
        <h3>Inventory Control</h3>
        <p><a href="inventory.php" class="btn btn-default" role="button">Add</a></p>
      </div>
    </div>
  
  </div><!--/Box-->
  
</div>
  </div><!--/End Pane-->
</div><!-- /Tab panes -->
  
  </div>
</div><!--/.panel-body -->
</div><!--/.container -->
<?php include("../inc/pageElements/bt-footer.php"); ?>

</body>
</html>