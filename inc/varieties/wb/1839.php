 <?php if (strip_tags($_GET["coinType"]) == 'Seated_Liberty_Quarter') {?>   


<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Half Dollars</h3></td>
  </tr>
  <tr align="center" valign="top" class="vamRow"> 
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_1&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMintAndSubCategory($coinYear, 'Snow 1', $userID, $mintMark='P', $coinType, 'Indian Head Open 3'); ?>" alt="" width="100" height="100" /></a><br />
  <span>WB-101.<br />
 NO-DRAPERY</span> 
</td>
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_2&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMintAndSubCategory($coinYear, 'Snow 2', $userID, $mintMark='P', $coinType, 'Indian Head Open 3'); ?>" alt="" width="100" height="100" /></a><br />
<span>WB-102 <br />
WITH-DRAPERY</span></td>
  
<td width="20%">&nbsp;</td>
  
  <td width="20%">&nbsp;</td>
  
  <td width="20%">&nbsp;</td>
  </tr>
</table>
<?php } else { echo ''; }  ?>  
<br />

 <?php if (strip_tags($_GET["coinType"]) == 'Seated_Liberty_Half_Dollar') {?>   


<table width="100%" border="0" align="center" class="typeTbl" id="folderTbl">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3>Half Dollars</h3></td>
  </tr>
  <tr align="center" valign="top" class="vamRow"> 
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_1&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMintAndSubCategory($coinYear, 'Snow 1', $userID, $mintMark='P', $coinType, 'Indian Head Open 3'); ?>" alt="" width="100" height="100" /></a><br />
  <span>WB-101.<br />
 NO-DRAPERY</span> 
</td>
  <td width="20%"><a href="viewSnowNum.php?snow=Snow_2&coinYear=<?php echo $coinYear;?>&coinType=<?php echo strip_tags($_GET["coinType"]); ?>"><img class="coinSwitch" src="../img/<?php echo $collection->getSnowByYearAndMintAndSubCategory($coinYear, 'Snow 2', $userID, $mintMark='P', $coinType, 'Indian Head Open 3'); ?>" alt="" width="100" height="100" /></a><br />
<span>WB-102 <br />
WITH-DRAPERY</span></td>
  
<td width="20%">&nbsp;</td>
  
  <td width="20%">&nbsp;</td>
  
  <td width="20%">&nbsp;</td>
  </tr>
</table>
<?php } else { echo ''; }  ?>     