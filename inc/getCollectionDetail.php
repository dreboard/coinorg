<?php 
include("config.php");

if (isset($_GET["collectionID"])) { 
$collectionID = intval($_GET["collectionID"]);
$coinQuery = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' LIMIT 1") or die(mysql_error()); 
while($row = mysql_fetch_array($coinQuery))
  {
  $collectionID = intval($row['collectionID']);
  $coinID = intval($row['coinID']);
  $coin->getCoinById($coinID);
  $collection->getCollectionByID($collectionID);
  echo '
<table width="100%" border="0" cellpadding="0">
	  <tr>
	    <td><a href="viewCoinEdit.php?collectionID='.$collectionID.'">Edit Coin Details</a></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
		<td><strong>Coin</strong></td>
		<td>'.$coin->getCoinName().'</td>
		<td>&nbsp;</td>
	  </tr> 
	   <tr>
		<td><strong>Grade/Grader</strong></td>
		<td>'.$collection->getCoinGrade().'/ '.$collection->getGrader().'</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="22%"><strong>Purchase Date:</strong></td>
		<td width="69%">'.$collection->getCoinDate().'</td>
		<td width="9%">&nbsp;</td>
	  </tr>
	  <tr>
		<td><strong>Purchase Price:</strong></td>
		<td>'.$collection->getCoinPrice().'</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td><strong>Details</strong></td>
		<td valign="top">'.$collection->getAdditional().'</td>
		<td>&nbsp;</td>
	  </tr>
	</table>
  ';
  }
  
}
?>

