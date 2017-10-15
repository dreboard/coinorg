<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr valign="top" class="setFourRow">
<?php   
$i = 1;
$countAll = mysql_query("SELECT * FROM coins WHERE coinType = 'Commemorative Five Dollar'  ORDER BY coinYear ASC") or die(mysql_error());
while($row = mysql_fetch_array($countAll))
	  {
		$coinID = intval($row['coinID']);
		$coin-> getCoinById($coinID);  
		$coinName = $coin->getCoinName(); 
		$coinVersion = $coin->getCoinVersion();
		$coinVersionLink = str_replace(' ', '_', $coin->getCoinVersion());
  echo '<td><a href="viewCoinVersion.php?coinVersion='.$coinVersionLink.'"><img class="coinSwitch" src="../img/'.$collection->getVarietyImg($coin->getCoinVersion(), $userID).'" alt="" width="100" height="100" /></a><br />
'.$coinName.'</td>';    
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
 </table>
 </div>