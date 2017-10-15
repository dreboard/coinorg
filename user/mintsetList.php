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
<title>Coin Set List</title>
<?php include("../headItems.php"); ?>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
<h2><img src="../img/Mintset.jpg" width="100" height="100" align="absmiddle">  Coin Sets</h2>
<div class="table-responsive">
  <table class="table">
  <tr>
    <td width="72%"><h3>Coin Set</h3></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM mintset ORDER BY setName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$thisMintsetID = $row['mintsetID'];
		$setName = $row['setName'];
	echo '<tr class="setListRow">
    <td><a href="viewSet.php?ID=' . $thisMintsetID . '">' . $setName . '</a></td>
    <td align="center">'.$CollectionSet->getMintsetCountByMintsetID($thisMintsetID, $userID).'</td>
  </tr>';

	}
?>
</table>
</div>


<p><a class="topLink" href="#top">Top</a></p>
<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>