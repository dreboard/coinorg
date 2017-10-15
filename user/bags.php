<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Mint Bags Report</title>
<script type="text/javascript">
$(document).ready(function(){

});
</script>  


<style type="text/css">
table h3 {margin:0px;}
</style>
</head>

<body class="no-js">
<a name="top"></a>
<?php include("../inc/pageElements/navUser.php"); ?>
<div id="content" class="clear">
<?php include("../inc/pageElements/reportLinks.php"); ?>
<h1>Mint Series Bag List</h1>
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="20%"><h3>Sets Collected</h3></td>
    <td width="18%" align="right"><?php echo $collectionBags->getBagTypeCount($bagType='Mint_Series', $userID) ?></td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td><h3>Total Investment</h3></td>
    <td align="right">$<?php echo $collectionBags->getCoinSumByBagType($bagType='Mint_Series', $userID)?></td>
    <td>&nbsp;</td>
  </tr>
  
</table>
<br>

<table width="100%" border="0">
  <tr>
    <td><a href="addMintBags.php">Add New Bag</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

  <div>
 
    
   <hr class="clear"> 

   <table width="800" border="0" id="setList">
  <tr>
    <td width="72%"><h2>Bag List</h2></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM bags ORDER BY bagID DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$thisbagID = $row['bagID'];
		$bagName = $row['bagName'];
	echo '<tr class="setListRow">
    <td><a href="viewBag.php?ID=' . $Encryption->encode($thisbagID) . '">' . $bagName . '</a></td>
    <td align="center">'.$MintBag->getBagCountByBagId($thisbagID, $userID).'</td>
  </tr>';

	}
?>
</table>
<p><a class="topLink" href="#top">Top</a></p>
</div>

</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>