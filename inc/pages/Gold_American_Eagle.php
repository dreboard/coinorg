<br />
<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="8"><h3>Gold American Eagle Type &amp; Variety Collection</h3></td>
    </tr>
  <tr align="center" valign="top" class="dateHolder"> 
  <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /><br />
  <span>Five Dollar</span> 
</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Gold Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Five Dollar <br />
Proof</td>
  
 
<td> <p><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Gold_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
  Five Dollar   <br />
  Burnished</p>
  <p>&nbsp;</p></td>
  
  <td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter Ounce Gold', $userID); ?>" alt="" width="100" height="100" /><br />
  Ten Dollar</td>
    <td>
  <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Gold_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
  Ten Dollar <br />
  Proof</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Gold_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
    Ten Dollar<br />
Burnished</td>
  
 
<td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /><br />
  Twenty Five <br />
  Dollar</td>
  
  <td> <img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Gold_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
    Twenty Five <br />
    Dollar
    Proof</td>
  </tr>
  
  <tr align="center" valign="top" class="dateHolder"> 
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Gold_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
    Twenty Five<br />
Burnished</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Gold', $userID); ?>" alt="" width="100" height="100" /><br />
    Fifty Dollar</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Gold_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
    Fifty Dollar <br />
    Proof</td>
  <td><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Gold_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
    Fifty Dollar <br />
    Burnished</td>
  <td>&nbsp;</td>
  
  <td>&nbsp;</td>
  </tr>
 </table>
 
 <h3>Proof Sets</h3>
<table width="800" border="0" id="setList">
  <tr>
    <td width="72%"><h2>Coin Set</h2></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM mintset WHERE coinMetal = 'Gold' ORDER BY setName DESC") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$thisMintsetID = $row['mintsetID'];
		$setName = $row['setName'];
	echo '<tr class="setListRow">
    <td><a href="viewSet.php?mintsetID=' . $thisMintsetID . '">' . $setName . '</a></td>
    <td align="center">'.$CollectionSet->getMintsetCountByMintsetID($thisMintsetID, $userID).'</td>
  </tr>';

	}
?>
</table> 