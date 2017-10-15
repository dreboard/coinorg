<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr align="center" valign="top" class="vamRow"> 
<td><a href="viewSnowNum.php?snow=Snow_1&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 1', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 1 <br />
    2/2(s)</span></td>  
<td><a href="viewSnowNum.php?snow=Snow_2&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 2', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 2 <br />
    86 in denticles</span></td>  <td><a href="viewSnowNum.php?snow=Snow_3&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 3', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 3 <br />
    Bar under 2</span></td>  
<td><a href="viewSnowNum.php?snow=Snow_4&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 4', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 4 <br />
Multiple 1's in denticles</span></td>  
  </tr>

 </table>