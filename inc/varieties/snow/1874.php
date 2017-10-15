<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6">&nbsp;</td>
    </tr>
  <tr align="center" valign="top" class="vamRow"> 
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_1&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 1', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 1 <br />
 	Double hubbed Obv. 1-O-V</span> 
</td>
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_2&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 2', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
<span>Snow 2 <br />
1874, 4/4(s) </span></td>
  
<td width="20%"><a href="viewSnowNum.php?snow=Snow_3&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo$collection->getSnowByYearAndMint($coinYear, 'Snow 3', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 3 <br />
1/1(s), 74/74(n) </span></td>
  
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_4&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 4', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 4 <br />
1/1(n)</span> </td>
  
  <td width="20%">&nbsp;</td>
  </tr> 
 </table>