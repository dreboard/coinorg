<?php 
include"../inc/config.php";


if (isset($_GET["folderID"])) { 
$folderID = mysql_real_escape_string($_GET["folderID"]);
$folder->getFolderByID($folderID);
  $i = 0;
  echo ' <table border="0" id="coinsInputListTbl" style="margin-left:30px;">
  <tr class="darker">
    <td align="center">+</td>
    <td>Grade</td>
    <td>Year / Mint</td>
  </tr>';
$coinList = explode(",", $folder->getFolderCoins());
	foreach ($coinList as $coins) {
		$coin = new $coin;
		$coin->getCoinById($coins);
		$coinDisplayList = $coin->getCoinName().' '.$coin->getCoinType().'<br />';
	echo ' 
	<tr class="gryHover">
    <td align="center">
	<input type="checkbox" name="coinID['.$i.'][theID]" id="coinID'.$coins.'" value="'.trim($coins).'" class="idCheck" />
      </td>    
	  <td><label  id="coinLabel'.$coins.'" for="coinID'.$coins.'">' .$coin->getCoinName(). '</label></td>
	<td><select name="coinID['.$i.'][coinGrade]" id="gradeList" onChange="document.getElementById(\'coinID'.$coins.'\').checked=true;">
<option value="No Grade" selected="selected">No Grade</option>
'.$collection->getGradeList($coin->getCoinStrike()).'
</select></td>
  </tr>';			
}
echo '</table>';
}
?>