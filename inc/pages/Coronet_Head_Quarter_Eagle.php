
<h3>Type &amp; Variety Collection</h3>
<div class="table-responsive">
  <table class="table">
  <tr valign="top" class="setFourRow">
<?php   
$i = 1;
$countAll = mysql_query("SELECT DISTINCT coinVersion FROM coins WHERE coinType = 'Coronet Head Quarter Eagle'  ORDER BY coinYear ASC") or die(mysql_error());
while($row = mysql_fetch_array($countAll))
	  {
		$coinVersionLink = str_replace(' ', '_', $row['coinVersion']);
  echo '<td><a href="viewCoinVersion.php?coinVersion='.$coinVersionLink.'"><img class="coinSwitch" src="../img/'.$collection->getVarietyImg($row['coinVersion'], $userID).'" alt="" width="100" height="100" /></a><br />
'.$row['coinVersion'].'</td>';    
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
 </table>
 </div>