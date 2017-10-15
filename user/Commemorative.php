<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
$setType = 'Commemorative';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Commemorative Collection</title>
<?php include("../headItems.php"); ?>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
<style type="text/css">

</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><img src="../img/Modern_Commemorative.jpg" width="100" height="100" align="middle" class="hidden-xs"> Commemoratives</h2>
<table class="table">
  <tr>
    <td width="32%"><strong> Collected </strong></td>
    <td width="68%"><?php echo $Commemorative->getTotalCommemorativeByID($userID); ?></td>
  </tr>
  <tr>
    <td><strong> Investment</strong></td>
    <td>$<?php echo $Commemorative->getCommemorativeSumByID($userID); ?></td>
  </tr>
  <tr>
    <td><strong> Face Value</strong></td>
    <td>$<?php echo number_format($Commemorative->getCommemorativeFaceValByID($userID), 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><strong> Collection Progress</strong></td>
    <td><?php echo $Commemorative->getTotalCommemorativeByID($userID); ?> of <?php echo $Commemorative->getCommemorativeCount(); ?> (<?php echo percent($Commemorative->getTotalCommemorativeByID($userID), $Commemorative->getCommemorativeCount()) ?>%)</td>
  </tr>
  </table>
<table width="100%" border="0">
  <tr class="setTwoRow">
    <td align="center"><a href="Early_Commemorative.php"><img src="../img/early.jpg" width="300" height="182" /></a></td>
    <td align="center"><a href="Modern_Commemorative.php"><img src="../img/modern.jpg" width="300" height="182" /></a></td>
  </tr>
    <tr class="setTwoRow">
    <td><a href="Early_Commemorative.php">Early</a> <?php echo $Commemorative->getTotalCollectedCommemorativeVersionByID($commemorativeVersion='Early_Commemorative', $userID); ?></td>
    <td><a href="Modern_Commemorative.php">Modern</a> <?php echo $Commemorative->getTotalCollectedCommemorativeVersionByID($commemorativeVersion='Modern_Commemorative', $userID); ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="CommemorativeCoinsAll.php">View All</a></td>
    </tr>
</table>

<h3> Sets (<a href="viewSets.php?setType=Commemorative" class="brownLink">View List</a>)</h3>
<table class="table">
  <tr>
    <td width="21%">Collected</td>
    <td width="79%"><?php echo $CollectionSet->getSetCountByTypeByUserID($setType, $userID); ?> (<?php echo $CollectionSet->getUniqueSetTypeCountById($setType,$userID) ?> Unique)</td>
    </tr>
  <tr>
    <td>Investment</td>
    <td>$<?php echo $CollectionSet->getSetTypeSumByID($setType, $userID) ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>


<p><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->
</body>

</html>