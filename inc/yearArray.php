<?php 
include"config.php";

/*
if (isset($_GET["coinYear"])) { 
$coinYear = mysql_real_escape_string($_GET["coinYear"]);

$countAll = mysql_query("SELECT * FROM coins WHERE coinYear = '$coinYear'") or die(mysql_error());
$img_check = mysql_num_rows($countAll);
  if($img_check == 0){ 
	  echo 'No Coins Minted For '.$coinYear;
  } else {
  while($row = mysql_fetch_array($countAll))
	  {
    $coinID = strip_tags($row['coinID']);
	$coin->getCoinById($coinID);
	$coinID = $coin->getCoinID();
	$byMint = $coin->checkPDS($coinID);
	//enterMintsetCoin($coinID, $mintsetID, $coinType, $coinCategory, $byMint);
	
    echo '<input name="coinID[]" type="checkbox" value="'.$coinID.'" />'.$coin->getCoinName().' '.$coin->getCoinType().'<br />';
	
	  }
  }
}
*/
?>
<?php 
if (isset($_GET["coinYear"])) { 
$coinYear = mysql_real_escape_string($_GET["coinYear"]);
  $i = 0;
  $x = 0;
  $c = 0;
	//$coinType = preg_replace('#[^a-zA-Z\s0-9\.]#i', '', $_GET["coinType"]);
	$sql = mysql_query("SELECT * FROM coins WHERE coinYear = '$coinYear'") or die(mysql_error());
	while($row = mysql_fetch_array($sql)){
		$coinID = $row['coinID'];
		$coin->getCoinById($coinID);
		$coinType = $row['coinType'];
		$name = $row['coinName'];
		
switch($coin->getCoinStrike()){	
case 'Business':	
	echo ' 
	<input type="checkbox" name="coinID['.$i++.'][theID]" id="coinID' . $coinID . '" value="' . $coinID . '" class="theCoin" />
	  
	  <select name="coinID['.$c++.'][coinGrade]" onClick=\'document.getElementById("coinID' . $coinID . '").checked=true;\'>
<option value="No Grade" selected="selected">No Grade </option>
<option value="B0">B-0</option>
<option value="P1" >PO-1</option>
<option value="FR2">FR-2</option>
<option value="AG3">AG-3</option>
<option value="G4">G-4</option>
<option value="G6">G-6</option>
<option value="VG8">VG-8</option>
<option value="VG10">VG-10</option>
<option value="F12">F-12</option>
<option value="F15">F-15</option>
<option value="VF20">VF-20</option>
<option value="VF25">VF-25</option>
<option value="VF30">VF-30</option>
<option value="VF35">VF-35</option>
<option value="EF40">EF-40</option>
<option value="EF45">EF-45</option>
<option value="AU50">AU-50</option>
<option value="AU55">AU-55</option>
<option value="AU58">AU-58</option>
<option value="MS60">MS-60</option>
<option value="MS61">MS-61</option>
<option value="MS62">MS-62</option>
<option value="MS63">MS-63</option>
<option value="MS64">MS-64</option>
<option value="MS65">MS-65</option>
<option value="MS66">MS-66</option>
<option value="MS67">MS-67</option>
<option value="MS68">MS-68</option>
<option value="MS69">MS-69</option>
<option value="MS70">MS-70</option>
</select>

<label for="coinID' . $coinID . '">' . $name . ' '. $coinType.'</label><br />';
break;
case 'Proof':	
	echo ' 
	<input type="checkbox" name="coinID['.$i++.'][theID]" id="coinID' . $coinID . '" value="' . $coinID . '" class="theCoin" />
	  
	  <select name="coinID['.$c++.'][coinGrade]" onClick=\'document.getElementById("coinID' . $coinID . '").checked=true;\'>
<option value="No Grade" selected="selected">No Grade </option>
<option value="PR35">PR-35</option>
<option value="PR40">PR-40</option>
<option value="PR45">PR-45</option>
<option value="PR50">PR-50</option>
<option value="PR55">PR-55</option>
<option value="PR58">PR-58</option>
<option value="PR60">PR-60</option>
<option value="PR61">PR-61</option>
<option value="PR62">PR-62</option>
<option value="PR63">PR-63</option>
<option value="PR64">PR-64</option>
<option value="PR65">PR-65</option>
<option value="PR66">PR-66</option>
<option value="PR67">PR-67</option>
<option value="PR68">PR-68</option>
<option value="PR69">PR-69</option>
<option value="PR70">PR-70</option>
</select>

<label for="coinID' . $coinID . '">' . $name . ' '. $coinType.'</label><br />';
break;
	}
	
	}
}
?>