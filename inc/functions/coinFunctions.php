<?php 

/*

coinSelects
*/

function getMintMark($coinID){
$query = mysql_query("SELECT DISTINCT LEFT(coinName,6) as coinYear FROM coins WHERE coinID = '$coinID'") or die(mysql_error());
while($row = mysql_fetch_array($query))
  {
  $coinYear = $row['coinYear'];
  $mintMark = substr($coinYear, -1);
  
  }	
  return $mintMark;
}



$value = '';
setlocale(LC_MONETARY, 'en_US');
function summary($str, $limit=20, $strip = false) {
    $str = ($strip == true)?strip_tags($str):$str;
    if (strlen ($str) > $limit) {
        $str = substr ($str, 0, $limit - 3);
        return (substr ($str, 0, strrpos ($str, ' ')).'...');
    }
    return trim($str);
}



//all coins from 1 category (quarter, dimes...)
function getCompleteAll($value){
	$sql = mysql_query("SELECT * FROM coins WHERE coinCategory = '".$value."'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
}
//all coins from 1 category IN COLLECTION (quarter, dimes...)
function getCompleteCollected($value){
	$sql = mysql_query("SELECT * FROM coins WHERE coinCategory = '".$value."' AND collection = '1'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
}



/*function percent($small, $large){
	if($small == 0){
		$returnPercent = '0';
	} else {
		$percentCalc = ((100*$small)/$large);
		$returnPercent = number_format($percentCalc, 1);
	}	
	return $returnPercent;
}*/

//REAL ONE HERE
function percent($small, $large){
	if($large !=0){
	$percentCalc = ((100*$small)/$large);
	$percent = number_format($percentCalc, 1);
		return $percent;
	} else {
	return '0';
}
}



function percentDiff($num_amount, $num_total) {
    echo number_format((1 - $num_amount / $num_total) * 100, 2); // yields 0.76
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//STATE QUARTERS
function getStateImage($type){
$countAll = mysql_query("SELECT * FROM coins WHERE coinVersion = '$type' AND collection = '1'") or die(mysql_error());
$img_check = mysql_num_rows($countAll);
  if($img_check > 0){ 
	  $type = str_replace(' ', '_', $type);
		  $image = $type.'.jpg';
  } else {
$image = "blank.jpg";
}
return $image;
}

//GET NUMBER OF DISCTINCT COIN TYPES BY DENOMINATION
function getStateVarietyCount($value){
	$sql = mysql_query("SELECT * FROM pages WHERE pageCategory = '".$value."'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}
function getStateVarietyCountCollected($value){
	$sql = mysql_query("SELECT * FROM pages WHERE pageCategory = '".$value."' AND typeCount = '1'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}

//////////////////////////////money Formats
function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number = sprintf('%.2f', $number); 
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return $number; 
}
function getCollectedValue($value){
	$collection = '0.00';
	return '&#36;'.formatMoney($collection);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FIXED FUNCTIONS
function getDuplicates($coinID, $userID){
	$getDuplicates = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
$getDupRows = mysql_num_rows($getDuplicates);	
return $getDupRows;
	
}


//Get type collection
function getSubVarietyCountCollected($userID, $value){
	$sql = mysql_query("SELECT DISTINCT coinType FROM collection WHERE coinSubCategory = '".$value."' AND userID = '$userID'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}



//GET COLLECTED PIECES
function getCentTypeCount($coinType, $userID){
	$countFlying = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND userID = '$userID'") or die(mysql_error());
	$getCountType = mysql_num_rows($countFlying);
	return $getCountType;
}
//GET INVESTMENT BY COIN CATEGORY




/*
//////////////////////////////////////////////////////////////////GET TOP TABLE VALUES///////////////////////////////////////////////////////////////////////////////
*/


//GET NUMBER OF DISCTINCT COIN TYPES BY DENOMINATION
//Type Collection Progress
function getCatCount($value){
	$sql = mysql_query("SELECT * FROM pages WHERE pageCategory = '".$value."'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}



function getSubCatCount($value){
	$sql = mysql_query("SELECT * FROM pages WHERE pageSubCategory = '".$value."'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}

function getSubCatCollectedCount($value, $userID){
	$sql = mysql_query("SELECT  DISTINCT coinID FROM collection WHERE coinSubCategory = '".$value."' AND userID = '$userID'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}

//sum of all complete set fields
//GET COMPLETE TYPE (CENT)
function getCompleteSet($val){
	$myQuery = mysql_query("SELECT SUM(completeSet) FROM pages WHERE pageCategory = '$val'") or die(mysql_error()); 
	while($row = mysql_fetch_array($myQuery))
    {
  $coinSum = $row['SUM(completeSet)'];
    } 
	return $coinSum;
}



///////////////////////////////types by mint mark
function getMintCatCount($userID, $byMint, $coinType) {
    $sql = mysql_query("SELECT * FROM collection WHERE coinType = '$coinType' AND  userID = '$userID' AND  byMint = '1'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
    }

	
/*function getMintCountFromCoins($coinCategory) {
    $sql = mysql_query("SELECT * FROM coins WHERE coinCategory = '$coinCategory' AND  byMint = '1'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
    }	*/	
function getMintSubCountFromCoins($coinSubCategory) {
    $sql = mysql_query("SELECT * FROM coins WHERE coinSubCategory = '$coinSubCategory' AND  byMint = '1'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
    }	
	
	
	
function getMintSubCount($userID, $coinSubCategory) {
    $sql = mysql_query("SELECT * FROM collection WHERE coinSubCategory = '$coinSubCategory' AND  userID = '$userID' AND  byMint = '1'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
    }
function getCompleteSubCatCount($value){
	$sql = mysql_query("SELECT * FROM coins WHERE coinSubCategory = '".$value."'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
}


//GET NUMBER OF DISCTINCT COIN TYPES BY DENOMINATION
function getVarietyCount($value){
	$sql = mysql_query("SELECT * FROM pages WHERE pageCategory = '".$value."'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}



function getSubVarietyCount($value){
	$sql = mysql_query("SELECT * FROM pages WHERE pageSubCategory = '".$value."'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}

//Get number of all coins collected by id

function getCoinSubCatCountByID($userID, $coinSubCategory){
    $sql = mysql_query("SELECT * FROM collection WHERE coinSubCategory ='$coinSubCategory' AND userID = '$userID'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}

//Get sum of all coins purchase price by id
function getCoinSubCatValByID($userID, $coinSubCategory){
	$myQuery = mysql_query("SELECT SUM(purchasePrice) FROM collection WHERE coinSubCategory ='$coinSubCategory' AND userID = '$userID'") or die(mysql_error());
	while($row = mysql_fetch_array($myQuery))
    {
  $coinSum = $row['SUM(purchasePrice)'];
    } 
	return $coinSum;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Rolls



function getMixedRollSubCatCount($coinSubCategory, $userID){
    $sql = mysql_query("SELECT * FROM collectrolls WHERE coinSubCategory = '$coinSubCategory' AND rollType = 'Mixed' AND  userID = '$userID'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}


function getRollByCoinIDCount($coinID, $userID){
    $sql = mysql_query("SELECT * FROM collectrolls WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}


function getRollTypeCount($coinType, $userID){
    $sql = mysql_query("SELECT * FROM collectrolls WHERE coinType = '$coinType' AND userID = '$userID'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}



function getMintCountFromCoins($coinType) {
    $sql = mysql_query("SELECT * FROM coins WHERE coinType = '$coinType' AND  byMint = '1'") or die(mysql_error());
	$getTypeRequest = mysql_num_rows($sql);
	return $getTypeRequest;
}
	


//Get number of all rolls collected by id
function getRollCountByID($userID){
    $sql = mysql_query("SELECT * FROM collectrolls WHERE userID = '$userID'") or die(mysql_error());
	$getCategoryRequest = mysql_num_rows($sql);
	return $getCategoryRequest;
}

//Get sum of all rolls purchase price by id
function getRollValByID($userID){
	$myQuery = mysql_query("SELECT SUM(purchasePrice) FROM collectrolls WHERE userID = '$userID'") or die(mysql_error());
	while($row = mysql_fetch_array($myQuery))
    {
  $coinSum = $row['SUM(purchasePrice)'];
    } 
	return $coinSum;
}
?>
