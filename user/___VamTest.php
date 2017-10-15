<?php 
include '../inc/config.php';

$coinType = 'Morgan Dollar';
$coinYear = '1878';
$userID = '15';
$mintMark = 'S';
$vamList = "get_".$coinYear."_".$mintMark;
echo "get_".$coinYear."_".$mintMark;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<table width="100%" border="0" align="center" class="typeTbl" id="vamTbl">
  <tr align="center" valign="top" class="dateHolder">
<?php 
//get_1878_CC
$i = 1;
foreach ($VAM->{$vamList}() as $key => $value) {
	echo '
	  <td width="20%"><a href="viewVamNum.php?coinType='.str_replace('_', ' ', $coinType).'&vam='.str_replace(' ', '_', $value).'&coinYear='.$coinYear.'&mintMark=S"><img class="coinSwitch" src="../img/'.$collection->getVamByYearAndMint($coinYear, $value, $userID, $mintMark='S').'" alt="" width="100" height="100" /></a><br />
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
<p>&nbsp;</p>
<hr />


<p>&nbsp;</p>
</body>
</html>
