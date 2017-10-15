<?php 
include '../config.php';

function stringfilter($str,$allowed,$rejected){
 
$split_string = str_split($str,1);
 
$output = "";
foreach($split_string as $char){
 
if (in_array($char,$rejected)){
continue;
//Skip if it is in rejected list
}
 
$ascii_num = ord($char);
if ($ascii_num >= 32 && $ascii_num <= 126){
$output.=$char;
//Allow All Alphanumeric
}
 
if(in_array($char,$allowed)){
$output.=$char;
//Add in list if it is in allowed list
}
 
}
return $output;
}

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
		
	if(isset($_GET["folderID"])){
$folderID = intval($_GET["folderID"]);
echo $folderID;

/*$getcoinType = mysql_query("SELECT * FROM folders WHERE folderID = '$folderID'") or die(mysql_error()); 
while($row = mysql_fetch_array($getcoinType)){
	$coinList = explode(",", $row['coins']);
	foreach ($coinList as $value)
		{
			$coin->getCoinById($value);
	echo 
	'  <tr>
		<td><input name="coinID[]" type="checkbox" value="'.$value.'" /></td>
		<td>'.$coinName.'</td>
		</td>';
	};
}*/
}
?>

