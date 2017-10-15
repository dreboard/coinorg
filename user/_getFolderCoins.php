<?php 
include '../inc/config.php';



/*if(isset($_GET["folderID"])){
	$folderID = intval($_GET["folderID"]);
	$getcoinType = mysql_query("SELECT * FROM folders WHERE folderID = '$folderID'") or die(mysql_error()); 
	while($row = mysql_fetch_array($getcoinType)){
		$folderID = intval($row['folderID']);
		$coinStart = intval($row['coinStart']);
		$coinEnd = intval($row['coinEnd']);
		$folderName = strip_tags($row['folderName']);
		$folderCoins = range($coinStart, $coinEnd, 1);
		
		
		switch($folderID){
			
			case '1':
		$skipCoins = array(4,5,6,9,15,20,23,25,27,29,30,31,45,46,49,56); 
		//$folderCoins = array_diff($folderCoins, array(4,5,6,9,15,20,23,25,27,29,30,31,45,46,49,56));
		$folderCoins = array_diff($folderCoins, $skipCoins);
		
		foreach ($folderCoins as &$value)
		{
		   $value = $coin->getCoinByIdByMint($value);
        echo 
		'  <tr>
			<td><input name="coinID[]" type="checkbox" value="'.$value.'" /></td>
			<td>'.$coinID = $coin->getCoinNameByMint().'</td>';
        };
		case '2':
		echo '2';
		;
		
		}//end switch

	}
}*/



/*	    for($i=$coinStart; $i <= $coinEnd; $i++)
       {
		   $coinID = $coin->getCoinByIdByMint($i);
        echo 
		'  <tr>
			<td><input name="coinID[]" type="checkbox" value="'.$coinID.'" /></td>
			<td>'.$coinID = $coin->getCoinNameByMint().'</td>';
        }*/
		
	if(isset($_GET["folderID2"])){
$folderID = intval($_GET["folderID"]);
/*echo $folderID;*/

$getcoinType = mysql_query("SELECT * FROM folders WHERE folderID = '$folderID'") or die(mysql_error()); 
while($row = mysql_fetch_array($getcoinType)){
	$coinList = explode(",", $row['coins']);
	foreach ($coinList as $value)
		{
			$coin->getCoinById($value);
	echo 
	'  <tr>
		<td><input name="coinID[]" type="checkbox" value="'.$value.'" /></td>
		<td>'.$coin->getCoinName().'</td>
		</tr>';
	};
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if(isset($_GET["folderID"])){
$folderID = intval($_GET["folderID"]);
  $i = 0;
  $x = 0;
  $c = 0;
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$sql  = mysql_query("SELECT * FROM folders WHERE folderID = '$folderID'") or die(mysql_error()); 
	while($row = mysql_fetch_array($sql)){
	$coinList = explode(",", $row['coins']);
	foreach ($coinList as $coinID)
		{
			$coin->getCoinById($coinID);
	echo $coin->getCoinName().'	<input class="coinIDS" type="checkbox" name="coinID['.$i++.'][theID]" id="coinID' . $coinID . '" value="' . $coinID . '" /> 
	<select name="coinID['.$c++.'][coinGrade]">
<option value="No Grade" selected="selected">No Grade </option>
<option value="B0">(B-0) Basal 0 </option>
<option value="P1" >(PO-1) Poor</option>
<option value="FR2">(FR-2) Fair</option>
<option value="AG3">(AG-3) About Good</option>
<option value="G4">(G-4) Good</option>
<option value="G6">(G-6) Good</option>
<option value="VG8">(VG-8) Very Good</option>
<option value="VG10">(VG-10) Very Good</option>
<option value="F12">(F-12) Fine</option>
<option value="F15">(F-15) Fine</option>
<option value="VF20">(VF-20) Very Fine</option>
<option value="VF25">(VF-25) Very Fine</option>
<option value="VF30">(VF-30) Very Fine</option>
<option value="VF35">(VF-35) Very Fine</option>
<option value="EF40">(EF-40) Extremely Fine</option>
<option value="EF45">(EF-45) Extremely Fine</option>
<option value="AU50">(AU-50) About Uncirculated</option>
<option value="AU55">(AU-55) About Uncirculated</option>
<option value="AU58">(AU-58) Very Choice About Uncirculated</option>
<option value="MS60">(MS-60) Mint State Basal</option>
<option value="MS61">(MS-61) Mint State Acceptable</option>
<option value="MS62">(MS-62) Mint State Acceptable</option>
<option value="MS63">(MS-63) Mint State Acceptable</option>
<option value="MS64">(MS-64) Mint State Acceptable</option>
<option value="MS65">(MS-65) Mint State Choice</option>
<option value="MS66">(MS-66) Mint State Choice</option>
<option value="MS67">(MS-67) Mint State Choice</option>
<option value="MS68">(MS-68) Mint State Premium</option>
<option value="MS69">(MS-69) Mint State All-But-Perfect</option>
<option value="MS70">(MS-70) Mint State Perfect</option>
<option value="PR35">(PR-35) Impaired Proof.</option>
<option value="PR40">(PR-40) Impaired Proof.</option>
<option value="PR45">(PR-45) Impaired Proof.</option>
<option value="PR50">(PR-50) Impaired Proof.</option>
<option value="PR55">(PR-55) Impaired Proof.</option>
<option value="PR58">(PR-58) Impaired Proof.</option>
<option value="PR60">(PR-60) Brilliant Proof.</option>
<option value="PR61">(PR-61) Brilliant Proof.</option>
<option value="PR62">(PR-62) Brilliant Proof.</option>
<option value="PR63">(PR-63) Brilliant Proof.</option>
<option value="PR64">(PR-64) Brilliant Proof.</option>
<option value="PR65">(PR-65) Gem Proof.</option>
<option value="PR66">(PR-66) Choice Gem Proof.</option>
<option value="PR67">(PR-67) Extraordinary Proof.</option>
<option value="PR68">(PR-68) Extraordinary Proof.</option>
<option value="PR69">(PR-69) Extraordinary Proof.</option>
<option value="PR70">(PR-70) Perfect Proof.</option>
</select> <label for="coinID' . $coinID . '">' .$coin->getCoinName() . '</label><br />
  </tr>';
	}
}
	}
?>

