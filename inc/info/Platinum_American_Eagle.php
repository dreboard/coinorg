<br />

 
 <table border="0" align="center" class="typeTbl" id="folderTbl">
  <tr>
    <td colspan="5" align="center"><h3>Platinum American Eagle Type &amp; Variety Collection</h3></td>
   </tr>
  <tr>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Platinum', $userID); ?>" alt="" width="100" height="100" /><br />
    <span>Ten Dollar</span></strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Platinum Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Ten Dollar Proof</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Tenth_Ounce_Platinum_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
Ten Dollar Burnished</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Platinum', $userID); ?>" alt="" width="100" height="100" /><br />
Twenty Five<br />
Dollar</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Platinum_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Twenty Five<br />
Dollar Proof</strong></td>
  </tr>
  <tr>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Quarter_Ounce_Platinum_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
Twenty Five <br />
Dollar Burnished</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Platinum', $userID); ?>" alt="" width="100" height="100" /><br />
Fifty Dollar</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Platinum_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Fifty Proof</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Platinum_Reverse Proof', $userID); ?>" alt="" width="100" height="100" /><br />
Fifty Dollar <br />
Reverse Proof</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('Half_Ounce_Platinum_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
Fifty Dollar Burnished</strong></td>
  </tr>
  <tr>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Platinum', $userID); ?>" alt="" width="100" height="100" /><br />
One Hundred Dollar</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Platinum_Proof', $userID); ?>" alt="" width="100" height="100" /><br />
One Hundred Dollar <br />
Proof</strong></td>
    <td align="center" valign="top"><strong><img class="coinSwitch" src="../img/<?php echo $collection->getVarietyImg('One_Ounce_Platinum_Burnished', $userID); ?>" alt="" width="100" height="100" /><br />
One Hundred Dollar<br />
Burnished</strong></td>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
</table>

 
 
<table width="800" border="0" id="setList">
  <tr>
    <td width="72%"><h2>Platinum Eagle Sets</h2></td>
    <td width="28%" align="center"><h3>Collected</h3></td>
  </tr>
<?php 
	$getcoinType = mysql_query("SELECT * FROM mintset WHERE coinMetal = 'Platinum' ORDER BY setName DESC") or die(mysql_error()); 
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