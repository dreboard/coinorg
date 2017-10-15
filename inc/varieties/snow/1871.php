<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6">&nbsp;</td>
    </tr>
  <tr align="center" valign="top" class="vamRow"> 
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_1&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 1', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 1 <br />
1871/1871(s) on digit punch</span> 
</td>
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_2&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 2', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
<span>Snow 2 <br />
71 touching, first 1/1(n)</span></td>
  
<td width="20%"><a href="viewSnowNum.php?snow=Snow_3&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo$collection->getSnowByYearAndMint($coinYear, 'Snow 3', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 3 <br />
last 1/1(sw) </span></td>
  
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_4&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 4', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 4 <br />
Shallow N reverse</span> </td>
  
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_5&coinYear=<?php echo $coinYear;?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 5', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 5 <br />
 	1 in denticles, Shallow N reverse</span> </td>
  </tr> 
 </table>