<hr />

<table width="100%" border="0">
  <tr align="center">
    <td width="25%"><h3><a href="#1885P">Philly</a></h3></td>
    <td width="25%"><h3><a href="#1885S">San Fransisco</a></h3></td>
    <td width="25%"><h3><a href="#1885CC">Carson City</a></h3></td>
    <td width="25%"><h3><a href="#1885O">New Orleans</a></h3></td>    
  </tr>
</table>
<br />

<table width="100%" border="0" align="center" class="typeTbl" id="vamTbl" cellpadding="3">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3><a name="1885P">1885-P</a></h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder">
<?php 
$i = 1;
foreach ($VAM->get_1885_P() as $key => $value) {
	echo '
	  <td width="20%"><a href="viewVamNum.php?coinType='.str_replace(' ', '_', $coinType).'&vam='.str_replace(' ', '_', $value).'&coinYear='.$coinYear.'&mintMark=P"><img class="coinSwitch" src="../img/'.$collection->getVamByYearAndMint($coinYear, $value, $userID, $mintMark='P').'" alt="" width="100" height="100" /></a><br />
  <span>'.$value.'</span> </td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if	
}
?>
  </tr>
</table>

<hr />
<table width="100%" border="0" align="center" class="typeTbl" id="vamTbl2" cellpadding="3">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3><a name="1885CC">1885-CC</a></h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder">
<?php 
$i = 1;
foreach ($VAM->get_1885_CC() as $key => $value) {
	echo '
	  <td width="20%"><a href="viewVamNum.php?coinType='.str_replace(' ', '_', $coinType).'&vam='.str_replace(' ', '_', $value).'&coinYear='.$coinYear.'&mintMark=CC"><img class="coinSwitch" src="../img/'.$collection->getVamByYearAndMint($coinYear, $value, $userID, $mintMark='CC').'" alt="" width="100" height="100" /></a><br />
  <span>'.$value.'</span> </td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if	
}
?>
  </tr>
</table>
<hr />
<table width="100%" border="0" align="center" class="typeTbl" id="vamTbl2" cellpadding="3">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3><a name="1885S">1885-S</a></h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder">
<?php 
$i = 1;
foreach ($VAM->get_1885_S() as $key => $value) {
	echo '
	  <td width="20%"><a href="viewVamNum.php?coinType='.str_replace(' ', '_', $coinType).'&vam='.str_replace(' ', '_', $value).'&coinYear='.$coinYear.'&mintMark=S"><img class="coinSwitch" src="../img/'.$collection->getVamByYearAndMint($coinYear, $value, $userID, $mintMark='S').'" alt="" width="100" height="100" /></a><br />
  <span>'.$value.'</span> </td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if	
}
?>
  </tr>
</table>
<hr />
<table width="100%" border="0" align="center" class="typeTbl" id="vamTbl2" cellpadding="3">
  <tr align="center" valign="top" class="dateHolder">
    <td colspan="6"><h3><a name="1885O">1885-O</a></h3></td>
  </tr>
  <tr align="center" valign="top" class="dateHolder">
<?php 
$i = 1;
foreach ($VAM->get_1885_O() as $key => $value) {
	echo '
	  <td width="20%"><a href="viewVamNum.php?coinType='.str_replace(' ', '_', $coinType).'&vam='.str_replace(' ', '_', $value).'&coinYear='.$coinYear.'&mintMark=O"><img class="coinSwitch" src="../img/'.$collection->getVamByYearAndMint($coinYear, $value, $userID, $mintMark='O').'" alt="" width="100" height="100" /></a><br />
  <span>'.$value.'</span> </td>';
$i = $i + 1; //add 1 to $i
if ($i == 6) { //when you have echoed 3 <td>'s
echo '</tr><tr align="center" valign="top" class="dateHolder">'; //echo a new row
$i = 1; //reset $i
} //close the if	
}
?>
  </tr>
</table>