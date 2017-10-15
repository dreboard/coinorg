<?php 
class State
{


public function rollMintCount($value){
return '0';
}
public function rollMyCount($value){
	return '0';
}
public function rollMix($value){
	return '0';
}
public function firstDayCount(){
	return '0';
}
public function boxCount(){
	return '0';
}
public function bagCount(){
	return '0';
}
public function bigBagCount(){
	return '0';
}

public function errorCount(){
	return '0';
}

public function certifiedCount($value){
	$sql = mysql_query("SELECT * FROM coins WHERE coinID = '".$value."' AND certified != 'N/A'") or die(mysql_error());
	$getCertified = mysql_num_rows($sql);
return $getCertified;
}

public function getThisStateP($value){
	return '0';
}
public function getThisStateD($value){
	return '0';
}
public function getThisStateS($value){
	return '0';
}
public function getThisStatesSilver($value){
	return '0';
}

//Investment and face values
public function getThisStateFaceValue($value){
	return '22,345.00';
}
public function getThisStateInvestment($value){
	return '22,345.00';
}


//Get mint mark
public function getMintByID($value){
$sql = mysql_query("SELECT * FROM coins WHERE coinID = '".$value."'") or die(mysql_error());	

while($row = mysql_fetch_array($sql)){
    $coinName = $row['coinName'];
}

$state = explode(' ',$coinName);
$mint = $state[1];
return $mint;
}

public function getMint($value){
$state = explode(' ',$value);
$mint = $state[1];
return $mint;
}

public function getYear(){
	$stateList = '
	<select onchange="window.open(this.options[this.selectedIndex].value,\'_top\')"> 
  <option value="" selected="selected">Switch Year</option> 
<option value="#State1999">1999</option>
<option value="#State2000">2000</option>
<option value="#State2001">2001</option>
<option value="#State2002">2002</option>
<option value="#State2003">2003</option>
<option value="#State2004">2004</option>
<option value="#State2005">2005</option>
<option value="#State2006">2006</option>
<option value="#State2007">2007</option>
<option value="#State2008">2008</option>
</select>
	';
	return $stateList;
}

public function getStates(){
	$stateList = '
	<select onchange="window.open(this.options[this.selectedIndex].value,\'_top\')"> 
  <option value="" selected="selected">Switch State</option> 
<option value="#Alabama">Alabama</option>
<option value="#Alaska">Alaska</option>
<option value="#Arizona">Arizona</option>
<option value="#Arkansas">Arkansas</option>
<option value="#California">California</option>
<option value="#Colorado">Colorado</option>
<option value="#Connecticut">Connecticut</option>
<option value="#Delaware">Delaware</option>
<option value="#Florida">Florida</option>
<option value="#Georgia">Georgia</option>
<option value="#Hawaii">Hawaii</option>
<option value="#Idaho">Idaho</option>
<option value="#Illinois">Illinois</option>
<option value="#Indiana">Indiana</option>
<option value="#Iowa">Iowa</option>
<option value="#Kansas">Kansas</option>
<option value="#Kentucky">Kentucky</option>
<option value="#Louisiana">Louisiana</option>
<option value="#Maine">Maine</option>
<option value="#Maryland">Maryland</option>
<option value="#Massachusetts">Massachusetts</option>
<option value="#Michigan">Michigan</option>
<option value="#Minnesota">Minnesota</option>
<option value="#Mississippi">Mississippi</option>
<option value="#Missouri">Missouri</option>
<option value="#Montana">Montana</option>
<option value="#Nebraska">Nebraska</option>
<option value="#Nevada">Nevada</option>
<option value="#New Hampshire">New Hampshire</option>
<option value="#NewJersey">New Jersey</option>
<option value="#New Mexico">New Mexico</option>
<option value="#NewYork">New York</option>
<option value="#NorthCarolina">North Carolina</option>
<option value="#NorthDakota">North Dakota</option>
<option value="#Ohio">Ohio</option>
<option value="#Oklahoma">Oklahoma</option>
<option value="#Oregon">Oregon</option>
<option value="#Pennsylvania">Pennsylvania</option>
<option value="#RhodeIsland">Rhode Island</option>
<option value="#SouthCarolina">South Carolina</option>
<option value="#SouthDakota">South Dakota</option>
<option value="#Tennessee">Tennessee</option>
<option value="#Texas">Texas</option>
<option value="#Utah">Utah</option>
<option value="#Vermont">Vermont</option>
<option value="#Virginia">Virginia</option>
<option value="#Washington">Washington</option>
<option value="#WestVirginia">West Virginia</option>
<option value="#Wisconsin">Wisconsin</option>
<option value="#Wyoming">Wyoming</option>
</select>
	';
	return $stateList;
}

}//End Class
?>