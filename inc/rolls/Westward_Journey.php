<hr />

<table width="100%" border="0" cellpadding="3" id="folderTbl">
<tr align="center"><td colspan="4"><h3>Westward Journey Mint Roll Collection</h3></td></tr>
  <tr class="dateHolder" valign="top"> 
<?php
$i = 1;
$result = mysql_query("SELECT * FROM rollsmint WHERE coinType = 'Westward Journey' ORDER BY rollMintID ASC") or die(mysql_error());
while($row = mysql_fetch_array($result)){
	$rollMintID = intval($row['rollMintID']);
	$CollectMintRolls->getMintRollById($rollMintID);
echo '<td width="25%" height="135">
	<a href="viewMintRoll.php?rollMintID='.$rollMintID.'"  title="'.$CollectMintRolls->getCoinVersion().'">  <img class="coinSwitch" src="../img/'.$collectionRolls->getMintRollImg($CollectMintRolls->getCoinVersion(), $userID).'" alt="" width="100" height="100" /></a><br />
	'.$CollectMintRolls->getCoinVersion().'
	</td>';
$i = $i + 1; //add 1 to $i
if ($i == 5) { //when you have echoed 3 <td>'s
echo '</tr><tr class="dateHolder" valign="top">'; //echo a new row
$i = 1; //reset $i
} //close the if
}//close the while loop

?>
</tr>
</table>