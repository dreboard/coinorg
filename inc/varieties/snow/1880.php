<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6">&nbsp;</td>
    </tr>
  <tr align="center" valign="top" class="vamRow"> 
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_1&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 1', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 1 <br />
Dbl die Obv 1-O-III, Off center clash marks</span> 
</td>
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_2&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 2', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
<span>Snow 2 <br />
88/88(n), 88/88(s)  </span></td>
  
<td width="20%"><a href="viewSnowNum.php?snow=Snow_3&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo$collection->getSnowByYearAndMint($coinYear, 'Snow 3', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 3 <br />
Broken 2 and 8</span></td>
  
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_4&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMint($coinYear, 'Snow 4', $userID, $mintMark='P', $coinType); ?>" alt="" width="100" height="100" /></a><br />
  <span>Snow 4 <br />
Broken 88 </span> </td>
  
  <td width="20%">&nbsp; </td>
  </tr>
  
 </table>